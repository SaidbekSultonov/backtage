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
                            <h4 class="mx-3">
                                <?php echo e(translate('Company update')); ?>

                            </h4>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="" action="<?php echo e(route('forthebuilder.house.company-update-save')); ?>" method="POST"> <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($company_details->id); ?>">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Company name')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->name); ?>" name="name" required>
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Settlement')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->settlement); ?>" name="settlement">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('MFO')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->mfo); ?>" name="mfo">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('OKED')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->oked); ?>" name="oked">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Address')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->address); ?>" name="address">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Bank')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->bank); ?>" name="bank">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('INN number')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->inn); ?>" name="inn">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Phone number')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->phone); ?>" name="phone">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label"><?php echo e(translate('Director')); ?></label>
                                <input type="text" class="form-control" value="<?php echo e($company_details->director); ?>" name="director">
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-outline-success">
                                    <?php echo e(translate('Save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/company-update.blade.php ENDPATH**/ ?>