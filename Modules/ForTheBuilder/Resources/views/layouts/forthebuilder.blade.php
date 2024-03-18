<!DOCTYPE html>
<html lang="en">
@php
    use Modules\ForTheBuilder\Entities\HouseFlat;
    use Modules\ForTheBuilder\Entities\Constants;
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();

@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}" id="token"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/app.min.css')}}" id="app-style" />
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/icons.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/libs/custombox/custombox.min.css')}}" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/fullcalendar/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/select2/css/select2.min.css')}}" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/selectize/css/selectize.bootstrap3.css')}}" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/backend-assets/Admin/dist/assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <title>Chimgan-draw.uz</title>
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
        .mfp-bg{
            z-index: 1050 !important;
        }
        .mfp-wrap{
            z-index: 1051 !important;   
        }
        #loader_block{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0, 0.5);
            z-index: 99999999;
            overflow: hidden;
            display: none;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
@if(!empty($user->settings)) 
    @php  $decode = json_decode($user->settings); @endphp

    <body class="loading" 
        data-layout-color="{{ $decode[0]->layout_color }}"  
        data-layout-mode="default" 
        data-layout-size="{{ $decode[1]->layout_size }}" 
        data-topbar-color="{{ ((isset($decode[6]->topbar_color)) ? $decode[6]->topbar_color : 'light') }}" 
        data-leftbar-position="{{$decode[2]->leftbar_position}}" 
        data-leftbar-color="{{$decode[3]->leftbar_color}}" 
        data-leftbar-size='{{$decode[4]->leftbar_size}}' 
        data-sidebar-user='{{ ((isset($decode[5]->sidebar_user)) ? $decode[5]->sidebar_user : 'true') }}'>

@else
    <body class="loading" 
        data-layout-color="light"  
        data-layout-mode="default" 
        data-layout-size="fluid" 
        data-topbar-color="light" 
        data-leftbar-position="fixed" 
        data-leftbar-color="light" 
        data-leftbar-size='default' 
        data-sidebar-user='true'>

