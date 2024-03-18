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
                    <a class="btn p-1 text-danger" data-bs-toggle="modal" data-bs-target="#logout">
                        <i class="mdi mdi-power mdi-20"></i>
                    </a>
                </li>
            </ul>



        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li data="<?php echo e($acton); ?>" class="list <?php echo e(((
                    $acton == 'forthebuilder.home.index' || 
                    $acton == 'forthebuilder.home.filtr'

                    ) ? 'menuitem-active' : '')); ?>">
                    <a href="<?php echo e(route('forthebuilder.home.index')); ?>">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span><?php echo e(translate('Главная')); ?></span>
                    </a>
                </li>

                <li data="<?php echo e($acton); ?>" class="list <?php echo e(((
                    $acton == 'forthebuilder.members.index' ||
                    $acton == 'forthebuilder.members.create' ||
                    $acton == 'forthebuilder.members.show'
                    ) ? 'menuitem-active' : '')); ?>">
                    <a href="<?php echo e(route('forthebuilder.members.index')); ?>">
                        <i class="mdi mdi-account-multiple-plus-outline"></i>
                        <span><?php echo e(translate('Участники')); ?></span>
                    </a>
                </li>

                <?php if($current_user->role_id == 1): ?>
                    <li data="<?php echo e($acton); ?>" class="list <?php echo e(((
                        $acton == 'forthebuilder.shops.index' ||
                        $acton == 'forthebuilder.shops.create' ||
                        $acton == 'forthebuilder.shops.show'
                        ) ? 'menuitem-active' : '')); ?>">
                        <a href="<?php echo e(route('forthebuilder.shops.index')); ?>">
                            <i class="mdi mdi-home-currency-usd"></i>
                            <span><?php echo e(translate('Магазины')); ?></span>
                        </a>
                    </li>

                    <li data="<?php echo e($acton); ?>" class="list <?php echo e(((
                        $acton == 'forthebuilder.user.index'
                        ) ? 'menuitem-active' : '')); ?>">
                        <a href="<?php echo e(route('forthebuilder.user.index')); ?>">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span><?php echo e(translate('Пользователи')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>    
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

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

<?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/Modules/ForTheBuilder/Resources/views/layouts/content/navigation.blade.php ENDPATH**/ ?>