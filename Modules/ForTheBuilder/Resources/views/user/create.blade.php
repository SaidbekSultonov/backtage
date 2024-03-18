@extends('forthebuilder::layouts.forthebuilder')
@section('title')
    {{ translate('User create') }}
@endsection
<link rel="stylesheet" href="{{ asset('/backend-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('/backend-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/backend-assets/plugins/toastr/toastr.min.css') }}">
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
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-12 d-flex align-items-center">
                            <a href="{{ route('forthebuilder.user.index') }}" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                {{ translate('Создать нового пользователя') }}
                            </h4>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('forthebuilder.user.store') }}" method="POST" enctype="multipart/form-data"> @method('POST') @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Имя') }}</label>
                                <input name="first_name"
                                    class=" form-control sozdatImyaSpisokInput @error('first_name') error-data-input is-invalid @enderror"
                                    type="text" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Фамилия') }}</label>
                                <input name="last_name"
                                    class=" form-control sozdatImyaSpisokInput @error('last_name') error-data-input is-invalid @enderror"
                                    value="{{ old('last_name') }}" required type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                 <label class="form-label">{{ translate('Отчество') }}</label>
                                <input name="middle_name"
                                    class=" form-control sozdatImyaSpisokInput @error('middle_name') error-data-input is-invalid @enderror"
                                    value="{{ old('middle_name') }}" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Электронная почта') }}</label>
                                <input name="email"
                                    class=" form-control sozdatImyaSpisokInput @error('email') error-data-input is-invalid @enderror"
                                    value="{{ old('email') }}" required type="email">
                            </div>

                            {{-- <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Birth date') }}</label>
                                <input name="birth_date" class="form-control datepicker"
                                       value="{{ old('birth_date') }}" type="text">
                            </div> --}}
                            <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Номер телефона') }}</label>
                                <input name="phone_number" class="form-control phone" value="{{ old('phone_number') }}" type="text" placeholder="{{ (($domain == 'businesshouse.icstroy.com') ? '+996' : '+998') }}">
                            </div>

                           {{--  <div class="col-md-4 mb-3">
                                <label class="form-label">{{ translate('Gender') }}</label>
                                <select name="gender" id="gender" class="sozdatImyaSpisokInput1272 price_select2"  required>
                                        <option value="1">{{ translate('Male') }}</option>
                                        <option value="2">{{ translate('Female') }}</option>
                                </select>
                            </div> --}}



                            <div class="col-md-4 mb-3">
                                 <label class="form-label"> {{ translate('Роль') }}</label>
                                <select required name="role_id" id="role_id" data-placeholder="{{ __('locale.role') }}"
                                    class=" form-control sozdatImyaSpisokInput1272 @error('role_id') is-invalid error-data-input @enderror">
                                    <option value="">---------------------</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"> {{ translate('Пароль') }}</label>
                                <input class=" form-control sozdatImyaSpisokInput1272" type="password" name="password">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"> {{ translate('Подтверждение пароля') }}</label>
                                <input class=" form-control sozdatImyaSpisokInput1272" type="password" name="password_confirmation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label dobavitFotoTextPolzovatel">
                                    {{ translate('Добавить фото') }}
                                </label>
                                <br>
                                <label class="login_file">
                                    <input class="login_file form-control" name="avatar" type="file">
                                </label>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="polzovatelSoxranitSozdat btn btn-outline-success">
                                    {{ translate('Сохранить') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
<div id="domain" data-domain="{{ $domain }}"></div> 
<script src="{{ asset('/backend-assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('/backend-assets/plugins/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ asset('/backend-assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('/backend-assets/plugins/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('/backend-assets/plugins/toastr/toastr.min.js') }}"></script>

<script>
    let page_name = 'user';
    $(document).ready(function() {
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd.mm.yyyy'
        });
        if($('#domain').attr('data-domain') == 'businesshouse.icstroy.com'){
            $('.phone').mask('+999 (999) 99 99 99')   
        }
        else{            
            $('.phone').mask('+999 (99) 999 99 99')   
        }
        


        let sessionWarning = "{{ session('warning') }}";
        if (sessionWarning) {
            toastr.warning(sessionWarning)
        }
    });
</script>

@endsection