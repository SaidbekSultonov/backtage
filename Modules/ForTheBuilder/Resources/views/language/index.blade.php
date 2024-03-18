@extends('forthebuilder::layouts.forthebuilder')
@section('title')
    {{ translate('Currency') }}
@endsection
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')
@php use Modules\ForTheBuilder\Entities\Constants; @endphp
<link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css') }}">
<style>
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
    
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-center align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-11 d-flex align-items-center">
                            <a href="{{ route('forthebuilder.settings.index') }}" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                {{ translate('Language') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('env_key_update.update') }}" method="POST">
                    @csrf
                        <div class="row align-items-center">
                            <div class="col-2">
                                <label class="panelUprText yazik_poUmolchaniya yazikPo_umolchaniya">
                                    {{ translate('Default language') }}
                                </label>
                            </div>
                            <div class="col">
                                <input type="hidden" name="types[]" value="DEFAULT_LANGUAGE">
                                <select class="yazikHeader form-control demo-select2-placeholder" id="country" name="DEFAULT_LANGUAGE">
                                    @foreach ($languages as $key => $language)
                                        <option value="{{ $language->code }}" <?php if (env('DEFAULT_LANGUAGE') == $language->code) {
                                            echo 'selected';
                                        } ?>>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                @if (Auth::user()->role_id != Constants::GUEST)
                                    <button class="yazik_soxranitBtn btn btn-outline-success">{{ translate('Save') }}</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>{{ translate('Language') }}</th>
                                <th>{{ translate('Code') }}</th>
                                @if (Auth::user()->role_id != Constants::GUEST)
                                    <th>{{ translate('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @empty(!$languages) @php $i = 1; @endphp
                                @foreach ($languages as $value)
                                    <tr class="sozdatRassrochkaDataUae2">
                                        <td class="checkboxDivInput">
                                            {{ $i++ }}
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            {{ $value->name }}
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            {{ $value->code }}
                                        </td>

                                        @if (Auth::user()->role_id != Constants::GUEST)
                                            <td class="seaDiv">
                                                <a class="btn text-primary" href="{{ route('forthebuilder.language.show', encrypt($value->id)) }}"
                                                    title="{{ translate('Translation') }}">
                                                    <i class="fas fa-language mdi-20"></i>
                                                </a>
                                            
                                                <a class="btn text-success" href="{{ route('forthebuilder.language.edit', encrypt($value->id)) }}">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                @if ($value->code != 'en')
                                                    <a class="btn text-danger" href="{{ route('forthebuilder.language.destroy', encrypt($value->id)) }}" @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endempty
                        </tbody>
                    </table>
                    <br>
                    @if (Auth::user()->role_id != Constants::GUEST)
                        <a href="{{ route('languages.create') }}" class="yazik_soxranitBtn2 btn btn-outline-success">
                            <i class="fas fa-plus-circle"></i>
                            {{ translate('Add language') }}
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

@endsection