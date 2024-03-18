<?php $__env->startSection('title'); ?> <?php echo e(translate('update')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">
<style>
    .sdelkaData {
        width: 90% !important;
    }
    .bronyaFiofirst{
         overflow: hidden !important;
        white-space: nowrap !important;
        padding-left: 5px !important;
        justify-content:left !important;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-9 d-flex align-items-center">                            
                            <h4 class="m-0">
                                <?php echo e(translate('Installment plan')); ?>

                            </h4>
                        </div>
                       <div class="col-md-3">
                           <input placeholder="<?php echo e(translate('Search by installment plan')); ?>" class="searchTable form-control" type="text" value="<?php echo e(((!empty($search_value)) ? $search_value : '')); ?>">
                       </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body" id="client">
                    <table id="tech-companies-1" class="table table-sm table-striped mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Full name of the Customer')); ?></th>
                                <th><?php echo e(translate('Apartment number')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Period')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty(!$models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($model->client): ?>
                                        <tr class="jkMiniData mt-1 hideData">
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="checkboxDivInput checkingInputRassrochkaChecked">
                                                    <?php echo e($models->firstItem() + $key); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="bronyaFio">
                                                    <?php if(!empty($model->client)): ?>
                                                        <?php echo e($model->client->last_name . ' ' . $model->client->first_name . ' ' . $model->client->middle_name); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="checkboxDivTextInput2">
                                                    <?php echo e($model->agreement_number ?? ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="sdlekaPriceJk">
                                                    <?php echo e(number_format($model->price_sell, 2)); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="rassrochkaPokazatStatus">
                                                     
                                                    <?php
                                                        if(isset($model->period) && $model->period->period != 0){
                                                            echo $model->period->period;
                                                        }
                                                        elseif(isset($model->installmentPlan)){
                                                            echo $model->installmentPlan->period;
                                                        }

                                                    ?>
                                                     

                                                     
                                                </a>
                                            </td>
                                            <td>
                                                <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="rassrochkaPokazatStatusGreen show-status" data-id="<?php echo e($model->id); ?>"
                                                    data-period="<?php echo e((($model->installmentPlan) ? $model->installmentPlan->period : 0)); ?>"
                                                    data-price="<?php echo e($model->price_sell); ?>">
                                                    

                                                    <?php
                                                    $back_color = '';
                                                    $text = '';
                                                    if ($model->payStatus) {

                                                        if ($model->payStatus->status == Constants::NOT_PAID) {
                                                            $back_color = 'bg-danger';
                                                            $text = translate('Not paid');
                                                        } elseif ($model->payStatus->status == Constants::PAID) {
                                                            $back_color = 'bg-success';
                                                            $text = translate('Paid');
                                                        } else {
                                                            $back_color = 'bg-warning';
                                                            $text = translate('Partial payment');
                                                        }

                                                        if ($model->payStatus->must_pay_date > date('Y-m-d')) {
                                                            $text = translate('Pending');
                                                            $back_color = 'bg-info';
                                                        }
                                                         
                                                     } 

                                                    echo "<span class='badge text-white ".$back_color."'>".$text."</span>";
                                                    ?>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="aiz-pagination mt-2">
                        <?php echo e($models->appends(request()->input())->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('keyup', '.searchTable', function() {
        var text = $(this).val()

        $.ajax({
            url: `/installment-plan/search`,
            type: 'GET',
            datatype: 'json',
            data: {
                text: text
            },
            success: function(data) {
                $('#client').html(data)
                $('.pagination .page-link').each(function(i, obj) {
                    if ($(obj).attr('href')) {
                        var arr = $(obj).attr('href').split("/");
                        var firstEl = $(arr).first()[0];
                        var secondEl = arr[2];
                        var lastEl = $(arr).last()[0];
                        var search = lastEl.split("?")[0]
                        var page = lastEl.split("?")[1]
                        
                        var new_url = firstEl+'//'+secondEl+'/installment-plan?text='+text+'%3Fpage%3D8&'+page;
                        $(obj).attr('href',new_url)
                    }
                });                        
            },
        }); 
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/installment-plan/index.blade.php ENDPATH**/ ?>