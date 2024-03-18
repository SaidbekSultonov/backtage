<?php
    use Modules\ForTheBuilder\Entities\Constants;
?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
    .select_house{
        cursor: pointer;
    }
</style>
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">

            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row w-100 align-items-center">
                        <div class="col-sm-6">
                            <h4><?php echo e(translate('Deals')); ?></h4>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="cdelki_c_klientami btn btn-outline-info ms-2">
                                <?php echo e(translate('List deals')); ?>

                            </a>
                            <a class="btn btn-outline-primary mx-1" href="<?php echo e(route('forthebuilder.deal.contracts')); ?>">
                                <i class="mdi mdi-book-check-outline"></i>
                                <span><?php echo e(translate('Sales')); ?></span>
                            </a>
                            <a href="<?php echo e(route('forthebuilder.deal.archives')); ?>" class="btn btn-outline-secondary">
                                <?php echo e(translate('Archive deals')); ?>

                            </a>
                        </div>
                    </div>    
                    
                </div>
            </div>

            <div class="row">
                <?php if(empty(!$arr)): ?> <?php $i = 1; $color = 'danger'; ?>
                    <?php $__currentLoopData = $arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            switch($i){                                
                                case '2':
                                    $color = 'warning';
                                break;
                                case '3':
                                    $color = 'success';
                                break;
                            }
                        ?>

                        <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body taskboard-box">
                                <h4 class="header-title mt-0 mb-3 text-center text-<?php echo e($color); ?>">
                                    <span class="me-2"><?php echo e($key); ?></span>
                                    <?php
                                        switch($i){                                
                                            case '1':
                                                echo '( '.$models_first_count.' )';
                                            break;
                                            case '2':
                                                echo '( '.$models_nego_count.' )';
                                            break;
                                            case '3':
                                                echo '( '.$models_deal_count.' )';
                                            break;
                                        }
                                    ?>
                                </h4>
                                <hr class="my-1">
                                <ul class="sortable-list list-unstyled taskList" id="deal_<?php echo e($i); ?>" style="overflow-y: auto; height: 60vh">
                                    <?php if(isset($value['list']) && !empty($value['list'])): ?>
                                        <?php $__currentLoopData = $value['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <li class="p-1 ui-sortable-handle" 
                                            data-client-id="<?php echo e($val['client_id']); ?>"
                                            data-personal-id="<?php echo e($val['personal_id']); ?>"
                                            data-series-number="<?php echo e($val['series_number']); ?>"
                                            data-inn="<?php echo e($val['inn']); ?>"
                                            data-issued-by="<?php echo e($val['issued_by']); ?>"
                                            data-house-id="<?php echo e($val['house_id']); ?>"
                                            data-house-flat-id="<?php echo e($val['house_flat_id']); ?>"
                                            data-house-name="<?php echo e($val['house_name']); ?>"
                                            data-number-of-flat="<?php echo e($val['number_of_flat']); ?>"
                                            data-url="<?php echo e(route('forthebuilder.clients.storeBudgetForDeals', $val['client_id'])); ?>"
                                            data-type="<?php echo e($val['type']); ?>"
                                            data-role="<?php echo e(Auth::user()->role_id); ?>"

                                            data-id="item_<?php echo e($val['id']); ?>">
                                            <div class="kanban-box">
                                                <div class="">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item w-100">
                                                            <a href="<?php echo e(route('forthebuilder.clients.show', [$val['client_id'], '0', '0'])); ?>" class="d-block w-100">
                                                                
                                                                <span class="badge bg-<?php echo e($color); ?> "><?php echo e(translate('Responsible')); ?>: 
                                                                    <small><?php echo e($val['responsible']); ?></small>
                                                                </span> 
                                                                
                                                                <hr class="my-1">
                                                                <div class="text-dark">
                                                                    <i class="far fa-user-circle"></i>
                                                                    <small><?php echo e($val['client']); ?></small>
                                                                </div>
                                                                <br>
                                                                <div class="d-flex justify-content-between text-secondary">
                                                                    <div>
                                                                        <i class="mdi mdi-calendar-month-outline"></i>
                                                                        <small>
                                                                            <?php echo e($val['day']); ?>

                                                                        </small>
                                                                    </div>
                                                                    <div>
                                                                        <i class="mdi mdi-clock-check-outline"></i>
                                                                        <small>
                                                                            <?php echo e($val['time']); ?>

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
                                    <?php
                                        switch($i){                                
                                            case '1':
                                                if($models_first_count > 10){
                                                    echo '<li class="p-1 last_p">
                                                        <button class="btn btn-outline-primary btn-sm w-100 load_more" data-offset="2" data-id="1">
                                                            '.translate('Load more').'
                                                        </button>
                                                    </li>';
                                                }
                                            break;
                                            case '2':
                                                if($models_nego_count > 10){
                                                    echo '<li class="p-1 last_p">
                                                        <button class="btn btn-outline-primary btn-sm w-100 load_more" data-offset="2" data-id="2">
                                                            '.translate('Load more').'
                                                        </button>
                                                    </li>';
                                                }
                                            break;
                                            case '3':
                                                if($models_deal_count > 10){
                                                    echo '<li class="p-1 last_p">
                                                        <button class="btn btn-outline-primary btn-sm w-100 load_more" data-offset="2" data-id="3">
                                                            '.translate('Load more').'
                                                        </button>
                                                    </li>';
                                                }
                                            break;
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="select_flat_modal2" tabindex="-1" role="dialog" aria-labelledby="selectFlat"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body">
                <div class="store_budget_modal2" id="store_budget_modal">
                    <div class="d-flex justify-content-center">
                        <div class="modal-content store_budget_form">
                            <form class="modal-body" id="store_budget_"
                                  action="" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="deal_id" id="deal_id" value="">
                                <input type="hidden" name="personal_id" id="personal_id" value="">

                                <div>
                                    <input type="hidden" id="budget_input_hidden">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="budget_checkbox">
                                        <label class="form-check-label" for="budget_checkbox">
                                            <?php echo e(translate('Budget')); ?>

                                        </label>
                                    </div>

                                    <input type="integer" name="budget" class=" text-left form-control" id="budget_input">
                                </div>
                                <div class="mt-3">
                                    <input type="hidden" id="looking_for_hidden">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="looking_for_checkbox">
                                        <label class="form-check-label" for="looking_for_checkbox">
                                            <?php echo e(translate('What is looking for')); ?> 
                                        </label>
                                    </div>
                                    
                                    <input type="text" name="looking_for" class=" text-left form-control" id="looking_for_input">
                                </div>
                                <div class="mt-3">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="password_checkbox">
                                        <label class="form-check-label" for="password_checkbox">
                                            <?php echo e(translate('Passport data')); ?>

                                        </label>
                                    </div>

                                    <input id="series_number" type="text" placeholder="<?php echo e(translate('Series and number')); ?>" name="series_number"
                                           class=" text-left client-show-modal-series password_input form-control mb-2" value=""
                                           >
                                    <input id="issued_by" type="text" placeholder="<?php echo e(translate('Issued by')); ?>" name="issued_by"
                                           class=" text-left client-show-modal-issued password_input form-control mb-2" >
                                    <input id="inn" type="text" placeholder="<?php echo e(translate('PINFL or TIN')); ?>" name="inn"
                                           class=" text-left client-show-modal-inn password_input form-control mb-2" >

                                    
                                        <input type="hidden" name="house_id" id="model_house_id">
                                        <input type="hidden" name="house_flat_id" id="model_house_flat_id">
                                        <div class="d-flex">
                                            <h4 class="plusFlexModalInformationDobavitCvartir" id="model_interested_flat"></h4>
                                        </div>
                                        <br>
                                        <div class="d-flex">
                                            <a class="btn btn-primary waves-effect waves-light plusFlexModalInformation_2" id="adding_flat">
                                                <span class="btn-label">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="">
                                                    <?php echo e(translate('Add apartment')); ?>

                                                </span>
                                            </a>
                                        </div>
                                    

                                    <div class="deal_status_content mt-3">
                                        <input type="hidden" name="type" id="deal_status_value" value="1">
                                        <a class="status_first_contact btn btn-outline-info" style="opacity: 0;" id="selected_deal_status">
                                            <?php echo e(translate('First contact')); ?>

                                        </a>
                                        
                                        <div class="deal_status">
                                            <button type="submit" value="<?php echo e(Constants::FIRST_CONTACT); ?>" class="w-100 status_first_contact btn btn-danger mb-2" id="first_contact_id" type="submit">
                                                <?php echo e(translate('First contact')); ?>

                                            </button>
                                            <button value="<?php echo e(Constants::NEGOTIATION); ?>" class="w-100 status_negotiation btn btn-warning mb-2" id="negotiation_id" type="submit">
                                                <?php echo e(translate('Negotiation')); ?>

                                            </button>
                                            <button value="<?php echo e(Constants::MAKE_DEAL); ?>" class="w-100 status_making_a_deal btn btn-success" id="making_a_deal_id" client_id="" type="submit">
                                               <?php echo e(translate('Making a deal')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


<div class="modal fade" id="select_flat_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="box-shadow: 0 0 10px #000;">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modalVideystvitelno" id="select_flat_modal_title"><?php echo e(translate('Please select flat before making a deal')); ?></h4>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="modalVideystvitelnoDa btn btn-success" data-bs-dismiss="modal"><?php echo e(translate('Yes')); ?></button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="house_modal" tabindex="-1" role="dialog" aria-labelledby="selectFlat"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="row w-100 align-items-center justify-content-between">
                    <div class="col-10 d-flex align-items-center justify-content-between">
                        <h4><?php echo e(translate('JK')); ?></h4>
                        <input placeholder="<?php echo e(translate('Search by objects')); ?>" class="w-50 searchTable form-control form-control-sm" type="text">    
                    </div>
                    <div class="col-2 text-end">
                        <button type="button" class="close btn btn-light btn-sm" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    
                </div>
                
            </div>
            <div class="modal-body" style="height: 600px;overflow: auto;">
                
            </div>
        </div>
    </div>
</div>              

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none;">
            <div class="modal-body">
                <h2 class="modalVideystvitelno">Вы действительно хотите удалить</h2>
                <div class="d-flex justify-content-center mt-5">
                    <button class="modalVideystvitelnoDa" data-dismiss="modal">Да</button>
                    <button class="modalVideystvitelnoNet" data-dismiss="modal">Нет</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="fullWidthModalLabel">Modal Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            
        </div>
    </div>
</div>


<script>

    $(document).on('click','.plusFlexModalInformation_2',function(){
        $('#house_modal').modal('toggle')

        $.ajax({
            url: `/clients/client-house-ajax`,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })
    
    $(document).on('click','.back_houses',function(){
        
        $.ajax({
            url: `/clients/client-house-ajax`,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })

    $(document).on('click','.select_house',function(){
        var house_id = $(this).attr('data-id')
        // console.log(house_id)
        
        $.ajax({
            url: `/clients/client-select-house-ajax/`+house_id,
            type: 'GET',
            success: function(data) {
                $('#house_modal .modal-body').html(data)
                
                
            },
            error: function(data) {
                console.log(data);
            }
        });
    })

    $(document).on('click','.select_house_flat',function(){
        var flat_id = $(this).attr('data-id')
        var house_id = $(this).attr('data-house-id')
        var number_of_flat = $(this).attr('data-number-of-flat')
        var house_name = $(this).attr('data-house_name')


        $('#model_interested_flat').text(house_name+' '+number_of_flat+'-flat')
        $('#select_flat_modal2 #model_house_id').val(house_id)
        $('#select_flat_modal2 #model_house_flat_id').val(flat_id)
        $('#house_modal').modal('toggle')
        
    })

    $(document).on('click','#making_a_deal_id',function(e){
        

        if($('#budget_input').val() == '' || 
            $('#looking_for_input').val() == '' || 
            $('#series_number').val() == '' || 
            $('#issued_by').val() == '' || 
            $('#inn').val() == '' ||
            $('#model_house_id').val() == '' || 
            $('#model_house_flat_id').val() == ''){
                e.preventDefault()
                $('#select_flat_modal').modal('toggle')
                $('#budget_input').prop('disabled', false) 
                $('#looking_for_input').prop('disabled', false) 
                $('#series_number').prop('disabled', false) 
                $('#issued_by').prop('disabled', false) 
                $('#inn').val()
                $('#budget_checkbox').prop('checked',true)
                $('#looking_for_checkbox').prop('checked',true)
                $('#password_checkbox').prop('checked',true)
        }
        else{
            $('#store_budget_').unbind('submit').submit();            
        }


    })
    
    $(document).on('click','#negotiation_id',function(e){
        

        if($('#budget_input').val() == '' || 
            $('#looking_for_input').val() == '' || 
            $('#series_number').val() == '' || 
            $('#issued_by').val() == '' || 
            $('#inn').val() == '' ||
            $('#model_house_id').val() == '' || 
            $('#model_house_flat_id').val() == ''){
                e.preventDefault()
                $('#select_flat_modal').modal('toggle')
                $('#budget_input').prop('disabled', false) 
                $('#looking_for_input').prop('disabled', false) 
                $('#series_number').prop('disabled', false) 
                $('#issued_by').prop('disabled', false) 
                $('#inn').val()
                $('#budget_checkbox').prop('checked',true)
                $('#looking_for_checkbox').prop('checked',true)
                $('#password_checkbox').prop('checked',true)
        }
        else{
            $('#store_budget_').unbind('submit').submit();            
        }


    })
    
    $('#select_flat_modal2').on('hidden.bs.modal', function () {
      $("#deal_1, #deal_2, #deal_3").sortable('cancel')
    })

    $(document).on('click','.load_more',function(){
        var id = $(this).attr('data-id')
        var offset = $(this).attr('data-offset')
        var _this = $(this)

        $.ajax({
            url: `/deal/load-more/`,
            type: 'GET',
            datatype: 'json',
            data: {id: id, offset: offset},
            success: function(data) {
                if (data != '') {
                    _this.parent('.last_p').before(data)
                    _this.attr('data-offset',++offset)
                }
                else{
                    _this.parent().remove()
                }
                
            }
        });
    })
    

    
let page_name = 'deal';
</script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/new/Modules/ForTheBuilder/Resources/views/deal/index.blade.php ENDPATH**/ ?>