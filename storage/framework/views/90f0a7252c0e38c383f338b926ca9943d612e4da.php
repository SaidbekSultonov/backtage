<?php $__env->startSection('title'); ?>
    <?php echo e(translate('leads')); ?>

<?php $__env->stopSection(); ?>

<style>
    .bronyaData {
        width: 86% !important;
    }

    .jkMiniData2,
    .jkMiniData {
        width: 98% !important;
    }
    .nav-link3{
        height: 70px;
        display: flex !important;
        align-items: center !important;
    }
</style>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; $full_name = '';$phone = ''; ?>
    
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-9 d-flex align-items-center">
                            <h4>
                                <?php echo e(translate('booking')); ?>

                            </h4>
                        </div>
                        <div class="col-md-3 justify-content-end">
                            <div class="miniSearchDivaffloDour">
                                <input placeholder="<?php echo e(translate('Client search')); ?>" class="form-control miniInputSdelka searchTable" type="text" value="<?php echo e(((!empty($search_value)) ? $search_value : '')); ?>">
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="card">
                <div class="card-body" id="change">
                    <table id="tech-companies-1" class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                
                                <th>№</th>
                                <th><?php echo e(translate('Full Name')); ?></th>
                                <th><?php echo e(translate('Phone')); ?></th>
                                <th><?php echo e(translate('Palidity')); ?></th>
                                <th><?php echo e(translate('Prepayment')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($models)): ?>
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php 
                                if (isset($model->client)) {
                                    $full_name = '';
                                    $full_name .= ((!empty($model->client->first_name)) ? $model->client->first_name : '').' ';
                                    $full_name .= ((!empty($model->client->last_name)) ? $model->client->last_name : '').' ';
                                    $full_name .= ((!empty($model->client->middle_name)) ? $model->client->middle_name : '').' ';
                                    $phone = ((!empty($model->client->phone)) ? $model->client->phone : '');
                                }
                            ?>
                            <tr class="jkMiniData mt-1 hideData">
                                <td>
                                    <input type="hidden" class="hiddenData" value="<?php echo e($full_name.' ' . $phone); ?> <?php echo e($model->status == 1 ? translate('Active') : translate('No active')); ?> <?php echo e($model->prepayment); ?>">
                                
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="checkboxDivInput text-dark">
                                        <?php echo e($key + 1); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="bronyaFio text-dark">
                                        <?php echo e($full_name); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="bronyaTelefon text-dark">
                                        <?php echo e($phone); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if(!empty($model->expire_dates)): ?>
                                        <?php
                                            $arr = json_decode($model->expire_dates);
                                            $last_date = end($arr)->date;
                                        ?>
                                        <?php echo e(date('d.m.Y', strtotime($last_date))); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="checkboxDivTextInput text-dark">
                                        <?php if(!empty($model->prepayment) && $model->prepayment > 0): ?>
                                            <?php echo e(number_format($model->prepayment,0,'',' ')); ?>

                                        <?php else: ?>
                                            <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </td>
                                
                                <td>
                                    <?php if($model->status == 1): ?>
                                        <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="bronyaActivniy text-primary">
                                            <?php echo e(translate('Active')); ?>

                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('forthebuilder.booking.show', $model->id)); ?>" class="bronyaActivniy text-danger">
                                            <?php echo e(translate('Not active')); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="aiz-pagination mt-2">
                        <?php echo e($models->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




    
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body">
                    <h2 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h2>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="modalVideystvitelnoDa" data-dismiss="modal"><?php echo e(translate('Yes')); ?></button>
                        <button class="modalVideystvitelnoNet" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery.min.js')); ?>"></script>
<script>
    let page_name = 'booking';
    console.log(page_name)
    $(document).ready(function() {
        $('.modalVideystvitelnoDa').on('click', function() {
            // var model_id=document.getElementById("model_id").value;
            var model_id = $('.model_id').val();
            //    console.log(model_id);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "booking/destroy/" + model_id,
                type: 'DELETE',
                data: {
                    booking_id: model_id
                },
                success: function(response) {
                    console.log(response);
                    // location.reload();
                }
            });
        });
    });

    $(document).on('keyup', '.searchTable', function() {
        var text = $(this).val()

        $.ajax({
            url: `booking/search`,
            type: 'GET',
            datatype: 'json',
            data: {
                text: text
            },
            success: function(data) {
                $('#change').html(data)
                $('.pagination .page-link').each(function(i, obj) {
                    if ($(obj).attr('href')) {
                        var arr = $(obj).attr('href').split("/");
                        var firstEl = $(arr).first()[0];
                        var secondEl = arr[2];
                        var lastEl = $(arr).last()[0];
                        var search = lastEl.split("?")[0]
                        var page = lastEl.split("?")[1]
                        
                        var new_url = '/booking?text='+text+'&'+page;
                        $(obj).attr('href',new_url)
                    }
                });                        
            },
        }); 
    })
</script>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/booking/index.blade.php ENDPATH**/ ?>