@extends('forthebuilder::layouts.forthebuilder')
@section('title')
    {{translate('User edit')}}
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('/backend-assets/forthebuilders/select/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('/backend-assets/forthebuilders/select2-bootstrap4-theme/css/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('/backend-assets/forthebuilders/bootstrap-datetimepicker.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
@include('forthebuilder::layouts.content.navigation')
@include('forthebuilder::layouts.content.header')
@php
    $current_user = \Illuminate\Support\Facades\Auth::user();
    use Modules\ForTheBuilder\Entities\Constants;

@endphp
<style>
    #preView img{
        width: 200px;
        height: 200px;
        margin-bottom: 10px;
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
                                {{ translate('Update user') }}
                            </h4>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{route('forthebuilder.user.update',$model->id)}}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="first_name">{{translate('Firstname')}}</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') error-data-input is-invalid @enderror" value="{{ $model->first_name, old('first_name') }}" required>
                                    <span class="error-data">@error('first_name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="last_name">{{translate('Lastname')}}</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') error-data-input is-invalid @enderror" value="{{$model->last_name, old('last_name') }}" required>
                                    <span class="error-data">@error('last_name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="last_name">{{translate('Middlename')}}</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control @error('middle_name') error-data-input is-invalid @enderror" value="{{ $model->middle_name, old('middle_name') }}">
                                    <span class="error-data">@error('middle_name'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="email">{{translate('Email')}}</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') error-data-input is-invalid @enderror" value="{{ $model->email, old('email') }}" required>
                                    <span class="error-data">@error('email'){{$message}}@enderror</span>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="birth_date">{{ translate('Birth date') }}</label>
                                    <input name="birth_date" id="birth_date" class="form-control datepicker2 @error('birth_date') error-data-input is-invalid @enderror" value="{{ ((!empty($model->birth_date)) ? date('d.m.Y',strtotime($model->birth_date)) : '') }}" type="text">
                                    <span class="error-data">@error('birth_date'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="phone_number">{{ translate('Phone number') }}</label>
                                    <input placeholder="{{ (($domain == 'businesshouse.icstroy.com') ? '+996' : '+998') }}" name="phone_number" id="phone_number" class="form-control phone @error('phone_number') error-data-input is-invalid @enderror" value="{{ $model->phone_number }}" type="text">
                                    <span class="error-data">@error('phone_number'){{$message}}@enderror</span>
                                </div>
                            </div>                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="current_password">{{translate('Current password')}}</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') error-data-input is-invalid @enderror" value="{{ old('current_password') }}" >
                                    <span class="error-data">@error('current_password'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="password">{{translate('Password')}}</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') error-data-input is-invalid @enderror" value="{{ old('password') }}" >
                                    <span class="error-data">@error('password'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                 <div class="form-group">
                                    <label class="form-label" for="password_confirmation">{{translate('Password confirmation')}}</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') error-data-input is-invalid @enderror" value="{{ old('password_confirmation') }}" >
                                    <span class="error-data">@error('password_confirmation'){{$message}}@enderror</span>
                                </div>
                            </div>
                            @if($current_user->role_id == Constants::SUPERADMIN)
                                <div class="col-md-4 mb-3">
                                     <div class="form-group">
                                        <label class="form-label" for="role_id">{{translate('Role')}}</label>
                                        <select name="role_id" id="role_id"  data-placeholder="{{__('locale.role')}}" class="form-control select_user @error('role_id') is-invalid error-data-input @enderror" >
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{$model->role_id == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="error-data">@error('role_id'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            @endif
                            {{-- <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="status">{{translate('status')}}</label>
                                    <select name="status" id="status"  data-placeholder="{{__('locale.select')}}" class="form-control select_user @error('status') is-invalid error-data-input @enderror" >
                                        <option value="2" {{$model->status == 2 ? 'selected' : ''}}>{{__('locale.active')}}</option>
                                        <option value="0" {{$model->status == 0 ? 'selected' : ''}}>{{__('locale.no_active')}}</option>
                                    </select>
                                    <span class="error-data">@error('status'){{$message}}@enderror</span>
                                </div>
                            </div> --}}
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="gender">{{translate('Gender')}}</label>
                                    <select name="gender" id="gender"  data-placeholder="{{__('locale.select')}}" class="form-control select_user">
                                        <option value="1" {{$model->gender == 1 ? 'selected' : ''}}>{{ translate('Male') }}</option>
                                        <option value="2" {{$model->gender == 2 ? 'selected' : ''}}>{{ translate('Female') }}</option>
                                    </select>
                                    
                                </div>
                            </div>

                            @if($current_user->role_id != Constants::SUPERADMIN)
                                <div class="col-md-4 mb-3">
                                    <div class="form-group ">
                                        <label class="form-label" for="images">{{translate('Image')}}</label>
                                        
                                        <div id="preView" class="border rounded">
                                            @php
                                                if(!empty($model->avatar)){
                                                    $file_url = public_path('/uploads/user/' . $model->id . '/s_' . $model->avatar);
                                                }else{
                                                    $file_url = "";
                                                }
                                            @endphp
                                            @if (file_exists($file_url))
                                                <img class="rounded-circle img-thumbnail avatar-md" src="{{ asset('/uploads/user/' . $model->id . '/s_' . $model->avatar) }}" alt="HUman">
                                            @else
                                             @php
                                                $gender_img = 'men.png';
                                                if ($model->gender == 2) {
                                                    $gender_img = 'women.png';
                                                }
                                            @endphp
                                                <img class="rounded-circle img-thumbnail avatar-md" src="{{ asset('/backend-assets/img/'.$gender_img) }}" alt="HUman">
                                            @endif
                                        </div>
                                        <div class="custom-file mt-3">
                                            <input type="file" name="avatar" class="custom-file-input form-control" id="uavatar">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-success">
                                    {{translate('Update')}}
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
        $('.datepicker2').datepicker({
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



