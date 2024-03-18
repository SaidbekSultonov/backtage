<?php $__env->startSection('title'); ?> <?php echo e(translate('Price types')); ?><?php $__env->stopSection(); ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
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
                        <div class="col-md-9 d-flex align-items-center">                            
                            <a href="javascript:history.go(-1)" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="mx-3">
                                <?php echo e(translate('Sms templates')); ?>

                            </h4>
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <a href="#" class="btn btn-outline-primary addNewCoupon_">
                                    <i class="fas fa-plus"></i>
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
                            <tr class="sozdatKupon">
                                <th>
                                    №
                                </th>
                                <th>
                                    <?php echo e(translate('Title')); ?>

                                </th>
                                <th>
                                    <?php echo e(translate('Template')); ?>

                                </th>
                                <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                                    <th width="20%" class="text-center">
                                        <?php echo e(translate('Action')); ?>

                                    </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($model)): ?>
                                <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="checkboxDivInput">
                                            <?php echo e($model->firstItem() + $key); ?>

                                            <input type="hidden" class="checkboxDivTextInput3565 form-control couponId"
                                                value="<?php echo e($value->id); ?>">
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <span><?php echo e($value->name); ?></span>
                                            <input type="hidden" class="checkboxDivTextInput3565 form-control couponName" 
                                                value="<?php echo e($value->name); ?>">
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <?php echo e($value->template); ?>

                                        </td>
                                        <?php if(false): ?>
                                            <td class="checkboxDivTextInput3565">
                                                <div class="seaDiv typeUpdate d-none btn" data-id="<?php echo e($value->id); ?>">
                                                    <i class="mdi mdi-20 text-success mdi-check-circle-outline"></i>
                                                </div>
                                                <div class="seaDiv typeEdit_ btn">
                                                    <i class="mdi mdi-20 text-primary mdi-pencil-box-outline"></i>
                                                </div>
                                                
                                                <button type="button" class="btn p-0 seaDiv typeDelete_" data-id="<?php echo e($value->id); ?>">
                                                    <i class="mdi mdi-20 text-danger mdi-trash-can-outline"></i>
                                                </button>
                                            </td>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                                            <td class="text-end">
                                                <label for="automatic" class="form-check btn form-switch text-start m-0 rounded border border-info p-2">
                                                    <input type="checkbox" class="form-check-input automatic_status ms-0 me-2" id="automatic<?php echo e($value->id); ?>" <?php echo e((($value->automatic_send == 1) ? 'checked' : '')); ?> data-id="<?php echo e($value->id); ?>" />
                                                    <label class="form-check-label" for="automatic<?php echo e($value->id); ?>"><?php echo e(translate('Automatic send')); ?></label>
                                                </label>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <?php if(false): ?>
                                <tr class="sozdatKupon2 formNewCoupon d-none" style="width: 100%;">
                                    <td class="checkboxDivInput">
                                        <?php echo e($model->firstItem() + ($key ?? 0) + 1); ?>

                                    </td>
                                    <td>
                                        <input type="text" class="checkboxDivTextInput3565 form-control couponCreateName" placeholder="<?php echo e(translate('New price type name')); ?>">
                                    </td>
                                    <td colspan="2" class="checkboxDivTextInput35652">
                                        <div class="seaDiv typeSave btn">
                                            <i class="mdi mdi-20 text-success mdi-check-circle-outline"></i>
                                        </div>
                                        <div class="seaDiv removeFormType btn">
                                            <i class="mdi mdi-20 text-danger mdi-trash-can-outline"></i>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>    
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>




<div id="confirm" data-text="<?php echo e(translate('Are you sure ?')); ?>"></div>
<script>
    let page_name = 'settings';

    $(document).on('click', '.typeSave', function(e) {
        var name = $('.couponCreateName').val()
        var name_ru = ''
        var name_en = ''

        if (name != '') {
            $.ajax({
                url: `/house/store-type`,
                data: {
                    name: name,
                    name_ru: name_ru,
                    name_en: name_en,
                },
                type: 'POST',
                success: function(data) {
                    if (data == true) {
                        location.reload()
                    }
                },
            });
        }
    })

    $(document).on('click', '.removeFormType', function(e) {
        $('.formNewCoupon').addClass('d-none')
    })

    $(document).on('click', '.typeDelete', function(e) {
        if(confirm($('#confirm').attr('data-text'))){
            var id = $(this).attr('data-id')
            $.ajax({
                url: `/house/destroy-type`,
                data: {
                    id: id
                },
                type: 'POST',
                success: function(data) {
                    if (data == true) {
                        location.reload()
                    }
                },
            });
        }
    })

    $(document).on('click', '.typeUpdate', function(e) {
        var id = $(this).attr('data-id');
        var name = $(this).parent().parent().find('.couponName').val();
        var name_ru = ''
        var name_en = ''

        if (name != '') {
            $.ajax({
                url: `/house/update-type`,
                data: {
                    name: name,
                    name_ru: name_ru,
                    name_en: name_en,
                    id: id,
                },
                type: 'POST',
                success: function(data) {
                    if (data == true) {
                        location.reload()
                    }
                },
            });
        }
    })

    $(document).on('click', '.typeEdit', function(e) {
            var typeName = $(this).parent().parent().find('.couponName').attr('type')
            $(this).siblings('.typeUpdate').toggleClass('d-none');
            // $(this).addClass('d-none');
            $(this).parent().parent().find('.couponName').siblings('span').toggle();

            $(this).parent().parent().find('.couponName').attr('type', 'hidden');
            if (typeName == 'hidden')
                $(this).parent().parent().find('.couponName').attr('type', 'text');
            
            

        })

    $(document).on('change','.automatic_status',function(){
        var id = $(this).attr('data-id')

        $.ajax({
            url: `/house/change-sms-status`,
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status == 'success') {
                    showToast('success',data.message)
                }
                else{
                    showToast('error',data.message)   
                }
            },
        });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/sms-templates.blade.php ENDPATH**/ ?>