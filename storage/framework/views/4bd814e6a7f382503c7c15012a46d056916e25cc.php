
<div class="sozdatJkDaleData ms-0">
    <span class="plus2 profileMaxNazadInformatsiyaKlient back_houses">
        <i class="mdi mdi-keyboard-backspace mdi-20"></i>
    </span>
    <div class="d-flex">
        <div class="dalePodyedzEtaj">
            <?php if(empty(!$arr['entrance_count'])): ?>
                <?php $__currentLoopData = $arr['entrance_count']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_entrance_count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>

        <div class="d-flex" style="overflow: auto">
            <?php if(empty(!$arr['list'])): ?>
                <?php
                    $n = 0;
                    $first = true;
                ?>
                <?php $__currentLoopData = $arr['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $n++;
                        if ($status == 'client') {
                            $house_details_url = e(url('forthebuilder/clients/client-show-details')) . '/' . $model->id . '/' . ($val['entrance'] ?? 0) . '/' . 0 . '/' . $client_id;
                        } else {
                            $house_details_url = e(url('forthebuilder/house/show-details')) . '/' . $model->id . '/' . ($val['entrance'] ?? 0) . '/' . 0;
                        }
                    ?>
                    <a class="mb-4">
                        <div class="dalePodyedzBig pt-2">
                            <h3 class="podyedzNameDale">
                                <?php echo e(translate('Entrance') . ' ' . ($val['entrance'] ?? '')); ?>

                            </h3>
                            
                            <?php if(empty(!$arr['list'])): ?>
                                <?php $__currentLoopData = $val['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($val2)): ?>
                                    <div class="d-flex">
                                        <?php if($first): ?>
                                            <h4 class="etajNameNomerDale"><?php echo e($key2); ?></h4>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $val2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="box_60">
                                                <div class="podyedzNameDaleNol text-white <?php echo e((( $val3['status'] == 0 ) ? 'select_house_flat' : '')); ?> " style="background-color: <?php echo e($colors[$val3['color_status']]); ?>;"
                                                    data-category="<?php echo e($val3['color_status']); ?>"
                                                    data-id="<?php echo e($val3['id']); ?>"
                                                    data-house-id="<?php echo e($val3['house_id']); ?>"
                                                    data-number-of-flat="<?php echo e($val3['number_of_flat']); ?>"
                                                    data-house_name="<?php echo e($val3['house_name']); ?>"
                                                    >
                                                    <?php echo e($val3['room_count'] ?? 0); ?>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </a>
                    <?php
                        $first = false;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .select_house_flat{
        cursor: pointer;
    }
    .box_60{
        width: 60px;
        height: 60px;
    }
    .dalePodyedzBig {
      margin-right: 30px;
      transition: all 0.5s ease;
    }
    .podyedzNameDale {
        font-style: normal;
        font-weight: 500;
        color: #000000;
        margin-top: 7px;
        margin-bottom: 15px;
        text-align: center;
        transition: all 0.5s ease;
    }
    .dalePodyedzBig:hover {
        background-color: #E8F0FF;
        transition: all 0.5s ease;
        border-radius: 20px;
        padding-left: 20px;
        padding-right: 20px;
    }
    .podyedzNameDaleNol {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        font-size: 18px;
        transition: all 0.5s ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .etajNameNomerDale{
        min-width: 150px;
    }
</style><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/clients/house-show-more-ajax.blade.php ENDPATH**/ ?>