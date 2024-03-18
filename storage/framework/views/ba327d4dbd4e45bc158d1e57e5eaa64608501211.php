<?php $__env->startSection('title'); ?> <?php echo e(translate('Contracts')); ?> <?php $__env->stopSection(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    td a{
        color: #555 !important;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-3 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Sales')); ?>

                            </h4>
                            
                        </div>
                        
                        <div class="col-md-9 d-flex align-items-center justify-content-end">
                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.deal.index')); ?>">
                                <span><?php echo e(translate('Kanban board')); ?></span>
                            </a>
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="cdelki_c_klientami btn btn-outline-info ms-1">
                                <?php echo e(translate('List deals')); ?>

                            </a>
                            <a href="<?php echo e(route('forthebuilder.deal.archives')); ?>" class="btn btn-outline-secondary ms-1">
                                <?php echo e(translate('Archive deals')); ?>

                            </a>
                        
                            <input placeholder="<?php echo e(translate('Client search')); ?>" class="w-25 ms-1 form-control miniInputSdelka searchTable" type="text" value="<?php echo e(((!empty($search_value)) ? $search_value : '')); ?>">
                        
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body" id="client">
                    <?php if(Session::has('message')): ?>
                        <p class="mb-3 alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Deal object')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Date deal')); ?></th>
                                <th><?php echo e(translate('Contract number')); ?></th>
                                <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                                    <th><?php echo e(translate('Archive')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty(!$models)): ?>
                                <?php
                                    $n = 1;
                                ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($value)): ?>
                                        <tr class="jkMiniData mb-1 hideData">
                                            <td class="">
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivInput">
                                                    
                                                    <?php echo e($models->firstItem() + $key); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivTextInput">
                                                    <?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                                    <?php echo e($value->house_name ?? ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                                    <?php echo e($value->price_sell ?? ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="dataSdelkaJk">
                                                    
                                                    <?php echo e($value->updated_at ? date('d.m.Y H:i', strtotime($value->updated_at)) : ''); ?>

                                                </a>
                                            </td> 
                                            <td>
                                                <?php if(!empty($value->contract)): ?>
                                                    <?php echo e($value->contract); ?>

                                                <?php else: ?>
                                                    <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                                <?php endif; ?>
                                                
                                            </td>
                                            <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                                                <td>
                                                    <i class="fas fa-archive mdi-20 btn btn-xs text-danger cancel_deal" data-id="<?php echo e($value->deal_id); ?>"></i>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <?php echo e($models->links()); ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="cancel_confirm_modal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><?php echo e(translate('Write the reason for canceling the deal')); ?></h4>
            </div>
            <div class="modal-body text-center">
                <textarea id="cancel_textare" rows="4" class="form-control"></textarea>
                <br>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="cancel_confirm btn btn-success"><?php echo e(translate('Confirm')); ?></button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
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
                        
                        var new_url = firstEl+'//'+secondEl+'/deal/contracts?text='+text+'%3Fpage%3D8&'+page;
                        $(obj).attr('href',new_url)
                    }
                });                        
            },
        }); 
    })


    $(document).on('click','.cancel_deal',function(){
        $('#cancel_textare').removeClass('border-danger')
        $('#cancel_textare').val('')
        var id = $(this).attr('data-id')
        $('#cancel_confirm_modal2').modal('toggle')
        $('#cancel_confirm_modal2 .cancel_confirm').attr('data-id', id)
    })

    // cancelConfirm
    $(document).on('click','.cancel_confirm',function(){
        var text = $('#cancel_textare').val()
        var id = $(this).attr('data-id')

        if (text != '' && id != '') {
            $.ajax({
                url: `/deal/cancel-deal`,
                type: 'POST',
                data: {
                    text: text,
                    id: id,
                    new_parent: 0,
                },
                success: function(data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                        window.location.reload()
                    }
                    else{
                        $('#cancel_confirm_modal2').modal('toggle')
                        showToast('danger',data.message)
                    }
                },
            });
        }
        else{
            $('#cancel_textare').addClass('border-danger')
        }
    })


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/contracts.blade.php ENDPATH**/ ?>