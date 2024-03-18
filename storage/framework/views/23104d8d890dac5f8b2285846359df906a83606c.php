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
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">
    <style>
    .client-show-buttons {
        left: 0 !important;
    }

    .select-items>div:nth-child(1) {
        background-color: #B1FF9D !important;
    }

    .select-items>div:nth-child(3) {
        background-color: #FF9D9D !important;
    }
    .circle_box{
        width: 30px;
        height: 30px;
        border: 1px solid #FFF;
        border-radius: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .nav-link3{
        padding: 1.5rem 1rem !important;
    }

    .add_flat{
        transition: .5s ease-in-out;
        opacity: 0;
    }
    tr:hover .add_flat{
        opacity: 1;
    }

    .dropdown_result{
        width: 65%; 
        background: #f1f1f1; 
        max-height: 220px; 
        position: absolute; 
        margin-top: 1px; 
        overflow: auto; 
        z-index: 9999;    
    }
    .right-bar-toggle{
        padding: 0 !important;   
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
                            <a href="<?php echo e(route('forthebuilder.house.show-more', $model->id)); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e($model->name); ?>

                                <?php if(!empty($model->house_number)): ?>
                                    - № <?php echo e($model->house_number); ?>

                                <?php endif; ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-filter btn-secondary waves-effect waves-light me-1" data-filter="all">
                            <?php echo e(translate('All')); ?>

                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_all']); ?>

                                </span>
                            </span>
                        </button>
                        <button class="svobodnoButton btn-filter btn btn-success waves-effect waves-light me-1" data-filter="0">
                            <?php echo e(translate('Free')); ?> 
                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_free']); ?> 
                                </span>
                            </span>
                        </button>
                        <button class="zanyatoButton btn-filter waves-effect waves-light btn btn-warning me-1" data-filter="1">
                            <?php echo e(translate('Busy')); ?> 
                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_bookings']); ?>

                                </span>
                            </span>
                        </button>
                        <button class="prodnoButton btn-filter waves-effect waves-light btn btn-danger me-1" data-filter="2">
                            <?php echo e(translate('Sold')); ?>

                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_solds']); ?>

                                </span>
                            </span>
                        </button>
                        
                        <button class="prodnoButton waves-effect waves-light btn-filter btn me-1 text-white" style="background: #988659" data-filter="5">
                            <?php echo e(translate('MVD')); ?> 
                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_mvd']); ?>

                                </span>
                            </span>

                        </button>

                        <button class="prodnoButton waves-effect waves-light btn-filter btn me-1 text-white" style="background: <?php echo e($colors[3] ?? ''); ?>;" data-filter="3">
                            <?php echo e(translate('Commercial')); ?> 
                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_commercial']); ?>

                                </span>
                            </span>

                        </button>
                        <button class="prodnoButton waves-effect waves-light btn-filter btn text-white" style="background: <?php echo e($colors[4] ?? ''); ?>;" data-filter="4">
                            <?php echo e(translate('Parking')); ?>

                            <span class="btn-label-right ms-0">
                                <span class="circle_box">
                                    <?php echo e($arr['count_park']); ?> 
                                </span>
                            </span> 
                        </button>
                    </div>
                    <hr>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50px" class="checkboxDivTextInput7222"><?php echo e(translate('Floor')); ?></th>
                                <th class="podyedzNumber"><?php echo e(translate('Entrance')); ?> № <?php echo e($arr['entrance']); ?></th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                        <?php if(empty(!$arr['list'])): ?> <?php $i = 0; ?>
                            <?php $__currentLoopData = $arr['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if(is_numeric($key)){
                                        $add_type = 1;
                                    }
                                    elseif($key == translate('basement')){
                                        $add_type = 2;   
                                    }
                                    elseif($key == translate('attic')){
                                        $add_type = 3;   
                                    }
                                    elseif($key == translate('Commercial')){
                                        $add_type = 4;   
                                    }
                                    elseif($key == translate('Parking')){
                                        $add_type = 5;   
                                    } 
                                ?>
                                <tr>
                                    <td class="jkDomNumber">
                                        <?php echo e($key); ?>

                                    </td>
                                    <td class="jkAllHouse" style="position: relative;">
                                        <?php if(empty(!$value)): ?>
                                            <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($status == 'client'): ?>
                                                    <a class="btn jkHouseGreen btn-filter-flat flat-button flat-button-open-modal p-2"
                                                        href="<?php echo e(route('forthebuilder.clients.show', [$client_id, $val['id'],'0','0'])); ?>"
                                                        <?php if($val['mvd']): ?>
                                                            style="background: #988659;border: 1px solid #988659;"
                                                        <?php else: ?>
                                                            style="background: <?php echo e($colors[$val['color_status']]); ?>;border: 1px solid <?php echo e($colors[$val['color_status']]); ?>;"
                                                        <?php endif; ?>>
                                                        <div class="jkHoueseBlueKomNumber text-white"><?php echo e($val['room_count']); ?>

                                                            <?php echo e(translate('room')); ?></div> (<?php echo e($val['number_of_flat']); ?>)

                                                        <div class="jkHouseGreeninData text-dark mt-1 py-1 px-2 bg-light rounded" style="border:1px solid #44BE26"><?php echo e($val['areas']); ?> <?php echo e(translate('m2')); ?>

                                                            <hr class="jkHouseGreeninDataHr my-1"> 
                                                            <?php echo e(number_format($val['price'], 2, '.', ' ')); ?>

                                                            <?php echo e(translate('y.e')); ?>

                                                            <br>
                                                            <?php echo e(translate('per m2')); ?>

                                                        </div>
                                                        
                                                    </a>
                                                <?php else: ?>
                                                    <?php
                                                        $perPrice = 0.0;
                                                        if ($val['ares_price']) {
                                                            $ares_price = json_decode($val['ares_price']);
                                                            $perPrice = $ares_price->hundred->total;
                                                        }
                                                    ?>
                                                    <a
                                                        class="text-dark jkHouseGreen btn-filter-flat flat-button flat-button-open-modal p-2 rounded mb-1"
                                                        type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        <?php if($val['mvd']): ?>
                                                            style="background: #988659;border: 1px solid #988659;"
                                                        <?php else: ?>
                                                            style="background: <?php echo e($colors[$val['color_status']]); ?>;border: 1px solid <?php echo e($colors[$val['color_status']]); ?>;"
                                                        <?php endif; ?>
                                                        data-mvd="<?php echo e($val['mvd']); ?>"
                                                        <?php if(isset($val['booking_id'])): ?>
                                                            data-booking="<?php echo e($val['booking_id']); ?>"
                                                            data-booking-date="<?php echo e($val['booking_date']); ?>"
                                                        <?php else: ?>
                                                            data-booking="0"
                                                        <?php endif; ?>
                                                        data-category="<?php echo e($val['color_status']); ?>"
                                                        data-price="<?php echo e($val['price']); ?>"
                                                        data-room_count="<?php echo e($val['room_count']); ?>" 
                                                        data-areas="<?php echo e($val['areas']); ?>"
                                                        data-price_m2="<?php echo e($perPrice); ?>" 
                                                        data-client="<?php echo e($val['client']); ?>"
                                                        data-client-id="<?php echo e(((isset($val['client_id'])) ? $val['client_id'] : '')); ?>"
                                                        data-number_of_flat="<?php echo e($val['number_of_flat']); ?>"
                                                        data-status="<?php echo e($val['color_status']); ?>" data-house_flat_id="<?php echo e($val['id']); ?>"
                                                        data-house_house_id="<?php echo e($val['house_id']); ?>"
                                                        data-house_house_name="<?php echo e($val['color_status']); ?>"
                                                        data-house_contract_number="<?php echo e($val['color_status']); ?>"
                                                        data-house_entrance="<?php echo e($arr['entrance']); ?>"
                                                        data-house_floor="<?php echo e($val['floor']); ?>" data-doc="<?php echo e($val['doc']); ?>">
                                                        <div class="jkHoueseBlueKomNumber text-white">
                                                            <?php 
                                                                if ($val['room_count'] == 'c') {
                                                                    echo translate('Commercial');
                                                                }
                                                                elseif ($val['room_count'] == 'p') {
                                                                    echo translate('Parking');
                                                                }
                                                                else{
                                                                    echo $val['room_count'].' '.translate('room');
                                                                    echo " (".$val['number_of_flat'].")";
                                                                }
                                                            ?>
                                                        </div>
                                                        <div class="jkHouseGreeninData mt-1 py-1 px-2 bg-light rounded " style="border: 1px solid <?php echo e($colors[$val['color_status']]); ?>;"><?php echo e($val['areas']); ?> <?php echo e(translate('m2')); ?>

                                                            <hr class="jkHouseGreeninDataHr my-1">
                                                            <?php echo e(number_format($perPrice, 0, ',', '.')); ?>

                                                            <br>
                                                            <?php echo e(translate('per m2')); ?>

                                                        </div>

                                                        
                                                    </a>
                                                <?php endif; ?>
                                                <?php $i = 1; ?>
                                                
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <span class="px-3"></span>
                                            <a href="<?php echo e(route('forthebuilder.house-flat.add', $house_id.'_'.$add_type)); ?>" class="btn btn-primary add_flat">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLgLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modalMyJk">
            <div class="modal-header border border-0">
                <h4 class="modal-title" id="exampleModalLabel">
                    <span class="number_of_flat">0</span> 
                    - <?php echo e(translate('Flat')); ?> 
                    <span class="flat_area">00.00</span> 
                    <?php echo e(translate('m')); ?> 2
                </h4>
                <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <hr class="my-1">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="w-100 h-100 border rounded">
                            <img class="img-fluid" src="<?php echo e(asset('backend-assets/forthebuilders/images/a6d5ae15f8f52bd6b9db53be7746c650 1.png')); ?>" alt="JkDom">    
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    <div class="modalJkData">
                                        <?php echo e(translate('Price')); ?>: 
                                        <span class="modalJkYeuro">
                                            <b><span class="flat_price">0000.00</span></b>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="modalJkData">
                                        <?php echo e(translate('Room count')); ?>: 
                                        <span class="modalJkYeuro2 flat_room_count">
                                            <b>0</b>
                                        </span>
                                    </div>            
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-select modalSelect">
                                        <select class="<?php echo (( Auth::user()->role_id != Constants::GUEST ) ? 'selectModal' : '') ?>  selectModalDiv2 form-control" id="select5">
                                            <option value="0"><?php echo e(translate('Status')); ?></option>
                                            <option data-select="<?php echo e(HouseFlat::STATUS_FREE); ?>"
                                                value="<?php echo e(HouseFlat::STATUS_FREE); ?>">
                                                <?php echo e(translate('Free')); ?></option>
                                            <option data-select="<?php echo e(HouseFlat::STATUS_BOOKING); ?>" id="zanyatiOption"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal2"
                                                value="<?php echo e(HouseFlat::STATUS_BOOKING); ?>">
                                                <?php echo e(translate('Busy')); ?></option>
                                            <option data-select="<?php echo e(HouseFlat::STATUS_SOLD); ?>"
                                                value="<?php echo e(HouseFlat::STATUS_SOLD); ?>">
                                                <?php echo e(translate('Sold')); ?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="client-show-buttons showDetailsStatus d-none">
                                        <?php echo e(translate('Sold')); ?>

                                    </div>
                                    <div class="client-show-buttons showMvd d-none">
                                        <?php echo e(translate('MVD')); ?>

                                    </div>
                                    <a href="" class="client-show-buttons showBooking d-none btn btn-outline-warning">
                                        <?php echo e(translate('Busy')); ?>

                                    </a>
                                    <span class="ms-2 showBooking d-none showBookingDate"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <div>
                                        <a href="<?php echo e(route('forthebuilder.house-flat.show', 0)); ?>" type="button"
                                            class="modalPodrobnoButton btn btn-outline-primary"><?php echo e(translate('Details')); ?></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="modalJkDataFio flat_client_fio">
                                        <?php echo e(translate('F.I.O')); ?>

                                        <div class="modalJkFioM">
                                            <?php echo e(translate('No data')); ?>

                                        </div>
                                    </div>

                                    <input type="hidden" class="house_flat_id" value="">
                                    <input type="hidden" class="house_number_of_flat" value="">
                                    <input type="hidden" class="house_house_id" value="">
                                    <input type="hidden" class="house_house_name" value="">
                                    <input type="hidden" class="house_contract_number" value="">
                                    <input type="hidden" class="house_entrance" value="">
                                    <input type="hidden" class="house_floor" value="">
                                    <input type="hidden" class="room_count" value="">
                                    <input type="hidden" class="house_price_m2" value="">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLgLabel2"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="modal-form" action="<?php echo e(route('forthebuilder.booking.store')); ?>" method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content modalMyJk2">
                <div class="modal-header align-items-center">
                    <h4 class="m-0"><?php echo e(translate('To book')); ?></h4>
                    <button type="button" class="close btn btn-xs btn-light" data-bs-dismiss="modal" aria-label="Close">
                        <span id="closeSpan" aria-hidden="true">&times;</span>
                    </button>
                </div>
                                
                <div class="modal-body">
                    <table class="table-bordered table-striped table table-sm">
                        <tr>
                            <td><?php echo e(translate('Number of rooms')); ?>: <b class="apartment_number"></b></td>
                            <td><?php echo e(translate('Price per sq/m')); ?>: <b class="apartment_price_m2"></b></td>
                        </tr>
                        <tr>
                            <td><?php echo e(translate('Total area')); ?>: <b class="apartment_area"></b><b> m2</b></td>
                            <td><?php echo e(translate('Apartment price m2')); ?>: <b class="apartment_price"></b></td>
                        </tr>
                    </table>
                    <input class="booking-client_id" type="hidden" name="client_id"
                        value="<?php echo e(old('client_id')); ?>">
                    <input class="booking-house_flat_id" type="hidden" name="house_flat_id"
                        value="<?php echo e(old('house_flat_id')); ?>">
                    <input class="booking-house_number_of_flat" type="hidden" name="house_number_of_flat"
                        value="<?php echo e(old('house_number_of_flat')); ?>">
                    <input class="booking-house_house_id" type="hidden" name="house_house_id"
                        value="<?php echo e(old('house_house_id')); ?>">
                    <input class="booking-house_house_name" type="hidden" name="house_house_name"
                        value="<?php echo e(old('house_house_name')); ?>">
                    <input class="booking-house_contract_number" type="hidden" name="house_contract_number"
                        value="<?php echo e(old('house_contract_number')); ?>">
                    <input class="booking-house_entrance" type="hidden" name="house_entrance"
                        value="<?php echo e(old('house_entrance')); ?>">
                    <input class="booking-house_floor" type="hidden" name="house_floor"
                        value="<?php echo e(old('house_floor')); ?>">
                    <div class="row">
                        <div class="sozdatImyaSpsok col-4 mb-2">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('First name')); ?></label>
                            <input
                                class="form-control sozdatImyaSpisokInput keyUpName booking-first_name <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"
                                autocomplete="off">
                                <div class="keyUpNameResult d-none dropdown_result rounded"></div>
                                <span class="select2-dropdown select2-dropdown--below"
                                    style="width: 610px; position: absolute; background: lightgrey; display: none; max-height: 177px; overflow: scroll;">
                                    <span class="select2-results">
                                        <ul class="select2-results__options" role="tree" aria-multiselectable="true"
                                            id="select2-0obe-results" aria-expanded="true" aria-hidden="false"
                                            style="padding: 0;">
                                        </ul>
                                    </span>
                                </span>

                                <span class="error-data">
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

                        <div class="sozdatImyaSpsok col-4 mb-2">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Last name')); ?></label>
                            <input
                                class="form-control sozdatImyaSpisokInput keyUpName booking-last_name <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('last_name')); ?>" type="text" name="last_name">
                            <div class="keyUpNameResult d-none dropdown_result rounded"></div>
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

                        <div class="sozdatImyaSpsok col-4 mb-2">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Middle name')); ?></label>
                            <input
                                class="form-control sozdatImyaSpisokInput keyUpName booking-middle_name <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('middle_name')); ?>" type="text" name="middle_name">
                            <div class="keyUpNameResult d-none dropdown_result rounded"></div>
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
                    </div>

                    <div class="row">
                        <div class="col-6 mb-2">

                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Phone number')); ?></label>
                            <div class="input-group mb-2">
                                <div class="input-group-text">+998</div>
                                <input class="form-control sozdatImyaSpisokInputTel keyUpName booking-phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('phone')); ?>" type="tel" id="phone" name="phone" required="">
                            </div>
                            <div class="keyUpNameResult d-none"></div>
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
                        <div class="col-6 mb-2">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Additional phone number')); ?></label>
                            <div class="input-group mb-2">
                                <div class="input-group-text">+998</div>
                                <input class="form-control sozdatImyaSpisokInputTel keyUpName booking-additional_phone <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('additional_phone')); ?>" type="tel" id="additional_phone" name="additional_phone">
                            </div>
                            <div class="keyUpNameResult d-none"></div>
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

                        <div class="col-6 mb-2">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Serial number of the passport')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput keyUpName booking-series_number <?php $__errorArgs = ['series_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('series_number')); ?>" type="text" name="series_number">
                            <div class="keyUpNameResult d-none"></div>
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

                        <div class="col-6 mb-2">
                            <label class="form-label font-weight-bold m-0">
                                <?php echo e(translate('Issued by (Date of issue and expiration date)')); ?></label>
                            <input style="width: 100% !important;" 
                                class="sozdatImyaSpisokInputProdnoBig booking-given_date form-control <?php $__errorArgs = ['given_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('given_date')); ?>" type="text" name="given_date" id="given_date" placeholder="<?php echo e(date('d.m.2000')); ?>" autocomplete="off">
                            <span class="error-data">
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

                        <div class="col-12 mb-2">
                            <label class="form-label font-weight-bold m-0"><?php echo e(translate('Issued by')); ?></label>
                            <input style="width: 100% !important;" 
                                class="sozdatImyaSpisokInputProdnoBig booking-issued_by form-control <?php $__errorArgs = ['issued_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(old('issued_by')); ?>" type="text" name="issued_by" id="issued_by">
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

                        <div class="col-6 mb-2">
                            <label class="form-label font-weight-bold m-0"><?php echo e(translate('Prepayment amount')); ?></label>
                            <input type="checkbox" name="prepayment" id="prepayment" checked class="invisible">
                            <input class="form-control sozdatImyaSpisokInput booking-prepayment_summa <?php $__errorArgs = ['prepayment_summa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('prepayment_summa')); ?>" type="text" name="prepayment_summa">
                            <span class="error-data">
                                <?php $__errorArgs = ['prepayment_summa'];
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

                        <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                            <div class="col-6 mb-2">
                                <label class="form-label font-weight-bold m-0">
                                    <?php echo e(translate('Booking period')); ?>

                                </label>
                                <input class="sozdatImyaSpisokInput booking_period form-control" type="text" name="booking_period" placeholder="<?php echo e(translate('Indefinite period')); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success sozdatImyaSpisokSozdatButton">
                        <?php echo e(translate('Create')); ?>

                    </button>
                </div>
            </div>
        </form>
    </div>
