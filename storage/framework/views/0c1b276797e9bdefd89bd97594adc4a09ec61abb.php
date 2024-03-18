<?php $__env->startSection('title'); ?> <?php echo e(__('locale.apartment_sale')); ?>  <?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>  <?php echo e(translate('User show')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $current_user = \Illuminate\Support\Facades\Auth::user();
    use Modules\ForTheBuilder\Entities\Constants;

    $date1 = $model->last_seen;
    $date2 = time();
    $mins = round(($date2 - $date1) / 60);

?>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style>
#chat_area
{
	min-height: 300px;
	/*overflow-y: scroll*/;
}

#chat_history
{
    width: 100%;
	min-height: 200px; 
	max-height: 230px; 
	overflow-y: scroll; 
	margin-bottom:16px; 
	background-color: #ffffff;
	padding: 16px;
}

#user_list
{
	min-height: 500px; 
	max-height: 750px; 
	overflow-y: scroll;
}
.sender_chat
{
    background-color: #94B2EB !important;
    border-radius: 20px !important;
}
.recever_chat
{
    background-color: #E8F0FF !important;
    border-radius: 20px !important;
}
.content_center {
  display: flex;
  justify-content: center !important;
  align-items: center !important; 

}
.greenChartGreenRadius{
    display: block;
    width: 10px;
    height: 10px;
    background: #65AE37;
    margin-top: 5px;
}
.greenChartRedRadius{
    display: block;
    width: 10px;
    height: 10px;
    background: red;
    margin-top: 5px;
}
#circleCharts{
    position: absolute !important;
    left: -35px;

}
.view_data{
    transition: .3s;
    cursor: pointer;
}
.view_data:hover{
    box-shadow: 0 0 10px grey;
}
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row  align-items-center w-100">
                        <div class="col-md-8 d-flex align-items-center">                            
                            <h4 class="me-3">
                                <?php echo e(translate('Profile')); ?>

                            </h4>
                        </div>
                        <div class="col-md-4">
                            <div class="ml-auto d-flex align-items-center" id="CurrentDayToday">
                                <h4><?php echo e(translate('Period')); ?>: </h4>
                                <input type="text" class="ms-2 form-control daterange" value="<?php echo e(date('01.m.Y').' - '.date('t.m.Y')); ?>">
                            </div> 
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 d-flex">
                                    <div class="d-flex align-items-center">
                                        <?php if($model->role_id != Constants::SUPERADMIN): ?>
                                            <?php if(isset($model->id)): ?>
                                                <?php
                                                    $sms_avatar = public_path('uploads/user/'.$model->id.'/s_'.$model->avatar);
                                                ?>
                                                <?php if(file_exists($sms_avatar)): ?>
                                                    <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3"
                                                         src="<?php echo e(asset('uploads/user/'.$model->id.'/s_'.$model->avatar)); ?>"
                                                         alt="">
                                                <?php else: ?>
                                                    <?php
                                                        $gender_img = 'men.png';
                                                        if ($model->gender == 2) {
                                                            $gender_img = 'women.png';
                                                        }
                                                    ?>
                                                    <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3" src="<?php echo e(asset('/backend-assets/img/'.$gender_img)); ?>" alt="">
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3" src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" alt="">
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('/backend-assets/img/superadmin.png')); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div>
                                        <h4 class="profileNameData"><?php echo e($model->first_name.' '); ?> <?php echo e($model->last_name.' '); ?> <?php echo e($model->middle_name); ?></h4>
                                        <p class="profileOtherData my-0"><?php echo e($model->role->name); ?></p>
                                        <p class="profileOtherData my-0">
                                            <?php
                                                if(isset($model->birth_date)){
                                                    $birth_date_array = explode(' ', $model->birth_date);
                                                    $now_time = strtotime('now');
                                                    $birth_time = strtotime($model->birth_date);
                                                    $month = date('m', ($now_time));
                                                    $day = date('d', ($now_time));
                                                    $birth_month = date('m', ($birth_time));
                                                    $birth_date = date('d', ($birth_time));
                                                    $year = date('Y', ($now_time));
                                                    $birth_year = date('Y', ($birth_time));
                                                    $year_old = 0;
                                                    if($year > $birth_year){
                                                        $year_old = $year - $birth_year - 1;
                                                        if($month > $birth_month){
                                                            $year_old = $year_old +1;
                                                        }elseif($month == $birth_month){
                                                            if($day >= $birth_date){
                                                                $year_old = $year_old +1;
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                            <?php if(isset($year_old)): ?>
                                                <?php echo e($year_old.' '.translate('years old')); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p class="profileOtherData my-0">
                                            <?php if($model->last_seen > time()): ?>
                                                <span class="online_status badge bg-success">
                                                    <span class="in_online_status"><?php echo e(translate('Online')); ?></span>
                                                </span>
                                            <?php else: ?>
                                                <span class="offline_status badge bg-secondary">
                                                    <span class="in_offline_status">
                                                        <?php if($model->last_seen != 0): ?>
                                                            <?php if($mins < 120 && $mins > 1): ?>
                                                                <?php echo e(translate('Last seen')); ?> 
                                                                <?php echo e($mins); ?> 
                                                                <?php echo e(translate('minuts ago')); ?>

                                                            <?php elseif($mins <= 1): ?>
                                                                <?php echo e(translate('Last seen recently')); ?> 
                                                            <?php else: ?>
                                                                <?php echo e(translate('Last seen')); ?> <?php echo e(date('d.m.Y H:i', $model->last_seen)); ?>

                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo e(translate('Last seen a long time ago')); ?>

                                                        <?php endif; ?>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    
                                </div>

                                <div class="col-sm-4 text-end">
                                    <h4 class="profileOtherData"><?php echo e($model->phone_number); ?></h4>
                                    <p class="profileOtherData my-2"><?php echo e($model->email); ?></p>
                                    <div class="buttonProfileEditBlue text-end">
                                        <a class="btn btn-xs btn-outline-primary" href="<?php echo e(route('forthebuilder.user.edit',$model->id)); ?>">
                                            <i class="mdi mdi-lead-pencil mdi-20"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="chartGreenMoyiZadachi">
                            <h5 class="MoyiZadachiTextCartGreenH5">
                                 
                                    <?php if($model->id == $user->id): ?>
                                        <?php echo e(translate('My tasks')); ?>

                                    <?php else: ?>
                                        <?php echo e(translate('Tasks')); ?>

                                    <?php endif; ?>
                                
                            </h5>
                            <div class="d-flex">
                                <div class="d-flex justify-content-center">
                                    <canvas class="chartGreenImageOne" id="circleCharts">
                                    </canvas>
                                </div>
                                <div style="position: absolute; left: 170px;">
                                    <div style="width: 100%; margin-top: 40px;" class="d-flex mobileWidthLg justify-content-between ovalNameRadius">
                                        <p class="greenChartZadachiName"><?php echo e(translate('Completed tasks')); ?></p>
                                        <div class="greenChartGreenRadius ms-2"></div>
                                    </div>
                                    <div style="width: 100%; margin-top: -15px;" class="d-flex mobileWidthLg justify-content-between">
                                        <p class="greenChartZadachiName"><?php echo e(translate('Tasks not completed')); ?></p>
                                        <div class="greenChartRedRadius ms-2"></div>
                                    </div>      
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-0 mb-2">
                                
                                <?php 
                                    if($model->id == $user->id)
                                        echo translate('My stats');
                                    else
                                        echo translate('Stats');
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="<?php echo e($model->id); ?>" data-type="new">
                                <h4 class="header-title mt-0 mb-4"><?php echo e(translate('New Clients')); ?></h4>
                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="
                                               <?php echo (($data['all_clients_count'] > 0 ) ? round((100/$data['all_clients_count'])*$data['new_clients'],2) : 0) ?> %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> <?php echo e($data['new_clients']); ?> </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="<?php echo e($model->id); ?>" data-type="neo">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('For a negotiation')); ?></h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-warning rounded-pill float-start mt-3">
                                            <?php echo (($data['all_deals_count'] > 0 ) ? round((100/$data['all_deals_count'])* $data['in_negotiations'],2) : 0)
                                            ?>

                                            % <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> <?php echo e($data['in_negotiations']); ?> </h2>
                                        <p class="mb-3 text-white">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-warning progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                                aria-valuenow="<?php echo e($data['in_negotiations']); ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo e($data['in_negotiations']); ?>%;">
                                            <span class="visually-hidden"><?php echo e($data['in_negotiations']); ?>% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="<?php echo e($model->id); ?>" data-type="deal">
                                <h4 class="header-title mt-0 mb-4"><?php echo e(translate('Making a deal')); ?></h4>
                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#0FC56A"
                                                data-bgColor="#12EA7E" value="
                                                <?php 
                                                    echo (($data['all_deals_count'] > 0) ? round((100/$data['all_deals_count'])* $data['make_deal'],2) : 0)
                                                ?>
                                              "
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15"/>
                                    </div>
                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> <?php echo e($data['make_deal']); ?> </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Tasks')); ?></h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <div class="row">
                                            <div class="col-9 d-flex flex-column">
                                                <div class="badge bg-pink rounded-pill float-start mb-1">
                                                    <?php echo e(translate('For today')); ?> : <?php echo e($data['today']); ?>

                                                </div>
                                                <div class="badge bg-pink rounded-pill float-start mb-1">    
                                                    <?php echo e(translate('For tomorrow')); ?> : <?php echo e($data['tomorrow']); ?>

                                                </div>
                                                <div class="badge bg-pink rounded-pill float-start">
                                                    <?php echo e(translate('For a week')); ?> : <?php echo e($data['week']); ?>

                                                </div>        
                                            </div>
                                            <div class="col-3">
                                                <h2 class="fw-normal mb-1"> <?php echo e($data['full_task']); ?> </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card h-100">
                        <div class="card-body h-100">
                            <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Sources')); ?></h4>
                            
                            <div class="chartjs-chart">
                                <canvas id="polarArea" height="394px"> </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-body h-100">
                            <div class="ovalChart m-0 w-100">
                                

                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Individual sales')); ?></h4>
                                <div class="chartjs-chart">
                                    <canvas id="doughnut" height="380px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="standard" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo e(translate('Close')); ?></button>
            </div>
        </div>
    </div>
</div>

<div id="div_id" data-id="<?php echo $id; ?>"></div>
<div id="lang_app" lang="<?php echo e(translate('Apply')); ?>"></div>
<div id="lang_cancel" lang="<?php echo e(translate('Cancel')); ?>"></div>
<div id="lang_months" lang="<?php echo e($months); ?>"></div>
<div id="line_months" lang="<?php echo e($line_month); ?>"></div>
<div id="no_data" data-text="<?php echo e(translate('No data')); ?>"></div>
<div id="core_chart" data-arr="<?php echo e($data['core_chart']); ?>"></div>
<div id="header1" data-text="<?php echo e(translate('List new clients')); ?>"></div>
<div id="header2" data-text="<?php echo e(translate('List for a negotiation')); ?>"></div>
<div id="header3" data-text="<?php echo e(translate('List making a deal')); ?>"></div>

<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.crosshair.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/morris.js06/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/raphael/raphael.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/chart.js/Chart.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    var names = <?php echo $names; ?>;
    var counts = <?php echo $counts; ?>;
    var colors = <?php echo $colors; ?>;
    
    !(function (s) {
        function r() {}
        (r.prototype.respChart = function (r, o, a, e) {
            var t = r.get(0).getContext("2d"),
                n = s(r).parent();
            function i() {
                r.attr("width", s(n).width());
                switch (o) {
                    
                    case "Doughnut":
                        new Chart(t, { type: "doughnut", data: a, options: e });
                        break;
                    
                    case "PolarArea":
                        new Chart(t, { data: a, type: "polarArea", options: e });
                    break;
                }
            }
            s(window).resize(i), i();
        }),
            (r.prototype.init = function () {
               
                this.respChart(s("#doughnut"), "Doughnut", {
                    labels: names,
                    datasets: [{ 
                        data: counts, 
                        backgroundColor: colors, 
                        hoverBackgroundColor: colors, 
                        hoverBorderColor: "#fff" }],
                });
               
                this.respChart(s("#polarArea"), "PolarArea", {
                    
                    datasets: [
                        { data: s_counts, 
                        backgroundColor:s_colors, 
                        label: "", hoverBorderColor: "#fff" }],
                    labels: s_names,
                });
            }),
            (s.ChartJs = new r()),
            (s.ChartJs.Constructor = r);
    })(window.jQuery),
        window.jQuery.ChartJs.init();
</script>

<script>
    let page_name = 'user';
    var month_day = <?php echo json_encode($data['month_day']); ?>;
    var price_day_array = <?php echo json_encode($data['price_day_array']); ?>;
    var lang_months = $('#lang_months').attr('lang');
    var line_months = $('#line_months').attr('lang');
    line_months = line_months.split(",");

        var s_names = <?php echo $data['source_name']; ?>;
        var s_counts = <?php echo $data['source_data']; ?>;
        var s_colors = <?php echo $data['source_color']; ?>;
        !(function (s) {
            function r() {}
            (r.prototype.respChart = function (r, o, a, e) {
                // (Chart.defaults.global.defaultFontColor = "#6c7897"), (Chart.defaults.scale.gridLines.color = "rgba(108, 120, 151, 0.1)");
                var t = r.get(0).getContext("2d"),
                    n = s(r).parent();
                function i() {
                    r.attr("width", s(n).width());
                    switch (o) {
                        // case "Line":
                        //     new Chart(t, { type: "line", data: a, options: e });
                        //     break;
                        // case "Doughnut":
                        //     new Chart(t, { type: "doughnut", data: a, options: e });
                        //     break;
                        // case "Pie":
                        //     new Chart(t, { type: "pie", data: a, options: e });
                        //     break;
                        // case "Bar":
                        //     new Chart(t, { type: "bar", data: a, options: e });
                        //     break;
                        // case "Radar":
                        //     new Chart(t, { type: "radar", data: a, options: e });
                        //     break;
                        case "PolarArea":
                            new Chart(t, { data: a, type: "polarArea", options: e });
                    }
                }
                s(window).resize(i), i();
            }),
                (r.prototype.init = function () {
                    // this.respChart(
                    //     s("#lineChart"),
                    //     "Line",
                    //     {
                    //         labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September"],
                    //         datasets: [
                    //             {
                    //                 label: "Sales Analytics",
                    //                 fill: !1,
                    //                 lineTension: 0.1,
                    //                 backgroundColor: "#039cfd",
                    //                 borderColor: "#10c469",
                    //                 borderCapStyle: "butt",
                    //                 borderDash: [],
                    //                 borderDashOffset: 0,
                    //                 borderJoinStyle: "miter",
                    //                 pointBorderColor: "#039cfd",
                    //                 pointBackgroundColor: "#fff",
                    //                 pointBorderWidth: 1,
                    //                 pointHoverRadius: 5,
                    //                 pointHoverBackgroundColor: "#039cfd",
                    //                 pointHoverBorderColor: "#eef0f2",
                    //                 pointHoverBorderWidth: 2,
                    //                 pointRadius: 1,
                    //                 pointHitRadius: 10,
                    //                 data: [65, 59, 80, 81, 56, 55, 40, 35, 30],
                    //             },
                    //         ],
                    //     },
                    //     { scales: { yAxes: [{ ticks: { max: 100, min: 20, stepSize: 10 } }] } }
                    // );
                    // this.respChart(s("#doughnut"), "Doughnut", {
                    //     labels: names,
                    //     datasets: [{ 
                    //         data: counts, 
                    //         backgroundColor: colors, 
                    //         hoverBackgroundColor: colors, 
                    //         hoverBorderColor: "#fff" }],
                    // });
                    // this.respChart(s("#pie"), "Pie", {
                    //     labels: ["Desktops", "Tablets", "Mobiles"],
                    //     datasets: [{ data: [300, 50, 100], backgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d"], hoverBackgroundColor: ["#ff8acc", "#5b69bc", "#f1b53d"], hoverBorderColor: "#fff" }],
                    // });
                    // this.respChart(s("#bar"), "Bar", {
                    //     labels: ["January", "February", "March", "April", "May", "June", "July"],
                    //     datasets: [
                    //         {
                    //             label: "Sales Analytics",
                    //             backgroundColor: "RGBA(3,149,253,0.3)",
                    //             borderColor: "#0388FD",
                    //             borderWidth: 1,
                    //             hoverBackgroundColor: "RGBA(3,149,253,0.6)",
                    //             hoverBorderColor: "#0388FD",
                    //             data: [65, 59, 80, 81, 56, 55, 40, 20],
                    //         },
                    //     ],
                    // });
                    // this.respChart(
                    //     s("#radar"),
                    //     "Radar",
                    //     {
                    //         labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                    //         datasets: [
                    //             {
                    //                 label: "Desktops",
                    //                 backgroundColor: "rgba(179,181,198,0.2)",
                    //                 borderColor: "rgba(179,181,198,1)",
                    //                 pointBackgroundColor: "rgba(179,181,198,1)",
                    //                 pointBorderColor: "#fff",
                    //                 pointHoverBackgroundColor: "#fff",
                    //                 pointHoverBorderColor: "rgba(179,181,198,1)",
                    //                 data: [65, 59, 90, 81, 56, 55, 40],
                    //             },
                    //             {
                    //                 label: "Tablets",
                    //                 backgroundColor: "rgba(255,99,132,0.2)",
                    //                 borderColor: "rgba(255,99,132,1)",
                    //                 pointBackgroundColor: "rgba(255,99,132,1)",
                    //                 pointBorderColor: "#fff",
                    //                 pointHoverBackgroundColor: "#fff",
                    //                 pointHoverBorderColor: "rgba(255,99,132,1)",
                    //                 data: [28, 48, 40, 19, 96, 27, 100],
                    //             },
                    //         ],
                    //     },
                    //     { scale: { angleLines: { color: "rgba(108, 120, 151, 0.1)" } } }
                    // );
                    this.respChart(s("#polarArea"), "PolarArea", {
                        
                        datasets: [
                            { data: s_counts, 
                            backgroundColor:s_colors, 
                            label: "", hoverBorderColor: "#fff" }],
                        labels: s_names,
                    });
                }),
                (s.ChartJs = new r()),
                (s.ChartJs.Constructor = r);
        })(window.jQuery),
            window.jQuery.ChartJs.init();
    </script>
    
<script>
    const ctx = document.getElementById('circleCharts');
    let circleCharts = document.getElementById("circleCharts").getContext('2d');
    // let graphicCharts = document.getElementById("graphicCharts").getContext('2d');
    let tasks = '<?php echo e($tasks); ?>';
    let taskdate = [];
    let taskcount = [];
    let m = [];
    <?php if(!empty($task_count)): ?>
        <?php $__currentLoopData = $task_count['task_date']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_date_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            taskdate.push('<?php echo e($task_date_); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $task_count['count']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_count_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            taskcount.push('<?php echo e($task_count_); ?>')
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(!empty($monthly_count)): ?>
        <?php $__currentLoopData = $monthly_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $monthly_count_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            m['<?php echo e($key); ?>'] = '<?php echo e((int)$monthly_count_-1); ?>'
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    let tasks_not_ended = '<?php echo e($tasks_not_ended); ?>';
    let tasks_ended = '<?php echo e($tasks_ended); ?>';
    <?php if($tasks_ended == 0 && $tasks_not_ended == 0): ?>
        tasks_ended = 1;
    <?php endif; ?>
    circleCharts.canvas.parentNode.style.height = '144px';
    circleCharts.canvas.parentNode.style.width = '244px';
   
    let two = new Chart(circleCharts, {
        type: 'doughnut',
        data: {
            // labels: ['Completed tasks','In work', 'Tasks not completed'],
            datasets:[{
                label: ['Tasks'],
                data: [parseInt(tasks_not_ended), parseInt(tasks_ended)],
                backgroundColor: [
                    '#E44848',
                    '#65AF37',
                ],
                borderColor: [
                    '#E44848',
                    '#65AF37',
                ],
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: true,
        }
    })
    
    // const ctx_3 = document.getElementById('myChart_dash');
    //     var month_day = <?php echo json_encode($data['month_day']); ?>;
    //     var price_day_array = <?php echo json_encode($data['price_day_array']); ?>;
    //     var lang_months = $('#lang_months').attr('lang');
    //     var line_months = $('#line_months').attr('lang');

    //     line_months = line_months.split(",");

    //     new Chart(ctx_3, {
    //     type: 'line',
    //     data: {
    //         labels:month_day,
    //         datasets: [{
    //         label: '',
    //         data:price_day_array,
    //         borderWidth: 2,
    //         barPercentage:0.1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //         y: {
    //             beginAtZero: true
    //         }
    //         }
    //     }
    // });

    // const ctx_2 = document.getElementById('myChart_2_dash');
    // var users = <?php echo json_encode($data['month_sales_price']); ?>;

    // new Chart(ctx_2, {
    //     type: 'line',
    //     data: {
    //         labels: line_months,
    //         datasets: [{
    //         label: '',
    //         data:users,
    //         borderWidth: 2,
    //         barPercentage:0.1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //         y: {
    //             beginAtZero: true
    //         }
    //         }
    //     }
    // });

    

    //  chart3
    const core_chart = $('#core_chart').attr('data-arr')
    if (core_chart != '') {
        
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart_1);
        function drawChart_1() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php echo $data['core_chart']; ?>
            ]);

            var options = {
                title: '',
                width: 400,
                height: 400,
                slices: {0: {color: '#FF9D9D'}, 1:{color: '#F7FF9D'}, 2:{color: '#B1FF9D'}},
                legend: { position: 'bottom'},
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'button', label: 'Percentage'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }    
    }
    else{
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart_1);
        function drawChart_1() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              <?php echo $data['core_chart']; ?>
              [$('#no_data').attr('data-text'), 1]
            ]);

            var options = {
                title: '',
                width: 400,
                height: 400,
                slices: {0: {color: '#FF9D9D'}, 1:{color: '#F7FF9D'}, 2:{color: '#B1FF9D'}},
                legend: { position: 'bottom'},
                bars: 'vertical', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'button', label: 'Percentage'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }   
    }

        
        $('.daterange').daterangepicker({
            locale: {
                format: 'DD.MM.YYYY',
                 // "customRangeLabel": "Custom",
                "applyLabel": $('#lang_app').attr('lang'),
                "cancelLabel": $('#lang_cancel').attr('lang'),
                "monthNames": $('#lang_months').attr('lang'),
                "monthNames": line_months
            }
        });


  $(document).on('click','.applyBtn',function(){
    var date = $('.daterange').val()
    var id = $('#div_id').attr('data-id')
    var arr = [id, date];

    location.href = `/user/filtr/${arr}`;        
  })

</script>

<script>
    $(document).on('click','.view_data',function(){
        $('#standard .modal-body').html('')
        $('#standard .modal-header h4').html()
        $('#standard').modal('toggle')
        var type = $(this).attr('data-type')
        var id = $(this).attr('data-id')
        var date = $('.daterange').val()

        $.ajax({
            url: `/user/view-data`,
            type: 'GET',
            datatype: 'json',
            data: {
                id: id,
                type: type,
                date: date,
                status: 0,
            },
            success: function(data) {
                $('#standard .modal-body').html(data)
                switch (type) {
                    case 'new':
                        $('#standard .modal-header h4').html($('#header1').attr('data-text'))
                    break;
                    case 'neo':
                        $('#standard .modal-header h4').html($('#header2').attr('data-text'))
                    break;
                    case 'deal':
                        $('#standard .modal-header h4').html($('#header3').attr('data-text'))
                    break;
                }                
            },
            
        });      
    })
</script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/show.blade.php ENDPATH**/ ?>