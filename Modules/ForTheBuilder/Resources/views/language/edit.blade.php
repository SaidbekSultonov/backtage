@extends('forthebuilder::layouts.forthebuilder')
@section('title') {{ translate('Currency') }} @endsection
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')
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
                    <form class="form-horizontal" action="" method="POST"> @csrf
                        <div class="row  align-items-center ">
                            <div class="col-sm-2">
                                <label class="m-0 form-label">
                                    {{ translate('Default language') }}
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <select class="yazikHeader demo-select2-placeholder" id="country" name="DEFAULT_LANGUAGE">
                                    @foreach ($languages as $key => $language)
                                        <option value="{{ $language->code }}" <?php if (env('DEFAULT_LANGUAGE') == $language->code) {
                                            echo 'selected';
                                        } ?>>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <button class="yazik_soxranitBtn btn btn-outline-success">
                                    {{ translate('Save') }}
                                </button>
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
                            @empty(!$languages) @php $i = 1; @endphp
                                @foreach ($languages as $value)
                                    @if ($first_language->id == $value->id)
                                        
                                        <form action="{{ route('languages.update') }}" method="POST"> @csrf 
                                            <input type="hidden" name="language_id" value="{{ $first_language->id }}">
                                            <tr class="sozdatRassrochkaDataUae2">
                                                <td class="checkboxDivInput">
                                                    {{ $i }}
                                                </td>
                                                <td class="checkboxDivTextInput3565">
                                                    <input style="border:none; height:46px;" type="text" class="form-control"
                                                        name="name" placeholder="{{ translate('Name') }}"
                                                        value="{{ $first_language->name }}" required>
                                                </td>
                                                <td class="checkboxDivTextInput3565">
                                                    <select class="form-control" id="id_select2_example"
                                                        name="code">
                                                        @foreach (\File::files(base_path('public/uploads/flags')) as $path)
                                                            <option data-value="{{ pathinfo($path)['filename'] }}"
                                                                name="{{ pathinfo($path)['filename'] }}"
                                                                value="{{ pathinfo($path)['filename'] }}"
                                                                @if ($first_language->code == pathinfo($path)['filename']) selected @endif>
                                                                {{ pathinfo($path)['filename'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                
                                                <td class="seaDiv">
                                                    <button class=" btn text-success" type="submit">
                                                        <i class="far fa-check-circle mdi-20"></i>
                                                    </button>
                                                    
                                                    <a class="btn text-danger" href="{{ route('forthebuilder.language.index') }}" @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </form>
                                    @else
                                        <tr class="sozdatRassrochkaDataUae2">
                                            <td class="checkboxDivInput">
                                                {{ $i++ }}
                                                @php
                                                    $i = $i;
                                                @endphp
                                            </td>
                                            <td class="checkboxDivTextInput3565">
                                                {{ $value->name }}
                                            </td>
                                            <td class="checkboxDivTextInput3565">
                                                {{ $value->code }}
                                            </td>
                                            <td class="checkboxDivTextInput35652">
                                                <a class="text-primary btn" href="{{ route('forthebuilder.language.show', encrypt($value->id)) }}"
                                                    title="{{ translate('Translation') }}">
                                                    <i class="fas fa-language mdi-20"></i>
                                                </a>
                                            
                                                <a class="text-success btn" href="{{ route('forthebuilder.language.edit', encrypt($value->id)) }}">
                                                    <i class="far fa-edit mdi-20"></i>
                                                </a>
                                                @if ($value->code != 'en')
                                                    <a class="text-danger btn" href="{{ route('forthebuilder.language.destroy', encrypt($value->id)) }}"
                                                        @disabled(true)>
                                                        <i class="fe-trash-2 mdi-20"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
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




{{-- <form class="p-4" action="{{ route('languages.update', $language->id) }}" method="POST">
    @csrf --}}



{{-- <div class="checkboxDivTextInput35652">
        <div class="seaDiv">
            <img class="mt-1" width="20" height="20"
                src="{{ asset('/backend-assets/forthebuilders/images/Verifed.png') }}" alt="Trash">
        </div>
        <div class="seaDiv">
            <img class="mt-1" width="20" height="20"
                src="{{ asset('/backend-assets/forthebuilders/images/trash.png') }}" alt="Trash">
        </div>
    </div> --}}
