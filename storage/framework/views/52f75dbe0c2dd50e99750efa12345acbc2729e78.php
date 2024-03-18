<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\HouseFlat;
?>
<?php $__env->startSection('title'); ?> <?php echo e(translate('JK')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .sozdatJkData {
        height: auto !important;
    }
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
                            <a href="<?php echo e(route('forthebuilder.deal.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Sale')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="deal-create-form" action="<?php echo e(route('forthebuilder.deal.store')); ?>" method="POST"enctype="multipart/form-data"> <?php echo csrf_field(); ?> <?php echo method_field("POST"); ?>
                        <input type="hidden" name="not_contract" class="not_contract" value="0">
                        <input type="hidden" name="model_deal_id" id="deal_id">
                        <input type="hidden" name="model_personal_id" id="personal_id">
                        <input type="hidden" name="model_budget" class="modalMiniCapsule text-left" id="budget_input">
                        <input type="hidden" name="model_looking_for" class="modalMiniCapsule2 text-left" id="looking_for_input">
                        <input type="hidden" name="model_house_id" id="model_house_id" value="<?php echo e($house_flat->house_id); ?>">
                        <input type="hidden" name="model_house_flat_id" id="model_house_flat_id" value="<?php echo e($house_flat->id); ?>">
                        <input type="hidden" name="model_client_id" id="model_client_id">
                        <input type="hidden" name="model_type" id="model_type" value="3">



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="p-2 border rounded bg-light">
                                    <h4 class="prodnoDataH5Text"><?php echo e(translate('Description of the object')); ?></h4>
                                    <hr class="my-1">
                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(translate('jk')); ?></label>
                                        <select data-width="100%" class="form-control mb-3 sozdatImyaSpisokSelectOptionJkProdno deal_create_house_id <?php $__errorArgs = ['house_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            readonly id="exampleFormControlSelect1" name="house_id">
                                            <?php if(!empty($houses)): ?>
                                                <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(isset(request()->house_id) && $house->id == request()->house_id): ?>
                                                        <option value="<?php echo e($house->id); ?>">
                                                            <?php echo e($house->name); ?> <?php echo e($house->description); ?>

                                                        </option>
                                                    <?php elseif($house_flat->id): ?>
                                                        <option value="<?php echo e($house->id); ?>" <?php echo e($house_flat->house_id == $house->id? "selected" :''); ?>>
                                                            <?php echo e($house->name); ?> <?php echo e($house->description); ?>

                                                        </option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['house_id'];
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
                                        <label class="form-label"><?php echo e(translate('Apartment No.')); ?></label>
                                        <?php if(isset(request()->house_flat_number )): ?>
                                            <input type="text" name="house_flat_number"
                                                class="form-control mb-3 sozdatImyaSpisokSelectOptionJkProdno"
                                                value="<?php echo e(request()->house_flat_number); ?>">
                                        <?php elseif($house_flat != 'NUll'): ?>
                                            <input type="text" name="house_flat_number"
                                               class="form-control mb-3 sozdatImyaSpisokSelectOptionJkProdno"
                                               value="<?php echo e($house_flat->number_of_flat); ?>">
                                        <?php endif; ?>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['house_flat_number'];
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
                                        <label class="form-label"><?php echo e(translate('description')); ?></label>
                                        <input type="text" name="description"
                                            class="sozdatImyaSpisokInputProdnoBig mb-3 form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="description"
                                            placeholder="<?php echo e(translate('Brief description of the residential complex')); ?>"
                                            value="<?php echo e(old('description')); ?>">
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

                                    <div class="row">
                                        <div class="col form-group">
                                            <label class="form-label"><?php echo e(translate('Contract number')); ?></label>
                                            <input type="text" name="agreement_number"
                                                class="form-control sozdatImyaSpisokSelectOptionJkProdno <?php $__errorArgs = ['agreement_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <span class="error-data invalid-feedback">
                                                <?php $__errorArgs = ['agreement_number'];
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

                                        <div class="col form-group">
                                            <label class="form-label"><?php echo e(translate('date')); ?></label>
                                            <input id="dateInput" value="<?php echo e(date('d.m.Y')); ?>" type="text" name="date_deal" class="date_picker form-control sozdatImyaSpisokSelectOptionJkProdnoDate <?php $__errorArgs = ['date_deal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                value="<?php echo e(old('date_deal')); ?>" autocomplete="off">
                                            <span class="error-data invalid-feedback">
                                                <?php $__errorArgs = ['date_deal'];
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

                                <div class="p-2 border rounded mt-3 bg-light">
                                    <h4><?php echo e(translate('Passport data of the client')); ?></h4>
                                    <hr class="my-1">
                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('First name')); ?></label>
                                            <input class="sozdatImyaSpisokInputProdnoBig form-control keyUpName booking-first_name <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   type="text" name="first_name" value="<?php echo e($clients != 'NULL'?$clients->first_name:'', old('first_name')); ?>">
                                        <div class="keyUpNameResult d-none bg-white">
                                        </div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['first_name'];
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

                                    <input type="hidden" name="client_id" class="booking-client_id" id="" value="<?php echo e($clients != 'NULL'?$clients->id:''); ?>">
                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Last name')); ?></label>
                                        <input class="sozdatImyaSpisokInputProdnoBig keyUpName form-control booking-last_name <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" name="last_name" value="<?php echo e($clients != 'NULL'?$clients->last_name:'', old('last_name')); ?>">
                                        <div class="keyUpNameResult d-none bg-secondary">
                                        </div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['last_name'];
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

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Middle name')); ?></label>
                                        <input class="sozdatImyaSpisokInputProdnoBig keyUpName booking-middle_name form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" name="middle_name" value="<?php echo e($clients != 'NULL'?$clients->middle_name:'', old('middle_name')); ?>">
                                        <div class="keyUpNameResult d-none bg-secondary">
                                        </div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['middle_name'];
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
                                        <label class="form-label"><?php echo e(translate('Gender')); ?></label>
                                        <select class="form-control house_select2 sozdatImyaSpisokSelectOptionJkProdno"
                                            id="exampleFormControlSelect1" name="gender">
                                            <?php if($clients != 'NULL'): ?>
                                                <option value="1" <?php echo e($clients->gender == 1 ?? "selected"); ?>><?php echo e(translate('Man')); ?></option>
                                                <option value="0" <?php echo e($clients->gender == 0 ?? "selected"); ?>><?php echo e(translate('Woman')); ?></option>
                                            <?php else: ?>
                                                <option value="1"><?php echo e(translate('Man')); ?></option>
                                                <option value="0"><?php echo e(translate('Woman')); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label">
                                            <?php echo e(translate('Birth date')); ?></label>
                                        <input placeholder="<?php echo e(date('d.m.Y')); ?>"
                                            class="date_picker sozdatImyaSpisokInputProdnoBig form-control <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($clients != 'NULL' ? $clients->birth_date : '', old('birth_date')); ?>" type="text" name="birth_date" id="birth_date" autocomplete="off">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['birth_date'];
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

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Serial number of the passport')); ?></label>
                                        <input
                                            class="sozdatImyaSpisokInputProdnoBig keyUpName booking-series_number form-control <?php $__errorArgs = ['series_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            type="text" name="series_number" id="series_number" value="<?php echo e($clients != 'NULL'?$clients->informations->series_number:'', old('series_number')); ?>">
                                        <div class="keyUpNameResult d-none bg-secondary">
                                        </div>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['series_number'];
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

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label">
                                            <?php echo e(translate('Issued by (Date of issue and expiration date)')); ?></label>
                                        <input placeholder="<?php echo e(date('d.m.Y')); ?>"
                                            class="date_picker sozdatImyaSpisokInputProdnoBig booking-given_date form-control <?php $__errorArgs = ['given_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($clients != 'NULL'?$clients->informations->given_date:'', old('given_date')); ?>" type="text" name="given_date" id="given_date" autocomplete="off">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['given_date'];
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

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label">
                                            <?php echo e(translate('Issued by')); ?></label>
                                        <input
                                            class="sozdatImyaSpisokInputProdnoBig booking-issued_by form-control <?php $__errorArgs = ['issued_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($clients != 'NULL'?$clients->informations->issued_by:'', old('issued_by')); ?>" type="text" name="issued_by" id="issued_by">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['issued_by'];
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

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Registration by passport')); ?></label>
                                        <input class="sozdatImyaSpisokInputProdnoBig booking-issued_by form-control <?php $__errorArgs = ['live_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($clients != 'NULL'?$clients->informations->live_address:'', old('live_address')); ?>" type="text" name="live_address"
                                            id="live_address">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['live_address'];
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
                                        <label class="form-label"><?php echo e(translate('PINFL or TIN')); ?></label>
                                        <input class="form-control sozdatImyaSpisokInputProdnoBig booking-inn <?php $__errorArgs = ['inn'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e($clients != 'NULL'?$clients->informations->inn:'', old('inn')); ?>" type="text" name="inn" id="inn">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['inn'];
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
                                
                                <div class="p-2 border rounded mt-3 bg-light">
                                    <h4><?php echo e(translate('Contact details')); ?></h4>
                                    <hr class="my-1">

                                    <div class="sozdatImyaSpsok mb-3">
                                        <label class="form-label"><?php echo e(translate('Phone number')); ?></label>

                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"
                                                    alt="Region">
                                            </div>
                                            
                                            <input placeholder="+998" class="form-control keyUpName booking-phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                type="tel" id="phone" name="phone_number"
                                                value="<?php echo e($clients != 'NULL'?$clients->phone_number:'', old('phone_number')); ?>">
                                                <span class="error-data invalid-feedback">
                                                    <?php $__errorArgs = ['phone_number'];
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

                                    <div class="sozdatImyaSpsok">
                                        <label class="form-label">
                                            <?php echo e(translate('Additional phone number')); ?>

                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"
                                                    alt="Region">
                                            </div>
                                            <input placeholder="+998" class="form-control keyUpName booking-additional_phone <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="tel" id="phone" name="additional_phone" value="<?php echo e($clients != 'NULL'?$clients->additional_phone:'', old('additional_phone')); ?>">
                                        </div>
                                    </div>

                                    <div class="sozdatImyaSpsok my-3">
                                        <label class="form-label"><?php echo e(translate('Email address')); ?></label>
                                        <input
                                            class="sozdatImyaSpisokInputProdnoBig booking-email form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            value="<?php echo e(old('email')); ?>" type="email" name="email" id="email">
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['email'];
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

                                    <label class="form-label" for="file_house"><?php echo e(translate('Attach file')); ?></label>
                                    <input id="file_house" class="form-control" type="file" name="files">
                                        
                                </div>
                            </div>

                            <div class="col-sm-6 prodnoRightImportData">
                                
                                <div class="p-2 border rounded bg-light">
                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(translate('Registry number')); ?></label>
                                        <select
                                            class="form-control sozdatImyaSpisokSelectOptionJkProdno deal_create_registry_number <?php $__errorArgs = ['house_flat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="exampleFormControlSelect1" name="house_flat_id" readonly>
                                            <?php if(isset($house_flat->id)): ?>
                                                <option value="<?php echo e($house_flat->id); ?>" <?php echo e($house_flat->id?"selected":''); ?>>
                                                    <?php echo e(request()->house_flat_number ?? $house_flat->id); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e(request()->house_flat_id??''); ?>">
                                                <?php echo e(request()->house_flat_number??''); ?></option>

                                            <?php endif; ?>
                                        </select>
                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['house_flat_id'];
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
                                    <input type="hidden" name="doc_number"
                                        value="<?php echo e(request()->house_flat_number ?? ''); ?>">

                                    <div class="form-group mb-3">
                                        <label class="form-label"><?php echo e(translate('price')); ?></label>
                                        <?php if(isset($house_flat->id)): ?>
                                            <input type="text" name="price_sell"
                                                   class="form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePrice <?php $__errorArgs = ['price_sell'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e($house_flat->price ?? old('price_sell')); ?>" step="0.01"
                                                   min="0" original-price="<?php echo e($house_flat->price ?? old('price_sell')); ?>">
                                        <?php else: ?>
                                            <input type="text" name="price_sell"
                                                   class="form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePrice <?php $__errorArgs = ['price_sell'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   value="<?php echo e(request()->flat_price ?? old('price_sell')); ?>" step="0.01"
                                                   min="0" original-price="<?php echo e(request()->flat_price ?? old('price_sell')); ?>">
                                        <?php endif; ?>

                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['price_sell'];
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
                                        <label class="form-label"><?php echo e(translate('Price in words')); ?></label>
                                        <input type="text" name="price_sell_word" class="form-control sozdatImyaSpisokSelectOptionJkProdno <?php $__errorArgs = ['price_sell_word'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('price_sell_word')); ?>">

                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['price_sell'];
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
                                        <label class="form-label"><?php echo e(translate('Price m2')); ?></label>
                                        <input type="text" name="price_sell_m2" class="form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePriceM2 <?php $__errorArgs = ['price_sell_m2'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(request()->price_m2 ?? old('price_sell_m2')); ?>" step="0.01" min="0" original-price="<?php echo e(request()->price_m2 ?? old('price_sell_m2')); ?>">

                                        <span class="error-data invalid-feedback">
                                            <?php $__errorArgs = ['price_sell'];
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
                                        <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Coupon')); ?></label>
                                        <input class="form-control sozdatImyaSpisokInput" type="text"
                                            name="coupon" autocomplete="off" id="coupon-in-deal" value="">
                                        <span id="applied text-success"></span>
                                        <input type="hidden" name="coupon_percent" id="coupon_percent">
                                        <button class="calculate_coupon_price d-none"><?php echo e(translate('Calculate Coupon Price')); ?></button>
                                    </div>
                                </div>

                                <div class="p-2 border rounded mt-3 bg-light">
                                    
                                    <div class="form-check form-check-primary">
                                        <input class="form-check-input" name="is_installment" type="checkbox" id="customckeck1_house">
                                        <label class="form-check-label" for="customckeck1_house">
                                            <?php echo e(translate('Installment plan')); ?>

                                        </label>
                                    </div>
                                    <span class="error-data invalid-feedback">
                                        <?php $__errorArgs = ['is_installment'];
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
                                    

                                    
                                    <div id="noneDownDrop" class="noneDropDown d-none">
                                        
                                        <div class="polniy_DropDown my-3">
                                            <label class="form-label sozdatImyaDropDowno">
                                                <?php echo e(translate('Installment period')); ?>

                                            </label>
                                            <select class="form-control sozdatImyaSpisokDropDown selectPeriod"
                                                id="exampleFormControlSelect1" name="period">
                                                <option value=" "> </option>
                                                <?php if(empty(!$installmentPlan)): ?>
                                                    <?php $__currentLoopData = $installmentPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($val->status == 1): ?>
                                                            <option value="<?php echo e($val->id); ?>"
                                                            data-percent="<?php echo e($val->percent_type); ?>"><?php echo e($val->period); ?>

                                                            <?php echo e(translate('month')); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="polniy_DropDown mb-3">
                                            <label class="form-label"><?php echo e(translate('Installment percent')); ?>

                                            </label>
                                            <select class="form-control sozdatImyaSpisokDropDown selectPercent"
                                                id="exampleFormControlSelect1" name="percent">
                                                <option value=" "> </option>
                                                <?php if(empty(!$installmentPlan)): ?>
                                                    <?php $__currentLoopData = $installmentPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($val->status == 2): ?>
                                                            <option value="<?php echo e($val->id); ?>"
                                                                data-percent="<?php echo e($val->percent_type); ?>">
                                                                <?php echo e($val->percent_type); ?> %
                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="polniy_DropDown mb-3">
                                            <label class="sozdatImyaDropDowno">
                                                <?php echo e(translate('An initial fee')); ?>

                                            </label>
                                            <input class="form-control sozdatImyaSpisokDropDown initialFeeDeal"
                                                type="text" name="initial_fee">
                                            <span class="error-data invalid-feedback">
                                                <?php $__errorArgs = ['initial_fee'];
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

                                        <div class="polniy_DropDown">
                                            <label class="form-label"><?php echo e(translate('Installment start date')); ?>

                                            </label>
                                            <input id="dateInput3" class="date_picker form-control sozdatImyaSpisokDropDown"
                                                type="text" name="installment_date" value="<?php echo e(date('d.m.Y')); ?>" autocomplete="off">
                                            <span class="error-data invalid-feedback">
                                                <?php $__errorArgs = ['installment_date'];
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
                            </div>

                            <div class="displayNoneProdno d-none">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(translate('Contract number')); ?></label>
                                    <input type="text" class="form-control sozdatImyaSpisokSelectOptionJkProdno" name="contract_number">
                                </div>

                                <div class="form-group">
                                    <label class="form-label"><?php echo e(translate('Date')); ?></label>
                                    <input id="dateInput" placeholder="<?php echo e(date('d.m.Y')); ?>" type="date"
                                        class="form-control sozdatImyaSpisokSelectOptionJkProdnoDate" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-sm12 mt-3">
                                <button type="button" class="btn btn-outline-success sozdatImyaSpisokSozdatButtonSave saveDealDogovor">
                                    <?php echo e(translate('Save')); ?>

                                </button> 
                                 <button type="submit" class="text-light submit_form_save" style="opacity: 0;"><?php echo e(translate('Save')); ?></button>   
                            </div>
                            
                        </div>
                    </form>         
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalSave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body text-center">
        <h4><?php echo e(translate('Print the contract now?')); ?></h4>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-secondary px-3 not_now" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
        <button type="button" class="btn btn-primary px-3 yes_now" data-dismiss="modal"><?php echo e(translate('Yes')); ?></button>
      </div>
    </div>
  </div>
