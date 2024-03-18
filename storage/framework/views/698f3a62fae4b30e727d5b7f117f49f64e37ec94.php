<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.min.css')); ?>">
<style>
 
    .fc-toolbar-chunk{
        display: flex;
    }
    .fc-daygrid-event{
        display: flex;
        justify-content: center;
    }
    .calendar-text-z{
        margin-bottom: 0px;
        padding: 6px 0px;
    }
    .fc-prev-button, .fc-next-button{
        background-color: white !important;
        border: 0px !important;
    }
    .fc-prev-button span, .fc-next-button span{
        color: black;
    }
    .fc-toolbar-chunk h2{
        border: 1px solid #94B2EB;
        padding: 20px 80px;
        border-radius: 3px;
    }
    .fc-today-button, .fc-dayGridMonth-button, .fc-timeGridWeek-button, .fc-timeGridDay-button{
        background-color: #94B2EB !important;
        border: 0px !important;
    }
    .fc-toolbar-chunk .btn-group .active{
        background-color: #44B2EB !important;
    }
    .fc-daygrid-day{
        background-color: rgba(0, 0, 0, 0);
    }
    .fc-daygrid-day-events a{
        border-radius: 3px;
    }
    .fc-daygrid-day-events{
        z-index: -1;
    }

    .fc-col-header-cell{
        background-color: #94B2EB;
        padding:14px 24px !important;
        color:white;
    }

    .task-calendar{
        display: flex;
        height: 80px;
    }
    .task-calendar .tasks{
        display: flex;
        align-items: flex-start;
    }
    .task-calendar .calendar{
        display: flex;
        align-items: flex-end;
    }
    .modal-header .row{
        width:100%;
    }
    .arrow, .plus{
        background-color: white;
        transition: 1s;
        color: black;
    }
    .arrow{
        height: 50px;
        padding: 0px 20px;
        display: flex;
        align-items: center;
        border-radius: 30px;
        margin-right: 40px;
    }
    .arrow:hover{
        transform: scale(1.2);
        box-shadow: 1px 1px 6px silver;
        color: black;
    }
    .plus{
        height: 40px;
        padding: 0px 14px;
        display: flex;
        align-items: center;
        border-radius:20px;
        margin-left: 40px;
    }
    .plus:hover{
        transform: scale(1.2);
        box-shadow: 1px 1px 6px silver;
        color: black;
    }
    .calendar_type{
        display: flex;
        padding: 10px;
        border-radius: 18px;
        background-color: white;
        margin: 0px 24px 6px 0px;
    }
    .calendar_type label{
        margin:0px 0px 0px 7px;
    }
    .add-task{
        display: flex;
        height: 64px;
        padding: 14px;
    }
    .modal-calendar-buttons{
        display: flex;
    }
    .modal-calendar-buttons input{
        margin-right: 14px;
    }
    .display-none{
        display: none;
    }

    #day_calendar_body{
        width: 100%;
        height: auto;
        flex-direction: column;
    }

    .fc-toolbar.fc-header-toolbar{
        padding: 0px 14px;
    }
    .add-task>img{
        height: 16px;
        margin: 4px 4px 0px 4px;

    }
    
    #deal_id{
        z-index: 101;
    }
    .search_deal{
        border: 1px solid silver;
    }
    .opacity_button{
        opacity: 0.6;
    }
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="me-2">
                            <?php echo e(translate('Task calendar')); ?>

                        </h4>
                        <?php if(Auth::user()->role_id != Constants::MANAGER): ?>
                            <button data-bs-toggle="modal" data-bs-target="#standard-modal" class="btn btn-outline-primary d-flex justify-content-center align-items-center" href="<?php echo e(route('forthebuilder.clients.calendar')); ?>">
                                    <i class="fas fa-plus"></i>
                                </button>
                        <?php endif; ?>    
                    </div>
                    

                    <?php if(Auth::user()->role_id != Constants::MANAGER): ?>
                        <div class="d-flex justify-content-center">
                            
                            <label for="all" class="btn btn-success waves-effect waves-light mx-2">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="radio" name="tasks" id="all">
                                    <span><?php echo e(translate('All')); ?></span>
                                </div>
                            </label>

                            <label for="my_tasks" class="btn btn-outline-success waves-effect waves-light">
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="radio" name="tasks" id="my_tasks">
                                    <span><?php echo e(translate('My tasks')); ?></span>
                                </div>
                            </label>
                           
                        </div>
                    <?php endif; ?>
                </div>
            </div>


            

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-3 d-none">
                            <button class="btn btn-lg font-16 btn-success w-100" id="btn-new-event"><i class="fa fa-plus me-1"></i> Create New</button>
                            
                            <div id="external-events">
                                <br>
                                <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                <div class="external-event bg-primary" data-class="bg-primary">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>New Theme Release
                                </div>
                                <div class="external-event bg-pink" data-class="bg-pink">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My Event
                                </div>
                                <div class="external-event bg-warning" data-class="bg-warning">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet manager
                                </div>
                                <div class="external-event bg-purple" data-class="bg-danger">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create New theme
                                </div>
                            </div>

                                <!-- checkbox -->
                                <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="drop-remove">
                                <label class="form-check-label" for="drop-remove">Remove after drop</label>
                            </div>

                        </div> <!-- end col-->

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <div id="calendar"></div>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div> <!-- end col -->

                    </div>  <!-- end row -->
                       

                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name"
                                                        type="text" name="title" id="event-title" required />
                                                    <div class="invalid-feedback">Please provide a valid event name</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" id="event-category" required>
                                                        <option value="bg-danger" selected>Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-4">
                                                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                            </div>
                                            <div class="col-md-6 col-8 text-end">
                                                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->
                        
                    
        </div>
    </div>
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
                                <input placeholder="<?php echo e(translate('Description')); ?>" name="title" type="text" id="title" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success opacity_button PostavitButton me-2"><?php echo e(translate('Put')); ?></button>
                            <button class="OtmenitButton btn btn-outline-danger" data-dismiss="modal" aria-label="Close"><?php echo e(translate('Cancell')); ?></button>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="day_calendar" tabindex="-1" role="dialog" aria-labelledby="day_calendar" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center">
                <div class="" id="calendar_task_date"></div>
            </div>
            <div class="modal-body d-flex justify-content-center flex-column">
                <div class="d-flex" id="day_calendar_body">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/select/js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/toastr/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/moment/js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/fullcalendar/main.js')); ?>"></script>
