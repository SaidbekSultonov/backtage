<?php
    $areas=json_decode($model->areas);
    $ares_prices=json_decode($model->ares_price);

    

    if ($price_m2){
        $price_100 = $price_m2;
        $price_50 = $price_m2;
        $price_30 = $price_m2;
        $price_70 = $price_m2;

    }
    else{
        $price_100 = $ares_prices->hundred->total ?? 0 ;
        $price_50 = $ares_prices->fifty->total ?? 0;
        $price_30 = $ares_prices->thirty->total ?? 0;
        $price_70 = $ares_prices->seventy->total ?? 0;
    }

    
    $full_price_100 = ($areas->total)*($price_100); //100% lik to'lovda umumuiy summa

    $full_price_50=($areas->total)*($price_50); // 
    $full_price_30=($areas->total)*($price_30); // 
    $full_price_70=($areas->total)*($price_70); // 

    $sale_100=(($areas->total)*($price_30))-(($areas->total)*($price_100)); // 
    $sale_50=(($areas->total)*($price_30))-(($areas->total)*($price_50));  // 
    $sale_70=(($areas->total)*($price_70))-(($areas->total)*($price_70));  // 


    

    

    
    $full_price_70_percent_70 = (($full_price_70/100)*70);
    $full_price_70_percent_30 = $full_price_70-$full_price_70_percent_70;
    $new_70_sale = ($full_price_70_percent_70/100)*$seventy;
    $last_70_sum = $full_price_70-$new_70_sale;

    // 50%
    $full_price_50_percent_50 = (($full_price_50/100)*50);
    $full_price_50_percent_30 = $full_price_50-$full_price_50_percent_50;
    $new_50_sale = ($full_price_50_percent_50/100)*$fifty;
    $last_50_sum = $full_price_50-$new_50_sale;







?>

