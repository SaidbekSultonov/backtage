<div class="row mt-2">
    <div class="col">
        <label class="form-label"><?php echo e(translate('Дата')); ?></label>
        <input type="text" class="form-control dates" name="Purchase[<?php echo e($count); ?>][date]">
    </div>
    <div class="col">
        <label class="form-label"><?php echo e(translate('Объект')); ?></label>
        <select name="Purchase[<?php echo e($count); ?>][object]" class="form-control object">
            <option value="1">Ecobozor</option>
            <option value="2">Chimgan</option>
            <option value="3">Chimgan Hills</option>
        </select>
    </div>
    <div class="col col_shop">
        <label class="form-label"><?php echo e(translate('Бренд/Фирма')); ?></label>
        <select name="Purchase[<?php echo e($count); ?>][shop]" class="form-control shop">
            <?php if(!empty($shops)): ?>
                <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>">
                        <?php echo e($value->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="col col_change">
        <label class="form-label col_sum"><?php echo e(translate('Сумма')); ?></label>
        <label class="form-label col_kv d-none"><?php echo e(translate('Квадратура')); ?></label>
        <input type="number" class="form-control" name="Purchase[<?php echo e($count); ?>][sum]">
    </div>
</div><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/members/new-rows.blade.php ENDPATH**/ ?>