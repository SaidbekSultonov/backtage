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
                                <?php echo e(translate('Clients')); ?>

                            </h4>
                            <a href="<?php echo e(route('forthebuilder.clients.create')); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                        <div class="col-md-5 text-end">
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="cdelki_c_klientami btn btn-outline-primary ms-2">
                                <?php echo e(translate('Deals with clients')); ?>

                            </a>
                        </div>
                        <div class="col-md-3">
                            <input placeholder="<?php echo e(translate('Client search')); ?>" class="form-control miniInputSdelka searchTable" type="text">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox">
                                </th>
                                <th>№</th>
                                <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                <th><?php echo e(translate('Status')); ?></th>
                                <th><?php echo e(translate('Last Activity')); ?></th>
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
                                            <input type="hidden" class="hiddenData"
                                            value="<?php echo e($value->last_name . ' ' . $value->first_name . ' ' . $value->middle_name); ?> <?php echo e($value->status == $active ? translate('Active') : translate('Not active')); ?> <?php echo e(date('d.m.Y', strtotime($value->created_at))); ?>">
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="checkboxDivInput text-dark">
                                                <input class="checkBoxInput" type="checkbox">
                                            </a>
                                        </td>
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
                                            
                                            <?php
                                                $class = 'vseClientiStatus dataSdelkaJkPinkNthChild dataSdelkaJkPinkNthChild spisokMarginRight7';
                                                if ($value->status == $active) {
                                                    $class = 'vseClientiStatus dataSdelkaJkGreenNthChild dataSdelkaJkPinkNthChild spisokMarginRight7';
                                                }
                                            ?>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="<?php echo e($class); ?> text-dark">
                                                <?php
                                                    if($value->status == $active)
                                                        echo "<span class='badge bg-success'>". translate('Active')."</span>";
                                                     else 
                                                     echo "<span class='badge bg-danger'>". translate('No active')."</span>";
                                                ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$value->id, '0', '0'])); ?>" class="spisokCheckImia spisokMarginRight7 text-dark">
                                                <?php echo e(date('d.m.Y', strtotime($value->created_at))); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="tel: <?php echo e($value->phone); ?>" class="seaDiv btn text-success">
                                                <i class="fas fa-phone-alt mdi-20"></i>
                                            </a>
                                            <a href="<?php echo e($value->email); ?>" class="seaDiv btn text-warning">
                                                <i class="far fa-envelope mdi-20"></i>
                                            </a>
                                            <div class="seaDiv clientDelete btn text-danger"
                                                data-url="<?php echo e(route('forthebuilder.clients.destroy', $value->id)); ?>">
                                                <i class="fe-trash-2 mdi-20" data-bs-toggle="modal" data-bs-target="#exampleModalLong"></i>
                                            </div>
                                        </td>
                                    </tr>
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

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno">Вы действительно хотите удалить</h4>
                    <div class="d-flex justify-content-center mt-3">
                        <form style="display: inline-block;" action="" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="modalVideystvitelnoDa btn btn-outline-success me-2">Да</button>
                        </form>
                        <button class="modalVideystvitelnoNet btn btn-outline-danger" data-dismiss="modal">Нет</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/clients/all-clients.blade.php ENDPATH**/ ?>