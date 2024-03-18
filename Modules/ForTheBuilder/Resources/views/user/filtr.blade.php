@section('title') {{__('locale.apartment_sale')}}  @endsection
@extends('forthebuilder::layouts.forthebuilder')
@section('title')  {{translate('User show')}} @endsection
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')
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
                                {{translate('Profile')}}
                            </h4>
                        </div>
                        <div class="col-md-4">
                            <div class="ml-auto d-flex align-items-center" id="CurrentDayToday">
                                <h4>{{translate('Period')}}: </h4>
                                <input type="text" class="ms-2 form-control daterange" value="{{ date('d.m.Y',strtotime($data['start'])).' - '.date('d.m.Y',strtotime($data['end'])) }}">
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
                                <div class="col-sm-7">
                                    @if(isset($model->id))
                                        @php
                                            $sms_avatar = public_path('uploads/user/'.$model->id.'/s_'.$model->avatar);
                                        @endphp
                                        @if(file_exists($sms_avatar))
                                            <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3"
                                                 src="{{ asset('uploads/user/'.$model->id.'/s_'.$model->avatar) }}"
                                                 alt="">
                                        @else
                                            @php
                                                $gender_img = 'men.png';
                                                if ($model->gender == 2) {
                                                    $gender_img = 'women.png';
                                                }
                                            @endphp
                                            <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3" src="{{ asset('/backend-assets/img/'.$gender_img) }}" alt="">
                                        @endif
                                    @else
                                        <img class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail float-start me-3 me-3" src="{{asset('/backend-assets/img/men.png')}}" alt="">
                                    @endif
                                

                                
                                    <h4 class="profileNameData">{{$model->first_name.' '}} {{$model->last_name.' '}} {{$model->middle_name}}</h4>
                                    <p class="profileOtherData my-0">{{$model->role->name}}</p>
                                    <p class="profileOtherData my-0">
                                        @php
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
                                        @endphp
                                        @if(isset($year_old))
                                            {{$year_old.' '.translate('years old')}}
                                        @endif
                                    </p>
                                </div>

                                <div class="col-sm-5 text-end">
                                    <h4 class="profileOtherData">{{$model->phone_number}}</h4>
                                    <p class="profileOtherData my-2">{{$model->email}}</p>
                                    <div class="buttonProfileEditBlue text-end">
                                        <a class="btn btn-xs btn-outline-primary" href="{{route('forthebuilder.user.edit',$model->id)}}">
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
                            <h5 class="MoyiZadachiTextCartGreenH5">{{translate('My tasks')}}</h5>
                            <div class="d-flex">
                                <div class="d-flex justify-content-center">
                                    <canvas class="chartGreenImageOne" id="circleCharts">
                                    </canvas>
                                </div>
                                <div>
                                    <div style="width: 180px; margin-top: 60px;" class="d-flex mobileWidthLg justify-content-between ovalNameRadius">
                                        <p class="greenChartZadachiName">{{translate('Completed tasks')}}</p>
                                        <div class="greenChartGreenRadius"></div>
                                    </div>
                                    <div style="width: 180px; margin-top: -15px;" class="d-flex mobileWidthLg justify-content-between">
                                        <p class="greenChartZadachiName">{{translate('Tasks not completed')}}</p>
                                        <div class="greenChartRedRadius"></div>
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
                                
                                 @php 
                                    if($model->id == $user->id)
                                        echo translate('My stats');
                                    else
                                        echo translate('Stats');
                                @endphp
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="{{ $model->id }}" data-type="new">
                                <h4 class="header-title mt-0 mb-4">{{translate('New Clients')}}</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="

                                                @if($data['all_clients_count'] > 0)
                                                    {{round((100/$data['all_clients_count'])*$data['new_clients'],2)}}
                                                @else
                                                    0 
                                                @endif 

                                                %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{$data['new_clients']}} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="{{ $model->id }}" data-type="neo">
                                <h4 class="header-title mt-0 mb-3">{{translate('For a negotiation')}}</h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-warning rounded-pill float-start mt-3">
                                            @if($data['all_deals_count'] > 0)
                                                {{round((100/$data['all_deals_count'])* $data['in_negotiations'],2)}}% 
                                            @else
                                                0% 
                                            @endif 
                                            <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> {{$data['in_negotiations']}} </h2>
                                        <p class="mb-3 text-white">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-warning progress-sm">
                                        <div class="progress-bar bg-warning" role="progressbar"
                                                aria-valuenow="{{$data['in_negotiations']}}" aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{$data['in_negotiations']}}%;">
                                            <span class="visually-hidden">{{$data['in_negotiations']}}% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0 view_data" data-id="{{ $model->id }}" data-type="deal">
                                <h4 class="header-title mt-0 mb-4">{{translate('Making a deal')}}</h4>
                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#0FC56A"
                                                data-bgColor="#12EA7E" value="
                                                
                                                @if($data['all_deals_count'] > 0)
                                                    {{
                                                    round((100/$data['all_deals_count'])* $data['make_deal'],2);    
                                                    }}
                                                @else 
                                                    0 
                                                @endif 
                                                "
                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                data-thickness=".15"/>
                                    </div>
                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{$data['make_deal']}} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-3">{{translate('Tasks')}}</h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <div class="row">
                                            <div class="col-10 d-flex flex-column">
                                                <div class="badge bg-pink rounded-pill float-start mb-1">
                                                    {{translate('For today')}} : {{$data['today']}}
                                                </div>
                                                <div class="badge bg-pink rounded-pill float-start mb-1">    
                                                    {{translate('For tomorrow')}} : {{$data['tomorrow']}}
                                                </div>
                                                <div class="badge bg-pink rounded-pill float-start">
                                                    {{translate('For a week')}} : {{$data['week']}}
                                                </div>        
                                            </div>
                                            <div class="col-2">
                                                <h2 class="fw-normal mb-1"> {{$data['full_task']}} </h2>
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
                            <h4 class="header-title mt-0 mb-3">{{translate('Sources')}}</h4>
                            
                            <div class="chartjs-chart">
                                <canvas id="polarArea" height="394px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card h-100">
                        <div class="card-body h-100">
                            <div class="ovalChart m-0 w-100">
                                {{-- <h5>{{translate('Individual sales')}}</h5>
                                <div id="piechart" style="width: 430px; height: 400px;"></div> --}}
                                <h4 class="header-title mt-0 mb-3">{{translate('Individual sales')}}</h4>
                                <div class="chartjs-chart">
                                    <canvas id="doughnut" height="300"></canvas>
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
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ translate('Close') }}</button>
            </div>
        </div>
    </div>
</div>

<div id="div_id" data-id="@php echo $id; @endphp"></div>
<div id="lang_app" lang="{{ translate('Apply') }}"></div>
<div id="lang_cancel" lang="{{ translate('Cancel') }}"></div>
<div id="lang_months" lang="{{ $months }}"></div>
<div id="line_months" lang="{{ $line_month }}"></div>
<div id="no_data" data-text="{{ translate('No data') }}"></div>
<div id="core_chart" data-arr="{{ $data['core_chart'] }}"></div>

<div id="header1" data-text="{{ translate('List new clients') }}"></div>
<div id="header2" data-text="{{ translate('List for a negotiation') }}"></div>
<div id="header3" data-text="{{ translate('List making a deal') }}"></div>

<script src="{{asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.js')}}"></script>
<script src="{{asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.pie.js')}}"></script>
<script src="{{asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('/backend-assets/Admin/dist/assets/libs/morris.js06/morris.min.js')}}"></script>
<script src="{{asset('/backend-assets/Admin/dist/assets/libs/raphael/raphael.min.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset('/backend-assets/Admin/dist/assets/libs/chart.js/Chart.bundle.min.js') }}"></script>

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
    let page_name = 'user'
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
                        case "PolarArea":
                            new Chart(t, { data: a, type: "polarArea", options: e });
                    }
                }
                s(window).resize(i), i();
            }),
                (r.prototype.init = function () {
                    
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
    
    let tasks = '{{$tasks}}';
    let taskdate = [];
    let taskcount = [];
    let m = [];
    @if(!empty($task_count))
        @foreach($task_count['task_date'] as $task_date_)
            taskdate.push('{{$task_date_}}')
        @endforeach
        @foreach($task_count['count'] as $task_count_)
            taskcount.push('{{$task_count_}}')
        @endforeach
    @endif
    @if(!empty($monthly_count))
        @foreach($monthly_count as $key => $monthly_count_)
            m['{{$key}}'] = '{{(int)$monthly_count_-1}}'
        @endforeach
    @endif
    let tasks_not_ended = '{{$tasks_not_ended}}';
    let tasks_ended = '{{$tasks_ended}}';
    @if($tasks_ended == 0 && $tasks_not_ended == 0)
        tasks_ended = 1;
    @endif
    circleCharts.canvas.parentNode.style.height = '144px';
    circleCharts.canvas.parentNode.style.width = '244px';
   
    let two = new Chart(circleCharts, {
        type: 'doughnut',
        data: {
            
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
    });
    
    

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
                status: 1,
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

@endsection