<script src='<?php echo e(asset('/backend-assets/plugins/fullcalendar/locales/ru.js')); ?>'></script>
<script src='<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.full.min.js')); ?>'></script>


<script>
    let page_name = 'task';
    $.datetimepicker.setLocale('ru');
    $('#task_date2').datetimepicker({
        format:'d.m.Y H:i'
    });
</script>
<!-- /.modal -->
<script defer>
    
    let calling_or_meeting = document.getElementById('calling_or_meeting')
    $(document).ready(function () {
        let sessionSuccess ="<?php echo e(session('success')); ?>";
        if(sessionSuccess){
            toastr.success(sessionSuccess)
        }
        let sessionWarning = "<?php echo e(session('warning')); ?>";
        if(sessionWarning){
            toastr.success(sessionWarning)
        }
        let sessionError = "<?php echo e(session('error')); ?>";
        if(sessionError){
            toastr.success(sessionError)
        }
        $(document).on('click', '.choise-manager', function(e) {
            e.preventDefault();
            // $('select[name="performer_id"]').chosen();
            // $('#performer_id').show();
            var se = $("#performer_id");
            se.removeClass('d-none');
            se[0].size = 10;
        })
        $('.PostavitButton').on('click', function (e){
            if($('#selected_deal_id').val() == ""){
                e.preventDefault()
            }
        });
        if($('#selected_deal_id').val() != ""){
            if($('.PostavitButton').hasClass('opacity_button')){
                $('.PostavitButton').removeClass('opacity_button')
            }
        }
        $(document).on('keyup', '.select_deal', function(e) {
            var keyupText = $(this).val()
            $('#selected_deal_id').val("")
            $('.search_deal').each(function() {
                if (keyupText == '') {
                    if(!$('.PostavitButton').hasClass('opacity_button')){
                        $('.PostavitButton').addClass('opacity_button')
                    }
                    $(this).addClass('d-none')
                    $('.selectMainDeal').addClass('d-none')
                } else {
                    if($('.PostavitButton').hasClass('opacity_button')){
                        $('.PostavitButton').removeClass('opacity_button')
                    }
                    var myText = $(this).text();
                    if (myText.toLowerCase().includes(keyupText.toLowerCase())) {
                        $('.selectMainDeal').removeClass('d-none')
                        $(this).removeClass('d-none')
                    } else {
                        $(this).addClass('d-none')
                    }
                }
            });
        })
        $('#selected_deal_id').on('change', function (e) {
            if($(this).val == '') {
                if (!$('.PostavitButton').hasClass('opacity_button')) {
                    $('.PostavitButton').addClass('opacity_button')
                }
            }else{
                if($('.PostavitButton').hasClass('opacity_button')){
                    $('.PostavitButton').removeClass('opacity_button')
                }
            }
        })
        $('.search_deal').on('click', function () {
            // console.log()
            $('#selected_deal_id').val($(this).val())
            $('.select_deal').val($(this).text())
            if(!$('.selectMainDeal').hasClass('d-none')){
                $('.selectMainDeal').addClass('d-none')
            }
            if($('.PostavitButton').hasClass('d-none')){
                $('.PostavitButton').removeClass('d-none')
            }
        })
        $("#performer_id").on("click", function() {
            var se = $(this);
            se.addClass('d-none');
            $('.choise-manager').text($('#performer_id option:selected').text())
        });
        $(function () {
            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function () {
                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    // $(this).draggable({
                    //     zIndex        : 1070,
                    //     revert        : true, // will cause the event to go back to its
                    //     revertDuration: 0  //  original position after the drag
                    // })
                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var full_date = new Date()
            var d    = full_date.getDate(),
                m    = full_date.getMonth()+1,
                y    = full_date.getFullYear()
            var date = y+'-'+m+'-'+d;
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------
            let modal_content = false;
            let day_calendar_body = false
            let models = {'id':[], 'href':[], 'name':[], 'surname':[], 'email':[], 'task_date':[], 'type':[], 'user_name':[], 'user_surname':[], 'created_at':[], 'middlename':[]};
            let my_models = {'id':[], 'href':[], 'name':[], 'surname':[], 'email':[], 'task_date':[], 'type':[], 'user_name':[], 'user_surname':[], 'created_at':[], 'middlename':[]};
            let responsible = '<?php echo e(translate('Responsible')); ?>'
            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            models.id.push('<?php echo e($model_->id); ?>')
            models.href.push('<?php echo e(route('forthebuilder.clients.show', [((isset($model_->deal->client)) ? $model_->deal->client->id : ''), '0', '0'])); ?>')
            models.name.push('<?php echo e($model_->performer->first_name); ?>')
            models.surname.push('<?php echo e($model_->performer->last_name); ?>')
            models.middlename.push('<?php echo e($model_->performer->middle_name); ?>')
            models.created_at.push('<?php echo e($model_->created_at); ?>')
            models.email.push('<?php echo e($model_->performer->email); ?>')
            models.task_date.push('<?php echo e($model_->task_date); ?>')
            models.type.push('<?php echo e($model_->type); ?>')
            models.user_name.push('<?php echo e($model_->user->first_name??''); ?>')
            models.user_surname.push('<?php echo e($model_->user->last_name??''); ?>')
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $my_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_model_): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            my_models.id.push('<?php echo e($my_model_->id); ?>')
            my_models.href.push('<?php echo e(route('forthebuilder.clients.show', [((isset($my_model_->deal->client)) ? $my_model_->deal->client->id : ''), '0', '0'])); ?>')
            my_models.name.push('<?php echo e($my_model_->performer->first_name); ?>')
            my_models.surname.push('<?php echo e($my_model_->performer->last_name); ?>')
            my_models.middlename.push('<?php echo e($my_model_->performer->middle_name); ?>')
            my_models.created_at.push('<?php echo e($my_model_->created_at); ?>')
            my_models.email.push('<?php echo e($my_model_->performer->email); ?>')
            my_models.task_date.push('<?php echo e($my_model_->task_date); ?>')
            my_models.type.push('<?php echo e($my_model_->type); ?>')
            my_models.user_name.push('<?php echo e($my_model_->user->first_name??''); ?>')
            my_models.user_surname.push('<?php echo e($my_model_->user->lastname??''); ?>')
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                        textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                locale: 'ru',
                headerToolbar: {
                    left  : 'today',
                    center: 'prev title next',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays){
                    $('#day_calendar_body').html("")
                    let calendar_class = '';
                    let calendar_class_1 = '';
                    day_calendar_body = false;
                    models.task_date.forEach(myFunction);
                    $('.fc-daygrid-day').attr('data-toggle', 'modal')
                    $('.fc-daygrid-day').attr('data-target', '#day_calendar')
                    $('.fc-daygrid-day').attr('id', 'day_calendar_modal')
                    $('#calendar_task_date').text(start.startStr)
                    if(parseInt(Date.parse(date)) >= parseInt(Date.parse(start.startStr))+86400){
                        if(!$('#calendar_task_date').hasClass('modalKalendarDate')){
                            $('#calendar_task_date').addClass('modalKalendarDate')
                            $('#calendar_task_date').removeClass('modalKalendarDateBlue')
                        }
                    }else{
                        if(!$('#calendar_task_date').hasClass('modalKalendarDateBlue')) {
                            $('#calendar_task_date').addClass('modalKalendarDateBlue')
                            $('#calendar_task_date').removeClass('modalKalendarDate')
                        }
                    }
                    function myFunction(item, index){
                        if(item == start.startStr){
                            day_calendar_body = true;
                            if(parseInt(Date.parse(date)) >= parseInt(Date.parse(start.startStr))+86400){
                                $('#day_calendar_body').append(`
                                    <a class='d-flex flex-column border border-info rounded p-2 justify-content-between modalKalendarDate kalendarModalBody' href='${models.href[index]}'>
                                        <div class="modalImyaKalendar text-dark">
                                            <i class="far fa-user-circle"></i>
                                            ${models.name[index]}&nbsp;${models.surname[index]}&nbsp;${models.middlename[index]}                                        
                                        </div>
                                        <div class="modalDataKalendar text-dark">
                                            <i class="fas fa-user-tie"></i>
                                            ${responsible}:
                                            <b>${models.user_name[index]}&nbsp;${models.user_surname[index]}</b>

                                            <p class="mt-2 mb-0 text-secondary d-flex justify-content-between">
                                                <span>
                                                    <i class="mdi mdi-calendar-blank-outline"></i>
                                                    <span>${models.created_at[index]}</span>
                                                </span>
                                                <span>
                                                    <i class="mdi mdi-clock-time-three-outline"></i>
                                                    <span>${models.type[index]}</span>
                                                </span>
                                                
                                            </p>
                                        </div>
                                    </a><br>`)
                            }else{
                                $('#day_calendar_body').append(`
                                    <a class='d-flex flex-column border border-info rounded p-2 justify-content-between modalKalendarDateBlue kalendarModalBodyBlue' href='${models.href[index]}'>
                                        <div class="modalImyaKalendar text-dark">
                                            <i class="far fa-user-circle"></i>
                                            ${models.name[index]}&nbsp;${models.surname[index]}&nbsp;${models.middlename[index]}
                                        </div>
                                        <div class="modalDataKalendar text-dark">
                                            <i class="fas fa-user-tie"></i>
                                            ${responsible}:
                                            <b>${models.user_name[index]}&nbsp;${models.user_surname[index]}</b>


                                            <p class="mt-2 mb-0 text-secondary d-flex justify-content-between">
                                                <span>
                                                    <i class="mdi mdi-calendar-blank-outline"></i>
                                                    <span>${models.created_at[index]}</span>
                                                </span>
                                                <span>
                                                    <i class="mdi mdi-clock-time-three-outline"></i>
                                                    <span>${models.type[index]}</span>
                                                </span>
                                                
                                            </p>
                                        </div>
                                    </a><br>`)
                            }
                        }
                    }
                    if(day_calendar_body == false){
                        $('#day_calendar_body').append(`
                            <div class="d-flex justify-content-center">
                                <h3 class="modalContentCalendarNet"><?php echo e(translate('No task for today')); ?></h3>
                            </div>`)
                    }
                },
                events: [
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $status = '';
                            if(strtotime("now") >= strtotime($model->task_date)+86400){
                                $back_color = '#FF9D9D';
                            }else{
                                $back_color = '#94B2EB';
                            }
                        ?>
                    {
                        
                        url: '#',
                        title : "<?php echo e($model->performer->first_name); ?> <br> <?php echo e($model->status); ?> <?php echo e($model->type); ?>",
                        customHtml : "<span><?php echo e($model->title); ?></span>",
                        start          : '<?php echo e($model->task_date); ?>',
                        backgroundColor: '<?php echo e($back_color); ?>',
                        borderColor    : '<?php echo e($back_color); ?>', //red
                        padding: '8px',
                        allDay         : true,
                        textEscape: true
                    },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                eventContent: function(eventInfo) {
                    return { html: eventInfo.event.extendedProps.customHtml }
                },
                editable  : false,
                droppable : false,
                // this allows things to be dropped onto the calendar !!!
                drop      : function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            // calendar types
            calendar.render();

            $('.fc-daygrid-day').attr('data-toggle', 'modal')
            $('.fc-daygrid-day').attr('data-target', '#day_calendar')
            $('.fc-daygrid-day').attr('id', 'day_calendar_modal')

            var my_calendar = new Calendar(calendarEl, {
                locale: 'ru',
                headerToolbar: {
                    left  : 'today',
                    center: 'prev title next',
                    right : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays){
                    $('#day_calendar_body').html("")
                    let calendar_class = '';
                    let calendar_class_1 = '';
                    day_calendar_body = false;
                    my_models.task_date.forEach(myFunction);
                    $('.fc-daygrid-day').attr('data-toggle', 'modal')
                    $('.fc-daygrid-day').attr('data-target', '#day_calendar')
                    $('.fc-daygrid-day').attr('id', 'day_calendar_modal')
                    $('#calendar_task_date').text(start.startStr)
                    if(parseInt(Date.parse(date)) >= parseInt(Date.parse(start.startStr))+86400){
                        if(!$('#calendar_task_date').hasClass('modalKalendarDate')){
                            $('#calendar_task_date').addClass('modalKalendarDate')
                            $('#calendar_task_date').removeClass('modalKalendarDateBlue')
                        }
                    }else{
                        if(!$('#calendar_task_date').hasClass('modalKalendarDateBlue')) {
                            $('#calendar_task_date').addClass('modalKalendarDateBlue')
                            $('#calendar_task_date').removeClass('modalKalendarDate')
                        }
                    }
                    function myFunction(item, index){
                        if(item == start.startStr){
                            day_calendar_body = true;
                            if(parseInt(Date.parse(date)) >= parseInt(Date.parse(start.startStr))+86400){
                                $('#day_calendar_body').append(`
                                    <a class='d-flex justify-content-between modalKalendarDate kalendarModalBody' href='${my_models.href[index]}'>
                                        <div class="modalImyaKalendar">
                                            ${my_models.name[index]}&nbsp;${my_models.surname[index]}&nbsp;${my_models.middlename[index]}<br>
                                            ${my_models.created_at[index]}&nbsp;${my_models.type[index]}
                                        </div>
                                        <div class="modalDataKalendar">
                                            Ответственный:<br>
                                            <b>${my_models.user_name[index]}&nbsp;${my_models.user_surname[index]}</b>
                                        </div>
                                    </a><br>`)
                            }else{
                                $('#day_calendar_body').append(`
                                    <a class='d-flex justify-content-between modalKalendarDateBlue kalendarModalBodyBlue' href='${my_models.href[index]}'>
                                        <div class="modalImyaKalendar">
                                            ${my_models.name[index]}&nbsp;${my_models.surname[index]}&nbsp;${my_models.middlename[index]}<br>
                                            ${my_models.created_at[index]}&nbsp;${my_models.type[index]}
                                        </div>
                                        <div class="modalDataKalendar">
                                            Ответственный:<br>
                                            <b>${my_models.user_name[index]}&nbsp;${my_models.user_surname[index]}</b>
                                        </div>
                                    </a><br>`)
                            }
                        }
                    }
                    if(day_calendar_body == false){
                        $('#day_calendar_body').append(`
                                <div class="d-flex justify-content-center">
                                    <h3 class="modalContentCalendarNet"><?php echo e(translate('No task for today')); ?></h3>
                                </div>`)
                    }
                },

                events: [
                        <?php $__currentLoopData = $my_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $my_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $status = '';
                                if(strtotime("now") >= strtotime($my_model->task_date)+86400){
                                    $back_color = '#FF9D9D';
                                }else{
                                    $back_color = '#94B2EB';
                                }
                        ?>
                    {
                        
                        url: '#',
                        title : "<?php echo e($my_model->performer->first_name); ?> <br> <?php echo e($my_model->status); ?> <?php echo e($my_model->type); ?>",
                        customHtml : "<span><?php echo e($model->title); ?></span>",
                        start          : '<?php echo e($my_model->task_date); ?>',
                        backgroundColor: '<?php echo e($back_color); ?>',
                        borderColor    : '<?php echo e($back_color); ?>', //red
                        padding: '8px',
                        allDay         : true,
                        textEscape: true
                    },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                eventContent: function(eventInfo) {
                    return { html: eventInfo.event.extendedProps.customHtml }
                },
                editable  : false,
                droppable : false,
                // this allows things to be dropped onto the calendar !!!
                drop      : function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });
            $('#all').prop('checked', true)
            $('#my_tasks').prop('checked', false)
            
            $('#all').on('change', function (){
                if($(this).is(':checked')) {
                    $('#my_tasks').prop('checked', false)
                    $('#calendar').html("")
                    calendar.render();
                    $(this).parent().parent().removeClass().addClass('btn btn-success waves-effect waves-light mx-2')
                    $('#my_tasks').parent().parent().removeClass().addClass('btn btn-outline-success waves-effect waves-light')
                }
            });
            
            $('#my_tasks').on('change', function (){
                if($(this).is(':checked')) {
                    $('#all').prop('checked', false)
                    $('#calendar').html("")
                    my_calendar.render();
                    $('#all').parent().parent().removeClass().addClass('btn btn-outline-success waves-effect waves-light mx-2')
                    $(this).parent().parent().removeClass().addClass('btn btn-success waves-effect waves-light')
                }
            });

            // adding task to leads
            // $(document).on('click', '.choise-date', function(e) {
            //     e.preventDefault();
            //     $("#task_date").datetimepicker("show");
            // })
            $(document).on('click', '.choise-manager', function(e) {
                e.preventDefault();

            })

            // $("#deal_id").on("click", function() {
            //
            //     $('.choise-manager').text($('#deal_id option:selected').text())
            // });

            let call_png = '<?php echo e(asset('/backend-assets/forthebuilders/images/Call.png')); ?>'
            let meeting_png = '<?php echo e(asset('/backend-assets/forthebuilders/images/meeting.png')); ?>'
            let calling_or_meeting = document.getElementById('calling_or_meeting')
            $(document).on('click', '.choise-phone', function(e) {
                e.preventDefault();
                var se = $("#type");
                se.removeClass('d-none');
                se[0].size = 2;
            })

            $("#type").on("click", function() {
                var se = $(this);
                se.addClass('d-none');
                if($('#type option:selected').text() == 'Meeting'){
                    calling_or_meeting.setAttribute('src', meeting_png)
                }
                if($('#type option:selected').text() == 'Call'){
                    calling_or_meeting.setAttribute('src', call_png)
                }
                $('.choise-phone').text($('#type option:selected').text())
            });

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color'    : currColor
                })
            })

            $('#add-new-event').click(function (e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        })
        $('#day_calendar_modal').on('click', function (){

        });


    });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/clients/calendar.blade.php ENDPATH**/ ?>