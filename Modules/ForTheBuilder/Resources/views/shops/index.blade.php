@php use Modules\ForTheBuilder\Entities\Constants; @endphp
@extends('forthebuilder::layouts.forthebuilder')
@section('content')
      
   {{-- @dd($data['date_today']) --}}
    @include('forthebuilder::layouts.content.navigation')
    @include('forthebuilder::layouts.content.header')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<style>
    #example_filter{
        margin-bottom: 10px !important;
    }
</style>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid py-3 px-2">
                <div class="card">
                    <div class="card-body p-2 d-flex justify-content-center align-items-center">
                        <div class="row w-100 align-items-center">
                            <div class="col-sm-12 d-flex justify-content-start align-items-center">
                                <h4>{{translate('Магазины')}}</h4>
                                @if(Auth::user()->role_id == Constants::ADMIN)
                                    <a href="{{ route('forthebuilder.shops.create') }}" class="btn btn-outline-info ms-2">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endif        
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm" id="example">
                            <thead>
                                <tr>
                                    <th width="50">№</th>
                                    <th>{{ translate('Арендаторы (орг)') }}</th>
                                    <th>{{ translate('Наименование брендов') }}</th>
                                    <th>{{ translate('Объект') }}</th>
                                    <th>{{ translate('Торговое помещение') }}</th>
                                    <th width="100">{{ translate('Действия') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($model) && count($model) > 0) @php $i = 1; @endphp
                                    @foreach($model as $key => $value)
                                        <tr>
                                            <td>
                                                {{ $i++ }}    
                                            </td>
                                            <td>
                                                <a href="{{ route('forthebuilder.user.report-houses-index',$value->id) }}" class="btn text-primary">
                                                    {{ $value->name }}    
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('forthebuilder.user.report-houses-index',$value->id) }}" class="btn text-primary">
                                                    {{ $value->brend }}    
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('forthebuilder.user.report-houses-index',$value->id) }}" class="btn text-primary">
                                                    {{ (($value->objects) ? $value->objects->name : '') }}    
                                                </a>
                                            </td>
                                            <td>{{ $value->torg }}</td>
                                            <td>
                                                <a href="{{ route('forthebuilder.shops.update',$value->id) }}" class="btn">
                                                    <i class="fas fa-edit text-primary"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">{{ translate('Нет данных!') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="aiz-pagination mt-4">
                            {{ $model->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="model" data-text="{{ count($model) }}"></div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script>
    $(document).ready(function() {

        var model_count = $('#model').attr('data-text')

        if (model_count > 0) {
            var table = new DataTable('#example', {
                "pageLength": 50,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/ru.json',
                },
            });
        }
    })
</script>
@endsection