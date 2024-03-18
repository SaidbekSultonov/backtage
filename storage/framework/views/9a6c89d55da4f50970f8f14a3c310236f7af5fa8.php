<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Currency')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">

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
                                <?php echo e(translate('Currencies')); ?>

                            </h4>
                        </div>
                        <div class="col-md-1 text-end">
                            <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                <a href="#" class="addNewCurrency btn btn-outline-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-striped kursValyutaDataBig">
                        <thead>
                            <tr class="kursValyutaData">
                                <th class="kursValyutaUsd">
                                    <img height="30" src="<?php echo e(asset('/backend-assets/forthebuilders/images/2560px-Flag_of_the_United_States.png')); ?>" alt="Usa">
                                </th>
                                <th class="kursValyutaUsd">
                                    <img height="30" src="<?php echo e(asset('/backend-assets/forthebuilders/images/1200px-Flag_of_Uzbekistan.png')); ?>" alt="Uzb">
                                </th>
                                <th class="kursValyutaUsd">
                                    <?php echo e(translate('Date')); ?>

                                </th>
                                <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                    <th>
                                        <?php echo e(translate('Action')); ?>

                                    </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="m-0">
                            <tr class="kursValyutaData">
                                <?php if($model): ?>
                                        <td class="kursValyutaUsd">
                                            <input type="hidden" id="currencyId" class="" value="<?php echo e($model->id); ?>">
                                            <input type="text" value="<?php echo e($model->USD); ?>" class="kursValyutaWhite currencyUpdate form-control"
                                                disabled data-status="USD">
                                        </td>
                                        <td class="kursValyutaUsd">
                                            <input type="text" value="<?php echo e($model->SUM); ?>" class="kursValyutaWhite currencyUpdate form-control"
                                                disabled data-status="SUM">
                                        </td>
                                        <td class="kursValyutaUsd">
                                            <?php echo e(date('d.m.Y H:i', strtotime($model->created_at))); ?>

                                        </td>
                                        <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                                            <td>
                                                <a href="#" class="btn" id="currencyUpdateButton" title="update">
                                                    <i class="far fa-edit mdi-20 text-success"></i>
                                                </a>
                                                <form style="display: inline-block;" action="<?php echo e(route('forthebuilder.currency.destroy')); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <div  type="submit" class="btn" title="delete">
                                                        <i class="fe-trash-2 mdi-20 text-danger"></i>
                                                    </div>
                                                </form>
                                            </td>   
                                        <?php endif; ?>
                                <?php endif; ?>
                            </tr>
                            <tr class="kursValyutaData formNewCurrency d-none">
                                <td class="kursValyutaUsd">
                                    <input type="hidden" id="currencyId" class="" value="">
                                    <input type="text" value="" class="form-control kursValyutaWhite currencyUsd" data-status="USD">
                                </td>
                                <td class="kursValyutaUsd">
                                    <input type="text" value="" class="form-control kursValyutaWhite currencyUzs" data-status="SUM">
                                </td>
                                <td class="kursValyutaUsd">
                                    <input type="text" disabled class="form-control" value="<?php echo e(date('d.m.Y H:i')); ?>">
                                </td>
                                <td class="kursValyutaUsd">
                                    <span class="seaDiv currencySave btn btn-xs text-success">
                                        <i class=" fas fa-check mdi-20"></i>
                                    </span>
                                    <span class="seaDiv removeFormCurrency btn btn-xs text-danger">
                                        <i class="fe-trash-2 mdi-20"></i>
                                    </span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

                        
                        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/currency/index.blade.php ENDPATH**/ ?>