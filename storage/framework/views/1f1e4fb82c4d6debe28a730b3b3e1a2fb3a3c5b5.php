<?php $__env->startSection('title'); ?> <?php echo e(translate('update')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">
<style>
    .sdelkaData {
        width: 90% !important;
    }
    .bronyaFiofirst{
         overflow: hidden !important;
        white-space: nowrap !important;
        padding-left: 5px !important;
        justify-content:left !important;
    }
    .percent_value{
        background: transparent !important;
        border: 0 !important;
    }
    .accept_percent, .new_percent{
        display: none;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-10 d-flex align-items-center">                            
                            <h4 class="ms-3">
                                <?php echo e(translate('Installment periods')); ?>

                            </h4>
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <spqn class="btn btn-outline-primary ms-2 add_new_percent">
                                    <i class="fas fa-plus"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm">
                        <thead>
                            <th>№</th>
                            <th><?php echo e(translate('Period')); ?></th>
                            <th><?php echo e(translate('Add date')); ?></th>
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <th><?php echo e(translate('Actions')); ?></th>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <tr class="border border-success new_percent">
                                <td></td>
                                <td>
                                    <form id="new_percent_form">
                                        <input type="number" min="0" name="new_value" class="form-control new_value" style="width: 100px">    
                                    </form>
                                    
                                </td>
                                <td><?php echo e(date('d.m.Y H:i')); ?></td>
                                <td>
                                    <span class="btn btn-sm text-success save_percent">
                                        <i class=" far fa-check-circle mdi-20"></i>
                                    </span>
                                </td>
                            </tr>
                            <?php if(!empty($model)): ?> <?php $i = 1; ?> 
                                <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td>
                                            <input type="number" disabled class="form-control percent_value" value="<?php echo e($value->period); ?>" style="width: 100px">
                                            
                                        </td>
                                        <td><?php echo e(date('d.m.Y H:i', strtotime($value->created_at))); ?></td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td>
                                                <span class="btn btn-sm text-primary edit_percent">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </span>
                                                
                                                <span class="btn btn-sm text-success accept_percent" data-id="<?php echo e($value->id); ?>">
                                                    <i class=" far fa-check-circle mdi-20"></i>
                                                </span>
                                                
                                                <span class="btn btn-sm text-danger delete_percent" data-id="<?php echo e($value->id); ?>">
                                                    <i class="fe-trash-2 mdi-20"></i>
                                                </span>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                               <?php $i++; ?>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </tbody>
                    </table>   

                    <div class="aiz-pagination mt-2">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="confirm" data-confirm="<?php echo e(translate('Do you really want to delete ?')); ?>"></div>

<script>
    $(document).on('click','.edit_percent', function(){
        $(this).hide()
        $(this).siblings('.delete_percent').hide()
        $(this).siblings('.accept_percent').show()
        $(this).parent().siblings('td').find('.percent_value').removeClass('percent_value')
        $(this).parent().siblings('td').find('input').removeAttr('disabled')
    })
    
    $(document).on('click','.accept_percent', function(){
        $(this).parent().siblings('td').find('.form-control').addClass('percent_value')
        $(this).hide()
        $(this).siblings('.edit_percent').show()
        $(this).siblings('.delete_percent').show()
        
    })
    $(document).on('click','.add_new_percent',function(){
        $('.new_percent').show()
        $(this).removeClass().addClass('btn btn-outline-danger ms-2 cancel_percent')
        $(this).find('i').removeClass().addClass('mdi mdi-close-thick')
    })
    
    $(document).on('click','.cancel_percent',function(){
        $('.new_percent').hide()
        $(this).removeClass().addClass('btn btn-outline-primary ms-2 add_new_percent')
        $(this).find('i').removeClass().addClass('fas fa-plus')
    })
    
    $(document).on('click','.save_percent',function(){
        var id = $(this).parent().siblings('td').find('#new_percent_form .new_value').val()
        
        var _this = $(this)
        _this.prop('disabled',true)
        if(id != ''){
            $(_this).parent().siblings('td').find('#new_percent_form .new_value').removeClass('border-danger')
            $(_this).parent().siblings('td').find('#new_percent_form .new_value').addClass('border-success')
            $.ajax({
                  url: `/forthebuilder/installment-plan/save-period`,
                  type: 'post',
                  data: {id: id},
                  success: function (data) {
                      if(data.status == false){
                          showToast('danger',data.message)
                           _this.prop('disabled',false)
                      }
                      else{
                          showToast('success',data.message)
                          window.location.reload()
                      }
                  },
                  error: function (data) {
                      console.log(data);
                       _this.prop('disabled',false)
                  }
              });
        }
        else{
            $(_this).parent().siblings('td').find('#new_percent_form .new_value').removeClass('border-success')
            $(_this).parent().siblings('td').find('#new_percent_form .new_value').addClass('border-danger')
        }
    })
    
    $(document).on('click','.delete_percent',function(){
        var _this = $(this)
        var confirm_text = $('#confirm').attr('data-confirm')
        var id = _this.attr('data-id')
        _this.prop('disabled',true)
        if(confirm(confirm_text)){
            $.ajax({
                url: `/forthebuilder/installment-plan/delete-period`,
                type: 'post',
                data: {id: id},
                success: function (data) {
                    if(data.status == false){
                        showToast('danger',data.message)
                        _this.prop('disabled',false)
                        _this.prop('disabled',false)
                    }
                    else{
                        showToast('success',data.message)
                        window.location.reload()
                    }
              },
              
          });
        }
    })
    
    $(document).on('click','.accept_percent',function(){
        var _this = $(this)
        _this.prop('disabled',true)
        var id = _this.attr('data-id')
        var percent = _this.parent().siblings('td').find('.percent_value').val()
        
        
        $.ajax({
                url: `/forthebuilder/installment-plan/update-period`,
                type: 'post',
                data: {
                    id: id,
                    percent: percent
                },
                success: function (data) {
                    if(data.status == false){
                        showToast('danger',data.message)
                        _this.prop('disabled',false)
                        _this.prop('disabled',false)
                    }
                    else{
                        showToast('success',data.message)
                        window.location.reload()
                    }
              }
        })
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/installment-plan/periods.blade.php ENDPATH**/ ?>