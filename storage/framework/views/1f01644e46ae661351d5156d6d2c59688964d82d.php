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

                    <?php if(Session::has('message')): ?>
                        <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                    <?php else: ?>
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

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group mb-3">
                                                    <label class="form-label"><?php echo e(translate('jk')); ?></label>
                                                    <input type="text" class="form-control" readonly value="<?php echo e($house_flat->house->name); ?>">
                                                    <input type="hidden" readonly value="<?php echo e($house_flat->house_id); ?>" name="house_id">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label"><?php echo e(translate('Apartment No.')); ?></label>
                                                    <?php if(isset(request()->house_flat_number )): ?>
                                                        <input type="text" name="house_flat_number" readonly 
                                                            class="form-control mb-3 sozdatImyaSpisokSelectOptionJkProdno"
                                                            value="<?php echo e(request()->house_flat_number); ?>">
                                                    <?php elseif($house_flat != 'NUll'): ?>
                                                        <input type="text" name="house_flat_number" readonly 
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
                                            </div>
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
                                                value="">
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
unset($__errorArgs, $__bag); ?>" value="<?php echo e($new_contract_number); ?>">
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
                                                    value="" autocomplete="off">
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
                                                type="text" name="last_name" value="<?php echo e($client_last_name); ?>" <?php echo e(((isset($clients->id) && $clients != NULL) ? 'readonly' : '')); ?>>
                                            <div class="keyUpNameResult d-none bg-white">
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
                                            <label class="form-label"><?php echo e(translate('First name')); ?></label>
                                                <input class="sozdatImyaSpisokInputProdnoBig form-control keyUpName booking-first_name <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                       type="text" name="first_name" value="<?php echo e($client_first_name); ?>" <?php echo e(((isset($clients->id) && $clients != NULL) ? 'readonly' : '')); ?>>
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
                                                type="text" name="middle_name" value="<?php echo e($client_middle_name); ?>" <?php echo e(((isset($clients->id) && $clients != NULL) ? 'readonly' : '')); ?>>
                                            <div class="keyUpNameResult d-none bg-white">
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
                                                type="text" name="series_number" id="series_number" value="<?php echo e($client_passport_series); ?>"  <?php echo e(((isset($clients->id) && $clients != NULL) ? 'readonly' : '')); ?> autocomplete="off">
                                            <div class="keyUpNameResult d-none bg-white">
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
                                                value="<?php echo e($client_given_date); ?>" type="text" name="given_date" id="given_date" autocomplete="off">
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
                                                value="<?php echo e($client_issued_by); ?>" type="text" name="issued_by" id="issued_by">
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
                                                value="<?php echo e($client_address); ?>" type="text" name="live_address"
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
                                                value="<?php echo e($client_inn); ?>" type="text" name="inn" id="inn">
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
                                    
                                    
                                    <?php if($domain == 'businesshouse.icstroy.com'): ?>
                                        <div class="p-2 border rounded mt-3 bg-light">
                                            <h4><?php echo e(translate('Deal currency')); ?></h4>
                                            <hr class="my-1">
                                            <div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio1" name="currency" class="form-check-input" checked value="sum">
                                                    <label class="form-check-label" for="customRadio1"><?php echo e(translate('On sums')); ?></label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" id="customRadio2" name="currency" class="form-check-input" value="dollar">
                                                    <label class="form-check-label" for="customRadio2"><?php echo e(translate('On dollars')); ?></label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="p-2 border rounded mt-3 bg-light">
                                        <h4><?php echo e(translate('Contact details')); ?></h4>
                                        <hr class="my-1">

                                        <div class="sozdatImyaSpsok mb-3">
                                            <label class="form-label"><?php echo e(translate('Phone number')); ?></label>

                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <?php if($domain == 'businesshouse.icstroy.com'): ?>
                                                        <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/kirgiz.jpg')); ?>"alt="kirgiz">
                                                    <?php else: ?>
                                                        <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"alt="Region">

                                                        <span class="ms-2">+998</span>
                                                         
                                                    <?php endif; ?>
                                                </div>
                                                
                                                <input placeholder="<?php echo e((($domain == 'businesshouse.icstroy.com') ? '+996' : '(99) 999 99 99')); ?>" class="form-control keyUpName booking-phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    type="tel" id="phone" name="phone_number"
                                                    value="<?php echo e($client_phone); ?>">
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
                                                    <?php if($domain == 'businesshouse.icstroy.com'): ?>
                                                        <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/kirgiz.jpg')); ?>"alt="kirgiz">
                                                    <?php else: ?>
                                                        <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"alt="Region">
                                                        <span class="ms-2">+998</span>
                                                    <?php endif; ?>
                                                </div>
                                                <input placeholder="<?php echo e((($domain == 'businesshouse.icstroy.com') ? '+996' : '(99) 999 99 99')); ?>" class="form-control keyUpName booking-additional_phone <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="tel" id="phone" name="additional_phone" value="">
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
                                                value="<?php echo e($client_add_phone); ?>" type="email" name="email" id="email">
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
                                
                                        <h4><?php echo e(translate('Details of the object')); ?></h4>
                                        <hr class="my-1">
                                        
                                        <input type="hidden" name="doc_number"
                                            value="<?php echo e(request()->house_flat_number ?? ''); ?>">

                                        <div class="form-group mb-3">
                                            <label class="form-label"><?php echo e(translate('price')); ?></label>
                                            <?php if(isset($house_flat->id)): ?>
                                                <input type="number" name="price_sell" id="price_sell"
                                                       class="price_sell form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePrice <?php $__errorArgs = ['price_sell'];
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
                                                <input type="number" name="price_sell" id="price_sell"
                                                       class="price_sell form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePrice <?php $__errorArgs = ['price_sell'];
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
                                            <input type="text" id="price_sell_word" name="price_sell_word" class="form-control sozdatImyaSpisokSelectOptionJkProdno <?php $__errorArgs = ['price_sell_word'];
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
                                            <input type="number" name="price_sell_m2" id="price_sell_m2" class="price_sell_m2 form-control sozdatImyaSpisokSelectOptionJkProdno dealCreatePriceM2 <?php $__errorArgs = ['price_sell_m2'];
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

                                        <div class="polniy_DropDown mb-3">
                                            <label class="sozdatImyaDropDowno">
                                                <?php echo e(translate('Price m2 in words')); ?>

                                            </label>
                                            <input class="form-control" id="price_sell_m2_words" type="text" name="price_sell_m2_words">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="form-label sozdatImyaSpisokH3"><?php echo e(translate('Discount')); ?></label>
                                            <input class="form-control" type="number" name="discount" autocomplete="off" id="discount">
                                            
                                        </div>

                                        
                                    </div>

                                    

                                    <div class="p-2 border rounded mt-3 bg-light">
                                        
                                        <div class="form-check form-check-primary">
                                            <input class="form-check-input" name="is_installment" type="checkbox" id="customckeck1_house" value="1">
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
                                                <input type="hidden" name="period" id="org_period">
                                                <select class="form-control sozdatImyaSpisokDropDown selectPeriod"
                                                    id="period"  data-placeholder="<?php echo e(translate('Choose period')); ?>">
                                                    <option value=""></option>
                                                    <?php if(empty(!$installmentPlan)): ?>
                                                        <?php $__currentLoopData = $installmentPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($val->status == 1): ?>
                                                                <option data-id="<?php echo e($val->period); ?>" value="<?php echo e($val->id); ?>"
                                                                data-percent="<?php echo e($val->period); ?>"><?php echo e($val->period); ?>

                                                                <?php echo e(translate('month')); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                                <span class="error-data invalid-feedback" id="period_error">
                                                    <?php echo e(translate('Period  is required')); ?>

                                                </span>
                                            </div>

                                            <div class="polniy_DropDown mb-3">
                                                <label class="form-label"><?php echo e(translate('Installment percent')); ?>

                                                </label>
                                                <input type="hidden" name="percent" id="org_percent">
                                                <select class="form-control sozdatImyaSpisokDropDown selectPercent"
                                                    id="percent"  data-placeholder="<?php echo e(translate('Choose percent')); ?>">
                                                    <option value=""></option>
                                                    <?php if(empty(!$installmentPlan)): ?>
                                                        <?php $__currentLoopData = $installmentPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($val->status == 2 && $val->percent_type <= 70): ?>
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
                                                <input class="form-control sozdatImyaSpisokDropDown initialFeeDeal" id="initial_fee" 
                                                    type="number" name="initial_fee">
                                                <input type="hidden" name="keyup_fee" value="0" id="keyup_fee">
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
                                                <span class="error-data invalid-feedback" id="initial_fee_error">
                                                    <?php echo e(translate('The initial fee should not exceed 70% of the price sell!')); ?>

                                                </span>
                                            </div>

                                            <div class="polniy_DropDown mb-3">
                                                <label class="sozdatImyaDropDowno">
                                                    <?php echo e(translate('Initial fee in words')); ?>

                                                </label>
                                                <input class="form-control sozdatImyaSpisokDropDown"
                                                    type="text" name="initial_fee_words" id="initial_fee_words">
                                            </div>

                                            <div class="polniy_DropDown mb-3">
                                                <label class="sozdatImyaDropDowno">
                                                    <?php echo e(translate('Discount for initial fee')); ?>

                                                </label>
                                                <input class="form-control sozdatImyaSpisokDropDown"
                                                    type="number" name="initial_fee_discount" id="initial_fee_discount">
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

                                    <div class="p-2 border rounded bg-light mt-3">
                                        <div class="polniy_DropDown mb-3">
                                            <label class="sozdatImyaDropDowno">
                                                <?php echo e(translate('Total amount with discount')); ?>

                                            </label>
                                            <input class="form-control" type="text" type="number" id="discount_sum">
                                        </div>

                                        <div class="polniy_DropDown">
                                            <label class="sozdatImyaDropDowno">
                                                <?php echo e(translate('Total amount in words with discount')); ?>

                                            </label>
                                            <input class="form-control" type="text" name="discount_sum_words" id="discount_sum_words">
                                        </div>
                                    </div>


                                    
                                    <div class="p-2 border rounded mt-3 bg-light">
                                        
                                        <div class="form-check form-check-primary">
                                            <input class="form-check-input" name="is_installment" type="checkbox" id="customckeck1_house2">
                                            <label class="form-check-label" for="customckeck1_house2">
                                                <?php echo e(translate('Companies')); ?>

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

                                        
                                        <div id="noneDownDrop2" class="noneDropDown d-none">
                                            <div class="polniy_DropDown my-3">
                                                <select class="form-control sozdatImyaSpisokDropDown"
                                                    id="period2" name="company" data-placeholder="<?php echo e(translate('Choose company')); ?>">
                                                    <option value=""></option>
                                                    <?php if(empty(!$company_details)): ?>
                                                        <?php $__currentLoopData = $company_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($val->status == 1): ?>
                                                                <option value="<?php echo e($val->id); ?>">
                                                                <?php echo e($val->name); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
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
                            
                            <select
                                    class="form-control sozdatImyaSpisokSelectOptionJkProdno deal_create_registry_number <?php $__errorArgs = ['house_flat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                     name="house_flat_id" readonly style="opacity: 0">
                                    <?php if(isset($house_flat->id)): ?>
                                        <option value="<?php echo e($house_flat->id); ?>" <?php echo e($house_flat->id?"selected":''); ?>>
                                            <?php echo e(request()->house_flat_number ?? $house_flat->id); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e(request()->house_flat_id??''); ?>">
                                        <?php echo e(request()->house_flat_number??''); ?></option>

                                    <?php endif; ?>
                                </select>
                        </form>         
                    <?php endif; ?>

                    
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



