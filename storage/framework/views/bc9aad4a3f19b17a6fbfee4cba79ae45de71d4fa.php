<?php
    use Modules\ForTheBuilder\Entities\Constants;
?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .select_house{
        cursor: pointer;
    }
    .plus2 {
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
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row w-100 align-items-center">
                        <div class="col-sm-3 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.deal.index')); ?>" class="plus2 me-2">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4><?php echo e(translate('Archive deals')); ?></h4>
                        </div>
                        <div class="col-sm-9 d-flex align-items-center justify-content-end">
                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.deal.index')); ?>">
                                <span><?php echo e(translate('Kanban board')); ?></span>
                            </a>
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="cdelki_c_klientami btn btn-outline-info ms-1">
                                <?php echo e(translate('List deals')); ?>

                            </a>
                            <a class="btn btn-outline-info ms-2" href="<?php echo e(route('forthebuilder.deal.contracts')); ?>">
                                <i class="mdi mdi-book-check-outline"></i>
                                <span><?php echo e(translate('Sales')); ?></span>
                            </a>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Responsible')); ?></th>
                                <th><?php echo e(translate('Deal object')); ?></th>
                                <th><?php echo e(translate('Reason')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($models)): ?> <?php $i = 1; ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>">
                                                <?php if(isset($value->client)): ?>
                                                    <?php echo e($value->client->last_name); ?> <?php echo e($value->client->first_name); ?> <?php echo e($value->client->middle_name); ?>

                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php if(isset($value->user)): ?>
                                                <?php echo e($value->user->last_name); ?> <?php echo e($value->user->first_name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(isset($value->house)): ?>
                                                <?php echo e($value->house->name); ?> <?php echo e($value->house->house_number); ?>

                                            <?php else: ?>
                                                <?php echo e(translate('Not specified')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($value->deleted_reason)): ?>
                                                <?php echo e($value->deleted_reason); ?>

                                            <?php else: ?>
                                                <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                            <?php endif; ?>                                            
                                        </td>
                                    </tr>
                                <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/archives.blade.php ENDPATH**/ ?>