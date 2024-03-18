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
                        <?php echo e(number_format($model->prepayment,2,'',' ')); ?>

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

</div><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/booking/search.blade.php ENDPATH**/ ?>