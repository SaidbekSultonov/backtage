<?php $__env->startSection('title'); ?>
    <?php echo e(__('locale.apartment_sale')); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-9 d-flex align-items-center">                            
                            <h4 class="me-2">
                                <?php echo e(translate('Users')); ?>

                            </h4>
                            <a href="<?php echo e(route('forthebuilder.user.create')); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                       <div class="col-md-3">
                           <input placeholder="<?php echo e(translate('Search by users')); ?>" class="miniInputSdelka6 searchTable form-control" type="text">
                       </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table id="tech-companies-1" class="table table-sm table-striped mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Full name')); ?></th>
                                <th><?php echo e(translate('Email address')); ?></th>
                                <th> <?php echo e(translate('Photo')); ?></th>
                                <th><?php echo e(translate('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                    <td class="text-center">
                                        <a href="<?php echo e(route('forthebuilder.user.show', $model->id)); ?>" class="pozovatelFoto2">
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
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br>
                    <?php echo e($models->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/user/index.blade.php ENDPATH**/ ?>