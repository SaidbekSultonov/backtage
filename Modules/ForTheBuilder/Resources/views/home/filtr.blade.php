@php use Modules\ForTheBuilder\Entities\Constants; @endphp
@extends('forthebuilder::layouts.forthebuilder')
@section('content')
      
   {{-- @dd($data['date_today']) --}}
    @include('forthebuilder::layouts.content.navigation')
    @include('forthebuilder::layouts.content.header')

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-sm-8">
                                <h4>{{translate('Control Panel')}}</h4>    
                            </div>
                            {{-- <div class="col-sm-4">
                                <div class="ml-auto d-flex align-items-center" id="CurrentDayToday">
                                    <h4>{{translate('Period')}}: </h4>
                                    <input type="text" class="ms-2 form-control daterange" value="{{ date('01.m.Y').' - '.date('t.m.Y') }}">
                                </div>        
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                               
                                <h4 class="header-title mt-0 mb-4">Total Revenue</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <div style="display:inline;width:70px;height:70px;"><canvas width="140" height="140" style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#f05050 " data-bgcolor="#F9B9B9" value="58" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15" readonly="readonly" style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(240, 80, 80); padding: 0px; appearance: none;"></div>
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> 256 </h2>
                                        <p class="text-muted mb-1">Revenue today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-success rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> 8451 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                            <span class="visually-hidden">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-4">Statistics</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <div style="display:inline;width:70px;height:70px;"><canvas width="140" height="140" style="width: 70px; height: 70px;"></canvas><input data-plugin="knob" data-width="70" data-height="70" data-fgcolor="#ffbd4a" data-bgcolor="#FFE6BA" value="80" data-skin="tron" data-angleoffset="180" data-readonly="true" data-thickness=".15" readonly="readonly" style="width: 39px; height: 23px; position: absolute; vertical-align: middle; margin-top: 23px; margin-left: -54px; border: 0px; background: none; font: bold 14px Arial; text-align: center; color: rgb(255, 189, 74); padding: 0px; appearance: none;"></div>
                                    </div>
                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> 4569 </h2>
                                        <p class="text-muted mb-1">Revenue today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-end">
                                        <span class="badge bg-pink rounded-pill float-start mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="fw-normal mb-1"> 158 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-pink progress-sm">
                                        <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;">
                                            <span class="visually-hidden">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div><!-- end col -->

                </div>
            </div>
        </div>
    </div>

    
<div id="line_months" lang="{{ $line_month }}"></div>
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
    var page_name = 'index';
    var line_months = $('#line_months').attr('lang');

    line_months = line_months.split(",");

    
    $('.daterange').daterangepicker({
        locale: {
            format: 'DD.MM.YYYY',
            "applyLabel": $('#lang_app').attr('lang'),
            "cancelLabel": $('#lang_cancel').attr('lang'),
            "monthNames": line_months
        }
    });
    
    $(document).on('click','.applyBtn',function(){
        var date = $('.daterange').val()
        location.href = `/home/filtr/${date}`;
    })

    $(document).ready(function(){
        $.ajax({
            url: `/user/set-status`,
            type: 'get'
        });
    })
</script>
@endsection