<?php use Modules\ForTheBuilder\Entities\Constants; ?>

<?php $__env->startSection('content'); ?>
      
   
    <?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-sm-12 d-flex justify-content-start align-items-center">
                                <h4><?php echo e(translate('Магазины')); ?></h4>
                                <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                    <a href="<?php echo e(route('forthebuilder.shops.create')); ?>" class="btn btn-outline-info ms-2">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                <?php endif; ?>        
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="50">№</th>
                                    <th><?php echo e(translate('Арендаторы (орг)')); ?></th>
                                    <th><?php echo e(translate('Наименование брендов')); ?></th>
                                    <th><?php echo e(translate('Объект')); ?></th>
                                    <th><?php echo e(translate('Торговое помещение')); ?></th>
                                    <th width="100"><?php echo e(translate('Действия')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($model) && count($model) > 0): ?> <?php $i = 1; ?>
                                    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($value->name); ?></td>
                                            <td><?php echo e($value->brend); ?></td>
                                            <td><?php echo e((($value->objects) ? $value->objects->name : '')); ?></td>
                                            <td><?php echo e($value->torg); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.shops.update',$value->id)); ?>" class="btn">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(translate('Нет данных!')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="aiz-pagination mt-4">
                            <?php echo e($model->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/shops/index.blade.php ENDPATH**/ ?>