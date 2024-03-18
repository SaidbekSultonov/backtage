<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<table class="table table-striped table-sm mb-0">
    <thead>
        <tr>
            <th>№</th>
            <th><?php echo e(translate('F.I.O. Clients')); ?></th>
            <th><?php echo e(translate('Source')); ?></th>
            <th><?php echo e(translate('Phone number')); ?></th>
            <th> <?php echo e(translate('Action')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(empty(!$models)): ?>
            <?php
                $n = 1;
            ?>
            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="jkMiniData mt-1 hideData">
                    <td>
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="checkboxDivInput spisokMarginRight7 text-dark">
                            <?php echo e($n++); ?>

                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="checkboxDivTextInput vseClientiVaqtinchaWith  spisokMarginRight7 text-dark">
                            <?php echo e($value->last_name . ' ' . $value->first_name . ' ' . $value->middle_name); ?>

                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>">
                            <?php if(!empty($value->source)): ?>
                                <?php echo e($value->source); ?>

                            <?php else: ?>
                                <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                            <?php endif; ?> 
                            
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="spisokCheckImia spisokMarginRight7 text-dark">
                            <?php if(!empty($value->phone)): ?>
                                <?php echo e($value->phone); ?>

                            <?php else: ?>
                                <span class="text-muted"><?php echo e(translate('Not specified')); ?></span>
                            <?php endif; ?>
                        </a>
                    </td>
                    <td>
                        <a href="tel: <?php echo e($value->phone); ?>" class="seaDiv btn text-success">
                            <i class="fas fa-phone-alt mdi-20"></i>
                        </a>
                        <span class="seaDiv btn text-warning open_modal_sms" data-bs-toggle="modal" data-bs-target="#exampleModal33" data-client-id="<?php echo e($value->id); ?>">
                            <i class="far fa-envelope mdi-20"></i>
                        </span>
                        <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                            <div class="seaDiv clientDelete btn text-danger"
                                data-url="<?php echo e(route('forthebuilder.clients.destroy', $value->id)); ?>">
                                <i class="fe-trash-2 mdi-20" data-bs-toggle="modal" data-bs-target="#exampleModalLong"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>
<br>
<?php echo e($models->links()); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/clients/search.blade.php ENDPATH**/ ?>