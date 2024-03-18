<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Company Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-12 d-flex align-items-center">                            
                            <a onclick="history.back()" href="#" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Company details')); ?>

                            </h4>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Company name')); ?></th>
                                <th><?php echo e(translate('Settlement')); ?></th>
                                <th><?php echo e(translate('MFO')); ?></th>
                                <th><?php echo e(translate('OKED')); ?></th>
                                <th><?php echo e(translate('Address')); ?></th>
                                <th><?php echo e(translate('Bank')); ?></th>
                                <th><?php echo e(translate('INN')); ?></th>
                                <th><?php echo e(translate('Phone number')); ?></th>
                                <th><?php echo e(translate('Director')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th><?php echo e(translate('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($company_details)): ?> <?php $i = 1; ?>
                                <?php $__currentLoopData = $company_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                    </tr>
                                <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="12"><?php echo e(translate('No data!')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/company-details-index.blade.php ENDPATH**/ ?>