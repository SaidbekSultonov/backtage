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
                                {{ translate('Translation') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $language->name }}</h4>
                        </div>
                        <div class="col-md-4">
                            <form class="" id="sort_keys" action="" method="GET">
                                <input type="hidden" id="language_code" value="{{ $language->code }}">
                                <div class="input-group input-group-sm">
                                <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type key & Enter') }}">
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="nastroykiData">
                
                        <form class="form-horizontal" action="{{ route('forthebuilder.translation.save') }}" method="POST"> @csrf
                            <input type="hidden" name="id" value="{{ $language->id }}">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="sozdatPerveodMini">
                                        <th class="checkboxDivInput">
                                            №
                                        </th>
                                        <th class="checkboxDivPerewvod">
                                            {{ translate('Key') }}
                                        </th>
                                        <th class="checkboxDivPerewvod">
                                            {{ translate('Translation') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="border-top-0">
                                    @php $i = 1; @endphp  
                                    @foreach ($lang_keys as $key => $translation)
                                        <ditrv class="sozdatPerveodMini2">
                                            <td class="checkboxDivInput">
                                                {{ $i }}
                                            </td>
                                            <td class="checkboxDivPerewvod key" id="google_translate">
                                                {{ $translation->lang_key }}
                                            </td>
                                            <td class="inputsss">
                                                <input type="text" class="checkboxDivPerewvod form-control value" id="input" name="values[{{ $translation->lang_key }}]" @if (($traslate_lang = \Modules\ForTheBuilder\Entities\Translation::where('lang', $language->code)->where('lang_key', $translation->lang_key)->first()) != null) value="{{ $traslate_lang->lang_value }}" @endif>    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            

                            

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="aiz-pagination">
                                        {{ $lang_keys->appends(request()->input())->links() }}
                                    </div>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="copyTranslation()">{{ translate('Copy Translations') }}</button>
                                    <button type="submit" class="btn btn-outline-primary">{{ translate('Save') }}</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




            


    <script src="{{ asset('/backend-assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/backend-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/backend-assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/backend-assets/plugins/bootstrap-datetimepicker.js') }}"></script>

    <script type="text/javascript">
        function copyTranslation() {
            $('.key').each(function(index) {
                console.log($(this).text());
                // var key=document.getElementsByClassName("checkboxDivPerewvod").inner;
                // console.log(key);
                // console.log();

                // $(tr).find('.value').val($(tr).find('.key').text());
                var _this = $(this)

                $.post('{{ route('languages.update_value') }}', {
                    _token: '{{ csrf_token() }}',
                    id: index,
                    code: document.getElementById("language_code").value,
                    status: $(this).text()
                }, function(data) {
                    console.log(data);
                    const tsestQ = document.getElementsByClassName("value");
                    // tsestQ.value=data;
                    // console.log(tsestQ);
                    _this.siblings('.inputsss').find('.value').val(data);
                    // $('.value').val(data);

                });
            });
        }

        function sort_keys(el) {
            $('#sort_keys').submit();
        }
    </script>

@endsection
