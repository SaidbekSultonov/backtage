<select name="deal_id" class="form-control select2_deal">
    <?php if(!empty($deals)): ?>
        <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option data-text="<?php echo e($value->id); ?>" value="<?php echo e($value->id); ?>">
                <?php echo e($value->contract); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</select><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/clients/find-deals.blade.php ENDPATH**/ ?>