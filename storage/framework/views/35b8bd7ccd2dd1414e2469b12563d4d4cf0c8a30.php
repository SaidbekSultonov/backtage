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
                        <div class="col-md-4 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Deals with clients')); ?>

                            </h4>
                        </div>
                        <div class="col-md-5 text-end">
                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.deal.index')); ?>">
                                <span><?php echo e(translate('Kanban board')); ?></span>
                            </a>
                            <a class="btn btn-outline-info ms-2" href="<?php echo e(route('forthebuilder.deal.contracts')); ?>">
                                <i class="mdi mdi-book-check-outline"></i>
                                <span><?php echo e(translate('Sales')); ?></span>
                            </a>
                            <a href="<?php echo e(route('forthebuilder.deal.archives')); ?>" class="btn btn-outline-secondary ms-1">
                                <?php echo e(translate('Archive deals')); ?>

                            </a>
                        </div>
                        <div class="col-md-3">
                            <input placeholder="<?php echo e(translate('Deal search')); ?>" class="form-control miniInputSdelka searchTable"
                                type="text">  
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <table id="tech-companies-1" class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Deal object')); ?></th>
                                <th><?php echo e(translate('Sum')); ?></th>
                                <th><?php echo e(translate('Last action')); ?></th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th><?php echo e(translate('Action')); ?></th>
                                <?php endif; ?>  
                            </tr>
                        </thead>
                            <tbody>
                                <?php if(empty(!$models)): ?> <?php $n = 1; ?>
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($value)): ?>
                                        <tr class="jkMiniData mt-1 hideData">
                                            <td>
                                                <input type="hidden" class="hiddenData"
                                                    value="<?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?> <?php echo e($value->house_name ?? ''); ?> <?php echo e($value->price_sell ?? ''); ?> <?php echo e($value->task_id ? $value->task_title : $defaultAction[$value->deal_type]); ?>">
                                                
                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>" class="checkboxDivInput text-dark">
                                                        <?php echo e($n++); ?>

                                                        
                                                    </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>" class="checkboxDivTextInput text-dark">
                                                        <?php echo e($value->client_id ? $value->client_first_name . ' ' . $value->client_last_name . ' ' . $value->client_middle_name : ''); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>" class="ObjextSdelki text-dark">
                                                    <?php if(!empty($value->house_name)): ?>
                                                        <?php echo e($value->house_name); ?>

                                                    <?php else: ?>
                                                        <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>" class="ObjextSdelki text-dark"> 
                                                    <?php if(!empty($value->price_sell)): ?>
                                                        <?php echo e($value->price_sell); ?>

                                                    <?php else: ?>
                                                        <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                                                    <?php endif; ?>
                                                </a>
                                            </td>        
                                            <td>
                                                <?php
                                                    $sdelkaClass = '';
                                                    if ($value->deal_type == Constants::FIRST_CONTACT) {
                                                        $sdelkaClass = 'badge bg-danger dataSdelkaJkPinkNthChild';
                                                    } elseif ($value->deal_type == Constants::NEGOTIATION) {
                                                        $sdelkaClass = 'badge bg-warning dataSdelkaJkYellowNthChild';
                                                    } elseif ($value->deal_type == Constants::MAKE_DEAL) {
                                                        $sdelkaClass = 'badge bg-success dataSdelkaJkGreenNthChild';
                                                    }
                                                    else{
                                                        $sdelkaClass = 'badge bg-secondary dataSdelkaJkGreenNthChild';   
                                                    }
                                                ?>
                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$value->client_id, '0', '0'])); ?>" class="dataSdelkaJk <?php echo e($sdelkaClass); ?>">
                                                    
                                                    <?php echo e($value->task_id ? $value->task_title : $defaultAction[$value->deal_type]); ?>

                                                </a>
                                            </td>
                                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                                <td>
                                                    <a href="<?php echo e(route('forthebuilder.clients.edit', $value->client_id)); ?>" class="btn seaDiv text-primary">
                                                        <i class="far fa-edit mdi-20"></i>
                                                    </a>
                                                    <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                                                        <span class="seaDiv clientDelete model_delete text-danger btn"
                                                            data-url="<?php echo e(route('forthebuilder.clients.destroy', $value->client_id)); ?>">
                                                            <i class="fe-trash-2 mdi-20" data-bs-toggle="modal" data-bs-target="#exampleModalLong"></i>
                                                        </span>
                                                    <?php endif; ?>   
                                                </td>  
                                            <?php endif; ?>    
                                        </tr>            
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="aiz-pagination mt-4">
                            <?php echo e($models->links()); ?>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno">Вы действительно хотите удалить</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <form style="display: inline-block;" action="" method="POST" id="form_delete">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-outline-success modalVideystvitelnoDa me-2">Да</button>
                        </form>
                        <button class="btn btn-outline-danger modalVideystvitelnoNet" data-bs-dismiss="modal">Нет</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery.min.js')); ?>"></script>
    <script>
        let page_name = 'clients';
        $(document).ready(function() {
            $('.model_delete').on('click', function() {
                
                $('#form_delete').attr('action', $(this).attr('data-url'))
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/clients/index.blade.php ENDPATH**/ ?>