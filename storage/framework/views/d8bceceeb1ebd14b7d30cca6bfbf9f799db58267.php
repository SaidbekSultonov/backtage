<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Currency')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">
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
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-11 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.settings.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Coupon')); ?>

                            </h4>
                        </div>
                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                            <div class="col-md-1 text-end">
                                <a href="#" class="addNewCoupon btn btn-outline-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Coupon name')); ?></th>
                                <th><?php echo e(translate('Percentage discount %')); ?></th>
                                <th><?php echo e(translate('Date of creation')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th><?php echo e(translate('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <tr class="sozdatKupon2 formNewCoupon d-none">
                                <td class="checkboxDivInput">
                                    <?php echo e($model->firstItem() + ($key ?? 0) + 1); ?>

                                </td>
                                <td>
                                    <input type="text" class="checkboxDivTextInput3565 form-control-sm form-control couponCreateName">
                                </td>
                                <td>
                                    <input type="text" class="checkboxDivTextInput3565 form-control-sm form-control couponCreatePercent">
                                </td>
                                <td>
                                    <div class="checkboxDivTextInput3565 checkboxDivTextInput3565none"></div>
                                </td>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <td class="checkboxDivTextInput35652">
                                        <div class="seaDiv couponSave btn text-success">
                                            <i class=" far fa-check-circle mdi-20"></i>
                                        </div>
                                        <div class="seaDiv removeFormCoupon btn text-danger">
                                            <i class="fe-trash-2 mdi-20"></i>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php if(!empty($model)): ?>
                                <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="sozdatKupon2">
                                        <td class="checkboxDivInput">
                                            <?php echo e($model->firstItem() + $key); ?>

                                            <input type="hidden" class="checkboxDivTextInput3565 couponId"
                                                value="<?php echo e($value->id); ?>">
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <span><?php echo e($value->name); ?></span>
                                            <input type="hidden" class="checkboxDivTextInput3565 couponName form-control form-control-sm"
                                                value="<?php echo e($value->name); ?>">
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <span><?php echo e($value->percent); ?></span>
                                            <input type="hidden" class="checkboxDivTextInput3565 couponPercent form-control form-control-sm"
                                                value="<?php echo e($value->percent); ?>">
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <?php echo e(date('d.m.Y', strtotime($value->created_at))); ?>

                                        </td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td class="checkboxDivTextInput35652">
                                                <div class="seaDiv couponUpdate d-none btn text-success">
                                                    <i class=" far fa-check-circle mdi-20"></i>
                                                </div>
                                                <div class="seaDiv couponEdit btn text-primary">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </div>
                                                
                                                <button type="button" class="seaDiv clientDelete model_delete btn text-danger"
                                                    data-url="<?php echo e(route('forthebuilder.coupon.destroy', $value->id)); ?>">
                                                     <i class="fe-trash-2 mdi-20" data-bs-toggle="modal" data-bs-target="#exampleModalLong"></i>
                                                    
                                                </button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h4>
                <div class="d-flex justify-content-center mt-3">
                    <form action="" method="POST" id="form_delete">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="modalVideystvitelnoDa btn btn-outline-success me-2"><?php echo e(translate('Yes')); ?></button>
                    </form>
                    <button class="modalVideystvitelnoNet btn btn-outline-danger" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/coupon/index.blade.php ENDPATH**/ ?>