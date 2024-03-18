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
                                <th class="text-center"><?php echo e(translate('actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-href="<?php echo e(route('forthebuilder.house.show-more', $model->id)); ?>" class="jkMiniData mt-1 hideData">
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
                                                <?php if(!empty($model->corpus)): ?>
                                                    <?php echo e($model->corpus); ?>

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
                                        <td class="text-center">
                                            <div class="checkboxDivTextInput4 deystvieJkHome">
                                                <a href="#" class="seaDiv deleteHouses text-danger btn" data-toggle="modal" data-target="#exampleModalLong" data-delete_url="<?php echo e(route('forthebuilder.house.destroy', $model->id ?? 0)); ?>">
                                                    <i class="fe-trash-2 mdi-20"></i>
                                                </a>
                                            </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h4>
                    <div class="d-flex justify-content-center mt-3">
                        <form style="display: inline-block;"
                            action="<?php echo e(route('forthebuilder.house.destroy', $model->id ?? 0)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="modalVideystvitelnoDa btn btn-outline-success me-2"><?php echo e(translate('Yes')); ?></button>
                        </form>
                        <button class="modalVideystvitelnoNet btn btn-outline-danger" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let page_name = 'house';
        $(document).on('click','tbody tr',function(){
            location.href = $(this).attr('data-href')
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/house/index.blade.php ENDPATH**/ ?>