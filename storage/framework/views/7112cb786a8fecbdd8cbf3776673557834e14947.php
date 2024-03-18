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
    .file-preview {
        display: none !important;
    }
    .label_border{
        width: 1px;
        height: 100%;
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
                                <?php echo e($model->name); ?>

                            </h4>
                        </div>
                        <div class="col-md-2 text-end">
                            <a class="deleteButtonKlinetInformatsiya text-danger" data-toggle="modal" data-target="#deleteClient">
                                <i class="fe-trash-2 mdi-20"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="sozdatJkDaleData">
                        <div class="d-flex">
                            <div class="d-flex" style="overflow: auto;">
                                <?php if(empty(!$arr['list'])): ?>
                                    <?php $n = 0; ?>
                                    <?php $__currentLoopData = $arr['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $n++; ?>
                                            <div class="dalePodyedzBig border me-3 rounded p-2">
                                                <h4 class="podyedzNameDale text-center">
                                                    <?php echo e(translate('Entrance') . ' ' . ($val['entrance'] ?? '')); ?>

                                                </h4>
                                                <hr class="my-1">
                                                <?php if(empty(!$arr['list'])): ?>
                                                    <?php $__currentLoopData = $val['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
                                                    <div class="input-group mb-2 border border-info rounded flex-nowrap hover-remove-add p-1 align-items-center">
                                                        <div class="input-group-text me-1 border-info">
                                                            <?php echo e($key2); ?>

                                                        </div>
                                                            <?php $__currentLoopData = $val2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <?php
                                                                    $class = 'btn btn-secondary apartments-button btn-flat';
                                                                    $disabled = 0;
                                                                    if ($val3['room_count']) {
                                                                        $class = 'btn btn-success apartments-button btn-flat';
                                                                        $disabled = 1;
                                                                    }
                                                                ?>
                                                                <div>
                                                                    <button class="me-1 podyedzNameDaleNol padyedzNameJkSeeaGreen btn-filter-flat flat-button <?php echo e($class); ?>" disabled data-id="<?php echo e($val3['id']); ?>" data-disabled="<?php echo e($disabled); ?>" data-category="<?php echo e($val3['color_status']); ?>" data-def='0'>
                                                                        <?php echo e($val3['room_count'] ?? 0); ?>

                                                                    </button>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="floor-action">
                                                                <i class="fe-trash-2 m-1 text-danger float-left bascket-float-remove"
                                                                   data-house-id="<?php echo e($model->id); ?>"
                                                                   data-entrance="<?php echo e($val['entrance']); ?>" data-floor="<?php echo e($key2); ?>"></i>
                                                                
                                                                <i class="fas fa-plus m-1 bascket-float-add text-success" data-house-id="<?php echo e($model->id); ?>"
                                                                   data-entrance="<?php echo e($val['entrance']); ?>" data-floor="<?php echo e($key2); ?>"></i>
                                                            </div>
                                                            <div class="floor-marge-action">
                                                                <i class="fas fa-check m-1 save-bascket-float-marge text-success"
                                                                   data-house-id="<?php echo e($model->id); ?>"
                                                                   data-entrance="<?php echo e($val['entrance']); ?>" data-floor="<?php echo e($key2); ?>"></i>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="d-flex">
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='1'
                                    data-def='0'><?php echo e(translate('1 room')); ?></button>
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='2'
                                    data-def='0'><?php echo e(translate('2 room')); ?></button>
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='3'
                                    data-def='0'><?php echo e(translate('3 room')); ?></button>
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='4'
                                    data-def='0'><?php echo e(translate('4 room')); ?></button>
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='5'
                                    data-def='0'><?php echo e(translate('5 room')); ?></button>
                                <button class="btn border-info me-2 sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='c' 
                                    data-def='0'><?php echo e(translate('Commercial')); ?></button>
                                <button class="btn border-info sozdatImyaSpisokSozdatButtonJkDale room-count-button btn" data-number='p' 
                                    data-def='0'><?php echo e(translate('Parking')); ?></button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <h2 class="me-2">
                                    <div class="badge bg-secondary podyedzNameDaleNol count-rooms">0</div>    
                                </h2>
                                
                                <input placeholder="<?php echo e(translate('Apartments to description')); ?>" type="text"
                                    class="KvartirKopisaniyu show-hidden-input form-control">
                            </div>
                        </div>

                        <?php if($show_next_button): ?>
                            <input type="hidden" id="basket-id" value="<?php echo e($basket_id); ?>">
                            <button type="submit" data-toggle="modal" data-target="#exampleModalNext"
                                class="btn btn-outline-success px-5 sozdatImyaSpisokSozdatButtonSave attach-order btn"><?php echo e(translate('Next')); ?></button>
                        <?php else: ?>
                            <button type="submit" data-toggle="modal" data-target="#exampleModal"
                                class="btn btn-outline-success px-5 sozdatImyaSpisokSozdatButtonSave save-flats btn" disabled><?php echo e(translate('save')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Content-->
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form action="<?php echo e(route('forthebuilder.house.update-flats-data')); ?>" method="POST"
                    enctype="multipart/form-data" id="chees-modal">
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

                    <input type="submit" value="<?php echo e(translate('Save')); ?>"
                        class="mdodalSaxranitSozdatJkDale float-right save-flats-form btn btn-outline-success mt-3">
                    
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalNext" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
<form action="">
    <?php echo csrf_field(); ?>
</form>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script>
        let page_name = 'house';
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
                    <input type="number" name="hotel_${count}" class="modalMiniCapsule4 form-control text-left keyup_input_area">                       
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
                        <input type="number" name="bedroom_${count}" class="modalMiniCapsule4 form-control text-left keyup_input_area">                       
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

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::house.extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/basket-show-more.blade.php ENDPATH**/ ?>