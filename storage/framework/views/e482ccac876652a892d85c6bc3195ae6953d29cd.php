<?php 
    use Modules\ForTheBuilder\Entities\Constants; 
?>

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
                            <a href="<?php echo e(route('forthebuilder.members.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3"><?php echo e(translate('Добавить нового участника')); ?></h4>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="w-100" action="<?php echo e(route('forthebuilder.members.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Фамилия')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="last_name">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['last_name'];
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
                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Имя')); ?></label>
                                <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="first_name">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['first_name'];
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
                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Отчество')); ?></label>
                                <input type="text" class="form-control" name="middle_name">
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Номер телефона')); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">+998</div>
                                    <input type="text" class="form-control phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone">
                                </div>
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['phone'];
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
                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Дата рождения')); ?></label>
                                <input type="text" class="form-control" id="birth_date" name="birth_date">
                            </div>
                            
                            <div class="col-6 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Изображение')); ?></label>
                                <div id="my_camera"></div>
                                <br/>
                                <input type="button" value="<?php echo e(translate('Сделать снимок')); ?>" onClick="take_snapshot()" class="btn btn-info">
                                <input type="hidden" name="img" class="image-tag">
                            </div> 
                            <div class="col-6 mb-2">
                                <label for="form-label"><?php echo e(translate('Захваченное вами изображение появится здесь...')); ?></label>
                                <div id="results" class="border p-2 rounded"></div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <?php if(Session::has('message')): ?>
                            <p class="alert mt-2 <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                        <?php endif; ?>
                        <div class="rows">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label"><?php echo e(translate('Дата')); ?></label>
                                    <input type="text" class="form-control dates  <?php $__errorArgs = ['add_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Purchase[0][date]" autocomplete="off" required>

                                    <span class="error-data invalid-feedback">
                                        <?php $__errorArgs = ['add_time'];
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
                                <div class="col">
                                    <label class="form-label"><?php echo e(translate('Объект')); ?></label>
                                    <select name="Purchase[0][object]" class="form-control object <?php $__errorArgs = ['object_id'];
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
                                <div class="col col_shop">
                                    <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
                                    <select name="Purchase[0][shop]" class="form-control shop <?php $__errorArgs = ['shop_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php if(!empty($shops)): ?>
                                            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>">
                                                    <?php echo e($value->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>

                                    <span class="error-data invalid-feedback">
                                        <?php $__errorArgs = ['shop_id'];
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
                                <div class="col col_change">
                                    <label class="form-label col_sum"><?php echo e(translate('Сумма')); ?></label>
                                    <label class="form-label col_kv d-none"><?php echo e(translate('Квадратура')); ?></label>
                                    <input type="number" class="form-control <?php $__errorArgs = ['sum'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Purchase[0][sum]" required>
                                    <span class="error-data invalid-feedback">
                                        <?php $__errorArgs = ['sum'];
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3 text-end">
                                <button type="submit" class="btn btn-success"><?php echo e(translate('Сохранить')); ?></button>
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
        $('.dates').mask('99.99.9999')   
        $('#birth_date').mask('99.99.9999')   
        $('.object').select2()   
        $('.shop').select2() 

        $(document).on('change','.object',function(){
            var id = $(this).val()
            var _this = $(this)

            $.ajax({
                url: `/members/change-objects`,
                type: 'GET',
                datatype: 'json',
                data: {id: id},
                success: function(data) {
                    if (data == 'hills') {
                        _this.parent().siblings('.col_shop').addClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_sum').addClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_kv').removeClass('d-none')
                    }
                    else{
                        _this.parent().siblings('.col_shop').removeClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_sum').removeClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_kv').addClass('d-none')
                        _this.parent().siblings('.col').find('.shop').html(data)
                    }
                },
                
            });
        })
          
        
        $('.dates').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });
    });

    
    
    $(document).on('click','.plus_row',function(){
        var count = parseInt($(this).attr('data-id'))

        $.ajax({
            url: `new-rows`,
            type: 'GET',
            datatype: 'json',
            data: {count: count},
            success: function(data) {
                $('.rows').append(data)
                $('.object').select2()   
                $('.shop').select2()
                $('.dates').datepicker({
                    autoclose: true,
                    format: 'dd.mm.yyyy'
                });
                $('.dates').mask('99.99.9999')   
                $('.plus_row').attr('data-id',++count)
            },
            
        });

    })

    $(document).on('click','.minus_row',function(){
        var count = parseInt($('.plus_row').attr('data-id'))
        if (count > 1) {
            $('.plus_row').attr('data-id',--count)
            $('.rows .row').last().remove()
        }
    })

    
</script>
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/members/create.blade.php ENDPATH**/ ?>