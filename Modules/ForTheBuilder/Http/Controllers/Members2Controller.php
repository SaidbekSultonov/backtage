<?php

namespace Modules\ForTheBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ForTheBuilder\Entities\Members;
use Modules\ForTheBuilder\Entities\Shops;
use Modules\ForTheBuilder\Entities\Objects;
use Modules\ForTheBuilder\Entities\MembersPurchases;
use Modules\ForTheBuilder\Entities\MembersCoupons;
use Modules\ForTheBuilder\Entities\MembersSums;
use Modules\ForTheBuilder\Http\Requests\MembersRequest;
use Modules\ForTheBuilder\Http\Requests\MembersPurchasesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Storage;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $search_value = '';
        if (isset($_GET['text']) && !empty($_GET['text'])) {
            $text = htmlspecialchars(explode('?', $_GET['text'])[0]);
            $search_value = $text;
            
            $model = Members::whereRaw("lower(full_name) like ? OR lower(first_name) like ? OR lower(last_name) like ? OR lower(middle_name) like ? OR lower(phone) like ?", array('%'.$text.'%','%'.$text.'%','%'.$text.'%','%'.$text.'%','%'.$text.'%'))
            ->orderBy('id', 'desc')
            ->get();   
            
        }
        else{
            $model = Members::orderBy('id','desc')->get();
        }


        $objects = Objects::all();
        $shops = Shops::where('object_id',$objects[0]->id)->get();
        return view('forthebuilder::members.index',[
            'model' => $model,
            'shops' => $shops,
            'objects' => $objects,
            'search_value' => $search_value,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $objects = Objects::all();
        $shops = Shops::where('object_id',$objects[0]->id)->get();

        return view('forthebuilder::members.create',[
            'shops' => $shops,
            'objects' => $objects
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function NewRows()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $objects = Objects::all();
        $shops = Shops::where('object_id',$objects[0]->id)->get();

        $count = $_GET['count'];

        return (string) view('forthebuilder::members.new-rows',[
            'shops' => $shops,
            'count' => $count,
            'objects' => $objects,
        ]);
    }

    
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix().'uploads/';
        $id = (int)$id;
        $model = MembersPurchases::where('members_id',$id)->get();
        $member = Members::find($id);
        
        $objects = Objects::all();
        $shops = Shops::where('object_id',$objects[0]->id)->get();
        
        return view('forthebuilder::members.show',[
            'member' => $member,
            'model' => $model,
            'shops' => $shops,
            'objects' => $objects,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(MembersRequest $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $data = $request->validated();

        if (!empty($_POST['Purchase'])) {
            foreach ($_POST['Purchase'] as $key => $value) {
                if (empty($value['shop'])) {
                    Session::flash('message', translate('Вы не выбрали магазин!')); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return redirect()->back();
                }
            }
        }

        $id = (int)$_POST['id'];
        $model = Members::find($id);
        $model->user_id = Auth::user()->id;
        $model->last_name = htmlspecialchars($data['last_name']);
        $model->first_name = htmlspecialchars($data['first_name']);
        $model->middle_name = htmlspecialchars($data['middle_name']);
        $model->full_name = $model->last_name.' '.$model->first_name.' '.$model->middle_name;

        if (!empty($data['birth_date'])) {
            $model->birth_date = date('Y-m-d', strtotime($data['birth_date']));
        }

        if (!empty($data['phone'])) {
            $model->phone = '998'.preg_replace('/[^0-9]/', '', $data['phone']);                
        }


        if (!empty($request->img)) {
            
            if (file_exists(public_path('uploads/members/'.$model->img))) {
                $path = public_path('uploads/members/'.$model->img);
                File::delete(public_path('uploads/members/'.$model->img));
            }

            $img = $request->img;
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = strtotime(date('Y-m-d H:i:s')) . '.png';
            $path = public_path().'/uploads/members/'.$fileName;
            File::put($path, $image_base64);
            $model->img = $fileName;
        }

        if ($model->save()) {
            if (!empty($_POST['Purchase'])) {
                foreach ($_POST['Purchase'] as $key => $value) {
                    
                    if (!empty($value['sum']) && !empty($value['date'])) {
                        $new_purchases = new MembersPurchases();
                        $new_purchases->user_id = Auth::user()->id;
                        $new_purchases->members_id = $model->id;
                        $new_purchases->shop_id = $value['shop'];
                        $new_purchases->object_id = $value['object'];
                        $new_purchases->sum = $value['sum'];
                        $new_purchases->add_time = date('Y-m-d', strtotime($value['date']));
                        if($new_purchases->save()){
                            $find_purchases = MembersPurchases::find($new_purchases->id);
                            $object = Objects::find((int)$value['object']);
                            if (isset($object) && $object->name == 'Chimgan Hills') {
                                $find_purchases->shop_id = 0;
                                $find_purchases->type = 1;
                                $count = floor($value['sum']/10);
                                $arr_ides = [];
                                if ($count > 0) {
                                    for ($i = 1; $i <= $count; $i++) { 
                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        array_push($arr_ides, $coupons->order_id);
                                    }
                                }
                            }
                            else{
                                $find_purchases->type = 0;
                                $count = floor($value['sum']/1000000);
                                $arr_ides = [];
                                if ($count > 0) {
                                    for ($i = 1; $i <= $count; $i++) { 

                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        array_push($arr_ides, $coupons->order_id);
                                    }
                                }
                            }
                            $find_purchases->coupon = json_encode($arr_ides);                        
                            $find_purchases->save();
                        }
                    }

                }


                // ---------------------------------------------------------------- //
                
                $post = $_POST['Purchase'][0];
                

                if (isset($new_purchases) && !empty($new_purchases)) {
                    $sum = $new_purchases->sum;
                    $type = (int)$new_purchases->type;
                    $date = $new_purchases->add_time;


                    $find_sums = MembersSums::where(['pay_date' => $date, 'members_id' => $new_purchases->members_id,'object_id' => (int)$post['object']])->orderBy('id','desc')->first();


                    if ($find_sums != NULL) {
                        switch ($find_sums->object_id) {
                            case '1':
                                $old_sum = $find_sums->ecobozor;
                            break;
                            case '2':
                                $old_sum = $find_sums->chimgan;
                            break;
                            default:
                                $old_sum = $find_sums->chimgan_hills;
                            break;
                        }

                        $last_sum = $sum+$old_sum;
                        
                        // ecobozor, chimgan
                        if ($find_sums->object_id != 3) {
                            
                            $sum = 0;
                            $new_sum = $last_sum/1000000;
                            $new_sum = explode('.', $new_sum);

                            if ($last_sum >= 1000000) {
                                if ($find_sums->object_id == 1 && $find_sums->ecobozor != 0) {

                                    $ddd2 = floor($last_sum/1000000);
                                    $last_sum2 = $last_sum - (1000000*$ddd2);

                                    if($last_sum2 >= 1000000 || $post['sum'] < 1000000 || $last_sum2 == 0){

                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }


                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }

                                    }

                                }
                                else if ($find_sums->object_id == 2 && $find_sums->chimgan != 0) {


                                    $ddd2 = floor($last_sum/1000000);
                                    $last_sum2 = $last_sum - (1000000*$ddd2);

                                    if($last_sum2 >= 1000000 || $post['sum'] < 1000000 || $last_sum2 == 0){

                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }
                                    }

                                }

                                switch ($find_sums->object_id) {
                                    case '1':
                                        $find_sums->ecobozor = 0;
                                    break;
                                    case '2':
                                        $find_sums->chimgan = 0;
                                    break;
                                    default:
                                        $find_sums->chimgan_hills = 0;
                                    break;
                                }
                                $find_sums->save();
                                

                                if ($last_sum > 1000000) {

                                    $ddd = floor($last_sum/1000000);
                                    $last_sum = $last_sum - (1000000*$ddd);
                                    if ($last_sum > 0) {
                                        $new_members_sums = new MembersSums();
                                        $new_members_sums->members_id = $new_purchases->members_id;
                                        $new_members_sums->pay_date = $new_purchases->add_time;
                                        $new_members_sums->members_purchases_id = $new_purchases->id;
                                        $new_members_sums->object_id = $new_purchases->object_id;
                                        switch ($object->name) {
                                            case 'Ecobozor':
                                                $new_members_sums->ecobozor = $last_sum;
                                            break;
                                            case 'Chimgan':
                                                $new_members_sums->chimgan = $last_sum;
                                            break;
                                        }
                                        $new_members_sums->save();
                                    }
                                }
                                elseif ($last_sum == 1000000) {
                                    
                                }
                                else{

                                }
                            }
                            else{
                                switch ($find_sums->object_id) {
                                    case '1':
                                        $find_sums->ecobozor = 0;
                                    break;
                                    case '2':
                                        $find_sums->chimgan = 0;
                                    break;
                                    default:
                                        $find_sums->chimgan_hills = 0;
                                    break;
                                }
                                $find_sums->save();

                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $new_purchases->members_id;
                                $new_members_sums->pay_date = $new_purchases->add_time;
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                switch ($object->name) {
                                    case 'Ecobozor':
                                        $new_members_sums->ecobozor = $last_sum;
                                    break;
                                    case 'Chimgan':
                                        $new_members_sums->chimgan = $last_sum;
                                    break;
                                }
                                $new_members_sums->save();
                            }
                        }
                        // chimgan_hills
                        else{

                            $sum = 0;
                            $new_sum = $last_sum/10;
                            $new_sum = explode('.', $new_sum);

                            if ($last_sum >= 10) {
                                if ($find_sums->object_id == 3 && $find_sums->chimgan_hills != 0) {
                                    
                                    $ddd2 = floor($last_sum/10);
                                    $last_sum2 = $last_sum - (10*$ddd2);

                                    if($last_sum2 >= 10 || $post['sum'] < 10 || $last_sum2 == 0){
                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }

                                    }
                                }
                                

                                $find_sums->chimgan_hills = 0;
                                $find_sums->save();
                                

                                if ($last_sum > 10) {
                                    $ddd = floor($last_sum/10);
                                    $last_sum = $last_sum - (10*$ddd);
                                    if ($last_sum > 0) {
                                        $new_members_sums = new MembersSums();
                                        $new_members_sums->members_id = $new_purchases->members_id;
                                        $new_members_sums->pay_date = $new_purchases->add_time;
                                        $new_members_sums->members_purchases_id = $new_purchases->id;
                                        $new_members_sums->object_id = $new_purchases->object_id;
                                        $new_members_sums->chimgan_hills = $last_sum;
                                        $new_members_sums->save();
                                    }
                                }
                                elseif ($last_sum == 10) {
                                    
                                }
                                else{

                                }
                            }
                            else{
                                $find_sums->chimgan_hills = 0;
                                $find_sums->save();

                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $new_purchases->members_id;
                                $new_members_sums->pay_date = $new_purchases->add_time;
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                $new_members_sums->chimgan_hills = $last_sum;
                                $new_members_sums->save();
                            }


                        }

                    }
                    else{

                        

                        if ($object->name == 'Chimgan Hills') {
                            

                            // ------------------
                            $sum = 0;
                            $new_sum = $value['sum']/10;
                            $new_sum = explode('.', $new_sum);
                            
                            if (isset($new_sum[1])) {
                                $sum = (int)$new_sum[1];                                                                
                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $model->id;
                                $new_members_sums->pay_date = date('Y-m-d', strtotime($value['date']));
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->chimgan_hills = $sum;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                $new_members_sums->save();
                            }
                            // ------------------
                        }
                        else{
                            
                            // ------------------
                            $sum = 0;
                            $new_sum = $value['sum']/1000000;
                            $new_sum = explode('.', $new_sum);

                            if (isset($new_sum[1])) {
                                // bir mln dan katta bo'lsa
                                if ($value['sum'] > 1000000) {
                                    switch (strlen($new_sum[1])) {
                                        case '1':
                                            $sum = $new_sum[1].'00000';
                                        break;
                                        case '2':
                                            $sum = $new_sum[1].'0000';
                                        break;
                                        case '3':
                                            $sum = $new_sum[1].'000';
                                        break;
                                        case '4':
                                            $sum = $new_sum[1].'00';
                                        break;
                                        case '5':
                                            $sum = $new_sum[1].'0';
                                        break;
                                        case '6':
                                            $sum = $new_sum[1];
                                        break;
                                    }
                                    $sum = (int)$sum;
                                }
                                // bir mln dan kam bo'lsa
                                else{
                                    $sum = $value['sum'];                                
                                }


                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $model->id;
                                $new_members_sums->pay_date = date('Y-m-d', strtotime($value['date']));
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                switch ($object->name) {
                                    case 'Ecobozor':
                                        $new_members_sums->ecobozor = $sum;
                                    break;
                                    case 'Chimgan':
                                        $new_members_sums->chimgan = $sum;
                                    break;
                                }
                                $new_members_sums->save();
                            }
                            // ------------------
                                
                        }
                        

                    }
                    
                }
                
                // ---------------------------------------------------------------- //


            }
        }


        return redirect()->route('forthebuilder.members.show',$id);
    
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function Oneupdate(Request $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }


        $purchases = MembersPurchases::find((int)$_POST['id']);

        $id = $purchases->members_id;
        $purchases->shop_id = (int)$_POST['shop'];
        $purchases->object_id = (int)$_POST['object'];
        // $purchases->sum = $_POST['sum'];

        if (!empty($_POST['date'])) {
            $purchases->add_time = date('Y-m-d', strtotime($_POST['date']));
        }
        if($purchases->save()){
            // $coupons = MembersCoupons::where('members_purchases_id',(int)$_POST['id'])->get();
            // if (count($coupons) > 0) {
            //     foreach ($coupons as $key => $value) {
            //         $value->delete();
            //     }
            // }

            // $find_purchases = MembersPurchases::find($purchases->id);
            // $object = Objects::find((int)$_POST['object']);
            // if (isset($object) && $object->name == 'Chimgan Hills') {
            //     $find_purchases->shop_id = 0;
            //     $find_purchases->type = 1;
            //     $count = floor($_POST['sum']/10);
            //     $arr_ides = [];
            //     if ($count > 0) {
            //         for ($i = 1; $i <= $count; $i++) { 
            //             $coupons = new MembersCoupons();
            //             $coupons->members_purchases_id = $purchases->id;
            //             $coupons->members_id = $purchases->members_id;
            //             $coupons->save();
            //             array_push($arr_ides, $coupons->id);
            //         }
            //     }
            // }
            // else{
            //     $find_purchases->type = 0;
            //     $count = floor($_POST['sum']/1000000);
            //     $arr_ides = [];
            //     if ($count > 0) {
            //         for ($i = 1; $i <= $count; $i++) { 
            //             $coupons = new MembersCoupons();
            //             $coupons->members_purchases_id = $purchases->id;
            //             $coupons->members_id = $purchases->members_id;
            //             $coupons->save();
            //             array_push($arr_ides, $coupons->id);
            //         }
            //     }
            // }
            // $find_purchases->coupon = json_encode($arr_ides);                        
            // $find_purchases->save();


            
            
                
        }

        return redirect()->route('forthebuilder.members.show',$id);
    }

    


    public function deletePurchases(Request $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        if (isset($_GET['id'])) {
            $model = MembersPurchases::find((int)$_GET['id']);
            if (isset($model) && $model != NULL) {
                if($model->delete())
                    return ['status' => 'success'];
                else
                    pre($model->errors);
            }
        }
    }

    public function addPurchases()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        if (isset($_POST['Purchase']) && !empty($_POST['Purchase'])) {
            foreach ($_POST['Purchase'] as $key => $value) {
                if (!empty($value['date']) && !empty($value['sum'])) {
                    
                    $new_purchases = new MembersPurchases();
                    $new_purchases->user_id = Auth::user()->id;
                    $new_purchases->members_id = (int)$_POST['id'];
                    $new_purchases->shop_id = $value['shop'];
                    $new_purchases->object_id = $value['object'];
                    $new_purchases->sum = $value['sum'];
                    $new_purchases->add_time = date('Y-m-d', strtotime($value['date']));                    
                    if($new_purchases->save()){

                        $find_purchases = MembersPurchases::find($new_purchases->id);
                        $object = Objects::find((int)$value['object']);
                        
                        if (isset($object) && $object->name == 'Chimgan Hills') {
                            $find_purchases->shop_id = 0;
                            $find_purchases->type = 1;
                            $count = floor($value['sum']/10);
                            $arr_ides = [];
                            if ($count > 0) {
                                for ($i = 1; $i <= $count; $i++) {

                                    $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                    ->orderBy('id','desc')->first();

                                    if (empty($old_purchases) || $old_purchases == NULL) {
                                        $coupons = new MembersCoupons();
                                        $coupons->members_purchases_id = $new_purchases->id;
                                        $coupons->members_id = $new_purchases->members_id;
                                        $coupons->order_id = 1;
                                        $coupons->save();
                                    }
                                    else{
                                        if ($old_purchases->order_id == 141) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 160;
                                            $coupons->save();   
                                        }
                                        else{
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = ++$old_purchases->order_id;
                                            $coupons->save();      
                                        }
                                    } 

                                    
                                    array_push($arr_ides, $coupons->order_id);
                                }
                            }
                        }
                        else{
                            $find_purchases->type = 0;
                            $count = floor($value['sum']/1000000);
                            $arr_ides = [];
                            if ($count > 0) {
                                for ($i = 1; $i <= $count; $i++) { 
                                    $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                    ->orderBy('id','desc')->first();

                                    if (empty($old_purchases) || $old_purchases == NULL) {
                                        $coupons = new MembersCoupons();
                                        $coupons->members_purchases_id = $new_purchases->id;
                                        $coupons->members_id = $new_purchases->members_id;
                                        $coupons->order_id = 1;
                                        $coupons->save();
                                    }
                                    else{
                                        if ($old_purchases->order_id == 141) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 160;
                                            $coupons->save();   
                                        }
                                        else{
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = ++$old_purchases->order_id;
                                            $coupons->save();      
                                        }
                                    }

                                    array_push($arr_ides, $coupons->order_id);
                                }
                            }
                        }
                        $find_purchases->coupon = json_encode($arr_ides);                        
                        $find_purchases->save();
                    }
                }
            }

            // ---------------------------------------------------------------- //
                
                $post = $_POST['Purchase'][1];
                

                if (isset($new_purchases) && !empty($new_purchases)) {
                    $sum = $new_purchases->sum;
                    $type = (int)$new_purchases->type;
                    $date = $new_purchases->add_time;


                    $find_sums = MembersSums::where(['pay_date' => $date, 'members_id' => $new_purchases->members_id,'object_id' => (int)$post['object']])->orderBy('id','desc')->first();


                    if ($find_sums != NULL) {
                        switch ($find_sums->object_id) {
                            case '1':
                                $old_sum = $find_sums->ecobozor;
                            break;
                            case '2':
                                $old_sum = $find_sums->chimgan;
                            break;
                            default:
                                $old_sum = $find_sums->chimgan_hills;
                            break;
                        }

                        $last_sum = $sum+$old_sum;
                        
                        // ecobozor, chimgan
                        if ($find_sums->object_id != 3) {
                            
                            $sum = 0;
                            $new_sum = $last_sum/1000000;
                            $new_sum = explode('.', $new_sum);

                            if ($last_sum >= 1000000) {
                                if ($find_sums->object_id == 1 && $find_sums->ecobozor != 0) {

                                    $ddd2 = floor($last_sum/1000000);
                                    $last_sum2 = $last_sum - (1000000*$ddd2);

                                    if($last_sum2 >= 1000000 || $post['sum'] < 1000000 || $last_sum2 == 0){

                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }


                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }

                                    }

                                }
                                else if ($find_sums->object_id == 2 && $find_sums->chimgan != 0) {


                                    $ddd2 = floor($last_sum/1000000);
                                    $last_sum2 = $last_sum - (1000000*$ddd2);

                                    if($last_sum2 >= 1000000 || $post['sum'] < 1000000 || $last_sum2 == 0){

                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }
                                    }

                                }

                                switch ($find_sums->object_id) {
                                    case '1':
                                        $find_sums->ecobozor = 0;
                                    break;
                                    case '2':
                                        $find_sums->chimgan = 0;
                                    break;
                                    default:
                                        $find_sums->chimgan_hills = 0;
                                    break;
                                }
                                $find_sums->save();
                                

                                if ($last_sum > 1000000) {

                                    $ddd = floor($last_sum/1000000);
                                    $last_sum = $last_sum - (1000000*$ddd);
                                    if ($last_sum > 0) {
                                        $new_members_sums = new MembersSums();
                                        $new_members_sums->members_id = $new_purchases->members_id;
                                        $new_members_sums->pay_date = $new_purchases->add_time;
                                        $new_members_sums->members_purchases_id = $new_purchases->id;
                                        $new_members_sums->object_id = $new_purchases->object_id;
                                        switch ($object->name) {
                                            case 'Ecobozor':
                                                $new_members_sums->ecobozor = $last_sum;
                                            break;
                                            case 'Chimgan':
                                                $new_members_sums->chimgan = $last_sum;
                                            break;
                                        }
                                        $new_members_sums->save();
                                    }
                                }
                                elseif ($last_sum == 1000000) {
                                    
                                }
                                else{

                                }
                            }
                            else{
                                switch ($find_sums->object_id) {
                                    case '1':
                                        $find_sums->ecobozor = 0;
                                    break;
                                    case '2':
                                        $find_sums->chimgan = 0;
                                    break;
                                    default:
                                        $find_sums->chimgan_hills = 0;
                                    break;
                                }
                                $find_sums->save();

                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $new_purchases->members_id;
                                $new_members_sums->pay_date = $new_purchases->add_time;
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                switch ($object->name) {
                                    case 'Ecobozor':
                                        $new_members_sums->ecobozor = $last_sum;
                                    break;
                                    case 'Chimgan':
                                        $new_members_sums->chimgan = $last_sum;
                                    break;
                                }
                                $new_members_sums->save();
                            }
                        }
                        // chimgan_hills
                        else{

                            $sum = 0;
                            $new_sum = $last_sum/10;
                            $new_sum = explode('.', $new_sum);

                            if ($last_sum >= 10) {
                                if ($find_sums->object_id == 3 && $find_sums->chimgan_hills != 0) {
                                    
                                    $ddd2 = floor($last_sum/10);
                                    $last_sum2 = $last_sum - (10*$ddd2);

                                    if($last_sum2 >= 10 || $post['sum'] < 10 || $last_sum2 == 0){
                                        $old_purchases = MembersCoupons::where('order_id','!=',NULL)
                                        ->orderBy('id','desc')->first();

                                        if (empty($old_purchases) || $old_purchases == NULL) {
                                            $coupons = new MembersCoupons();
                                            $coupons->members_purchases_id = $new_purchases->id;
                                            $coupons->members_id = $new_purchases->members_id;
                                            $coupons->order_id = 1;
                                            $coupons->save();
                                        }
                                        else{
                                            if ($old_purchases->order_id == 141) {
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = 160;
                                                $coupons->save();   
                                            }
                                            else{
                                                $coupons = new MembersCoupons();
                                                $coupons->members_purchases_id = $new_purchases->id;
                                                $coupons->members_id = $new_purchases->members_id;
                                                $coupons->order_id = ++$old_purchases->order_id;
                                                $coupons->save();      
                                            }
                                        }

                                        $last_new_purchases = MembersPurchases::find($new_purchases->id);
                                        $arr_ides = [];
                                        if (isset($last_new_purchases)) {
                                            $arr_ides[] = $last_new_purchases->coupon;
                                            array_push($arr_ides, $coupons->order_id);
                                            $last_new_purchases->coupon = json_encode($arr_ides);
                                            $last_new_purchases->save();
                                        }

                                    }
                                }
                                

                                $find_sums->chimgan_hills = 0;
                                $find_sums->save();
                                

                                if ($last_sum > 10) {
                                    $ddd = floor($last_sum/10);
                                    $last_sum = $last_sum - (10*$ddd);
                                    if ($last_sum > 0) {
                                        $new_members_sums = new MembersSums();
                                        $new_members_sums->members_id = $new_purchases->members_id;
                                        $new_members_sums->pay_date = $new_purchases->add_time;
                                        $new_members_sums->members_purchases_id = $new_purchases->id;
                                        $new_members_sums->object_id = $new_purchases->object_id;
                                        $new_members_sums->chimgan_hills = $last_sum;
                                        $new_members_sums->save();
                                    }
                                }
                                elseif ($last_sum == 10) {
                                    
                                }
                                else{

                                }
                            }
                            else{
                                $find_sums->chimgan_hills = 0;
                                $find_sums->save();

                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $new_purchases->members_id;
                                $new_members_sums->pay_date = $new_purchases->add_time;
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                $new_members_sums->chimgan_hills = $last_sum;
                                $new_members_sums->save();
                            }


                        }

                    }
                    else{

                        

                        if ($object->name == 'Chimgan Hills') {
                            

                            // ------------------
                            $sum = 0;
                            $new_sum = $value['sum']/10;
                            $new_sum = explode('.', $new_sum);
                            
                            if (isset($new_sum[1])) {
                                $sum = (int)$new_sum[1];                                                                
                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $model->id;
                                $new_members_sums->pay_date = date('Y-m-d', strtotime($value['date']));
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->chimgan_hills = $sum;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                $new_members_sums->save();
                            }
                            // ------------------
                        }
                        else{
                            
                            // ------------------
                            $sum = 0;
                            $new_sum = $value['sum']/1000000;
                            $new_sum = explode('.', $new_sum);

                            if (isset($new_sum[1])) {
                                // bir mln dan katta bo'lsa
                                if ($value['sum'] > 1000000) {
                                    switch (strlen($new_sum[1])) {
                                        case '1':
                                            $sum = $new_sum[1].'00000';
                                        break;
                                        case '2':
                                            $sum = $new_sum[1].'0000';
                                        break;
                                        case '3':
                                            $sum = $new_sum[1].'000';
                                        break;
                                        case '4':
                                            $sum = $new_sum[1].'00';
                                        break;
                                        case '5':
                                            $sum = $new_sum[1].'0';
                                        break;
                                        case '6':
                                            $sum = $new_sum[1];
                                        break;
                                    }
                                    $sum = (int)$sum;
                                }
                                // bir mln dan kam bo'lsa
                                else{
                                    $sum = $value['sum'];                                
                                }


                                $new_members_sums = new MembersSums();
                                $new_members_sums->members_id = $model->id;
                                $new_members_sums->pay_date = date('Y-m-d', strtotime($value['date']));
                                $new_members_sums->members_purchases_id = $new_purchases->id;
                                $new_members_sums->object_id = $new_purchases->object_id;
                                switch ($object->name) {
                                    case 'Ecobozor':
                                        $new_members_sums->ecobozor = $sum;
                                    break;
                                    case 'Chimgan':
                                        $new_members_sums->chimgan = $sum;
                                    break;
                                }
                                $new_members_sums->save();
                            }
                            // ------------------
                                
                        }
                        

                    }
                    
                }
                
                // ---------------------------------------------------------------- //
            
        }

        return redirect()->route('forthebuilder.members.show',(int)$_POST['id']);
    }

    
    public function deleteMember(Request $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        if (isset($_GET['id'])) {
            $model = MembersPurchases::where('members_id',(int)$_GET['id'])->get();
            if (!empty($model) && $model != NULL) {
                foreach ($model as $key => $value) {
                    $value->delete();
                }
            }

            $sums = MembersSums::where('members_id',(int)$_GET['id'])->get();
            if (!empty($sums) && $sums != NULL) {
                foreach ($sums as $key => $value) {
                    $value->delete();
                }
            }

            $coupons = MembersCoupons::where('members_id',(int)$_GET['id'])->get();
            if (!empty($coupons) && $coupons != NULL) {
                foreach ($coupons as $key => $value) {
                    $value->delete();
                }
            }

            $member = Members::find((int)$_GET['id']);
            if (isset($member)) {
                if($member->delete())
                    return ['status' => 'success'];
            }
        }
    }

    public function search(Request $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $text = htmlspecialchars($_GET['text']);
        if (!empty($text)) {


            $model = Members::whereRaw("lower(full_name) like ? OR lower(first_name) like ? OR lower(last_name) like ? OR lower(middle_name) like ? OR lower(phone) like ?", array('%'.$text.'%','%'.$text.'%','%'.$text.'%','%'.$text.'%','%'.$text.'%'))
            ->orderBy('id', 'desc')
            ->paginate(20);    
        }
        else{
            $model = Members::orderBy('id','desc')->paginate(20);
        }
        
        
        return (string) view('forthebuilder::members.search', [
            'model' => $model,            
        ]);
    }

    // change-objects
    public function changeObjects(Request $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        if($_GET['id']){
            $shops = Shops::where('object_id',(int)$_GET['id'])->get();
            $object = Objects::find((int)$_GET['id']);

            $html = '';
            if ($object->name == 'Chimgan Hills') {
                return 'hills';
            }
            else{
                if (count($shops) > 0) {
                    foreach ($shops as $key => $value) {
                        $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
                    }
                }
            }

            return $html;
        }
    }

    public function updatePurchases(Request $request)
    {
        $purchases = MembersPurchases::find((int)$_GET['id']);
        if (isset($purchases)) {
            $objects = Objects::all();
            $shops = Shops::where('object_id',$objects[0]->id)->get();
            
            return (string) view('forthebuilder::members.update', [
                'purchases' => $purchases,            
                'objects' => $objects,            
                'shops' => $shops,            
            ]);
        }
    }



}
