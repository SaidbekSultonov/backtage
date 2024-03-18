<?php use Modules\ForTheBuilder\Entities\Constants; ?>
 <table id="tech-companies-1" class="table table-sm table-striped mb-0">
    <thead>
        <tr>
            <th>№</th>
            <th><?php echo e(translate('Full name of the Customer')); ?></th>
            <th><?php echo e(translate('Apartment number')); ?></th>
            <th><?php echo e(translate('Sum')); ?></th>
            <th><?php echo e(translate('Period')); ?></th>
            <th><?php echo e(translate('Status')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(empty(!$models)): ?>
            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($model->client): ?>
                    <tr class="jkMiniData mt-1 hideData">
                        <td>
                            <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="checkboxDivInput checkingInputRassrochkaChecked">
                                <?php echo e($models->firstItem() + $key); ?>

                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="bronyaFio">
                                <?php if(!empty($model->client)): ?>
                                    <?php echo e($model->client->last_name . ' ' . $model->client->first_name . ' ' . $model->client->middle_name); ?>

                                <?php endif; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="checkboxDivTextInput2">
                                <?php echo e($model->agreement_number ?? ''); ?>

                            </a>
                        </td>
                        <td>
                            <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="sdlekaPriceJk">
                                <?php echo e(number_format($model->price_sell, 2)); ?>

                            </a>
                        </td>
                        <td>
                            <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="rassrochkaPokazatStatus">
                                 
                                <?php
                                    if(isset($model->period) && $model->period->period != 0){
                                        echo $model->period->period;
                                    }
                                    elseif(isset($model->installmentPlan)){
                                        echo $model->installmentPlan->period;
                                    }

                                ?>
                                 

                                 
                            </a>
                        </td>
                        <td>
                            <a style="width: 9.3vw;" href="<?php echo e(route('forthebuilder.installment-plan.show', $model->id)); ?>" class="rassrochkaPokazatStatusGreen show-status" data-id="<?php echo e($model->id); ?>"
                                data-period="<?php echo e((($model->installmentPlan) ? $model->installmentPlan->period : 0)); ?>"
                                data-price="<?php echo e($model->price_sell); ?>">
                                

                                <?php
                                $back_color = '';
                                $text = '';
                                if ($model->payStatus) {
                                    if ($model->payStatus->status == Constants::NOT_PAID) {
                                        $back_color = 'bg-danger';
                                        $text = translate('Not paid');
                                    } elseif ($model->payStatus->status == Constants::PAID) {
                                        $back_color = 'bg-success';
                                        $text = translate('Paid');
                                    } else {
                                        $text_color = 'text-dark';
                                        $back_color = 'bg-warning';
                                        $text = translate('Partial payment');
                                    }
                                     
                                 } 

                                echo "<span class='badge text-white ".$back_color."'>".$text."</span>";
                                ?>
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </tbody>
</table>

<div class="aiz-pagination mt-2">
    <?php echo e($models->appends(request()->input())->links()); ?>

</div><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/installment-plan/search.blade.php ENDPATH**/ ?>