<div id="domain" data-domain="<?php echo e($domain); ?>"></div>    
<div id="total" data-total="<?php echo e($total_m2); ?>"></div> 

<button style="opacity: 0;" id="button_price_sell_m2" onclick="doConvert(document.getElementById('price_sell_m2_words'), document.getElementById('price_sell_m2').value)"></button>

<button style="opacity: 0;" id="button_price_sell" onclick="doConvert(document.getElementById('price_sell_word'), document.getElementById('price_sell').value)"></button>

<button style="opacity: 0;" id="button_discount" onclick="doConvert(document.getElementById('discount_sum_words'), document.getElementById('discount_sum').value)"></button>

<button style="opacity: 0;" id="button_initial" onclick="doConvert(document.getElementById('initial_fee_words'), document.getElementById('initial_fee').value)"></button>   
<script>
    $(document).ready(function(){
        $('.date_picker').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        }); 

        if($('#domain').attr('data-domain') == 'businesshouse.icstroy.com'){
            $('.booking-phone').mask('+999 (999) 99 99 99')   
            $('.booking-additional_phone').mask('+999 (999) 99 99 99')
        }
        else{
            $('.booking-phone').mask('(99) 999 99 99')   
            $('.booking-additional_phone').mask('(99) 999 99 99')   
        }
        $('#birth_date').mask('99.99.9999')   
        $('#given_date').mask('99.99.9999')   
        $('#dateInput3').mask('99.99.9999')   
        $('#dateInput').mask('99.99.9999')   

        $('#gender').select2()   
        $('#exampleFormControlSelect1').select2()   
        $('#exampleFormControlSelect12').select2()   
        $('#gender').select2()   
        $('#period').select2({
            tags: true
        })   
        $('#period2').select2()   
        $('#percent').select2({
            tags: true,
        })   
         
        $('#period').on('select2:selecting', function(e) {
            var period = e.params.args.data.text;
            if (period != '') {
                $('#org_period').val(parseInt(period))

            }
        });

        $('#percent').on('select2:selecting', function(e) {
            var percent = e.params.args.data.text;
            var period = $('#org_period').val();
            if (percent != '') {
                $('#org_percent').val(parseInt(percent))



                percent = parseFloat($('#org_percent').val())

                var initial_fee_discount = $('#initial_fee_discount').val()
                var price_sell = $('.price_sell').val()

                if (price_sell != '') {
                    price_sell = parseFloat(price_sell)
                }
                var initialFeeDeal = price_sell-(price_sell-((price_sell/100)*percent))


                if (initial_fee_discount != '' && initialFeeDeal != '') {
                
                    initial_fee_discount = parseFloat(initial_fee_discount)
                    initialFeeDeal = parseFloat(initialFeeDeal)

                    var result33 = initialFeeDeal - ((initialFeeDeal/100)*initial_fee_discount)
                    
                    $('.initialFeeDeal').val(result33)

                    // (result33.toFixed(2))
                }else if(percent == 0){
                    var result66 = price_sell/period
                    $('.initialFeeDeal').val(result66)
                }
                else{
                    
                    $('.initialFeeDeal').val(initialFeeDeal)
                }

                $('#button_initial').trigger('click')
            }
        });
        
        $('.initialFeeDeal').on('keyup',function(){
            
            $('.add_op').remove()
            var initial_sum = $(this).val()

            if (initial_sum > 0) {
                var dealCreatePrice = $('.dealCreatePrice').val()
                var one_percent = dealCreatePrice/100;
                var percent = initial_sum/one_percent;
                $('#keyup_fee').val(1)
            }
            else{
                $('#keyup_fee').val(0)   
            }
            $(".selectPercent :not([value])").remove()
            
            if(percent){
                if(percent <= 70){
                    $('#initial_fee_error').css('display','none')
                    $('.initialFeeDeal').css('border-color','#CED4DA')
                    // percent = Math.ceil(percent);
                    percent = percent


                    $(".selectPercent").append(`
                        <option class="add_op" selected data-percent="${percent}" value="${percent}">${percent.toFixed(2)} %</option>
                    `);
                    $('#org_percent').val(percent)
                }
                else{
                    $('.initialFeeDeal').css('border-color','red')
                    $('.initialFeeDeal').val('')
                    $('#initial_fee_error').css('display','block')
                }

                
            }            
        })

        

        // $(document).on('keypress', '.select2-search__field', function () {
            // $(this).val($(this).val().replace(/[^\d].+/, ""));
            // if ((event.which < 48 || event.which > 57)) {
            //   event.preventDefault();
            // }
        // }); 

        // $(document).on('keypress', '.initialFeeDeal', function () {
        //     $(this).val($(this).val().replace(/[^\d].+/, ""));
        //     if ((event.which < 48 || event.which > 57)) {
        //       event.preventDefault();
        //     }
        // }); 


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
    // if (localStorage.getItem('model_series_number') != null) {
    //     series_number.value = localStorage.getItem('model_series_number')
    // }
    // if (localStorage.getItem('model_issued_by') != null) {
    //     live_address.value = localStorage.getItem('model_issued_by')
    // }
    // if (localStorage.getItem('model_inn') != null) {
    //     inn.value = localStorage.getItem('model_inn')
    // }
    if (localStorage.getItem('model_deal_id') != null) {
        deal_id.value = localStorage.getItem('model_deal_id')
    }
    if (localStorage.getItem('model_personal_id') != null) {
        personal_id.value = localStorage.getItem('model_personal_id')
    }

    $(document).on('click', '#customckeck1_house2', function(e) {
        if ($(this).prop("checked") == true) {
            $('#noneDownDrop2').removeClass('d-none')
            
        } else {
            $('#noneDownDrop2').addClass('d-none')
            
        }
    })

    $(document).on('keyup','.price_sell_m2',function(){
        var price_sell_m2 = parseFloat($('.price_sell_m2').val())
        var price_sell = parseFloat($('.price_sell').val())
        var total = parseFloat($('#total').attr('data-total'))

        
        $('.price_sell').val(Math.round(price_sell_m2*total))
        $('#button_price_sell_m2').trigger('click')
        $('#button_price_sell').trigger('click')


        if ($('#customckeck1_house').is(':checked')) {
            var percent = $("#select2-percent-container").text();
            var period = $("#select2-period-container").text();
            price_sell = parseFloat($('.price_sell').val())
            if (percent != NaN && percent != 'NaN' && percent != '' && percent != null && percent != 'Choose percent' && percent != undefined && 
                period != NaN && period != 'NaN' && period != '' && period != null && period != 'Choose period' && period != undefined
                ) {
                percent = parseFloat(percent)
                period = parseFloat(period)

                if (percent == 0 && period > 0) {
                    $('.initialFeeDeal').val(price_sell/period)
                }

            }

        }
    })

    $(document).on('keyup','.price_sell',function(){
        var price_sell_m2 = parseFloat($('.price_sell_m2').val())
        var price_sell = parseFloat($('.price_sell').val())
        var total = parseFloat($('#total').attr('data-total'))

        if ($('#customckeck1_house').is(':checked')) {
            var percent = $("#select2-percent-container").text();
            var period = $("#select2-period-container").text();
            
            if (percent != NaN && percent != 'NaN' && percent != '' && percent != null && percent != 'Choose percent' && percent != undefined && 
                period != NaN && period != 'NaN' && period != '' && period != null && period != 'Choose period' && period != undefined
                ) {
                percent = parseFloat(percent)
                period = parseFloat(period)

                if (percent == 0 && period > 0) {
                    $('.initialFeeDeal').val(price_sell/period)
                }

            }

        }
        
        // $('.price_sell_m2').val(price_sell/total)
        $('.price_sell_m2').val(Math.round(price_sell/total))
        $('#button_price_sell_m2').trigger('click')
        $('#button_price_sell').trigger('click')
    })

    // initial_fee_discount
    $(document).on('keyup','#initial_fee_discount',function(){
        var initial_percent = $(this).val()
        var initialFeeDeal = $('.initialFeeDeal').val()
        var period = $('#org_period').val()
        var price_sell = $('.price_sell').val()
        
        var result = 0;
        var result2 = 0;
        
        if (initial_percent != '') {
            initial_percent = parseFloat(initial_percent)
            if (initial_percent > 0 && initialFeeDeal != '') {
                var percent = $("#org_percent").val();
                var price_sell = $('.price_sell').val()

                if (percent != '' && price_sell != '') {
                    percent = parseFloat(percent)
                    price_sell = parseFloat(price_sell)
                    result2 = price_sell - ((price_sell/100)*percent)

                }

                initialFeeDeal = parseFloat(initialFeeDeal)


                if (period != '' && percent == 0) {
                    period = parseFloat(period);
                    
                    result = (result2 - ((result2/100)*initial_percent))/period;
                    
                }
                else{

                    org_initial_fee = price_sell - result2;
                    result = org_initial_fee - (org_initial_fee/100)*initial_percent
                }

                $('.initialFeeDeal').val(result)

                var result44 = price_sell-((price_sell/100)*percent)
                var result55 = (result44 + result)

                $('#discount_sum').val(result55)
                $('#button_discount').trigger('click')
            }
            else if(!initial_percent){
                $('#discount_sum').val(price_sell)
                $('#button_discount').trigger('click')
            }
            else{
                var percent = $('#org_percent').val();
                var price_sell = $('.price_sell').val()

                if (percent != '' && price_sell != '') {
                    percent = parseFloat(percent)
                    price_sell = parseFloat(price_sell)

                    if (period != '' && percent == 0) {
                        period = parseFloat(period);
                        
                            result2 = price_sell/period
                        
                    }
                    else{
                        result2 = ((price_sell/100)*percent)
                        
                    }

                    $('.initialFeeDeal').val(result2)

                }
            }
        }
        else{
            var percent2 = $("#org_percent").val();
            if (percent2 != 0) {
                percent2 = parseFloat(percent2)
                
                var result77 = price_sell-(price_sell-((price_sell/100)*percent2))
                $('.initialFeeDeal').val(result77)
            }
        }

        $('#button_initial').trigger('click')
        
    })



    $(document).on('keyup','#discount',function(){
        var dis = $(this).val()

        if (dis != '') {
            dis = parseFloat(dis)
            var price_sell = $('.price_sell').val()

            if (price_sell != '') {
                price_sell = parseFloat(price_sell)

                var dis_sum = (price_sell/100)*dis
                var result_sum = price_sell-dis_sum
                $('#discount_sum').val(result_sum)
                $('#button_discount').trigger('click')

            }
        }
        else{
            $('#discount_sum').val('')
            $('#button_discount').trigger('click')
        }

        $('#button_discount').trigger('click')
    })

    $(document).on('keyup','#discount_sum',function(){
        $('#button_discount').trigger('click')
    })

    $(document).on('keyup','#initial_fee',function(){
        $('#button_initial').trigger('click')
    })

    // price_sell_word
    // price_sell_m2_words

    

    
    