<div id="DivIdToPrint" style="width: 100%; position: relative;">
    <img style="position: absolute; top: 0; left: 0; width: 100%; z-index: -1" src="<?php echo e('/backend-assets/img/word/nurhayat.png'); ?>" alt="">
    
    <div style="width: 85%; margin: 200px auto;">
        <table style="border-collapse: collapse;width: 100%;">
            <tr>
                <td style="font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;">Дата составления : <?php echo e(date('d.m.Y')); ?></td>
                <td style="font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: right;">
                    Прайс актуален до: <?php echo e(date('d.m.Y', strtotime($date))); ?>

                </td>
            </tr>
        </table>
        <br>
        <table border="1" style="border-collapse: collapse; width: 100%;">
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: right; border: 0;padding-right: 10px;">
                    Блок: <?php echo e($house->corpus ?? ''); ?>

                </td>
                
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: left; border: 0;padding-left: 10px;">
                    Этаж: <?php echo e($model->floor); ?>

                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: right; border: 0;padding-right: 10px;">
                    Площадь квартиры: <?php echo e($areas->total); ?> 
                </td>
                
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: left; border: 0;padding-left: 10px;">
                    Количество комнат: <?php echo e($model->room_count); ?>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: center; border: 0;">
                    Цена за 1 м2: <?php echo e(number_format($price_100,0,'',' ')); ?>

                </td>
            </tr>










            <tr>
                <td colspan="2" style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: center;">
                    100% Оплата <span style="color: #CEA87E;">(cкидка <?php echo e((($hundred) ? $hundred : 0)); ?>%)</span>
                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Цена за 1м2: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($price_100,0,'',' ')); ?>

                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Общая стоимость: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php 
                        $full_price_100 = $full_price_100 - (($full_price_100/100)*$hundred);
                    ?>
                    <?php echo e(number_format($full_price_100,0,'',' ')); ?>

                </td>
            </tr>

            <tr>
                <td colspan="2" style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: center;">
                    70% Оплата <span style="color: #CEA87E;">(cкидка <?php echo e((($seventy) ? $seventy : 0)); ?>%)</span>
                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Цена за 1м2: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($price_70,0,'',' ')); ?>

                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Общая стоимость: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($last_70_sum,0,'',' ')); ?>

                </td>
            </tr>

            <tr>
                <td colspan="2" style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: center;">
                    50% Оплата <span style="color: #CEA87E;">(cкидка <?php echo e((($fifty) ? $fifty : 0)); ?>%)</span>
                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Цена за 1м2: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($price_50,0,'',' ')); ?>

                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Общая стоимость: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($last_50_sum,0,'',' ')); ?>

                </td>
            </tr>

            <tr>
                <td colspan="2" style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold;text-align: center;">
                    30% Оплата
                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Цена за 1м2: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php echo e(number_format($price_30,0,'',' ')); ?>

                </td>
            </tr>
            <tr>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    Общая стоимость: 
                </td>
                <td style="padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;">
                    <?php 
                        // $full_price_70 = $full_price_70 - (($full_price_70/100)*10);
                    ?>
                    <?php echo e(number_format($full_price_30,0,'',' ')); ?>

                </td>
            </tr>
        </table> 
        
        <div style="position: absolute; width:85%; left: 7.5%; bottom: 130px;">
            <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: right;">
                Менеджер: <?php echo e($user_name); ?>

            </div>   
            <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: right;">
                Телефон: <?php echo e((($phone_number) ? $phone_number : '+998781475050')); ?>

            </div>
            
            <table style="width: 100%;">
                <tr>
                    <td style="width: 20%; text-align: center;">
                        <br>
                        <br>
                        <img width="80px" src="<?php echo e(asset('/backend-assets/img/word/5.png')); ?>" alt="">
                        
                        <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 18px;font-weight: bold; text-align: center;">
                            Большой <br> выбор <br> планировок
                        </div>
                    </td>
                    

                    <td style="width: 20%; text-align: center;">
                        <br>
                        
                        <img width="80px" src="<?php echo e(asset('/backend-assets/img/word/4.png')); ?>" alt="">
                        
                        <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 18px;font-weight: bold; text-align: center;">
                            Надёжный <br> ЖК
                        </div>
                    </td>
                    
                    
                    <td style="width: 20%; text-align: center;">
                        <br>
                        
                        <img width="80px" src="<?php echo e(asset('/backend-assets/img/word/3.png')); ?>" alt="">
                        
                        <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 18px;font-weight: bold; text-align: center;">
                            Удобная <br> локация
                        </div>
                    </td>


                    <td style="width: 20%; text-align: center;">
                        <br>
                        <br>
                        
                        <img width="80px" src="<?php echo e(asset('/backend-assets/img/word/1.png')); ?>" alt="">
                        
                        <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 18px;font-weight: bold; text-align: center;">
                            Зеленая <br> зона
                        </div>
                    </td>
                    
                    <td style="width: 20%; text-align: center;">
                        <br>
                        <br>
                        <img width="80px" src="<?php echo e(asset('/backend-assets/img/word/2.png')); ?>" alt="">
                        
                        <div style="width: 100%;font-family: Times New 'Times New Roman', Times, serif; font-size: 18px;font-weight: bold; text-align: center;">
                            Круглосуточная охрана и видеонаблюдение
                        </div>
                    </td>
                </tr>
            </table>
        </div>

    </div>
    <?php if($ins_plan): ?>
    <?php
        if ($price_m2)
             $areas_price_m2 = $price_m2;
        else
            $areas_price_m2 = $price_100;
    ?>
        <div style="margin-top: 100%; text-align: center; width: 100%;">
            <img width="200px" src="<?php echo e('/backend-assets/img/nur_price.png'); ?>" alt="">
            <br>
            <br>
            <table border="1" style="border-collapse: collapse;width: 100%;">
                <tr>
                    <th style="width: 50%; text-align: center; padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;" colspan="2">
                        <span style="margin-right: 10px;"><?php echo e($areas->total); ?> м2:</span>
                        <span><?php echo e(number_format($areas_price_m2,0,'',' ')); ?></span>
                    </th>
                    <th style="width: 50%; text-align: center; padding: 1px 1px; font-family: Times New 'Times New Roman', Times, serif; font-size: 20px;font-weight: bold; text-align: center;" colspan="2">
                        <span>Рассрочка:</span>
                        <span><?php echo e($period); ?></span>
                    </th>
                </tr>

                <tr>
                    <th>
                        <div>30% сумма предоплаты:</div>
                        <?php echo e(number_format((($areas_price_m2 * $areas->total)/100)*30,0,'.',' ')); ?>

                    </th>
                    <th>
                        <div>50% сумма предоплаты:</div>
                        <?php
                            $fifty_price = (($areas_price_m2 * $areas->total)/100)*50;
                            $fifty_price = $fifty_price-(($fifty_price/100)*$fifty);
                        ?>
                        <?php echo e(number_format($fifty_price,0,'.',' ')); ?>

                    </th>
                    <th>
                        <div>70% сумма предоплаты:</div>
                        <?php
                            $seventy_price = (($areas_price_m2 * $areas->total)/100)*70;
                            $seventy_price = $seventy_price-(($seventy_price/100)*$seventy);
                        ?>
                        <?php echo e(number_format($seventy_price,0,'.',' ')); ?>

                    </th>
                    <th rowspan="2">
                        <div>Общая Сумма при 100%:</div>
                        <?php
                            $hundred_price = $areas_price_m2 * $areas->total;
                            $hundred_price = $hundred_price-(($hundred_price/100)*$hundred);
                        ?>
                        <?php echo e(number_format($hundred_price,0,'.',' ')); ?>

                    </th>
                </tr>
                <tr>
                    <th>
                        Скидка на предоплату 0%: <br> 0.00
                    </th>
                    <th>
                        <div>Скидка на предоплату <?php echo e($fifty); ?>%</div>
                        <?php
                            $fifty_price = (($areas_price_m2 * $areas->total)/100)*50;
                            $fifty_price = ($fifty_price/100)*$fifty;
                        ?>
                        <?php echo e(number_format($fifty_price,0,'.',' ')); ?>

                    </th>
                    <th>
                        <div>Скидка на предоплату <?php echo e($seventy); ?>%</div>
                        <?php
                            $seventy_price = (($areas_price_m2 * $areas->total)/100)*70;
                            $seventy_price = ($seventy_price/100)*$seventy;
                        ?>
                        <?php echo e(number_format($seventy_price,0,'.',' ')); ?>

                    </th>
                </tr>
                <tr>
                    <th>
                        <div>Остаток суммы:</div>
                        <?php
                            echo number_format(($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*30),0,'.',' ');
                        ?>
                    </th>
                    <th>
                        <div>Остаток суммы:</div>
                        <?php
                            echo number_format(($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*50),0,'.',' ');
                        ?>
                    </th>
                    <th>
                        <div>Остаток суммы:</div>
                        <?php
                            echo number_format(($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*70),0,'.',' ');
                        ?>
                    </th>
                    <th rowspan="3">
                        <div>Скидка на предоплату <?php echo e($hundred); ?>%:</div>
                        <?php
                            echo number_format(((($areas_price_m2 * $areas->total)/100)*$hundred),0,'.',' ');
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div>Общая Сумма при 30%:</div>
                        <?php
                            echo number_format($areas_price_m2 * $areas->total,0,'.',' ');
                        ?>
                    </th>
                    <th>
                        <div>Общая Сумма при 50%:</div>
                        <?php
                            echo number_format(($areas_price_m2 * $areas->total)-(((($areas_price_m2 * $areas->total/100)*50)/100)*$fifty),0,'.',' ');
                        ?>
                    </th>
                    <th>
                        <div>Общая Сумма при 70%:</div>
                        <?php
                            echo number_format(($areas_price_m2 * $areas->total)-(((($areas_price_m2 * $areas->total/100)*70)/100)*$seventy),0,'.',' ');
                        ?>
                    </th>
                </tr>
                <tr>
                    <th>
                        <div>Ежемесячный платеж:</div>
                        <?php
                            echo number_format((($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*30))/$period);
                        ?>
                    </th>
                    <th>
                        <div>Ежемесячный платеж:</div>
                        <?php
                            echo number_format((($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*50))/$period);
                        ?>
                    </th>
                    <th>
                        <div>Ежемесячный платеж:</div>
                        <?php
                            echo number_format((($areas_price_m2 * $areas->total)-((($areas_price_m2 * $areas->total)/100)*70))/$period);
                        ?>
                    </th>
                </tr>
            </table>
        </div>
    <?php endif; ?>
    <div>
        
        <?php if(!empty($model->files)): ?>
            <?php
                $first = true;
            ?>
            <?php $__currentLoopData = $model->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $class = '';
                    if ($first) {
                        $first = false;
                        $class = 'active';
                    }
                ?>
                    <?php if(file_exists(asset('/uploads/house-flat/' . $model->house_id . '/l_' . $img->guid))): ?>
                        <img style="width: 100%;" 
                        src="<?php echo e(asset('/uploads/house-flat/' . $model->house_id . '/l_' . $img->guid)); ?>"
                        alt="Home">
                    <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
    </div>
</div>

<input type="hidden" id="showId" value="<?php echo e($model->id); ?>">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>

<script>
    $(document).ready(function() {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('', 'Print-Window');
        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML +
            '</body></html>');
        newWin.document.close();
        newWin.onafterprint = window.close;

        setTimeout(function() {
            var showId = $('#showId').val();
            location.href = "/house-flat/show/" + showId;
        }, 10);
        // setTimeout(function() {
        //     newWin.close();
        // }, 50);
    })
</script>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house-flat/new-print.blade.php ENDPATH**/ ?>