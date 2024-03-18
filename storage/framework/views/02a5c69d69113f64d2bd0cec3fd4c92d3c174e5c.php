<form class="row w-100 m-auto" action="<?php echo e(route('forthebuilder.members.one-update')); ?>" method="POST" enctype="multipart/form-data">
    <input id="purchases" type="hidden" value="<?php echo e($purchases->id); ?>" name="id">
    <?php echo csrf_field(); ?>
    <div class="col">
        <label class="form-label"><?php echo e(translate('Дата')); ?></label>
        <input type="text" class="form-control dates" name="date" id="update_date" value="<?php echo e(((!empty($purchases->add_time)) ? date('d.m.Y',strtotime($purchases->add_time)) : '')); ?>">
    </div>
    <div class="col">
        <label class="form-label"><?php echo e(translate('Объект')); ?></label>
        <select name="object" class="form-control object object_update_modal">
            <?php if(!empty($objects)): ?> 
                <?php $__currentLoopData = $objects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e((($purchases->object_id == $value->id) ? 'selected' : '')); ?> value="<?php echo e($value->id); ?>">
                        <?php echo e($value->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?> 
        </select>
    </div>
    <div class="col col_shop <?php echo e((($purchases->objects->name == 'Chimgan Hills') ? 'd-none' : '')); ?>">
        <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
        <select name="shop" class="form-control shop shop_update_modal">
            <?php if(!empty($shops)): ?>
                <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php echo e((($purchases->shop_id == $value->id) ? 'selected' : '')); ?> value="<?php echo e($value->id); ?>">
                        <?php echo e($value->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col col_change">
        <label class="form-label col_sum <?php echo e((($purchases->objects->name == 'Chimgan Hills') ? 'd-none' : '')); ?>"><?php echo e(translate('Сумма')); ?></label>
        <label class="form-label col_kv <?php echo e((($purchases->objects->name == 'Chimgan Hills') ? '' : 'd-none')); ?>"><?php echo e(translate('Квадратура')); ?></label>
        <input type="number" class="form-control" name="sum" id="update_sum" value="<?php echo e($purchases->sum); ?>">
    </div>
    <div class="col-12 my-3">
        <button class="btn btn-success" type="submit"><?php echo e(translate('Сохранить')); ?></button>
    </div>
</form><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/members/update.blade.php ENDPATH**/ ?>