<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Company Details')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>

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
                                <?php echo e(translate('Company details')); ?>

                            </h4>
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <a href="<?php echo e(route('forthebuilder.house.company-create')); ?>" class="btn btn-outline-primary d-flex justify-content-center align-items-center">
                                    <i class="fas fa-plus mdi-20"></i>
                                </a>
                            <?php endif; ?>
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
                                <th><?php echo e(translate('INN number')); ?></th>
                                <th><?php echo e(translate('Phone number')); ?></th>
                                <th><?php echo e(translate('Director')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th><?php echo e(translate('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($company_details)): ?> <?php $i = 1; ?>
                                <?php $__currentLoopData = $company_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td><?php echo e($value->name); ?></td>
                                        <td><?php echo e($value->settlement); ?></td>
                                        <td><?php echo e($value->mfo); ?></td>
                                        <td><?php echo e($value->oked); ?></td>
                                        <td><?php echo e($value->address); ?></td>
                                        <td><?php echo e($value->bank); ?></td>
                                        <td><?php echo e($value->inn); ?></td>
                                        <td><?php echo e($value->phone); ?></td>
                                        <td><?php echo e($value->director); ?></td>
                                        <td>
                                            <?php if($value->status == 1): ?>
                                                <span class="badge bg-success"><?php echo e(translate('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?php echo e(translate('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.house.company-update', $value->id)); ?>" class="text-primary btn px-1">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                <a href="<?php echo e(route('forthebuilder.house.company-delete', $value->id)); ?>" class="btn px-1">
                                                    <?php if($value->status == 1): ?>
                                                        <i class="fe-trash-2 mdi-20 text-danger"></i>
                                                    <?php else: ?>
                                                        <i class="mdi mdi-refresh mdi-20 text-success"></i>
                                                    <?php endif; ?>

                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="12"><?php echo e(translate('No data!')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br>
                    <?php echo e($company_details->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/company-index.blade.php ENDPATH**/ ?>