</div>
            
<script>
    $(document).ready(function(){
        $('.date_picker').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        }); 
        $('.booking-phone').mask('+999 (99) 999 99 99')   
        $('.booking-additional_phone').mask('+999 (99) 999 99 99')   

        $('.house_select2').select2()   
        $('#exampleFormControlSelect1').select2()   
        $('.sozdatImyaSpisokSelectOptionJkProdno').select2()   
        $('.selectPeriod').select2()   
        $('.selectPercent').select2()   
    })
    
    let page_name = 'deal';
    let budget_input = document.getElementById('budget_input')
    let looking_for_input = document.getElementById('looking_for_input')
    let series_number = document.getElementById('series_number')
    let live_address = document.getElementById('live_address')
    let inn = document.getElementById('inn')
    let model_house_id = document.getElementById('model_house_id')
    let model_house_flat_id = document.getElementById('model_house_flat_id')
    let deal_id = document.getElementById('deal_id')
    let personal_id = document.getElementById('personal_id')

    if (localStorage.getItem('model_budget') != null) {
        budget_input.value = localStorage.getItem('model_budget')
    }
    if (localStorage.getItem('model_looking_for') != null) {
        looking_for_input.value = localStorage.getItem('model_looking_for')
    }
    if (localStorage.getItem('model_series_number') != null) {
        series_number.value = localStorage.getItem('model_series_number')
    }
    if (localStorage.getItem('model_issued_by') != null) {
        live_address.value = localStorage.getItem('model_issued_by')
    }
    if (localStorage.getItem('model_inn') != null) {
        inn.value = localStorage.getItem('model_inn')
    }
    if (localStorage.getItem('model_deal_id') != null) {
        deal_id.value = localStorage.getItem('model_deal_id')
    }
    if (localStorage.getItem('model_personal_id') != null) {
        personal_id.value = localStorage.getItem('model_personal_id')
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/deal/create.blade.php ENDPATH**/ ?>