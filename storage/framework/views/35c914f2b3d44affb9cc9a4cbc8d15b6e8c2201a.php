<?php $__env->startSection('title'); ?> <?php echo e(translate('update')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-10 d-flex align-items-center">                            
                            <h4 class="ms-3">
                                <?php echo e(translate('Installment plan')); ?>

                            </h4>
                        </div>
                       <div class="col-md-2">
                           <input placeholder="<?php echo e(translate('Search by installment plan')); ?>" class="miniInputSdelka5 searchTable form-control" type="text">
                       </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="tech-companies-1" class="table table-sm table-striped mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkboxDivInput checkingInputRassrochkaChecked">
                                        <input class="checkBoxInput" type="checkbox" id="master">
                                    </div>
                                </th>   
                                <th>№</th>
                                <th><?php echo e(translate('Full name of the Customer')); ?></th>
                                <th><?php echo e(translate('Apartment number')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Period')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty(!$models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($model->client): ?>
                                        <tr class="jkMiniData mt-1 hideData">
                                            <td>
                                                <input type="hidden" class="hiddenData" value="<?php echo e(!empty($model->client) ? $model->client->last_name . ' ' . $model->client->first_name . ' ' . $model->client->middle_name : ''); ?> <?php echo e($model->agreement_number ?? ''); ?> <?php echo e(number_format($model->price_sell, 2)); ?> <?php echo e($model->installmentPlan->period ?? 0); ?> ">

                                                <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="checkboxDivInput checkingInputRassrochkaChecked">
                                                    <input class="checkBoxInput sub_chk" type="checkbox" data-id="<?php echo e($model->id); ?>">
                                                </a>
                                            </td>
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
                                                    <?php echo e($model->installmentPlan->period ?? 0); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="rassrochkaPokazatStatusGreen show-status" data-id="<?php echo e($model->id); ?>"
                                                    data-period="<?php echo e($model->installmentPlan->period); ?>"
                                                    data-price="<?php echo e($model->price_sell); ?>">
                                                    <?php echo e(translate('Show status')); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.installment-plan.edit', $model->id)); ?>" class="seaDiv btn text-success">
                                                    <i class="far fa-edit mdi-20"></i>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/installment-plan/index.blade.php ENDPATH**/ ?>