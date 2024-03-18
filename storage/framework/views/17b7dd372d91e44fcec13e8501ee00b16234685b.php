<?php
    use Modules\ForTheBuilder\Entities\Constants;
?>
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.min.css')); ?>">
    <style>

        .deal_status {
            display: flex;
            flex-direction: column;
            position: absolute;
            margin-top: 54px;
        }

        

        
        .deal_status_content {
            text-align: center;
            display: flex;
            justify-content: center;
        }

        .backdrop {
            position: absolute;
            z-index: 100;
            background-color: black;
            opacity: 50%;
            width: 100%;
            height: 400%;
        }

        .store_budget_modal {
            position: absolute;
            width: 100%;
        }

        .task_title {
            margin: 14px 0px 0px 4px;
        }
        
        .img_box{
            width: 50px;
            height: 50px;
            padding: 5px;
        }
        .img_box_round{
            border-radius: 100%;
            border: 1px solid #1FB63C;
            width: 45px;
            height: 42px;
        }
        /* for chat */

        #chat_area
        {
            min-height: 300px;
            /*overflow-y: scroll*/;
        }

        #chat_history
        {
            width: 100%;
            min-height: 200px;
            max-height: 230px;
            overflow-y: scroll;
            margin-bottom:16px;
            background-color: #E8F0FF;
            padding: 16px;
        }

        #user_list
        {
            min-height: 500px;
            max-height: 750px;
            overflow-y: scroll;
        }
        .sender_chat
        {
            background-color: #94B2EB !important;
            border-radius: 20px !important;
        }
        .recever_chat
        {
            background-color: #E8F0FF !important;
            border-radius: 20px !important;
        }
        .content_center {
            display: flex;
            justify-content: center !important;
            align-items: center !important;

        }
        .profileChartChat{
            background: #E8F0FF;
            width: 600px;
        }
        .chat_group{
            display: flex;
            align-items: center;
            width: 7%;
            height: 100%;
            border: 1px solid #DEE2E6;
            border-right: 0;
            border-top-right-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            background: #f1f1f1;
            justify-content: center;
        }
        #message_area{
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            border-top-right-radius: 0.25rem !important;
            border-bottom-right-radius: 0.25rem !important;
        }
    </style>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2 d-flex justify-content-between align-items-center">
                    <div class="row align-items-center w-100">
                        <div class="col-md-10 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.clients.index')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-3">
                                <?php echo e(translate('Client information')); ?>

                            </h4>
                        </div>
                        <div class="col-md-2 text-end">
                            <a class="deleteButtonKlinetInformatsiya text-danger" data-toggle="modal" data-target="#deleteClient">
                                <i class="fe-trash-2 mdi-20"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs">
                                <?php if(empty(!$data)): ?>
                                    <?php
                                        $deal_unique = [];
                                        foreach ($data as $d_val) {
                                            $deal_id_array[] = $d_val->deal_id;
                                            $deal_unique = array_unique($deal_id_array);
                                        }
                                    ?>
                                    <?php for($i = 1; $i <= count($deal_unique); $i++): ?>
                                        <?php
                                            $count = count($deal_unique);
                                            $class = 'smsOneNumber';
                                            if ($i == 1) {
                                                $class = 'smsOneNumberBlue';
                                            }
                                        ?>
                                        <li class="nav-item">
                                            <a  href="#home_<?php echo e($i); ?>" 
                                                data-bs-toggle="tab" aria-expanded="true"
                                                class="<?php echo e($class); ?> clientInfoClick nav-link <?php echo (($i ==1) ? 'active' : '') ?>"
                                                data-id="clientInfo<?php echo e($data[$i - 1]->deal_id); ?>" id="clientInfoButton<?php echo e($i); ?>"
                                                deal_id="<?php echo e($data[$i - 1]->deal_id); ?>">
                                                    <?php echo e($i); ?>

                                                </a>
                                        </li>
                                        
                                    <?php endfor; ?>
                                <?php endif; ?>
                                
                            </ul>
                            <div class="tab-content">
                                <?php if(isset($data)&& count($data)>0): ?>
                                    <?php
                                        $first = true;
                                        $i = 1;
                                        $k = 1;
                                        foreach ($data as $d_val) {
                                            $deal_id_array[] = $d_val->deal_id;
                                            $deal_unique = array_unique($deal_id_array);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane <?php echo (($k == 1) ? 'show active' : '') ?>" id="home_<?php echo e($k); ?>">
                                            <?php if(in_array($val->deal_id, $deal_unique)): ?>
                                                <input type="hidden" name="chat_deal_id" id="chat_deal_id" value="<?php echo e($val->deal_id); ?>">
                                                <input type="hidden" name="chat_client_id" id="chat_client_id" value="<?php echo e($val->client_id); ?>">
                                                <?php
                                                    $histories = null;
                                                    $class = 'd-none';
                                                    if ($first == true) {
                                                        $first = false;
                                                        $class = '';
                                                    }
                                                    $deal_id = $val->deal_id;
                                                    $personal_id = $val->personal_id;
                                                ?>
                                                
                                                <div class="clientInfoDiv <?php echo e($class); ?>" id="clientInfo<?php echo e($val->deal_id); ?>">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="lidiMarginRight2">
                                                                <?php if($val->type == 1): ?>
                                                                    <div class="informatsiyaKlienta" >
                                                                        <table class="table table-striped table-bordered mb-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Responsible')); ?></th>
                                                                                    <td>
                                                                                        <?php echo e(isset($val->user_id) && !empty($val->user_id) ? mb_substr($val->userLastName . ' ' . $val->userFirstName . ' ' . $val->userMiddleName, 0, 14, 'UTF-8') .'...' : ''); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        <?php echo e(translate('F.I.O')); ?>

                                                                                    </th>
                                                                                    <td>
                                                                                        <?php echo e($val->last_name . ' ' . $val->first_name . ' ' . $val->middle_name); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        <?php echo e(translate('Phone number')); ?>

                                                                                    </th>
                                                                                    <td>
                                                                                        <?php echo e($val->phone); ?>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>
                                                                                        <?php echo e(translate('Email')); ?>

                                                                                    </th>
                                                                                    <td>
                                                                                        <?php echo (($val->email) ? $val->email : '<span class="text-muted">'.translate('Not specified').'</span>') ?>
                                                                                    </td>
                                                                                <tr>
                                                                                    <th>
                                                                                        <?php echo e(translate('Status')); ?>

                                                                                    </th>
                                                                                    <td>
                                                                                        <button type="submit" data-bs-toggle="modal"
                                                                                            client_id="<?php echo e($val->client_id); ?>" deal_id="<?php echo e($deal_id); ?>"
                                                                                            personal_id="<?php echo e($val->personal_id); ?>" deal_status="<?php echo e($val->type); ?>"
                                                                                            class="PerviyContact PerviyContactRed status_button client-show-change-status btn btn-danger btn-sm"
                                                                                            data-series_number="<?php echo e($val->series_number); ?>"
                                                                                            budget="<?php echo e($val->budget); ?>" looking_for="<?php echo e($val->looking_for); ?>"
                                                                                            data-inn="<?php echo e($val->inn); ?>"
                                                                                            data-issued_by="<?php echo e($val->issued_by); ?>"
                                                                                            data-given_date="<?php echo e($val->given_date); ?>"
                                                                                            data-address="<?php echo e($val->address); ?>">
                                                                                        <?php echo e(translate('First contact')); ?>

                                                                                    </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="display: none !important;">
                                                                                    <th>
                                                                                        <?php echo e(translate('Interested')); ?>

                                                                                    </th>
                                                                                    <td>
                                                                                        <?php
                                                                                            if(isset($val->flat_area)){
                                                                                                $areas = json_decode($val->flat_area);
                                                                                            }else{
                                                                                                $areas = '';
                                                                                            }
                                                                                        ?>
                                                                                        <?php if(isset($val->house_name)): ?>
                                                                                            <?php if(is_array($areas)): ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat">
                                                                                                    <?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number . ' flat: ' . $areas['total']); ?>

                                                                                                </button>
                                                                                            <?php else: ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat"><?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number.' flat'); ?>

                                                                                                </button>
                                                                                            <?php endif; ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo e(translate('Not specified')); ?>

                                                                                        <?php endif; ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                <?php elseif($val->type == 2): ?>
                                                                    <div class="informatsiyaKlienta">
                                                                        <table class="table table-striped table-bordered mb-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Responsible')); ?></th>
                                                                                    <td><?php echo e(isset($val->user_id) && !empty($val->user_id) ? mb_substr($val->userLastName . ' ' . $val->userFirstName . ' ' . $val->userMiddleName, 0, 14, 'UTF-8').'...' : ''); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('F.I.O')); ?></th>
                                                                                    <td><?php echo e($val->last_name . ' ' . $val->first_name . ' ' . $val->middle_name); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Phone number')); ?></th>
                                                                                    <td><?php echo e($val->phone); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Email')); ?></th>
                                                                                    <td><?php echo (($val->email) ? $val->email : '<span class="text-muted">'.translate('Not specified').'</span>') ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Status')); ?></th>
                                                                                    <td>
                                                                                        <button type="submit" data-bs-toggle="modal"
                                                                                        client_id="<?php echo e($val->client_id); ?>" deal_id="<?php echo e($deal_id); ?>"
                                                                                        personal_id="<?php echo e($val->personal_id); ?>" deal_status="<?php echo e($val->type); ?>"
                                                                                        class="PerviyContact status_button PerviyContactYellow client-show-change-status btn btn-warning"
                                                                                        data-series_number="<?php echo e($val->series_number); ?>"
                                                                                        budget="<?php echo e($val->budget); ?>" looking_for="<?php echo e($val->looking_for); ?>"
                                                                                        data-inn="<?php echo e($val->inn); ?>"
                                                                                        data-issued_by="<?php echo e($val->issued_by); ?>"
                                                                                        data-given_date="<?php echo e($val->given_date); ?>"
                                                                                        data-address="<?php echo e($val->address); ?>">
                                                                                            <?php echo e(translate('Negotiation')); ?>

                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Series number')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->series_number) ? $val->series_number : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Issued by')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->issued_by) ? $val->issued_by : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?> 
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Inn')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->inn) ? $val->inn : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?> 
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Budget')); ?></th>
                                                                                    <td><?php echo e(round($val->budget*100)/100 ?? ''); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('What is looking for')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->looking_for) ? $val->looking_for : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Interested')); ?></th>
                                                                                    <td>
                                                                                        <?php
                                                                                            if(isset($val->flat_area)){
                                                                                                $areas = json_decode($val->flat_area);
                                                                                            }else{
                                                                                                $areas = '';
                                                                                            }
                                                                                        ?>
                                                                                        <?php if(isset($val->house_name)): ?>
                                                                                            <?php if(is_array($areas)): ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat">
                                                                                                    <?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number . ' flat: ' . $areas['total']); ?>

                                                                                                </button>
                                                                                            <?php else: ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat"><?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number.' flat'); ?>

                                                                                                </button>
                                                                                            <?php endif; ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo e(translate('Not specified')); ?>

                                                                                        <?php endif; ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                <?php elseif($val->type == 3): ?>
                                                                    <div class="informatsiyaKlienta">
                                                                        <table class="table table-striped table-bordered mb-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Responsible')); ?></th>
                                                                                    <td><?php echo e(isset($val->user_id) && !empty($val->user_id) ? mb_substr($val->userLastName . ' ' . $val->userFirstName . ' ' . $val->userMiddleName, 0, 14, 'UTF-8').'...' : ''); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('F.I.O')); ?></th>
                                                                                    <td><?php echo e($val->last_name . ' ' . $val->first_name . ' ' . $val->middle_name); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Phone number')); ?></th>
                                                                                    <td><?php echo e($val->phone); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Email')); ?></th>
                                                                                    <td><?php echo (($val->email) ? $val->email : '<span class="text-muted">'.translate('Not specified').'</span>') ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Status')); ?></th>
                                                                                    <td>
                                                                                        <a class="btn btn-success" href="<?php echo e(route('forthebuilder.deal.contract-show', [$val->deal_id])); ?>">
                                                                                            <?php echo e(translate('Making a deal')); ?>

                                                                                        </a>
                                                                                       
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Series number')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->series_number) ? $val->series_number : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Issued by')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->issued_by) ? $val->issued_by : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?> 
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Inn')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->inn) ? $val->inn : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Budget')); ?></th>
                                                                                    <td><?php echo e(round($val->budget*100)/100 ?? ''); ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('What is looking for')); ?></th>
                                                                                    <td>
                                                                                        <?php 
                                                                                            echo (($val->looking_for) ? $val->looking_for : '<span class="text-muted">'.translate('Not specified').'</span>') 
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><?php echo e(translate('Interested')); ?></th>
                                                                                    <td>
                                                                                        <?php
                                                                                            if(isset($val->flat_area)){
                                                                                                $areas = json_decode($val->flat_area);
                                                                                            }else{
                                                                                                $areas = '';
                                                                                            }
                                                                                        ?>
                                                                                        <?php if(isset($val->house_name)): ?>
                                                                                            <?php if(is_array($areas)): ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat">
                                                                                                    <?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number . ' flat: ' . $areas['total']); ?>

                                                                                                </button>
                                                                                            <?php else: ?>
                                                                                                <button class="btn btn-primary klientNameInformatsiaButtonKontactYellow" house_id="<?php echo e($val->house_id??'NULL'); ?>" house_flat_id = "<?php echo e($val->house_flat_id??'NULL'); ?>" client_id = "<?php echo e($val->client_id??'NULL'); ?>"
                                                                                                        id="interested_flat"><?php echo e($val->house_name . ': ' . translate('entrance') . $val->flat_entrance.' '.$val->flat_number.' flat'); ?>

                                                                                                </button>
                                                                                            <?php endif; ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo e(translate('Not specified')); ?>

                                                                                        <?php endif; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2">
                                                                                        <form action="<?php echo e(route('forthebuilder.clients.storePhoto')); ?>" method="POST" class="d-flex justify-content-around" style="padding: 4px 20px 0px 0px" enctype="multipart/form-data">
                                                                                            <?php echo csrf_field(); ?>
                                                                                            <?php echo method_field('POST'); ?>
                                                                                            <input type="hidden" name="deal_id" value="<?php echo e($val->deal_id); ?>">
                                                                                            <input type="hidden" name="client_id" value="<?php echo e($val->client_id); ?>">
                                                                                            <?php
                                                                                                $file_url = storage_path('app/public/uploads/client_show/' . $val->deal_id.'/'.$val->deal_file);
                                                                                                $file_ext = '';
                                                                                                if (!empty($val->deal_file)) {
                                                                                                    $file_ext_array = explode('.', $val->deal_file);
                                                                                                    $file_ext = strtolower($file_ext_array[1]);
                                                                                                }
                                                                                            ?>
                                                                                            <?php if(file_exists($file_url)): ?>
                                                                                                <?php if($file_ext != 'jpg' && $file_ext != 'jpeg' && $file_ext != 'png'): ?>
                                                                                                    <a href="<?php echo e(asset('storage/uploads/client_show/'.$val->deal_id.'/'.$val->deal_file)); ?>">
                                                                                                        <img class="inforMatsiyaClienti2MiniImage"
                                                                                                             src="<?php echo e(asset('/uploads/flat/pdf_icon.png')); ?>"
                                                                                                             alt="Image">
                                                                                                    </a>
                                                                                                <?php else: ?>
                                                                                                    <a href="<?php echo e(asset('storage/uploads/client_show/'.$val->deal_id.'/'.$val->deal_file)); ?>">
                                                                                                        <img class="inforMatsiyaClienti2MiniImage"
                                                                                                             src="<?php echo e(asset('storage/uploads/client_show/'.$val->deal_id.'/'.$val->deal_file)); ?>"
                                                                                                             alt="Image">
                                                                                                    </a>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                            <input name="store_file" type="file" style="padding-top: 10px" required>
                                                                                            <button class="inforMatsiyaClienti2MiniPlusButton btn btn-primary" type="submit">
                                                                                                <?php echo e(translate('Attach')); ?>

                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">

                                                            <div class="smsClient">
                                                                <?php
                                                                    $history_dates=[];
                                                                    $hist_data_array = null;
                                                                    $histories = json_decode($val->history);
                                                                    if (is_array($histories) || count($tasks)>0) {
                                                                        if(is_array($histories)){
                                                                            foreach($histories as $history) {
                                                                                $history_array = explode(' ', $history->date);
                                                                                $history_dates[] = strtotime($history_array[0]);
                                                                            }
                                                                        }
                                                                        if(count($tasks)>0){
                                                                            foreach ($tasks as $task_time) {
                                                                                if($task_time->deal_id == $val->deal_id){
                                                                                    $task_time_array = explode(' ', $task_time->created_at);
                                                                                    $history_dates[] = strtotime($task_time_array[0]);
                                                                                }
                                                                            }
                                                                        }
                                                                        if(count($chats)>0){
                                                                            foreach ($chats as $chat_time) {
                                                                                if($chat_time->deal_id == $val->deal_id){
                                                                                    $chat_time_array = explode(' ', $chat_time->created_at);
                                                                                    $history_dates[] = strtotime($chat_time_array[0]);
                                                                                }
                                                                            }
                                                                        }
                                                                        if (isset($history_dates) && is_array($history_dates)) {
                                                                            $history_dates_unique = array_unique($history_dates);
                                                                        }
                                                                        sort($history_dates_unique);
                                                                        foreach ($history_dates_unique as $dates_unique) {
                                                                            $hist_datas = [];
                                                                            $task_array = [];
                                                                            $chat_array = [];
                                                                            if(is_array($histories)){
                                                                                foreach ($histories as $hist) {
                                                                                    $hist_array = explode(' ', $hist->date);
                                                                                    if (strtotime($hist_array[0]) == $dates_unique) {
                                                                                        $hist_datas[] = $hist;
                                                                                    }
                                                                                }
                                                                            }
                                                                            if(count($tasks)>0){
                                                                                foreach ($tasks as $data_task) {
                                                                                    if($data_task->deal_id == $val->deal_id){
                                                                                        $task_date = explode(' ', $data_task->created_at);
                                                                                        if (strtotime($task_date[0]) == $dates_unique) {
                                                                                            $task_array[] = ['performer' => $data_task->performer->first_name . ' ' . $data_task->performer->last_name . ' ' . $data_task->performer->middle_name, 'title' => $data_task->title, 'type' => $data_task->type, 'id' => $data_task->id, 'answer' => $data_task->answer, 'created' => $data_task->created_at];
                                                                                        }
                                                                                    }

                                                                                }
                                                                            }
                                                                            if(count($chats)>0){
                                                                                foreach ($chats as $data_chat) {
                                                                                    if($data_chat->deal_id == $val->deal_id){
                                                                                        $chat_date = explode(' ', $data_chat->created_at);
                                                                                        if (strtotime($chat_date[0]) == $dates_unique) {
                                                                                            if($data_chat->userTo){
                                                                                                $user_to = $data_chat->userTo->first_name . ' ' . $data_chat->userTo->last_name . ' ' . $data_chat->userTo->middle_name;
                                                                                            }else{
                                                                                                $user_to = translate('everyone');
                                                                                            }

                                                                                            $chat_array[] = ['user_from' => $data_chat->userFrom->first_name . ' ' . $data_chat->userFrom->last_name . ' ' . $data_chat->userFrom->middle_name,
                                                                                                            'user_to' => $user_to, 'user_from_photo' => $data_chat->userFrom->avatar, 'user_from_id'=>$data_chat->userFrom->id,
                                                                                                            'text' => $data_chat->text, 'status' => $data_chat->message_status, 'created_at' => $data_chat->created_at];
                                                                                        }
                                                                                    }

                                                                                }
                                                                            }
                                                                            $hist_data_array[] = ['date' => $dates_unique, 'data' => $hist_datas, 'task' => $task_array, 'chats' => $chat_array];
                                                                        }
                                                                    } else {
                                                                        $hist_data_array = null;
                                                                    }
                                                                ?>
                                                                <div class="smsContainer border rounded p-2" id="smsContainer">
                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                        <h3>
                                                                            <span class="smsTime badge bg-info">
                                                                                <?php echo e(date('d.m.Y', strtotime($client->created_at))); ?>

                                                                            </span>    
                                                                        </h3>
                                                                        
                                                                    </div>
                                                                    <div class="smsSozdatKontakt text-center">
                                                                        <div class="">
                                                                            <i class="mdi mdi-clock-check-outline"></i>
                                                                            <?php echo e($client->created_at); ?>

                                                                        </div>
                                                                        <?php echo e($client->user ? $client->user->first_name : ''); ?>

                                                                        <?php echo e(translate('created contact') . ': ' . $data[0]->first_name ?? ''); ?>

                                                                        <b><?php echo e(' ' . $data[0]->last_name ?? ''); ?>

                                                                        <?php echo e(' ' . $data[0]->middle_name ?? ''); ?></b>
                                                                    </div>
                                                                    
                                                                    <?php if(isset($hist_data_array) && is_array($hist_data_array) && count($hist_data_array) > 0): ?>
                                                                        <?php $__currentLoopData = $hist_data_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $history_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <h3 class="d-flex justify-content-center align-items-center">
                                                                                <?php if(date('d.m.Y', $history_data['date']) != date('d.m.Y', strtotime('now')) &&
                                                                                        date('d.m.Y', $history_data['date']) != date('d.m.Y', strtotime('-1 days'))): ?>
                                                                                    <span class="smsTime badge bg-info"><?php echo e(date('d.m.Y', $history_data['date'])); ?></span>
                                                                                <?php elseif(date('d.m.Y', $history_data['date']) == date('d.m.Y', strtotime('-1 days'))): ?>
                                                                                    <span class="smsTime badge bg-info"><?php echo e(translate('Yesterday')); ?></span>
                                                                                <?php elseif(date('d.m.Y', $history_data['date']) == date('d.m.Y', strtotime('now'))): ?>
                                                                                    <span class="smsTime badge bg-info"><?php echo e(translate('Today')); ?></span>
                                                                                <?php endif; ?>
                                                                            </h3>
                                                                            <?php if(count($history_data['data'])>0): ?>
                                                                                <?php $__currentLoopData = $history_data['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data_h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <hr class="my-1">
                                                                                    <div class="d-flex">
                                                                                 <div class="img_box">
                                                                                    <?php if(isset($data_h->user_photo) && isset($data_h->new_type) && isset($data_h->old_type) &&
                                                                                            $data_h->new_type != '' && $data_h->old_type != ''): ?>
                                                                                        <?php
                                                                                            $sms_avatar = public_path('/uploads/user/' . $data_h->user_id . '/s_' . $data_h->user_photo);
                                                                                        ?>
                                                                                        <?php if(file_exists($sms_avatar)): ?>
                                                                                            <img class="smsAvatar img-fluid"
                                                                                                 src="<?php echo e(asset('/uploads/user/' . $data_h->user_id . '/s_' . $data_h->user_photo)); ?>"
                                                                                                 alt="Avatar">
                                                                                        <?php else: ?>
                                                                                            <img class="smsAvatar img-fluid"
                                                                                                 src="<?php echo e(asset('/backend-assets/img/men.png')); ?>"
                                                                                                 alt="Avatar">
                                                                                        <?php endif; ?>
                                                                                    <?php else: ?>
                                                                                         <img class="smsAvatar img-fluid" width="40px" 
                                                                                                 src="<?php echo e(asset('/backend-assets/img/men.png')); ?>"
                                                                                                 alt="Avatar">
                                                                                    <?php endif; ?>
                                                                                        </div>
                                                                                        <div class="smsData">
                                                                                            <div class="mt-2 mb-3">
                                                                                                <?php if(isset($data_h->new_type) && $data_h->new_type != ''): ?>
                                                                                                    
                                                                                                    <?php echo e(($data_h->date ?? '') . ' ' . ($data_h->user ?? '') . ' ' . translate('New stage')); ?>

                                                                                                    :
                                                                                                    <?php switch($data_h->new_type):
                                                                                                        case ('First contact'): ?>
                                                                                                        <span
                                                                                                                class="smsRedData badge bg-danger"><?php echo e(translate('First contact')); ?></span>
                                                                                                        <?php break; ?>

                                                                                                        <?php case ('Negotiation'): ?>
                                                                                                        <span
                                                                                                                class="smsYelloData badge bg-warning"><?php echo e(translate('Negotiation')); ?></span>
                                                                                                        <?php break; ?>

                                                                                                        <?php case ('Making a deal'): ?>
                                                                                                        <span
                                                                                                                class="smsGreenData badge bg-success"><?php echo e(translate('Making a deal')); ?></span>
                                                                                                        <?php break; ?>
                                                                                                    <?php endswitch; ?>
                                                                                                <?php endif; ?>
                                                                                                <?php if(isset($data_h->old_type) && $data_h->old_type != ''): ?>
                                                                                                    <?php echo e(translate('from')); ?>

                                                                                                    <?php switch($data_h->old_type):
                                                                                                        case ('First contact'): ?>
                                                                                                        <span
                                                                                                                class="smsRedData badge bg-danger"><?php echo e(translate('First contact')); ?></span>
                                                                                                        <?php break; ?>

                                                                                                        <?php case ('Negotiation'): ?>
                                                                                                        <span
                                                                                                                class="smsYelloData badge bg-warning"><?php echo e(translate('Negotiation')); ?></span>
                                                                                                        <?php break; ?>

                                                                                                        <?php case ('Making a deal'): ?>
                                                                                                        <span
                                                                                                                class="smsGreenData badge bg-success"><?php echo e(translate('Making a deal')); ?></span>
                                                                                                        <?php break; ?>
                                                                                                    <?php endswitch; ?>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>

                                                                            <?php if($history_data['task']): ?>
                                                                                <?php $__currentLoopData = $history_data['task']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($task_data['answer'] == null): ?>
                                                                                    <hr class="my-2">
                                                                                        <div class="smsBlueDataRed_icon">
                                                                                            <div class="d-flex">
                                                                                                <div class="img_box">
                                                                                                    <img class="smsVerifed img-fluid"
                                                                                                         src="<?php echo e(asset('/backend-assets/forthebuilders/images/redTIme.png')); ?>"
                                                                                                         alt="Avatar">
                                                                                                </div>
                                                                                                <div class="smsBlueText openAnswer">
                                                                                                    <?php echo e($task_data['created']); ?> <?php echo e(translate('for')); ?>

                                                                                                    <?php echo e($task_data['performer']); ?> <br>
                                                                                                    <b><?php echo e($task_data['type']); ?>:
                                                                                                        <?php echo e($task_data['title']); ?></b>
                                                                                                </div>
                                                                                            </div>
                                                                                            <form
                                                                                                    action="<?php echo e(route('forthebuilder.task.answer')); ?>"
                                                                                                    method="POST">
                                                                                                <?php echo csrf_field(); ?>
                                                                                                <?php echo method_field('PUT'); ?>
                                                                                                <input type="hidden" name="task_id"
                                                                                                       value="<?php echo e($task_data['id']); ?>">
                                                                                                <input class="my-1 form-control add_rezultat d-none answer_input"
                                                                                                       name="answer" type="text"
                                                                                                       placeholder="Добавить результат">
                                                                                                <div class="answer_button d-none"
                                                                                                     style="display: flex; justify-content: end; align-items: flex-end;">
                                                                                                    <button class="btn btn-success smsPrimichenia">Выполнить</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        
                                                                                    <?php else: ?>
                                                                                        <hr class="my-2">
                                                                                        <div class="smsBlueData d-flex">
                                                                                            <div class="img_box_round me-2">
                                                                                                <img class="smsVerifed img-fluid"
                                                                                                     src="<?php echo e(asset('/backend-assets/forthebuilders/images/Group105.png')); ?>"
                                                                                                     alt="Avatar">
                                                                                            </div>
                                                                                            <div class="smsBlueText w-100">
                                                                                                <?php echo e($task_data['created']); ?> <?php echo e(translate('for')); ?>

                                                                                                <?php echo e($task_data['performer']); ?> <br>
                                                                                                <b><del><?php echo e($task_data['type']); ?>:
                                                                                                        <?php echo e($task_data['title']); ?></del></b>
                                                                                                <b><?php echo e($task_data['answer']); ?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                            <?php if($history_data['chats']): ?>
                                                                                <?php $__currentLoopData = $history_data['chats']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if(isset($chat_data['text'])&& $chat_data['text'] != null): ?>
                                                                                        <div class="d-flex mt-2">
                                                                                            <div>
                                                                                                <?php if(isset($chat_data['user_from_photo'])): ?>
                                                                                                    <img class="smsAvatar img-fluid" width="40px" 
                                                                                                         src="<?php echo e(asset('/uploads/user/' . $chat_data['user_from_id'] . '/s_' . $chat_data['user_from_photo'])); ?>"
                                                                                                         alt="Avatar">
                                                                                                <?php else: ?>
                                                                                                    <img class="smsAvatar img-fluid" width="40px" 
                                                                                                         src="<?php echo e(asset('/backend-assets/img/men.png')); ?>"
                                                                                                         alt="Avatar">
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <div class="smsData">
                                                                                                <?php
                                                                                                    $chat_data_array = explode(' ', $chat_data['created_at']);
                                                                                                    switch($chat_data_array[0]){
                                                                                                        case date('Y-m-d', strtotime('now')):
                                                                                                            $chat_time_ = 'Today';
                                                                                                            break;
                                                                                                        case date('Y-m-d', strtotime('-1 days')):
                                                                                                            $chat_time_ = 'Yesterday';
                                                                                                            break;
                                                                                                        default:
                                                                                                                $chat_time_ = $chat_data_array[0];
                                                                                                    }
                                                                                                ?>
                                                                                                <?php echo e($chat_time_); ?> <?php echo e(translate('from')); ?>: <?php echo e($chat_data['user_from']); ?>: <?php echo e($chat_data['user_to']); ?> <br> <b><?php echo e($chat_data['text']); ?></b>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                                
                                                                <form action="<?php echo e(route('forthebuilder.task.calendar_store')); ?>"
                                                                      method="POST" enctype="multipart/form-data"
                                                                      id="chees-modal">
                                                                    <div class="d-none smsMiniBlueData modalTask">
                                                                        <?php echo csrf_field(); ?>
                                                                        <?php echo method_field('POST'); ?>
                                                                        <div class="d-flex justify-content-end mt-2">
                                                                            <a class="smsZadacha d-none smsChat btn btn-outline-danger">
                                                                                <i class="mdi mdi-forum-outline me-2"></i>
                                                                                <?php echo e(translate('Chat')); ?>

                                                                            </a>
                                                                        </div>
                                                                        <input list="dealId" name="deal_id" id="dealId"
                                                                               autocomplete="off" type="hidden" value="<?php echo e($deal_id); ?>">
                                                                        <input name="is_task" autocomplete="off" type="hidden"
                                                                               value="1">
                                                                        <input name="client_id" autocomplete="off" type="hidden"
                                                                               value="<?php echo e($client->id); ?>">
                                                                        <div class="add-task mt-2">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input name="task_date_2" id="task_date2" type="text"
                                                                                       class="choise-date form-control <?php $__errorArgs = ['task_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error-data-input is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                                       value="<?php echo e(date('d.m.Y H:i')); ?>" >
                                                                                    <span id="show_task_date"></span>    
                                                                                </div>
                                                                                
                                                                                <div class="col">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <select name="performer_id" id="performer_id"
                                                                                            data-placeholder="<?php echo e(__('locale.select')); ?>"
                                                                                            class="form-control select_client_show_1 <?php $__errorArgs = ['performer_id'];
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
                                                                                    <a href="#" class="choise-manager d-none"></a>
                                                                                    <a href="#" class="choise-phone d-none"> </a>
                                                                                </div>
                                                                                <div class="col">
                                                                                    
                                                                                    <select name="type" id="type" data-placeholder="<?php echo e(__('locale.select')); ?>"
                                                                                            class="form-control select_client_show_2 <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid error-data-input <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                                                                        <option value="Связаться"><?php echo e(translate('Call')); ?>

                                                                                        </option>
                                                                                        <option value="Встреча"><?php echo e(translate('Meeting')); ?>

                                                                                        </option>
                                                                                    </select>   
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <textarea row="4" placeholder="<?php echo e(translate('Description')); ?>" required class="form-control task_title" name="task_title" rows="1"></textarea>
                                                                        <div class="d-flex justify-content-end mt-2">
                                                                            <button class="smsZadacha task_put_button btn btn-outline-primary">
                                                                                <i class=" far fa-save me-2"></i>
                                                                                <?php echo e(translate('Put')); ?>

                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="smsBigBlue">

                                                                    <div class="textare"  id="textarea">
                                                                        <div class="btn-group my-3 dropup w-100" id="chat_input">
                                                                            <div class="chatButton d-flex align-items-center w-100" id="chatButton">


                                                                            </div>
                                                                        </div>
                                                                        <div contenteditable="false" class="d-flex align-items-center justify-content-center btn btn-outline-success textareaButttonSend">
                                                                            <span class="smsZadacha smsTask w-100 h-100">
                                                                                <i class="far fa-edit me-2"></i>
                                                                                <?php echo e(translate('Task')); ?>

                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <?php $k++; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>
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
                                  action="<?php echo e(route('forthebuilder.clients.storeBudget', $client->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="deal_id" id="deal_id" value="<?php echo e($data[0]->deal_id); ?>">
                                <input type="hidden" name="personal_id" id="personal_id" value="<?php echo e($data[0]->personal_id); ?>">
                                <div>
                                    <input type="hidden" id="budget_input_hidden">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="budget_checkbox">
                                        <label class="form-check-label sozdatJkSpisokH3722" for="budget_checkbox">
                                            <?php echo e(translate('Budget')); ?>

                                        </label>
                                    </div>

                                    <input type="integer" name="budget" class="modalMiniCapsule text-left form-control" id="budget_input" required>
                                </div>
                                <div class="mt-3">
                                    <input type="hidden" id="looking_for_hidden">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="looking_for_checkbox">
                                        <label class="form-check-label sozdatJkSpisokH3722" for="looking_for_checkbox">
                                            <?php echo e(translate('What is looking for')); ?> 
                                        </label>
                                    </div>
                                    
                                    <input type="text" name="looking_for" class="modalMiniCapsule2 text-left form-control" id="looking_for_input" required>
                                </div>
                                <div class="mt-3">

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" value="" id="password_checkbox">
                                        <label class="form-check-label sozdatJkSpisokH3722" for="password_checkbox">
                                            <?php echo e(translate('Passport data')); ?>

                                        </label>
                                    </div>

                                    <input type="text" placeholder="<?php echo e(translate('Series and number')); ?>" name="series_number"
                                           class="modalMiniCapsule4 text-left client-show-modal-series password_input form-control mb-2" value=""
                                           required>
                                    <input type="text" placeholder="<?php echo e(translate('Issued by')); ?>" name="issued_by"
                                           class="modalMiniCapsule4 text-left client-show-modal-issued password_input form-control mb-2" required>
                                    <input type="text" placeholder="<?php echo e(translate('PINFL or TIN')); ?>" name="inn"
                                           class="modalMiniCapsule4 text-left client-show-modal-inn password_input form-control mb-2" required>

                                    
                                    <?php if($house_flat != ''): ?>
                                        <input type="hidden" value="<?php echo e($house_flat->house_id); ?>" name="house_id" id="model_house_id">
                                        <input type="hidden" value="<?php echo e($house_flat->id); ?>" name="house_flat_id" id="model_house_flat_id">
                                        <div class="d-flex">
                                            <span class="plusFlexModalInformationDobavitCvartir">
                                                <?php echo e($house_flat->house->name . ' ' . $house_flat->number_of_flat . '-flat'); ?>

                                            </span>
                                        </div>

                                        <div class="d-flex">
                                            <a class="btn btn-success waves-effect waves-light plusFlexModalInformation" id="adding_flat">
                                                <span class="btn-label">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="plusFlexModalInformationDobavitCvartir">
                                                    <?php echo e(translate('Change apartment')); ?>

                                                </span>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <input type="hidden" name="house_id" id="model_house_id">
                                        <input type="hidden" name="house_flat_id" id="model_house_flat_id">
                                        <div class="d-flex">
                                            <span class="plusFlexModalInformationDobavitCvartir" id="model_interested_flat"></span>
                                        </div>

                                        <div class="d-flex">
                                            <a class="btn btn-primary waves-effect waves-light plusFlexModalInformation" id="adding_flat">
                                                <span class="btn-label">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <span class="plusFlexModalInformationDobavitCvartir">
                                                    <?php echo e(translate('Add apartment')); ?>

                                                </span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="deal_status_content mt-3">
                                        <input type="hidden" name="type" id="deal_status_value" value="1">
                                        <a class="status_first_contact btn btn-outline-info" id="selected_deal_status">
                                            <?php echo e(translate('First contact')); ?>

                                        </a>
                                        
                                        <div class="deal_status d-none">
                                            <button type="submit" value="<?php echo e(Constants::FIRST_CONTACT); ?>" class="status_first_contact btn btn-danger mb-2" id="first_contact_id" type="submit">
                                                <?php echo e(translate('First contact')); ?>

                                            </button>
                                            <button value="<?php echo e(Constants::NEGOTIATION); ?>" class="status_negotiation btn btn-warning mb-2" id="negotiation_id" type="submit">
                                                <?php echo e(translate('Negotiation')); ?>

                                            </button>
                                            <a value="<?php echo e(Constants::MAKE_DEAL); ?>" class="status_making_a_deal btn btn-success" id="making_a_deal_id" client_id="<?php echo e($client->id); ?>" type="submit">
                                               <?php echo e(translate('Making a deal')); ?>

                                            </a>
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




    

    <div class="modal fade" id="deleteClient" tabindex="-1" role="dialog" aria-labelledby=""
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none;">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno"><?php echo e(translate('Do you really want to delete')); ?></h4>
                    <div class="d-flex justify-content-center mt-3">
                        <?php if(count($data) > 0): ?>
                            <form  action="<?php echo e(route('forthebuilder.clients.destroy', $data[0]->client_id)); ?>"
                                   method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="me-2 btn btn-outline-success modalVideystvitelnoDa"><?php echo e(translate('Yes')); ?></button>
                            </form>
                            <button class="btn btn-outline-danger modalVideystvitelnoNet" data-dismiss="modal"><?php echo e(translate('No')); ?></button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


    <div class="modal fade" id="select_flat_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="box-shadow: 0 0 100px #ccc;">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="modalVideystvitelno" id="select_flat_modal_title"><?php echo e(translate('Please select flat before making a deal')); ?></h4>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="modalVideystvitelnoDa btn btn-success" data-dismiss="modal"><?php echo e(translate('Yes')); ?></button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="d-none" id="backdrop"></div>
    <script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src='<?php echo e(asset('/datetimepicker-master/build/jquery.datetimepicker.full.min.js')); ?>'></script>
    <script>
        $.datetimepicker.setLocale('ru');
        $('#task_date2').datetimepicker({
            format:'d.m.Y H:i'
        });
    </script>
    <script>
        $(function(){
            $('.select_client_show_1').select2()
            $('.select_client_show_2').select2()
        })


        let page_name = 'clients';
        let budget_checkbox = document.getElementById('budget_checkbox')
        let budget_input = document.getElementById('budget_input')
        let budget_input_hidden = document.getElementById('budget_input_hidden')
        let looking_for_checkbox = document.getElementById('looking_for_checkbox')
        let looking_for_input = document.getElementById('looking_for_input')
        let looking_for_hidden = document.getElementById('looking_for_hidden')
        let adding_flat = document.getElementById('adding_flat')
        let example_modal = document.getElementById('exampleModal_client')
        let backdrop = document.getElementById('backdrop')
        let password_checkbox = document.getElementById('password_checkbox')
        let password_input = document.getElementsByClassName('password_input')
        let dealId = document.getElementById('dealId')
        let deals_id = document.getElementById('deal_id')
        let personal_id = document.getElementById('personal_id')
        let making_a_deal_id = document.getElementById('making_a_deal_id')
        let selected_deal_status = document.getElementById('selected_deal_status')
        let deal_status = document.getElementsByClassName('deal_status')
        let first_contact_id = document.getElementById('first_contact_id')
        let negotiation_id = document.getElementById('negotiation_id')
        let deal_status_value = document.getElementById('deal_status_value')
        let modalMiniCapsule = document.getElementsByClassName('modalMiniCapsule')
        let modalMiniCapsule2 = document.getElementsByClassName('modalMiniCapsule2')
        let modalMiniCapsule4 = document.getElementsByClassName('modalMiniCapsule4')
        let store_budget_modal = document.getElementById('store_budget_modal')
        let client_show_change = document.getElementsByClassName('client-show-change-status')
        let modal_task = document.getElementsByClassName('modalTask')
        let chatButton = document.getElementsByClassName('chatButton')
        let smsTask = document.getElementsByClassName('smsTask')
        let smsChat = document.getElementsByClassName('smsChat')
        let performer_id = document.getElementById('performer_id')
        let type = document.getElementById('type')
        let calling_or_meeting = document.getElementById('calling_or_meeting')
        let choise_manager = document.getElementsByClassName('choise-manager')
        let choise_phone = document.getElementsByClassName('choise-phone')
        let client_info_click = document.getElementsByClassName('clientInfoClick')
        let open_answer = document.getElementsByClassName('openAnswer')
        let answer_input = document.getElementsByClassName('answer_input')
        let answer_button = document.getElementsByClassName('answer_button')
        let show_task_date = document.getElementById('show_task_date')
        // let task_date = document.getElementById('task_date')
        let task_put_button = document.getElementsByClassName('task_put_button')
        let sms_big_blue = document.getElementsByClassName('smsBigBlue')
        let textarea = document.getElementById('textarea')
        let house_flat = document.getElementById('house_flat')
        let interested_flat = document.getElementById('interested_flat')
        let model_interested_flat = document.getElementById('model_interested_flat')
        let house_id = "<?php echo e($house_flat->house_id?? 'no'); ?>"
        let call_png = '<?php echo e(asset('/backend-assets/forthebuilders/images/Call.png')); ?>'
        let meeting_png = '<?php echo e(asset('/backend-assets/forthebuilders/images/meeting.png')); ?>'
        let select_flat_modal_title = document.getElementById('select_flat_modal_title')
        let please_select_flat = "<?php echo e(translate('Please select flat before making a deal')); ?>"
        let please_fill_all_input = "<?php echo e(translate('Please fill all the information')); ?>"
        let status_making_a_deal = "<?php echo e(translate('you already have the status of making a deal')); ?>"
        let status_first_contact = "<?php echo e(translate('you already have the status of first contact')); ?>"
        let status_negotiation = "<?php echo e(translate('you already have the status of negotiation')); ?>"
        let model_house_flat_id = document.getElementById('model_house_flat_id')
        let button_deal_status = 1
        // const backdrop = document.createElement("div")
        if (budget_checkbox.checked != true) {
            budget_input.setAttribute('disabled', true)
            budget_input.value = ''
        }
        // task_date.addEventListener('change', function () {
        //     show_task_date.innerText = this.value
        // })
        textarea.addEventListener('change', function(){
            console.log(this.innerHtml)
        })
        if(interested_flat != undefined){
            if(model_interested_flat != undefined){
                model_interested_flat.innerHTML = interested_flat.innerText
                model_house_flat_id.value = interested_flat.getAttribute('house_flat_id');
            }
        }
        budget_checkbox.addEventListener('change', function() {
            if (budget_checkbox.checked != true) {
                budget_input.setAttribute('disabled', true)
                budget_input.value = ''
            } else {
                budget_input.removeAttribute('disabled')
                if (localStorage.getItem('budget') != null) {
                    budget_input.value = localStorage.getItem('budget')
                } else {
                    budget_input.value = budget_input_hidden.value
                }
            }
        });
        for (let i = 0; i < open_answer.length; i++) {
            open_answer[i].addEventListener('click', function() {
                if (answer_input[i].classList.contains('d-none')) {
                    answer_input[i].classList.remove('d-none')
                } else {
                    answer_input[i].classList.add('d-none')
                }
                if (answer_button[i].classList.contains('d-none')) {
                    answer_button[i].classList.remove('d-none')
                } else {
                    answer_button[i].classList.add('d-none')
                }
            })
        }
        for (let i = 0; i < smsTask.length; i++) {
            smsTask[i].addEventListener('click', function () {
                if (chatButton[i].classList.contains('d-none') == false) {
                    chatButton[i].classList.add('d-none')
                }
                if (sms_big_blue[0].classList.contains('d-none') == false) {
                    sms_big_blue[0].classList.add('d-none')
                }
                if (modal_task[i].classList.contains('d-none') == true) {
                    modal_task[i].classList.remove('d-none')
                }
                if (task_put_button[i].classList.contains('d-none') == true) {
                    task_put_button[i].classList.remove('d-none')
                }
                if (smsTask[i].classList.contains('d-none') == false) {
                    smsTask[i].classList.add('d-none')
                }
                if (smsChat[i].classList.contains('d-none') == true) {
                    smsChat[i].classList.remove('d-none')
                }
            })
            smsChat[i].addEventListener('click', function () {
                if (chatButton[i].classList.contains('d-none') == true) {
                    chatButton[i].classList.remove('d-none')
                }
                if (sms_big_blue[0].classList.contains('d-none') == true) {
                    sms_big_blue[0].classList.remove('d-none')
                }
                if (modal_task[i].classList.contains('d-none') == false) {
                    modal_task[i].classList.add('d-none')
                }
                if (task_put_button[i].classList.contains('d-none') == false) {
                    task_put_button[i].classList.add('d-none')
                }
                if (smsChat[i].classList.contains('d-none') == false) {
                    smsChat[i].classList.add('d-none')
                }
                if (smsTask[i].classList.contains('d-none') == true) {
                    smsTask[i].classList.remove('d-none')
                }
            })
        }
        choise_manager[0].addEventListener('click', function(e) {
            e.preventDefault();
            performer_id.classList.remove('d-none');
            performer_id.size = 10;
        })
        performer_id.addEventListener("click", function() {
            // this.classList.add('d-none');
            choise_manager[0].innerHTML = this.options[this.selectedIndex].textContent
        });
        choise_phone[0].addEventListener('click', function(e) {
            e.preventDefault();
            // type.classList.remove('d-none');
            // type.size = 2;
        })
        type.addEventListener("change", function() {
            // this.classList.add('d-none');
            // if (this.options[this.selectedIndex].textContent == 'Meeting') {
            //     calling_or_meeting.setAttribute('src', meeting_png)
            // }
            // if (this.options[this.selectedIndex].textContent == 'Call') {
            //     calling_or_meeting.setAttribute('src', call_png)
            // }
            // choise_phone[0].innerHTML = this.options[this.selectedIndex].textContent
        });

        if (looking_for_checkbox.checked != true) {
            looking_for_input.setAttribute('disabled', true)
            budget_input.value = ''
        }
        looking_for_checkbox.addEventListener('change', function() {
            if (looking_for_checkbox.checked != true) {
                looking_for_input.setAttribute('disabled', true)
                looking_for_input.value = ''
            } else {
                looking_for_input.removeAttribute('disabled')
                if (localStorage.getItem('looking_for') != null) {
                    looking_for_input.value = localStorage.getItem('looking_for')
                } else {
                    looking_for_input.value = looking_for_hidden.value
                }
            }
        });
        if (adding_flat != null) {
            adding_flat.addEventListener('click', function() {
                localStorage.setItem('budget', budget_input.value)
                localStorage.setItem('looking_for', looking_for_input.value)
                localStorage.setItem('series_number', password_input[0].value)
                localStorage.setItem('issued_by', password_input[1].value)
                localStorage.setItem('inn', password_input[2].value)
                localStorage.setItem('deal_id', deals_id.value)
                localStorage.setItem('personal_id', personal_id.value)
                window.location.href = "<?php echo e(route('forthebuilder.client.house', $client->id)); ?>";
            })
        }
        if (house_flat == "") {
            localStorage.removeItem('budget')
            localStorage.removeItem('looking_for')
            localStorage.removeItem('series_number')
            localStorage.removeItem('issued_by')
            localStorage.removeItem('inn')
            localStorage.removeItem('deal_id')
            localStorage.removeItem('personal_id')
        }

        for (let j = 0; j < client_show_change.length; j++) {
            if (client_show_change[j] != undefined) {
                button_deal_status = client_show_change[j].getAttribute('deal_status')
                client_show_change[j].addEventListener('click', function() {

                    button_deal_status = this.getAttribute('deal_status')
                    deals_id.value = this.getAttribute('deal_id')
                    personal_id.value = this.getAttribute('personal_id')

                    // if (backdrop.classList.contains('d-none') == true) {
                        $('#select_flat_modal2').modal('toggle')
                        //backdrop.classList.remove('d-none')
                    // }
                    // if (store_budget_modal.classList.contains('d-none') == true) {
                        // $('#select_flat_modal2').modal('toggle')
                        //store_budget_modal.classList.remove('d-none')
                    // }
                });
            }
        }
        for (let j = 0; j < client_info_click.length; j++) {
            if (client_info_click[j] != undefined) {
                dealId.value = client_info_click[j].getAttribute('deal_id')
                client_info_click[j].addEventListener('click', function() {
                    if (localStorage.getItem('budget') != null) {
                        budget_input.value = localStorage.getItem('budget')
                    }
                    if (localStorage.getItem('looking_for') != null) {
                        looking_for_input.value = localStorage.getItem('looking_for')
                    }
                    if (localStorage.getItem('series_number') != null) {
                        password_input[0].value = localStorage.getItem('series_number')
                    }
                    if (localStorage.getItem('issued_by') != null) {
                        password_input[1].value = localStorage.getItem('issued_by')
                    }
                    if (localStorage.getItem('inn') != null) {
                        password_input[2].value = localStorage.getItem('inn')
                    }
                    if (localStorage.getItem('deal_id') != null) {
                        deals_id.value = localStorage.getItem('deal_id')
                    }
                    if (localStorage.getItem('personal_id') != null) {
                        personal_id.value = localStorage.getItem('personal_id')
                    }
                    dealId.value = this.getAttribute('deal_id')
                });
            }
        }
        backdrop.addEventListener('click', function() {
            if (backdrop.classList.contains('d-none') == false) {
                backdrop.classList.add('d-none')
            }
            if (store_budget_modal.classList.contains('d-none') == false) {
                store_budget_modal.classList.add('d-none')
            }
        })
        if (localStorage.getItem('budget') != null || localStorage.getItem('looking_for') != null ||
            localStorage.getItem('series_number') != null || localStorage.getItem('issued_by') != null || localStorage
                .getItem('inn') != null) {
            if (budget_input.hasAttribute('disabled')) {
                budget_input.removeAttribute('disabled')
                budget_checkbox.checked = true
            }
            if (looking_for_input.hasAttribute('disabled')) {
                looking_for_input.removeAttribute('disabled')
                looking_for_checkbox.checked = true
            }
            if (backdrop.classList.contains('d-none') == true) {
                backdrop.classList.remove('d-none')
            }
            if (store_budget_modal.classList.contains('d-none') == true) {
                store_budget_modal.classList.remove('d-none')
            }

        }
        if (localStorage.getItem('budget') != null) {
            budget_input.value = localStorage.getItem('budget')
        }
        if (localStorage.getItem('looking_for') != null) {
            looking_for_input.value = localStorage.getItem('looking_for')
        }
        if (localStorage.getItem('series_number') != null) {
            password_input[0].value = localStorage.getItem('series_number')
        }
        if (localStorage.getItem('issued_by') != null) {
            password_input[1].value = localStorage.getItem('issued_by')
        }
        if (localStorage.getItem('inn') != null) {
            password_input[2].value = localStorage.getItem('inn')
        }
        if (localStorage.getItem('deal_id') != null) {
            deals_id.value = localStorage.getItem('deal_id')
        }
        if (localStorage.getItem('personal_id') != null) {
            personal_id.value = localStorage.getItem('personal_id')
        }
        selected_deal_status.addEventListener('click', function() {

            if (deal_status[0].classList.contains('d-none')) {
                deal_status[0].classList.remove('d-none')
            } else {
                deal_status[0].classList.add('d-none')
            }
        });
        making_a_deal_id.addEventListener('click', function(event) {
            if(button_deal_status != 3){
                if (making_a_deal_id != undefined) {
                    if (interested_flat != undefined && interested_flat.getAttribute('house_flat_id') != 'NULL' &&
                        interested_flat.getAttribute('house_id') && interested_flat.getAttribute('client_id') != 'NULL') {

                        if (budget_input.value != "" && looking_for_input.value != "" && modalMiniCapsule4[0].value != ""
                            && modalMiniCapsule4[1].value != "" && modalMiniCapsule4[2].value != "") {
                            if (making_a_deal_id.hasAttribute('data-toggle')) {
                                making_a_deal_id.removeAttribute('data-toggle')
                            }
                            if (making_a_deal_id.hasAttribute('data-target')) {
                                making_a_deal_id.removeAttribute('data-target')
                            }
                            localStorage.setItem('model_budget', budget_input.value)
                            localStorage.setItem('model_looking_for', looking_for_input.value)
                            localStorage.setItem('model_series_number', password_input[0].value)
                            localStorage.setItem('model_issued_by', password_input[1].value)
                            localStorage.setItem('model_inn', password_input[2].value)
                            localStorage.setItem('model_deal_id', deals_id.value)
                            localStorage.setItem('model_personal_id', personal_id.value)
                            localStorage.removeItem('budget')
                            localStorage.removeItem('looking_for')
                            localStorage.removeItem('series_number')
                            localStorage.removeItem('issued_by')
                            localStorage.removeItem('inn')
                            localStorage.removeItem('deal_id')
                            localStorage.removeItem('personal_id')
                            location.replace("/forthebuilder/deal/edit?house_flat_id=" + interested_flat.getAttribute('house_flat_id') +
                                "&client_id=" + interested_flat.getAttribute('client_id') + "&deal_id=" + deals_id.value);
                        } else {
                            select_flat_modal_title.innerHTML = please_fill_all_input
                            making_a_deal_id.setAttribute('data-toggle', "modal")
                            making_a_deal_id.setAttribute('data-target', "#select_flat_modal")
                        }
                        budget_checkbox.checked = true
                        looking_for_checkbox.checked = true
                        password_checkbox.checked = true
                        selected_deal_status.classList.add('status_making_a_deal')
                        selected_deal_status.innerText = this.textContent
                        if (selected_deal_status.classList.contains('status_first_contact')) {
                            selected_deal_status.classList.remove('status_first_contact')
                        }
                        if (selected_deal_status.classList.contains('status_negotiation')) {
                            selected_deal_status.classList.remove('status_negotiation')
                        }
                        deal_status[0].classList.add('d-none')
                        deal_status_value.value = this.getAttribute('value')
                        budget_input.setAttribute('required', '')
                        if (budget_input.hasAttribute('disabled')) {
                            budget_input.removeAttribute('disabled')
                        }
                        if (looking_for_input.hasAttribute('disabled')) {
                            looking_for_input.removeAttribute('disabled')
                        }
                        looking_for_input.setAttribute('required', '')
                        modalMiniCapsule4[0].setAttribute('required', '')
                        modalMiniCapsule4[1].setAttribute('required', '')
                        modalMiniCapsule4[2].setAttribute('required', '')
                        if (modalMiniCapsule4[0].hasAttribute('disabled')) {
                            modalMiniCapsule4[0].removeAttribute('disabled')
                        }
                        if (modalMiniCapsule4[1].hasAttribute('disabled')) {
                            modalMiniCapsule4[1].removeAttribute('disabled')
                        }
                        if (modalMiniCapsule4[2].hasAttribute('disabled')) {
                            modalMiniCapsule4[2].removeAttribute('disabled')
                        }
                    } else {
                        select_flat_modal_title.innerHTML = please_select_flat
                        making_a_deal_id.setAttribute('data-toggle', "modal")
                        making_a_deal_id.setAttribute('data-target', "#select_flat_modal")
                    }
                }
            }else{
                select_flat_modal_title.innerHTML = status_making_a_deal
                making_a_deal_id.setAttribute('data-toggle', "modal")
                making_a_deal_id.setAttribute('data-target', "#select_flat_modal")
            }
        });
        first_contact_id.addEventListener('click', function(event) {
            if(parseInt(button_deal_status) != 1){
                selected_deal_status.classList.add('status_first_contact')
                selected_deal_status.innerText = this.textContent
                if (selected_deal_status.classList.contains('status_making_a_deal')) {
                    selected_deal_status.classList.remove('status_making_a_deal')
                }
                if (selected_deal_status.classList.contains('status_negotiation')) {
                    selected_deal_status.classList.remove('status_negotiation')
                }
                deal_status[0].classList.add('d-none')
                deal_status_value.value = this.getAttribute('value')
                if (budget_input.hasAttribute('required')) {
                    budget_input.removeAttribute('required')
                }
                if (looking_for_input.hasAttribute('required')) {
                    looking_for_input.removeAttribute('required')
                }
                if (modalMiniCapsule4[0].hasAttribute('required')) {
                    modalMiniCapsule4[0].removeAttribute('required')
                }
                if (modalMiniCapsule4[1].hasAttribute('required')) {
                    modalMiniCapsule4[1].removeAttribute('required')
                }
                if (modalMiniCapsule4[2].hasAttribute('required')) {
                    modalMiniCapsule4[2].removeAttribute('required')
                }
            }else{
                event.preventDefault()
                select_flat_modal_title.innerHTML = status_first_contact
                first_contact_id.setAttribute('data-toggle', "modal")
                first_contact_id.setAttribute('data-target', "#select_flat_modal")
            }
        });
        negotiation_id.addEventListener('click', function(event) {
            if(parseInt(button_deal_status) != 2){
                selected_deal_status.classList.add('status_negotiation')
                selected_deal_status.innerText = this.textContent
                if (selected_deal_status.classList.contains('status_first_contact')) {
                    selected_deal_status.classList.remove('status_first_contact')
                }
                if (selected_deal_status.classList.contains('status_making_a_deal')) {
                    selected_deal_status.classList.remove('status_making_a_deal')
                }
                deal_status[0].classList.add('d-none')
                deal_status_value.value = this.getAttribute('value')
                if (budget_input.hasAttribute('required')) {
                    budget_input.removeAttribute('required')
                }
                if (looking_for_input.hasAttribute('required')) {
                    looking_for_input.removeAttribute('required')
                }
                if (modalMiniCapsule4[0].hasAttribute('required')) {
                    modalMiniCapsule4[0].removeAttribute('required')
                }
                if (modalMiniCapsule4[1].hasAttribute('required')) {
                    modalMiniCapsule4[1].removeAttribute('required')
                }
                if (modalMiniCapsule4[2].hasAttribute('required')) {
                    modalMiniCapsule4[2].removeAttribute('required')
                }
            }else{
                event.preventDefault()
                select_flat_modal_title.innerHTML = status_negotiation
                negotiation_id.setAttribute('data-toggle', "modal")
                negotiation_id.setAttribute('data-target', "#select_flat_modal")
            }
        });
    </script>


    
         <script>


            $(document).on('keyup', '#message_area', function(e) {
                        e.preventDefault()
                        if(e.which == 13) {
                            $('#send_button').trigger('click')
                        }
            });


            // var conn = new WebSocket('ws://95.130.227.39:8080/?token=<?php echo e(auth()->user()->token); ?>');

            var conn = new WebSocket('ws://162.55.134.175:1213/?token=<?php echo e(auth()->user()->token); ?>');
            // http://127.0.0.1/

            var from_user_id = "<?php echo e(Auth::user()->id); ?>";

            var to_user_id = "";

            conn.onopen = function(e) {
                console.log("new connection ");

                // load_connected_chat_user(from_user_id);
                make_chat_area(user_id, to_user_name);


            };


            function make_chat_area(user_id, to_user_name)
            {
                var html = `
                <div class="input-group">
                    <input type="text" class="chatIsThreeInput mt-0" id="message_area" placeholder="<?php echo e(translate("quick response")); ?>">
                    <button type="button" class="btn btn-success d-none" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
                </div>
                `;



                // document.getElementById('chat_header').innerHTML = `<button type="button" id="close_chat" class="btn  float-end group_chat" onclick="make_chat_area(`+user_id+`, '`+to_user_name+`'); load_chat_data(`+from_user_id+`, `+user_id+`);">`+to_user_name+`</button>`;

                document.getElementById('Chat_real_time').innerHTML = html;
                // // document.getElementById('close_chat_group').style.backgroundColor="#17a2b8";
                // // document.getElementById('close_chat').style.backgroundColor="#92b0e8";

                // document.getElementById('close_chat_group').style.backgroundColor="#94B2EB";
                // document.getElementById('close_chat_group').style.color="#ffffff";
                // document.getElementById('close_chat').style.backgroundColor="#ffffff";
                // document.getElementById('close_chat').style.color="#000000";


                // document.getElementById('chat_header').innerHTML = '<b>'+to_user_name+'</b>';

                // document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

                to_user_id = user_id;
            }


         </script> 





    <script>

        // var chat_deal_id=getElementById('chat_deal_id');
        // var document.getElementById("chat_deal_id");
        let deal_id=document.getElementById('chat_deal_id').value;
        chat_client_id=document.getElementById('chat_client_id').value;

        $(document).on('keyup', '#message_area', function(e) {
            e.preventDefault()
            if(e.which == 13) {
                $('#send_button').trigger('click')
            }
        });


        // var conn = new WebSocket('ws://127.0.0.1:8080/?token=<?php echo e(auth()->user()->token); ?>');


        var from_user_id = "<?php echo e(Auth::user()->id); ?>";

        var to_user_id = "";

        // var chat_deal_id=getElementById('chat_deal_id');
        // console.log(chat_deal_id);
        // console.log('fsefse');

        conn.onopen = function(e) {
            console.log("Connection established!");

            make_chat_area();
        };
        conn.onmessage = function(e) {

            console.log(e.data);

            var data = JSON.parse(e.data);



            if(data.deal_chat_message)
            {
                console.log('camne');
                console.log(data);
                var html = '';

                if(data.from_user_id == from_user_id)
                {
                    html += `
                    <div class="smsBlueDataRed_icon mt-2">
                        <div class="d-flex">
                            <div>
                                `
                    if(data.sender_connection.avatar== null)
                    {
                        user_image = `<img class="smsVerifed" src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" width="35" class="rounded-circle" />`
                    }
                    else{
                        user_image = `<img class="smsVerifed" src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection.avatar+`" width="35" class="rounded-circle" />`
                    }

                    html += `
                                `+user_image+`
                                <b>

                                </b>
                               </div>

                                <div class="smsBlueText openAnswer">



                                    `+data.time+` `+data.sender_connection.first_name+` `+data.sender_connection.last_name+`
                                    
                                    <b>
                                        `+data.deal_chat_message+`
                                    </b>
                                </div>

                        </div>
                    </div>
                        `;


                }
                else
                {
                    // console.log(to_user_id);
                    // if(to_user_id != '')
                    // {




                    html += `
                    <div class="smsBlueDataRed_icon mt-2">
                        <div class="d-flex">
                            <div>
                                `
                    if(data.sender_connection.avatar== null)
                    {
                        user_image = `<img class="smsVerifed" src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" width="35" class="rounded-circle" />`
                    }
                    else{
                        user_image = `<img class="smsVerifed" src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection.avatar+`" width="35" class="rounded-circle" />`
                    }

                    html += `
                                `+user_image+`
                                <b>

                                </b>
                               </div>

                                <div class="smsBlueText openAnswer">



                                    `+data.time+`,`+data.sender_connection.first_name+`,`+data.sender_connection.last_name+`
                                    
                                    <b>
                                        `+data.deal_chat_message+`
                                    </b>
                                </div>

                        </div>
                    </div>
                        `;



                    // html += `
                    // <div class="row">
                    //         <div class="row">
                    //             <div class="col-md-2">
                    //             `
                    // if(data.sender_connection.avatar== null)
                    // {
                    //     user_image = `<img src="<?php echo e(asset('/backend-assets/img/men.png')); ?>" width="35" class="rounded-circle" />`
                    // }
                    // else{
                    //     user_image = `<img src="<?php echo e(asset('uploads/user/')); ?>/`+data.from_user_id+`/s_`+data.sender_connection.avatar+`" width="35" class="rounded-circle" />`
                    // }



                    // html += `
                    // &nbsp; `+user_image+`
                    //             </div>
                    //             <div class="col-md-10">
                    //                 <b>
                    //                    `+data.sender_connection.first_name+`,`+data.sender_connection.last_name+`
                    //                 </b> <br>
                    //                 `+data.deal_chat_message+`
                    //                 <span style="float:right">`+data.time+`</span>
                    //             </div>
                    //         </div>
                    // </div>
                    // `;




                }

                if(html != '')
                {
                    var previous_chat_element = document.querySelector('#smsContainer');

                    var chat_history_element = document.querySelector('#smsContainer');

                    chat_history_element.innerHTML = previous_chat_element.innerHTML + html;
                    // scroll_top();
                }

            }




            // console.log(data);

            // console.log($data);
            // console.log("Connection established!");

            // make_chat_area();
        };




        function make_chat_area()
        {
            var html = `
            <b class="smsInputText chat_group rounded px-2"><?php echo e(translate('Chat:')); ?></b>

            <div class="input-group">
                <input type="text" class=" mt-0 form-control" id="message_area"> 
                <button type="button" class="btn btn-success d-none" id="send_button" onclick="send_chat_message()"><i class="fas fa-paper-plane"></i></button>
            </div>
            `;



            // document.getElementById('chat_header').innerHTML = `<button type="button" id="close_chat" class="btn btn-info btn-sm float-end" onclick="make_chat_area(`+user_id+`, '`+to_user_name+`'); load_chat_data(`+from_user_id+`, `+user_id+`);">`+to_user_name+`</button>`;
            document.getElementById('chatButton').innerHTML = html;


            // document.getElementById('smsBigBlue').append(html);
            // document.getElementById('close_chat_group').style.backgroundColor="#17a2b8";
            // document.getElementById('close_chat').style.backgroundColor="#92b0e8";


            // document.getElementById('chat_header').innerHTML = '<b>'+to_user_name+'</b>';

            // document.getElementById('close_chat_area').innerHTML = '<button type="button" id="close_chat" class="btn btn-danger btn-sm float-end" onclick="close_chat();"><i class="fas fa-times"></i></button>';

            to_user_id = chat_client_id;
        }



        function send_chat_message()
        {
            // console.log();
            document.querySelector('#send_button').disabled = true;

            var message = document.getElementById('message_area').value.trim();

            var data = {
                from_user_id : from_user_id,
                to_user_id : to_user_id,
                message : message,
                deal_id : deal_id,
                type : 'deal_request_send_message'
            };
            console.log(data);

            conn.send(JSON.stringify(data));

            document.querySelector('#message_area').value = '';

            document.querySelector('#send_button').disabled = false;
        }


        // function send_chat_message()
        // {
        //     // console.log();
        //     document.querySelector('#send_button').disabled = true;

        //     var message = document.getElementById('message_area').value.trim();

        //     var data = {
        //         from_user_id : from_user_id,
        //         to_user_id : to_user_id,
        //         message : message,
        //         deal_id : deal_id,
        //         type : 'deal_request_send_message'
        //     };
        //     console.log(data);

        //     conn.send(JSON.stringify(data));

        //     document.querySelector('#message_area').value = '';

        //     document.querySelector('#send_button').disabled = false;
        // }

        


    </script>

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/icstroyc/admin.icstroy.com/Modules/ForTheBuilder/Resources/views/clients/show.blade.php ENDPATH**/ ?>