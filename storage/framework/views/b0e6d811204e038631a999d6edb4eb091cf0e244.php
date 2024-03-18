<?php $__env->startSection('title'); ?>
    <?php echo e(translate('User create')); ?>

<?php $__env->stopSection(); ?>
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('/backend-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend-assets/plugins/toastr/toastr.min.css')); ?>">
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                            <a href="<?php echo e(route('forthebuilder.user.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Create a new user')); ?>

                            </h4>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?php echo e(route('forthebuilder.user.store')); ?>" method="POST" enctype="multipart/form-data"> <?php echo method_field('POST'); ?> <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Firstname')); ?></label>
                                <input name="first_name"
                                    class=" form-control sozdatImyaSpisokInput <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    type="text" value="<?php echo e(old('first_name')); ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Lastname')); ?></label>
                                <input name="last_name"
                                    class=" form-control sozdatImyaSpisokInput <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('last_name')); ?>" required type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                 <label class="form-label"><?php echo e(translate('Middlename')); ?></label>
                                <input name="middle_name"
                                    class=" form-control sozdatImyaSpisokInput <?php $__errorArgs = ['middle_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('middle_name')); ?>" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Email')); ?></label>
                                <input name="email"
                                    class=" form-control sozdatImyaSpisokInput <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('email')); ?>" required type="email">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Birth date')); ?></label>
                                <input name="birth_date" class="form-control datepicker"
                                       value="<?php echo e(old('birth_date')); ?>" type="text">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Phone number')); ?></label>
                                <input name="phone_number" class="form-control" value="<?php echo e(old('phone_number')); ?>" type="text">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(translate('Gender')); ?></label>
                                <select name="gender" id="gender" class="sozdatImyaSpisokInput1272 price_select2"  required>
                                        <option value="1"><?php echo e(translate('Male')); ?></option>
                                        <option value="2"><?php echo e(translate('Female')); ?></option>
                                </select>
                            </div>



                            <div class="col-md-4 mb-3">
                                 <label class="form-label"> <?php echo e(translate('Role')); ?></label>
                                <select required name="role_id" id="role_id" data-placeholder="<?php echo e(__('locale.role')); ?>"
                                    class=" form-control sozdatImyaSpisokInput1272 <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="">---------------------</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"> <?php echo e(translate('Password')); ?></label>
                                <input class=" form-control sozdatImyaSpisokInput1272" type="password" name="password">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"> <?php echo e(translate('Password confirmation')); ?></label>
                                <input class=" form-control sozdatImyaSpisokInput1272" type="password" name="password_confirmation">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label dobavitFotoTextPolzovatel">
                                    <?php echo e(translate('Add photo')); ?>

                                </label>
                                <br>
                                <label class="login_file">
                                    <input class="login_file form-control" name="avatar" type="file">
                                </label>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button class="polzovatelSoxranitSozdat btn btn-outline-success">
                                    <?php echo e(translate('Save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/user/create.blade.php ENDPATH**/ ?>