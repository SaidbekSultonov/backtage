<?php
    $pathInfo = explode('/', $_SERVER['REQUEST_URI']);
    $path = end($pathInfo);
    $indexCheck = 'checked';
    $indexFilterCheck = '';
    if ($path == 'filter-index') {
        $indexCheck = '';
        $indexFilterCheck = 'checked';
    }
    use Modules\ForTheBuilder\Entities\Constants;

    $btn_all = 'btn-outline-success';
    $btn_my = 'btn-success';
    if (Route::currentRouteName() == 'forthebuilder.task.index') {
        $btn_my = 'btn-outline-success';
        $btn_all = 'btn-success';
    }
?>




<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.min.css')); ?>">

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="me-2"><?php echo e(translate('Tasks')); ?></h4>
                        <button data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-outline-info me-2 d-flex justify-content-center align-items-center" href="<?php echo e(route('forthebuilder.clients.calendar')); ?>">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <?php if(Auth::user()->role_id != Constants::MANAGER): ?>
                        <div class="d-flex justify-content-center">
                            

                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.clients.calendar')); ?>">
                                <i class="mdi mdi-calendar-blank-outline"></i>
                                <?php echo e(translate('Calendar')); ?>

                            </a>

                            <button type="button" class="btn <?php echo e($btn_all); ?> waves-effect waves-light mx-2">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" id="filter_all" <?php echo e($indexCheck); ?> type="radio" name="filter" value='0'>
                                    <label class="form-check-label" for="filter_all"><?php echo e(translate('All')); ?></label>
                                </div> 
                            </button>
                            <button type="button" class="btn <?php echo e($btn_my); ?> waves-effect waves-light">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" id="filter_my_tasks" <?php echo e($indexFilterCheck); ?> type="radio"
                                        name="filter" value='1'>
                                    <label class="form-check-label" for="filter_my_tasks"><?php echo e(translate('My tasks')); ?></label>
                                </div> 
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <?php if(empty(!$arr)): ?>
                <?php
                    $i = true;
                    $k = 1;
                ?>
                <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body taskboard-box">
                                <div class="text-center">
                                    <h4 class="header-title my-1 <?php echo (($k == 1) ? 'text-danger' : 'text-primary') ?>"><?php echo e($key); ?></h4>
                                    <p class="<?php echo (($k == 1) ? 'text-danger' : 'text-primary') ?>"><?php echo e(translate('All tasks')); ?>: <?php echo e(count($value)); ?></p>    
                                </div>
                                
                                <ul class="sortable-list list-unstyled taskList" style="overflow-y: auto; height: 60vh" id="upcoming_<?php echo e($k); ?>">
                                    <?php if(isset($value) && !empty($value)): ?>
                                     
                                        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <li class="p-1" data-id="item_<?php echo e($val['id']); ?>">
                                                <div class="kanban-box">
                                                    <div class="">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item w-100">
                                                                <a href="<?php echo e(route('forthebuilder.clients.show', [$val['client_id'], '0', '0'])); ?>"
                                                                    class="d-block w-100">
                                                                    
                                                                    <span class="<?php echo (($k == 1) ? 'badge bg-danger' : 'badge bg-primary') ?>"><?php echo e(translate('Responsible')); ?>: <small><?php echo e($val['responsible']); ?></small></span> 
                                                                    
                                                                    <hr class="my-1">
                                                                    <div class="text-dark">
                                                                        <i class="far fa-user-circle"></i>
                                                                        <small><?php echo e($val['client']); ?> <?php echo e($val['client_middle_name']); ?></small>
                                                                    </div>
                                                                    <br>
                                                                    <div class="d-flex justify-content-between text-secondary">
                                                                        <div>
                                                                            <i class="mdi mdi-calendar-month-outline"></i>
                                                                            <small>
                                                                                <?php echo e(date('d.m.Y', strtotime($val['day']))); ?>

                                                                            </small>
                                                                        </div>
                                                                        <div>
                                                                            <i class="mdi mdi-clock-check-outline"></i>
                                                                            <small>
                                                                                <?php echo e(date('H:i', strtotime($val['time']))); ?>

                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- end col -->
                        <?php
                            if ($i) {
                                $i = false;
                                $style = '';
                            }
                        $k++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- end row -->
        </div> 
        <!-- container -->
    </div> 
    <!-- content -->
</div>

<div id="standard-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body px-3">
                <form action="<?php echo e(route('forthebuilder.task.calendar_store')); ?>" method="POST"
                      enctype="multipart/form-data" id="chees-modal">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                        <br>
                        <select name="deal_id" class="form-control select2 select_deal" data-width="100%" data-placeholder="<?php echo e(translate('Choose client')); ?>" id="selected_deal_id">
                            <option></option>
                            <?php if(empty(!$deals)): ?>
                                <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($deal->client)): ?>
                                        <option class="search_deal d-none" value="<?php echo e($deal->id); ?>">
                                            <?php echo e($deal->client->first_name.' '.$deal->client->last_name.' '.$deal->client->middle_name); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                        <ul class="parsley-errors-list filled d-none" id="parsley-id-deal" aria-hidden="false"><li class="parsley-required">This value is required.</li></ul>
                        
                    
                        <div class="row">
                            <div class="col-md-12 my-2">
                                <input placeholder="<?php echo e(translate('Task on')); ?>" name="task_date_2" type="text" id="task_date2" class="form-control choise-date <?php $__errorArgs = ['task_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(date('d.m.Y H:i')); ?>">
                                
                                <ul class="parsley-errors-list filled d-none" id="parsley-id-date" aria-hidden="false"><li class="parsley-required">This value is required.</li></ul>
                            </div>

                            <div class="col-md-6">                                
                                <select data-placeholder="<?php echo e(translate('for')); ?>" name="performer_id" id="performer_id"                                    
                                    class="form-control select3 d-none <?php $__errorArgs = ['performer_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">                                    
                                        <?php if(empty(!$users)): ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"
                                                        <?php echo e(Auth::user()->id == $user->id ? 'selected' : ''); ?>>
                                                    <?php echo e($user->first_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                </select>
                            </div>

                            <div class="col-md-6">                                
                                <select name="type" id="type"
                                    data-placeholder="<?php echo e(__('locale.select')); ?>"
                                    class="form-control select2 d-none <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <option value="Связаться"><?php echo e(translate('Call')); ?></option>
                                    <option value="Встреча"><?php echo e(translate('Meeting')); ?></option>
                                </select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <input required placeholder="<?php echo e(translate('Description')); ?>" name="title" type="text" id="title" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success opacity_button PostavitButton me-2"><?php echo e(translate('Put')); ?></button>
                            <button type="button" class="OtmenitButton btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close"><?php echo e(translate('Cancell')); ?></button>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src='<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.full.min.js')); ?>'></script>
<script>
    $.datetimepicker.setLocale('ru');
    $('#task_date2').datetimepicker({
        format:'d.m.Y H:i'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/task/index.blade.php ENDPATH**/ ?>