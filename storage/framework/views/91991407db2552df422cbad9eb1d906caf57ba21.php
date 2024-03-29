<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chimgan-draw.uz</title>
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/css/adminlte.min.css')); ?>"> -->
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/app.min.css')); ?>" id="app-style" />
    <link rel="stylesheet" href="<?php echo e(asset('/backend-assets/Admin/dist/assets/css/icons.min.css')); ?>" />
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
                        <img src="<?php echo e(asset('/backend-assets/img/main_logo.png')); ?>" alt="" class="w-50">
                        <p class="text-muted mt-2 mb-4"></p>
                    </div>
                    <div class="card">

                        <div class="card-body p-4">
                            
                            <div class="text-center mb-4">
                                <h4 class="text-uppercase mt-0 mb-3"><?php echo e(__('locale.password_reset')); ?></h4>
                            </div>

                            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Электронная почта</label>
                                    <input id="emailaddress" type="email"  placeholder="<?php echo e(__('locale.email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" required autocomplete="current-password">
                                    <div class="invalid-feedback"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
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



                                <div class="mb-3 text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> <?php echo e(__('locale.password_reset')); ?></button>
                                </div>

                            </form>        

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">
                                <a class="text-dark ms-1" href="<?php echo e(route('login')); ?>"><?php echo e(__('locale.login')); ?></a>
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

<!-- <script src="<?php echo e(asset('/backend-assets/plugins/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/js/adminlte.js')); ?>"></script> -->

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


<?php /**PATH /home/host3987/public_html/backtage.chimgan-draw.uz/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>