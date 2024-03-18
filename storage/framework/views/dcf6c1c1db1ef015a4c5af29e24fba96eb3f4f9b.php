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
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/css/fileinput.min.css')); ?>">
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
        margin: 0 !important;
    }
</style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row w-100 m-0">
                        <div class="col-md-6 d-flex align-items-center">
                            <a onclick="history.back()" href="#" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-2">
                                <?php echo e(__('locale.update')); ?>

                            </h4>
                        </div>
                    </div>    
                    
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('forthebuilder.house.update',$model->id)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group mb-2">
                                    <label><?php echo e(translate('Name of JK')); ?></label>
                                    <input class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" name="name" value="<?php echo e($model->name); ?>">
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
                                <div class="form-group mb-2">
                                    <label><?php echo e(translate('Corpas')); ?></label>
                                    <input class="form-control <?php $__errorArgs = ['corpus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" name="corpus" value="<?php echo e($model->corpus); ?>">
                                    <span class="error-data">
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
                                <div class="form-group mb-2">
                                    <label><?php echo e(translate('Number house')); ?></label>
                                    <input class="form-control <?php $__errorArgs = ['house_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="number" name="house_number" value="<?php echo e($model->house_number); ?>">
                                    <span class="error-data">
                                        <?php $__errorArgs = ['house_number'];
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
                            <div class="col-md-6">
                                 <div class="form-group mb-2">
                                    <label><?php echo e(translate('Description of the object')); ?></label>
                                    <input class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        type="text" name="description" value="<?php echo e($model->description); ?>">
                                    <span class="error-data">
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

                                <div class="form-group mb-2">
                                    <label><?php echo e(translate('Type')); ?></label>
                                    <input class="form-control" type="text" name="type_name" value="<?php echo e($model->type_name); ?>">
                                </div> 

                                <div class="form-group mb-2">
                                    <label><?php echo e(translate('Object status')); ?></label>
                                    <select
                                        class="form-control sozdatImyaSpisokSelectOption2 <?php $__errorArgs = ['project_stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> errpr-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="exampleFormControlSelect1" name="project_stage">
                                        <option value="<?php echo e(House::DESIGN); ?>" <?php echo e(($model->project_stage == House::DESIGN) ? 'selected' : ''); ?>><?php echo e(translate('Design')); ?></option>
                                        <option value="<?php echo e(House::AT_THE_FOUNDATION_STAGE); ?>" <?php echo e(($model->project_stage == House::AT_THE_FOUNDATION_STAGE) ? 'selected' : ''); ?>>
                                            <?php echo e(translate('At the foundation stage')); ?></option>
                                        <option value="<?php echo e(House::AT_THE_PRE_SALE_STAGE); ?>" <?php echo e(($model->project_stage == House::AT_THE_PRE_SALE_STAGE) ? 'selected' : ''); ?>>
                                            <?php echo e(translate('At the pre-sale stage')); ?></option>
                                        <option value="<?php echo e(House::START_OF_OFFICIAL_SALES); ?>" <?php echo e(($model->project_stage == House::START_OF_OFFICIAL_SALES) ? 'selected' : ''); ?>>
                                            <?php echo e(translate('Start of official sales')); ?></option>
                                        <option value="<?php echo e(House::STATUS_COMPLATED); ?>" <?php echo e(($model->project_stage == House::STATUS_COMPLATED) ? 'selected' : ''); ?>>
                                            <?php echo e(translate('Completed')); ?></option>
                                    </select>
                                    <span class="error-data">
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
 
                            </div>

                            
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success"><?php echo e(__('locale.update')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="sozdatJkDaleData h-auto m-0">
                        <div class="d-flex">
                            <div class="dalePodyedzEtaj" style="margin: 55px 20px 0 0;">
                                <?php if(empty(!$arr['entrance_count'])): ?>
                                    <?php $__currentLoopData = $arr['entrance_count']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val_entrance_count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex" style="overflow: scroll">
                                <?php if(empty(!$arr['list'])): ?>
                                    <?php
                                        $n = 0;
                                        $first = true;
                                    ?>
                                    <?php $__currentLoopData = $arr['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(isset($val['entrance'])): ?>
                                            <div class="border rounded p-2 me-2" id="en_<?php echo e($val['entrance']); ?>">
                                                <h4 class="d-flex align-items-center justify-content-between">
                                                    <span>
                                                        <?php echo e(translate('Entrance') . ' ' . ($val['entrance'] ?? '')); ?>

                                                    </span>
                                                    <span class="btn btn-sm delete_entrance" data-entrance="<?php echo e($val['entrance']); ?>" data-house="<?php echo e($val['house_id']); ?>">
                                                        <i class="fe-trash-2 text-danger mdi-20"></i>
                                                    </span>
                                                </h4>
                                                <hr class="my-1">
                                                <?php if(empty(!$arr['list'])): ?>
                                                    <?php $__currentLoopData = $val['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!empty($val2)): ?>
                                                        <div class="d-flex">
                                                            <?php if($first): ?>
                                                                <h4 class="me-2" style="width:150px">
                                                                    <?php echo e($key2); ?>

                                                                </h4>
                                                            <?php endif; ?>
                                                            <?php $__currentLoopData = $val2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="p-1">
                                                                    <div class="border rounded <?php echo e((($val3['color_status'] == 0) ? 'btn' : 'btn disabled')); ?> text-white select_flat" data-flat-id="<?php echo e($val3['flat_id']); ?>" style="background-color: <?php echo e($colors[$val3['color_status']]); ?>;">
                                                                        <?php echo e($val3['room_count'] ?? 0); ?>

                                                                    </div>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                            $first = false;
                                        ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <div class="changes px-2 d-none">
                        <br>
                        <button class="btn btn-outline-danger delete_selected_flats">
                            <i class="fe-trash-2 text-danger"></i>
                            <?php echo e(translate('Delete selected flats')); ?>

                        </button>
                        <button class="btn btn-outline-primary save-flats" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                            <i class="fe-edit text-primary"></i>
                            <?php echo e(translate('Update selected flats')); ?>

                        </button>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo e(route('forthebuilder.house.update-flats-selected')); ?>" method="POST"
                    enctype="multipart/form-data" id="chees-modal">
                    <input type="hidden" name="flats" id="input_ides" />
                    <div class="row change_content">
                        

                        <div class="mt-1">
                            <label class="form-label"><?php echo e(translate('Living space')); ?></label>
                            <input type="number" name="living_space" class="modalMiniCapsule4 text-left form-control">
                        </div>

                        <div class="mt-1">
                            <label class="form-label"><?php echo e(translate('Kitchen area')); ?></label>
                            <input type="number" name="kitchen_area" class="modalMiniCapsule4 text-left form-control">
                        </div>

                        <div class="mt-1">
                            <div class="form-check mb-2 form-check-primary">
                                <input class="form-check-input" type="checkbox" id="terassa">
                                <label class="form-check-label" for="terassa">
                                    <?php echo e(translate('Terrace')); ?> 
                                </label>
                            </div>
                            <input type="number" placeholder="" name="terassa" class="modalMiniCapsule4 text-left form-control" id="terassa_input" disabled>
                            
                        </div>

                        <div class="mt-1">
                            <div class="form-check mb-2 form-check-primary">
                                <input class="form-check-input" type="checkbox" id="balcony">
                                <label class="form-check-label" for="balcony">
                                    <?php echo e(translate('Balcony')); ?> 
                                </label>
                            </div>
                            <input type="text" placeholder="" name="balcony" class="modalMiniCapsule4 text-left form-control" id="balcony_input" disabled>
                        </div>

                        <div class="mt-1">
                            <label class="form-label"><?php echo e(translate('Total area')); ?></label>
                            <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
                        </div>
                    </div>

                    <label for="files" class="mt-1"><?php echo e(__('locale.file__upload')); ?></label>
                    <input type="file" name="files[]" id="files" multiple>

                    <p class="mt-2"><b class="text-warning" id="wait"></b></p>
                    <input type="submit" value="<?php echo e(translate('Save')); ?>" class="mdodalSaxranitSozdatJkDale float-right save-flats-form-edit btn btn-outline-success mt-3">
                </form>
            </div>
        </div>
    </div>
</div>


<div id="confirm" data-confirm="<?php echo e(translate('Are you sure ?')); ?>"></div>
<div id="waiting_text" data-text=""></div>
<div id="selects_flats" data-ides=""></div>
<script>
    let page_name = 'house';

    $(document).on('click','.delete_entrance',function(){
        var entrance = $(this).attr('data-entrance')
        var house_id = $(this).attr('data-house')
        var confirm_text = $('#confirm').attr('data-confirm')

        if (confirm(confirm_text)) {
            $.ajax({
                url: `/house/delete-entrance/`,
                data: {
                    entrance: entrance,
                    house_id: house_id,
                },
                type: 'GET',
                success: function (data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                        $('#en_'+entrance).fadeOut()
                    }
                    else{
                        showToast('danger',data.message)
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    })

    // select_flat
    $(document).on('click','.select_flat',function(){
        var selects_flats = $('#selects_flats').attr('data-ides')
        var new_id = $(this).attr('data-flat-id')
        var _this = $(this)
        
        var arr = selects_flats.split(",");

        if($.inArray(new_id, arr) != -1) {
            arr.splice( $.inArray(new_id, arr), 1 );
            $('#selects_flats').attr('data-ides', arr)
            _this.css('background-color','#44BE27')
        } else {
            arr.push(new_id);
            $('#selects_flats').attr('data-ides', arr)
            _this.css('background-color','lightgrey')
        } 
        

        if (arr != '') {
            $('.changes').removeClass('d-none')
        }
        else{
            $('.changes').addClass('d-none')   
        }
    })

    // delete_selected_flats
    $(document).on('click','.delete_selected_flats',function(){
        var selects_flats = $('#selects_flats').attr('data-ides')
        
        var confirm_text = $('#confirm').attr('data-confirm')

        if (confirm(confirm_text)) {
            $.ajax({
                url: `/house/delete-flats/`,
                data: {
                    selects_flats: selects_flats,
                },
                type: 'GET',
                success: function (data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                        window.location.reload();
                    }
                    else{
                        showToast('danger',data.message)
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    })
</script>

<script defer src="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/js/fileinput.min.js')); ?>"></script>
</script>
<script defer src="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/buffer.min.js')); ?>">
</script>
<script defer src="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/js/plugins/piexif.min.js')); ?>">
</script>
<script defer src="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/js/locales/ru.js')); ?>"></script>

<script>
    $(document).on('click', '.save-flats', function(e) {
        var selects_flats = $('#selects_flats').attr('data-ides')
        $('#input_ides').val(selects_flats)
        e.preventDefault()
        var number = $('.room-count-button[is-selected="true"]').attr('data-number')
        if (number == 'p') {
            $('#exampleModal .modal-body').find('form .change_content').html(`
                <div class="my-1">
                    <label class="form-label"><?php echo e(translate('Number of rooms')); ?></label>
                    <input type="number" name="room_count" class="modalMiniCapsule4 text-left form-control">
                </div>
                <div class="my-1">
                    <label class="form-label"><?php echo e(translate('Total area')); ?></label>
                    <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
                </div>

            `)
        } else if (number == 'c') {
            $('#exampleModal .modal-body').find('form .change_content').html(`
                <div class="my-1">
                    <label class="form-label"><?php echo e(translate('Number of rooms')); ?></label>
                    <input type="number" name="room_count" class="modalMiniCapsule4 text-left form-control">
                </div>

                <div class="col-6 mt-1">
                    <div class="form-check mb-2 form-check-primary">
                        <input class="form-check-input" type="checkbox" id="terassa">
                        <label class="form-check-label" for="terassa">
                            <?php echo e(translate('Terrace')); ?> 
                        </label>
                    </div>
                    <input type="number" placeholder="" name="terassa" class="form-control modalMiniCapsule4 keyup_input_area text-left"
                        id="terassa_input" disabled>
                </div>

                <div class="col-6 my-1">
                    <div class="form-check mb-2 form-check-primary">
                        <input class="form-check-input" type="checkbox" id="balcony">
                        <label class="form-check-label" for="balcony">
                            <?php echo e(translate('Balcony')); ?> 
                        </label>
                    </div>
                    <input type="number" placeholder="" name="balcony" class="modalMiniCapsule4 keyup_input_area text-left form-control"
                        id="balcony_input" disabled>
                </div>

                <div class="col-12 mt-1">
                    <label class="form-label"><?php echo e(translate('Total area')); ?></label>
                    <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
                </div>
            `)
        } else {
            $('#exampleModal .modal-body').find('form .change_content').html(`
                <div class="my-1">
                    <label class="form-label"><?php echo e(translate('Number of rooms')); ?></label>
                    <input type="number" name="room_count" class="modalMiniCapsule4 text-left form-control">
                </div>

                <div class="mt-1 col-6">
                    <label class="form-label d-flex justify-content-between">
                        <b><?php echo e(translate('Hotel')); ?></b>
                        <span>
                            <span class="btn btn-sm btn-danger minus_hotel">
                                <i class="fa fa-minus"></i>
                            </span>
                            <span class="btn btn-sm btn-success plus_hotel">
                                <i class="fa fa-plus"></i>
                            </span>
                        </span>
                    </label>
                    <input type="number" name="hotel" class="modalMiniCapsule4 keyup_input_area text-left form-control">
                    <div class="add_hotel_rooms" data-count="2"></div>
                </div>

                <div class="mt-1 col-6">
                    <label class="form-label d-flex justify-content-between">
                        <b><?php echo e(translate('Bedroom')); ?></b>
                        <span>
                            <span class="btn btn-sm btn-danger minus_bedroom">
                                <i class="fa fa-minus"></i>
                            </span>
                            <span class="btn btn-sm btn-success plus_bedroom">
                                <i class="fa fa-plus"></i>
                            </span>
                        </span>
                    </label>
                    <input type="number" name="bedroom" class="modalMiniCapsule4 keyup_input_area text-left form-control">
                    <div class="add_bedroom_rooms" data-count="2"></div>
                </div>


                <div class="mt-1 col-4">
                    <label class="form-label"><?php echo e(translate('Kitchen area')); ?></label>
                    <input type="number" name="kitchen" class="modalMiniCapsule4 keyup_input_area text-left form-control">
                </div>

                <div class="mt-1 col-4">
                    <div class="form-check mb-2 form-check-primary">
                        <label class="form-check-label" for="terassa">
                            <?php echo e(translate('Terrace')); ?> 
                        </label>
                    </div>
                    <input type="number" placeholder="" name="terraca" class="modalMiniCapsule4 keyup_input_area text-left form-control" id="terassa_input">
                </div>

                <div class="my-1 col-4">
                    <div class="form-check mb-2 form-check-primary">
                        <label class="form-check-label" for="balcony">
                            <?php echo e(translate('Balcony')); ?> 
                        </label>
                    </div>
                    <input type="number" placeholder="" name="balcony" class="modalMiniCapsule4 keyup_input_area text-left form-control" id="balcony_input">
                </div>

                <div class="col-4 my-1">
                    <label class="form-label"><?php echo e(translate('Bathroom')); ?></label>
                    <input type="number" placeholder="" name="bathroom" class="form-control text-left keyup_input_area" id="bathroom_input">
                </div>

                <div class="col-4 my-1">
                    <label class="form-label"><?php echo e(translate('Corridor')); ?></label>
                    <input type="number" placeholder="" name="corridor" class="form-control text-left keyup_input_area" id="corridor_input">
                </div>

                <div class="col-4 my-1">
                    <label class="form-label"><?php echo e(translate('Other')); ?></label>
                    <input type="number" placeholder="" name="other" class="modalMiniCapsule4 form-control text-left keyup_input_area" id="other_input" >
                </div>

                <div class="mt-1">
                    <label class="form-label"><?php echo e(translate('Total area')); ?></label>
                    <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
                </div>
            `)
        }
    })

    $(document).ready(function() {

        var $el1 = $("#files");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#files").fileinput({
            language: 'ru',
            uploadUrl: "/house-flat/file-upload",
            // deleteUrl: '/forthebuilder/deal/file-delete-all',
            allowedFileExtensions: ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'png', 'jpg', 'jpeg', 'svg'],
            uploadAsync: false,
            maxFileSize: 150000000,
            maxFilesNum: 25,
            showUpload: false,
            showCaption: true,
            showRemove: false,
            removeClass: "btn btn-danger",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
            overwriteInitial: false,
            // removeLabel: "Delete",
            // minFileCount: 1,
            // maxFileCount: 5,
            // hideThumbnailContent:false,
            // preferIconicPreview: true,
            browseOnZoneClick: true,
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreview: [
                <?php if(!empty($dealFiles)): ?>
                        <?php $__currentLoopData = $dealFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealItemFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo e(asset('/uploads/tmp_files/' . Auth::user()->id . '/house-flat/' . $dealItemFile->getFilename())); ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            ],
            initialPreviewConfig: [
                    <?php if(!empty($dealFiles)): ?>
                    <?php $__currentLoopData = $dealFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealItemFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(
                        $dealItemFile->getExtension() == 'jpg' ||
                            $dealItemFile->getExtension() == 'jpeg' ||
                            $dealItemFile->getExtension() == 'png' ||
                            $dealItemFile->getExtension() == 'pdf' ||
                            $dealItemFile->getExtension() == 'doc' ||
                            $dealItemFile->getExtension() == 'docx' ||
                            $dealItemFile->getExtension() == 'xls' ||
                            $dealItemFile->getExtension() == 'xlsx' ||
                            $dealItemFile->getExtension() == 'svg'): ?>
                {
                    caption: "<?php echo e($dealItemFile->getFilename()); ?>",
                    size: "<?php echo e($dealItemFile->getSize()); ?>",
                    width: "120px",
                    url: '/house-flat/file-delete/' +
                        '<?php echo e($dealItemFile->getFilename()); ?>',
                    key: "<?php echo e($dealItemFile->getFilename()); ?>"
                },
                    <?php else: ?>
                {
                    type: "<?php echo e($dealItemFile->getExtension()); ?>",
                    caption: "<?php echo e($dealItemFile->getFilename()); ?>",
                    size: "<?php echo e($dealItemFile->getSize()); ?>",
                    width: "120px",
                    url: '/house-flat/file-delete/' +
                        '<?php echo e($dealItemFile->getFilename()); ?>',
                    key: "<?php echo e($dealItemFile->getFilename()); ?>"
                },
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            ]
        }).on("filebatchselected", function(event, files) {
            $el1.fileinput("upload");
        }).on('filesorted', function(e, params) {
            console.log('file sorted', e, params);
        }).on('fileuploaded', function(e, params) {
            console.log('file uploaded', e, params);
        }).on('filesuccessremove', function(e, id) {
            console.log('file success remove', e, id);
        });
    })
</script>

<script>
    function round(value, exp) {
        if (typeof exp === 'undefined' || +exp === 0)
            return Math.round(value);

        value = +value;
        exp = +exp;

        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
            return NaN;

        // Shift
        value = value.toString().split('e');
        value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
    }



    $(document).on('click','.plus_hotel',function(){
        var count = $('.add_hotel_rooms').attr('data-count')
        if (count <= 5) {
            $('.add_hotel_rooms').append(`<div class="mt-3">
                <label class="form-label">
                    ${count} - <?php echo e(translate('Hotel')); ?>

                </label>
                <input type="number" name="hotel${count}" class="modalMiniCapsule4 form-control text-left keyup_input_area">                       
            </div>`
            );
            $('.add_hotel_rooms').attr('data-count',++count)    
        }
        
    })

    $(document).on('click','.minus_hotel',function(){
        var count = $('.add_hotel_rooms').attr('data-count')
        if (count > 2) {
            $('.add_hotel_rooms .mt-3').last().remove()
            $('.add_hotel_rooms').attr('data-count',--count) 
            var sum = 0;
            $('.keyup_input_area').each(function(){
                if ($(this).val() != '') {
                    sum += parseFloat($(this).val()); 
                    sum = round(sum,2);   
                }
                $('input[name="total_area"]').val(sum)
                
            });   
        }
    })

    $(document).on('click','.plus_bedroom',function(){
        var count = $('.add_bedroom_rooms').attr('data-count')
        if (count <= 5) {
            $('.add_bedroom_rooms').append(`<div class="mt-3">
                    <label class="form-label">
                        ${count} - <?php echo e(translate('Bedroom')); ?>

                    </label>
                    <input type="number" name="bedroom${count}" class="modalMiniCapsule4 form-control text-left keyup_input_area">                       
                </div>`
            );
            $('.add_bedroom_rooms').attr('data-count',++count)
        }
    })

    $(document).on('click','.minus_bedroom',function(){
        var count = $('.add_bedroom_rooms').attr('data-count')
        if (count > 2) {
            $('.add_bedroom_rooms .mt-3').last().remove()
            $('.add_bedroom_rooms').attr('data-count',--count)    
            var sum = 0;
            $('.keyup_input_area').each(function(){
                if ($(this).val() != '') {
                    sum += parseFloat($(this).val());
                    sum = round(sum,2);    
                }
            });
            $('input[name="total_area"]').val(sum)
        }
    })

    $(document).on('keyup','.keyup_input_area',function(){
        var sum = 0;
        $('.keyup_input_area').each(function(){
            if ($(this).val() != '') {
                sum += parseFloat($(this).val());
                sum = round(sum,2);
            }
            
        });

        $('input[name="total_area"]').val(sum)
    })


    $(document).on('click', '.save-flats-form-edit', function(e) {
        e.preventDefault()
        var kv_m = $('.kv-m').val()
        var _token = $('input[name=_token]').val()
        var _form = $('#chees-modal').serializeArray()
        const data = {};
        $.each(_form, function() {
            data[this.name] = this.value
        })
        
        var load_image = $('.kv-fileinput-caption.file-caption-disabled').length
        var _this = $(this)
        _this.prop('disabled',true)
        // 
        $('#loader_block').css('display','flex')

        if (load_image == 0) {
            $.ajax({
                url: `/house/update-flats-selected`,
                data: {
                    form: data,
                    flats: arr,
                    kv_m: kv_m,
                    _token: _token
                },
                type: 'PUT',
                success: function(data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                        window.location.reload();
                    }
                    else{
                        showToast('danger',data.message)
                        $('#loader_block').hide()
                        _this.prop('disabled',false)
                    }
                },
                
            });
        }
    })
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/edit.blade.php ENDPATH**/ ?>