<?php
    use Modules\ForTheBuilder\Entities\House;
?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/css/main.css')); ?>">
<style>
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
    .right-bar-toggle{
        padding: 0 !important;   
    }
    .plus2{
        background: #F2F2F2 !important;
        margin: 0 !important;
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
                    <div class="d-flex justify-content-center">
                        <button type="button" class="vseButton btn btn-filter btn-secondary waves-effect waves-light me-1" data-filter="all">
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
                            <span class="btn-label-right ms-0 ms-0">
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
                                            <?php
                                                $n++;
                                                if ($status == 'client') {
                                                    $house_details_url = e(url('/clients/client-show-details')) . '/' . $model->id . '/' . ($val['entrance'] ?? 0) . '/' . 0 . '/' . $client_id;
                                                } else {
                                                    $house_details_url = e(url('/house/show-details')) . '/' . $model->id . '/' . ($val['entrance'] ?? 0) . '/' . 0;
                                                }
                                            ?>
                                            <a href="<?php echo e($house_details_url); ?>" style="margin-bottom: 10px;">
                                                <div class="dalePodyedzBig">
                                                    <h2 class="podyedzNameDale">
                                                        <?php echo e(translate('Entrance') . ' ' . ($val['entrance'] ?? '')); ?>

                                                    </h2>
                                                    
                                                    <?php if(empty(!$arr['list'])): ?>
                                                        <?php $__currentLoopData = $val['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(!empty($val2)): ?>
                                                            <div class="d-flex">
                                                                <?php if($first): ?>
                                                                    <h2 class="etajNameNomerDale" style="width: 150px; margin-top: 10px;"><?php echo e($key2); ?></h2>
                                                                <?php endif; ?>
                                                                <?php $__currentLoopData = $val2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div style="min-width: 60px; height: 60px;">
                                                                        <div class="podyedzNameDaleNol padyedzNameJkSeeaGreen btn-filter-flat flat-button"
                                                                            <?php if($val3['mvd']): ?>
                                                                                style="background: #988659;border: 1px solid #988659;"
                                                                            <?php else: ?>
                                                                                style="background: <?php echo e($colors[$val3['color_status']]); ?>;border: 1px solid <?php echo e($colors[$val3['color_status']]); ?>;"
                                                                            <?php endif; ?>
                                                                            data-category="<?php echo e($val3['color_status']); ?>">
                                                                            <?php echo e($val3['room_count'] ?? 0); ?>

                                                                        </div>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                            <?php
                                                $first = false;
                                            ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>







<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body">
                <h2 class="modalVideystvitelno">Вы действительно хотите удалить</h2>
                <div class="d-flex justify-content-center mt-5">
                    <button class="modalVideystvitelnoDa" data-dismiss="modal">Да</button>
                    <button class="modalVideystvitelnoNet" data-dismiss="modal">Нет</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('forthebuilder::house.extra', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/house/show-more.blade.php ENDPATH**/ ?>