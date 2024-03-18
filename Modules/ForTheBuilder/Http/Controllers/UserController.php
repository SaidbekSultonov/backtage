<?php

namespace Modules\ForTheBuilder\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\components\ImageResize;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\ForTheBuilder\Entities\Deal;
use Modules\ForTheBuilder\Entities\Notification_;
use Modules\ForTheBuilder\Entities\Task;
use Modules\ForTheBuilder\Entities\House;
use Modules\ForTheBuilder\Entities\Shops;
use Modules\ForTheBuilder\Http\Requests\ForTheBuilderUserRequest;
use Modules\ForTheBuilder\Entities\Constants;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }   
        $models = User::where('id','!=',25)->orderBy('id','desc')->paginate(20);

        return view('forthebuilder::user.index',[
            'models' => $models,
        ]);
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $roles = Role::where('id',3);
        if (Auth::user()->role_id == 1) {
            $roles = $roles->orWhere('id',1);    
        }
        $roles = $roles->get();
        
        $domain = $_SERVER['SERVER_NAME'];

        return view('forthebuilder::user.create',[
            'roles' => $roles,
            'domain' => $domain,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForTheBuilderUserRequest $request)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $data = $request->validated();
        $data['status'] = 2;
        $data['password'] = Hash::make($data['password']);
        $image = $data['avatar'] ?? '';
        if (!empty($image)) {
            $imageName = md5(time().$image).'.'.$image->getClientOriginalExtension();
            $data['avatar'] = $imageName;
        }

        // $data['gender'] = (int)$_POST['gender'];

        if (!empty($data['phone_number'])) {
            $data['phone_number'] = preg_replace('/[^0-9]/', '', $data['phone_number']);                
        }

        $data['birth_date'] = ((isset($data['birth_date']) && !empty($data['birth_date'])) ? date('Y-m-d', strtotime($data['birth_date'])) : NULL);
        $model = User::create($data);
        
        if (!empty($image)) {
            //bu yerda orginal rasm yuklanyapti ochilgan papkaga
            $image->move(public_path('uploads/user/'.$model->id),$imageName);

            //bu yerda orginal rasm  app/components/imageresize.php fayliga kesiladigan rasm manzili ko'rsatilyapti
            $imageR = new ImageResize( public_path('uploads/user/'.$model->id . '/' . $imageName));

            //bu yerda orginal rasm  app/components/imageresize.php fayli orqali kesilyapti
            $imageR->resizeToBestFit(config('params.medium_image.width'), config('params.medium_image.width'))->save(public_path('uploads/user/'.$model->id . '/s_' . $imageName));
            //bu yerda orginal rasm  o'chirilyapti.chunki endi bizga kerakmas orginali biz o'zimizga kerkligicha kesib oldik
            File::delete(public_path('uploads/user/'.$model->id.'/'.$imageName));

        }
        Log::channel('action_logs2')->info("пользователь создал новую Пользователь : " . $model->first_name."",['info-data'=>$model]);

        return redirect()->route('forthebuilder.user.index')->with('success', __('locale.successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = User::findOrfail($id);


        
        $user = Auth::user();
        if(Gate::allows('isAdmin')){
            $users = User::where('status',2)->where('id', '!=', $user->id)->orderBy('id','desc')->paginate(config('params.pagination'));
        }else{
            $users = User::where('status',2)->where('id', '!=', $user->id)->where('role_id', 2)->orderBy('id','desc')->paginate(config('params.pagination'));
        }
        $my_tasks = Task::where('performer_id', $id)->get();
        $tasks = count(Task::where('performer_id', $id)->get());
        $tasks_ended = count(Task::where('performer_id', $id)->where('status', 1)->get());
        $tasks_not_ended = count(Task::where('performer_id', $id)->where('status', NULL)->get());
        $task_count = [];
        $task_count['count'] = [];
        $task_count['task_date'] = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $monthly_count = [];
        if(!empty($my_tasks)){
            foreach($my_tasks as $task){
                $task_array = explode('-',$task->task_date);
                if($task_array[0] == date('Y')){
                    $task_count['task_date'][] = $task_array[1];
                    $taskcount = count(Task::where('task_date', $task->task_date)->get());
                    $task_count['count'][] = $taskcount;
                }
            }
            if(!empty($task_count['task_date'])){
                $monthly_count = array_count_values($task_count['task_date']);
            }
        }


        // statistics
        $connect_for=Constants::FOR_1;
        $connect_new=Constants::NEW_1;


            
        $new_users = DB::table($connect_for.'.deals as dt1')
        ->where('dt1.deleted_at',NULL)
        ->where('dt1.type',Constants::FIRST_CONTACT)
        ->where('dt1.user_id',$id)
        ->count();

        
        

        $in_negotiations=DB::table($connect_for.'.deals as dt1')
        ->where('dt1.deleted_at',NULL)
        ->where('dt1.type',Constants::NEGOTIATION)
        ->where('dt1.user_id',$id)
        ->count();



        $make_deal=DB::table($connect_for.'.deals as dt1')
        ->where('dt1.deleted_at',NULL)
        ->where('dt1.type',Constants::MAKE_DEAL)
        ->where('dt1.user_id',$id)
        ->count();



        $date=Carbon::now()->format('Y-m-d');
        $today=DB::table($connect_for.'.task as task')
        ->where('task.task_date','=',$date)
        ->where('task.user_id',$id)
        ->where('task.status',0)
        ->count();

        $datetime = date("Y-m-d", strtotime('tomorrow'));
        $tomorrow=DB::table($connect_for.'.task as task')
        ->where('task.task_date','=',$datetime)
        ->where('task.user_id',$id)
        ->where('task.status',0)
        ->count();
        
        $day_after_a_week=Carbon::now()->addDay(7)->format('Y-m-d');
        $week=DB::table($connect_for.'.task as task')
        ->where('task.task_date','<',$day_after_a_week)
        ->where('task.user_id',$id)
        ->where('task.task_date','>=',$date)
        ->where('task.status',0)
        ->count();

        $full_task=DB::table($connect_for.'.task as task')
        ->where('task.task_date','>=',$date)
        ->where('task.user_id',$id)
        ->where('task.status',0)
        ->count();
        
        $overdue_tasks=DB::table($connect_for.'.task as task')
        ->where('task.task_date','<',$date)
        ->where('task.user_id',$id)
        ->where('task.status',0)
        ->count();


        $month_prices = DB::table($connect_for.'.deals as dt1')
        ->join($connect_for.'.house_flat as dt2', 'dt2.id', '=', 'dt1.house_flat_id')
        ->join($connect_new.'.users as dt3', 'dt3.id', '=', 'dt1.user_id')
        ->where('dt2.status',Constants::STATUS_SOLD)               
        ->where('dt1.user_id',$id)
        ->orderBy('dt3.id', 'desc')
        ->select('dt3.id','dt1.price_sell','dt1.date_deal','dt3.first_name','dt3.last_name')
        ->get();


        $price=0;
        $priceArr=[];
        for ($j=0; $j <= 11; $j++) { 
            $priceArr[$j] = 0;
        }
        
        $year=Carbon::now()->format('y');
        $month=Carbon::now()->format('m');
        $last_date = cal_days_in_month(CAL_GREGORIAN, $month,$year);

        $price_day_array = [];
        $month_day = [];
        for ($i=0; $i <= $last_date; $i++) { 
            $price_day_array[$i] = 0;
            $month_day[$i] = $i;
        }
        $core_chart="";
        $in = [];
        foreach ($month_prices as  $value) {
            $myDate = date('Y-m-d',strtotime($value->date_deal));
            $date_table = Carbon::createFromFormat('Y-m-d', $myDate);
            $month_code = $date_table->format('n');
            $date_day=Carbon::now()->format('m');
            $month_code_day = $date_table->format('j');
            if ($month_code==$date_day) {
                $in[$value->id]['first_name'] = $value->first_name;
                $in[$value->id]['price_sell'] = ($in[$value->id]['price_sell'] ?? 0) + $value->price_sell;
            }
            
            if ($month_code==$date_day) {
                $price_day_array[$month_code_day-1] +=$value->price_sell;
            }
            
            $priceArr[$month_code-1] += $value->price_sell;
            $price +=$value->price_sell;
        }
        
        $core_chart ="['".translate('New Clients')."',".$new_users."],['".translate('For a negotiation')."',".$in_negotiations."],['".translate('Making a deal')."',".$make_deal."]";

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
        
        $all_clients_count = DB::table($connect_for.'.deals as dt1')
        ->where('dt1.deleted_at',NULL)
        ->where('dt1.user_id',$id)
        ->count();
            
        $all_deals_count = DB::table($connect_for.'.deals')
        ->where('deleted_at',NULL)
        ->where('user_id',$id)
        ->count();
        
        $all_tasks_count = DB::table($connect_for.'.task')
        ->where('user_id',$id)
        ->where('deleted_at',NULL)
        ->count();
        
        $source = DB::table($connect_for.'.clients')
        ->select('source', DB::raw('count(*) as total'))
        ->groupBy('source')
        ->where('user_id',$id)
        ->where('source','!=',null)
        ->get();
        
        $source_name = [];
        $source_data = [];
        $source_color = [];
        if(!empty($source)){
             foreach ($source as $key => $value) {
                array_push($source_name, $value->source);
                array_push($source_data, $value->total);
                array_push($source_color, 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')');
            }
        }

        $data=[
           'date_today'=>$date,
           'new_clients'=>$new_users, // Новые клиенты
           'in_negotiations'=>$in_negotiations, // На переговорах
           'make_deal'=>$make_deal, // Заключение сделки
           'today'=>$today,
           'tomorrow'=>$tomorrow,
           'week'=>$week,
           'full_task'=>$full_task,
           'overdue_tasks'=>$overdue_tasks,
           'price'=>$price,
           'month_sales_price'=>$priceArr,
           'month_day'=>$month_day,
           'price_day_array'=>$price_day_array,
           'core_chart'=>$core_chart,
            'all_clients_count' => $all_clients_count,
            'all_deals_count' => $all_deals_count,
            'all_tasks_count' => $all_tasks_count,
            'source_name' => json_encode($source_name),
           'source_data' => json_encode($source_data),
           'source_color' => json_encode($source_color)
        ];

        $line_month = '';
        foreach ($months as $key => $value) {
            $line_month .= $value.",";
        }
        $line_month = rtrim($line_month,",");
        
        
        $names = [translate('New Clients'),translate('For a negotiation'),translate('Making a deal')];
        $counts = [$new_users, $in_negotiations, $make_deal];
        $colors = ['#FF9D9D','#F7FF9D','#B1FF9D'];

        return view('forthebuilder::user.show',[
            'id' => $id,
            'data' => $data,
            'model' => $model,
            'users' => $users,
            'user' => $user,
            'tasks' => $tasks,
            'names' => json_encode($names),
            'counts' => json_encode($counts),
            'colors' => json_encode($colors),
            'tasks_ended' => $tasks_ended,
            'tasks_not_ended' => $tasks_not_ended,
            'monthly_count' => $monthly_count,
            'my_tasks' => $my_tasks,
            'task_count' => $task_count,
            'line_month' => $line_month,
            'months'=> json_encode($months),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $model = User::findOrfail($id);
        $roles = Role::all();
        $domain = $_SERVER['SERVER_NAME'];

        return view('forthebuilder::user.edit',[
            'model' => $model,
            'roles' => $roles,
            'domain' => $domain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ForTheBuilderUserRequest $request, $id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $data = $request->validated();
        $user = Auth::user();
        $model = User::findOrFail($id);
        $deals = Deal::where('user_id',$user->id)->get();
        $model->first_name = $data['first_name'];
        $model->last_name = $data['last_name'];
        $model->middle_name = $data['middle_name'];
        
        if (isset($data['status'])) {
            if ($model->status == 10) 
                $model->status = 10;
            else 
                $model->status = $data['status'];    
        }
        
        
        $model->email = $data['email'];
        $model->role_id = $data['role_id'];

        $data['birth_date'] = ((isset($data['birth_date']) && !empty($data['birth_date'])) ? date('Y-m-d', strtotime($data['birth_date'])) : NULL);

        $model->birth_date = $data['birth_date'];

        if (!empty($data['phone_number'])) {
            $model->phone_number = preg_replace('/[^0-9]/', '', $data['phone_number']);                
        }

        $model->gender = $data['gender'];
        $model->save();

        if(!empty($request->input('current_password')) && !empty($request->input('password'))) {
            if(!Hash::check($request->input('current_password'), $model->password)){
                return back()->with('current_password', 'Current password does not match!');
            }else{
                $model->fill(['password' => Hash::make($request->input('password'))])->save();
            }
        }
        if (isset($data['avatar']))
        {
            $image = $data['avatar'];
            $image_old = $model->avatar;
            $imageName = md5(time().$image).'.'.$image->extension();

            //bu yerda orginal rasm yuklanyapti ochilgan papkaga
            $image->move(public_path('uploads/user/'.$model->id),$imageName);

            //bu yerda orginal rasm  app/components/imageresize.php fayliga kesiladigan rasm manzili ko'rsatilyapti
            $imageR = new ImageResize( public_path('uploads/user/'.$model->id . '/' . $imageName));

            //bu yerda orginal rasm  app/components/imageresize.php fayli orqali kesilyapti
            $imageR->resizeToBestFit(config('params.medium_image.width'), config('params.medium_image.width'))->save(public_path('uploads/user/'.$model->id . '/s_' . $imageName));
            //bu yerda orginal rasm  o'chirilyapti.chunki endi bizga kerakmas orginali biz o'zimizga kerkligicha kesib oldik
            File::delete(public_path('uploads/user/'.$model->id.'/'.$imageName));

            if (!empty($image_old)) {
                File::delete(public_path('uploads/user/'.$model->id.'/s_'.$image_old));
            }
            $model->avatar = $imageName;
            $model->save();
        }
        else{
            $data['avatar'] = NULL;
            $imageName = "";
        }
        if(count($deals)>0){
            foreach ($deals as $deal){
                if($model->first_name != $data['first_name'] || $model->avatar != $data['avatar']) {
                    $deal_history_array = [];
                    if (!is_array($deal->history)) {
                        $deal_history = json_decode($deal->history);
                        if(isset($deal_history) && count($deal_history)>0){
                            foreach ($deal_history as $d_history){
                                $deal_history_array[] = ['date' => $d_history->date, 'user' => $data['first_name'], 'user_id' => $user->id, 'user_photo' => $imageName, 'new_type' => $d_history->new_type??'', 'old_type' => $d_history->old_type??''];
                            }
                        }
                    }else{
                        $deal_history = $deal->history;
                        if(isset($deal_history) && count($deal_history)>0){
                            foreach ($deal_history as $d_history){
                                $deal_history_array[] = ['date' => $d_history->date, 'user' => $data['first_name'], 'user_id' => $user->id, 'user_photo' => $imageName, 'new_type' => $d_history->new_type??'', 'old_type' => $d_history->old_type??''];
                            }
                        }
                    }
                    $deal->history = json_encode($deal_history_array);
                    $deal->save();
                }
            }
        }

        Log::channel('action_logs2')->info("пользователь обновил ".$model->first_name." Пользователь",['info-data'=>$model]);

        return redirect()->route('forthebuilder.user.index')->with('success', __('locale.successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }
        $user = User::findOrFail($id);
        if($user->id != Auth::user()->id) $user->delete();

        Log::channel('action_logs2')->info("пользователь удалил ".$user->first_name." Пользователь",['info-data'=>$user]);

        return redirect()->route('forthebuilder.user.index')->with('success', __('locale.deleted'));
    }


    

    public function changeSetting(Request $request)
    {
        if(!empty($_POST)){
            $arr = [];
            foreach($_POST as $key => $value){
                $arr[] = [
                    str_replace('-', '_', $key) => $value
                ];
            }

            $json = json_encode($arr);
            $user = Auth::user();
            $user->settings = $json;
            if ($user->save()) {
                return ['status' => 'success', 'message' => translate('Your theme has been successfully changed')];
            }
            else{
                return ['status' => 'fail', 'message' => translate('Error, not saved!')];
            }

        }
        else{
            return false;
        }
    }

    public function resetSetting(Request $request)
    {
        if(!empty($_POST)){

            $user = Auth::user();
            $user->settings = NULL;
            if ($user->save()) {
                return ['status' => 'success', 'message' => translate('Your theme has been successfully changed')];
            }
            else{
                return ['status' => 'fail', 'message' => translate('Error, not saved!')];
            }

        }
        else{
            return false;
        }
    }
    
    
    public function reportHousesIndex($id){
        if(Auth::user() == NULL){
            return redirect()->route('login');
        }

        $shop = Shops::find($id);
        $model = DB::select('SELECT sum(sum) AS total, add_time FROM members_purchases 
        WHERE shop_id = '.$id.' GROUP BY add_time ORDER BY add_time ASC');

        return view('forthebuilder::user.report-houses-index',[
            'model' => $model,
            'shop' => $shop,
        ]);
    }

    
}
