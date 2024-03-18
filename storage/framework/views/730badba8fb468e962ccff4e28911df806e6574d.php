<?php if(!empty($models)): ?>
    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="jkMiniData mt-1 hideData">
        <td>
            <input type="hidden" class="hiddenData"
                value="<?php echo e($model->first_name . ' '); ?> <?php echo e($model->last_name); ?> <?php echo e($model->middle_name); ?> <?php echo e($model->email); ?>">
            <a href="<?php echo e(route('forthebuilder.user.show', $model->id)); ?>" class="polzovatelNumber">
                <?php echo e($models->firstItem() + $key); ?>

            </a>
        </td>
        <td>
            <a href="<?php echo e(route('forthebuilder.user.show', $model->id)); ?>" class="polzovatelFioElectronieAddres2">
                <?php echo e($model->first_name . ' '); ?> <?php echo e($model->last_name); ?> <?php echo e($model->middle_name); ?>

            </a>
        </td>
        <td>
            <a href="<?php echo e(route('forthebuilder.user.show', $model->id)); ?>" class="polzovatelFioElectronieAddres2">
                <?php echo e($model->email); ?>

            </a>
        </td>
        <td>
            <a href="<?php echo e(route('forthebuilder.user.show', $model->id)); ?>" class="pozovatelFoto2 position-relative">
               <?php
                    if(!empty($model->avatar)){
                        $file_url = public_path('/uploads/user/' . $model->id . '/s_' . $model->avatar);
                    }else{
                        $file_url = "";
                    }
                ?>
                <?php if(file_exists($file_url)): ?>
                    <img class="rounded-circle img-thumbnail avatar-md" src="<?php echo e(asset('/uploads/user/' . $model->id . '/s_' . $model->avatar)); ?>" alt="HUman">
                <?php else: ?>
                 <?php
                    $gender_img = 'men.png';
                    if ($model->gender == 2) {
                        $gender_img = 'women.png';
                    }
                ?>
                    <img class="rounded-circle img-thumbnail avatar-md" src="<?php echo e(asset('/backend-assets/img/'.$gender_img)); ?>" alt="HUman">
                <?php endif; ?>

                <?php if($model->last_seen > time()): ?>
                    <span class="online_status">
                        <span class="in_online_status"></span>
                    </span>
                <?php else: ?>
                    <span class="offline_status">
                        <span class="in_offline_status"></span>
                    </span>
                <?php endif; ?>

                
            </a>
        </td>
        <td>
            <a href="<?php echo e(route('forthebuilder.user.edit', $model->id)); ?>" class="seaDiv btn btn-xs text-success" title="update">
                <i class="far fa-edit mdi-20"></i>
            </a>
            <form style="display: inline-block;" action="<?php echo e(route('forthebuilder.user.destroy', $model->id)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                <button type="submit" class="seaDiv btn btn-xs text-danger" title="delete">
                    <i class="fe-trash-2 mdi-20"></i>
                </button>
            </form>
        </td>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/get-status.blade.php ENDPATH**/ ?>