<?php
    use Modules\ForTheBuilder\Entities\House;
    use Modules\ForTheBuilder\Entities\Constants; 

?>
<?php $__env->startSection('title'); ?>
    <?php echo e(translate('JK')); ?>

<?php $__env->stopSection(); ?>
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
                    <div class="row w-100 m-0">
                        <div class="col-md-6 d-flex align-items-center">
                            <a href="<?php echo e(route('forthebuilder.user.report')); ?>" class="plus2 profileMaxNazadInformatsiyaKlient">
                                <i class="mdi mdi-keyboard-backspace mdi-20"></i>
                            </a>
                            <h4 class="ms-2">
                                <?php if($status == 'report-clients'): ?>
                                    <?php echo e(translate('Report on clients')); ?>

                                <?php elseif($status == 'report-deals'): ?>
                                    <?php echo e(translate('Report on deals')); ?>

                                <?php else: ?>
                                    <?php echo e(translate('Report on houses')); ?>

                                <?php endif; ?>
                            </h4>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            <div class="miniSearchDiv5 ms-2">
                                <ion-icon class="miniSearchIconInput md hydrated" name="search-outline" role="img"
                                    aria-label="search outline"></ion-icon>
                                <input placeholder="<?php echo e(translate('Search by objects')); ?>" class="miniInputSdelka5 searchTable form-control"
                                    type="text">
                            </div>
                            <a target="_blank" href="<?php echo e(route('forthebuilder.exports.export-all')); ?>" class="btn btn-outline-success btn-xs ms-2">
                                <i class="mdi mdi-microsoft-excel mdi-20"></i>
                            </a>
                        </div>
                    </div>    
                    
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <table id="tech-companies-1" class="table table-striped table-sm mb-0">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th><?php echo e(translate('house_name')); ?></th>
                                <th><?php echo e(translate('corpas')); ?></th>
                                <th><?php echo e(translate('info')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($models)): ?>
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr style="cursor: pointer;" data-href="<?php echo e(route('forthebuilder.user.report-clients-index', $model->id)); ?>" class="jkMiniData mt-1 hideData">
                                        <td>
                                            <input type="hidden" class="hiddenData"
                                            value="<?php echo e($model->name); ?> <?php echo e($model->corpus); ?> <?php echo e($model->description); ?>">
                                            <?php
                                                if ($status == 'report-clients') {
                                                    $house_url = route('forthebuilder.user.report-clients-index', [$model->id]);
                                                }
                                                elseif($status == 'report-deals'){
                                                    $house_url = route('forthebuilder.user.report-deals-index', [$model->id]);
                                                }
                                                else{
                                                    $house_url = route('forthebuilder.user.report-houses-index', [$model->id]);   
                                                }
                                            ?>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivInput jkNumberInputChick text-primary">
                                                <?php echo e($models->firstItem() + $key); ?>

                                            </a>
                                        </td>
                                        <td>
                                             <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput text-primary">
                                                <?php echo e($model->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput2 text-primary">
                                                <?php if(!empty($model->corpus)): ?>
                                                    <?php echo e($model->corpus); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($house_url); ?>" class="checkboxDivTextInput48 text-primary">
                                                <?php echo e($model->description); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <br>
                    <?php echo e($models->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
    <script>
        let page_name = 'report-clients';
        $(document).on('click','tbody tr',function(){
            location.href = $(this).attr('data-href')
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/report-clients.blade.php ENDPATH**/ ?>