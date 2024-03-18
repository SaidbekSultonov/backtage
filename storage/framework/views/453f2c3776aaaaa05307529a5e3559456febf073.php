<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<table class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>№</th>
                <th><?php echo e(translate('Дата')); ?></th>
                <th><?php echo e(translate('Ф.И.О')); ?></th>
                <th><?php echo e(translate('Номер телефона')); ?></th>
                <th><?php echo e(translate('Объект')); ?></th>
                <th><?php echo e(translate('Общая сумма')); ?></th>
                <th><?php echo e(translate('Купоны')); ?></th>
                <th width="200px"><?php echo e(translate('Действия')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($model) && count($model) > 0): ?>
                <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($model->firstItem() + $key); ?></td>
                        <td><?php echo e(date('d.m.Y', strtotime($value->created_at))); ?></td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                <?php echo e($value->full_name); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                <?php echo e($value->phone); ?>

                            </a>
                        </td>
                        <td>
                            <?php
                                if (!empty($value->total)) {
                                    foreach ($value->total as $keyt => $valuet) {
                                        echo "<span class='badge bg-info me-1'>".$valuet->objects->name."</span>";
                                    }
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $total_sum = 0;
                                $total_coupon = 0;
                                if (isset($value->total) && !empty($value->total)) {
                                    foreach ($value->total as $keys => $values) {
                                        $total_sum += $values->sum;
                                        $total_coupon++;
                                    }        
                                }
                                echo $total_sum;
                            ?>
                            
                        </td>
                        <td><?php echo e($total_coupon); ?></td>
                        <td>
                            <button data-id="<?php echo e($value->id); ?>" data-bs-toggle="modal" data-bs-target="#update" class="btn btn-sm btn-success add">
                                <i class="fas fa-plus"></i>
                            </button>
                            <?php if(Auth::user()->role_id == Constants::ADMIN): ?>
                                <a class="btn btn-sm btn-primary" href="<?php echo e(route('forthebuilder.members.show',$value->id)); ?>">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger delete" data-id="<?php echo e($value->id); ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="8"><?php echo e(translate('Нет данных!')); ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<br>
<?php echo e($model->links()); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/members/search.blade.php ENDPATH**/ ?>