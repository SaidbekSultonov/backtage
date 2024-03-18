<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-9 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Sales')); ?>

                            </h4>
                            
                        </div>
                        
                        <div class="col-md-3 text-end">
                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.deal.printContract', $models->deal_id)); ?>">
                                <i class="mdi mdi-printer"></i>
                                <span><?php echo e(translate('Print')); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <tr>
                            <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                            <td><?php echo e($models->client_id ? $models->client_first_name . ' ' . $models->client_last_name . ' ' . $models->client_middle_name : ''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(translate('Deal object')); ?></th>
                            <td> <?php echo e($models->house_name ?? ''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(translate('Sum')); ?></th>
                            <td><?php echo e($models->price_sell ? number_format($models->price_sell,0,'',' ') : ''); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(translate('Number of flat')); ?></th>
                            <td><?php echo e($models->number_of_flat); ?></td>
                        </tr>

                        <tr>
                            <th><?php echo e(translate('Floor')); ?></th>
                            <td><?php echo e($models->floor); ?></td>
                        </tr>
                        <tr>
                            <th><?php echo e(translate('Room count')); ?></th>
                            <td><?php echo e($models->room_count); ?></td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="col-12">
                            <h4><?php echo e(translate('Areas flat')); ?></h4>        
                        </div>
                    </div>
                    <table class="table table-sm table-striped">
                        <?php if(!empty($models->areas)): ?> 
                            <?php $__currentLoopData = json_decode($models->areas); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($value)): ?>
                                <tr>
                                    <th class="text-uppercase"><?php echo e(translate($key)); ?></th>
                                    <td><?php echo e($value); ?> <?php echo e(translate('m2')); ?> </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






                
                
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/deal/contract-show.blade.php ENDPATH**/ ?>