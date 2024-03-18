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
                                <input placeholder="<?php echo e(translate('Search by booking')); ?>" class="form-control miniInputSdelka5 searchTable" type="text">
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table id="tech-companies-1" class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <div class="checkboxDivInput">
                                        <input class="checkBoxInput" type="checkbox">
                                    </div>
                                </th>   
                                <th>№</th>
                                <th><?php echo e(translate('Full Name')); ?></th>
                                <th><?php echo e(translate('Phone')); ?></th>
                                <th><?php echo e(translate('Palidity')); ?></th>
                                <th><?php echo e(translate('Prepayment')); ?></th>
                                <th class="text-center"><?php echo e(translate('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($models)): ?>
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="jkMiniData mt-1 hideData">
                                <td>
                                    <input type="hidden" class="hiddenData" value="<?php echo e($model['full_name'] . ' ' . $model['phone']); ?> <?php echo e($model['status'] == 1 ? translate('Active') : translate('No active')); ?> <?php echo e($model['prepayment']); ?>">
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="checkboxDivInput">
                                        <input class="checkBoxInput sub_chk" data-id="<?php echo e($model['id']); ?>" type="checkbox">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="checkboxDivInput text-dark">
                                        <?php echo e($key + 1); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="bronyaFio text-dark">
                                        <?php echo e($model['full_name']); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="bronyaTelefon text-dark">
                                        <?php echo e($model['phone']); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php if($model['status'] == 1): ?>
                                        <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="bronyaActivniy text-info">
                                            <?php echo e(translate('Active')); ?>

                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="bronyaActivniy text-danger">
                                            <?php echo e(translate('No active')); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="checkboxDivTextInput text-dark">
                                        <?php echo e($model['prepayment']); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $model['id'])); ?>" class="seaDiv text-warning">
                                        <i class="far fa-edit mdi-20"></i>
                                    </a>
                                    <a class="button seaDiv text-danger">
                                        <input type="hidden" class="model_id" value="<?php echo e($model['id']); ?>">
                                        <i class="fe-trash-2 mdi-20 mdi-20"></i>
                                    </a>
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
</script>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/booking/index.blade.php ENDPATH**/ ?>