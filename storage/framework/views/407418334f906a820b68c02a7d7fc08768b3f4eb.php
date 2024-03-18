<table id="tech-companies-1" class="table table-sm table-hover">
    <thead>
        <tr>
            <th>№</th>
            <th><?php echo e(translate('house_name')); ?></th>
            <th><?php echo e(translate('corpas')); ?></th>
            <th><?php echo e(translate('info')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($models)): ?> <?php $i = 1; ?>
            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr data-id="<?php echo e($model->id); ?>" class="jkMiniData mt-1 hideData select_house">
                    <td>
                        <input type="hidden" class="hiddenData"
                        value="<?php echo e($model->name); ?> <?php echo e($model->corpus); ?> <?php echo e($model->description); ?>">
                        <?php echo e($i); ?>

                    </td>
                    <td>                         
                        <?php echo e($model->name); ?>

                    </td>
                    <td>
                        <?php if(!empty($model->corpus)): ?>
                            <?php echo e($model->corpus); ?>

                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($model->description); ?>

                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/clients/house-ajax.blade.php ENDPATH**/ ?>