<!DOCTYPE html>
<html lang="en">
<?php
    use Modules\ForTheBuilder\Entities\HouseFlat;
    use Modules\ForTheBuilder\Entities\Constants;
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" id="token">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('/backend-assets/forthebuilders/images/fav.jpg')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/app.min.css')); ?>" id="app-style" />
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/icons.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/custombox/custombox.min.css')); ?>" />
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/selectize/css/selectize.bootstrap3.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>">
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/fullcalendar/main.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/select2/css/select2.min.css')); ?>" />
    <link href="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/selectize/css/selectize.bootstrap3.css')); ?>" />
    <title><?php echo e(translate('ICStroy')); ?></title>
    <style>
        .keyUpNameResultLi:hover {
            background: #ccc;
        }

        .keyUpNameResultLi {
            cursor: pointer;
        }
        .font-20{
            font-size: 25px;
        }
        td.day{
            text-align:center;
        }
        .select2-container--default{
            width: 100% !important;
        }
        .mdi-20{
            font-size: 20px;
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
</head>
<?php if(!empty($user->settings)): ?> 
    <?php  $decode = json_decode($user->settings); ?>

    <body class="loading" 
        data-layout-color="<?php echo e($decode[0]->layout_color); ?>"  
        data-layout-mode="default" 
        data-layout-size="<?php echo e($decode[1]->layout_size); ?>" 
        data-topbar-color="<?php echo e(((isset($decode[6]->topbar_color)) ? $decode[6]->topbar_color : 'light')); ?>" 
        data-leftbar-position="<?php echo e($decode[2]->leftbar_position); ?>" 
        data-leftbar-color="<?php echo e($decode[3]->leftbar_color); ?>" 
        data-leftbar-size='<?php echo e($decode[4]->leftbar_size); ?>' 
        data-sidebar-user='<?php echo e(((isset($decode[5]->sidebar_user)) ? $decode[5]->sidebar_user : 'true')); ?>'>

<?php else: ?>
    <body class="loading" 
        data-layout-color="light"  
        data-layout-mode="default" 
        data-layout-size="fluid" 
        data-topbar-color="light" 
        data-leftbar-position="fixed" 
        data-leftbar-color="light" 
        data-leftbar-size='default' 
        data-sidebar-user='true'>

<?php endif; ?>
    <!-- Begin page -->
    <div id="wrapper" style="overflow-y: auto;">
        <?php echo $__env->yieldContent('content'); ?>

        <div class="modal fade" id="modal-for-flat">
            <div class="modal-dialog" style="max-width: 700px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('forthebuilder.house.update-flats-data')); ?>" method="POST"
                            enctype="multipart/form-data" id="chees-modal2">
                            
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="total_area"><?php echo e(translate('Total area')); ?></label>
                                    <input type="number" name="total_area" id="total_area" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="living_space"><?php echo e(translate('Living space')); ?></label>
                                    <input type="number" name="living_space" id="living_space" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="kitchen_area"><?php echo e(translate('Kitchen area')); ?></label>
                                    <input type="number" name="kitchen_area" id="kitchen_area" class="form-control">
                                </div>

                                <div class="col-md-6">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-top: 5px;">
                                            <label for="terassa"><?php echo e(translate('Terrace')); ?></label>
                                            <input type="checkbox" name="" id="terassa">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="number" name="terassa" id="terassa_input" class="form-control"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-top: 5px;">
                                            <label for="balcony"><?php echo e(translate('Balcony')); ?></label>
                                            <input type="checkbox" name="" id="balcony">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="number" name="balcony" id="balcony_input" class="form-control"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <br>
                                    <div class="form-group">
                                        <label for="files"><?php echo e(__('locale.file__upload')); ?></label>
                                        <input type="file" name="files[]" id="files" multiple>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" value="<?php echo e(translate('Save')); ?>"
                                class="btn btn-primary float-right save-flats-form">
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-default-free">
            <div class="modal-dialog" style="max-width: 500px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo e(translate('Vacate the apartment again')); ?> ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="justify-content-center">
                                    <a type="submit" class="btn btn-success"
                                        id="renew_flat"><?php echo e(translate('Release')); ?></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99999">
            <div class="toast toast_success align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ...
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99999">
            <div class="toast toast_danger align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ...
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>


    </div>

    <!-- Right Sidebar -->
    <div class="right-bar">

        <div data-simplebar class="h-100">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white"><?php echo e(translate('Theme Customizer')); ?></h4>
            </div>
    
            <!-- Tab panes -->
            <div class="tab-content pt-0">  

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    <?php if(empty($user->settings)): ?>
                        <div class="p-3">
                            <form id="change_setting">
                                <h6 class="fw-medium font-14 mt-2 mb-2 pb-1"><?php echo e(translate('Color Scheme')); ?></h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="light"
                                        id="light-mode-check" checked />
                                    <label class="form-check-label" for="light-mode-check"><?php echo e(translate('Light Mode')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="dark"
                                        id="dark-mode-check" />
                                    <label class="form-check-label" for="dark-mode-check"><?php echo e(translate('Dark Mode')); ?></label>
                                </div>

                                <!-- Width -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Width')); ?></h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="fluid" id="fluid" checked />
                                    <label class="form-check-label" for="fluid-check"><?php echo e(translate('Fluid')); ?></label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="boxed" id="boxed" />
                                    <label class="form-check-label" for="boxed-check"><?php echo e(translate('Boxed')); ?></label>
                                </div>

                                <!-- Menu positions -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Menus (Leftsidebar and Topbar) Positon')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="fixed" id="fixed-check"
                                        checked />
                                    <label class="form-check-label" for="fixed-check"><?php echo e(translate('Fixed')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="scrollable"
                                        id="scrollable-check" />
                                    <label class="form-check-label" for="scrollable-check"><?php echo e(translate('Scrollable')); ?></label>
                                </div>

                                <!-- Left Sidebar-->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Left Sidebar Color')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="light" id="light" />
                                    <label class="form-check-label" for="light-check"><?php echo e(translate('Light')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="dark" id="dark" checked/>
                                    <label class="form-check-label" for="dark-check"><?php echo e(translate('Dark')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="brand" id="brand" />
                                    <label class="form-check-label" for="brand-check"><?php echo e(translate('Brand')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="gradient" id="gradient" />
                                    <label class="form-check-label" for="gradient-check"><?php echo e(translate('Gradient')); ?></label>
                                </div>

                                <!-- size -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Left Sidebar Size')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="default"
                                        id="default-size-check" checked />
                                    <label class="form-check-label" for="default-size-check"><?php echo e(translate('Default')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="condensed"
                                        id="condensed-check" />
                                    <label class="form-check-label" for="condensed-check"><?php echo e(translate('Condensed')); ?> <small>(<?php echo e(translate('Extra Small size')); ?>)</small></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="compact"
                                        id="compact-check" />
                                    <label class="form-check-label" for="compact-check"><?php echo e(translate('Compact')); ?> <small>(<?php echo e(translate('Small size')); ?>)</small></label>
                                </div>

                                <!-- User info -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Sidebar User Info')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="sidebar-user" value="enable" id="sidebaruser-check" />
                                    <label class="form-check-label" for="sidebaruser-check"><?php echo e(translate('Enable')); ?></label>
                                </div>


                                <!-- Topbar -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Topbar')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="dark" id="darktopbar-check"
                                        checked />
                                    <label class="form-check-label" for="darktopbar-check"><?php echo e(translate('Dark')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="light" id="lighttopbar-check" />
                                    <label class="form-check-label" for="lighttopbar-check"><?php echo e(translate('Light')); ?></label>
                                </div>
                            </form>
                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn"><?php echo e(translate('Reset to Default')); ?></button>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php 
                            $decode = json_decode($user->settings);
                            

                            // 
                            // 
                            // 
                            // 
                            //
                            // 

                        ?>
                        <div class="p-3">
                            <form id="change_setting">

                                <!--  Color Scheme -->
                                <h6 class="fw-medium font-14 mt-2 mb-2 pb-1"><?php echo e(translate('Color Scheme')); ?></h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="light"
                                        id="light-mode-check" <?php echo e((($decode[0]->layout_color == 'light') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="light-mode-check"><?php echo e(translate('Light Mode')); ?></label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="dark"
                                        id="dark-mode-check"<?php echo e((($decode[0]->layout_color == 'dark') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="dark-mode-check"><?php echo e(translate('Dark Mode')); ?></label>
                                </div>

                                <!-- Width -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Width')); ?></h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="fluid" id="fluid" <?php echo e((($decode[1]->layout_size == 'fluid') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="fluid"><?php echo e(translate('Fluid')); ?></label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="boxed" id="boxed" <?php echo e((($decode[1]->layout_size == 'boxed') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="boxed"><?php echo e(translate('Boxed')); ?></label>
                                </div>

                                <!-- Menu positions -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Menus (Leftsidebar and Topbar) Positon')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="fixed" id="fixed-check" <?php echo e(((isset($decode[2]->leftbar_position) && $decode[2]->leftbar_position == 'fixed') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="fixed-check"><?php echo e(translate('Fixed')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="scrollable"
                                        id="scrollable-check" <?php echo e(((isset($decode[2]->leftbar_position) && $decode[2]->leftbar_position == 'scrollable') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="scrollable-check"><?php echo e(translate('Scrollable')); ?></label>
                                </div>

                                <!-- Left Sidebar-->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Left Sidebar Color')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="light" id="light"  <?php echo e(((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'light') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="light"><?php echo e(translate('Light')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="dark" id="dark" <?php echo e(((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'dark') ? 'checked' : '')); ?>  />
                                    <label class="form-check-label" for="dark"><?php echo e(translate('Dark')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="brand" id="brand" <?php echo e(((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'brand') ? 'checked' : '')); ?>  />
                                    <label class="form-check-label" for="brand"><?php echo e(translate('Brand')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="gradient" id="gradient" <?php echo e(((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'gradient') ? 'checked' : '')); ?>  />
                                    <label class="form-check-label" for="gradient"><?php echo e(translate('Gradient')); ?></label>
                                </div>

                                <!-- size -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Left Sidebar Size')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="default"
                                        id="default-size-check"  <?php echo e(((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'default') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="default-size-check"><?php echo e(translate('Default')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="condensed"
                                        id="condensed-check" <?php echo e(((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'condensed') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="condensed-check"><?php echo e(translate('Condensed')); ?> <small>(<?php echo e(translate('Extra Small size')); ?>)</small></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="compact"
                                        id="compact-check" <?php echo e(((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'compact') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="compact-check"><?php echo e(translate('Compact')); ?> <small>(<?php echo e(translate('Small size')); ?>)</small></label>
                                </div>

                                <!-- User info -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Sidebar User Info')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="sidebar-user" value="true" id="sidebaruser-check" <?php echo e(((isset( $decode[5]->sidebar_user) &&  $decode[5]->sidebar_user == 'true') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="sidebaruser-check"><?php echo e(translate('Enable')); ?></label>
                                </div>


                                <!-- Topbar -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1"><?php echo e(translate('Topbar')); ?></h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="dark" id="darktopbar-check" <?php echo e(((isset($decode[6]->topbar_color) && $decode[6]->topbar_color == 'dark') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="darktopbar-check"><?php echo e(translate('Dark')); ?></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="light" id="lighttopbar-check" <?php echo e(((isset($decode[6]->topbar_color) && $decode[6]->topbar_color == 'light') ? 'checked' : '')); ?> />
                                    <label class="form-check-label" for="lighttopbar-check"><?php echo e(translate('Light')); ?></label>
                                </div>
                            </form>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn"><?php echo e(translate('Reset to Default')); ?></button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

<div class="modal fade" id="cancel_sortable_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="box-shadow: 0 0 10px #000;">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno" id="select_flat_modal_title"><?php echo e(translate('It is impossible to go back from the stage Making a deal!')); ?></h4>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="modalVideystvitelnoDa btn btn-success" data-bs-dismiss="modal"><?php echo e(translate('Yes')); ?></button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

     <!-- Vendor -->
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/node-waves/waves.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/feather-icons/feather.min.js')); ?>"></script>

    <!-- knob plugin -->
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery-knob/jquery.knob.min.js')); ?>"></script>

    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/custombox/custombox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/pages/kanban.init.js')); ?>"></script>

    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/selectize/js/standalone/selectize.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/mohithg-switchery/switchery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery-mockjax/jquery.mockjax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>

    <!-- Plugins js-->
    
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>

    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/admin-resources/rwd-table/rwd-table.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/pages/responsive-table.init.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/plugins/jquery.maskedinput.min.js')); ?>"></script>
    
    <!-- App js-->
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/app.min.js')); ?>"></script>


    <script>
        //avansni muddati tugaganda notificationga chiqarish
        // function bookingtoast() {
        //     let today = new Date();
        //     $.ajax({
        //         url: '/forthebuilder/paystatus-api',
        //         type: 'GET',
        //         success: function(data) {
        //             $(data).each(function(index) {
        //                 var booker_name = this.first_name;
        //                 var booker_surname = this.last_name;
        //                 //    avans muddati 1 kun tugashidan oldin chiqarish
        //                 if (today.getTime() / 1000 > this.expire_dates && this.is_notify ==
        //                     null) {
        //                     $.ajax({
        //                         url: `/forthebuilder/paystatus-notification/${this.id}`,
        //                         type: 'GET',
        //                         success: function(data) {
        //                             if(data != "no"){
        //                                 toastr.warning(
        //                                     `${booker_name} ${booker_surname}  <?php echo e(translate('one day left until the deadline')); ?>`
        //                                 );
        //                                 setTimeout(function() {
        //                                     location.reload();
        //                                 }, 1000);
        //                             }
        //                         }
        //                     });
        //                 }
        //             });
        //         }
        //     });
        //     $.ajax({
        //         url: '/forthebuilder/bookingapi',
        //         type: 'GET',
        //         success: function(data) {
        //             $(data).each(function(index) {
        //                 var booker_name = this.first_name;
        //                 var booker_surname = this.last_name;

        //                 //    avans muddati 1 kun tugashidan oldin chiqarish
        //                 if (today.getTime() / 1000 > this.notification_date && this.is_notify_before ==
        //                     null) {
        //                     $.ajax({
        //                         url: `/forthebuilder/thedaybeforenotification/${this.id}`,
        //                         type: 'GET',
        //                         success: function(data) {
        //                             if(data != "no"){
        //                                 toastr.warning(
        //                                     `${booker_name} ${booker_surname}  <?php echo e(translate('one day left until the deadline')); ?>`
        //                                 );
        //                                 setTimeout(function() {
        //                                     location.reload();
        //                                 }, 1000);
        //                             }
        //                         }
        //                     });
        //                 }

        //                 //avansni muddati tugaganda notificationga chiqarish
        //                 if (today.getTime() / 1000 > this.expire_dates && this.is_notify == null) {
        //                     $.ajax({
        //                         url: `/forthebuilder/bookingnotification/${this.id}`,
        //                         type: 'GET',
        //                         success: function(data) {
        //                             if(data != "no"){
        //                                 toastr.warning(
        //                                     `${booker_name} ${booker_surname}  <?php echo e(translate('advance period expired')); ?>`
        //                                 );
        //                                 setTimeout(function() {
        //                                     location.reload();
        //                                 }, 1000);
        //                             }
        //                         }
        //                     });
        //                 }
        //             });
        //         }
        //     });
        // }
        // setInterval(bookingtoast, 30000)
    </script>
    <script>
        $('.btn-filter[data-filter]').on('click', function() {
            $('.btn-filter[data-filter]').removeClass('active');
            $(this).addClass('active');
            let filter = $(this).data('filter');

            // $('.btn-filter-flat').addClass('d-none');
            $('.btn-filter-flat').attr('disabled', true)
            $('.btn-filter-flat').css('opacity', 0.3)
            if (filter == 0) {
                $('.btn-filter-flat[data-category=0]').attr('disabled', false);
                $('.btn-filter-flat[data-category=0]').css('opacity', 1);
            } else if (filter == 1) {
                $('.btn-filter-flat[data-category=1]').attr('disabled', false);
                $('.btn-filter-flat[data-category=1]').css('opacity', 1);
            } else if (filter == 2) {
                $('.btn-filter-flat[data-category=2]').attr('disabled', false);
                $('.btn-filter-flat[data-category=2]').css('opacity', 1);
            }

            else if (filter == 3) {
                $('.btn-filter-flat[data-category=3]').attr('disabled', false);
                $('.btn-filter-flat[data-category=3]').css('opacity', 1);
            }
            else if (filter == 4) {
                $('.btn-filter-flat[data-category=4]').attr('disabled', false);
                $('.btn-filter-flat[data-category=4]').css('opacity', 1);
            }
            else {
                $('.btn-filter-flat').attr('disabled', false);
                $('.btn-filter-flat').css('opacity', 1)
            }
        });


        var arr = []
        arr.push({
            'flats': [],
        })
        $(document).on('click', '.room-count-button', function() {
            var def = $(this).attr('data-def')
            $('.room-count-button').attr('disabled', true)
            var room_count_button = $(this).attr('data-number')
            var roomCount = $(this).attr('data-number')

            if (def == 0) {
                $(this).attr('disabled', false)
                $(this).attr('data-def', 1)
                $(this).removeClass('btn-primary').addClass('btn-success')
                $(this).css('background', '#28a745')
                $('.apartments-button').css('background', '#D9D9D9')
                $('.apartments-button[data-disabled=0]').removeAttr('disabled')
                $(this).attr('is-selected', true)
                arr.push({
                    'room_count': roomCount,
                    'flats': [],
                })
            } else {
                $('.room-count-button').attr('disabled', false)
                $('.apartments-button[data-def=1]').trigger('click')
                $('.apartments-button').css('background', '#6c757d')
                $('.apartments-button[data-def=1]').attr('data-def', 0)

                $(this).attr('data-def', 0)
                $(this).removeClass('btn-primary').removeClass('btn-success')
                $(this).css('background', '#94B2EB')
                $('.apartments-button[data-disabled=0]').attr('disabled', true)
                $(this).attr('is-selected', false)
            }
        })

        $(document).on('click', '.apartments-button', function() {
            var isSelected = $(this).attr('is-selected', true)
            var thisId = $(this).attr('data-id')
            var def = $(this).attr('data-def')
            var roomCount = $('.room-count-button[is-selected=true]').attr('data-number')
            

            if (def == 0) {
                $(this).removeClass('btn-primary').removeClass('btn-secondary')
                $(this).removeClass('btn-primary').addClass('btn-success')
                $(this).removeClass('btn-primary').css('background', '#28a745')
                $(this).attr('data-def', 1)
                arr[0].flats.push(thisId)
                $('.count-rooms').text(parseInt($('.count-rooms').text()) + 1)
            } else {
                $(this).removeClass('btn-primary').removeClass('btn-success')
                $(this).removeClass('btn-primary').addClass('btn-secondary')
                $(this).removeClass('btn-primary').css('background', '#D9D9D9')
                $(this).attr('data-def', 0)
                arr[0].flats.splice(arr[0].flats.indexOf(thisId), 1)
                $('.count-rooms').text(parseInt($('.count-rooms').text()) - 1)
            }

            if(arr[0]['flats'].length > 0){
                $('.save-flats').attr('disabled', false)
            }
            else{
                $('.save-flats').attr('disabled', true)
            }
        })
        $(document).on('click', '.flat-button-open-modal', function() {
            var price = $(this).attr('data-price');
            var room_count = $(this).attr('data-room_count');
            var areas = $(this).attr('data-areas');
            var client = $(this).attr('data-client');
            var client_id = $(this).attr('data-client-id');
            var number_of_flat = $(this).attr('data-number_of_flat');
            var status = $(this).attr('data-status');


            $('#exampleModal .modal-body').find('.flat_price').text(price)
            $('#exampleModal .modal-body').find('.flat_room_count').text(room_count)
            $('#exampleModal .modal-header').find('.flat_area').text(areas)
            $('#exampleModal .modal-header').find('.number_of_flat').text(number_of_flat)
            if (client != '') {

                $('#exampleModal .modal-body').find('.flat_client_fio .modalJkFioM')
                .html('<a href="/forthebuilder/clients/show/'+client_id+'/0/0">'+client+'</a>')
            } else {
                $('#exampleModal .modal-body').find('.flat_client_fio .modalJkFioM').text(
                    `<?php echo e(translate('No data')); ?>`)
            }

            if (status == <?php echo e(Constants::STATUS_SOLD); ?>) {
                $('#exampleModal .modal-body').find('.modalSelect').addClass('d-none')
                $('#exampleModal .modal-body').find('.showDetailsStatus').removeClass('d-none')
            } else {
                $('#exampleModal .modal-body').find('.modalSelect').removeClass('d-none')
                $('#exampleModal .modal-body').find('.showDetailsStatus').addClass('d-none')
            }

            var house_flat_id = $(this).attr('data-house_flat_id');
            var house_house_id = $(this).attr('data-house_house_id');
            var house_house_name = $(this).attr('data-house_house_name');
            var house_contract_number = $(this).attr('data-house_contract_number');
            var house_entrance = $(this).attr('data-house_entrance');
            var house_floor = $(this).attr('data-house_floor');
            var data_doc = $(this).attr('data-doc');
            var price_m2 = $(this).attr('data-price_m2');
            // alert(price_m2)
            $('#exampleModal .modal-body').find('.house_flat_id').val(house_flat_id)
            $('#exampleModal .modal-body').find('.house_number_of_flat').val(number_of_flat)
            $('#exampleModal .modal-body').find('.house_house_id').val(house_house_id)
            $('#exampleModal .modal-body').find('.house_house_name').val(house_house_name)
            $('#exampleModal .modal-body').find('.house_contract_number').val(house_contract_number)
            $('#exampleModal .modal-body').find('.house_entrance').val(house_entrance)
            $('#exampleModal .modal-body').find('.house_floor').val(house_floor)
            $('#exampleModal .modal-body').find('.house_price_m2').val(price_m2)
            $('#exampleModal .modal-body').find('img').attr('src', data_doc)
            $('#exampleModal .modal-body').find('.room_count').val(room_count)

            $('#exampleModal .modal-body .selectModal option').attr('selected', false)
            $('#exampleModal .modal-body .selectModal option[data-select=' + status + ']').attr('selected',
                'selected')

            $('#exampleModal .modal-body').find('.modalPodrobnoButton').attr('href',
                '/forthebuilder/house-flat/show/' + house_flat_id)
        })

        $(document).on('click', '.save-flats-form', function(e) {
            e.preventDefault()
            var kv_m = $('.kv-m').val()
            var _token = $('input[name=_token]').val()
            var _form = $('#exampleModal #chees-modal').serializeArray()
            const data = {};
            $.each(_form, function() {
                data[this.name] = this.value
            })
            console.log(data)
            $.ajax({
                url: `/forthebuilder/house/update-flats-data`,
                data: {
                    form: data,
                    flats: arr,
                    kv_m: kv_m,
                    _token: _token
                },
                type: 'PUT',
                success: function(data) {
                    if (data == true) {
                        location.reload()
                    }
                },
                
            });
        })

        $(document).on('change', '#terassa', function() {
            if ($(this).prop("checked") == true) {
                $('#terassa_input').attr('disabled', false)
            } else {
                $('#terassa_input').attr('disabled', true)
                $('#terassa_input').val('')
            }
        })

        $(document).on('change', '#balcony', function() {
            if ($(this).prop("checked") == true) {
                $('#balcony_input').attr('disabled', false)
            } else {
                $('#balcony_input').attr('disabled', true)
                $('#balcony_input').val('')
            }
        })

        $(document).on('change', '#other', function() {
            if ($(this).prop("checked") == true) {
                $('#other_input').attr('disabled', false)
            } else {
                $('#other_input').attr('disabled', true)
                $('#other_input').val('')
            }
        })

        $(document).ready(function() {
            var $el1 = $("#files");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#files").fileinput({
                language: 'ru',
                uploadUrl: "/forthebuilder/house-flat/file-upload",
                // deleteUrl: '/forthebuilder/deal/file-delete-all',
                allowedFileExtensions: ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'png', 'jpg', 'jpeg', 'svg'],
                uploadAsync: false,
                maxFileSize: 150000,
                maxFilesNum: 25,
                showUpload: false,
                showCaption: true,
                showRemove: false,
                removeClass: "btn btn-danger",
                removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
                overwriteInitial: false,
                browseOnZoneClick: true,
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreview: [
                    <?php if(!empty($dealFiles)): ?>
                        <?php $__currentLoopData = $dealFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealItemFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            "<?php echo e(asset('/uploads/tmp_files/' . Auth::user()->id . '/house-flat/' . $dealItemFile->getFilename())); ?>",
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ],
                initialPreviewConfig: [
                    <?php if(!empty($dealFiles)): ?>
                        <?php $__currentLoopData = $dealFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealItemFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(
                                $dealItemFile->getExtension() == 'jpg' ||
                                    $dealItemFile->getExtension() == 'jpeg' ||
                                    $dealItemFile->getExtension() == 'png' ||
                                    $dealItemFile->getExtension() == 'pdf' ||
                                    $dealItemFile->getExtension() == 'doc' ||
                                    $dealItemFile->getExtension() == 'docx' ||
                                    $dealItemFile->getExtension() == 'xls' ||
                                    $dealItemFile->getExtension() == 'xlsx' ||
                                    $dealItemFile->getExtension() == 'svg'): ?>
                                {
                                    caption: "<?php echo e($dealItemFile->getFilename()); ?>",
                                    size: "<?php echo e($dealItemFile->getSize()); ?>",
                                    width: "120px",
                                    url: '/forthebuilder/house-flat/file-delete/' +
                                        '<?php echo e($dealItemFile->getFilename()); ?>',
                                    key: "<?php echo e($dealItemFile->getFilename()); ?>"
                                },
                            <?php else: ?>
                                {
                                    type: "<?php echo e($dealItemFile->getExtension()); ?>",
                                    caption: "<?php echo e($dealItemFile->getFilename()); ?>",
                                    size: "<?php echo e($dealItemFile->getSize()); ?>",
                                    width: "120px",
                                    url: '/forthebuilder/house-flat/file-delete/' +
                                        '<?php echo e($dealItemFile->getFilename()); ?>',
                                    key: "<?php echo e($dealItemFile->getFilename()); ?>"
                                },
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ]
            }).on("filebatchselected", function(event, files) {
                $el1.fileinput("upload");
            }).on('filesorted', function(e, params) {
                console.log('file sorted', e, params);
            }).on('fileuploaded', function(e, params) {
                console.log('file uploaded', e, params);
            }).on('filesuccessremove', function(e, id) {
                console.log('file success remove', e, id);
            });
        })

        $(document).on('click', '.attach-order', function() {
            $('#exampleModalNext .modal-title').text('')
            $('#exampleModalNext .modal-body').html(`
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="order" id="desc" value="1" required checked>
                    <label class="form-check-label" for="desc"><?php echo e(translate('Oder from which side')); ?></label>
                </div>
            
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="order" id="asc" value="2" required>
                    <label class="form-check-label" for="asc"><?php echo e(translate('asc')); ?></label>
                </div>
            
                <hr>
                <label class="label-form" for="from"><?php echo e(translate('What number to start with')); ?></label>
                <input type="number" name="from" class="form-control" id="from" required>
                
                <button type="button" class="btn btn-outline-success sozdatImyaSpisokSozdatButtonSave basket-to-house mt-3">
                    <?php echo e(translate('Next')); ?>

                </button>
            `)
        })

       
        $(document).on('click', '.selectModalDiv', function() {
            
            var thisVal = $('.selectModal').val();

            var house_flat_id = $('#exampleModal').find('.house_flat_id').val();
            var house_number_of_flat = $('#exampleModal').find('.house_number_of_flat').val();
            var house_house_id = $('#exampleModal').find('.house_house_id').val();
            var house_house_name = $('#exampleModal').find('.house_house_name').val();
            var house_contract_number = $('#exampleModal').find('.house_contract_number').val();
            var house_entrance = $('#exampleModal').find('.house_entrance').val();
            var house_floor = $('#exampleModal').find('.house_floor').val();
            var flat_price = $('#exampleModal').find('.flat_price').text();
            var price_m2 = $('#exampleModal').find('.house_price_m2').val();
            var data_areas = $('#exampleModal').find('.flat_area').text();
            var room_count = $('.flat_room_count').text();

            if (thisVal == <?php echo e(HouseFlat::STATUS_SOLD); ?>) {
                location.replace("/forthebuilder/deal/create?house_flat_id=" + house_flat_id +
                    "&house_flat_number=" +
                    house_number_of_flat + "&house_id=" + house_house_id + '&house_name=' + house_house_name +
                    '&contract_number=' + house_contract_number + '&flat_price=' + flat_price + '&price_m2=' + price_m2);
            } else if (thisVal == <?php echo e(HouseFlat::STATUS_BOOKING); ?>) {
                $('#exampleModal2').removeClass('d-none')
                $('#exampleModal').addClass('d-none')
                $('#exampleModal2').addClass('show')

                $('#exampleModal2').find('.booking-house_flat_id').val(house_flat_id)
                $('#exampleModal2').find('.booking-house_number_of_flat').val(house_number_of_flat)
                $('#exampleModal2').find('.booking-house_house_id').val(house_house_id)
                $('#exampleModal2').find('.booking-house_house_name').val(house_house_name)
                $('#exampleModal2').find('.booking-house_contract_number').val(house_contract_number)
                $('#exampleModal2').find('.booking-house_entrance').val(house_entrance)
                $('#exampleModal2').find('.booking-house_floor').val(house_floor)

                $('#exampleModal2').find('.apartment_number').text(room_count)
                $('#exampleModal2').find('.apartment_price_m2').text(price_m2)
                $('#exampleModal2').find('.apartment_area').text(data_areas)
                $('#exampleModal2').find('.apartment_price').text(flat_price)
            } else {
                var gId = $('#exampleModal').find('.house_flat_id').val();
                console.log(gId)
                $.get('/forthebuilder/house/show-more-item-detail/' + gId, function(data) {
                    console.log(data);
                    $.ajax({
                        url: `/forthebuilder/house-flat/update-status/${gId}`,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            location.reload();
                            if (data['warning']) {
                                toastr.warning(data['warning']);
                            }
                            if (data['success']) {
                                toastr.success(data['success']);
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                });
            }
        })

        $(document).on('change', '.selectModalDiv2', function() {
            
            var thisVal = $('.selectModal').val();

            var house_flat_id = $('#exampleModal').find('.house_flat_id').val();
            var house_number_of_flat = $('#exampleModal').find('.house_number_of_flat').val();
            var house_house_id = $('#exampleModal').find('.house_house_id').val();
            var house_house_name = $('#exampleModal').find('.house_house_name').val();
            var house_contract_number = $('#exampleModal').find('.house_contract_number').val();
            var house_entrance = $('#exampleModal').find('.house_entrance').val();
            var house_floor = $('#exampleModal').find('.house_floor').val();
            var flat_price = $('#exampleModal').find('.flat_price').text();
            var price_m2 = $('#exampleModal').find('.house_price_m2').val();
            var data_areas = $('#exampleModal').find('.flat_area').text();
            var room_count = $('.flat_room_count').text();
            $('#exampleModal2').find('.apartment_number').text(room_count)
            if (thisVal == <?php echo e(HouseFlat::STATUS_SOLD); ?>) {
                location.replace("/forthebuilder/deal/create?house_flat_id=" + house_flat_id +
                    "&house_flat_number=" +
                    house_number_of_flat + "&house_id=" + house_house_id + '&house_name=' + house_house_name +
                    '&contract_number=' + house_contract_number + '&flat_price=' + flat_price + '&price_m2=' + price_m2);
            } else if (thisVal == <?php echo e(HouseFlat::STATUS_BOOKING); ?>) {
                $('#exampleModal2').removeClass('d-none')
                // $('#exampleModal').addClass('d-none')
                $('#exampleModal2').modal('toggle')

                $('#exampleModal2').find('.booking-house_flat_id').val(house_flat_id)
                $('#exampleModal2').find('.booking-house_number_of_flat').val(house_number_of_flat)
                $('#exampleModal2').find('.booking-house_house_id').val(house_house_id)
                $('#exampleModal2').find('.booking-house_house_name').val(house_house_name)
                $('#exampleModal2').find('.booking-house_contract_number').val(house_contract_number)
                $('#exampleModal2').find('.booking-house_entrance').val(house_entrance)
                $('#exampleModal2').find('.booking-house_floor').val(house_floor)
                
                // $('#exampleModal2').find('.apartment_number').text(house_number_of_flat)
                $('#exampleModal2').find('.apartment_price_m2').text(price_m2)
                $('#exampleModal2').find('.apartment_area').text(data_areas)
                $('#exampleModal2').find('.apartment_price').text(flat_price)
            } else {
                var gId = $('#exampleModal').find('.house_flat_id').val();
                console.log(gId)
                $.get('/forthebuilder/house/show-more-item-detail/' + gId, function(data) {
                    console.log(data);
                    $.ajax({
                        url: `/forthebuilder/house-flat/update-status/${gId}`,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            location.reload();
                            if (data['warning']) {
                                toastr.warning(data['warning']);
                            }
                            if (data['success']) {
                                toastr.success(data['success']);
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                });
            }
        })

        $(document).on('click', '#sales', function() {
            var gId = $(this).parent().parent().find('.house_flat_id').val()
            var number_of_flat = $(this).parent().parent().find('.house_number_of_flat').val()
            var house_id = $(this).parent().parent().find('.house_house_id').val()
            var house_name = $(this).parent().parent().find('.house_house_name').val()
            var contract_number = $(this).parent().parent().find('.house_contract_number').val()
            var entrance = $(this).parent().parent().find('.house_entrance').val()
            var floor = $(this).parent().parent().find('.house_floor').val()
            var _token = $('input[name=_token]').val();

            location.replace("/forthebuilder/deal/create?house_flat_id=" + gId + "&house_flat_number=" +
                number_of_flat + "&house_id=" + house_id + '&house_name=' + house_name + '&contract_number=' +
                contract_number);

            
        })

        // kvartiragani avans orqali band qilishda ism maydoniga keyUp qilinganda bazadan like orqali qidirib kelish
        $(document).on('keyup', '.keyUpName', function(e) {
            e.preventDefault();
            var name = $(this).val();
            var _this = $(this)
            _this.siblings('.keyUpNameResult').addClass('d-none');

            // kvartiragani avans orqali band qilishda ism maydoniga keyUp qilinganda bazadan like orqali qidirib kelish AJAX SEND
            $.get('/forthebuilder/house/search-by-name/' + name, function(data) {
                if (data['searchedLeadList'].length != 0) {
                    _this.siblings('.keyUpNameResult').removeClass('d-none');
                    // } else {
                    var listData = '';
                    $.each(data['searchedLeadList'], function(index, value) {
                        var series = '';
                        if (value['series_number']) {
                            var series = '[' + value['series_number'] + ']';
                        }
                        listData +=
                            `<li
                                    style="list-style: none; padding: 10px;" class="select2-results__option keyUpNameResultLi"
                                    first_name="` + value['first_name'] + `"
                                    last_name="` + value['last_name'] + `"
                                    phone="` + value['phone'] + `"
                                    additional_phone="` + value['additional_phone'] + `"
                                    middle_name="` + value['middle_name'] + `"
                                    series_number="` + value['series_number'] + `"
                                    client_id="` + value['id'] + `"
                                    email="` + value['email'] + `"
                                    inn="` + value['inn'] + `"
                                    issued_by="` + value['issued_by'] + `"
                                    given_date="` + value['given_date'] + `"
                                    >
                                    ` + value['first_name'] + `
                                    ` + value['last_name'] + `
                                    ` + value['middle_name'] + `
                                    ( ` + value['phone'] + ` )
                                    ` + series + `
                                    </li>`;
                    });

                    _this.siblings('.keyUpNameResult').html(listData);
                }

            })
        });

        $(document).on('click', '.keyUpNameResultLi', function() {
            var first_name = $(this).attr('first_name')
            var last_name = $(this).attr('last_name')
            var phone = $(this).attr('phone')
            var additional_phone = $(this).attr('additional_phone')
            var middle_name = $(this).attr('middle_name')
            var series_number = $(this).attr('series_number')
            var client_id = $(this).attr('client_id')
            var email = $(this).attr('email')
            var inn = $(this).attr('inn')
            var issued_by = $(this).attr('issued_by')
            var given_date = $(this).attr('given_date')

            if (client_id == 'null') {
                client_id = ''
            }
            $('.booking-client_id').val(client_id)

            if (first_name == 'null') {
                first_name = ''
            }
            $('.booking-first_name').val(first_name)

            if (last_name == 'null') {
                last_name = ''
            }
            $('.booking-last_name').val(last_name)

            if (phone == 'null') {
                phone = ''
            }
            $('.booking-phone').val(phone)

            if (additional_phone == 'null') {
                additional_phone = ''
            }
            $('.booking-additional_phone').val(additional_phone)

            if (middle_name == 'null') {
                middle_name = ''
            }
            $('.booking-middle_name').val(middle_name)

            if (series_number == 'null') {
                series_number = ''
            }
            $('.booking-series_number').val(series_number)

            if (email == 'null') {
                email = ''
            }
            $('.booking-email').val(email)

            if (inn == 'null') {
                inn = ''
            }
            $('.booking-inn').val(inn)

            if (issued_by == 'null') {
                issued_by = ''
            }
            $('.booking-issued_by').val(issued_by)

            if (given_date == 'null') {
                given_date = ''
            }
            $('.booking-given_date').val(given_date)

            $('.keyUpNameResult').addClass('d-none');
        })

        $(document).on('change', '#prepayment', function() {
            if ($(this).is(':checked')) {
                $('.booking-prepayment_summa').attr('disabled', false)
            } else {
                $('.booking-prepayment_summa').attr('disabled', true)
            }
        });

        $(document).on('click', 'body', function() {
            $('.keyUpNameResult').addClass('d-none')
        })

       
        $(document).on('click', '#sales', function() {
            var gId = $(this).parent().parent().find('.house_flat_id').val()
            var number_of_flat = $(this).parent().parent().find('.house_number_of_flat').val()
            var house_id = $(this).parent().parent().find('.house_house_id').val()
            var house_name = $(this).parent().parent().find('.house_house_name').val()
            var contract_number = $(this).parent().parent().find('.house_contract_number').val()
            var entrance = $(this).parent().parent().find('.house_entrance').val()
            var floor = $(this).parent().parent().find('.house_floor').val()
            var _token = $('input[name=_token]').val();

            location.replace("/forthebuilder/deal/create?house_flat_id=" + gId + "&house_flat_number=" +
                number_of_flat + "&house_id=" + house_id + '&house_name=' + house_name + '&contract_number=' +
                contract_number);

           
        })

        $(document).on('click', '#delete-data-item', function(e) {
            if (!confirm('Вы уверены, что удалите этот элемент?')) {
                e.preventDefault();
            }
        })

        $(document).on('change', '.deal_create_house_id', function() {
            var houseID = $(this).val();
            console.log(houseID)
            $(".deal_create_registry_number").prop('disabled', true);
            if (houseID) {
                $.ajax({
                    type: "GET",
                    datatype: "json",
                    url: "/forthebuilder/deal/get-flat?house_id=" + houseID,
                    success: function(data) {
                        // console.log(data)
                        if (data) {
                            $(".deal_create_registry_number").empty();
                            $(".deal_create_registry_number").append(
                                "<option val=''>-------------</option>");
                            data.forEach(function(item) {
                                console.log(item)
                                $(".deal_create_registry_number").append('<option value="' +
                                    item
                                    .id + '">' + item.number_of_flat +
                                    '</option>');
                            })
                            $(".deal_create_registry_number").prop('disabled', false); //disable
                            // $("#inputID").prop('disabled', false); //enable
                        } else {
                            $(".deal_create_registry_number").empty();
                            $(".deal_create_registry_number").prop('disabled', false); //disable
                        }
                    }
                });
            } else {
                $(".deal_create_registry_number").empty();
            }
            // deal();
        });

        $(document).on('click', '.clientDelete', function() {
            var url = $(this).attr('data-url')
            $('#exampleModalLong .modal-body').find('form').attr('action', url)
        })

        $(document).on('click', '.clientInfoClick', function() {
            var id = $(this).attr('data-id')
            $('.clientInfoDiv').addClass('d-none')
            $('#' + id).removeClass('d-none')

            $('.clientInfoClick').removeClass('smsOneNumberBlue').addClass('smsOneNumber')
            $(this).addClass('smsOneNumberBlue')
        })

        $(document).on('change', ':radio[name="filter"]', function() {
            var url = '/forthebuilder/task/';
            if ($(this).val() == '1') {
                var url = '/forthebuilder/task/filter-index';
            }

            window.location.replace(url)
        })

        $(document).on('click', '.client-show-change-status', function() {
            var series = $(this).attr('data-series_number')
            var inn = $(this).attr('data-inn')
            var issued_by = $(this).attr('data-issued_by')
            var budget_ = $(this).attr('budget')
            var looking_for_ = $(this).attr('looking_for')
            var deal_status = $(this).attr('deal_status')
            let password_checkbox_ = document.getElementById('password_checkbox')
            let password_input_ = document.getElementsByClassName('password_input')
            let first_contact = '<?php echo e(translate('First contact')); ?>'
            let negotiation = '<?php echo e(translate('Negotiation')); ?>'
            let make_deal = '<?php echo e(translate('Making a deal')); ?>'
            if (password_checkbox.checked != true) {
                password_input[0].setAttribute('disabled', true)
                password_input[1].setAttribute('disabled', true)
                password_input[2].setAttribute('disabled', true)
            }
            $('#selected_deal_status').text()

            function setValue() {
                if (series != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-series').val(series)
                }
                if (budget_ != "") {
                    $('#budget_input').val(budget_)
                    $('#budget_input_hidden').val(budget_)
                }
                if (looking_for_ != "") {
                    $('#looking_for_input').val(looking_for_)
                    $('#looking_for_hidden').val(looking_for_)
                }
                if (issued_by != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-issued').val(issued_by)
                }
                if (inn != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-inn').val(inn)
                }
                switch (deal_status) {
                    case '1':
                        $('#selected_deal_status').text(first_contact)
                        $('#selected_deal_status').addClass('status_first_contact')
                        if ($('#selected_deal_status').hasClass('status_negotiation')) {
                            $('#selected_deal_status').removeClass('status_negotiation')
                        }
                        if ($('#selected_deal_status').hasClass('status_making_a_deal')) {
                            $('#selected_deal_status').removeClass('status_making_a_deal')
                        }
                        break
                    case '2':
                        $('#selected_deal_status').text(negotiation)
                        $('#selected_deal_status').addClass('status_negotiation')
                        if ($('#selected_deal_status').hasClass('status_first_contact')) {
                            $('#selected_deal_status').removeClass('status_first_contact')
                        }
                        if ($('#selected_deal_status').hasClass('status_making_a_deal')) {
                            $('#selected_deal_status').removeClass('status_making_a_deal')
                        }
                        break
                    case '3':
                        $('#selected_deal_status').text(make_deal)
                        $('#selected_deal_status').addClass('status_making_a_deal')
                        if ($('#selected_deal_status').hasClass('status_negotiation')) {
                            $('#selected_deal_status').removeClass('status_negotiation')
                        }
                        if ($('#selected_deal_status').hasClass('status_first_contact')) {
                            $('#selected_deal_status').removeClass('status_first_contact')
                        }
                        break
                    default:
                }
            }
            setValue()
            password_checkbox_.addEventListener('change', function() {
                if (password_checkbox.checked != true) {
                    password_input_[0].setAttribute('disabled', true)
                    password_input_[1].setAttribute('disabled', true)
                    password_input_[2].setAttribute('disabled', true)
                    password_input_[0].value = ''
                    password_input_[1].value = ''
                    password_input_[2].value = ''
                } else {
                    password_input_[0].removeAttribute('disabled')
                    password_input_[1].removeAttribute('disabled')
                    password_input_[2].removeAttribute('disabled')
                    setValue()
                }
                if (series != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-series').attr("disabled",
                        true)
                }
                if (issued_by != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-issued').attr("disabled",
                        true)
                }
                if (inn != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-inn').attr("disabled",
                        true)
                }
            });

        })

        $(document).on('click', '.clientInfoClick', function() {
            var series = $(this).attr('data-series_number')
            var inn = $(this).attr('data-inn')
            var issued_by = $(this).attr('data-issued_by')
            var budget_ = $(this).attr('budget')
            var looking_for_ = $(this).attr('looking_for')
            var deal_status = $(this).attr('deal_status')
            let password_checkbox_ = document.getElementById('password_checkbox')
            let password_input_ = document.getElementsByClassName('password_input')
            let first_contact = '<?php echo e(translate('First contact')); ?>'
            let negotiation = '<?php echo e(translate('Negotiation')); ?>'
            let make_deal = '<?php echo e(translate('Making a deal')); ?>'
            if (password_checkbox.checked != true) {
                password_input[0].setAttribute('disabled', true)
                password_input[1].setAttribute('disabled', true)
                password_input[2].setAttribute('disabled', true)
            }
            $('#selected_deal_status').text()

            function setValue() {
                if (series != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-series').val(series)
                }
                if (budget_ != "") {
                    $('#budget_input').val(budget_)
                    $('#budget_input_hidden').val(budget_)
                }
                if (looking_for_ != "") {
                    $('#looking_for_input').val(looking_for_)
                    $('#looking_for_hidden').val(looking_for_)
                }
                if (issued_by != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-issued').val(issued_by)
                }
                if (inn != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-inn').val(inn)
                }
                switch (deal_status) {
                    case '1':
                        $('#selected_deal_status').text(first_contact)
                        $('#selected_deal_status').addClass('status_first_contact')
                        if ($('#selected_deal_status').hasClass('status_negotiation')) {
                            $('#selected_deal_status').removeClass('status_negotiation')
                        }
                        if ($('#selected_deal_status').hasClass('status_making_a_deal')) {
                            $('#selected_deal_status').removeClass('status_making_a_deal')
                        }
                        break
                    case '2':
                        $('#selected_deal_status').text(negotiation)
                        $('#selected_deal_status').addClass('status_negotiation')
                        if ($('#selected_deal_status').hasClass('status_first_contact')) {
                            $('#selected_deal_status').removeClass('status_first_contact')
                        }
                        if ($('#selected_deal_status').hasClass('status_making_a_deal')) {
                            $('#selected_deal_status').removeClass('status_making_a_deal')
                        }
                        break
                    case '3':
                        $('#selected_deal_status').text(make_deal)
                        $('#selected_deal_status').addClass('status_making_a_deal')
                        if ($('#selected_deal_status').hasClass('status_negotiation')) {
                            $('#selected_deal_status').removeClass('status_negotiation')
                        }
                        if ($('#selected_deal_status').hasClass('status_first_contact')) {
                            $('#selected_deal_status').removeClass('status_first_contact')
                        }
                        break
                    default:
                }
            }
            setValue()
            password_checkbox_.addEventListener('change', function() {
                if (password_checkbox.checked != true) {
                    password_input_[0].setAttribute('disabled', true)
                    password_input_[1].setAttribute('disabled', true)
                    password_input_[2].setAttribute('disabled', true)
                    password_input_[0].value = ''
                    password_input_[1].value = ''
                    password_input_[2].value = ''
                } else {
                    password_input_[0].removeAttribute('disabled')
                    password_input_[1].removeAttribute('disabled')
                    password_input_[2].removeAttribute('disabled')
                    setValue()
                }
                if (series != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-series').attr("disabled",
                        true)
                }
                if (issued_by != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-issued').attr("disabled",
                        true)
                }
                if (inn != "") {
                    $('#store_budget_modal .modal-body').find('.client-show-modal-inn').attr("disabled",
                        true)
                }
            });

        })

        $(document).on('click', '.client-show-buttons', function(e) {
            e.preventDefault()
            var status = $('.client-show-select').val()

            if (status == <?php echo e(Constants::FIRST_CONTACT); ?>) {

            } else if (status == <?php echo e(Constants::NEGOTIATION); ?>) {

            } else if (status == <?php echo e(Constants::MAKE_DEAL); ?>) {

            }
        })


        $(document).on('click', '#customckeck1_house', function(e) {
            if ($(this).prop("checked") == true) {
                $('#noneDownDrop').removeClass('d-none')
            } else {
                $('#noneDownDrop').addClass('d-none')
            }
        })

        $(document).on('keyup', '.searchTable', function() {
            var _searchVal = $(this).val()
            $('.hideData').removeClass('d-none')
            $(".hiddenData").each(function(index) {
                var thisVal = $(this).val()

                if (thisVal.toLowerCase().search(_searchVal.toLowerCase()) < 0) {
                    
                    $(this).parent().parent('.hideData').addClass('d-none')
                }
            });
        })

        

        $(document).on('change', '.selectPercent', function() {
            var percent = $(this).find('option:selected').attr('data-percent')
            var thisVal = $(this).val()
            var dealCreatePrice = $('.dealCreatePrice').val()
            var setVal = parseInt(dealCreatePrice) - parseInt(parseInt(dealCreatePrice) / 100 * parseInt(percent))
            
            $('.initialFeeDeal').val(setVal)
        })

        $(document).on('keyup', '.searchInput', function(e) {
            var keyupText = $(this).val()
            $('.searchLi').each(function() {
                if (keyupText == '') {
                    $(this).addClass('d-none')
                    $('.searchMainDiv').addClass('d-none')
                } else {
                    var myText = $(this).text();
                    if (myText.toLowerCase().includes(keyupText.toLowerCase())) {
                        $('.searchMainDiv').removeClass('d-none')
                        $(this).removeClass('d-none')
                    } else {
                        $(this).addClass('d-none')
                    }
                }
            });
        })

        $(document).on('keyup', '.currencyUpdate', function(e) {
            if (e.which == 13) {
                var val = $(this).val()
                var attr = $(this).attr('data-status')
                var id = $(this).parent().parent().find('#currencyId').val()

                $.ajax({
                    url: `/forthebuilder/currency/update/` + id,
                    data: {
                        val: val,
                        attr: attr,
                    },
                    type: 'PUT',
                    success: function(data) {
                        if (data == true) {
                            location.reload()
                        }
                    },
                });
            }
        })

        $(document).on('click', '#currencyUpdateButton', function(e) {
            $('.currencyUpdate').prop('disabled', (i, v) => !v)
            toastr.success(
                `<?php echo e(translate('Currency save')); ?>`
            );
        })

        $(document).on('click', '.couponSave', function(e) {
            var name = $('.couponCreateName').val()
            var percent = $('.couponCreatePercent').val()

            if (name != '' && percent != '') {
                $.ajax({
                    url: `/forthebuilder/coupon/store`,
                    data: {
                        name: name,
                        percent: percent,
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data == true) {
                            location.reload()
                        }
                    },
                });
            }
        })

        $(document).on('keyup', '#coupon', function(e) {
            e.preventDefault()
            var text = $(this).val()
            var _this = $(this)

            $('#coupon_percent').val('')
            $('#applied').text('')
            $.ajax({
                url: `/forthebuilder/house-flat/search-coupon/${text}`,
                // data: {status: 0},
                type: 'GET',
                success: function(data) {
                    if (!(data.length === 0)) {
                        $('#applied').text('Применён')
                        $('#coupon_percent').val(data.percent)
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        $(document).on('click', '.couponEdit', function(e) {
            var typeName = $(this).parent().parent().find('.couponName').attr('type')
            var typePercent = $(this).parent().parent().find('.couponPercent').attr('type')
            $(this).siblings('.couponUpdate').toggleClass('d-none');
            // $(this).addClass('d-none');
            $(this).parent().parent().find('.couponName').siblings('span').toggle();
            $(this).parent().parent().find('.couponPercent').siblings('span').toggle();

            $(this).parent().parent().find('.couponName').attr('type', 'hidden');
            if (typeName == 'hidden')
                $(this).parent().parent().find('.couponName').attr('type', 'text');

            $(this).parent().parent().find('.couponPercent').attr('type', 'hidden');
            if (typePercent == 'hidden')
                $(this).parent().parent().find('.couponPercent').attr('type', 'text');

        })

        $(document).on('click', '.couponUpdate', function(e) {
            var id = $(this).parent().parent().find('.couponId').val();
            var name = $(this).parent().parent().find('.couponName').val();
            var percent = $(this).parent().parent().find('.couponPercent').val();

            $.ajax({
                url: `/forthebuilder/coupon/update/` + id,
                data: {
                    name: name,
                    percent: percent,
                },
                type: 'PUT',
                success: function(data) {
                    if (data == true) {
                        location.reload()
                    }
                },
            });
        })

        $(document).on('click', '.couponDelete', function(e) {
            $(this).siblings('form').find('button').trigger('click')
        })

        $(document).on('change', '.priceInformationSelectHouse', function(e) {
            $('.priceFormationOpenFlats').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#exampleModal')
        })

        $(document).on('click', '.priceFormationOpenFlats', function(e) {
            $('#exampleModal .modal-body').html('')
            arrPriceFormation = new Array();

            var house_id = $('.priceInformationSelectHouse').val()
            $.ajax({
                url: `/forthebuilder/house/prices-house-flats`,
                data: {
                    house_id: house_id,
                },
                type: 'GET',
                success: function(data) {
                    $('#exampleModal .modal-body').html(data)
                },
            });
        })

        var arrPriceFormation = new Array();
        $(document).on('click', '.btnFilterFlat', function(e) {
            var def = $(this).attr('data-default')
            var id = $(this).attr('data-id')
            if (def == 0) {
                arrPriceFormation.push(id)

                $(this).attr('data-default', 1)
                $(this).css('background-color', 'lightgrey')
            } else {
                arrPriceFormation.splice(arrPriceFormation.indexOf(id), 1);

                $(this).attr('data-default', 0)
                $(this).css('background-color', ($(this).attr('datd-color')))
            }
        })

        $(document).on('click', '.savePriceFormation', function(e) {
            $('#price_formaition_id').val(arrPriceFormation)
            console.log(arrPriceFormation)
            $('.priceFormationOpenFlats').css('opacity', 1)
            $('.priceFormationOpenFlats').text("<?php echo e(translate('Flat choosen')); ?>")
        })

        $(document).on('change', '.obrazavaniyaSelect', function(e) {
            $(this).css('opacity', 1)
        })

        $(document).on('keyup', '.obrazavaniyaSelectInput', function(e) {
            var val = $(this).val()
            if (val != '') {
                $(this).css('opacity', 1)
            } else {
                $(this).css('opacity', 0.25)
            }
        })

        $(document).on('click', '.btnDealCreateFile', function(e) {
            $('.clickDealCreateFile').trigger('click')
        })

        $(document).on('click', '.addNewCoupon', function(e) {
            $('.formNewCoupon').removeClass('d-none')
        })

        $(document).on('click', '.removeFormCoupon', function(e) {
            $('.formNewCoupon').addClass('d-none')
        })

        $(document).on('click', '.addNewCurrency', function(e) {
            $('.formNewCurrency').removeClass('d-none')
        })

        $(document).on('click', '.removeFormCurrency', function(e) {
            $('.formNewCurrency').addClass('d-none')
        })

        $(document).on('click', '.currencySave', function(e) {
            var USD = $('.currencyUsd').val()
            var sum_uzb = $('.currencyUzs').val()

            if (USD != '' && sum_uzb != '') {
                $.ajax({
                    url: `/forthebuilder/currency/store`,
                    data: {
                        USD: USD,
                        sum_uzb: sum_uzb,
                    },
                    type: 'POST',
                    success: function(data) {
                        if (data == true) {
                            window.location.reload()
                        }
                        else{
                            alert(<?php echo e(translate('Error')); ?>)
                        }
                    },
                });
            }
        })

        let sessionSuccess = "<?php echo e(session('deleted')); ?>";
        if (sessionSuccess) {
            toastr.success(sessionSuccess)
        }

        let sessionSuccess2 = "<?php echo e(session('success')); ?>";
        if (sessionSuccess2) {
            toastr.success(sessionSuccess2)
        }

        let sessionUpdated = "<?php echo e(session('updated')); ?>";
        if (sessionUpdated) {
            toastr.success(sessionUpdated)
        }

        let sessionDeleteWarning = "<?php echo e(session('delete_warning')); ?>";
        if (sessionDeleteWarning) {
            toastr.warning(sessionDeleteWarning)
        }

        $(document).on('keyup', '.houesCreateCalculateTotal', function(e) {
            var entrance_one_floor_count = parseInt($('#entrance_one_floor_count').val())
            var floor_count = parseInt($('#floor_count').val())
            var entrance_count = parseInt($('#entrance_count').val())

            $('#total_flat').val((entrance_one_floor_count * floor_count) * entrance_count)
        })

        $(document).on('click', '.deleteHouses', function() {
            var url = $(this).attr('data-delete_url');
            $('#exampleModalLong').find('form').attr('action', url);
        })

        // $(document).on('click', '.save-flats', function(e) {
        //     alert()
        // // $(".save-flats").unbind('click').bind('click', function () {
        //     e.preventDefault()
        //     var number = $('.room-count-button[is-selected="true"]').attr('data-number')
        //     if (number == 'p') {
        //         $('#exampleModal .modal-body').find('form .change_content').html(`
        //             <div class="my-1">
        //                 <label class="form-label"><?php echo e(translate('Total area')); ?></label>
        //                 <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
        //             </div>
        //         `)
        //     } else if (number == 'c') {
        //         $('#exampleModal .modal-body').find('form .change_content').html(`
                    

        //             <div class="col-6 mt-1">
        //                 <div class="form-check mb-2 form-check-primary">
        //                     <input class="form-check-input" type="checkbox" id="terassa">
        //                     <label class="form-check-label" for="terassa">
        //                         <?php echo e(translate('Terrace')); ?> 
        //                     </label>
        //                 </div>
        //                 <input type="number" placeholder="" name="terassa" class="form-control modalMiniCapsule4 keyup_input_area text-left"
        //                     id="terassa_input" disabled>
        //             </div>

        //             <div class="col-6 my-1">
        //                 <div class="form-check mb-2 form-check-primary">
        //                     <input class="form-check-input" type="checkbox" id="balcony">
        //                     <label class="form-check-label" for="balcony">
        //                         <?php echo e(translate('Balcony')); ?> 
        //                     </label>
        //                 </div>
        //                 <input type="text" placeholder="" name="balcony" class="modalMiniCapsule4 keyup_input_area text-left form-control"
        //                     id="balcony_input" disabled>
        //             </div>

        //             <div class="col-12 mt-1">
        //                 <label class="form-label"><?php echo e(translate('Total area')); ?></label>
        //                 <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
        //             </div>
        //         `)
        //     } else {
        //         $('#exampleModal .modal-body').find('form .change_content').html(`
                    

        //             <div class="mt-1 col-6">
        //                 <label class="form-label d-flex justify-content-between">
        //                     <b><?php echo e(translate('Hotel')); ?></b>
        //                     <span>
        //                         <span class="btn btn-sm btn-danger minus_hotel">
        //                             <i class="fa fa-minus"></i>
        //                         </span>
        //                         <span class="btn btn-sm btn-success plus_hotel">
        //                             <i class="fa fa-plus"></i>
        //                         </span>
        //                     </span>
        //                 </label>
        //                 <input type="number" name="hotel" class="modalMiniCapsule4 keyup_input_area text-left form-control">
        //                 <div class="add_hotel_rooms" data-count="2"></div>
        //             </div>

        //             <div class="mt-1 col-6">
        //                 <label class="form-label d-flex justify-content-between">
        //                     <b><?php echo e(translate('Bedroom')); ?></b>
        //                     <span>
        //                         <span class="btn btn-sm btn-danger minus_bedroom">
        //                             <i class="fa fa-minus"></i>
        //                         </span>
        //                         <span class="btn btn-sm btn-success plus_bedroom">
        //                             <i class="fa fa-plus"></i>
        //                         </span>
        //                     </span>
        //                 </label>
        //                 <input type="number" name="bedroom" class="modalMiniCapsule4 keyup_input_area text-left form-control">
        //                 <div class="add_bedroom_rooms" data-count="2"></div>
        //             </div>


        //             <div class="mt-1 col-4">
        //                 <label class="form-label"><?php echo e(translate('Kitchen area')); ?></label>
        //                 <input type="number" name="kitchen_area" class="modalMiniCapsule4 keyup_input_area text-left form-control">
        //             </div>

        //             <div class="mt-1 col-4">
        //                 <div class="form-check mb-2 form-check-primary">
        //                     <label class="form-check-label" for="terassa">
        //                         <?php echo e(translate('Terrace')); ?> 
        //                     </label>
        //                 </div>
        //                 <input type="number" placeholder="" name="terassa" class="modalMiniCapsule4 keyup_input_area text-left form-control" id="terassa_input">
        //             </div>

        //             <div class="my-1 col-4">
        //                 <div class="form-check mb-2 form-check-primary">
        //                     <label class="form-check-label" for="balcony">
        //                         <?php echo e(translate('Balcony')); ?> 
        //                     </label>
        //                 </div>
        //                 <input type="text" placeholder="" name="balcony" class="modalMiniCapsule4 keyup_input_area text-left form-control" id="balcony_input">
        //             </div>

        //             <div class="col-4 my-1">
        //                 <label class="form-label"><?php echo e(translate('Bathroom')); ?></label>
        //                 <input type="text" placeholder="" name="bathroom" class="form-control text-left keyup_input_area" id="bathroom_input">
        //             </div>

        //             <div class="col-4 my-1">
        //                 <label class="form-label"><?php echo e(translate('Corridor')); ?></label>
        //                 <input type="text" placeholder="" name="corridor" class="form-control text-left keyup_input_area" id="corridor_input">
        //             </div>

        //             <div class="col-4 my-1">
        //                 <label class="form-label"><?php echo e(translate('Other')); ?></label>
        //                 <input type="text" placeholder="" name="other" class="modalMiniCapsule4 form-control text-left keyup_input_area" id="other_input" >
        //             </div>

        //             <div class="mt-1">
        //                 <label class="form-label"><?php echo e(translate('Total area')); ?></label>
        //                 <input type="number" name="total_area" class="modalMiniCapsule4 text-left form-control">
        //             </div>
        //         `)
        //     }
        // })

        $(document).on('keyup', '#coupon-in-deal', function(e) {
            e.preventDefault()
            var text = $(this).val()
            var _this = $(this)

            $('#coupon_percent').val('')
            $('#applied').text('')
            $.ajax({
                url: `/forthebuilder/house-flat/search-coupon/${text}`,
                // data: {status: 0},
                type: 'GET',
                success: function(data) {
                    if (!(data.length === 0)) {
                        $('#applied').text('Применён')
                        _this.attr('percent', data.percent)
                    } else {
                        _this.attr('percent', 0)
                    }
                    $('.calculate_coupon_price').trigger('click')
                },
                error: function(data) {
                    console.log(data);
                }
            });
        })

        $(document).on('click', '.calculate_coupon_price', function(e) {
            e.preventDefault()
            var price = parseFloat($('.dealCreatePrice').attr('original-price'))
            var price_m2 = parseFloat($('.dealCreatePriceM2').attr('original-price'))
            var coupon = parseFloat($('#coupon-in-deal').attr('percent'))

            if (!(coupon > 0)) {
                coupon = 0
            }
            var answer = price - (price / 100 * coupon)
            $('.dealCreatePrice').val(answer)

            var answer_m2 = price_m2 - (price_m2 / 100 * coupon)
            $('.dealCreatePriceM2').val(answer_m2)
        })

        $(document).on('keyup', '.dealCreatePrice', function() {
            $(this).attr('original-price', $(this).val())
        })

        $(document).on('keyup', '.dealCreatePriceM2', function() {
            $(this).attr('original-price', $(this).val())
        })
        
        // minusForSummPrice
        $(document).on('click', '.minusForSummPrice', function(e) {
            e.preventDefault()
            var data_count = $('.plusForSummPrice').attr('data-count')
            var new_count = parseInt(data_count) - 1
            $('.divForSummPrice>div').last().remove()
            $('.plusForSummPrice').attr('data-count', new_count) 
        })

        

        $(document).on('click', '.saveDealDogovor', function(e) {
            $('#exampleModalSave').modal('toggle')
        })

        $(document).on('click','.yes_now',function(){
            $('#deal-create-form').unbind('submit').submit();            
        })

        $(document).on('click','.not_now',function(){
            $('#deal-create-form .not_contract').val(1)
            $('#deal-create-form').unbind('submit').submit();            
        })


        // kanban
        "use strict";
        !(function (e) {
            function o() {
                this.$body = e("body");
            }
            e("#upcoming_1, #upcoming_2, #upcoming_3, #upcoming_4")
                .sortable({
                    connectWith: ".taskList",
                    placeholder: "task-placeholder",
                    forcePlaceholderSize: !0,
                    update: function (o, t) {
                        
                        e("#todo").sortable("toArray"), e("#upcoming_2").sortable("toArray"), e("#upcoming_3").sortable("toArray"), e("#upcoming_4").sortable("toArray");
                    },
                    
                    remove: function( event, ui ) {
                        const id = ui.item[0].dataset.id
                        const parent = $('.sortable-list').find(`[data-id='${id}']`).parent().attr('id')

                        $.ajax({
                            type: "GET",
                            datatype: "json",
                            url: `/forthebuilder/task/update-task/`,
                            data:{
                                id: id,
                                parent: parent
                            },
                            success: function(data) {
                                if (data.status == true) {
                                    showToast('success',data.message)
                                }
                                if (data.status == false) {
                                    showToast('danger',data.message)
                                    $("#upcoming_1, #upcoming_2, #upcoming_3, #upcoming_4").sortable( "cancel" );
                                }
                            },
                            // error: function(data) {
                            //     console.log(data);
                            // }
                        });
                    },

                })
                .disableSelection(),
                (o.prototype.init = function () {}),
                (e.KanbanBoard = new o()),
                (e.KanbanBoard.Constructor = o);
        })(window.jQuery),
            window.jQuery.KanbanBoard.init();

        !(function (e) {
            function o() {
                this.$body = e("body");
            }
            e("#deal_1, #deal_2, #deal_3")
                .sortable({
                    connectWith: ".taskList",
                    placeholder: "task-placeholder",
                    forcePlaceholderSize: !0,

                    update: function (o, t) {
                        e("#todo").sortable("toArray"), e("#deal_2").sortable("toArray"), e("#deal_3").sortable("toArray");
                    },
                    
                    remove: function( event, ui ) {


                        const id = ui.item[0].dataset.id
                        const parent = $('.sortable-list').find(`[data-id='${id}']`).parent().attr('id')
                        const type = ui.item[0].dataset.type

                        if (type == 3) {
                            $('#cancel_sortable_modal').modal('toggle')
                        }
                        else if(type == 2 && parent == 'deal_1'){
                            $.ajax({
                                type: "GET",
                                datatype: "json",
                                url: `/forthebuilder/deal/update-deal/`,
                                data:{
                                    id: id,
                                    parent: parent
                                },
                                success: function(data) {
                                    if (data.status == true) {
                                        showToast('success',data.message)
                                        $('.sortable-list').find(`[data-id='${id}']`).find('span.badge').removeClass().addClass('badge bg-'+data.color)
                                    }
                                    if (data.status == false) {
                                        showToast('danger',data.message)
                                        $("#deal_1, #deal_2, #deal_3").sortable( "cancel" );
                                    }
                                },
                            });
                        }
                        else{
                            const clientId = ui.item[0].dataset.clientId
                            const personalId = ui.item[0].dataset.personalId
                            const houseFlatId = ui.item[0].dataset.houseFlatId
                            const houseId = ui.item[0].dataset.houseId
                            const houseName = ui.item[0].dataset.houseName
                            const inn = ui.item[0].dataset.inn
                            const issuedBy = ui.item[0].dataset.issuedBy
                            const numberOfFlat = ui.item[0].dataset.numberOfFlat
                            const seriesNumber = ui.item[0].dataset.seriesNumber
                            const url = ui.item[0].dataset.url

                            $('#select_flat_modal2 #store_budget_').attr('action', url)
                            $('#select_flat_modal2 #deal_id').val(id)
                            $('#select_flat_modal2 #personal_id').val(personalId)
                            $('#select_flat_modal2 #model_house_id').val(houseId)
                            $('#select_flat_modal2 #model_house_flat_id').val(houseFlatId)
                            $('#select_flat_modal2 #model_interested_flat').text(houseName+' '+numberOfFlat+((houseName) ? '-flat' : ''))
                            const new_type = parent.split("_")
                            $('#select_flat_modal2 #deal_status_value').val(new_type[1])

                            $('#negotiation_id').hide()
                            $('#making_a_deal_id').hide()
                            $('#first_contact_id').hide()
                            if (new_type[1] == 1) {
                                $('#first_contact_id').show()
                            }
                            else if(new_type[1] == 2){
                                $('#negotiation_id').show()
                            }
                            else{
                                $('#making_a_deal_id').show()
                            }
                            $('#select_flat_modal2').modal('toggle')
                        }


                        
                       
                    },

                })
                .disableSelection(),
                (o.prototype.init = function () {}),
                (e.KanbanBoard = new o()),
                (e.KanbanBoard.Constructor = o);
        })(window.jQuery),
            window.jQuery.KanbanBoard.init();

        function showToast (text,message) {
            var toastElList = [].slice.call(document.querySelectorAll('.toast_'+text))
            $('.toast_'+text).find('.toast-body').text(message)
            var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl)
          })
          toastList.forEach(toast => toast.show()) 
        }

        $('#cancel_sortable_modal').on('hidden.bs.modal', function () {
          $("#deal_1, #deal_2, #deal_3").sortable('cancel')
        })

        $('.select2').select2({
            dropdownParent: $("#standard-modal"),
            placeholder: 'sdsdsdsds'
        })

        $('.select3').select2({
            dropdownParent: $("#standard-modal"),
            placeholder: 'sdsdsdsds'
        })

        $('.price_select2').select2()

        $('#id_select2_example').select2()
        $('.priceInformationSelectHouse').select2()
        // $('.obrazavaniyaSelect').select2()
        $('.select_client_show_1').select2()


        $(function(){
            $('#task_date').datepicker({
                dropdownParent: $("#standard-modal"),
                autoclose: true,
                format: 'dd.mm.yyyy'
            })

            $('.select4').select2({
                placeholder: 'sdsdsdsds'
            })
        })

        $(document).on('click','.PostavitButton',function(e){
            if($('#selected_deal_id').val() == ''){
                $('#selected_deal_id').siblings('.select2-container--default').find('.select2-selection--single').css('border','1px solid #ff5b5b')
                $('#parsley-id-deal').removeClass('d-none')
                e.preventDefault()
            }
            // 
            if($('#task_date').val() == ''){
                $('#parsley-id-date').removeClass('d-none')
                $('#task_date').addClass('parsley-error')
                e.preventDefault()
            }
        })

        $('#client_show_buttons').select2();
        $('#exampleFormControlSelect1').select2();
        $('#exampleFormControlSelect2').select2();
        $('#country').select2();
        
        $('#datePicker').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });
        // dateInput


        $(document).on('change', '#client_show_buttons', function() {
            
            var thisVal = $(this).val();

            var house_flat_id = $('#exampleModal').find('.house_flat_id').val();
            var house_number_of_flat = $('#exampleModal').find('.house_number_of_flat').val();
            var house_house_id = $('#exampleModal').find('.house_house_id').val();
            var house_house_name = $('#exampleModal').find('.house_house_name').val();
            var house_contract_number = $('#exampleModal').find('.house_contract_number').val();
            var house_entrance = $('#exampleModal').find('.house_entrance').val();
            var house_floor = $('#exampleModal').find('.house_floor').val();
            var flat_price = $('#exampleModal').find('.flat_price').text();
            var price_m2 = $('#exampleModal').find('.house_price_m2').val();
            var data_areas = $('#exampleModal').find('.flat_area').text();

            if (thisVal == <?php echo e(HouseFlat::STATUS_SOLD); ?>) {
                location.replace("/forthebuilder/deal/create?house_flat_id=" + house_flat_id +
                    "&house_flat_number=" +
                    house_number_of_flat + "&house_id=" + house_house_id + '&house_name=' + house_house_name +
                    '&contract_number=' + house_contract_number + '&flat_price=' + flat_price + '&price_m2=' + price_m2);
            } else if (thisVal == <?php echo e(HouseFlat::STATUS_BOOKING); ?>) {
                $('#exampleModal2').removeClass('d-none')
                // $('#exampleModal').addClass('d-none')
                $('#exampleModal2').modal('toggle')

                $('#exampleModal2').find('.booking-house_flat_id').val(house_flat_id)
                $('#exampleModal2').find('.booking-house_number_of_flat').val(house_number_of_flat)
                $('#exampleModal2').find('.booking-house_house_id').val(house_house_id)
                $('#exampleModal2').find('.booking-house_house_name').val(house_house_name)
                $('#exampleModal2').find('.booking-house_contract_number').val(house_contract_number)
                $('#exampleModal2').find('.booking-house_entrance').val(house_entrance)
                $('#exampleModal2').find('.booking-house_floor').val(house_floor)

                $('#exampleModal2').find('.apartment_number').text(house_number_of_flat)
                $('#exampleModal2').find('.apartment_price_m2').text(price_m2)
                $('#exampleModal2').find('.apartment_area').text(data_areas)
                $('#exampleModal2').find('.apartment_price').text(flat_price)
            } else {
                var gId = $('#exampleModal').find('.house_flat_id').val();
                console.log(gId)
                $.get('/forthebuilder/house/show-more-item-detail/' + gId, function(data) {
                    console.log(data);
                    $.ajax({
                        url: `/forthebuilder/house-flat/update-status/${gId}`,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            location.reload();
                            if (data['warning']) {
                                toastr.warning(data['warning']);
                            }
                            if (data['success']) {
                                toastr.success(data['success']);
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                });
            }
        })

        $(document).on('click','.rightbar-title a',function(){
            $('body').trigger('click')
        })

        $(document).on('click','#all_select',function(){
            // $('.podyedzNameDaleNol').attr('data-default',1);
            // $('.podyedzNameDaleNol').css('background-color','lightgrey');
            $('.btnFilterFlat').trigger('click')
        })
        $(document).on('click','#all_cancel',function(){
            $('.podyedzNameDaleNol').attr('data-default',0);
            $('.podyedzNameDaleNol').css('background-color','rgb(251, 48, 48)');
            // $('.btnFilterFlat').trigger('click')
            // $('.dalePodyedzBig2 .podyedzNameDaleNol').each(function(i, obj) {

            //     $(this).trigger('click')
            //     // $(this).css('background-color', $(this).attr('datd-color'))
            // });
        })

        $(document).on('click','#row_select',function(){
            $(this).parent().find('.btnFilterFlat').trigger('click')
            $(this).attr('id','row_cancel')
            $(this).html('<i class="fa fa-times"></i>')
            
        })
        $(document).on('click','#row_cancel',function(){
            $(this).parent().find('.btnFilterFlat').trigger('click')
            $(this).parent().find('.btnFilterFlat').css('background-color','rgb(251, 48, 48)')
            $(this).attr('id','row_select')
            $(this).html('<i class="fa fa-check"></i>')
            
        })

        $(document).on('change','.change_settings',function(){            
            $.ajax({
                url: `/forthebuilder/user/change-setting`,
                data: $('#change_setting').serialize(),
                type: 'POST',
                success: function(data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                    }
                    else{
                        showToast('danger',data.message)
                    }
                },
            });
        })

        $(document).on('click','#resetBtn',function(){
            $.ajax({
                url: `/forthebuilder/user/reset-setting`,
                type: 'POST',
                data: {delete: true},
                success: function(data) {
                    if (data.status == 'success') {
                        showToast('success',data.message)
                        window.location.reload()
                    }
                    else{
                        showToast('danger',data.message)
                    }
                },
            });
        })
    </script>
</body>

</html>
<?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/layouts/forthebuilder.blade.php ENDPATH**/ ?>