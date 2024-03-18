<?php use Modules\ForTheBuilder\Entities\Constants; ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row w-100 align-items-center">
                        <div class="col-12 d-flex justify-content-start align-items-center">
                            <a href="<?php echo e(route('forthebuilder.shops.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3"><?php echo e(translate('Update shop')); ?></h4>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="w-100" action="<?php echo e(route('forthebuilder.shops.save')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($model->id); ?>">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Name')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($model->name); ?>">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Объект')); ?></label>
                                <select name="object_id" id="object" class="form-control objects <?php $__errorArgs = ['object_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                     <?php if(!empty($objects)): ?>
                                        <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>">
                                                <?php echo e($value->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['object_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <?php echo e($message); ?>

                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </span>
                            </div>

                            <div class="col-6 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Наименование брендов')); ?></label>
                                <input type="text" class="form-control" name="brend" value="<?php echo e($model->brend); ?>">
                            </div>

                            <div class="col-6 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Торговое помещение')); ?></label>
                                <input type="text" class="form-control" name="torg" value="<?php echo e($model->torg); ?>">
                            </div>

                            <div class="col-12 text-end">
                                <hr>
                                <button type="submit" class="btn btn-success"><?php echo e(translate('Save')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                
            
        </div>
    </div>
</div>

    
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="<?php echo e(asset('/backend-assets/plugins/jquery.maskedinput.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


<script>
    var page_name = 'index';
    $(document).ready(function() {
        $('#birth_date').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });

        $('.phone').mask('(99) 999 99 99')  
        $('.objects').select2()    
        
    });

    
    $('.daterange').daterangepicker({
        locale: {
            format: 'DD.MM.YYYY',
            "applyLabel": $('#lang_app').attr('lang'),
            "cancelLabel": $('#lang_cancel').attr('lang'),
        }
    });
    
    $(document).on('click','.applyBtn',function(){
        var date = $('.daterange').val()
        location.href = `/home/filtr/${date}`;
    })

    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/shops/update.blade.php ENDPATH**/ ?>