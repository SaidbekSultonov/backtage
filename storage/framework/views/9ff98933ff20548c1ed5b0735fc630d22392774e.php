<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\Constants;

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
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-11 d-flex align-items-center">
                            <a onclick="history.back()" href="#" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Details for the contract')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="company_add_flats" action="<?php echo e(route('forthebuilder.house.save-company-information')); ?>" method="POST"
                        enctype="multipart/form-data"> <?php echo csrf_field(); ?>
                        <div class="row priseObrazavaniyaData">
                            
                            <div class="col-md-12 mb-3">
                                <select class=" form-control obrazavaniyaSelect priceInformationSelectHouse" name="house_id" data-placeholder="<?php echo e(translate('Select LCD')); ?>">
                                    <option></option>
                                    <?php if(empty(!$model)): ?>
                                        <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $selected = old('house_id') == $value->id ? 'selected' : '';
                                            ?>
                                            <option value="<?php echo e($value->id); ?>" <?php echo e($selected); ?>>
                                                <?php echo e($value->name . ' (' . $value->corpus . ')'); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <span class="error-data">
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
                            <div class="col-md-12 mb-3">
                                <select class="form-control company" name="company_id" data-placeholder="<?php echo e(translate('Choose an company')); ?>">
                                    <option></option>
                                    <?php if(!empty($companies)): ?>
                                        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value->id); ?>">
                                            <?php echo e($value->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-outline-primary w-100 obrazavaniyaSelect btn priceFormationOpenFlats2"
                                    data-bs-toggle="modal" data-bs-target="#exampleModalLong"><?php echo e(translate('Choose a flat')); ?></button>
                                <span class="error-data">
                                    <?php $__errorArgs = ['house_flats'];
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
                            <div class="col-md-12 mb-3">
                                <input type="hidden" id="price_formaition_id" name="house_flats" value="<?php echo e(old('house_flats')); ?>">
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <button type="submit" class="btn btn-outline-success save_company"><?php echo e(translate('Save')); ?></button>
                                <?php endif; ?>

                                
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal_test" role="document" style="min-width: 900px;">
        <div class="modal-content">
            <div class="modal-header border border-0">
                <button type="button" class="close btn btn-xs btn-light ms-auto" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ----- ---- ---
            </div>
            <div class="modal-footer">
                <button class="btn sozdatImyaSpisokSozdatButton btn-primary mt-0 savePriceFormation"
                    data-bs-dismiss="modal"><?php echo e(translate('Save')); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body text-center p-3">
                <h4 class="modalVideystvitelno"><?php echo e(translate('First select an object')); ?></h4>
            </div>
        </div>
    </div>
</div>

<div class="house_error" data-text="<?php echo e(translate('You have not selected an object')); ?>"></div>
<div class="company_error" data-text="<?php echo e(translate('You have not selected an company')); ?>"></div>
<div class="flat_error" data-text="<?php echo e(translate('You have not selected an flat')); ?>"></div>
<div id="success" data-text="<?php echo e(translate('Data successfully created')); ?>"></div>

<script>
    
    $(document).on('click', '.plusForSummPrice', function(e) {
            e.preventDefault()
            var data_count = $(this).attr('data-count')
            var count = parseInt(data_count) + 1
            $(this).attr('data-count', count)
            // var partHtml = $('.divForSummPrice').html()
            $('.divForSummPrice').append(`
                <div class="d-flex mb-3">
                    <div style="width: 49%;">
                        <select class="obrazavaniyaSelect price_select3 form-control" name="payment[` + count + `][payment_type]"
                            style="opacity: <?php echo e(old('payment_type') ? 1 : 0.25); ?>;">
                            
                            <?php 
                            
                                 if(!empty($installment_type)){
                                    foreach($installment_type as $keys => $values){
                                        echo '<option value="'.$values->percent_type.'">'.$values->percent_type.' '.translate('% payment').'</option>';
                                    }
                                }
                            
                            ?>
                            
                           
                        </select>
                        <span class="error-data">
                            <?php $__errorArgs = ['payment_type'];
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

                    <div style="width: 49%; margin-left: auto">
                        <input type="number" class="obrazavaniyaSelect form-control obrazavaniyaSelectInput"
                            style="opacity: <?php echo e(old('amount') ? 1 : 0.25); ?>;"
                            placeholder="<?php echo e(translate('Enter amount')); ?>" name="payment[` + count + `][amount]" value="<?php echo e(old('amount')); ?>">
                        <span class="error-data">
                            <?php $__errorArgs = ['amount'];
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
            `)
            $('.price_select3').select2()
        })

        $(document).on('click', '.minusForSummPrice', function(e) {
            e.preventDefault()
            
            // var partHtml = $('.divForSummPrice').html()
            $(".divForSummPrice").parent().find("div[class=d-flex]:last").remove();
            // $('.divForSummPrice').parent().append(`<div class="d-flex">` + partHtml + `</div>`)
        })
        $(function(){
            $('.company').select2()
            $('.priceInformationSelectHouse').select2()
        })

        var house_error = $('.house_error').attr('data-text')
        var company_error = $('.company_error').attr('data-text')
        var flat_error = $('.flat_error').attr('data-text')

        $(document).on('click','.save_company',function(e){
            var house_id = $('.priceInformationSelectHouse').val()
            var company_id = $('.company').val()
            var flats = $('#price_formaition_id').val()

            if (house_id == '' || company_id == '' || flats == '') {
                e.preventDefault()

                if (house_id == '') {
                    alert(house_error)
                }
                else if (company_id == '') {
                    alert(company_error)
                }
                else if (flats == '') {
                    alert(flat_error)
                }
            }
            else{
                $('#company_add_flats').unbind('submit').submit();
            }

        })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/details.blade.php ENDPATH**/ ?>