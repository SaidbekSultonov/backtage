<?php
    use Modules\ForTheBuilder\Entities\Constants; 
?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('Currency')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css')); ?>">

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-12 d-flex align-items-center">                            
                            <h4 class="me-3">
                                <?php echo e(translate('Settings')); ?>

                            </h4>
                        </div>                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column w-100">
                        <?php if(Auth::user()->role_id==Constants::MANAGER): ?>
                            <a href="<?php echo e(route('forthebuilder.currency.index')); ?>"
                            class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Currencies')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.coupon.index')); ?>" class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Coupons')); ?></a>

                        <?php else: ?>
                            <a href="<?php echo e(route('forthebuilder.currency.index')); ?>"
                            class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Currencies')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.coupon.index')); ?>" class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Coupons')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.language.index')); ?>" class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Language')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.house.price-formation')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Price formation')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.installment-plan.settings')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Installment types')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.installment-plan.periods')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary ">
                                <?php echo e(translate('Installment periods')); ?>

                            </a>
                            <a href="<?php echo e(route('forthebuilder.house.price-types')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Price types')); ?></a>

                            <a href="<?php echo e(route('forthebuilder.house.company-index')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Company details')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.house.details')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Details for the contract')); ?></a>
                            <a href="<?php echo e(route('forthebuilder.house.sms-templates')); ?>"
                                class="nastroykiCont mb-2 text-start btn btn-outline-primary "><?php echo e(translate('Sms templates')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            style="border-radius: 20px !important; border: 2px solid #94B2EB; background: #F9FBFF;">
            <div class="modal-header d-flex justify-content-center">
                <div class="modalKalendarDate">28 Декабря 2022</div>
            </div>
            <div class="modal-body d-flex justify-content-center flex-column align-items-center">
                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBodyBlue">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBodyBlue">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            style="border-radius: 20px !important; border: 2px solid #94B2EB; background: #F9FBFF;">
            <div class="modal-header d-flex justify-content-center">
                <div class="modalKalendarDateBlue">20 Декабря 2022</div>
            </div>
            <div class="modal-body d-flex justify-content-center flex-column align-items-center">
                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBodyBlue">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBodyBlue">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>

                <div class="d-flex justify-content-between kalendarModalBody">
                    <div class="modalImyaKalendar">Клиентов Клиент Клиентович <br> 28.12.2022 12:12:12 Встреча</div>
                    <div class="modalDataKalendar">Ответственный: <br> <b>Менеджеров Менеджеров</b></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            style="border-radius: 20px !important; border: 2px solid #94B2EB; background: #F9FBFF;">
            <div class="modal-header d-flex justify-content-center">
                <div class="modalKalendarDateBlue">20 Декабря 2022</div>
            </div>
            <div style="height: 340px;" class="modal-body d-flex justify-content-center flex-column align-items-center">
                <h3 class="modalContentCalendarNet">На сегодня задач нет</h3>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content"
            style="border-radius: 20px !important; border: 2px solid #94B2EB; background: #F9FBFF;">
            <div style="border-top-left-radius: 20px; border-top-right-radius: 20px;"
                class="modal-body d-flex justify-content-center flex-column align-items-center">
                <div class="d-flex">
                    <div class="d-flex flex-column">
                        <button class="modalMonth">Январь</button>
                        <button class="modalMonth">Февраль</button>
                        <button class="modalMonth">Март</button>
                        <button class="modalMonth">Апрель</button>
                        <button class="modalMonth">Май</button>
                        <button class="modalMonth">Июнь</button>
                    </div>
                    <div class="d-flex flex-column">
                        <button class="modalMonth">Июль</button>
                        <button class="modalMonth">Август</button>
                        <button class="modalMonth">Сентябрь</button>
                        <button class="modalMonth">Октябрь</button>
                        <button class="modalMonth">Ноябрь</button>
                        <button class="modalMonth">Декабрь</button>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <div class="modalYearSelect">2022</div>
                        <div>
                            <div class="yearNameKalendar">2021</div>
                            <div class="yearNameKalendar">2020</div>
                            <div class="yearNameKalendar">2019</div>
                            <div class="yearNameKalendar">2018</div>
                            <div class="yearNameKalendar">2017</div>
                            <div class="yearNameKalendar">2016</div>
                            <div class="yearNameKalendar">2015</div>
                            <div class="yearNameKalendar">2014</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to logout')); ?></h4>
                <div class="d-flex justify-content-center mt-3">
                    <form style=""
                          action="<?php echo e(route('logout')); ?>"
                          method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <button type="submit" class="modalVideystvitelnoDa btn btn-outline-success me-2"><?php echo e(translate('Yes')); ?></button>
                    </form>
                    <button class="modalVideystvitelnoNet btn btn-outline-danger" data-bs-dismiss="modal"><?php echo e(translate('No')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/settings/index.blade.php ENDPATH**/ ?>