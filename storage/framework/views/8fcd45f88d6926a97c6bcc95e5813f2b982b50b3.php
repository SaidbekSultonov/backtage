<?php use Modules\ForTheBuilder\Entities\Constants; ?>

<?php $__env->startSection('content'); ?>
      
   
    <?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-12 d-flex justify-content-start align-items-center">
                            <a href="<?php echo e(route('forthebuilder.shops.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3"><?php echo e(translate('Все продажи: ')); ?> <?php echo e($shop->name); ?></h4>   
                        </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="50">№</th>
                                    <th><?php echo e(translate('Дата')); ?></th>
                                    <th><?php echo e(translate('Сумма')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($model) && count($model) > 0): ?> <?php $i = 1; $totals = 0; ?>
                                    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $totals += $value->total; ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td>
                                                <?php echo e(date('d.m.Y', strtotime($value->add_time))); ?>

                                            </td>
                                            <td>
                                                <?php echo e(number_format($value->total,0,'',' ')); ?>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th colspan="2"><?php echo e(translate('Итого')); ?></th>
                                        <th><?php echo e(number_format($totals,0,'',' ')); ?></th>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(translate('Нет данных!')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/user/report-houses-index.blade.php ENDPATH**/ ?>