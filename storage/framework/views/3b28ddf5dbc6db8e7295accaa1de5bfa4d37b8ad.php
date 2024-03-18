<?php if(isset($arr) && !empty($arr)): ?>
    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyv => $valuev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($valuev['client_id']) && !empty($valuev['client_id'])): ?>
                <li class="p-1 ui-sortable-handle" 
                    data-client-id="<?php echo e($valuev['client_id']); ?>"
                    data-personal-id="<?php echo e($valuev['personal_id']); ?>"
                    data-series-number="<?php echo e($valuev['series_number']); ?>"
                    data-inn="<?php echo e($valuev['inn']); ?>"
                    data-issued-by="<?php echo e($valuev['issued_by']); ?>"
                    data-house-id="<?php echo e($valuev['house_id']); ?>"
                    data-house-flat-id="<?php echo e($valuev['house_flat_id']); ?>"
                    data-house-name="<?php echo e($valuev['house_name']); ?>"
                    data-number-of-flat="<?php echo e($valuev['number_of_flat']); ?>"
                    data-url="<?php echo e(route('forthebuilder.clients.storeBudgetForDeals', $valuev['client_id'])); ?>"
                    data-type="<?php echo e($valuev['type']); ?>"
                    data-role="<?php echo e(Auth::user()->role_id); ?>"

                    data-id="item_<?php echo e($valuev['id']); ?>">
                    <div class="kanban-box">
                        <div class="">
                            <ul class="list-inline">
                                <li class="list-inline-item w-100">
                                    <a href="<?php echo e(route('forthebuilder.clients.show', [$valuev['client_id'], '0', '0'])); ?>" class="d-block w-100">
                                        
                                        <span class="badge bg-<?php echo e($color); ?> "><?php echo e(translate('Responsible')); ?>: 
                                            <small><?php echo e($valuev['responsible']); ?></small>
                                        </span> 
                                        
                                        <hr class="my-1">
                                        <div class="text-dark">
                                            <i class="far fa-user-circle"></i>
                                            <small><?php echo e($valuev['client']); ?></small>
                                        </div>
                                        <br>
                                        <div class="d-flex justify-content-between text-secondary">
                                            <div>
                                                <i class="mdi mdi-calendar-month-outline"></i>
                                                <small>
                                                    <?php echo e($valuev['day']); ?>

                                                </small>
                                            </div>
                                            <div>
                                                <i class="mdi mdi-clock-check-outline"></i>
                                                <small>
                                                    <?php echo e($valuev['time']); ?>

                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/load-more.blade.php ENDPATH**/ ?>