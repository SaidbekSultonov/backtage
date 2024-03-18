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


    $months = [];
    if (!empty($model) && count($model) > 0) {
        $first_month = $model[0]->date_deal;
        $last_month = $model[count($model)-1]->date_deal;
        
        for ($k = date('n',strtotime($first_month)); $k < date('n',strtotime($last_month)) ; $k++) { 
            $months[] = $initial_fee_moths[$k];
        }
    }
    
?>
<br>
<br>
<h4 style="font-size: 14pt;"><i>Информация о просроченных платежах</i></h4>
<br>
<br>
<table id="excelstyles" class="table-striped" style="opacity: 0;">
    <thead style="background: #FBD4B4;">
        <tr style="background: #FBD4B4;">
            <th style="font-weight: bold; background: #FBD4B4; width: 30px;">№</th>
            <th style="font-weight: bold; background: #FBD4B4; width:300px;">Клиенты </th>
            <th style="font-weight: bold; background: #FBD4B4; width: 150px;">Квартира</th>
            <th style="font-weight: bold; background: #FBD4B4; width: 100px; text-align: center;">Тип</th>
            <th style="font-weight: bold; background: #FBD4B4; width: 70px; text-align: center;">БЛОК</th>
            <?php if(isset($first_month) && isset($last_month)): ?>
                <?php if(!empty($months)): ?>
                    <th style="font-weight: bold; background: #FBD4B4; width: 150px; text-align: center;">
                        <?php echo e($months[0]); ?>

                        <?php echo e('-'.end($months)); ?>

                    </th>
                <?php endif; ?>
                <th style="font-weight: bold; background: #FBD4B4; width: 150px; text-align: center;">
                    <?php echo e($initial_fee_moths[date('n',strtotime($last_month))]); ?>

                </th>
                    
            <?php endif; ?>
            <th style="font-weight: bold; background: #FBD4B4; width: 150px; text-align: center;">Всего</th>
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
                $total_one = 0;
                $total_two = 0;
                $total_three = 0;
                
                

            ?>
            <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keym => $valuem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                    $total_price_sell += $valuem->price_sell;
                    $total_initial_fee += (float)$valuem->initial_fee;
                    $total_pay += (float)$valuem->pay_sum;
                    $total_every_month_pay += (float)$valuem->every_month_pay_sum;
                    $total_month2 = 0;
                    $total_month = 0;

                    $find_status = PayStatus::where('deal_id',$valuem->deal_id)
                    ->where('must_pay_date','<=',date('Y-m-d'))->where('price_to_pay','!=',0)->first();

                ?>
                <?php if(isset($find_status) && !empty($find_status)): ?> 
                    <tr>
                        <td><?php echo e($i++); ?></td>
                        <td style="width:300px;">
                            <?php if(isset($valuem->client_id)): ?>
                                <?php echo e($valuem->last_name.' '.$valuem->first_name.' '.$valuem->middle_name); ?>

                            <?php endif; ?>
                        </td>
                        <td style="width: 150px;">
                            <?php echo e($valuem->room_count.'х ком, '.$valuem->floor.' этаж'); ?>

                        </td>
                        <td style="width: 100px; text-align: center;">
                            <?php echo e(((!empty($valuem->type_name)) ? $valuem->type_name : '-')); ?>

                        </td>
                        <td style="width: 70px; text-align: center;">
                            <?php echo e(((!empty($valuem->corpus)) ? $valuem->corpus : '-')); ?>

                        </td>
                        

                        <?php if(isset($first_month) && isset($last_month)): ?>
                            <?php
                                for ($ii = date('n',strtotime($first_month)); $ii < date('n',strtotime($last_month)) ; $ii++) { 
                                    
                                    $pay_status = PayStatus::where('deal_id',$valuem->deal_id)
                                    ->whereBetween('must_pay_date', [date('Y-'.$ii.'-01'), date('Y-'.$ii.'-t')])->first();
                                    $total_month_pay[$ii][] = 0;
                                    if (isset($pay_status)) {
                                        if ($pay_status->price_to_pay == 0) {
                                            
                                            $total_month_pay[$ii][] = 0;
                                        }
                                        else{
                                            $total_month_pay[$ii][] = $pay_status->price_to_pay;
                                            $total_month += $pay_status->price_to_pay;
                                            $total_one += $pay_status->price_to_pay;
                                        }
                                    }
                                    
                                }
                                if(!empty($months)){
                                    if ($total_month > 0 ) {
                                        echo "<td style='width: 150px; text-align: center;'>".number_format($total_month,0,'',' ')."</td>";
                                    }
                                    else{
                                        echo "<td style='text-align: center;'> - </td>";
                                    }

                                }

                                $pay_status2 = PayStatus::where('deal_id',$valuem->deal_id)
                                ->whereBetween('must_pay_date', [date('Y-m-01'), date('Y-m-t')])->first();

                                
                                if (isset($pay_status2)) {
                                    if ($pay_status2->price_to_pay == 0) {
                                        
                                        $total_month2_pay[$ii+1][] = 0;
                                    }
                                    else{
                                        $total_month2_pay[$ii+1][] = $pay_status2->price_to_pay;
                                        $total_month2 += $pay_status2->price_to_pay;
                                        $total_two += $pay_status2->price_to_pay;
                                    }
                                }

                                if ($total_month2 > 0 ) {
                                    
                                    echo "<td style='width: 150px; text-align: center;'>".number_format($total_month2,0,'',' ')."</td>";
                                }
                                else{
                                    echo "<td style='text-align: center;'> - </td>";
                                }

                            ?>
                        <?php endif; ?>
                        <td style="width: 150px; text-align: center;">
                            <?php $total_three += $total_month2+$total_month; ?>
                            <?php echo e(number_format($total_month2+$total_month,0,'',' ')); ?>

                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr></tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th style="font-weight: bold; text-align: center;"><i>Итого</i></th>
                    <?php if(!empty($months)): ?>
                        <th style="font-weight: bold; text-align: center;">
                                <?php echo e(number_format($total_one,0,'',' ')); ?>

                        </th>
                    <?php endif; ?>
                    <th style="font-weight: bold; text-align: center;">
                        <?php echo e(number_format($total_two,0,'',' ')); ?>

                    </th>
                    <th style="font-weight: bold; text-align: center; color: red;">
                        <?php echo e(number_format($total_three,0,'',' ')); ?>

                    </th>
                </tr>

                <tr></tr>
                <tr></tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <?php echo e($initial_fee_moths[date('n',strtotime($last_month))]); ?>

                    </th>
                    <th style="text-align: center;">
                        <?php echo e(number_format($total_two,0,'',' ')); ?>

                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <?php echo e($months[0]); ?>

                        <?php echo e('-'.end($months)); ?>

                    </th>
                    <th style="text-align: center;">
                        <?php echo e(number_format($total_one,0,'',' ')); ?>

                    </th>
                </tr>
        <?php endif; ?>
        
    </tbody>
</table><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/exports/deals3.blade.php ENDPATH**/ ?>