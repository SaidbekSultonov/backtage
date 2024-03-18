<?php
    use Modules\ForTheBuilder\Entities\PayStatus;
    $initial_fee_moths = [
        '1' => 'Январь',
        '2' => 'Февраль',
        '3' => 'Март',
        '4' => 'Апрель',
        '5' => 'Май',
        '6' => 'Июнь',
        '7' => 'Июль',
        '8' => 'Aвгуст',
        '9' => 'Сентябрь',
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
            <th style="font-weight: bold; background: #E5B8B7; width:300px;">Клиенты </th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px;">Квартира</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">М2</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 70px; text-align: center;">БЛОК</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">№ квартиры</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Номер договора</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 100px; text-align: center;">Тип</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Предоплата</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Цена за м2</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Стоимость</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Скидка</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 200px; text-align: center;">Стоимость со скидкой</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Предоплата</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Оплаты</th>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Месячная оплата</th>

            <?php if(!empty($arr)): ?>
                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $month = explode('-',$keys)[0];
                        $year = explode('-',$keys)[1];
                    ?>
                    <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">
                        <?php echo e($initial_fee_moths[$month]); ?>

                        <?php echo e($year); ?>

                    </th>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <th style="font-weight: bold; background: #E5B8B7; width: 150px; text-align: center;">Остаток</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($model)): ?> 
            <?php 
                $i = 1; 
                $total_price_sell_m2 = 0;
                $total_price_sell = 0;
                $total_initial_fee = 0;
                $total_pay = 0;
                $total_every_month_pay = 0;
                $total_month_pay = [];
                $total = 0;
                $total_m2 = 0;
                $total_discount_sum = 0;

                $months_total = [];

            ?>
            <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keym => $valuem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $total_price_sell += $valuem->price_sell;
                    $total_initial_fee += (float)$valuem->initial_fee;
                    $total_pay += (float)$valuem->pay_sum;
                    $total_every_month_pay += (float)$valuem->every_month_pay_sum;
                    
                ?>
                <tr>
                    <td><?php echo e($i++); ?></td>
                    <td style="width:100px; text-align: right;"><?php echo e(date('d/m/Y', strtotime($valuem->date_deal))); ?></td>
                    <td style="width:300px;">
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
                    
                    <td style="width: 70px; text-align: center; background: #8DB3E2; border-bottom: 2px solid #C4C7C5;">
                        <?php echo e(((!empty($valuem->corpus)) ? $valuem->corpus : '-')); ?>

                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php echo e(((!empty($valuem->number_of_flat)) ? $valuem->number_of_flat : '-')); ?>

                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php echo e(((!empty($valuem->contract)) ? $valuem->contract : '-')); ?>

                    </td>
                    <td style="width: 100px; text-align: center;">
                        <?php echo e(((!empty($valuem->type_name)) ? $valuem->type_name : '-')); ?>

                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php echo e(((!empty($valuem->percent_type)) ? round($valuem->percent_type,2).'%' : '-')); ?>

                    </td>
                    <td style="width: 150px; text-align: center; background: #E5DFEC; border-bottom: 2px solid #C4C7C5;">
                        <?php echo e((($valuem->price_sell > 0 && $areas->total > 0) ?  number_format(round($valuem->price_sell/$areas->total,2),0,'',' ') : 0)); ?>

                        <?php
                            $total_price_sell_m2 += (($valuem->price_sell > 0 && $areas->total > 0) ?  $valuem->price_sell/$areas->total : 0);
                            $total += $total_price_sell_m2;
                        ?>
                    </td>
                    
                    <td style="width: 150px; text-align: center;">
                        <?php echo e(number_format($valuem->price_sell,0,'',' ')); ?>

                        <?php $total += $valuem->price_sell; ?>
                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php echo e(((!empty($valuem->initial_fee_discount)) ? $valuem->initial_fee_discount.'%' : '-')); ?>

                    </td>

                    <td style="width: 200px; text-align: center;">
                        <?php
                        
                            if (!empty($valuem->discount)) {
                                $dis_price = ($valuem->price_sell/100)*$valuem->discount;
                                echo number_format(($valuem->price_sell-$dis_price),0,'',' ');
                                $total_discount_sum += $valuem->price_sell-$dis_price;
                            }
                            elseif(!empty($valuem->initial_fee_discount) && !empty($valuem->percent_type)){
                                $dis_price = ($valuem->price_sell/100)*$valuem->percent_type;
                                $dis_price = ($dis_price/100)*$valuem->initial_fee_discount;
                                echo number_format(($valuem->price_sell-$dis_price),0,'',' ');
                                $total_discount_sum += $valuem->price_sell-$dis_price;
                            }
                            else{
                                echo number_format(($valuem->price_sell),0,'',' ');   
                                $total_discount_sum += $valuem->price_sell;
                            }

                        ?>
                    </td>

                    <td style="width: 150px; text-align: center;">
                        <?php if(!empty($valuem->initial_fee)): ?>
                            <?php echo e(number_format((float)$valuem->initial_fee,0,'',' ')); ?>

                            <?php $total += $valuem->initial_fee; ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td style="width: 150px; text-align: center;">
                        <?php if(!empty($valuem->pay_sum)): ?>
                            <?php echo e(number_format((float)$valuem->pay_sum,0,'',' ')); ?>

                            <?php $total += $valuem->pay_sum; ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td style="width: 150px; text-align: center; background: #EAF1DD; border-bottom: 2px solid #C4C7C5;">
                        <?php if(!empty($valuem->every_month_pay_sum)): ?>
                            <?php echo e(number_format((float)$valuem->every_month_pay_sum,0,'',' ')); ?>

                            <?php $total += $valuem->every_month_pay_sum; ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    
                    <?php if(!empty($arr)): ?>
                        <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                
                                $month = explode('-',$keys)[0];
                                $year = explode('-',$keys)[1];
                                
                                if (strlen($month) == 1) {
                                    $month = '0'.$month;
                                }


                                $find_pay_status = PayStatus::where('deal_id',$valuem->deal_id)
                                ->whereBetween(
                                    'must_pay_date', [
                                        date($year.'-'.$month.'-01'), 
                                        date('Y-m-t', strtotime(date($year.'-'.$month)))
                                    ])
                                ->first();

                                if (isset($find_pay_status) && !empty($find_pay_status)) {
                                    if ($find_pay_status->price_to_pay == 0) {
                                        echo "<td style='width: 150px; text-align: center;'>".number_format($find_pay_status->price,0,'',' ')."</td>";
                                        $months_total[$keys][$valuem->deal_id] = $find_pay_status->price;
                                        $total += $find_pay_status->price;
                                    }
                                    elseif($find_pay_status->price_to_pay == $find_pay_status->price){
                                        echo "<td style='width: 150px; text-align: center; color: red'> ".number_format($find_pay_status->price,0,'',' ')." </td>";
                                        $months_total[$keys][$valuem->deal_id] = $find_pay_status->price;
                                        $total += $find_pay_status->price;
                                    }
                                    else{
                                        echo "<td style='width: 150px; text-align: center; color: red'> ".number_format($find_pay_status->price_to_pay,0,'',' ')." </td>";  
                                        $months_total[$keys][$valuem->deal_id] = $find_pay_status->price_to_pay; 
                                        $total += $find_pay_status->price_to_pay;
                                    }    
                                }
                                else{
                                    echo "<td style='width: 150px; text-align: center;'> - </td>";
                                }

                            ?>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <td style="width: 150px; text-align: center;">
                        <?php if(!empty($valuem->pay_sum)): ?>
                            <?php $sum = 0; ?> 
                            
                            <?php if($valuem->discount > 0): ?>
                                <?php
                                    $sum = ($valuem->price_sell/100)*$valuem->discount;
                                ?>
                            <?php elseif($valuem->initial_fee_discount > 0): ?>
                                <?php
                                    if (!empty($valuem->percent_type) && $valuem->percent_type > 0) {
                                        $initial_sum = ($valuem->price_sell/100)*$valuem->percent_type;
                                        $sum = ($initial_sum/100)*$valuem->initial_fee_discount;
                                    }
                                    else{
                                        $sum = 0;
                                    }
                                ?>
                            <?php endif; ?>
                            
                            <?php 
                                $last_sum = $valuem->price_sell - ((float)$valuem->pay_sum+$sum); 
                                
                                if ($last_sum > 0) {
                                    $total += $last_sum;
                                    echo number_format($last_sum,0,'',' ');     
                                }
                                else{
                                    echo " - ";
                                }
                            ?>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e($total_m2); ?>

                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_price_sell_m2,0,'',' ')); ?>

                    </th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_price_sell,0,'',' ')); ?>

                    </th>
                    <th></th>
                    <th style="font-weight: bold; text-align: center; width: 200px;">
                        <?php echo e(number_format($total_discount_sum,0,'',' ')); ?>

                    </th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_initial_fee,0,'',' ')); ?>

                    </th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_pay,0,'',' ')); ?>

                    </th>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_every_month_pay,0,'',' ')); ?>

                    </th>
                    <?php if(!empty($arr)): ?>
                        <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th style="font-weight: bold; text-align: center;">
                            <?php echo e(number_format(array_sum($months_total[$keys]),0,'',' ')); ?>

                        </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total,0,'',' ')); ?>

                    </th>
                </tr>
        <?php endif; ?>
        <tr>
            
        </tr>
        <?php if(isset($currency) && !empty($currency)): ?>
            <tr>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4;"></th>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total_price_sell_m2 > 0) ? number_format(round($total_price_sell_m2/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total_price_sell > 0) ? number_format(round($total_price_sell/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <th style="background: #FBD4B4;"></th>
                <th style="background: #FBD4B4; width: 200px; font-weight: bold; text-align: center;">
                    <?php echo e((($total_discount_sum > 0) ? number_format(round($total_discount_sum/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total_initial_fee > 0) ? number_format(round($total_initial_fee/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total_pay > 0) ? number_format(round($total_pay/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total_every_month_pay > 0) ? number_format(round($total_every_month_pay/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
                <?php if(!empty($arr)): ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                            $
                            <?php echo e(((array_sum($months_total[$keys]) > 0) ? number_format(round(array_sum($months_total[$keys])/$currency->SUM,2),0,'',' ') : 0)); ?>

                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <th style="font-weight: bold; text-align: center; background: #FBD4B4;">
                    $
                    <?php echo e((($total > 0) ? number_format(round($total/$currency->SUM,2),0,'',' ') : 0)); ?>

                </th>
            </tr>
        <?php endif; ?>
    </tbody>
</table><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/exports/deals2.blade.php ENDPATH**/ ?>