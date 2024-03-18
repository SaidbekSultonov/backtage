<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Booking')); ?>

<?php $__env->stopSection(); ?>

<style>
    .select-items > div:nth-child(2) {
        background-color: #B1FF9D !important;
    }
    .nav-link3{
        height: 70px;
        display: flex !important;
        align-items: center !important;
    }
</style>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
  
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-12 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.booking.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Booking')); ?>

                            </h4>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php if(Session::has('message')): ?>
                        <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                    <div class="row w-100">
                        <div class="col-sm-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th><?php echo e(translate('Client Full Name')); ?></th>
                                    <td>
                                        <a href="<?php echo e(route('forthebuilder.clients.show', [$model->client_id, '0', '0'])); ?>">
                                             <?php
                                                echo ($model->client_first_name ?? '') . ' ' . ($model->client_last_name ?? '') . ' ' . ($model->client_middle_name ?? '');
                                            ?>   
                                        </a>
                                         
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Phone')); ?></th>
                                    <td>
                                        <?php echo (($model->phone) ? $model->phone : '<span class="text-muted">'.translate('Not specified').'</span>') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Passport data ')); ?></th>
                                    <td>
                                        <?php echo (($model->series_number) ? $model->series_number : '<span class="text-muted">'.translate('Not specified').'</span>') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Booking period')); ?></th>
                                    <td>
                                        <?php
                                            if ($model->expire_dates) {
                                                $array = json_decode($model->expire_dates);
                                                $array = end($array);
                                                echo date('d.m.Y',strtotime($array->date)) ?? translate('Not specified');
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Apartment')); ?></th>
                                    <td>
                                        <a href="<?php echo e(route('forthebuilder.house-flat.show', $model->house_flat_id)); ?>">
                                            <?php echo e($model->number_of_flat); ?>    
                                        </a>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('House name')); ?></th>
                                    <td><?php echo e($model->house_name); ?></td>
                                </tr>
                                
                                <tr>
                                    <th><?php echo e(translate('Corpus')); ?></th>
                                    <td><?php echo e($model->corpus); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Entrance')); ?></th>
                                    <td><?php echo e($model->entrance); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Floor')); ?></th>
                                    <td><?php echo e($model->floor); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Prepayment')); ?></th>
                                    <td><?php echo e((int) $model->prepayment); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Booking date')); ?></th>
                                    <td>
                                        <?php echo e(date('d.m.Y', strtotime($model->created_at))); ?>

                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-sm-6">
                            <div class="border rounded p-2 mb-3">
                                <b><?php echo e(translate('Responsible')); ?>:</b>
                                <span>
                                    <?php
                                        echo $model->manager_first_name . ' ' . $model->manager_last_name . ' ' . $model->manager_middle_name;
                                    ?>
                                </span>
                            </div>
                            
                                
                            <div class="border rounded p-2 mb-3">
                                <?php if($model->guid != null && file_exists('uploads/house-flat/' . $model->house_id . '/m_' . $model->guid)): ?>
                                
                                    <img class="img-fluid homeSozdatImage1272" src="<?php echo e(asset('uploads/house-flat/' . $model->house_id . '/m_' . $model->guid)); ?>" alt="Home">
                                <?php else: ?>
                                    <img class="img-fluid homeSozdatImage1272" src="<?php echo e(asset('/backend-assets/forthebuilders/images/a6d5ae15f8f52bd6b9db53be7746c650 1.png')); ?>" alt="Home">
                                <?php endif; ?>
                            </div>
                            
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <?php if($model->hf_status == 2): ?>
                                    <p class="alert alert-danger"><?php echo e(translate('This flat already sold!')); ?></p>
                                <?php else: ?>
                                    <div class="d-flex dropdownsBron">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-primary modalYearSelect2 dropdown-toggle" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(translate('Booking status')); ?></button>
                                            <div class="dropdown-menu dropdownBodyKalendar" aria-labelledby="dropdownMenuButton"
                                                x-placement="bottom-start"
                                                style="position: absolute; transform: translate3d(0px, 37px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                <?php if($model->status == 1): ?>  
                                                    <a class="dropdown-item sold" href="#"><?php echo e(translate('Sell')); ?></a>
                                                    <a class="dropdown-item yearNameKalendar2"  data-toggle="modal" data-target="#exampleModal2" href="#"><?php echo e(translate('Extend')); ?></a>
                                                    <a class="dropdown-item yearNameKalendar2" href="<?php echo e(route('forthebuilder.booking.destroy', [$model->id])); ?>"><?php echo e(translate('Stop')); ?></a>
                                                <?php else: ?>
                                                    <a class="dropdown-item yearNameKalendar2"  data-toggle="modal" data-target="#exampleModal2" href="#"><?php echo e(translate('Extend')); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                            
                                        <?php if($model->status == 0): ?>  
                                            <div class="custom-select ms-auto btn btn-danger">
                                                <?php echo e(translate('Not active')); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="custom-select ms-auto btn btn-success">
                                                <?php echo e(translate('Active')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    


<div class="modal fade" id="exampleModal2" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="modal-form" action="<?php echo e(route('forthebuilder.booking.period.update')); ?>" method="POST"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="booking_id" value="<?php echo e($model->id); ?>">
            <div class="modal-content modalMyJk2">
                
                <div class="modal-header border border-0">
                    <div class="d-flex justify-content-between w-100">
                        <h4><?php echo e(translate('To book')); ?></h4>
                        <button type="button" class="close btn btn-light" data-dismiss="modal" aria-label="Close">
                            <span id="closeSpan" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <hr class="my-0">
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-sm">
                        <tr>
                            <td>
                                <?php echo e(translate('Apartment number')); ?>: 
                                <b>
                                    <?php echo e($model->house_name); ?> 
                                    <?php echo e($model->house_corpus); ?> 
                                    <?php echo e($model->number_of_flat); ?>

                                </b>
                            </td>
                            <td>
                                <?php
                                    $arr = json_decode($model->areas);
                                ?>
                                <?php echo e(translate('Price m2')); ?>:
                                <b>
                                   <?php echo e(number_format($model->price/$arr->total,0,'',' ')); ?>  
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo e(translate('Total area')); ?>:
                                <b>
                                    <?php echo e($arr->total); ?>

                                </b>
                            </td>
                            <td>
                                <?php echo e(translate('Apartment price')); ?>:
                                <b><?php echo e(number_format($model->price,0,'',' ')); ?></b> 
                            </td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('First name')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput keyUpName booking-first_name <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                type="text" name="first_name" value="<?php echo e($model->client_first_name); ?>"
                                autocomplete="off" readonly>
                            <div class="keyUpNameResult d-none"
                                style="width: 65%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                            </div>
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
                        <div class="col-4 mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Last name')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput keyUpName booking-last_name <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e($model->client_last_name); ?>" type="text" name="last_name" readonly>
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
                        <div class="col-4 mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Middle name')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput keyUpName booking-middle_name <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e($model->client_middle_name); ?>" type="text" name="middle_name" readonly>
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

                        <div class="col-6 mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Phone number')); ?></label>
                            <div class="input-group">
                                <div class="input-group-text">+998</div>
                                <input class="form-control sozdatImyaSpisokInputTel keyUpName booking-phone <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->phone); ?>" type="tel" id="phone" name="phone" readonly>
                                <div class="keyUpNameResult d-none"
                                    style="width: 100%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                            </div>
                            <span class="error-data">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('additional_phone_number')); ?></label>
                            <div class="input-group">
                                <div class="input-group-text">+998</div>
                                <input class="form-control sozdatImyaSpisokInputTel keyUpName booking-additional_phone <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->additional_phone); ?>" type="tel" id="additional_phone" name="additional_phone" readonly>
                                <div class="keyUpNameResult d-none"
                                    style="width: 100%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
                                </div>
                            </div>
                            <span class="error-data">
                                <?php $__errorArgs = ['additional_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </span>
                        </div>

                        <div class="<?php echo e(((Auth::user()->role_id == Constants::SUPERADMIN) ? 'col-4' : 'col-6')); ?> mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Serial number of the passport')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput keyUpName booking-series_number <?php $__errorArgs = ['series_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e($model->series_number); ?>" type="text" name="series_number" readonly>
                            <div class="keyUpNameResult d-none"
                                style="width: 100%; background: lightgrey; max-height: 220px; position: absolute; margin-top: 75px; overflow: scroll; border-radius: 15px;">
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
                        <div class="<?php echo e(((Auth::user()->role_id == Constants::SUPERADMIN) ? 'col-4' : 'col-6')); ?> mb-3">
                            <label class="sozdatImyaSpisokH3"><?php echo e(translate('Prepayment amount')); ?></label>
                            <input class="form-control sozdatImyaSpisokInput booking-prepayment_summa" value="<?php echo e((int) $model->prepayment); ?>" type="number" name="prepayment_summa">
                        </div>

                        <?php if(Auth::user()->role_id == Constants::SUPERADMIN): ?>
                            <div class="col-4 mb-3">
                                <label class="sozdatImyaSpisokH3" ><?php echo e(translate('Booking period')); ?></label>
                                <input id="dateInput" placeholder="<?php echo e(date('Y-m-d')); ?>" type="text" name="date_deal"
                                    class="form-control datepicker sozdatImyaSpisokSelectOptionJkProdnoDate <?php $__errorArgs = ['date_deal'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    >
                                <span class="error-data">
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
                        <?php endif; ?>
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-success sozdatImyaSpisokSozdatButton">
                                <?php echo e(translate('Create')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="house_flat_id" data-id="<?php echo e($model->house_flat_id); ?>"></div>
<div class="client_id" data-id="<?php echo e($model->client_id); ?>"></div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
<script>
    let page_name = 'page-booking';
    $(function(){
        $('#dateInput').datepicker({
            dropdownParent: $("#exampleModal2"),
            autoclose: true,
            format: 'dd.mm.yyyy'
        })

        $('#option_status').select2()
    })

    $(document).on('click','.sold',function(){
        var id = $('.house_flat_id').attr('data-id')
        var client_id = $('.client_id').attr('data-id')
        location.href = "/deal/create?house_flat_id="+id+'&client_id='+client_id
    })
    
</script>
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/booking/show.blade.php ENDPATH**/ ?>