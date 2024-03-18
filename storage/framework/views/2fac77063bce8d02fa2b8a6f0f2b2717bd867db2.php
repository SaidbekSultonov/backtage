<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\HouseFlat;
    use Modules\ForTheBuilder\Entities\Constants;


?>
<?php $__env->startSection('title'); ?> <?php echo e(translate('JK')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
<style>
    .jkDataEdit1 {
        height: 100% !important;
    }

    .trashFlex {
        margin-top: -90px !important;
    }

    .jkEditData {
        min-height: 0% !important;
    }

    .select-items {
        background-color: transparent !important;
    }
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
                        <div class="col-md-10 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.house.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">                                
                                <?php if($model->room_count == 'p'): ?>
                                    <?php echo e($model->number_of_flat); ?> - <?php echo e(translate('parking')); ?> <?php echo e($model->total_area); ?> м <sup>2</sup>
                                <?php elseif($model->room_count == 'c'): ?>
                                    <?php echo e($model->number_of_flat); ?> - <?php echo e(translate('commercial')); ?> <?php echo e($model->total_area); ?> м <sup>2</sup>
                                <?php else: ?>
                                    <?php echo e($model->number_of_flat); ?> - <?php echo e(translate('flat')); ?> <?php echo e($model->total_area); ?> м <sup>2</sup>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="col-md-2 text-end">
                            <button class="downloadColor btn btn-outline-primary">
                                <div class="d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <i class="mdi mdi-printer mdi-20 me-1"></i>
                                    <div class="raspechat"><?php echo e(translate('Print')); ?></div>
                                </div>
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="bg-secondary p-3 rounded">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    
                                    <?php if(!empty($model->files)): ?> <?php $i = 0; ?>
                                        <?php $__currentLoopData = $model->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(file_exists(public_path('uploads/house-flat/' . $model->house_id . '/l_' . $value->guid))): ?>

                                                <a href="<?php echo e(asset('/uploads/house-flat/' . $model->house_id . '/l_' . $value->guid)); ?>" class="test-popup-link carousel-item text-center <?php echo e((($i == 0) ? 'active' : '')); ?>">
                                                    <img class="border rounded w-50"
                                                        src="<?php echo e(asset('/uploads/house-flat/' . $model->house_id . '/l_' . $value->guid)); ?>"
                                                        alt="Home">
                                                </a>
                                            <?php endif; ?>
                                        <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                    <?php endif; ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(translate('Attribute')); ?></th>
                                        <th><?php echo e(translate('Data')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <tr>
                                        <td><?php echo e(translate('JK')); ?></td>
                                        <td><?php echo e($model->house->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('Information')); ?></td>
                                        <td><?php echo e($model->house->description ?? ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('Entrance')); ?></td>
                                        <td><?php echo e($model->entrance); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('Floor')); ?></td>
                                        <td><?php echo e($model->floor); ?></td>
                                    </tr>
                                    <?php if(isset($model->room_count)): ?>
                                        <tr>
                                            <td><?php echo e(translate('Apartment number')); ?></td>
                                            <td><?php echo e($model->number_of_flat); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php $areas = json_decode($model->areas); ?>
                                    
                                    <?php if(isset($areas->housing) && $areas->housing > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Area')); ?></td>
                                            <td><?php echo e($areas->housing ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(isset($areas->hotel) && $areas->hotel > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Hotel')); ?></td>
                                            <td><?php echo e($areas->hotel ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    <?php if(isset($areas->hotel2) && $areas->hotel2 > 0): ?>
                                        <tr>
                                            <td>2 - <?php echo e(translate('Hotel')); ?></td>
                                            <td><?php echo e($areas->hotel2 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    
                                    <?php if(isset($areas->hotel3) && $areas->hotel3 > 0): ?>
                                        <tr>
                                            <td>3 - <?php echo e(translate('Hotel')); ?></td>
                                            <td><?php echo e($areas->hotel3 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    

                                    <?php if(isset($areas->hotel4) && $areas->hotel4 > 0): ?>
                                        <tr>
                                            <td>4 - <?php echo e(translate('Hotel')); ?></td>
                                            <td><?php echo e($areas->hotel4 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    

                                    <?php if(isset($areas->hotel5) && $areas->hotel5 > 0): ?>
                                        <tr>
                                            <td>5 - <?php echo e(translate('Hotel')); ?></td>
                                            <td><?php echo e($areas->hotel5 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    
                                    <?php if(isset($areas->bedroom) && $areas->bedroom > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Bedroom')); ?></td>
                                            <td><?php echo e($areas->bedroom ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>

                                    <?php if(isset($areas->bedroom2) && $areas->bedroom2 > 0): ?>
                                        <tr>
                                            <td>2 - <?php echo e(translate('Bedroom')); ?></td>
                                            <td><?php echo e($areas->bedroom2 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom3) && $areas->bedroom3 > 0): ?>
                                        <tr>
                                            <td>3 - <?php echo e(translate('Bedroom')); ?></td>
                                            <td><?php echo e($areas->bedroom3 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom4) && $areas->bedroom4 > 0): ?>
                                        <tr>
                                            <td>4 - <?php echo e(translate('Bedroom')); ?></td>
                                            <td><?php echo e($areas->bedroom4 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    <?php if(isset($areas->bedroom5) && $areas->bedroom5 > 0): ?>
                                        <tr>
                                            <td>5 - <?php echo e(translate('Bedroom')); ?></td>
                                            <td><?php echo e($areas->bedroom5 ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>

                                    <?php if(isset($areas->kitchen) && $areas->kitchen > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Kitchen')); ?></td>
                                            <td><?php echo e($areas->kitchen ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>

                                    <?php if(isset($areas->terraca) && $areas->terraca > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Area (Terrace)')); ?></td>
                                            <td><?php echo e($areas->terraca ?? 0); ?></td>
                                        </tr>    
                                    <?php endif; ?>
                                    <?php if(isset($areas->basement) && $areas->basement > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Area (Sokolny)')); ?></td>
                                            <td><?php echo e($areas->basement ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(isset($areas->attic) && $areas->attic > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Area (Attic)')); ?></td>
                                            <td><?php echo e($areas->attic ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if(is_int($model->room_count)): ?>
                                        <tr>
                                            <td><?php echo e(translate('Number rooms')); ?></td>
                                            <td><?php echo e($model->room_count ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if($areas->balcony > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Balcony')); ?></td>
                                            <td><?php echo e($areas->balcony ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if(isset($areas->corridor) && $areas->corridor > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Corridor')); ?></td>
                                            <td><?php echo e($areas->corridor ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if(isset($areas->bathroom) && $areas->bathroom > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Bathroom')); ?></td>
                                            <td><?php echo e($areas->bathroom ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if(isset($areas->corridor) && $areas->corridor > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Corridor')); ?></td>
                                            <td><?php echo e($areas->corridor ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if(isset($areas->other) && $areas->other > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Other')); ?></td>
                                            <td><?php echo e($areas->other ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if(isset($areas->total) && $areas->total > 0): ?>
                                        <tr>
                                            <td><?php echo e(translate('Total area')); ?></td>
                                            <td><?php echo e($areas->total ?? 0); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(translate('Attribute')); ?></th>
                                        <th><?php echo e(translate('Data')); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    <tr>
                                        <td><?php echo e(translate('Total area')); ?></td>
                                        <td><?php echo e($areas->total); ?> <?php echo e(translate('m2')); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(translate('Status')); ?></td>
                                        <td>
                                            <input type="hidden" name="status" id="flat_status_value" value="<?php echo e($model->status); ?>">
                                            <?php
                                                $selectedBooking = '';
                                                $selectedFree = '';
                                                $selectedSold = '';
                                                if ($model->status == Constants::STATUS_BOOKING) {
                                                    $selectedBooking = 'selected';
                                                } elseif ($model->status == Constants::STATUS_FREE) {
                                                    $selectedFree = 'selected';
                                                } elseif ($model->status == Constants::STATUS_SOLD) {
                                                    $selectedSold = 'selected';
                                                }
                                            ?>

                                            <?php if($model->status == Constants::STATUS_SOLD): ?>
                                                <div class="client-show-buttons showDetailsStatus p-2 bg-danger rounded">
                                                    <?php echo e(translate('Sold')); ?>

                                                </div>
                                            <?php else: ?>
                                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                                    <?php if($model->mvd == 1): ?>
                                                        <div class="client-show-buttons text-white p-2 rounded" style="background: #988659;">
                                                            <?php echo e(translate('MVD')); ?>

                                                        </div>   
                                                    <?php elseif(isset($model->booking) && $model->booking->status == 1): ?>
                                                        <a href="<?php echo e(route('forthebuilder.booking.show', $model->booking->id)); ?>" class="btn btn-warning text-white">
                                                            <?php echo e(translate('Busy')); ?>

                                                        </a>
                                                    <?php else: ?>
                                                        <select class="selectModal form-control form-control-sm " id="client_show_buttons">
                                                            <option value="<?php echo e(Constants::STATUS_SOLD); ?>"
                                                                data-select="<?php echo e(HouseFlat::STATUS_SOLD); ?>" <?php echo e($selectedSold); ?>>
                                                                <?php echo e(translate('Sold')); ?>

                                                            </option>
                                                            <option value="<?php echo e(Constants::STATUS_BOOKING); ?>"
                                                                data-select="<?php echo e(HouseFlat::STATUS_BOOKING); ?>" <?php echo e($selectedBooking); ?>>
                                                                <?php echo e(translate('Busy')); ?></option>
                                                            <option value="<?php echo e(Constants::STATUS_FREE); ?>"
                                                                data-select="<?php echo e(HouseFlat::STATUS_FREE); ?>" <?php echo e($selectedFree); ?>>
                                                                <?php echo e(translate('Free')); ?>

                                                            </option>
                                                        </select>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    
                                    <?php if(is_int($model->room_count)): ?>
                                        <tr>
                                            <td><?php echo e(translate('Registry number')); ?></td>
                                            <td><?php echo e($model->doc_number ?? $model->number_of_flat); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                        $ares_price = json_decode($model->ares_price);
                                    ?>
                                    <tr>
                                        <td><?php echo e(translate('Price for 1m2')); ?></td>
                                        <td>
                                            <?php if(!empty($ares_price) && !empty($ares_price->hundred)): ?>
                                                <?php echo e(number_format($ares_price->hundred->total,0,'.') ?? 0.0); ?>

                                            <?php else: ?>
                                                0
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    
                                    <?php if(!empty($installment_type)): ?>
                                        <?php $__currentLoopData = $installment_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($values->percent_type == 70): ?>
                                                <tr>
                                                    <td><?php echo e(translate('Price for 1m2').' '.$values->percent_type); ?>% </td>
                                                    <td>
                                                        <?php if(!empty($ares_price) && !empty($ares_price->seventy)): ?>
                                                            <?php echo e(number_format($ares_price->seventy->total,0,'.') ?? 0.0); ?>

                                                        <?php else: ?>
                                                            0
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($values->percent_type == 50): ?>
                                                <tr>
                                                    <td><?php echo e(translate('Price for 1m2').' '.$values->percent_type); ?>% </td>
                                                    <td>
                                                        <?php if(!empty($ares_price) && !empty($ares_price->fifty)): ?>
                                                            <?php echo e(number_format($ares_price->fifty->total,0,'.') ?? 0.0); ?>

                                                        <?php else: ?>
                                                            0
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($values->percent_type == 30): ?>
                                                <tr>
                                                    <td><?php echo e(translate('Price for 1m2').' '.$values->percent_type); ?>% </td>
                                                    <td>
                                                        <?php if(!empty($ares_price) && !empty($ares_price->thirty)): ?>
                                                            <?php echo e(number_format($ares_price->thirty->total,0,'.') ?? 0.0); ?>

                                                        <?php else: ?>
                                                            0
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                    
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
                <?php if(Auth::user()->role_id != Constants::GUEST && Auth::user()->role_id != Constants::MANAGER): ?>
                    <?php if($model->status != Constants::STATUS_SOLD): ?>
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-body text-end">
                                        <a href="<?php echo e(route('forthebuilder.house-flat.edit', $model->id)); ?>" class="trashBigButton btn btn-outline-success">
                                            <i class="far fa-edit mdi-20"></i>
                                        </a>
                                        <span class="trashBigButton2 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                                            <i class="fe-trash-2 mdi-20"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModalKatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog myModalWdthGallery" role="document">
        <div class="modal-content galareModalFather">
            <div class="modal-body">
                <div id="carouselExampleControls2" data-interval="10000000" class="carousel slide"
                    data-ride="carousel">
                    <div class="carousel-inner">

                        <?php if(!empty($model->main_image)): ?>
                            <?php
                                $first = true;
                            ?>
                            <?php $__currentLoopData = $model->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $class = '';
                                    if ($first) {
                                        $first = false;
                                        $class = 'active';
                                    }
                                ?>
                                <div class="carousel-item <?php echo e($class); ?>">
                                    <img class="madlImageJkEdit"
                                        src="<?php echo e(asset('/uploads/house-flat/' . $model->id . '/m_' . $img->guid)); ?>"
                                        alt="Home">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        
                    </div>
                    <div>
                        <a class="carousel-control-prev nextPrevioudFather" href="#carouselExampleControls2"
                            role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo e(translate('Previous')); ?></span>
                        </a>
                        <a class="carousel-control-next nextPrevioudFather" href="#carouselExampleControls2"
                            role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only"><?php echo e(translate('Next')); ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modalMyJk">
            <div class="modal-header border border-0">
                <h5 class="modal-title" id="exampleModalLabel"
                    style="margin-left: 30px; font-family: Rubik; margin-top: 10px; margin-bottom: -20px;"><span
                        class="number_of_flat">0</span> -
                    <?php echo e(translate('Flat')); ?> <span class="flat_area">00.00</span> <?php echo e(translate('m')); ?> 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex">
                    <div>
                        
                        <input type="hidden" class="house_flat_id" value="<?php echo e($model->id); ?>">
                        <input type="hidden" class="house_number_of_flat" value="<?php echo e($model->number_of_flat); ?>">
                        <input type="hidden" class="house_house_id" value="<?php echo e($model->house_id); ?>">
                        <input type="hidden" class="house_house_name" value="<?php echo e($model->house->name); ?>">
                        <input type="hidden" class="house_contract_number" value="<?php echo e($model->doc_number); ?>">
                        <input type="hidden" class="house_entrance" value="<?php echo e($model->entrance); ?>">
                        <input type="hidden" class="house_floor" value="<?php echo e($model->room_count); ?>">
                        <p class="flat_price d-none"><?php echo e($model->price); ?></p>
                        <?php
                            $price_m2 = 0;
                            if ($model->ares_price)
                                $price_m2 = json_decode($model->ares_price)->hundred->total;

                        ?>
                        <input type="hidden" class="house_price_m2" value="<?php echo e($price_m2); ?>">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h4>
                <div class="d-flex justify-content-center mt-3">
                    <form action="<?php echo e(route('forthebuilder.house-flat.destroy', $model->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="modalVideystvitelnoDa btn btn-outline-success me-2"><?php echo e(translate('Yes')); ?></button>
                    </form>
                    <button class="modalVideystvitelnoNet btn btn-outline-danger"><?php echo e(translate('No')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="jkAttributEdit"><?php echo e(translate('Print')); ?></h4>
            </div>
            <form action="<?php echo e(route('forthebuilder.house-flat.print', $model->id)); ?>"
                method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body modalPechat">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label mb-0"><?php echo e(translate('Valid until:')); ?></label>
                            <input class="sozdatImyaSpisokInput form-control" type="text"
                                name="date_picker" autocomplete="off" id="datePicker" value="<?php echo e(date('d.m.Y',strtotime('+14 days'))); ?>">
                        </div>

                        <div class="col-12">
                            <label class="form-label mb-0"><?php echo e(translate('Price m2')); ?></label>
                            <input class="sozdatImyaSpisokInput form-control" type="text"
                                name="price_m2" autocomplete="off" id="datePicker" value="<?php echo e($model->price/json_decode($model->areas)->total); ?>">
                        </div>

                        <div class="col-12 mt-3">
                            <select name="ins_plan" class="form-control select_ins" data-placeholder="<?php echo e(translate('Choose period')); ?>">
                                <option></option>
                                <?php if(!empty($insPlan)): ?>
                                    <?php $__currentLoopData = $insPlan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->period); ?>">
                                            <?php echo e($value->period); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="input-group mb-2">
                                <div class="input-group-text">100%</div>
                                <input type="number" class="form-control" id="hundred" name="hundred" placeholder="<?php echo e(translate('Discount percent')); ?>">
                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-text">70% &nbsp;</div>
                                <input type="number" class="form-control" id="seventy" name="seventy" placeholder="<?php echo e(translate('Discount percent')); ?>">
                            </div>

                            <div class="input-group mb-2">
                                <div class="input-group-text">50% &nbsp;</div>
                                <input type="number" class="form-control" id="fifty" name="fifty" placeholder="<?php echo e(translate('Discount percent')); ?>">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <button type="submit" class="pechatButtonModal btn btn-outline-success">
                                <?php echo e(translate('Print')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on('click','.pechatButtonModal',function(e){
        var hundred = $('#hundred').val()
        var seventy = $('#seventy').val()
        var fifty = $('#fifty').val()
        var select_ins = $('.select_ins').val()


        if(hundred == '' || seventy == '' || fifty == ''){
            e.preventDefault()
            if (hundred == '')
                $('#hundred').addClass('border-danger')
            else
                $('#hundred').removeClass('border-danger')
            if (seventy == '')
                $('#seventy').addClass('border-danger')
            else
                $('#seventy').removeClass('border-danger')
            if (fifty == '')
                $('#fifty').addClass('border-danger')
            else
                $('#fifty').removeClass('border-danger')
        }
    })

    $(function(){
        $('.select_ins').select2({
            dropdownParent: $("#exampleModal2"),
            tags: true
        })
    })
</script>

   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house-flat/show.blade.php ENDPATH**/ ?>