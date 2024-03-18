<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\HouseFlat;
    use Modules\ForTheBuilder\Entities\Constants;
?>
<?php $__env->startSection('title'); ?> <?php echo e(translate('JK')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .plus2 {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        background: #F2F2F2;
        color: #555;
        width: 50px;
        height: 50px;
    }
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-10 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.house.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Add')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('forthebuilder.house-flat.update', $model->id)); ?>" method="POST"
                        enctype="multipart/form-data"> <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="lidiMarginRight1272">
                                    <div class="sozdatImyaSpsok mb-3">
                                        
                                        <?php if($model->room_count == 'p'): ?>
                                            <label class="form-label"><?php echo e(translate('Parking number')); ?></label>
                                        <?php elseif($model->room_count == 'c'): ?>
                                            <label class="form-label"><?php echo e(translate('Commercial number')); ?></label>
                                        <?php else: ?>
                                            <label class="form-label"><?php echo e(translate('Apartment number')); ?></label>
                                        <?php endif; ?>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['number_of_flat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($model->number_of_flat); ?>" name="number_of_flat">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['number_of_flat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(translate('Entrance')); ?></label>
                                        <select
                                            class="form-control sozdatImyaSpisokSelectOption1272 <?php $__errorArgs = ['entrance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="exampleFormControlSelect1" name="entrance">
                                            <?php if(empty(!$model->house)): ?>
                                                <?php for($i = 1; $i <= $model->house->entrance_count; $i++): ?>
                                                    <?php
                                                        $selectedI = '';
                                                        if ($i == $model->entrance) {
                                                            $selectedI = 'selected';
                                                        }
                                                    ?>
                                                    <option value="<?php echo e($i); ?>" <?php echo e($selectedI); ?>><?php echo e($i); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="error-data">
                                            <?php $__errorArgs = ['entrance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(translate('Floor')); ?></label>
                                        <select
                                            class="form-control sozdatImyaSpisokSelectOption1272 <?php $__errorArgs = ['floor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="exampleFormControlSelect2" name="floor">
                                            <?php if(empty(!$model->house)): ?>
                                                <?php for($j = 1; $j <= $model->house->floor_count; $j++): ?>
                                                    <?php
                                                        $selectedJ = '';
                                                        if ($j == $model->floor) {
                                                            $selectedJ = 'selected';
                                                        }
                                                    ?>
                                                    <option value="<?php echo e($j); ?>" <?php echo e($selectedJ); ?>><?php echo e($j); ?>

                                                    </option>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="error-data">
                                            <?php $__errorArgs = ['floor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <?php
                                        $areas = json_decode($model->areas);
                                    ?>
                                    <div class="sozdatImyaSpsok d-none">
                                        <label class="form-label"><?php echo e(translate('Living area m2')); ?></label>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_housing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($areas->housing ?? 0); ?>" name="area_housing">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['area_housing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>

                                    <?php if(isset($areas->hotel) && $areas->hotel > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Hotel area m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_hotel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->hotel ?? 0); ?>" name="area_hotel">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_hotel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->hotel2) && $areas->hotel2 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">2 - <?php echo e(translate('Hotel area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->hotel2 ?? 0); ?>" name="area_hotel_2">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->hotel3) && $areas->hotel3 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">3 - <?php echo e(translate('Hotel area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->hotel3 ?? 0); ?>" name="area_hotel_3">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->hotel4) && $areas->hotel4 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">4 - <?php echo e(translate('Hotel area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->hotel4 ?? 0); ?>" name="area_hotel_4">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->hotel5) && $areas->hotel5 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">5 - <?php echo e(translate('Hotel area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->hotel5 ?? 0); ?>" name="area_hotel_5">                                            
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->bedroom) && $areas->bedroom > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Bedroom area m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->bedroom ?? 0); ?>" name="area_bedroom">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->bedroom2) && $areas->bedroom2 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">2 - <?php echo e(translate('Bedroom area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->bedroom2 ?? 0); ?>" name="area_bedroom_2">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom3) && $areas->bedroom3 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">3 - <?php echo e(translate('Bedroom area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->bedroom3 ?? 0); ?>" name="area_bedroom_3">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom4) && $areas->bedroom4 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">4 - <?php echo e(translate('Bedroom area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->bedroom4 ?? 0); ?>" name="area_bedroom_4">                                            
                                        </div>
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom5) && $areas->bedroom5 > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label">5 - <?php echo e(translate('Bedroom area m2')); ?></label>
                                            <input class="form-control" type="text" value="<?php echo e($areas->bedroom5 ?? 0); ?>" name="area_bedroom_5">                                            
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->basement) && $areas->basement > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Area (Ground) m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->basement); ?>" name="area_basement">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->terraca) && $areas->terraca > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Area (Terrace) m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_terraca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->terraca); ?>" name="area_terraca">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_terraca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->attic) && $areas->attic > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Area (Attic) m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->attic); ?>" name="area_attic">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->balcony) && $areas->balcony > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Balcony m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_balcony'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->balcony); ?>" name="area_balcony">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_balcony'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(isset($areas->corridor) && $areas->corridor > 0): ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Corridor m2')); ?></label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_corridor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($areas->corridor); ?>" name="area_corridor">
                                            <span class="error-data">
                                                <?php $__errorArgs = ['area_corridor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Total area m2')); ?></label>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['area_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($areas->total); ?>" name="area_total">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['area_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                               
                                <div class="sozdatImyaSpsok mb-3">
                                    <?php if(is_int($model->room_count)): ?>
                                        <label class="form-label"><?php echo e(translate('Registry number')); ?></label>
                                    <?php elseif($model->room_count == 'p'): ?>
                                        <label class="form-label"><?php echo e(translate('Registry parking number')); ?></label>
                                    <?php else: ?>
                                        <label class="form-label"><?php echo e(translate('Registry commercial number')); ?></label>
                                    <?php endif; ?>
                                    <input
                                        class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['doc_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($model->doc_number ?? $model->number_of_flat); ?>"
                                        name="doc_number" readonly>
                                    <span class="error-data">
                                        <?php $__errorArgs = ['doc_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>

                                <?php
                                    $ares_price = json_decode($model->ares_price);
                                ?>
                                <div class="sozdatImyaSpsok mb-3">
                                    <label class="form-label"><?php echo e(translate('Price for 1m2')); ?></label>
                                    <input
                                        class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" name="price" value="<?php echo e($ares_price->hundred->total ?? 0.0); ?>">
                                    <span class="error-data">
                                        <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <?php echo e($message); ?>

                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </span>
                                </div>
                                
                                <?php if(!empty($installment_type)): ?>
                                    <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Price for 1m2').' '.$values->percent_type); ?>%</label>
                                            <input
                                                class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="text" value="<?php echo e($ares_price->thirty->total ?? 0.0); ?>" name="price_<?php echo e($values->percent_type); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>



                                <?php if($areas->basement > 0): ?>
                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Price for 1m2 (Ground)')); ?></label>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->hundred->basement ?? 0.0); ?>"
                                            name="price_basement">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    
                                    <?php if(!empty($installment_type)): ?>
                                        <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sozdatImyaSpsok mb-3">
                                                <label class="form-label"><?php echo e(translate('Price for 1m2 (Ground)').' '.$values->percent_type); ?>%</label>
                                                <input
                                                    class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_basement_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    type="text" value="<?php echo e($ares_price->thirty->basement ?? 0.0); ?>"
                                                    name="price_basement_<?php echo e($values->percent_type); ?>">
                                                <span class="error-data">
                                                    <?php $__errorArgs = ['price_basement_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <?php echo e($message); ?>

                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if($areas->attic > 0): ?>
                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Price for 1m2 (Attic)')); ?></label>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->hundred->attic ?? 0.0); ?>"
                                            name="price_attic">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    
                                    <?php if(!empty($installment_type)): ?>
                                        <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sozdatImyaSpsok mb-3">
                                                <label class="form-label"><?php echo e(translate('Price for 1m2 (Attic)').' '.$values->percent_type); ?>%</label>
                                                <input
                                                    class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_attic_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    type="text" value="<?php echo e($ares_price->thirty->attic ?? 0.0); ?>"
                                                    name="price_attic_<?php echo e($values->percent_type); ?>">
                                                <span class="error-data">
                                                    <?php $__errorArgs = ['price_attic_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <?php echo e($message); ?>

                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                            </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    
                                <?php endif; ?>

                                <?php if($areas->terraca > 0): ?>
                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Price for 1m2 (Terrace)')); ?></label>
                                        <input
                                            class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_terrace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->hundred->terraca ?? 0.0); ?>"
                                            name="price_terrace">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_terrace'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <?php echo e($message); ?>

                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </span>
                                    </div>
                                    
                                    <?php if(!empty($installment_type)): ?>
                                        <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="sozdatImyaSpsok mb-3">
                                                <label class="form-label"><?php echo e(translate('Price for 1m2 (Terrace)').' '.$values->percent_type); ?>%</label>
                                                <input
                                                    class="form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['price_terrace_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    type="text" value="<?php echo e($ares_price->thirty->terraca ?? 0.0); ?>"
                                                    name="price_terrace_<?php echo e($values->percent_type); ?>">
                                                <span class="error-data">
                                                    <?php $__errorArgs = ['price_terrace_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <?php echo e($message); ?>

                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </span>
                                            </div>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </div>

                            <div class="col-sm-6 mb-3">
                                    <?php if(!empty($model->files)): ?>
                                        <?php $__currentLoopData = $model->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex align-items-start mb-3">
                                            <div class="rounded border p-1" style="max-width: 300px;">
                                                <img class="img-fluid" src="<?php echo e(asset('/uploads/house-flat/' . $model->house_id . '/m_' . $img->guid)); ?>" alt="Home">
                                            </div>
                                            <button class="btn btn-outline-danger ms-3 delete_img" data-id="<?php echo e($model->id); ?>" data-img="<?php echo e($img->guid); ?>" data-document-id="<?php echo e($img->id); ?>">
                                                <i class="fe-trash-2 mdi-20"></i>
                                            </button>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <input type="file" class="form-control" id="" name="files">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-success">
                                    <?php echo e(translate('Create')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.delete_img', function() {
        var id = $(this).attr('data-id')
        var img = $(this).attr('data-img')
        var doc_id = $(this).attr('data-document-id')

        $.ajax({
            url: '/house-flat/delete-img',
            type: 'get',
            data: {
                id: id,
                img: img,
                doc_id: doc_id
            },
            success: function (data) {
                if (data.status == true) {
                    window.location.reload()
                }
                else{
                    alert('Error!')
                } 
            }
        });

        return false;
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house-flat/edit.blade.php ENDPATH**/ ?>