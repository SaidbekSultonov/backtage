<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chimgan-draw.uz</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    

    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/app.min.css')); ?>" id="app-style" />
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/icons.min.css')); ?>" />
    


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

                                <form method="POST" class="mt-2" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>
                                    
                                    
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Электронная почта</label>
                                        <input id="emailaddress" type="email" placeholder="<?php echo e(__('locale.email')); ?>" class="form-control login_mail <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>  error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label"><?php echo e(__('locale.password')); ?></label>
                                        <input id="password" type="password"  placeholder="<?php echo e(__('locale.password')); ?>" class="form-control login_mail <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
                                    </div>


                                    <div class="form-group mathcaptcha-label-input mb-2">
                                        
                                        

                                        <div class="captcha w-100 d-flex align-items-center">
                                            <span><?php echo captcha_img('flat'); ?></span>
                                            <input id="captcha" type="text" class="form-control mx-1" placeholder="<?php echo e(translate('Enter Captcha')); ?>" name="captcha" />
                                            <button type="button" class="btn btn-success btn-refresh">
                                                <i class="mdi mdi-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <?php if($errors->has('captcha')): ?>
                                        <span class="help-block text-danger">
                                            <strong><?php echo e($errors->first('captcha')); ?></strong>
                                        </span>
                                    <?php endif; ?>

                                    

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="checkbox-signin" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="checkbox-signin">
                                                
                                                <?php echo e(translate('Remember me')); ?>

                                            </label>
                                        </div>
                                    </div>

                                     <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary"><?php echo e(translate('login')); ?></button>
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


    

    <!-- Vendor -->
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/simplebar/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/node-waves/waves.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/waypoints/lib/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/jquery.counterup/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/libs/feather-icons/feather.min.js')); ?>"></script>
    <!-- App js -->
    <script src="<?php echo e(asset('/backend-assets/Admin/dist/assets/js/app.min.js')); ?>"></script>
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


<?php /**PATH /Users/user/Desktop/laravel/new/resources/views/auth/login.blade.php ENDPATH**/ ?>