<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>№</th>
            <th><?php echo e(translate('F.I.O. Clients')); ?></th>
            <th><?php echo e(translate('Deal object')); ?></th>
            <th><?php echo e(translate('Sum')); ?></th>
            <th><?php echo e(translate('Date deal')); ?></th>
            <th><?php echo e(translate('Contact number')); ?></th>
            <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                <th><?php echo e(translate('Archive')); ?></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php if(empty(!$models)): ?>
            <?php
                $n = 1;
            ?>
            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($value) && $value->deal_type == 3): ?>
                    <tr class="jkMiniData mb-1 hideData">
                        <td class="">
                            
                            <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivInput">
                                
                                <?php echo e($models->firstItem() + $key); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="checkboxDivTextInput">
                                <?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                <?php echo e($value->house_name ?? ''); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="ObjextSdelki">
                                <?php echo e($value->price_sell ?? ''); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.deal.contract-show', [$value->deal_id])); ?>" class="dataSdelkaJk">
                                
                                <?php echo e($value->updated_at ? date('d.m.Y H:i', strtotime($value->updated_at)) : ''); ?>

                            </a>
                        </td> 
                        <td>
                            <?php echo e($value->contract); ?>

                        </td>
                        <?php if(Auth::user()->role_id == Constants::SUPERADMIN || Auth::user()->role_id == Constants::ADMIN): ?>
                            <td>
                                <i class="fas fa-archive mdi-20 btn btn-xs text-danger cancel_deal" data-id="<?php echo e($value->deal_id); ?>"></i>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<div class="mt-4">
    <?php echo e($models->links()); ?>

</div><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/search.blade.php ENDPATH**/ ?>