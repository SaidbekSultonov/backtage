<?php if(isset($model) && !empty($model)): ?>
    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li class="p-1 ui-sortable-handle" 
        data-client-id="<?php echo e($val['client_id']); ?>"
        data-personal-id="<?php echo e($val['personal_id']); ?>"
        data-series-number="<?php echo e($val['series_number']); ?>"
        data-inn="<?php echo e($val['inn']); ?>"
        data-issued-by="<?php echo e($val['issued_by']); ?>"
        data-house-id="<?php echo e($val['house_id']); ?>"
        data-house-flat-id="<?php echo e($val['house_flat_id']); ?>"
        data-house-name="<?php echo e($val['house_name']); ?>"
        data-number-of-flat="<?php echo e($val['number_of_flat']); ?>"
        data-url="<?php echo e(route('forthebuilder.clients.storeBudgetForDeals', $val['client_id'])); ?>"
        data-type="<?php echo e($val['type']); ?>"
        data-role="<?php echo e(Auth::user()->role_id); ?>"

        data-id="item_<?php echo e($val['id']); ?>">
        <div class="kanban-box">
            <div class="">
                <ul class="list-inline">
                    <li class="list-inline-item w-100">
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$val['client_id'], '0', '0'])); ?>" class="d-block w-100">
                            
                            <span class="badge bg-<?php echo e($color); ?> "><?php echo e(translate('Responsible')); ?>: 
                                <small><?php echo e($val['responsible']); ?></small>
                            </span> 
                            
                            <hr class="my-1">
                            <div class="text-dark">
                                <i class="far fa-user-circle"></i>
                                <small><?php echo e($val['client']); ?></small>
                            </div>
                            <br>
                            <div class="d-flex justify-content-between text-secondary">
                                <div>
                                    <i class="mdi mdi-calendar-month-outline"></i>
                                    <small>
                                        <?php echo e($val['day']); ?>

                                    </small>
                                </div>
                                <div>
                                    <i class="mdi mdi-clock-check-outline"></i>
                                    <small>
                                        <?php echo e($val['time']); ?>

                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/next-page.blade.php ENDPATH**/ ?>