@php use Modules\ForTheBuilder\Entities\Constants; @endphp
@extends('forthebuilder::layouts.forthebuilder')
@section('content')
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
                            <h4 class="ms-3">{{translate('Добавить новый магазин')}}</h4>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="w-100" action="{{route('forthebuilder.shops.add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label" for="">{{ translate('Название') }}</label>
                                <input type="text" class="form-control @error('name') error-data-input is-invalid @enderror" name="name">
                                <span class="error-data invalid-feedback">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label" for="">{{ translate('Объект') }}</label>
                                <select name="object_id" id="object" class="form-control objects @error('object_id') error-data-input is-invalid @enderror">
                                    @if(!empty($objects))
                                        @foreach($objects as $key => $value)
                                            <option value="{{ $value->id }}">
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                <span class="error-data invalid-feedback">
                                    @error('object_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-6 mb-2">
                                <label class="form-label" for="">{{ translate('Наименование брендов') }}</label>
                                <input type="text" class="form-control" name="brend">
                            </div>

                            <div class="col-6 mb-2">
                                <label class="form-label" for="">{{ translate('Торговое помещение') }}</label>
                                <input type="text" class="form-control" name="torg">
                            </div>


                            <div class="col-12 text-end">
                                <hr>
                                <button type="submit" class="btn btn-success">{{ translate('Сохранить') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                
            
        </div>
    </div>
</div>

    
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="{{ asset('/backend-assets/plugins/jquery.maskedinput.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>


<script>
    var page_name = 'index';
    $(document).ready(function() {
        $('#birth_date').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });

        $('.phone').mask('(99) 999 99 99')   
        $('.objects').select2()   
    });

    
    $('.daterange').daterangepicker({
        locale: {
            format: 'DD.MM.YYYY',
            "applyLabel": $('#lang_app').attr('lang'),
            "cancelLabel": $('#lang_cancel').attr('lang'),
        }
    });
    
    $(document).on('click','.applyBtn',function(){
        var date = $('.daterange').val()
        location.href = `/home/filtr/${date}`;
    })

    
</script>

@endsection