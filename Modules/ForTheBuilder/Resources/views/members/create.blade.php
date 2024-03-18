@php 
    use Modules\ForTheBuilder\Entities\Constants; 
@endphp
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
                            <a href="{{ route('forthebuilder.members.index') }}" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">{{translate('Добавить нового участника')}}</h4>   
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <form class="w-100" action="{{route('forthebuilder.members.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Фамилия') }}</label>
                                <input type="text" class="form-control @error('last_name') error-data-input is-invalid @enderror" name="last_name">
                                <span class="error-data invalid-feedback">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Имя') }}</label>
                                <input type="text" class="form-control @error('first_name') error-data-input is-invalid @enderror" name="first_name">
                                <span class="error-data invalid-feedback">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Отчество') }}</label>
                                <input type="text" class="form-control" name="middle_name">
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Номер телефона') }}</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-text">+998</div>
                                    <input type="text" class="form-control phone @error('phone') error-data-input is-invalid @enderror" name="phone">
                                </div>
                                <span class="error-data invalid-feedback">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Дата рождения') }}</label>
                                <input type="text" class="form-control" id="birth_date" name="birth_date">
                            </div>
                            {{-- <div class="col-4 mb-2">
                                <label class="form-label" for="">{{ translate('Image') }}</label>
                                <input type="file" class="form-control" id="img" name="img">
                            </div> --}}
                            <div class="col-6 mb-2">
                                <label class="form-label" for="">{{ translate('Изображение') }}</label>
                                <div id="my_camera"></div>
                                <br/>
                                <input type="button" value="{{ translate('Сделать снимок') }}" onClick="take_snapshot()" class="btn btn-info">
                                <input type="hidden" name="img" class="image-tag">
                            </div> 
                            <div class="col-6 mb-2">
                                <label for="form-label">{{ translate('Захваченное вами изображение появится здесь...') }}</label>
                                <div id="results" class="border p-2 rounded"></div>
                            </div>
                        </div>
                        
                        <hr>
                        {{-- <div class="row justify-content-end align-items-center">
                            <div class="col-2 text-end">
                                <button type="button" class="btn btn-sm btn-danger minus_row">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success plus_row" data-id="1">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> --}}
                        @if(Session::has('message'))
                            <p class="alert mt-2 {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <div class="rows">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">{{ translate('Дата') }}</label>
                                    <input type="text" class="form-control dates  @error('add_time') error-data-input is-invalid @enderror" name="Purchase[0][date]" autocomplete="off" required>

                                    <span class="error-data invalid-feedback">
                                        @error('add_time')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col">
                                    <label class="form-label">{{ translate('Объект') }}</label>
                                    <select name="Purchase[0][object]" class="form-control object @error('object_id') error-data-input is-invalid @enderror">
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
                                <div class="col col_shop">
                                    <label class="form-label">{{ translate('Бренд/Фирма') }}</label>
                                    <select name="Purchase[0][shop]" class="form-control shop @error('shop_id') error-data-input is-invalid @enderror">
                                        @if(!empty($shops))
                                            @foreach($shops as $key => $value)
                                                <option value="{{ $value->id }}">
                                                    {{ $value->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    <span class="error-data invalid-feedback">
                                        @error('shop_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col col_change">
                                    <label class="form-label col_sum">{{ translate('Сумма') }}</label>
                                    <label class="form-label col_kv d-none">{{ translate('Квадратура') }}</label>
                                    <input type="number" class="form-control @error('sum') error-data-input is-invalid @enderror" name="Purchase[0][sum]" required>
                                    <span class="error-data invalid-feedback">
                                        @error('sum')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3 text-end">
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
        $('.dates').mask('99.99.9999')   
        $('#birth_date').mask('99.99.9999')   
        $('.object').select2()   
        $('.shop').select2() 

        $(document).on('change','.object',function(){
            var id = $(this).val()
            var _this = $(this)

            $.ajax({
                url: `/members/change-objects`,
                type: 'GET',
                datatype: 'json',
                data: {id: id},
                success: function(data) {
                    if (data == 'hills') {
                        _this.parent().siblings('.col_shop').addClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_sum').addClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_kv').removeClass('d-none')
                    }
                    else{
                        _this.parent().siblings('.col_shop').removeClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_sum').removeClass('d-none')
                        _this.parent().siblings('.col_change').find('.col_kv').addClass('d-none')
                        _this.parent().siblings('.col').find('.shop').html(data)
                    }
                },
                
            });
        })
          
        
        $('.dates').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });
    });

    
    
    $(document).on('click','.plus_row',function(){
        var count = parseInt($(this).attr('data-id'))

        $.ajax({
            url: `new-rows`,
            type: 'GET',
            datatype: 'json',
            data: {count: count},
            success: function(data) {
                $('.rows').append(data)
                $('.object').select2()   
                $('.shop').select2()
                $('.dates').datepicker({
                    autoclose: true,
                    format: 'dd.mm.yyyy'
                });
                $('.dates').mask('99.99.9999')   
                $('.plus_row').attr('data-id',++count)
            },
            
        });

    })

    $(document).on('click','.minus_row',function(){
        var count = parseInt($('.plus_row').attr('data-id'))
        if (count > 1) {
            $('.plus_row').attr('data-id',--count)
            $('.rows .row').last().remove()
        }
    })

    
</script>
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
@endsection