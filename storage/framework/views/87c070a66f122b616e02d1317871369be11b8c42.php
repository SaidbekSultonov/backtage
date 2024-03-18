<?php use Modules\ForTheBuilder\Entities\Constants; ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('forthebuilder::layouts.content.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('forthebuilder::layouts.content.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid py-3 px-2">
            <div class="card">
                <div class="card-body p-2">
                    <div class="row align-items-center w-100 m-0">
                        <div class="col-md-9 d-flex align-items-center">
                            <h4 class="me-2">
                                <?php echo e(translate('Sales')); ?>

                            </h4>
                            
                        </div>
                        
                        <div class="col-md-3 text-end">
                            <a class="btn btn-outline-primary" href="<?php echo e(route('forthebuilder.deal.printContract', $models->deal_id)); ?>">
                                <i class="mdi mdi-printer"></i>
                                <span><?php echo e(translate('Print')); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4><?php echo e(translate('Description of the object')); ?></h4>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <th><?php echo e(translate('Deal object')); ?></th>
                                    <td> <?php echo e($models->house_name ?? ''); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Number house')); ?></th>
                                    <td>
                                        <?php echo e($models->house_number ?? ''); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Sum')); ?></th>
                                    <td><?php echo e($models->price_sell ? number_format($models->price_sell,0,'',' ') : ''); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Number of flat')); ?></th>
                                    <td>
                                        <a href="<?php echo e(route('forthebuilder.house-flat.show', $models->house_flat_id)); ?>">
                                            <?php echo e($models->number_of_flat); ?>

                                        </a> 
                                    </td>
                                </tr>

                                <tr>
                                    <th><?php echo e(translate('Floor')); ?></th>
                                    <td><?php echo e($models->floor); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Room count')); ?></th>
                                    <td><?php echo e($models->room_count); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Description')); ?></th>
                                    <td><?php echo e($models->description); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Contact number')); ?></th>
                                    <td><?php echo e($models->contract); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Date deal')); ?></th>
                                    <td><?php echo e(date('d.m.Y',strtotime($models->date_deal))); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Price in words')); ?></th>
                                    <td><?php echo e($models->price_sell_word); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Price m2')); ?></th>
                                    <td><?php echo e(number_format($models->price_sell_m2,0,'',' ')); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Discount')); ?></th>
                                    <td><?php echo e($models->discount); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <h4><?php echo e(translate('Passport data of the client')); ?></h4>
                            <table class="table table-sm table-striped">
                                <tr>
                                    <th><?php echo e(translate('F.I.O. Clients')); ?></th>
                                    <td>
                                        <a href="<?php echo e(route('forthebuilder.clients.show', [$models->client_id, '0', '0'])); ?>">
                                            <?php echo e($models->client_id ? $models->client_first_name . ' ' . $models->client_last_name . ' ' . $models->client_middle_name : ''); ?>

                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Passport series number')); ?></th>
                                    <td><?php echo e($models->series_number); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Passport given date')); ?></th>
                                    <td><?php echo e(date('d.m.Y',strtotime($models->given_date))); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Issued by')); ?></th>
                                    <td><?php echo e($models->issued_by); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Registration by passport')); ?></th>
                                    <td><?php echo e($models->live_address); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('PINFL or TIN')); ?></th>
                                    <td><?php echo e($models->inn); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Phone number')); ?></th>
                                    <td><?php echo e($models->phone); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Additional phone number')); ?></th>
                                    <td><?php echo e($models->additional_phone); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(translate('Email address')); ?></th>
                                    <td><?php echo e($models->email); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-6">
                            <h4><?php echo e(translate('Areas flat')); ?></h4>
                            <table class="table table-sm table-striped">
                                <?php if(!empty($models->areas)): ?> 
                                    <?php $__currentLoopData = json_decode($models->areas); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($value)): ?>
                                        <tr>
                                            <th class="text-capitalize"><?php echo e(translate($key)); ?></th>
                                            <td><?php echo e($value); ?> <?php echo e(translate('m2')); ?> </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </table>        
                        </div>
                        <div class="col-6">
                            <?php if(!empty($models->installment_plan_id)): ?>
                                <h4><?php echo e(translate('Installment plan')); ?></h4>
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <th><?php echo e(translate('Installment period')); ?></th>
                                        <td>
                                                
                                             <?php
                                                if(isset($model->period) && $model->period->period != 0){
                                                    echo $model->period->period;
                                                }
                                                elseif(isset($model->installmentPlan)){
                                                    echo $model->installmentPlan->period;
                                                }

                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(translate('Installment percent')); ?></th>
                                        <td><?php echo e($models->percent_type); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(translate('An initial fee')); ?></th>
                                        <td><?php echo e(number_format($models->initial_fee,0,'',' ')); ?></td>
                                    </tr>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>






                
                
<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/contract-show.blade.php ENDPATH**/ ?>