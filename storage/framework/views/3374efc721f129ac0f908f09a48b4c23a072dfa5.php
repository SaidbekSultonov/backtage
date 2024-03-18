<?php
    use Modules\ForTheBuilder\Entities\House;
?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .plus2{
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
                        <div class="col-md-12 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.house.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Create a new JK')); ?>

                            </h4>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="" action="<?php echo e(route('forthebuilder.house.new-basket-house')); ?>" method="POST"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Name of JK')); ?></label>
                                <input class="sozdatImyaSpisokInput form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="name" value="<?php echo e(old('name')); ?>">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['name'];
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

                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Number house')); ?></label>
                                <input class="sozdatImyaSpisokKorpus form-control"
                                    type="number" name="house_number" value="<?php echo e(old('house_number')); ?>">
                            </div>

                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Corpas')); ?></label>
                                <input class="sozdatImyaSpisokKorpus form-control <?php $__errorArgs = ['corpus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="corpus" value="<?php echo e(old('corpus')); ?>">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['corpus'];
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
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Object status')); ?></label>
                                <select
                                    class="form-control sozdatImyaSpisokSelectOption2 select4 <?php $__errorArgs = ['project_stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errpr-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="exampleFormControlSelect1" name="project_stage">
                                    <option value="<?php echo e(House::DESIGN); ?>"><?php echo e(translate('Design')); ?></option>
                                    <option value="<?php echo e(House::AT_THE_FOUNDATION_STAGE); ?>">
                                        <?php echo e(translate('At the foundation stage')); ?></option>
                                    <option value="<?php echo e(House::AT_THE_PRE_SALE_STAGE); ?>">
                                        <?php echo e(translate('At the pre-sale stage')); ?></option>
                                    <option value="<?php echo e(House::START_OF_OFFICIAL_SALES); ?>">
                                        <?php echo e(translate('Start of official sales')); ?></option>
                                    <option value="<?php echo e(House::STATUS_COMPLATED); ?>">
                                        <?php echo e(translate('Completed')); ?></option>
                                </select>
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['project_stage'];
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

                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Description of the object')); ?></label>
                                <input class="sozdatImyaSpisokInput form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="description" value="<?php echo e(old('description')); ?>">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['description'];
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
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatJkSpisokH3"><?php echo e(translate('Enterance count')); ?></label>
                                <input class="sozdatImyaSpisokKorpus houesCreateCalculateTotal form-control <?php $__errorArgs = ['entrance_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="number" value="<?php echo e(old('entrance_count')); ?>" name="entrance_count"
                                    id="entrance_count">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['entrance_count'];
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
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatJkSpisokH3"><?php echo e(translate('Floors')); ?></label>
                                <input class="sozdatImyaSpisokKorpus houesCreateCalculateTotal  form-control <?php $__errorArgs = ['floor_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="floor_count" value="<?php echo e(old('floor_count')); ?>" id="floor_count">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['floor_count'];
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
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatJkSpisokH3"><?php echo e(translate('Number of apartments on one floor')); ?></label>
                                <input class="form-control sozdatImyaSpisokKorpus houesCreateCalculateTotal marginRightSozdatJkKolichistva <?php $__errorArgs = ['entrance_one_floor_count'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="entrance_one_floor_count" value="<?php echo e(old('entrance_one_floor_count')); ?>" id="entrance_one_floor_count">
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['entrance_one_floor_count'];
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
                            <div class="col-sm-4 mb-2">
                                <label class="form-label sozdatJkSpisokH3"><?php echo e(translate('Total apartments')); ?></label>
                                <input class="form-control sozdatImyaSpisokKorpus <?php $__errorArgs = ['total_flat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="number" name="total_flat" value="<?php echo e(old('total_flat')); ?>" id="total_flat" readonly>
                                <span class="error-data invalid-feedback">
                                    <?php $__errorArgs = ['total_flat'];
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

                            <div class="col-sm-4 mb-2">
                                <label for="type_name"><?php echo e(translate('Type')); ?></label>
                                <input type="text" id="type_name" class="form-control" name="type_name">
                            </div>

                            <div class="col-sm-2">
                                <br>
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input <?php $__errorArgs = ['has_basement'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" <?php echo e(old('has_basement') ? 'checked="checked"' : ''); ?> type="checkbox" value="" id="customckeck1" name="has_basement">
                                    <label class="form-check-label sozdatJkSpisokH3" for="customckeck1"><?php echo e(translate('Add basement')); ?>

                                    </label>
                                    <div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['has_basement'];
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

                            <div class="col-sm-2">
                                <br>
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input <?php $__errorArgs = ['has_attic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"<?php echo e(old('has_attic') ? 'checked="checked"' : ''); ?> type="checkbox" value="" id="customckeck2" name="has_attic">
                                    <label class="form-check-label sozdatJkSpisokH3" for="customckeck2">
                                        <?php echo e(translate('Add attic')); ?>

                                    </label>
                                    <div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['has_attic'];
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

                            <div class="col-sm-12">
                                <br>
                                <button type="submit" class="btn btn-outline-success sozdatImyaSpisokSozdatButton">
                                    <?php echo e(translate('Further')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/create.blade.php ENDPATH**/ ?>