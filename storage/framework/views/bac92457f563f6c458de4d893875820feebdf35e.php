<?php use Modules\ForTheBuilder\Entities\Constants; ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style>
    #example_filter{
        margin-bottom: 10px !important;
    }
</style>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-9 d-flex justify-content-start align-items-center">
                                <h4><?php echo e(translate('Участники')); ?></h4>
                                <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                    <a href="<?php echo e(route('forthebuilder.members.create')); ?>" class="btn btn-outline-info ms-2">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                <?php endif; ?>    
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body" id="client">
                        <table class="table table-bordered table-striped mt-2" id="example">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th><?php echo e(translate('Дата')); ?></th>
                                    <th><?php echo e(translate('Ф.И.О')); ?></th>
                                    <th><?php echo e(translate('Номер телефона')); ?></th>
                                    <th><?php echo e(translate('Объект')); ?></th>
                                    <th><?php echo e(translate('Общая сумма/Квадратура')); ?></th>
                                    <th><?php echo e(translate('Количество купонов')); ?></th>
                                    <th width="200px"><?php echo e(translate('Действия')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($model) && count($model) > 0): ?> <?php $i = 1; ?>
                                    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(date('d.m.Y', strtotime($value->created_at))); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                                    <?php echo e($value->full_name); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                                    <?php echo e($value->phone); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php
                                                    if (!empty($value->total)) {
                                                        foreach ($value->total as $keyt => $valuet) {
                                                            echo "<span class='badge bg-info me-1'>".$valuet->objects->name."</span>";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                    $total_sum = 0;
                                                    $total_coupon = 0;
                                                    if (isset($value->total) && !empty($value->total)) {
                                                        foreach ($value->total as $keys => $values) {
                                                            $total_sum += $values->sum;
                                                            $total_coupon++;
                                                            // dd($values->coupons);
                                                        }        
                                                    }
                                                    echo $total_sum;
                                                ?>
                                                
                                            </td>
                                            <td><?php echo e(count($value->coupons)); ?></td>
                                            <td>
                                                <button data-id="<?php echo e($value->id); ?>" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-success add">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-danger delete" data-id="<?php echo e($value->id); ?>">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8"><?php echo e(translate('Нет данных!')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        
                    </div>
                </div>                
                
            </div>
        </div>
    </div>

<div class="modal fade" id="update" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel"><?php echo e(translate('Добавить')); ?></h4>
                <button type="button" class="btn-close btn-secondary btn btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <form class="w-100" action="<?php echo e(route('forthebuilder.members.add-purchases')); ?>" method="POST" enctype="multipart/form-data">
                    <div class="row m-auto w-100">
                        <input id="purchases" type="hidden" value="" name="id">
                        <?php echo csrf_field(); ?>
                        <div class="col">
                            <label class="form-label"><?php echo e(translate('Дата')); ?></label>
                            <input type="text" class="form-control dates" name="Purchase[1][date]" id="update_date" autocomplete="off">
                        </div>
                        <div class="col">
                            <label class="form-label"><?php echo e(translate('Объект')); ?></label>
                            <select name="Purchase[1][object]" class="form-control object object_update_modal">
                                <option value="1">Ecobozor</option>
                                <option value="2">Chimgan</option>
                                <option value="3">Chimgan Hills</option>
                            </select>
                        </div>
                        <div class="col col_shop">
                            <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
                            <select name="Purchase[1][shop]" class="form-control shop shop_update_modal">
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
                            <input type="number" class="form-control" name="Purchase[1][sum]" id="update_sum">
                        </div>
                    </div>

                    <div class="rows w-100 m-auto px-2"></div>

                    <div class="row w-100 m-auto">
                        <div class="col-12">
                            <hr>
                            <button class="btn btn-success" type="submit"><?php echo e(translate('Сохранить')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="delete_text" data-text="<?php echo e(translate('Вы уверены ?')); ?>"></div>
<div id="model" data-text="<?php echo e(count($model)); ?>"></div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    var page_name = 'index';
    $(document).ready(function() {

        var model_count = $('#model').attr('data-text')

        if (model_count > 0) {
            var table = new DataTable('#example', {
                "pageLength": 50,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/ru.json',
                },
            });
        }

        $('.object_update_modal').select2({
                dropdownParent: $("#update"),
        }) 
        $('.shop_update_modal').select2({
            dropdownParent: $("#update"),
        }) 
        
        $('.dates').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });


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
        
        
        
    })
    
    $(document).on('click','.applyBtn',function(){
        var date = $('.daterange').val()
        location.href = `/home/filtr/${date}`;
    })

    $(document).on('click','.plus_row',function(){
        var count = parseInt($(this).attr('data-id'))
        $('.plus_row').attr('data-id',++count)
        $.ajax({
            url: `/members/new-rows`,
            type: 'GET',
            datatype: 'json',
            data: {count: count},
            success: function(data) {
                $('.rows').append(data)
                $('.object').select2({
                    dropdownParent: $("#update"),
                }) 

                $('.shop').select2({
                    dropdownParent: $("#update"),
                }) 
                
                $('.dates').datepicker({
                    autoclose: true,
                    format: 'dd.mm.yyyy'
                });
                $('.dates').mask('99.99.9999')   
                
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

    $(document).on('click','.add',function(){
        var id = $(this).attr('data-id')
        $('#purchases').val(id)
        $('#update_date').val('')
        $('#update_sum').val('')
        $('.rows').html('')
    })

    $(document).on('click','.delete',function(){
        var id = $(this).attr('data-id')
        var text = $('#delete_text').attr('data-text')

        if (confirm(text)) {
            $.ajax({
                url: `/members/delete-member`,
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

    $(document).on('keyup', '.searchTable', function() {
        var text = $(this).val()

        $.ajax({
            url: `/members/search`,
            type: 'GET',
            datatype: 'json',
            data: {
                text: text
            },
            success: function(data) {
                $('#client').html(data)
                $('.pagination .page-link').each(function(i, obj) {
                    if ($(obj).attr('href')) {
                        var arr = $(obj).attr('href').split("/");
                        var firstEl = $(arr).first()[0];
                        var secondEl = arr[2];
                        var lastEl = $(arr).last()[0];
                        var search = lastEl.split("?")[0]
                        var page = lastEl.split("?")[1]
                        
                        var new_url = firstEl+'//'+secondEl+'/members?text='+text+'%3Fpage%3D8&'+page;
                        $(obj).attr('href',new_url)
                    }
                });                        
            },
        }); 
    })
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/members/index.blade.php ENDPATH**/ ?>