<?php $__env->startSection('title'); ?>
    <?php echo e(translate('User edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/select/css/select2.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/select2-bootstrap4-theme/css/select2-bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/forthebuilders/bootstrap-datetimepicker.min.css')); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $current_user = \Illuminate\Support\Facades\Auth::user();
    use Modules\ForTheBuilder\Entities\Constants;

?>
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
                            <a href="<?php echo e(route('forthebuilder.user.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Update user')); ?>

                            </h4>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('forthebuilder.user.update',$model->id)); ?>" method="POST" enctype="multipart/form-data"> <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="first_name"><?php echo e(translate('Firstname')); ?></label>
                                    <input type="text" name="first_name" id="first_name" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->first_name, old('first_name')); ?>" required>
                                    <span class="error-data"><?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="last_name"><?php echo e(translate('Lastname')); ?></label>
                                    <input type="text" name="last_name" id="last_name" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->last_name, old('last_name')); ?>" required>
                                    <span class="error-data"><?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="last_name"><?php echo e(translate('Middlename')); ?></label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->middle_name, old('middle_name')); ?>">
                                    <span class="error-data"><?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="email"><?php echo e(translate('Email')); ?></label>
                                    <input type="email" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->email, old('email')); ?>" required>
                                    <span class="error-data"><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="birth_date"><?php echo e(translate('Birth date')); ?></label>
                                    <input name="birth_date" id="birth_date" class="form-control datepicker2 <?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(((!empty($model->birth_date)) ? date('d.m.Y',strtotime($model->birth_date)) : '')); ?>" type="text">
                                    <span class="error-data"><?php $__errorArgs = ['birth_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label class="form-label" for="phone_number"><?php echo e(translate('Phone number')); ?></label>
                                    <input placeholder="<?php echo e((($domain == 'businesshouse.icstroy.com') ? '+996' : '+998')); ?>" name="phone_number" id="phone_number" class="form-control phone <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($model->phone_number); ?>" type="text">
                                    <span class="error-data"><?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="current_password"><?php echo e(translate('Current password')); ?></label>
                                    <input type="password" name="current_password" id="current_password" class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('current_password')); ?>" >
                                    <span class="error-data"><?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="password"><?php echo e(translate('Password')); ?></label>
                                    <input type="password" name="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" >
                                    <span class="error-data"><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                 <div class="form-group">
                                    <label class="form-label" for="password_confirmation"><?php echo e(translate('Password confirmation')); ?></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password_confirmation')); ?>" >
                                    <span class="error-data"><?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                </div>
                            </div>
                            <?php if($current_user->role_id == Constants::SUPERADMIN): ?>
                                <div class="col-md-4 mb-3">
                                     <div class="form-group">
                                        <label class="form-label" for="role_id"><?php echo e(translate('Role')); ?></label>
                                        <select name="role_id" id="role_id"  data-placeholder="<?php echo e(__('locale.role')); ?>" class="form-control select_user <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role->id); ?>" <?php echo e($model->role_id == $role->id ? 'selected' : ''); ?>><?php echo e($role->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="error-data"><?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><?php echo e($message); ?><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="gender"><?php echo e(translate('Gender')); ?></label>
                                    <select name="gender" id="gender"  data-placeholder="<?php echo e(__('locale.select')); ?>" class="form-control select_user">
                                        <option value="1" <?php echo e($model->gender == 1 ? 'selected' : ''); ?>><?php echo e(translate('Male')); ?></option>
                                        <option value="2" <?php echo e($model->gender == 2 ? 'selected' : ''); ?>><?php echo e(translate('Female')); ?></option>
                                    </select>
                                    
                                </div>
                            </div>

                            <?php if($current_user->role_id != Constants::SUPERADMIN): ?>
                                <div class="col-md-4 mb-3">
                                    <div class="form-group ">
                                        <label class="form-label" for="images"><?php echo e(translate('Image')); ?></label>
                                        
                                        <div id="preView" class="border rounded">
                                            <?php
                                                if(!empty($model->avatar)){
                                                    $file_url = public_path('/uploads/user/' . $model->id . '/s_' . $model->avatar);
                                                }else{
                                                    $file_url = "";
                                                }
                                            ?>
                                            <?php if(file_exists($file_url)): ?>
                                                <img class="rounded-circle img-thumbnail avatar-md" src="<?php echo e(asset('/uploads/user/' . $model->id . '/s_' . $model->avatar)); ?>" alt="HUman">
                                            <?php else: ?>
                                             <?php
                                                $gender_img = 'men.png';
                                                if ($model->gender == 2) {
                                                    $gender_img = 'women.png';
                                                }
                                            ?>
                                                <img class="rounded-circle img-thumbnail avatar-md" src="<?php echo e(asset('/backend-assets/img/'.$gender_img)); ?>" alt="HUman">
                                            <?php endif; ?>
                                        </div>
                                        <div class="custom-file mt-3">
                                            <input type="file" name="avatar" class="custom-file-input form-control" id="uavatar">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-outline-success">
                                    <?php echo e(translate('Update')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="domain" data-domain="<?php echo e($domain); ?>"></div> 
<script src="<?php echo e(asset('/backend-assets/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/bootstrap-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/jquery.maskedinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/plugins/toastr/toastr.min.js')); ?>"></script>

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


        let sessionWarning = "<?php echo e(session('warning')); ?>";
        if (sessionWarning) {
            toastr.warning(sessionWarning)
        }
    });
</script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/edit.blade.php ENDPATH**/ ?>