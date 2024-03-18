<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chimgan-draw.uz</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset('/backend-assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/backend-assets/css/adminlte.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/app.min.css')}}" id="app-style" />
    <link rel="stylesheet" href="{{asset('/backend-assets/Admin/dist/assets/css/icons.min.css')}}" />
    <style>
        .error-data{
            color: #ff5b5b;
        }
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
        }
    </style>
</head>
<body class="loading authentication-bg authentication-bg-pattern">
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="text-center">
                        <img src="{{asset('/backend-assets/img/main_logo.png')}}" alt="" class="w-50">
                        <p class="text-muted mt-2 mb-4"></p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">
                            
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0 mb-3">{{__('locale.password_reset')}}</h4>
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Электронная почта</label>
                                    <input id="emailaddress" type="email"  placeholder="{{__('locale.email')}}" class="form-control @error('email') error-data-input is-invalid @enderror" name="email" required autocomplete="current-password">
                                    <div class="invalid-feedback">@error('email'){{$message}}@enderror</div>
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



                                <div class="mb-3 text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> {{__('locale.password_reset')}}</button>
                                </div>

                            </form>        

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">
                                <a class="text-dark ms-1" href="{{ route('login') }}">{{__('locale.login')}}</a>
                            </p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

<!-- <script src="{{asset('/backend-assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/backend-assets/js/adminlte.js')}}"></script> -->

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


