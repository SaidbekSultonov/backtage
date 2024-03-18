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
                            <div class="col-12 d-flex justify-content-start align-items-center">
                            <a href="{{ route('forthebuilder.shops.index') }}" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">{{translate('Все продажи: ')}} {{ $shop->name }}</h4>   
                        </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th width="50">№</th>
                                    <th>{{ translate('Дата') }}</th>
                                    <th>{{ translate('Сумма') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($model) && count($model) > 0) @php $i = 1; $totals = 0; @endphp
                                    @foreach($model as $key => $value)
                                        @php $totals += $value->total; @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{ date('d.m.Y', strtotime($value->add_time)) }}
                                            </td>
                                            <td>
                                                {{ number_format($value->total,0,'',' ') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="2">{{ translate('Итого') }}</th>
                                        <th>{{ number_format($totals,0,'',' ') }}</th>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="4">{{ translate('Нет данных!') }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection