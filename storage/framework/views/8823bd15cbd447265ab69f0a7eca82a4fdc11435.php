<?php $__env->startSection('content'); ?>

    
        
   
    <?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-sm-8">
                                <h4><?php echo e(translate('Control Panel')); ?></h4>    
                            </div>
                            <div class="col-sm-4">
                                <div class="ml-auto d-flex align-items-center" id="CurrentDayToday">
                                    <h4><?php echo e(translate('Period')); ?>: </h4>
                                    <input type="text" class="ms-2 form-control daterange" value="<?php echo e(date('d.m.Y', strtotime($data['start'])).' - '.date('d.m.Y', strtotime($data['end']))); ?>">
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-4"><?php echo e(translate('New Clients')); ?></h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="<?php echo e(round((100/$data['all_clients_count'])*$data['new_clients'],2)); ?> %"
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
                            <div class="card-body pb-0">

                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('For a negotiation')); ?></h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-warning rounded-pill float-start mt-3"><?php echo e(round((100/$data['all_deals_count'])* $data['in_negotiations'],2)); ?>% <i class="mdi mdi-trending-up"></i> </span>
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
                            <div class="card-body pb-0">
                                

                                <h4 class="header-title mt-0 mb-4"><?php echo e(translate('Making a deal')); ?></h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#0FC56A"
                                                data-bgColor="#12EA7E" value="<?php echo e(round((100/$data['all_deals_count'])* $data['make_deal'],2)); ?>"
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
                                            <div class="col-10 d-flex flex-column">
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
                                            <div class="col-2">
                                                <h2 class="fw-normal mb-1"> <?php echo e($data['full_task']); ?> </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Overdue tasks')); ?></h4>
                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-danger rounded-pill float-start mt-3"><?php echo e(round((100/$data['all_tasks_count'])* $data['overdue_tasks'],2)); ?>% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> <?php echo e($data['in_negotiations']); ?> </h2>
                                        <p class="mb-3 text-white">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-danger progress-sm">
                                        <div class="progress-bar bg-danger" role="progressbar"
                                                aria-valuenow="<?php echo e($data['overdue_tasks']); ?>" aria-valuemin="0" aria-valuemax="100"
                                                style="width: <?php echo e($data['overdue_tasks']); ?>%;">
                                            <span class="visually-hidden"><?php echo e($data['overdue_tasks']); ?>% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
                
                <div class="row mt-3">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Sources')); ?></h4>
                                
                                <div class="chartjs-chart">
                                    <canvas id="polarArea2" height="300"> </canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Individual sales')); ?></h4>
                                <div class="chartjs-chart">
                                    <canvas id="doughnut2" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <div class="card d-none">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Sales per month')); ?></h4>
                                <div>
                                    <div dir="ltr">
                                        <div id="morris-bar-stacked2" style="height: 300px;" class="morris-chart" data-colors="#4a81d4,#4fc6e1,#e3eaef"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Individual sales managers')); ?></h4>
                                <div>
                                  <div dir="ltr">
                                    <div id="morris-area-with-dotted2" style="height: 300px;" class="morris-chart" data-colors="#e3eaef,#6658dd"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body widget-user">
                                <div class="text-center">
                                    <i class="mdi mdi-home-city-outline font-20"></i>
                                    <h2 class="fw-normal text-danger" data-plugin="counterup">
                                        <?php echo e($data['house_count']); ?>

                                    </h2>
                                    <h5><?php echo e(translate('Count of house')); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body widget-user">
                                <div class="text-center">
                                    <i class="mdi mdi-home-import-outline font-20"></i>
                                    <h2 class="fw-normal text-warning" data-plugin="counterup">
                                        <?php echo e($data['house_flat_status_free']); ?>

                                    </h2>
                                    <h5><?php echo e(translate('Free house')); ?></h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body widget-user">
                                <div class="text-center">
                                    <i class="mdi mdi-shield-lock-outline font-20"></i>
                                    <h2 class="fw-normal text-pink" data-plugin="counterup">
                                        <?php echo e($data['house_flat_status_booking']); ?>

                                    </h2>
                                    <h5><?php echo e(translate('On armor')); ?></h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body widget-user">
                                <div class="text-center">
                                    <i class="mdi mdi-calculator-variant-outline font-20"></i>
                                    <h2 class="fw-normal text-info" data-plugin="counterup">
                                        <?php echo e($data['installment_count']); ?>

                                    </h2>
                                    <h5><?php echo e(translate('On installments')); ?></h5>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body widget-user">
                                <div class="text-center">
                                    <i class=" dripicons-trophy font-20"></i>
                                    <h2 class="fw-normal text-success" data-plugin="counterup">
                                        <?php echo e($data['house_flat_status_sold']); ?>

                                    </h2>
                                    <h5><?php echo e(translate('Successful transactions')); ?></h5>
                                    <p>
                                        <?php echo e(number_format($data['price'],0,'.',' ')); ?>

                                        <?php 
                                            if (isset($currency)) {
                                                echo (($currency->SUM) ? translate(' sum') : translate(' usd'));
                                            }
                                        ?> 
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.crosshair.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/morris.js06/morris.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/raphael/raphael.min.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/pages/morris.init.js')); ?>"></script>-->
    
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/chart.js/Chart.bundle.min.js')); ?>"></script>

    <div id="lang_app" lang="<?php echo e(translate('Apply')); ?>"></div>
    <div id="lang_cancel" lang="<?php echo e(translate('Cancel')); ?>"></div>
    <div id="lang_months" lang="<?php echo e($months); ?>"></div>
    <div id="line_months" lang="<?php echo e($line_month); ?>"></div>
    <div id="no_data" data-text="<?php echo e(translate('No data')); ?>"></div>
    <div id="core_chart" data-arr="<?php echo e($data['core_chart']); ?>"></div>
    <div id="bar_chart_datas" data-arr="<?php echo e($bar_chart_datas); ?>"></div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        let page_name = 'index';
        // chart1
        const ctx = document.getElementById('barchart');
        var month_day = <?php echo json_encode($data['month_day']); ?>;
        var price_day_array = <?php echo json_encode($data['price_day_array']); ?>;
        var lang_months = $('#lang_months').attr('lang');
        var line_months = $('#line_months').attr('lang');

        line_months = line_months.split(",");

        
        $('.daterange').daterangepicker({
            locale: {
                format: 'DD.MM.YYYY',
                "applyLabel": $('#lang_app').attr('lang'),
                "cancelLabel": $('#lang_cancel').attr('lang'),
                "monthNames": line_months
            }
        });
        
        $(document).on('click','.applyBtn',function(){
            var date = $('.daterange').val()
            location.href = `/forthebuilder/filtr/${date}`;
        })

        