</div>





<script src="<?php echo e(asset('/backend-assets/forthebuilders/toastr/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/jquery.maskedinput.min.js')); ?>"></script>
<script>
    let page_name = 'house'

    $(document).on('click', '#closeSpan', function(e) {
        $('#exampleModal2').addClass('d-none')
        $('#exampleModal').removeClass('d-none')
    })
</script>
 <script>
    $(document).ready(function() {
        $('.sozdatImyaSpisokInputTel').mask("(99) 999-99-99");

        let sessionWarning = "<?php echo e(session('warning')); ?>";
        if (sessionWarning) {
            toastr.warning(sessionWarning)
        }
    });
    $(function(){
        $('.booking-given_date').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true
        })
        // booking_period
        $('.booking_period').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true
        })
    })

    $(document).on('change','.mvd_check',function(){
        var id = $(this).attr('data-id')
        var _this = $(this)

        $.ajax({
            url: `/house/mvd`,
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                if (data.status == 'success') {
                    toastr.success('Success');
                    if (_this.is(':checked')){
                        _this.prev('a').css({'background':'#988659', 'border-color': '#988659'})
                        _this.prev('a').attr('data-mvd',1)
                    } 
                    else{
                        _this.prev('a').css({'background': _this.attr('data-color'), 'border-color': _this.attr('data-color')})
                        _this.attr('data-mvd',0)
                    }
                }   
                else{
                    toastr.warning('Error');   
                }
            },
        });
    })
    

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('forthebuilder::house.extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/show-details.blade.php ENDPATH**/ ?>