<?php
    $current_user = \Illuminate\Support\Facades\Auth::user();
    use Modules\ForTheBuilder\Entities\Constants;
    $acton = request()->route()->getAction()['as'];
       
?>

<style>
    .simplebar-content #sidebar-menu #side-menu .list a,
    .simplebar-content #sidebar-menu #side-menu .list a i{
        font-size: 18px !important;
    }
</style>

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" style="top: 0;z-index: 1049;">

    <div class="h-100" data-simplebar>
         <!-- User box -->
        <div class="user-box text-center">
            <?php if($current_user->role_id != Constants::SUPERADMIN): ?>
                <?php if(isset($current_user->id)): ?>
                    <?php
                        $sms_avatar = public_path('/uploads/user/' . $current_user->id . '/s_' . $current_user->avatar);
                        if($current_user->gender == 2)
                            $image = 'women.png';
                        else
                            $image = 'men.png';
                    ?>
                    <?php if(file_exists($sms_avatar)): ?>
                        <img src="<?php echo e(asset('/uploads/user/' . $current_user->id . '/s_' . $current_user->avatar)); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">

                    <?php else: ?>
                        <img src="<?php echo e(asset('/backend-assets/img/'.$image)); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                    <?php endif; ?>
                <?php else: ?>
                    <img src="<?php echo e(asset('/backend-assets/img/'.$image)); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
                <?php endif; ?>
            <?php else: ?>
                <img src="<?php echo e(asset('/backend-assets/img/superadmin.png')); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <?php endif; ?>

            
            
                <div class="dropdown">
                    <a href="<?php echo e(route('forthebuilder.user.show', $current_user->id)); ?>" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown"  aria-expanded="false"><?php echo e($current_user->first_name); ?> <?php echo e($current_user->last_name); ?></a>
                </div>

            
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="<?php echo e(route('forthebuilder.user.show', $current_user->id)); ?>" class="btn p-1 text-primary left-user-info">
                        <i class="mdi mdi-cog mdi-20"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a class="btn p-1 text-danger" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="mdi mdi-power mdi-20"></i>
                    </a>
                </li>
            </ul>



        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li data="<?php echo e($acton); ?>" class="list <?php echo e((($acton == 'forthebuilder.index' || $acton == 'forthebuilder.filtr') ? 'menuitem-active' : '')); ?>">
                    <a href="<?php echo e(route('forthebuilder.index')); ?>">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span><?php echo e(translate('Home')); ?></span>
                    </a>
                </li>
                <li data="<?php echo e($acton); ?>" class="list <?php echo e(((
                    $acton == 'forthebuilder.task.index' || 
                    $acton == 'forthebuilder.clients.calendar'

                    ) ? 'menuitem-active' : '')); ?>">
                    <a href="<?php echo e(route('forthebuilder.task.index')); ?>">
                        <i class="mdi mdi-clipboard-outline"></i>
                        <span><?php echo e(translate('task')); ?></span>
                    </a>
                </li>
                <li data="<?php echo e($acton); ?>" class="list <?php echo (($acton == 'forthebuilder.deal.index' || $acton == 'forthebuilder.deal.contracts' || $acton == 'forthebuilder.deal.contract-show') ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.clients.index')); ?>">
                        <i class="mdi mdi-handshake-outline"></i>
                        <span><?php echo e(translate('deal')); ?></span>
                    </a>
                </li>
                <!--  -->
                <li data="<?php echo e($acton); ?>" class="list <?php echo ((
                    $acton == 'forthebuilder.clients.edit' || 
                    $acton == 'forthebuilder.clients.show' ||
                    $acton == 'forthebuilder.clients.create' 
                    ) ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.clients.all-clients')); ?>">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span><?php echo e(translate('Clients')); ?></span>
                    </a>
                </li>
                <!--  -->
                <li data="<?php echo e($acton); ?>" class="list <?php echo ((
                    $acton == 'forthebuilder.house.show-more' || 
                    $acton == 'forthebuilder.house.show-details' || 
                    $acton == 'forthebuilder.house-flat.show' || 
                    $acton == 'forthebuilder.house-flat.edit' || 
                    $acton == 'forthebuilder.house.create' || 
                    $acton == 'forthebuilder.house.edit' ||
                    $acton == 'forthebuilder.house.basket-show' ||
                    $acton == 'forthebuilder.deal.create' 
                    ) ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.house.index')); ?>">
                        <i class="mdi mdi-checkerboard-remove"></i>
                        <span><?php echo e(translate('JK')); ?></span>
                    </a>
                </li>
                <!--  -->
                <li data="<?php echo e($acton); ?>" class="list <?php echo (($acton == 'forthebuilder.booking.show') ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.booking.index')); ?>">
                        <i class="mdi mdi-lock-check-outline"></i>
                        <span><?php echo e(translate('Booking')); ?></span>
                    </a>
                </li>
                
                <li data="<?php echo e($acton); ?>" class="list <?php echo (($acton == 'forthebuilder.installment-plan.show') ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.installment-plan.index')); ?>">
                        <i class="mdi mdi-calculator"></i>
                        <span><?php echo e(translate('Installment plan')); ?></span>
                    </a>
                </li>
                <li data="<?php echo e($acton); ?>" class="list">
                    <a href="<?php echo e(route('forthebuilder.user.chat')); ?>">
                        <i class="mdi mdi-forum-outline"></i>
                        <span><?php echo e(translate('Chat')); ?></span>
                    </a>
                </li>
                <?php if(Auth::user()->role_id==Constants::ADMIN || Auth::user()->role_id==Constants::SUPERADMIN || Auth::user()->role_id == Constants::GUEST): ?>
                <!--  -->

                    <?php if(Auth::user()->role_id != Constants::GUEST): ?>
                        <li data="<?php echo e($acton); ?>" class="list <?php echo ((
                            $acton == 'forthebuilder.user.show' || 
                            $acton == 'forthebuilder.user.edit' || 
                            $acton == 'forthebuilder.user.filtr' ||
                            $acton == 'forthebuilder.user.create'
                            ) ? 'menuitem-active' : '') ?>">
                            <a href="<?php echo e(route('forthebuilder.user.index')); ?>">
                                <i class="mdi mdi-account-group-outline"></i>
                                <span><?php echo e(translate('User')); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li data="<?php echo e($acton); ?>" class="list <?php echo (($acton == 'forthebuilder.user.report' || $acton == 'forthebuilder.user.report-clients' || $acton == 'forthebuilder.user.report-deals-index' || $acton == 'forthebuilder.user.report-clients-index' || $acton == 'forthebuilder.user.report-houses-index' || $acton == 'forthebuilder.user.report-deals' || $acton == 'forthebuilder.user.report-houses') ? 'menuitem-active' : '') ?>">
                        <a href="<?php echo e(route('forthebuilder.user.report')); ?>">
                            <i class="mdi mdi-chart-bar"></i>
                            <span><?php echo e(translate('Reports')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--  -->
                <li data="<?php echo e($acton); ?>" class="list <?php echo ((
                    $acton == 'forthebuilder.currency.index' || 
                    $acton == 'forthebuilder.language.index' || 
                    $acton == 'forthebuilder.language.show' || 
                    $acton == 'forthebuilder.language.edit' || 
                    $acton == 'forthebuilder.coupon.index' || 
                    $acton == 'forthebuilder.house.price-formation' || 
                    $acton == 'forthebuilder.installment-plan.settings' || 
                    $acton == 'forthebuilder.house.details' ||
                    $acton == 'forthebuilder.house.company-index' ||
                    $acton == 'forthebuilder.house.price-types' ||
                    $acton == 'forthebuilder.installment-plan.periods' ||
                    $acton == 'forthebuilder.house.sms-templates' 
                    ) ? 'menuitem-active' : '') ?>">
                    <a href="<?php echo e(route('forthebuilder.settings.index')); ?>">
                        <i class="mdi mdi-cog-outline"></i>
                        <span><?php echo e(translate('Settings')); ?></span>
                    </a>
                </li>

                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logout"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to logout')); ?></h4>
                <div class="d-flex justify-content-center mt-3 align-items-baseline">
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

<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/layouts/content/navigation.blade.php ENDPATH**/ ?>