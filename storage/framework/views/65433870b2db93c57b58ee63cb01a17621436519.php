<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-4 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Clients')); ?>

                            </h4>
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <a href="<?php echo e(route('forthebuilder.clients.create')); ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        
                        <div class="col-md-3 ms-auto">
                            <input placeholder="<?php echo e(translate('Client search')); ?>" class="form-control miniInputSdelka searchTable" type="text" value="<?php echo e(((!empty($search_value)) ? $search_value : '')); ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body" id="client">
                    <table class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Source')); ?></th>
                                <th><?php echo e(translate('Phone number')); ?></th>
                                <th> <?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty(!$models)): ?>
                                <?php
                                    $n = 1;
                                ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="jkMiniData mt-1 hideData">
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="checkboxDivInput spisokMarginRight7 text-dark">
                                                <?php echo e($n++); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="checkboxDivTextInput vseClientiVaqtinchaWith  spisokMarginRight7 text-dark">
                                                <?php echo e($value->last_name . ' ' . $value->first_name . ' ' . $value->middle_name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>">
                                                <?php if(!empty($value->source)): ?>
                                                    <?php echo e($value->source); ?>

                                                <?php else: ?>
                                                    <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                                <?php endif; ?>   
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="spisokCheckImia spisokMarginRight7 text-dark">
                                                <?php if(!empty($value->phone)): ?>
                                                    <?php echo e($value->phone); ?>

                                                <?php else: ?>
                                                    <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="tel: <?php echo e($value->phone); ?>" class="seaDiv btn text-success">
                                                <i class="fas fa-phone-alt mdi-20"></i>
                                            </a>
                                            <span class="seaDiv btn text-warning open_modal_sms" data-bs-toggle="modal" data-bs-target="#exampleModal33" data-client-id="<?php echo e($value->id); ?>">
                                                <i class="far fa-envelope mdi-20"></i>
                                            </span>
                                            <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                                                <div class="seaDiv clientDelete btn text-danger"
                                                    data-url="<?php echo e(route('forthebuilder.clients.destroy', $value->id)); ?>">
                                                    <i class="fe-trash-2 mdi-20" data-bs-toggle="modal" data-bs-target="#exampleModalLong"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br>
                    <?php echo e($models->links()); ?>

                </div>
            </div>


        </div>
    </div>
</div>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno">Вы действительно хотите удалить</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <form style="display: inline-block;" action="" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="modalVideystvitelnoDa btn btn-outline-success me-2"><?php echo e(translate('Yes')); ?></button>
                        </form>
                        <button class="modalVideystvitelnoNet btn btn-outline-danger" data-bs-dismiss="modal"><?php echo e(translate('No')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal33" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Send sms')); ?></h4>
                <button type="button" class="close btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 text-center d-flex justify-content-center flex-column">
                        <div id="deals"></div>
                        <select name="sms_templates" class="form-control select2_sms" data-placeholder="<?php echo e(translate('Choose sms template')); ?>">
                            <option></option>
                            <?php if(!empty($sms_templates)): ?>
                                <?php $__currentLoopData = $sms_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option data-text="<?php echo e($value->template); ?>" value="<?php echo e($value->id); ?>">
                                        <?php echo e($value->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <br>
                        <textarea class="form-control template" rows="7" name="template"></textarea>
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary"><?php echo e(translate('Close')); ?></button>
                <button type="button" class="btn btn-success send_sms" data-client-id=""><?php echo e(translate('Send')); ?></button>
            </div>
        </div>
    </div>
</div>



<script>
    let page_name = 'all-clients';
    $(document).ready(function() {

        $('.select2_sms').select2({
            dropdownParent: $("#exampleModal33")
        })
        $(document).on('change','.select2_sms', function(){
            var id = $(this).val()
            $('.template').val('')

            $.ajax({
                url: `/installment-plan/change-sms-template`,
                type: 'GET',
                datatype: 'json',
                data: {id: id},
                success: function(data) {
                    if (data.status == 'success') {
                        $('.template').val(data.message)
                    }
                    else{
                        $('.template').val(data.message)
                    }
                },
                
            }); 
            
        })
    });

    

    $(document).on('click','.send_sms',function(){
        var template = $('.template').val()
        var _this = $(this)
        var client_id = $(this).attr('data-client-id')
        var select2_deal = $('.select2_deal').val()
        
        _this.prop('disabled',true)

        if (template != '' && select2_deal != '') {
            $.ajax({
                url: `/installment-plan/send-sms-one`,
                type: 'GET',
                datatype: 'json',
                data: {
                    template: template,
                    client_id: client_id,
                    select2_deal: select2_deal
                    
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('.template').removeClass('border-danger')                        
                        toastr.success(data.message);
                        $('#exampleModal33').modal('toggle')
                    }
                    else{
                        toastr.error(data.message);
                        $('#exampleModal33').modal('toggle')
                    }
                    
                },
                
            }); 
        }
        else{
            $('.template').addClass('border-danger') 
            _this.prop('disabled',false)           
        }
    })


    $(document).on('click','.open_modal_sms',function(){
        var client_id = $(this).attr('data-client-id')
        $('.send_sms').attr('data-client-id',client_id)

        // $.ajax({
        //     url: `find-deals`,
        //     type: 'GET',
        //     datatype: 'json',
        //     data: {
        //         client_id: client_id
        //     },
        //     success: function(data) {
        //         $('#deals').html(data)
        //         $(function(){
        //             $('.select2_deal').select2({
        //                 dropdownParent: $("#exampleModal33")
        //             })
        //         })
        //     },
        // }); 
    })

    $(document).on('keyup', '.searchTable', function() {
        var text = $(this).val()

        $.ajax({
            url: `search`,
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
                        
                        var new_url = firstEl+'//'+secondEl+'/clients/all-clients?text='+text+'%3Fpage%3D8&'+page;
                        $(obj).attr('href',new_url)
                    }
                });                        
            },
        }); 
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/clients/all-clients.blade.php ENDPATH**/ ?>