</script>

<script>
    function readClass(num) {
        uNames = ["","бир","икки","уч","тўрт","беш","олти","етти","саккиз","тўққиз"];
        dNames = ["","ўн","йигирма","ўттиз","қирқ","эллик","олтмиш","етмиш","саксон","тўқсон"];
        cNames = ["","бир юз","икки юз","уч юз","тўрт юз","беш юз","олти юз","етти юз","саккиз юз","тўққиз юз"];
        r = [];
        l = num.length;
        
        if (1 == l) {
            c = 0;
            d = 0;
            u = num[0];
        }
        if (2 == l) {
            c = 0;
            d = num[0];
            u = num[1];
        }
        if (3 == l) {
            c = num[0];
            d = num[1];
            u = num[2];
        }
        
        if (c != "0" && d == "0" && u != "0") {
            r[0] = cNames[+c];
            r[1] = dNames[+d]+"-у";
            r[2] = uNames[+u];
        } else {
            r[0] = cNames[+c];
            r[1] = dNames[+d];
            r[2] = uNames[+u];
        }
        
        return r;
    }

    function removeZeros(num){
        l = num.length;
        r = num;
        for (i=0;i<l;i++){
            if (num[i] == "0") {
                r = num.slice(i+1);
            } else {
                break;
            }
        }
        return r;
    }

    function num2text(num){
        num = removeZeros(num);
        l = num.length;
        if (l < 1) {
            return "";
        }
        if (l < 4) {
            b = [];
            m = [];
            t = [];
            o = readClass(num);
            
            r = o.join(" ");
        }
        if (l < 7 && 3 < l) {
            b = [];
            m = [];
            t = readClass(num.slice(0,-3));
            o = readClass(num.slice(-3));
            
            r = t.join(" ")+" минг "+o.join(" ");
        }
        if (l < 10 && 6 < l) {
            b = [];
            m = readClass(num.slice(0,-6));
            t = readClass(num.slice(-6,-3));
            o = readClass(num.slice(-3));
            
            r = m.join(" ")+" миллион "+t.join(" ")+" минг "+o.join(" ");
        }
        if (l < 13 && 9 < l) {
            b = readClass(num.slice(0,-9));
            m = readClass(num.slice(-9,-6));
            t = readClass(num.slice(-6,-3));
            o = readClass(num.slice(-3));
            
            r = b.join(" ")+" миллиард "+m.join(" ")+" миллион "+t.join(" ")+" минг "+o.join(" ");
        }
        if (12 < l) {
            return "";
        }
        
        r = r.trim();
        r = r.replace(/\s+/g, " ");
        r = r.replace(/\s\-u/g, "-u");
        r = r.replace("бир юз минг", "юз минг");
        r = r.replace("бир юз миллион", "юз миллион");
        r = r.replace("бир юз миллиард", "юз миллиард");
        r = r.replace("миллион минг", "миллион");
        r = r.replace("миллиард миллион", "миллиард");
        
        if (r == "бир минг") {
            r = "минг";
        }
        if (r == "бир юз") {
            r = "юз";
        }
        return r;
    }

    function doConvert(field, string) {
        var output = num2text(string);
        field.value = output;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/create.blade.php ENDPATH**/ ?>