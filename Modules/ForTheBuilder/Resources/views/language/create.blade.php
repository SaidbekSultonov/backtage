@extends('forthebuilder::layouts.forthebuilder')
@section('title')
    {{ translate('Currency') }}
@endsection
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.css" />
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/select2/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/bootstrap-datetimepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/kartik-v-bootstrap-fileinput/css/fileinput.min.css')); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend-assets/forthebuilders/toastr/css/toastr.min.css') }}">

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
                                <button class="yazik_soxranitBtn btn btn-outline-success">{{ translate('Save') }}</button>
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
                                <th>{{ translate('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @empty(!$languages)
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($languages as $value)
                                    <tr class="sozdatRassrochkaDataUae2">
                                        <td class="checkboxDivInput">
                                            {{ $i++ }}
                                            @php $i = $i; @endphp
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            {{ $value->name }}
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            {{ $value->code }}
                                        </td>
                                        <td class="checkboxDivTextInput35652">
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
                                    </tr>
                                @endforeach
                                <tr>
                                    <form action="{{ route('languages.store') }}" method="POST"> @csrf
                                        <td class="checkboxDivInput">
                                            {{ $i }}
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="{{ translate('Name') }}" required>
                                        </td>
                                        <td class="checkboxDivTextInput3565">
                                            <select class="form-control" id="id_select2_example"
                                                name="code" style="width:100%">
                                                @foreach (\File::files(base_path('public/uploads/flags')) as $path)
                                                    <option data-value="{{ pathinfo($path)['filename'] }}"
                                                        name="{{ pathinfo($path)['filename'] }}"
                                                        value="{{ pathinfo($path)['filename'] }}">
                                                        {{ pathinfo($path)['filename'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn text-success">
                                                <i class=" far fa-check-circle"></i>
                                            </button>
                                            
                                            <a class="btn text-danger" href="{{ route('forthebuilder.language.index') }}" @disabled(true)>
                                                <i class="fe-trash-2 mdi-20"></i>
                                            </a>
                                        </td>
                                    </form>
                                </tr>
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


            
@endsection
@section('scripts')
    <script src="{{ asset('/backend-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/backend-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/backend-assets/plugins/bootstrap-datetimepicker.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>
    <script type="text/javascript">
        let page_name = 'language';

        function custom_template(obj) {
            var data = $(obj.element).data();
            var text = $(obj.element).text();
            if (data && data['value']) {

                template = $("<div><img src='/uploads/flags/" + data['value'] +
                    ".png' style='width:30px; height:20px;'/><b text-align:center; padding-left:10px>" + text +
                    "</b></div>");
                return template;
            }
        }
        var options = {
            'templateSelection': custom_template,
            'templateResult': custom_template,
        }
        $('#id_select2_example').select2(options);
        $('.select2-container--default .select2-selection--single').css({
            'height': '200px'
        });
    </script>
@endsection


