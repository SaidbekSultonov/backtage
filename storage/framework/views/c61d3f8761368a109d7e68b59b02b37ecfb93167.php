<?php $__env->startSection('title'); ?> <?php echo e(translate('Currency')); ?> <?php $__env->stopSection(); ?>
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
                    <form class="form-horizontal" action="" method="POST"> <?php echo csrf_field(); ?>
                        <div class="row  align-items-center ">
                            <div class="col-sm-2">
                                <label class="m-0 form-label">
                                    <?php echo e(translate('Default language')); ?>

                                </label>
                            </div>
                            <div class="col-sm-5">
                                <select class="yazikHeader demo-select2-placeholder" id="country" name="DEFAULT_LANGUAGE">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($language->code); ?>" <?php if (env('DEFAULT_LANGUAGE') == $language->code) {
                                            echo 'selected';
                                        } ?>>
                                            <?php echo e($language->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button class="yazik_soxranitBtn btn btn-outline-success">
                                    <?php echo e(translate('Save')); ?>

                                </button>
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
                                <th><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            <?php if(empty(!$languages)): ?> <?php $i = 1; ?>
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($first_language->id == $value->id): ?>
                                        <input type="hidden" name="language_id" value="<?php echo e($first_language->id); ?>">
                                        <form action="<?php echo e(route('languages.update')); ?>" method="POST"> <?php echo csrf_field(); ?> 
                                            
                                            <tr class="sozdatRassrochkaDataUae2">
                                                <td class="checkboxDivInput">
                                                    <?php echo e($i); ?>

                                                </td>
                                                <td class="checkboxDivTextInput3565">
                                                    <input style="border:none; height:46px;" type="text" class="form-control"
                                                        name="name" placeholder="<?php echo e(translate('Name')); ?>"
                                                        value="<?php echo e($first_language->name); ?>" required>
                                                </td>
                                                <td class="checkboxDivTextInput3565">
                                                    <select class="form-control" id="id_select2_example"
                                                        name="code">
                                                        <?php $__currentLoopData = \File::files(base_path('public/uploads/flags')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option data-value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                                name="<?php echo e(pathinfo($path)['filename']); ?>"
                                                                value="<?php echo e(pathinfo($path)['filename']); ?>"
                                                                <?php if($first_language->code == pathinfo($path)['filename']): ?> selected <?php endif; ?>>
                                                                <?php echo e(pathinfo($path)['filename']); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </td>
                                                
                                                <td class="seaDiv">
                                                    <button class=" btn text-success" type="submit">
                                                        <i class="far fa-check-circle mdi-20"></i>
                                                    </button>
                                                    
                                                    <a class="btn text-danger" href="<?php echo e(route('forthebuilder.language.index')); ?>" @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php else: ?>
                                        <tr class="sozdatRassrochkaDataUae2">
                                            <td class="checkboxDivInput">
                                                <?php echo e($i++); ?>

                                                <?php
                                                    $i = $i;
                                                ?>
                                            </td>
                                            <td class="checkboxDivTextInput3565">
                                                <?php echo e($value->name); ?>

                                            </td>
                                            <td class="checkboxDivTextInput3565">
                                                <?php echo e($value->code); ?>

                                            </td>
                                            <td class="checkboxDivTextInput35652">
                                                <a class="text-primary btn" href="<?php echo e(route('forthebuilder.language.show', encrypt($value->id))); ?>"
                                                    title="<?php echo e(translate('Translation')); ?>">
                                                    <i class="fas fa-language mdi-20"></i>
                                                </a>
                                            
                                                <a class="text-success btn" href="<?php echo e(route('forthebuilder.language.edit', encrypt($value->id))); ?>">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                <?php if($value->code != 'en'): ?>
                                                    <a class="text-danger btn" href="<?php echo e(route('forthebuilder.language.destroy', encrypt($value->id))); ?>"
                                                        @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

             
            
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        let page_name = 'language';

        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data['value']) {

                template = $("<div><img src='/uploads/flags/" + data['value'] +
                    ".png' style='width:30px; height:20px;'/><b text-align:center; padding-left:10px>" + text +
                    "</b></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({
            'height': '200px'
        });
    </script>
<?php $__env->stopSection(); ?>










<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/language/edit.blade.php ENDPATH**/ ?>