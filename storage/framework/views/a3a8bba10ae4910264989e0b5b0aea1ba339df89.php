<style>
    .display-none {
        display: none;
    }

    .notification_content {
        position: absolute;
        z-index: 100;
    }

    .language_flag {
        position: absolute;
        z-index: 1;
        margin-top: 70px;
    }
    .w-400{
        width: 400px;
    }
    .app-search{
        max-width: 100% !important;
    }
    .simplebar-content a:nth-child(even){
        background: #F1F1F1;
    }
    .font-20{
        font-size: 24px !important;
    }
    .noti-icon-badge{
        width: 18px !important;
        height: 18px !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }
</style>
<!-- Topbar Start -->
<div class="navbar-custom bg-light">
    <ul class="list-unstyled topnav-menu float-end mb-0">
        <li class="d-none d-lg-block w-400">
            <form class="app-search w-100">
                <div class="app-search-box">
                    <?php
                        $arrIcons = [
                            'fe-home',
                            'mdi mdi-clipboard-outline',
                            'mdi mdi-handshake-outline',
                            'fas fa-file-contract',
                            'fas fa-users',
                            'mdi mdi-account-multiple-plus-outline',
                            'mdi mdi-checkerboard',
                            'mdi mdi-checkerboard-plus',
                            'mdi mdi-calendar-month-outline',
                            'mdi mdi-lock-check-outline',
                            'mdi mdi-calculator',
                            'fas fa-user-cog',
                            'fas fa-user-plus',
                            'mdi mdi-cog-outline',
                            'fas fa-dollar-sign'
                        ];
                        $arrSearch = [
                            route('forthebuilder.index') => translate('Home'),
                            route('forthebuilder.task.index') => translate('Task list'),
                            route('forthebuilder.deal.index') => translate('Deal list'),
                            route('forthebuilder.clients.index') => translate('Deals with clients'),
                            route('forthebuilder.clients.all-clients') => translate('All clients'),
                            route('forthebuilder.clients.create', '0') => translate('Creating a new client'),
                            route('forthebuilder.house.index') => translate('JK list'),
                            route('forthebuilder.house.create') => translate('Create a new JK'),
                            route('forthebuilder.clients.calendar') => translate('Task calendar'),
                            route('forthebuilder.booking.index') => translate('Booking list'),
                            route('forthebuilder.installment-plan.index') => translate('Installment plan list'),
                            route('forthebuilder.user.index') => translate('User list'),
                            route('forthebuilder.user.create') => translate('Create a new user'),
                            route('forthebuilder.settings.index') => translate('Settings list'),
                            route('forthebuilder.currency.index') => translate('Currencies list'),
                        ];
                    ?>

                    
                    
                    <div class="input-group">
                        <input type="text" class="form-control searchInput" placeholder="<?php echo e(translate('Search')); ?>..." id="top-search">
                        <button class="btn input-group-text" type="submit">
                            <i class="fe-search"></i>
                        </button>
                    </div>

                    <div class="searchMainDiv d-none bg-white rounded" style="position: absolute;">
                        <ul class="list-unstyled">
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $arrSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="searchLi d-none">
                                        <a href="<?php echo e($key); ?>" class="dropdown-item notify-item">
                                            <i class="<?php echo $arrIcons[$i] ?> me-2"></i>
                                            <span><?php echo e($value); ?></span>
                                        </a>
                                    </li>
                                <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </form>
        </li>

        <li class="dropdown d-inline-block d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                <form class="p-3">
                    <input type="text" class="form-control searchInput" placeholder="" id="top-search">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect waves-light pe-0" href="<?php echo e(route('forthebuilder.clients.calendar')); ?>">
                <i class="mdi mdi-calendar-month-outline font-20"></i>
            </a>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <?php
                if(isset($all_notifications['all_task']) && isset($all_notifications['all_booking']) && isset($all_notifications['all_installment_plan'])){
                   $all_count = count($all_notifications['all_task']) + count($all_notifications['all_booking']) + count($all_notifications['all_installment_plan']);
               }else{
                   $all_count = 0;
               }
            ?>
            <a class="nav-link nav-link3 dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span class="badge bg-danger rounded-circle noti-icon-badge"><?php echo e($all_count); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <span class="text-dark clear_notification">
                                <small class="text-danger btn p-0"><?php echo e(translate('Clear all')); ?></small>
                            </span>
                        </span><?php echo e(translate('Notifications')); ?>

                    </h5>
                </div>
                <hr class="my-1">
                <div class="noti-scroll" data-simplebar>

                    <?php if($all_count > 0): ?>
                        <?php $__currentLoopData = $all_notifications['all_booking']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking_notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                              $notification_data = json_decode($booking_notification->data);
                            ?>
                            <?php switch($booking_notification->type):
                                case ('Booking'): ?>

                                <a href="<?php echo e(route('forthebuilder.booking.show', $notification_data->id)); ?>" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="<?php echo e(asset('/uploads/flat/booking.png')); ?>" class="rounded-circle avatar-xs" alt="" /> 
                                    </div>
                                    <p class="notify-details">
                                        <?php echo e($notification_data->first_name . ' ' . $notification_data->last_name); ?>

                                    </p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>
                                            <?php echo e(date('m/d h:i', strtotime($notification_data->updated_at))); ?>

                                        </small>
                                    </p>
                                </a>
                                <?php break; ?>
                                <?php case ('BookingPrepayment'): ?>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $notification_data->id)); ?>" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="<?php echo e(asset('/uploads/flat/booking.png')); ?>" class="rounded-circle avatar-xs" alt="" /> 
                                        </div>
                                        <p class="notify-details">
                                             <?php echo e($notification_data->first_name . ' ' . $notification_data->last_name); ?>

                                        </p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>
                                                <?php echo e(translate('1 day left until the booking period ends')); ?>

                                            </small>
                                        </p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>
                                                <?php echo e(date('m/d h:i', strtotime($notification_data->updated_at))); ?>

                                            </small>
                                        </p>
                                    </a>
                                <?php break; ?>
                                <?php case ('BookingDelete'): ?>
                                    <a href="<?php echo e(route('forthebuilder.booking.show', $notification_data->id)); ?>" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="<?php echo e(asset('/uploads/flat/booking.png')); ?>" class="rounded-circle avatar-xs" alt="" />
                                        </div>
                                        <p class="notify-details">
                                             <?php echo e($notification_data->first_name . ' ' . $notification_data->last_name); ?>

                                        </p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>
                                                <?php echo e(translate('The booking has expired and the flat is vacated.')); ?>

                                            </small>
                                        </p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>
                                                <?php echo e(date('m/d h:i', strtotime($notification_data->updated_at))); ?>

                                            </small>
                                        </p>
                                    </a>
                                <?php break; ?>
                            <?php endswitch; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $all_notifications['all_installment_plan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $installment_notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $installment_data = json_decode($installment_notification->data);
                            ?>

                            <a href="<?php echo e(route('forthebuilder.installment-plan.show', $installment_data->id)); ?>" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <img src="<?php echo e(asset('/uploads/flat/installment_plan.avif')); ?>" class="rounded-circle avatar-xs" alt="" /> 
                                </div>
                                <p class="notify-details">
                                     <?php echo e($installment_data->first_name . ' ' . $installment_data->last_name); ?>

                                </p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>
                                        <?php echo e(translate('Installment plan period is expired')); ?>

                                    </small>
                                </p>
                                <p class="text-muted mb-0 user-msg">
                                    <small>
                                        <?php echo e(date('m/d h:i', $installment_data->expire_dates)); ?>

                                    </small>
                                </p>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $all_notifications['all_task']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $notification_data = json_decode($task_notification->data);
                            ?>  
                            <a href="<?php echo e(route('forthebuilder.clients.show', [$notification_data->client_id, '0', $notification_data->id])); ?>" class="dropdown-item notify-item">
                                <div class="notify-icon">
                                    <?php
                                        $sms_avatar = public_path('/uploads/user/' . $notification_data->performer_id . '/s_' . $notification_data->performer_avatar);
                                    ?>
                                    <?php if(file_exists($sms_avatar)): ?>

                                        <img src="<?php echo e(asset('/uploads/user/' . $notification_data->performer_id . '/s_' . $notification_data->performer_avatar)); ?>" class="rounded-circle avatar-xs" alt="" /> 
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" class="rounded-circle avatar-xs" alt="" /> 
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="notify-details mb-0">
                                     <?php echo e($notification_data->title); ?>

                                </div>
                                <?php if($notification_data->type == 'Связаться'): ?>
                                    <div class="notify-icon">
                                        <i class="mdi mdi-phone text-success"></i>
                                        <?php echo e(translate('with') . ' '); ?>

                                    </div>
                                    <small class="text-muted"><?php echo e(translate('call')); ?></small><br>
                                    <small class="text-muted"><?php echo e($notification_data->client_fio); ?></small>
                                <?php else: ?>
                                    <div class="notify-icon">
                                        <i class="mdi mdi-account-reactivate-outline text-primary"></i>
                                        <?php echo e(translate('with' . ' ')); ?>

                                    </div>
                                    <small class="text-muted"><?php echo e(translate('meeting')); ?></small><br>
                                    <small class="text-muted"><?php echo e($notification_data->client_fio); ?></small>
                                <?php endif; ?>
                                <p class="text-muted mb-0 user-msg text-end">
                                    <small>
                                       <?php echo e((($notification_data->task_date) ? date('d.m.Y H:i',strtotime($notification_data->task_date)) : '')); ?>

                                    </small>
                                </p>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <!-- item-->
                        <a href="<?php echo e(route('forthebuilder.installment-plan.show', ((isset($installment_data)) ? $installment_data->id : ''))); ?>" class="dropdown-item notify-item">
                            <p class="text-muted mb-0 user-msg">
                                <b class="m-0"><?php echo e(translate('No new notifications')); ?></b>
                            </p>
                        </a>
                    <?php endif; ?>
                </div>
                
            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <?php
                        if (session()->has('locale')) {
                            $locale = session('locale');
                        } else {
                            $locale = env('DEFAULT_LANGUAGE', 'ru');
                        }
                    ?>
                    <?php switch($locale):
                        case ('uz'): ?>
                            <img class="rounded-circle" id="selected_language"
                            src="<?php echo e(asset('/backend-assets/forthebuilders/images/region.png')); ?>" alt="region">
                            <span class="pro-user-name ms-1">
                                <?php echo e(translate('Uzbek')); ?>

                                 <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        <?php break; ?>

                        <?php case ('en'): ?>
                            <img class="rounded-circle" id="selected_language"
                                src="<?php echo e(asset('/backend-assets/forthebuilders/images/GB.png')); ?>" alt="region">
                                <span class="pro-user-name ms-1">
                                    <?php echo e(translate('English')); ?>

                                    <i class="mdi mdi-chevron-down"></i> 
                                </span>
                        <?php break; ?>

                        <?php case ('ru'): ?>
                            <img class="rounded-circle" id="selected_language"
                                src="<?php echo e(asset('/backend-assets/forthebuilders/images/RU.png')); ?>" alt="region">
                                <span class="pro-user-name ms-1">
                                    <?php echo e(translate('Russian')); ?>

                                    <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        <?php break; ?>
                    <?php endswitch; ?>
                

                
            </a>
            <div id="lang-change" class="dropdown-menu dropdown-menu-end profile-dropdown">
                <?php $__currentLoopData = \Modules\ForTheBuilder\Entities\Language::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- item-->
                    
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="false" aria-expanded="false" data-flag="<?php echo e($language->code); ?>">
                        <?php switch($language->code):
                            case ('uz'): ?>
                                <img class="rounded-circle" id="lang_uz" src="<?php echo e(asset('/backend-assets/forthebuilders/images/region.png')); ?>" alt="region">
                                <?php echo e($language->name); ?>

                                <?php break; ?>

                                <?php case ('ru'): ?>
                                    <img class="rounded-circle" id="lang_ru"
                                        src="<?php echo e(asset('/backend-assets/forthebuilders/images/RU.png')); ?>" alt="region">
                                    <?php echo e($language->name); ?>

                                <?php break; ?>

                                <?php case ('en'): ?>
                                    <img class="rounded-circle" id="lang_en"
                                        src="<?php echo e(asset('/backend-assets/forthebuilders/images/GB.png')); ?>" alt="region">
                                    <?php echo e($language->name); ?>

                                <?php break; ?>
                            <?php endswitch; ?>
                        </a>
                    

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                


            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link nav-link3 right-bar-toggle waves-effect waves-light">
                <i class="mdi mdi-circle-half-full mdi-20"></i>
            </a>
        </li>

    </ul>
    <div class="clearfix"></div> 
</div>
<!-- end Topbar -->




<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/js/custom.js')); ?>"></script>
<script defer>
    $(document).ready(function() {
        let language = '<?php echo e($locale); ?>'
        let uz = `<?php echo e(asset('/backend-assets/forthebuilders/images/region.png')); ?>`
        let ru = `<?php echo e(asset('/backend-assets/forthebuilders/images/RU.png')); ?>`
        let en = `<?php echo e(asset('/backend-assets/forthebuilders/images/GB.png')); ?>`

        

        if ($('#lang-change>a').length > 0) {
            $('#lang-change>a').each(function() {
                $(this).on('click', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    switch (locale) {
                        case 'uz':
                            $('#selected_language').attr('src', uz)
                            break;
                        case 'en':
                            $('#selected_language').attr('src', en)
                            break;
                        case 'ru':
                            $('#selected_language').attr('src', ru)
                            break;
                    }
                    $.post('<?php echo e(route('language.change')); ?>', {
                        _token: '<?php echo e(csrf_token()); ?>',
                        locale: locale
                    }, function(data) {
                        location.reload();
                    });

                });
            });
        }
    })

    $(document).on('click','.clear_notification',function(){
        
        $.ajax({
            url: `/forthebuilder/clear-notification/`,
            type: 'GET',
            success: function(data) {
                if(data == true){
                   window.location.reload()
                }
            }
        });
    
    })
</script>
<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/layouts/content/header.blade.php ENDPATH**/ ?>