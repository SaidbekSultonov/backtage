<?php $__env->startSection('title'); ?> <?php echo e(translate('Contracts')); ?> <?php $__env->stopSection(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    td a{
        color: #555 !important;
    }
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-9 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Sales')); ?>

                            </h4>
                            
                        </div>
                        
                        <div class="col-md-3">
                            <input placeholder="<?php echo e(translate('Search by sales')); ?>" class="form-control miniInputSdelka5 searchTable"
                                type="text">  
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Deal object')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Date deal')); ?></th>
                                <th><?php echo e(translate('Print')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty(!$models)): ?>
                                <?php
                                    $n = 1;
                                ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($value)): ?>
                                        <tr class="jkMiniData mb-1 hideData">
                                            <td class="">
                                                <input type="hidden" class="hiddenData"
                                                value="<?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?> <?php echo e($value->house_name ?? ''); ?> <?php echo e($value->price_sell ?? ''); ?> <?php echo e($value->task_title ? $value->task_title : $defaultAction[$value->deal_type]); ?>">
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivInput">
                                                    
                                                    <?php echo e($models->firstItem() + $key); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivTextInput">
                                                    <?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                                    <?php echo e($value->house_name ?? ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                                    <?php echo e($value->price_sell ?? ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="dataSdelkaJk">
                                                    
                                                    <?php echo e($value->updated_at ? date('d.m.Y H:i', strtotime($value->updated_at)) : ''); ?>

                                                </a>
                                            </td> 
                                            <td class="text-center">
                                                <a class="dataSdelkaJk text-primary" href="<?php echo e(route('forthebuilder.deal.printContract', $value->deal_id)); ?>">
                                                    <i class="mdi mdi-printer font-20"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <?php echo e($models->links()); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/deal/contracts.blade.php ENDPATH**/ ?>