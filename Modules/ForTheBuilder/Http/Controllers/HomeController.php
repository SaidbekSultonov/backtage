<?php

namespace Modules\ForTheBuilder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Modules\ForTheBuilder\Entities\Members;
use Modules\ForTheBuilder\Entities\Shops;
use Modules\ForTheBuilder\Entities\Objects;
use Modules\ForTheBuilder\Entities\MembersPurchases;
use Modules\ForTheBuilder\Entities\MembersCoupons;
use Modules\ForTheBuilder\Entities\MembersSums;
use Illuminate\Support\Facades\DB;
use Modules\ForTheBuilder\Entities\Constants;
use Modules\ForTheBuilder\Entities\Notification_;
use Modules\ForTheBuilder\Http\Requests\MembersRequest;
use Modules\ForTheBuilder\Http\Requests\MembersPurchasesRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use Storage;

function getBetweenDates($startDate, $endDate) {
    $rangArray = [];
 
    $startDate = strtotime($startDate);
    $endDate = strtotime($endDate);
 
    for ($currentDate = $startDate; $currentDate <= $endDate; $currentDate += (86400)) {
        $date = date('d.m', $currentDate);
        $rangArray[] = $date;
    }
 
    return $rangArray;
}


class HomeController extends Controller
{
    
    public function index()
    {        

        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $months = [
            translate('January'), 
            translate('February'), 
            translate('March'), 
            translate('April'), 
            translate('May'), 
            translate('June'), 
            translate('July'), 
            translate('August'), 
            translate('September'), 
            translate('October'), 
            translate('November'), 
            translate('December')
        ];
        $line_month = '';
        foreach ($months as $key => $value) {
            $line_month .= $value.",";
        }
        $line_month = rtrim($line_month,",");

        $count_members = Members::count();
        $count_shops = Shops::count();
        $count_users = User::where('id','!=',25)->count();
        $count_objects = Objects::count();
        

        return view('forthebuilder::home.index',[
            'line_month'=>$line_month,
            'count_members'=>$count_members,
            'count_shops'=>$count_shops,
            'count_users'=>$count_users,
            'count_objects'=>$count_objects,
        ]);
    }

    public function filtr($date)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $months = [
            translate('January'), 
            translate('February'), 
            translate('March'), 
            translate('April'), 
            translate('May'), 
            translate('June'), 
            translate('July'), 
            translate('August'), 
            translate('September'), 
            translate('October'), 
            translate('November'), 
            translate('December')
        ];

        $line_month = '';
        foreach ($months as $key => $value) {
            $line_month .= $value.",";
        }
        $line_month = rtrim($line_month,",");
        

        $count_members = Members::count();
        $count_shops = Shops::count();

        return view('forthebuilder::home.filtr',[
            'line_month'=>$line_month,
            'count_members'=>$count_members,
            'count_shops'=>$count_shops,
        ]);
    }

    public function store(MembersRequest $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $data = $request->validated();

        if(!isset($_POST['Purchase']) || !isset($_POST['Purchase'][0]['sum']) || $_POST['Purchase'][0]['sum'] < 0){
            Session::flash('message', translate('Вы указали неправильную сумму!')); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }

        if (!empty($_POST['Purchase'])) {
            foreach ($_POST['Purchase'] as $key => $value) {
                if (empty($value['shop'])) {
                    Session::flash('message', translate('Вы не выбрали магазин!')); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return redirect()->back();
                }
            }
        }


        $model = new Members();
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

                            if ($object->name == 'Chimgan Hills') {
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
                            $find_purchases->coupon = json_encode($arr_ides);                        
                            $find_purchases->save();
                        }
                    }

                }
            }
        }


        return redirect()->route('forthebuilder.members.index');
    }

    
}
