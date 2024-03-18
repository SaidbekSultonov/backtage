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
                            <a href="<?php echo e(route('forthebuilder.members.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3"><?php echo e(translate('Изменение участника: ')); ?> <?php echo e((($member) ? $member->full_name : '')); ?></h4>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="w-100" action="<?php echo e(route('forthebuilder.members.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                        <input type="hidden" value="<?php echo e((($member) ? $member->id : '')); ?>" name="id">
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
unset($__errorArgs, $__bag); ?>" name="last_name" value="<?php echo e((($member) ? $member->last_name : '')); ?>">
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
unset($__errorArgs, $__bag); ?>" name="first_name" value="<?php echo e((($member) ? $member->first_name : '')); ?>">
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
                                <input type="text" class="form-control" name="middle_name" value="<?php echo e((($member) ? $member->middle_name : '')); ?>">

                            </div>
                            <div class="col-4 mb-2">

                                <?php
                                    $phone = (($member) ? substr($member->phone, -9) : '');
                                ?>

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
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e($phone); ?>">
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
                                <input type="text" class="form-control" id="birth_date" name="birth_date" value="<?php echo e(((isset($member) && !empty($member->birth_date)) ? date('d.m.Y', strtotime($member->birth_date)) : '')); ?>">
                            </div>

                            <div class="col-4 mb-2">
                                <label class="form-label" for=""><?php echo e(translate('Изображение')); ?></label>
                                <div class="w-100 border rounded p-2">
                                    <?php if(!empty($member->img)): ?>
                                        <img style="max-width: 70%;" src="/uploads/members/<?php echo e($member->img); ?>" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="col-6 mb-2">
                                <label class="form-label text-capitalize"><?php echo e(translate('камера')); ?></label>
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

                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th><?php echo e(translate('Дата')); ?></th>
                                            <th><?php echo e(translate('Объект')); ?></th>
                                            <th><?php echo e(translate('Бренд/Фирма')); ?></th>
                                            <th><?php echo e(translate('Общая сумма/Квадратура')); ?></th>
                                            <th><?php echo e(translate('Нумерация купонов')); ?></th>
                                            <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                                <th width="200px"><?php echo e(translate('Действия')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($model) && count($model) > 0): ?> <?php $i = 1; ?>
                                            <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td><?php echo e(date('d.m.Y', strtotime($value->add_time))); ?></td>
                                                    <td>
                                                        <?php echo e($value->objects->name); ?>

                                                    </td>
                                                    <td><?php echo e((($value->shops) ? $value->shops->name : '')); ?></td>
                                                    <td><?php echo e(number_format($value->sum,0,'',' ')); ?></td>
                                                    <td>
                                                        <?php
                                                            $arr = explode(',',$value->coupon);
                                                            if (!empty($arr)) {
                                                                foreach ($arr as $keya => $valuea) {
                                                                    preg_match_all('!\d+!', $valuea, $matches); 

                                                                    foreach ($matches as $keyj => $valuej) {
                                                                        if (isset($valuej[0])) {
                                                                            if(
                                                                                ($valuej[0] == 125 && $member->id == 24) ||
                                                                                ($valuej[0] == 126 && $member->id == 25) ||
                                                                                ($valuej[0] == 127 && $member->id == 26) ||
                                                                                ($valuej[0] == 128 && $member->id == 26) ||
                                                                                ($valuej[0] == 129 && $member->id == 26) ||
                                                                                ($valuej[0] == 130 && $member->id == 26) ||
                                                                                ($valuej[0] == 131 && $member->id == 27) ||
                                                                                ($valuej[0] == 132 && $member->id == 28) ||
                                                                                ($valuej[0] == 133 && $member->id == 29) ||
                                                                                ($valuej[0] == 134 && $member->id == 30) ||
                                                                                ($valuej[0] == 135 && $member->id == 31) ||
                                                                                ($valuej[0] == 136 && $member->id == 32) ||
                                                                                ($valuej[0] == 137 && $member->id == 33) ||
                                                                                ($valuej[0] == 138 && $member->id == 33) ||
                                                                                ($valuej[0] == 139 && $member->id == 33) ||
                                                                                ($valuej[0] == 140 && $member->id == 33) ||
                                                                                ($valuej[0] == 141 && $member->id == 34)
                                                                                
                                                                            ){
                                                                                    echo "<span class='me-1 badge bg-success'>".$valuej[0]."A</span>";
                                                                            }
                                                                            else{
                                                                                echo "<span class='me-1 badge bg-success'>".$valuej[0]."</span>";
                                                                            }
                                                                        }

                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                        
                                                    </td>
                                                    <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                                        <td>
                                                            <button type="button" 
                                                                class="update btn btn-xs btn-primary" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#update" 
                                                                data-date="<?php echo e(((!empty($value->add_time)) ? date('d.m.Y',strtotime($value->add_time)) : '')); ?>" 
                                                                data-sum="<?php echo e($value->sum); ?>"
                                                                data-id="<?php echo e($value->id); ?>"
                                                                data-object-id="<?php echo e($value->object_id); ?>"
                                                                data-shop-id="<?php echo e($value->shop_id); ?>"> 
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7"><?php echo e(translate('Нет данных!')); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
                                    <input type="text" class="form-control dates" name="Purchase[0][date]" autocomplete="off">
                                </div>
                                <div class="col">
                                    <label class="form-label"><?php echo e(translate('Объект')); ?></label>
                                    <select name="Purchase[0][object]" class="form-control object">
                                        <?php if(!empty($objects)): ?> 
                                            <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>">
                                                    <?php echo e($value->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?> 
                                    </select>
                                </div>
                                <div class="col col_shop">
                                    <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
                                    <select name="Purchase[0][shop]" class="form-control shop">
                                        <?php if(!empty($shops)): ?>
                                            <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>">
                                                    <?php echo e($value->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col col_change">
                                    <label class="form-label col_sum"><?php echo e(translate('Сумма')); ?></label>
                                    <label class="form-label col_kv d-none"><?php echo e(translate('Квадратура')); ?></label>
                                    <input type="number" class="form-control" name="Purchase[0][sum]">
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


<div class="modal fade" id="update" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"><?php echo e(translate('Изменение')); ?></h4>
                <button type="button" class="btn-close btn-secondary btn btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-0">
                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update2" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"><?php echo e(translate('Изменение')); ?></h4>
                <button type="button" class="btn-close btn-secondary btn btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-0">
                <form class="row w-100 m-auto" action="<?php echo e(route('forthebuilder.members.one-update')); ?>" method="POST" enctype="multipart/form-data">
                    <input id="purchases2" type="hidden" value="" name="id">
                    <?php echo csrf_field(); ?>
                    <div class="col">
                        <label class="form-label"><?php echo e(translate('Дата')); ?></label>
                        <input type="text" class="form-control dates" name="date" id="update_date2" autocomplete="off">
                    </div>
                    <div class="col">
                        <label class="form-label"><?php echo e(translate('Объект')); ?></label>
                        <select name="object" class="form-control object object_update_modal2">
                            <?php if(!empty($objects)): ?> 
                                <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>">
                                        <?php echo e($value->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 
                        </select>
                    </div> 
                    <div class="col col_shop d-none">
                        <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
                        <select name="shop" class="form-control shop shop_update_modal2">
                            <?php if(!empty($shops)): ?>
                                <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>">
                                        <?php echo e($value->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>                   
                    <div class="col col_change">
                        <label class="form-label col_sum d-none"><?php echo e(translate('Сумма')); ?></label>
                        <label class="form-label col_kv"><?php echo e(translate('Квадратура')); ?></label>
                        <input type="number" class="form-control" name="sum" id="update_sum2">
                    </div>
                    <div class="col-12 my-3">
                        <button class="btn btn-success" type="submit"><?php echo e(translate('Сохранить')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="delete_text" data-text="<?php echo e(translate('Вы уверены ?')); ?>"></div>
    
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
        

        $('.object_update_modal').select2({
            dropdownParent: $("#update"),
        }) 

        $('.object_update_modal2').select2({
            dropdownParent: $("#update2"),
        }) 


        $('.shop_update_modal').select2({
            dropdownParent: $("#update"),
        })

        $('.shop_update_modal2').select2({
            dropdownParent: $("#update2"),
        }) 
        
        $('.dates').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });
    });

    
    
    $(document).on('click','.plus_row',function(){
        var count = parseInt($(this).attr('data-id'))

        $.ajax({
            url: `/members/new-rows`,
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

    $(document).on('click','.update',function(){
        var id = $(this).attr('data-id')

        $.ajax({
            url: `/members/update-purchases`,
            type: 'GET',
            datatype: 'json',
            data: {id: id},
            success: function(data) {
                $('#update .modal-body').html(data)
                $('.dates').mask('99.99.9999')   
                $('.object').select2({
                    dropdownParent: '#update'
                })   
                $('.shop').select2({
                    dropdownParent: '#update'
                }) 
                $('.dates').datepicker({
                    autoclose: true,
                    format: 'dd.mm.yyyy'
                });
            },
        
        });

        // var sum = $(this).attr('data-sum')
        // var date = $(this).attr('data-date')
        // var object_id = $(this).attr('data-object-id')
        // var shop_id = $(this).attr('data-shop-id')

        // if (shop_id == 0) {
        //     $('.object_update_modal2 option[value='+object_id+']').attr('selected',true).trigger("change");
        //     $('.shop_update_modal2 option[value='+shop_id+']').attr('selected',true).trigger("change");
        // }
        // else{
        //     $('.object_update_modal option[value='+object_id+']').attr('selected',true).trigger("change");   
        //     setTimeout(function(){
        //         $('.shop_update_modal option[value='+shop_id+']').attr('selected',true).trigger("change");   
        //     }, 1000);
        // }




        
        // $('#purchases').val(id)
        // $('#update_sum').val(sum)
        // $('#update_date').val(date)

        // $('#purchases2').val(id)
        // $('#update_sum2').val(sum)
        // $('#update_date2').val(date)
    })


    $(document).on('click','.delete',function(){
        var id = $(this).attr('data-id')
        var text = $('#delete_text').attr('data-text')

        if (confirm(text)) {
            $.ajax({
                url: `/members/delete-purchases`,
                type: 'GET',
                datatype: 'json',
                data: {id: id},
                success: function(data) {
                    if (data.status == 'success') {
                        window.location.reload()
                    }
                },
            
            });
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
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/members/show.blade.php ENDPATH**/ ?>