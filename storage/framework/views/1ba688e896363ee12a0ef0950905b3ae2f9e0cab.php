<?php $__env->startSection('title'); ?> <?php echo e(translate('show')); ?> <?php $__env->stopSection(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/toastr.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .cash_icon{
        width: 86px;
        height: 74px;
    }
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
    .nav-link3{
        height: 70px;
        display: flex !important;
        align-items: center !important;
    }
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-12 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.installment-plan.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>                            
                            <h4 class="ms-3">
                               <?php echo e(translate('Installment plan')); ?>

                            </h4>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="box p-2 border border-primary bg-primary bg-white rounded">
                            <h3 class="text-white"><?php echo e(translate('Total amount')); ?></h3>
                            <h4 class="text-white"><?php echo e($total_sum); ?></h4>
                        </div>        
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="box p-2 border border-success bg-success bg-white rounded">
                            <h3 class="text-white"><?php echo e(translate('Paid amount')); ?></h3>
                            <h4 class="text-white">
                                
                                <?php echo e(number_format($model->pay_sum,2,'.',',')); ?>    
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="box p-2 border border-danger bg-danger bg-white rounded">
                            <h3 class="text-white"><?php echo e(translate('How much is left')); ?></h3>
                            <h4 class="text-white"><?php echo e($remaining_sum); ?></h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5><?php echo e(translate('Client full name')); ?></h5>
                            <a href="<?php echo e(route('forthebuilder.clients.show', [$model->client->id, 0, 0])); ?>">
                                <div class="form-control text-primary">
                                    <?php echo e($model->client->first_name.' '.$model->client->last_name.' '.$model->client->middle_name); ?>

                                </div>
                            </a>

                            <h5 ><?php echo e(translate('Phone')); ?></h5>
                            <div class="form-control">
                                <?php 
                                    echo (($model->client->phone) ? $model->client->phone : '<span class="text-muted">'.translate('Not specified').'</span>');
                                ?>
                            </div>

                            <h5><?php echo e(translate('Email')); ?></h5>
                            <div class="form-control">
                                <?php 
                                    echo (($model->client->email) ? $model->client->email : '<span class="text-muted">'.translate('Not specified').'</span>');
                                ?>
                            </div>

                            <h5><?php echo e(translate('Passport data')); ?></h5>
                            <div class="form-control">
                                <?php 
                                    echo (($model->client->informations) ? $model->client->informations->series_number : '<span class="text-muted">'.translate('Not specified').'</span>');
                                ?>
                            </div>
                            <h5><?php echo e(translate('Contract start date')); ?></h5>
                            <div class="form-control">
                                <?php echo e(date('d.m.Y', strtotime($model->initial_fee_date))); ?>

                            </div>

                            <h5><?php echo e(translate('Contract')); ?></h5>
                            <div class="form-control">
                                <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$model->id])); ?>">
                                    <?php echo e($model->contract); ?>

                                </a>
                            </div>
                            
                        </div>
                        <div class="col-sm-3">
                            <h5><?php echo e(translate('Apartment')); ?></h5>
                            <div class="form-control">
                                <a href="<?php echo e(route('forthebuilder.house-flat.show', [$model->house_flat_id])); ?>">
                                    <?php echo e($model->house->name); ?>

                                    (<?php echo e($model->house->corpus); ?>)
                                    <?php 
                                        echo (($model->agreement_number) ? $model->agreement_number : '<span class="text-muted">'.translate('Not specified').'</span>');
                                    ?>
                                </a>
                            </div>

                            <h5><?php echo e(translate('Transaction price')); ?></h5>
                            <div class="form-control">
                                <?php echo e(number_format($model->price_sell, 2, '.', ',')); ?>

                            </div>

                            <h5><?php echo e(translate('Down payment')); ?></h5>
                            <div class="form-control">
                                <?php echo e(number_format($model->initial_fee, 2, '.', ',')); ?>

                            </div>

                            <h5><?php echo e(translate('Installment period')); ?>

                                <span class="text-muted">( <?php echo e(translate('month')); ?> )</span>
                            </h5>
                            <div class="form-control">
                                <?php
                                    if(isset($model->period) && $model->period->period != 0){
                                        echo $model->period->period;
                                    }
                                    elseif(isset($model->installmentPlan)){
                                        echo $model->installmentPlan->period;
                                    }

                                ?>
                            </div>

                            <h5><?php echo e(translate('Installment percent')); ?></h5>
                            <div class="form-control">
                                <?php echo e($model->installmentPlan->percent_type); ?>%
                            </div>

                            <h5><?php echo e(translate('Installment discount')); ?></h5>
                            <div class="form-control">
                                <?php echo e((($model->initial_fee_discount) ? $model->initial_fee_discount : 0)); ?>%
                            </div>


                        </div>
                        <div class="col-sm-5 d-flex flex-column justify-content-between">
                            <div>
                                <h5> <?php echo e(translate('Responsible')); ?>:</h5>
                                <div class="form-control">
                                    <?php if(isset($model->user)): ?>
                                        <a href="<?php echo e(route('forthebuilder.user.show', $model->user->id)); ?>">
                                            <?php echo e($model && $model->user ? $model->user->first_name . ' ' . $model->user->last_name . ' ' . $model->user->middle_name : ''); ?>        
                                        </a>
                                    <?php else: ?>
                                        <?php echo e(translate('Not specified')); ?>

                                    <?php endif; ?>
                                    
                                </div> 
                                <br>
                                <?php
                                    $mainImg = "";
                                    if ($model->house_flat && $model->house_flat->main_image) {
                                        $mainImg = $model->house_flat->main_image->guid;
                                    }
                                ?>
                                <div class="border rounded w-100">
                                    <img class="img-fluid"
                                    src="<?php echo e(asset('/uploads/house-flat/' . $model->house_id . '/m_' . $mainImg)); ?>"
                                    alt="House">    
                                </div>   
                            </div>
                            
                            
                            
                            <a class="btn btn-outline-primary d-flex justify-content-center w-50 align-items-center btn-xs ms-auto" href="<?php echo e(route('forthebuilder.deal.printContract', $model->id)); ?>">
                                <i class="mdi mdi-printer mdi-20 me-1"></i>
                                <span><?php echo e(translate('Print')); ?></span>
                            </a>
                                
                            
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th> №</th>
                                <th><?php echo e(translate('Image')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Remaining amount')); ?></th>
                                <th><?php echo e(translate('Date must payment')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th><?php echo e(translate('Date of payment')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th><?php echo e(translate('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($model)) {
                                    switch ($model->installmentPlan->period) {
                                        case 12:
                                            $pay_month = round(($model->price_sell - $model->initial_fee) / 12, 2, PHP_ROUND_HALF_UP);
                                            break;
                                        case 18:
                                            $pay_month = round(($model->price_sell - $model->initial_fee) / 18, 2, PHP_ROUND_HALF_UP);
                                            break;
                                    }
                                }
                            ?>
                            <?php if(empty(!$statuses)): ?>
                                <?php $i=0; ?>
                                <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $i++;
                                        $back_color = '';
                                        $text_color = '';
                                        $text = '';
                                        $paid_sum = $status->sum ?? 0;
                                    ?>
                                    <tr>
                                        <td> <?php echo e($i); ?></td>
                                        <?php
                                            if (isset($status)) {
                                                if ($status->status == Constants::NOT_PAID) {
                                                    $back_color = 'bg-danger';
                                                    $text = translate('Not paid');
                                                } elseif ($status->status == Constants::PAID) {
                                                    $back_color = 'bg-success';
                                                    $text = translate('Paid');
                                                } else {
                                                    $text_color = 'text-dark';
                                                    $back_color = 'bg-warning';
                                                    $text = translate('Partial payment');
                                                }
                                            }
                                        ?>
                                        <td>
                                            
                                            <?php if(!empty($status->image)): ?>
                                                <a href="<?php echo e(asset('/uploads/installment/' . $status->image)); ?>" class="test-popup-link">
                                                    <img width="100px" class="img-fluid" src="<?php echo e(asset('/uploads/installment/' . $status->image)); ?>" >
                                                </a>
                                            <?php endif; ?>
                                            
                                        </td>
                                        <td>
                                            <?php echo e(number_format(round($status->price, 2, PHP_ROUND_HALF_UP), 2,'.',',')); ?>

                                        </td>
                                        <td>
                                            <?php echo e(number_format(round($status->price_to_pay, 2, PHP_ROUND_HALF_UP), 2,'.',',')); ?>

                                        </td>
                                        <td>
                                            <?php echo e($status->must_pay_date ? date('d.m.Y', strtotime($status->must_pay_date)) : ''); ?>

                                        </td>
                                        <td>
                                            <span type="button" class="plan_status_button badge dropdown-toggle <?php echo e($back_color ?? ''); ?> <?php echo e($text_color ?? ''); ?>">
                                                <?php echo e($text); ?> 
                                            </span>
                                        </td>
                                        <td>
                                            <?php echo e($status->pay_date ? date('d.m.Y', strtotime($status->pay_date)) : ''); ?>

                                        </td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td>
                                                <div class="btn btn-sm btn-outline-success plan_status_not_paid2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?php echo e($status->id); ?>" data-deal_id="<?php echo e($status->deal_id); ?>"
                                                        data-installment_plan_id="<?php echo e($status->installment_plan_id); ?>" data-val="<?php echo e(Constants::PAID); ?>">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                                <div class="btn btn-sm btn-outline-primary open_modal_sms" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-id="<?php echo e($status->id); ?>" data-deal_id="<?php echo e($status->deal_id); ?>" data-date="<?php echo e($status->must_pay_date); ?>" data-contract="<?php echo e($status->deal->contract); ?>"
                                                        data-installment_plan_id="<?php echo e($status->installment_plan_id); ?>" data-sum="<?php echo e(round($status->price,2)); ?>">
                                                    <i class="fas fa-sms"></i>
                                                </div>
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





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('Choose one of the payment methods')); ?></h5>
                <button type="button" class="close btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-5">
                <div class="row">
                    <div class="col text-center d-flex justify-content-center">
                        <div class="cash_btn btn border rounded cash_icon d-flex justify-content-center align-items-center text-success" data-bs-toggle="modal" data-bs-target="#modal-default-sum">
                            <i class="fas fa-wallet fa-2x"></i>
                        </div>
                    </div>
                    <div class="col text-center d-flex justify-content-center">
                        <a href="#" class="btn border rounded">
                            <img width="60px" src="<?php echo e(asset('/backend-assets/img/payme.png')); ?>" alt="">
                        </a>
                    </div>
                    <div class="col text-center d-flex justify-content-center">
                        <a href="#" class="btn border rounded">
                            <img width="60px" src="<?php echo e(asset('/backend-assets/img/click.png')); ?>" alt="">
                        </a>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-default-reduce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <form class="modal-dialog" action="<?php echo e(route('forthebuilder.installment-plan.reduceSum')); ?>"
        method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-content">
            <div class="modal-header" style="padding:14px 34px 14px 84px">
                <h4 class="modal-title"><?php echo e(translate('Cancel entered amount')); ?></h4>
                <button type="button" class="close btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <input class="form-control install_id" type="hidden" name="id">
                        <input class="form-control payment_status" type="hidden" name="status">
                    </div>
                </div>
                <br>
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-success"
                            id="reduce_sum"><?php echo e(translate('Confirm')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-default-sum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <form action="<?php echo e(route('forthebuilder.installment-plan.paySum')); ?>" class="modal-dialog" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo e(translate('Enter payment amount')); ?></h4>
                <button type="button" class="close btn btn-sm btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="sum" step="0.01" min="0">
                        <input class="form-control payment_status" type="hidden" name="status">
                        <input class="form-control install_id" type="hidden" name="id">
                        <input class="form-control deal_id" type="hidden" name="deal_id">
                        <input class="form-control installment_plan_id" type="hidden" name="installment_plan_id">
                        <br>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="payment_sum"><?php echo e(translate('Pay')); ?></button>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-success send_sms" data-client-id="<?php echo e($model->client->id); ?>"><?php echo e(translate('Send')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>
<script>
    let page_name = 'installment-plan';
    $(document).ready(function() {
        $('.plan_status_button').on('click', function() {
            let content_id = $(this).data('content');
            let play_status_content = $('.plan_status_content')
            let play_status_array = Array.from(play_status_content)
            if ($('#content_' + content_id).hasClass('display-none')) {
                play_status_array.forEach(PlanStatus)
                $('#content_' + content_id).removeClass('display-none')
            } else {
                $('#content_' + content_id).addClass('display-none')
            }
        });

        function PlanStatus(item, index) {
            if (item.classList.contains('display-none') == false) {
                item.classList.add('display-none')
            }
        }
        $('.plan_status_paid').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))
        });
        $('.plan_status_not_paid2').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))


            var data_id = $(this).attr('data-id')
            var data_deal_id = $(this).attr('data-deal_id')
            var data_installment_plan_id = $(this).attr('data-installment_plan_id')
            var data_val = $(this).attr('data-val')

            $('.cash_btn').attr('data-id', data_id)
            $('.cash_btn').attr('data-deal_id', data_deal_id)
            $('.cash_btn').attr('data-installment_plan_id', data_installment_plan_id)
            $('.cash_btn').attr('data-val', data_val)

        });
        $('.plan_status_part').on('click', function() {
            $('.install_id').val($(this).data('id'))
            $('.payment_status').val($(this).data('val'))
            $('.deal_id').val($(this).data('deal_id'))
            $('.installment_plan_id').val($(this).data('installment_plan_id'))
        });

        $('.select2_sms').select2({
            dropdownParent: $("#exampleModal2")
        })
        $(document).on('change','.select2_sms', function(){
            var id = $(this).val()
            var contract = $(this).attr('data-contract')
            var date = $(this).attr('data-date')
            var deal_id = $(this).attr('data-deal-id')
            var sum = $(this).attr('data-sum')
            $('.template').val('')

            $.ajax({
                url: `/installment-plan/change-sms-template`,
                type: 'GET',
                datatype: 'json',
                data: {
                    id: id,
                    contract: contract,
                    date: date,
                    deal_id: deal_id,
                    sum: sum,
                },
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
        var id = $('.select2_sms').val()
        var deal_id = $(this).attr('data-deal-id')
        var date = $(this).attr('data-date')
        var sum = $(this).attr('data-sum')
        _this.prop('disabled',true)

        if (template != '') {
            $.ajax({
                url: `/installment-plan/send-sms`,
                type: 'GET',
                datatype: 'json',
                data: {
                    template: template,
                    client_id: client_id,
                    id: id,
                    deal_id: deal_id,
                    date: date,
                    sum: sum,
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('.template').removeClass('border-danger')                        
                        toastr.success(data.message);
                        $('#exampleModal2').modal('toggle')
                    }
                    else{
                        toastr.error(data.message);
                        $('#exampleModal2').modal('toggle')
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
        var deal_id = $(this).attr('data-deal_id')
        var date = $(this).attr('data-date')
        var sum = $(this).attr('data-sum')
        $('.send_sms').attr('data-deal-id',deal_id)
        $('.send_sms').attr('data-date',date)
        $('.send_sms').attr('data-sum',sum)

        $('.select2_sms').attr('data-contract',$(this).attr('data-contract'))
        $('.select2_sms').attr('data-date',date)
        $('.select2_sms').attr('data-deal-id',deal_id)
        $('.select2_sms').attr('data-sum',sum)

    })

    // 
</script>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/installment-plan/show.blade.php ENDPATH**/ ?>