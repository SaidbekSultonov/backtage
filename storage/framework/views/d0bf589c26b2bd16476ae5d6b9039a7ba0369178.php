<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\Constants; 

?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row w-100 m-0">
                        <div class="col-md-6 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('JK')); ?>

                            </h4>
                            <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                                <a href="<?php echo e(route('forthebuilder.house.create')); ?>" class="btn btn-outline-info">
                                    <i class="fas fa-plus"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <div class="miniSearchDiv5 ms-2">
                                <ion-icon class="miniSearchIconInput md hydrated" name="search-outline" role="img"
                                    aria-label="search outline"></ion-icon>
                                <input placeholder="<?php echo e(translate('Search by objects')); ?>" class="miniInputSdelka5 searchTable form-control"
                                    type="text">
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
                                <th>№</th>
                                <th><?php echo e(translate('house_name')); ?></th>
                                <th><?php echo e(translate('corpas')); ?></th>
                                <th><?php echo e(translate('info')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST && Auth::user()->role_id != Constants::MANAGER): ?>
                                    <th class="text-center"><?php echo e(translate('actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="jkMiniData mt-1 hideData">
                                        <td>
                                            <input type="hidden" class="hiddenData"
                                            value="<?php echo e($model->name); ?> <?php echo e($model->corpus); ?> <?php echo e($model->description); ?>">
                                            <?php
                                                if ($status == 'client') {
                                                    $house_url = route('forthebuilder.client.houseFlat', [$model->id, $client_id]);
                                                } else {
                                                    $house_url = route('forthebuilder.house.show-more', $model->id);
                                                }
                                            ?>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivInput jkNumberInputChick text-dark">
                                                <?php echo e($models->firstItem() + $key); ?>

                                            </a>
                                        </td>
                                        <td>
                                             <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput text-dark">
                                                <?php echo e($model->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput2 text-dark">
                                                <?php if(!empty($model->house_number)): ?>
                                                    <?php echo e($model->house_number); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput48 text-dark">
                                                <?php echo e($model->description); ?>

                                            </a>
                                        </td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST && Auth::user()->role_id != Constants::MANAGER): ?>
                                            <td class="text-center">
                                                <a href="<?php echo e(route('forthebuilder.house.edit', $model->id)); ?>" class="seaDiv text-primary btn">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                <span class="seaDiv deleteHouses text-danger btn" data-toggle="modal" data-target="#exampleModalLong" data-id="<?php echo e($model->id); ?>">
                                                    <i class="fe-trash-2 mdi-20"></i>
                                                </span>
                                                
                                            </td>
                                        <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content content d-none">
            <div class="modal-body text-center py-3">
                <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h4>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <button class="btn btn-outline-danger" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                <button class="btn btn-outline-success me-2 delete-house"><?php echo e(translate('Yes')); ?></button>
            </div>      
        </div>
        <div class="modal-content content2 d-none">
            <div class="modal-body text-center py-3">
                <h4 class="modalVideystvitelno"><?php echo e(translate('There are sold or reserved flats in this house!')); ?></h4>
            </div>
            <div class="modal-footer d-flex align-items-center justify-content-end">
                <button class="btn btn-outline-secondary" data-dismiss="modal"><?php echo e(translate('Close')); ?></button>
            </div>      
        </div>
    </div>
</div>
    <script>
        let page_name = 'house';

        $('#exampleModalLong').on('hidden.bs.modal', function () {
            $('#exampleModalLong .content2').addClass('d-none')
            $('#exampleModalLong .content').addClass('d-none')
        })

        $(document).on('click', '.deleteHouses', function() {
            var id = $(this).attr('data-id')

            $.ajax({
                url: `house/destroy`,
                type: 'GET',
                data: {
                    id: id,
                    type: 'status'
                },
                success: function(data) {
                    if (data.status == 'success') {
                        $('#exampleModalLong .content2').addClass('d-none')
                        $('#exampleModalLong .content').removeClass('d-none')
                        $('#exampleModalLong .delete-house').attr('data-id',id)
                        
                    }
                    else{
                        $('#exampleModalLong .content').addClass('d-none')
                        $('#exampleModalLong .content2').removeClass('d-none')
                    }
                },
            });
        })

        $(document).on('click', '.delete-house', function() {
            var id = $(this).attr('data-id')
            var _this = $(this)
            _this.prop('disabled',true)
            $.ajax({
                url: `house/destroy`,
                type: 'GET',
                data: {
                    id: id,
                    type: 'delete'
                },
                success: function(data) {
                    if (data.status == 'success') {
                        window.location.reload()
                    }
                    else{
                        alert('Error!');
                        _this.prop('disabled',false)
                    }
                },
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/index.blade.php ENDPATH**/ ?>