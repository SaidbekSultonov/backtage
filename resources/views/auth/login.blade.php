<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimgan-draw.uz</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- <link rel="stylesheet" href="./css/login.css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('/backend-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend-assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend-assets/css/login.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/app.min.css')}}" id="app-style" />
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/icons.min.css')}}" />
    {{-- <title>ItKey CRM</title> --}}


    <style>
        .mathcaptcha-label-input{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .mathcaptcha-label{
            font-size: 18px;
            margin: 0;
        }
        .mathcaptcha-input{
            width: 60%;

        }
        .reload{
            background: transparent;
            border: 0;
            /* background-color: none; */
            box-shadow: none;
        }
        .error-data{
            color: #ff5b5b;
        }
        .color{
           color: #F9FBFF !important;
        }
    </style>
</head>

{{-- IP address for captcha --}}

{{-- {{ getIp()}} --}}
{{-- {{$clientIP = \Request::ip()}}
@dd($clientIP) --}}
<body class="loading authentication-bg authentication-bg-pattern">
    <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Войти в систему</h4>
                                </div>

                                <form method="POST" class="mt-2" action="{{ route('login') }}">
                                    @csrf
                                    {{-- <input placeholder="Эл. адрес" class="login_mail" type="text"> --}}
                                    {{-- <input placeholder="Пароль" class="login_mail" type="text"> --}}
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Электронная почта</label>
                                        <input id="emailaddress" type="email" placeholder="{{__('locale.email')}}" class="form-control login_mail @error('email')  error-data-input is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{__('locale.password')}}</label>
                                        <input id="password" type="password"  placeholder="{{__('locale.password')}}" class="form-control login_mail @error('password') error-data-input is-invalid @enderror" name="password" required autocomplete="current-password">
                                    </div>


                                    <div class="form-group mathcaptcha-label-input mb-2">
                                        {{-- <button type="button"  class="reload  p-0 " id="reload">
                                            <i class="mdi mdi-reload"></i>
                                        </button>
                                        <label for="mathgroup" class="mathcaptcha-label mx-2"> {{ app('mathcaptcha')->label() }}</label>
                                        <i class="mdi mdi-equal"></i> --}}
                                        {{-- {!! app('mathcaptcha')->input(['class' => 'form-control mathcaptcha-input ', 'id' => 'mathgroup','placeholder'=>'Ваш ответ']) !!} --}}

                                        <div class="captcha w-100 d-flex align-items-center">
                                            <span>{!! captcha_img('flat') !!}</span>
                                            <input id="captcha" type="text" class="form-control mx-1" placeholder="{{translate('Enter Captcha')}}" name="captcha" />
                                            <button type="button" class="btn btn-success btn-refresh">
                                                <i class="mdi mdi-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @if ($errors->has('captcha'))
                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('captcha') }}</strong>
                                        </span>
                                    @endif

                                    

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="checkbox-signin">
                                                {{-- {{ __('locale.remember_me') }} --}}
                                                {{translate('Remember me')}}
                                            </label>
                                        </div>
                                    </div>

                                     <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary">{{translate('login')}}</button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>


    {{-- <script src="{{asset('/backend-assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/backend-assets/js/adminlte.js')}}"></script> --}}

    <!-- Vendor -->
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/backend-assets/Admin/dist/assets/libs/feather-icons/feather.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('/backend-assets/Admin/dist/assets/js/app.min.js')}}"></script>
    <script>
        // $('#reload').click(function () {
        //     $.ajax({
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //         type: 'GET',
        //         url: '/reload-captcha',
        //         dataType: "json",
        //         success: function (data) {
        //             // console.log(data);
        //             // $(".captcha span").html(data.captcha);
        //             $('.mathcaptcha-label').text(data);
        //         },
        //         error: function (error) {
        //             // console.log(error);
        //         }
        //     });
        // });


        $(document).on('click','.btn-refresh', function () {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '/reload-captcha',
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    // $(".captcha span").html(data.captcha);
                    $(".captcha span").html(data.captcha);
                },
                error: function (error) {
                    // console.log(error);
                }
            });
        });

        
    </script>

</body>
</html>


