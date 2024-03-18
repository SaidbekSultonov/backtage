<table class="table table-striped table-sm table-bordered">
	<thead>
		<tr>
			<th>№</th>
			<th><?php echo e(translate('Full name')); ?></th>
			<th><?php echo e(translate('Phone')); ?></th>
		</tr>	
	</thead>
	<tbody>
		<?php if(!empty($models) && count($models) > 0): ?> <?php $i = 1; ?>
			<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($i++); ?></td>
					<td>
						<a href="<?php echo e(route('forthebuilder.clients.show',[$value->client_id,0,0])); ?>">
							<?php echo e((($value->client) ? $value->client->last_name.' '.$value->client->first_name.' '.$value->client->middle_name : '')); ?>

						</a>
					</td>
					<td>
						<a href="<?php echo e(route('forthebuilder.clients.show',[$value->client_id,0,0])); ?>">
							<?php echo e((($value->client) ? $value->client->phone : '')); ?>

						</a>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<tr>
				<td colspan="3" class="text-center">
					<i>
						<?php echo e(translate('No data!')); ?>

					</i>
				</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/user/view-data.blade.php ENDPATH**/ ?>