@endif
    <div id="loader_block">
        <div class="spinner-border avatar-lg text-primary m-2" role="status"></div>
        <h3 class="text-white">
            {{ translate('Please be patient, the file may take some time to load!') }}
        </h3>
    </div>
    <!-- Begin page -->
    <div id="wrapper" style="overflow-y: auto;">
        @yield('content')

        

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close"></i>
                </a>
                <br>
                <h5 class="font m-0 text-white"></h5>
            </div>
            <!-- Tab panes -->
            <div class="tab-content pt-0">  

                <div class="tab-pane active" id="settings-tab" role="tabpanel">

                    @if(empty($user->settings))
                        <div class="p-3">
                            <form id="change_setting">
                                <h6 class="fw-medium font-14 mt-2 mb-2 pb-1">{{ translate('Color theme') }}</h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="light"
                                        id="light-mode-check" checked />
                                    <label class="form-check-label" for="light-mode-check">{{translate('Light Mode')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="dark"
                                        id="dark-mode-check" />
                                    <label class="form-check-label" for="dark-mode-check">{{translate('Dark Mode')}}</label>
                                </div>

                                <!-- Width -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Width')}}</h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="fluid" id="fluid" checked />
                                    <label class="form-check-label" for="fluid-check">{{translate('Fluid')}}</label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="boxed" id="boxed" />
                                    <label class="form-check-label" for="boxed-check">{{translate('Boxed')}}</label>
                                </div>

                                <!-- Menu positions -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Menus (Leftsidebar and Topbar) Positon')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="fixed" id="fixed-check"
                                        checked />
                                    <label class="form-check-label" for="fixed-check">{{translate('Fixed')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="scrollable"
                                        id="scrollable-check" />
                                    <label class="form-check-label" for="scrollable-check">{{translate('Scrollable')}}</label>
                                </div>

                                <!-- Left Sidebar-->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Left Sidebar Color')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="light" id="light" />
                                    <label class="form-check-label" for="light-check">{{translate('Light')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="dark" id="dark" checked/>
                                    <label class="form-check-label" for="dark-check">{{translate('Dark')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="brand" id="brand" />
                                    <label class="form-check-label" for="brand-check">{{translate('Brand')}}</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="gradient" id="gradient" />
                                    <label class="form-check-label" for="gradient-check">{{translate('Gradient')}}</label>
                                </div>

                                <!-- size -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Left Sidebar Size')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="default"
                                        id="default-size-check" checked />
                                    <label class="form-check-label" for="default-size-check">{{translate('Default')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="condensed"
                                        id="condensed-check" />
                                    <label class="form-check-label" for="condensed-check">{{translate('Condensed')}} <small>({{translate('Extra Small size')}})</small></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="compact"
                                        id="compact-check" />
                                    <label class="form-check-label" for="compact-check">{{translate('Compact')}} <small>({{translate('Small size')}})</small></label>
                                </div>

                                <!-- User info -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Sidebar User Info')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="sidebar-user" value="enable" id="sidebaruser-check" />
                                    <label class="form-check-label" for="sidebaruser-check">{{translate('Enable')}}</label>
                                </div>


                                <!-- Topbar -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Topbar')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="dark" id="darktopbar-check"
                                        checked />
                                    <label class="form-check-label" for="darktopbar-check">{{translate('Dark')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="light" id="lighttopbar-check" />
                                    <label class="form-check-label" for="lighttopbar-check">{{translate('Light')}}</label>
                                </div>
                            </form>
                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">{{translate('Reset to Default')}}</button>
                            </div>
                        </div>
                    @else
                        @php 
                            $decode = json_decode($user->settings);
                            

                            // 
                            // 
                            // 
                            // 
                            //
                            // 

                        @endphp
                        <div class="p-3">
                            <form id="change_setting">

                                <!--  Color Scheme -->
                                <h6 class="fw-medium font-14 mt-2 mb-2 pb-1">{{ translate('Color theme') }}</h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="light"
                                        id="light-mode-check" {{ (($decode[0]->layout_color == 'light') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="light-mode-check">{{translate('Light Mode')}}</label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-color" value="dark"
                                        id="dark-mode-check"{{ (($decode[0]->layout_color == 'dark') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="dark-mode-check">{{translate('Dark Mode')}}</label>
                                </div>

                                <!-- Width -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Width')}}</h6>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="fluid" id="fluid" {{ (($decode[1]->layout_size == 'fluid') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="fluid">{{translate('Fluid')}}</label>
                                </div>
                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="layout-size" value="boxed" id="boxed" {{ (($decode[1]->layout_size == 'boxed') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="boxed">{{translate('Boxed')}}</label>
                                </div>

                                <!-- Menu positions -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Menus (Leftsidebar and Topbar) Positon')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="fixed" id="fixed-check" {{ ((isset($decode[2]->leftbar_position) && $decode[2]->leftbar_position == 'fixed') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="fixed-check">{{translate('Fixed')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-position" value="scrollable"
                                        id="scrollable-check" {{ ((isset($decode[2]->leftbar_position) && $decode[2]->leftbar_position == 'scrollable') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="scrollable-check">{{translate('Scrollable')}}</label>
                                </div>

                                <!-- Left Sidebar-->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Left Sidebar Color')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="light" id="light"  {{ ((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'light') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="light">{{translate('Light')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="dark" id="dark" {{ ((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'dark') ? 'checked' : '') }}  />
                                    <label class="form-check-label" for="dark">{{translate('Dark')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="brand" id="brand" {{ ((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'brand') ? 'checked' : '') }}  />
                                    <label class="form-check-label" for="brand">{{translate('Brand')}}</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-color" value="gradient" id="gradient" {{ ((isset($decode[3]->leftbar_color) && $decode[3]->leftbar_color == 'gradient') ? 'checked' : '') }}  />
                                    <label class="form-check-label" for="gradient">{{translate('Gradient')}}</label>
                                </div>

                                <!-- size -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Left Sidebar Size')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="default"
                                        id="default-size-check"  {{ ((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'default') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="default-size-check">{{translate('Default')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="condensed"
                                        id="condensed-check" {{ ((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'condensed') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="condensed-check">{{translate('Condensed')}} <small>({{translate('Extra Small size')}})</small></label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="leftbar-size" value="compact"
                                        id="compact-check" {{ ((isset($decode[4]->leftbar_size) && $decode[4]->leftbar_size == 'compact') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="compact-check">{{translate('Compact')}} <small>({{translate('Small size')}})</small></label>
                                </div>

                                <!-- User info -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Sidebar User Info')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="sidebar-user" value="true" id="sidebaruser-check" {{ ((isset( $decode[5]->sidebar_user) &&  $decode[5]->sidebar_user == 'true') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="sidebaruser-check">{{translate('Enable')}}</label>
                                </div>


                                <!-- Topbar -->
                                <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">{{translate('Topbar')}}</h6>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="dark" id="darktopbar-check" {{ ((isset($decode[6]->topbar_color) && $decode[6]->topbar_color == 'dark') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="darktopbar-check">{{translate('Dark')}}</label>
                                </div>

                                <div class="form-check form-switch mb-1">
                                    <input type="checkbox" class="form-check-input change_settings" name="topbar-color" value="light" id="lighttopbar-check" {{ ((isset($decode[6]->topbar_color) && $decode[6]->topbar_color == 'light') ? 'checked' : '') }} />
                                    <label class="form-check-label" for="lighttopbar-check">{{translate('Light')}}</label>
                                </div>
                            </form>

                            <div class="d-grid mt-4">
                                <button class="btn btn-primary" id="resetBtn">{{translate('Reset to Default')}}</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->


     <!-- Vendor -->
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('/backend-assets/forthebuilders/toastr/js/toastr.min.js') }}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/custombox/custombox.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/js/pages/kanban.init.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/admin-resources/rwd-table/rwd-table.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/js/pages/responsive-table.init.js')}}"></script>
    <script src="{{ asset('/backend-assets/plugins/jquery.maskedinput.min.js') }}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/js/pages/form-fileuploads.init.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/js/app.min.js')}}"></script>

    <script>
        $(document).on('change','.change_settings',function(){            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `/user/change-setting`,
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `/user/reset-setting`,
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

        $(document).on('click','.rightbar-title a',function(){
            $('body').trigger('click')
        })

    </script>
</body>

</html>