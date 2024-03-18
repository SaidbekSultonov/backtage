<?php
    use Modules\ForTheBuilder\Entities\PayStatus;
    $initial_fee_moths = [
        '01' => 'Январь',
        '02' => 'Февраль',
        '03' => 'Март',
        '04' => 'Апрель',
        '05' => 'Май',
        '06' => 'Июнь',
        '07' => 'Июль',
        '08' => 'Aвгуст',
        '09' => 'Сентябрь',
        '10' => 'Октябрь',
        '11' => 'Ноябрь',
        '12' => 'Декабрь'
    ];
?>

<table id="excelstyles" class="table-striped" style="opacity: 0;">
    <thead style="background: #E5B8B7;">
        <tr style="background: #E5B8B7;">
            <th style="font-weight: bold; background: #E5B8B7; width: 30px;">№</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px;">Дата</th>
            <th width="500pt" style="font-weight: bold; background: #E5B8B7; min-width:300px;">
                Клиенты 
            </th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px;">Квартира</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px;">М2</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 70px;">БЛОК</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Цена за м2</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Стоимость</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Предоплата</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Оплаты</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Месячная оплата</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">
                <?php $__currentLoopData = $initial_fee_moths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key == date('m')): ?>
                        <?php echo e($value.' '.date('Y')); ?> 
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Остаток</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($model)): ?> 
            <?php 
                $i = 1; 
                $total_price_sell = 0;
                $total_initial_fee = 0;
                $total_pay = 0;
                $total_every_month_pay = 0;
                $total_month_pay = 0;
                $total = 0;
                $total_m2 = 0;
            ?>
            <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keym => $valuem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $total_price_sell += $valuem->price_sell;
                    $total_initial_fee += (float)$valuem->initial_fee;
                    $total_pay += (float)$valuem->pay_sum;
                    $total_every_month_pay += (float)$valuem->every_month_pay_sum;
                    $total += $valuem->price_sell - (float)$valuem->pay_sum;
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td data-field="rank" style="width:100pt;"><?php echo e(date('d/m/Y', strtotime($valuem->date_deal))); ?></td>
                    <td style="min-width:300px;">
                        <?php if(isset($valuem->client_id)): ?>
                            <?php echo e($valuem->last_name.' '.$valuem->first_name.' '.$valuem->middle_name); ?>

                        <?php endif; ?>
                    </td>
                    <td style="width: 150px;">
                        <?php echo e($valuem->room_count.'х ком, '.$valuem->floor.' этаж'); ?>

                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php
                            $areas = json_decode($valuem->areas);
                            echo $areas->total;
                            $total_m2 += $areas->total;
                        ?>
                    </td>
                    <td style="width: 70px;">
                        <?php echo e($valuem->corpus); ?>

                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php echo e((($valuem->price_sell > 0 && $areas->total > 0) ?  number_format(round($valuem->price_sell/$areas->total,2),0,'',' ') : 0)); ?>

                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php echo e(number_format($valuem->price_sell,0,'',' ')); ?>

                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php if(!empty($valuem->initial_fee)): ?>
                            <?php echo e(number_format((float)$valuem->initial_fee,0,'',' ')); ?>

                        <?php endif; ?>
                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php if(!empty($valuem->pay_sum)): ?>
                            <?php echo e(number_format((float)$valuem->pay_sum,0,'',' ')); ?>

                        <?php endif; ?>
                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php if(!empty($valuem->every_month_pay_sum)): ?>
                            <?php echo e(number_format((float)$valuem->every_month_pay_sum,0,'',' ')); ?>

                        <?php endif; ?>
                    </td>
                    
                        <?php
                            $pay_status = PayStatus::where('deal_id',$valuem->deal_id)->whereBetween('must_pay_date', [date('Y-m-01'), date('Y-m-t')])->first();

                            if (isset($pay_status)) {
                                if ($pay_status->price_to_pay == 0) {
                                    echo "<td style='width: 100px; text-align: center;'>".number_format($pay_status->price,0,'',' ')."</td>";
                                    $total_month_pay += $pay_status->price;
                                }
                                else{
                                    echo "<td style='width: 100px; text-align: center; color: #FF0000'>".number_format($pay_status->price_to_pay,0,'',' ')."</td>";

                                    $total_month_pay += $pay_status->price_to_pay;
                                }
                            }
                            else{
                                echo "<td></td>";
                            }
                            
                        ?>
                    
                    <td style="width: 100px; text-align: center;">
                        <?php if(!empty($valuem->pay_sum)): ?>
                            <?php echo e(number_format($valuem->price_sell - (float)$valuem->pay_sum,0,'',' ')); ?>

                        <?php else: ?>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <?php echo e($total_m2); ?>

                    </th>
                    <th></th>
                    <th></th>
                    <th>
                        <?php echo e(number_format($total_price_sell,0,'',' ')); ?>

                    </th>
                    <th>
                        <?php echo e(number_format($total_initial_fee,0,'',' ')); ?>

                    </th>
                    <th>
                        <?php echo e(number_format($total_pay,0,'',' ')); ?>

                    </th>
                    <th>
                        <?php echo e(number_format($total_every_month_pay,0,'',' ')); ?>

                    </th>
                    <th>
                        <?php echo e(number_format($total_month_pay,0,'',' ')); ?>

                    </th>
                    <th>
                        <?php echo e(number_format($total,0,'',' ')); ?>

                    </th>
                </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/exports/deals.blade.php ENDPATH**/ ?>