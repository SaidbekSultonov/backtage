<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\HouseFlat;
    use Modules\ForTheBuilder\Entities\Constants;
?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <form action="<?php echo e(route('forthebuilder.house-flat.saved')); ?>" method="POST"
                    enctype="multipart/form-data"> <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
                        <input type="hidden" name="additional_type" value="<?php echo e($add_type); ?>">
                        <input type="hidden" name="house_id" value="<?php echo e($model->house_id); ?>">

                        <div class="row w-100">
                            <div class="col-sm-6">
                                <div class="sozdatImyaSpsok">
                                    <?php if($model->room_count != null): ?>
                                        <h5><?php echo e(translate('Apartment number')); ?></h5>
                                    <?php elseif($model->room_count == 'p'): ?>
                                        <h5><?php echo e(translate('Parking number')); ?></h5>
                                    <?php else: ?>
                                        <h5><?php echo e(translate('Commercial number')); ?></h5>
                                    <?php endif; ?>
                                    <input
                                        class="form-control <?php $__errorArgs = ['number_of_flat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($model_areas->number_of_flat+1); ?>" name="number_of_flat">
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

                                <div class="form-group">
                                    <h5><?php echo e(translate('Entrance')); ?></h5>
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

                                <div class="form-group">
                                    <h5><?php echo e(translate('Floor')); ?></h5>
                                    <select
                                        class="form-control sozdatImyaSpisokSelectOption1272 <?php $__errorArgs = ['floor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="exampleFormControlSelect1" name="floor">
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


                                <div class="form-group">
                                    <h5><?php echo e(translate('Room count')); ?></h5>
                                   <input type="number" class="form-control form-control" name="room_count">
                                </div>

                                <?php
                                    $areas = json_decode($model_areas->areas);
                                ?>
                                <div class="sozdatImyaSpsok d-none">
                                    <h5><?php echo e(translate('Living area m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_housing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->housing ?? 0); ?>" name="Area[housing]">
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

                                
                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Hotel area m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_hotel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->hotel ?? 0); ?>" name="Area[hotel]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Bedroom area m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->bedroom ?? 0); ?>" name="Area[bedroom]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Area (Ground) m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->basement); ?>" name="Area[basement]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Area (Terrace) m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_terraca'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->terraca); ?>" name="Area[terraca]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Area (Attic) m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->attic); ?>" name="Area[attic]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Balcony m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_balcony'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->balcony); ?>" name="Area[balcony]">
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Total area m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['area_total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($areas->total); ?>" name="Area[total]">
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

                            <div class="col-sm-6">
                                <div class="sozdatImyaSpsok">
                                    <?php if(is_int($model->room_count)): ?>
                                        <h5><?php echo e(translate('Registry number')); ?></h5>
                                    <?php elseif($model->room_count == 'p'): ?>
                                        <h5><?php echo e(translate('Registry parking number')); ?></h5>
                                    <?php else: ?>
                                        <h5><?php echo e(translate('Registry commercial number')); ?></h5>
                                    <?php endif; ?>
                                    <input
                                        class="form-control <?php $__errorArgs = ['doc_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($model_areas->number_of_flat+1); ?>"
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
                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Price for 1m2')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['price'];
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Price for 1m2 (30%)')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['price_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($ares_price->thirty->total ?? 0.0); ?>" name="price_30">
                                    <span class="error-data">
                                        <?php $__errorArgs = ['price_30'];
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Price for 1m2 (50%)')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['price_50'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($ares_price->fifty->total ?? 0.0); ?>" name="price_50">
                                    <span class="error-data">
                                        <?php $__errorArgs = ['price_50'];
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

                                <div class="sozdatImyaSpsok">
                                    <h5><?php echo e(translate('Price for 1m2 (70%)')); ?></h5>
                                    <input
                                        class="form-control <?php $__errorArgs = ['price_70'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" value="<?php echo e($ares_price->seventy->total ?? 0.0); ?>" name="price_70">
                                    <span class="error-data">
                                        <?php $__errorArgs = ['price_70'];
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

                                <?php if($areas->basement > 0): ?>
                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Ground)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_basement'];
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Ground 30%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_basement_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->thirty->basement ?? 0.0); ?>"
                                            name="price_basement_30">
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Ground 50%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_basement_50'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->fifty->basement ?? 0.0); ?>"
                                            name="price_basement_50">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_basement_50'];
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

                                <?php if($areas->attic > 0): ?>
                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Attic)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_attic'];
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Attic 30%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_attic_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->thirty->attic ?? 0.0); ?>"
                                            name="price_attic_30">
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Attic 50%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_attic_50'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->fifty->attic ?? 0.0); ?>"
                                            name="price_attic_50">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_attic_50'];
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

                                <?php if($areas->terraca > 0): ?>
                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Terrace)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_terrace'];
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Terrace 30%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_terrace_30'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->thirty->terraca ?? 0.0); ?>"
                                            name="price_terrace_30">
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

                                    <div class="sozdatImyaSpsok">
                                        <h5><?php echo e(translate('Price for 1m2 (Terrace 50%)')); ?></h5>
                                        <input
                                            class="form-control <?php $__errorArgs = ['price_terrace_50'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" value="<?php echo e($ares_price->fifty->terraca ?? 0.0); ?>"
                                            name="price_terrace_50">
                                        <span class="error-data">
                                            <?php $__errorArgs = ['price_terrace_50'];
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
                            </div>
                            <div class="col-sm-6">
                                <br>
                                <input type="file" class="sozdatImyaSpisokSozdatButton1272 form-control" id="" name="files">        
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="sozdatImyaSpisokSozdatButton1272sozdat btn btn-success">
                            <?php echo e(translate('Save')); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                
          
<script>
    let page_name = 'house-flat';
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house-flat/add.blade.php ENDPATH**/ ?>