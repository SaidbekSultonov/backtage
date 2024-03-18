<?php $__env->startSection('title'); ?>
    <?php echo e(__('locale.apartment_sale')); ?>

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
                            <h4 class="me-2">
                                <?php echo e(translate('Reports')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="<?php echo e(route('forthebuilder.user.report-clients')); ?>" class="btn btn-outline-info w-100 mb-2 text-start"><?php echo e(translate('Report on clients')); ?></a>
                        <a href="<?php echo e(route('forthebuilder.user.report-deals')); ?>" class="btn btn-outline-info w-100 mb-2 text-start"><?php echo e(translate('Deal report')); ?></a>
                        <a href="<?php echo e(route('forthebuilder.user.report-houses')); ?>" class="btn btn-outline-info w-100 mb-2 text-start"><?php echo e(translate('Report on the object')); ?></a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/report.blade.php ENDPATH**/ ?>