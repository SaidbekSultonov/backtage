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
                                <h4>{{translate('Панель управления')}}</h4>    
                            </div>
                            <div class="col-sm-4">
                                {{-- <div class="ml-auto d-flex align-items-center" id="CurrentDayToday">
                                    <h4>{{translate('Period')}}: </h4>
                                    <input type="text" class="ms-2 form-control daterange" value="{{ date('01.m.Y').' - '.date('t.m.Y') }}">
                                </div>  --}}       
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-4">{{translate('Участники')}}</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="
                                               {{ $count_members }}
                                               %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $count_members }} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-4">{{translate('Арендаторы')}}</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="green "
                                               data-bgColor="green" value="
                                               {{ $count_shops }}
                                               %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1"> {{ $count_shops }} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-4">{{ translate('Пользователи') }}</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="orange "
                                               data-bgColor="orange" value="
                                               {{ $count_users }}
                                               %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $count_users }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body pb-0">
                                <h4 class="header-title mt-0 mb-4">{{ translate('Объекты') }}</h4>

                                <div class="widget-chart-1">
                                    <div class="widget-chart-box-1 float-start" dir="ltr">
                                        <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="blue "
                                               data-bgColor="blue" value="
                                               {{ $count_objects }}
                                               %"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15" type="text" />
                                    </div>

                                    <div class="widget-detail-1 text-end">
                                        <h2 class="fw-normal pt-2 mb-1">{{ $count_objects }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                   
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