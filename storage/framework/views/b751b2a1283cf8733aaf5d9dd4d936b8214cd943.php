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
                            <a href="<?php echo e(route('forthebuilder.settings.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Price formation')); ?>

                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="" action="<?php echo e(route('forthebuilder.house.save-price-information')); ?>" method="POST"
                        enctype="multipart/form-data"> <?php echo csrf_field(); ?>
                        <div class="row priseObrazavaniyaData">
                            
                            <div class="col-md-12 mb-3">
                                <select class=" form-control obrazavaniyaSelect priceInformationSelectHouse" name="house_id">
                                    <option aria-placeholder="<?php echo e(translate('Select LCD')); ?>" selected hidden disabled>
                                        <?php echo e(translate('Select LCD')); ?>

                                    </option>
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
                                <select class="form-control obrazavaniyaSelect" name="price_type">
                                    <option aria-placeholder="<?php echo e(translate('Choose an object')); ?>" selected hidden disabled>
                                        <?php echo e(translate('Choose an object')); ?>

                                    </option>
                                    
                                    <option value="<?php echo e(Constants::PRICE_M2); ?>"
                                        <?php echo e(old('price_type') == Constants::PRICE_M2 ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Price per m2')); ?>

                                    </option>
                                    <option value="<?php echo e(Constants::PRICE_TERRACE); ?>"
                                        <?php echo e(old('price_type') == Constants::PRICE_TERRACE ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Price per m2 with terrace')); ?>

                                    </option>
                                    <option value="<?php echo e(Constants::PRICE_ATTIC); ?>"
                                        <?php echo e(old('price_type') == Constants::PRICE_ATTIC ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Price per m2 in attic')); ?>

                                    </option>
                                    <option value="<?php echo e(Constants::PRICE_BASEMENT); ?>"
                                        <?php echo e(old('price_type') == Constants::PRICE_BASEMENT ? 'selected' : ''); ?>>
                                        <?php echo e(translate('Price per m2 on the ground floor')); ?>

                                    </option>
                                </select>
                                <span class="error-data">
                                    <?php $__errorArgs = ['price_type'];
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
                                <button type="button" class="btn btn-outline-primary w-100 obrazavaniyaSelect btn priceFormationOpenFlats"
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
                            <div class="row divForSummPrice">
                                <div class="col-md-6 mb-3">
                                    <select class="form-control price_select2 obrazavaniyaSelect" name="payment[0][payment_type]">
                                        <?php if(!empty($installment_type)): ?>
                                            <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($values->percent_type == 100 || $values->percent_type == 70 || $values->percent_type == 50 || $values->percent_type == 30): ?>
                                                    <option value="<?php echo e($values->percent_type); ?>"
                                                    <?php echo e(old('payment_type') == $values->percent_type ? 'selected' : ''); ?>>
                                                    <?php echo $values->percent_type.' '.translate('% payment') ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        
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
                                <div class="col-md-6 mb-3">
                                    <input type="number" class="form-control obrazavaniyaSelect obrazavaniyaSelectInput" placeholder="<?php echo e(translate('Enter amount')); ?>" name="payment[0][amount]" value="<?php echo e(old('amount')); ?>">
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
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <div class="col-md-12 mb-3">
                                    <input type="hidden" id="price_formaition_id" name="house_flats" value="<?php echo e(old('house_flats')); ?>">

                                    <button type="submit" class="sozdatImyaSpisokSozdatButton btn btn-outline-success"><?php echo e(translate('Save')); ?></button>

                                    
                                    <button class="obrazavaniyaSelect btn btn-success plusForSummPrice" data-count="0">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                
                                    <button class="obrazavaniyaSelect btn btn-danger minusForSummPrice" >
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/price-formation.blade.php ENDPATH**/ ?>