<?php use Modules\ForTheBuilder\Entities\Constants; ?>
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
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Creating a new client')); ?>

                            </h4>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="" action="<?php echo e(route('forthebuilder.clients.store')); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?> <?php echo method_field("POST"); ?>
                    <input type="hidden" name="client_id" class="booking-client_id" id="">
                        <div class="row">
                            
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('First name')); ?></label>
                                <input
                                    class="form-control keyUpName booking-first_name <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="first_name" id="first_name" autocomplete="off"
                                    value="<?php echo e($data['first_name'] ?? old('first_name')); ?>">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Last name')); ?></label>
                                <input
                                    class="form-control keyUpName booking-last_name <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="last_name" id="last_name" autocomplete="off"
                                    value="<?php echo e($data['last_name'] ?? old('last_name')); ?>">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Middle name')); ?></label>
                                <input
                                    class="form-control keyUpName booking-middle_name <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="middle_name" id="middle_name" autocomplete="off"
                                    value="<?php echo e($data['middle_name'] ?? old('middle_name')); ?>">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Phone number')); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">
                                        <?php if($domain == 'businesshouse.icstroy.com'): ?>
                                            <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/kirgiz.jpg')); ?>"alt="kirgiz">
                                        <?php else: ?>
                                            <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"alt="Region">
                                        <?php endif; ?>
                                        <span class="ms-2">+998</span>
                                    </div>
                                    <input
                                        class="form-control Tel keyUpName booking-phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="tel" id="phone" name="phone" value="<?php echo e($data['phone'] ?? old('phone')); ?>">
                                </div>
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    <?php $__errorArgs = ['phone'];
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Additional phone number')); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">
                                        <?php if($domain == 'businesshouse.icstroy.com'): ?>
                                            <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/kirgiz.jpg')); ?>"alt="kirgiz">
                                        <?php else: ?>
                                            <img width="30px" src="<?php echo e(asset('backend-assets/forthebuilders/images/region.png')); ?>"alt="Region">
                                        <?php endif; ?>
                                        <span class="ms-2">+998</span>
                                    </div>
                                    <input class="form-control Tel keyUpName booking-additional_phone <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="tel" id="additional_phone" name="additional_phone" value="<?php echo e($data['additional_phone'] ?? old('additional_phone')); ?>">
                                </div>
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
                                    <?php $__errorArgs = ['additional_phone'];
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

                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Gender')); ?></label>
                                <select name="gender" id="gender" class="sozdatImyaSpisokInput1272 price_select2">
                                        <option value="1"><?php echo e(translate('Male')); ?></option>
                                        <option value="2"><?php echo e(translate('Female')); ?></option>
                                </select>
                            </div>


                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('email')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="email" name="email" id="email" value="<?php echo e($data['email'] ?? old('email')); ?>">
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Source')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="source" id="source" value="<?php echo e($data['source'] ?? old('source')); ?>">
                                <span class="error-data">
                                    <?php $__errorArgs = ['source'];
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('status')); ?></label>
                                <select
                                    class="form-control sozdatImyaSpisokSelectOption <?php $__errorArgs = ['lead_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="exampleFormControlSelect1" name="lead_status" data-placeholder="<?php echo e(translate('select')); ?>">
                                    <option value="<?php echo e(Constants::FIRST_CONTACT); ?>"><?php echo e(translate('First contact')); ?></option>
                                    <option value="<?php echo e(Constants::NEGOTIATION); ?>"><?php echo e(translate('Negotiation')); ?></option>
                                </select>
                                <span class="error-data">
                                    <?php $__errorArgs = ['lead_status'];
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('What is looking for')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['looking_for'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="looking_for" id="looking_for"
                                    value="<?php echo e($data['looking_for'] ?? old('looking_for')); ?>">
                                <span class="error-data">
                                    <?php $__errorArgs = ['looking_for'];
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Serial number of the passport')); ?></label>
                                <input
                                    class="form-control sozdatImyaSpisokServerniyNomer keyUpName booking-series_number <?php $__errorArgs = ['series_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" placeholder="AA1234567" name="series_number" id="series_number"
                                    value="<?php echo e($data['series_number'] ?? old('series_number')); ?>" autocomplete="off">
                                <div class="keyUpNameResult d-none"
                                    style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Issued by')); ?></label>
                                <input class="form-control <?php $__errorArgs = ['issued_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="issued_by" id="issued_by"
                                    value="<?php echo e($data['issued_by'] ?? old('issued_by')); ?>">
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Issued by (Date of issue and expiration date)')); ?></label>
                                <input class="form-control sozdatImyaSpisokPinfl <?php $__errorArgs = ['given_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" name="given_date" id="given_date" value="<?php echo e($data['given_date'] ?? old('given_date')); ?>">
                                <span class="error-data">
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
                            <div class="col-md-4 mb-3 d-none" id="add_flat">
                                <h4 class="plusFlexModalInformationDobavitCvartir" id="model_interested_flat"></h4>
                                <input type="hidden" name="house_flat_id" value="" id="flat_id" <?php $__errorArgs = ['house_flat_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>>
                                <a class="btn btn-primary waves-effect waves-light plusFlexModalInformation_2" id="adding_flat">
                                    <span class="btn-label">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="">
                                        <?php echo e(translate('Add apartment')); ?>

                                    </span>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="sozdatImyaSpisokSozdatButton btn btn-outline-success">
                                    <?php echo e(translate('create')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="house_modal" tabindex="-1" role="dialog" aria-labelledby="selectFlat"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="row w-100 align-items-center justify-content-between">
                    <div class="col-10 d-flex align-items-center justify-content-between">
                        <h4><?php echo e(translate('JK')); ?></h4>
                        <input placeholder="<?php echo e(translate('Search by objects')); ?>" class="w-50 searchTable form-control form-control-sm" type="text">    
                    </div>
                    <div class="col-2 text-end">
                        <button type="button" class="close btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    
                </div>
                
            </div>
            <div class="modal-body" style="height: 600px;overflow: auto;">
                
            </div>
        </div>
    </div>
</div>              
<div id="domain" data-domain="<?php echo e($domain); ?>"></div> 

            
                
           
<script src="<?php echo e(asset('/backend-assets/plugins/select2/js/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/bootstrap-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/jquery.maskedinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/toastr/toastr.min.js')); ?>"></script>

<script>
    let page_name = 'clients';
    $(document).ready(function() {
        $('#given_date').datepicker({
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
        


        let sessionWarning = "<?php echo e(session('warning')); ?>";
        if (sessionWarning) {
            toastr.warning(sessionWarning)
        }
    });

    $(document).on('click','.plusFlexModalInformation_2',function(){
        $('#house_modal').modal('toggle')

        $.ajax({
            url: `/forthebuilder/clients/client-house-ajax`,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })
    
    $(document).on('click','.back_houses',function(){
        
        $.ajax({
            url: `/forthebuilder/clients/client-house-ajax`,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })

    $(document).on('click','.select_house',function(){
        var house_id = $(this).attr('data-id')
        // console.log(house_id)
        
        $.ajax({
            url: `/forthebuilder/clients/client-select-house-ajax/`+house_id,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })

    $(document).on('click','.select_house_flat',function(){
        var flat_id = $(this).attr('data-id')
        var house_id = $(this).attr('data-house-id')
        var number_of_flat = $(this).attr('data-number-of-flat')
        var house_name = $(this).attr('data-house_name')


        $('#model_interested_flat').text(house_name+' '+number_of_flat+'-flat')
        $('#select_flat_modal2 #model_house_id').val(house_id)
        $('#select_flat_modal2 #model_house_flat_id').val(flat_id)
        $('#house_modal').modal('toggle')

        $('#flat_id').val(flat_id)
        
    })

    
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/clients/create.blade.php ENDPATH**/ ?>