<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\Constants; 

?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .plus2{
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        background: #F2F2F2;
        color: #555;
        width: 50px;
        height: 50px;
    }
</style> 
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row w-100 m-0">
                        <div class="col-md-4 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.user.report-clients')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-2">
                                <?php echo e(translate('Report on clients')); ?>

                            </h4>
                        </div>
                        <div class="col-md-8 d-flex align-items-center justify-content-end text-end">
                            
                            <div class="w-50 d-flex align-items-center me-2" id="CurrentDayToday">
                                <h4><?php echo e(translate('Period')); ?>: </h4>
                                <input type="text" class="ms-2 form-control daterange" value="<?php echo e(date('01.m.Y').' - '.date('t.m.Y')); ?>">
                            </div> 
                            <a target="_blank" href="<?php echo e(route('forthebuilder.exports.export',$id)); ?>" class="btn btn-outline-success btn-xs">
                                <i class="mdi mdi-microsoft-excel mdi-20"></i>
                            </a>
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
                                           data-bgColor="#F9B9B9" value="
                                           <?php if($data['all_clients_count'] > 0): ?>
                                            <?php echo e(round((100/$data['all_clients_count'])*$data['new_clients'],2)); ?>

                                            <?php else: ?>
                                            0
                                            <?php endif; ?>

                                            %"
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
                                    <span class="badge bg-warning rounded-pill float-start mt-3">
                                        <?php if($data['all_deals_count'] > 0): ?>
                                        <?php echo e(round((100/$data['all_deals_count'])* $data['in_negotiations'],2)); ?>

                                        <?php else: ?>
                                        0
                                        <?php endif; ?>

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
                        <div class="card-body pb-0">
                            

                            <h4 class="header-title mt-0 mb-4"><?php echo e(translate('Making a deal')); ?></h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#0FC56A"
                                            data-bgColor="#12EA7E" value="
                                            <?php if($data['all_deals_count'] > 0): ?>
                                            <?php echo e(round((100/$data['all_deals_count'])* $data['make_deal'],2)); ?>

                                            <?php else: ?>
                                            0
                                            <?php endif; ?>"
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
                    
            </div>

            <div class="row mt-3">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Sources')); ?></h4>
                            
                            <div class="chartjs-chart">
                                <canvas id="polarArea" height="300"> </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mt-0 mb-3"><?php echo e(translate('Individual sales')); ?></h4>
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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/flot-charts/jquery.flot.crosshair.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/morris.js06/morris.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/raphael/raphael.min.js')); ?>"></script>
<!--<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/pages/morris.init.js')); ?>"></script>-->

<script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/chart.js/Chart.bundle.min.js')); ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <script>
        let page_name = 'report-clients';
        $(document).on('click','tbody tr',function(){
            location.href = $(this).attr('data-href')
        })

        $('.daterange').daterangepicker({
            locale: {
                format: 'DD.MM.YYYY',
                 // "customRangeLabel": "Custom",
                "applyLabel": $('#lang_app').attr('lang'),
                "cancelLabel": $('#lang_cancel').attr('lang'),
                "monthNames": $('#lang_months').attr('lang'),
                // "monthNames": line_months
            }
        });

        $(document).on('click','.applyBtn',function(){
            var date = $('.daterange').val()
            var id = $('#div_id').attr('data-id')
            var arr = [id, date];

            // location.href = `/user/filtr/${arr}`;        
          })
    </script>

    <script>
        var s_names = <?php echo $data['source_name']; ?>;
        var s_counts = <?php echo $data['source_data']; ?>;
        var s_colors = <?php echo $data['source_color']; ?>;
        var names = <?php echo $data['names']; ?>;
        var counts = <?php echo $data['counts']; ?>;
        var colors = <?php echo $data['colors']; ?>;

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/report-clients-index.blade.php ENDPATH**/ ?>