<?php $__env->startSection('title'); ?>
    <?php echo e(__('locale.apartment_sale')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .online_status{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 16px;
        height: 16px;
        border: 1px solid #0FC56A;
        border-radius: 100%;
        position: absolute;
        bottom: -18px;
        right: 2px;
        background: #FFF;
        padding: 1px;
    }
    .in_online_status{
        display: flex;
        width: 100%;
        height: 100%;
        background: #0FC56A;
        border-radius: 100%;
    }
    .offline_status{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 16px;
        height: 16px;
        border: 1px solid grey;
        border-radius: 100%;
        position: absolute;
        bottom: -18px;
        right: 2px;
        background: #FFF;
        padding: 1px;
    }
    .in_offline_status{
        display: flex;
        width: 100%;
        height: 100%;
        background: grey;
        border-radius: 100%;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-9 d-flex align-items-center">                            
                            <h4 class="me-2">
                                <?php echo e(translate('Пользователи')); ?>

                            </h4>
                            <a href="<?php echo e(route('forthebuilder.user.create')); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <table id="tech-companies-1" class="table table-sm table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('Полное имя')); ?></th>
                                <th><?php echo e(translate('Номер телефона')); ?></th>
                                <th><?php echo e(translate('Адрес электронной почты')); ?></th>
                                <th class="ps-3"><?php echo e(translate('Фото')); ?></th>
                                <?php if(Auth::user()->role_id == 1): ?>
                                    <th><?php echo e(translate('Действие')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody id="response_body">
                            <?php if(!empty($models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="jkMiniData mt-1 hideData">
                                    <td>
                                        <input type="hidden" class="hiddenData"
                                            value="<?php echo e($model->first_name . ' '); ?> <?php echo e($model->last_name); ?> <?php echo e($model->middle_name); ?> <?php echo e($model->email); ?>">
                                        
                                            <?php echo e($models->firstItem() + $key); ?>

                                    
                                    </td>
                                    <td>
                                        
                                            <?php echo e($model->first_name . ' '); ?> <?php echo e($model->last_name); ?> <?php echo e($model->middle_name); ?>

                                    
                                    </td>
                                    <td>
                                        
                                            <?php echo e($model->phone_number); ?>

                                    
                                    </td>
                                    <td>
                                        
                                            <?php echo e($model->email); ?>

                                    
                                    </td>
                                    <td>
                                        
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
                                    <?php if(Auth::user()->role_id == 1): ?>
                                        <td>
                                            
                                            <?php if(Auth::user()->id != $model->id): ?>
                                                <form style="display: inline-block;" action="<?php echo e(route('forthebuilder.user.destroy', $model->id)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="seaDiv btn btn-xs text-danger" title="delete">
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
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
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/user/index.blade.php ENDPATH**/ ?>