</script>

    <script>
        // "use strict";
        // !(function (n) {
        //     function a() {
        //         (this.$body = n("body")), (this.$realData = []);
        //     }
            var names = <?php echo $data['names']; ?>;
            var counts = <?php echo $data['counts']; ?>;
            var colors = <?php echo $data['colors']; ?>;
            
            // (a.prototype.createDonutGraph = function (a, o, t, r) {
            //     (t = [
            //         { label: o[0], data: t[0] },
            //         { label: o[1], data: t[1] },
            //         { label: o[2], data: t[2] },
            //         { label: o[3], data: t[3] },
            //         { label: o[4], data: t[4] },
            //         { label: o[5], data: t[5] },
            //         { label: o[6], data: t[6] },
            //         { label: o[7], data: t[7] },
            //         { label: o[8], data: t[8] },
            //         { label: o[9], data: t[9] },
            //         { label: o[10], data: t[10] },
            //     ]),
            //         (r = {
            //             series: { pie: { show: !0, innerRadius: 0.7 } },
            //             legend: {
            //                 show: !0,
            //                 labelFormatter: function (a, o) {
            //                     return '<div style="font-size:14px;">&nbsp;' + a + "</div>";
            //                 },
            //                 backgroundColor: "transparent",
            //                 labelBoxBorderColor: null,
            //                 margin: 50,
            //                 width: 20,
            //                 padding: 1,
            //             },
            //             grid: { hoverable: !0, clickable: !0 },
            //             colors: r,
            //             tooltip: !0,
            //             tooltipOpts: { content: "%s, %p.0%" },
            //         });
            //     n.plot(n(a), t, r);
            // }),
            
            // (a.prototype.init = function () {
            //     this.createDonutGraph("#donut-chart #donut-chart-container", 
            //     names, 
            //     counts, 
            //     colors);
                
            // }),
            // (n.FlotChart = new a()),
            // (n.FlotChart.Constructor = a);
            // })(window.jQuery),
            // window.jQuery.FlotChart.init()
                    
    </script>  

    <script>
        var bar_chart_datas = <?php echo $bar_chart_datas ?>;
        var bar_chart_datas_2 = <?php echo $bar_chart_datas_2 ?>;
        // console.log(bar_chart_datas)
        "use strict";
        !(function (e) {
            function a() {}
            
               
                (a.prototype.createAreaChartDotted = function (e, a, r, t, i, o, s, b, n, y) {
                    Morris.Area({
                        element: e,
                        pointSize: 3,
                        lineWidth: 1,
                        data: t,
                        xkey: i,
                        ykeys: o,
                        labels: s,
                        hideHover: "auto",
                        pointFillColors: b,
                        pointStrokeColors: n,
                        resize: !0,
                        dataLabels: !1,
                        gridLineColor: "rgba(173, 181, 189, 0.1)",
                        lineColors: y,
                    });
                }),
                
                (a.prototype.createStackedChart = function (e, a, r, t, i, o) {
                    Morris.Bar({ element: e, data: a, xkey: r, ykeys: t, stacked: !0, labels: i, hideHover: "auto", resize: !0, dataLabels: !1, gridLineColor: "rgba(173, 181, 189, 0.1)", barColors: o });
                }),
                
                (a.prototype.init = function () {
                    
                    this.createAreaChartDotted(
                        "morris-area-with-dotted2",
                        0,
                        0,
                        bar_chart_datas_2,
                        "y",
                        ["a", "b"],
                        ["Series A", "Series B"],
                        ["#ffffff"],
                        ["#999999"],
                        ["#5b69bc", "#35b8e0"]
                    );
                    
                    // this.createStackedChart(
                    //     "morris-bar-stacked",
                    //     bar_chart_datas,
                    //     "y",
                    //     ["a", "b"],
                    //     ["Series A", "Series B"],
                    //     ["#71b6f9", "#ebeff2"]
                    // );
                }),
                (e.MorrisCharts = new a()),
                (e.MorrisCharts.Constructor = a);
                })(window.jQuery),
                    (function (a) {
                    a.MorrisCharts.init(),
                        // window.addEventListener("adminto.setBoxed", function (e) {
                        //     a.MorrisCharts.init();
                        // }),
                        window.addEventListener("adminto.setFluid", function (e) {
                            a.MorrisCharts.init();
                        });
                })(window.jQuery);

    </script> 
    <script>
        $('tspan').each(function(i, obj) {
            if($(obj).text() == 1901)
                $(obj).text(line_months[0])
            if($(obj).text() == 1902)
                $(obj).text(line_months[1])
            if($(obj).text() == 1903)
                $(obj).text(line_months[2])
            if($(obj).text() == 1904)
                $(obj).text(line_months[3])
            if($(obj).text() == 1905)
                $(obj).text(line_months[4])
            if($(obj).text() == 1906)
                $(obj).text(line_months[5])
            if($(obj).text() == 1907)
                $(obj).text(line_months[6])
            if($(obj).text() == 1908)
                $(obj).text(line_months[7])
            if($(obj).text() == 1909)
                $(obj).text(line_months[8])
            if($(obj).text() == 1910)
                $(obj).text(line_months[9])
            if($(obj).text() == 1911)
                $(obj).text(line_months[10])
            if($(obj).text() == 1912)
                $(obj).text(line_months[11])
        });
    </script>
    <script>
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
                        case "Doughnut":
                            new Chart(t, { type: "doughnut", data: a, options: e });
                            break;
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
                    this.respChart(s("#doughnut2"), "Doughnut", {
                        labels: names,
                        datasets: [{ 
                            data: counts, 
                            backgroundColor: colors, 
                            hoverBackgroundColor: colors, 
                            hoverBorderColor: "#fff" }],
                    });
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
                    this.respChart(s("#polarArea2"), "PolarArea", {
                        
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
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/filtr.blade.php ENDPATH**/ ?>