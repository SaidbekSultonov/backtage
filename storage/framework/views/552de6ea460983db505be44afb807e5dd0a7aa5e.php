<?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="p-1" data-id="item_<?php echo e($val['id']); ?>" data-role="<?php echo e($user->role_id); ?>">
        <div class="kanban-box">
            <div class="">
                <ul class="list-inline">
                    <li class="list-inline-item w-100">
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$val['client_id'], '0', '0'])); ?>"
                            class="d-block w-100">
                            
                            <span class="<?php echo (($column == 1) ? 'badge bg-danger' : 'badge bg-primary') ?>"><?php echo e(translate('Responsible')); ?>: <small><?php echo e($val['responsible']); ?></small></span> 
                            
                            <hr class="my-1">
                            <div class="text-dark">
                                <i class="far fa-user-circle"></i>
                                <small><?php echo e($val['client']); ?> <?php echo e($val['client_middle_name']); ?></small>
                            </div>
                            <br>
                            <div class="d-flex justify-content-between text-secondary">
                                <div>
                                    <i class="mdi mdi-calendar-month-outline"></i>
                                    <small>
                                        <?php echo e(date('d.m.Y', strtotime($val['day']))); ?>

                                    </small>
                                </div>
                                <div>
                                    <i class="mdi mdi-clock-check-outline"></i>
                                    <small>
                                        <?php echo e(date('H:i', strtotime($val['time']))); ?>

                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/task/load-more.blade.php ENDPATH**/ ?>