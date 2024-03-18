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
                                <?php echo e(translate('Language')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(route('env_key_update.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <div class="row align-items-center">
                            <div class="col-2">
                                <label class="panelUprText yazik_poUmolchaniya yazikPo_umolchaniya">
                                    <?php echo e(translate('Default language')); ?>

                                </label>
                            </div>
                            <div class="col">
                                <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                                <select class="yazikHeader form-control demo-select2-placeholder" id="country" name="DEFAULT_LANGUAGE">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($language->code); ?>" <?php if (env('DEFAULT_LANGUAGE') == $language->code) {
                                            echo 'selected';
                                        } ?>>
                                            <?php echo e($language->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <button class="yazik_soxranitBtn btn btn-outline-success"><?php echo e(translate('Save')); ?></button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Language')); ?></th>
                                <th><?php echo e(translate('Code')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th><?php echo e(translate('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php if(empty(!$languages)): ?> <?php $i = 1; ?>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="sozdatRassrochkaDataUae2">
                                        <td class="checkboxDivInput">
                                            <?php echo e($i++); ?>

                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <?php echo e($value->name); ?>

                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <?php echo e($value->code); ?>

                                        </td>

                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td class="seaDiv">
                                                <a class="btn text-primary" href="<?php echo e(route('forthebuilder.language.show', encrypt($value->id))); ?>"
                                                    title="<?php echo e(translate('Translation')); ?>">
                                                    <i class="fas fa-language mdi-20"></i>
                                                </a>
                                            
                                                <a class="btn text-success" href="<?php echo e(route('forthebuilder.language.edit', encrypt($value->id))); ?>">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                <?php if($value->code != 'en'): ?>
                                                    <a class="btn text-danger" href="<?php echo e(route('forthebuilder.language.destroy', encrypt($value->id))); ?>" @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br>
                    <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                        <a href="<?php echo e(route('languages.create')); ?>" class="yazik_soxranitBtn2 btn btn-outline-success">
                            <i class="fas fa-plus-circle"></i>
                            <?php echo e(translate('Add language')); ?>

                        </a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/language/index.blade.php ENDPATH**/ ?>