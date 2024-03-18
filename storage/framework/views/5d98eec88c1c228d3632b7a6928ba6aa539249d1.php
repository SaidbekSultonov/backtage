<table class="table table-striped table-sm">
	<thead>
		<tr>
			<th>№</th>
			<th><?php echo e(translate('File')); ?></th>
			<th><?php echo e(translate('Date')); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if(!empty($files)): ?> <?php $i = 1; ?>
			<?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($i); ?></td>
					<td>
						<a href="<?php echo e(asset('/uploads/client_show/'.$value->deal_id.'/'.$value->guid)); ?>" target="_blank">
							<?php echo e($value->name); ?>

						</a>
					</td>
					<td>
						<?php echo e(date('d.m.Y H:i', strtotime($value->created_at))); ?>

					</td>
				</tr>
			<?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<tr>
				<td colspan="3"><?php echo e(translate('No files')); ?></td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
<?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/clients/all-files-ajax.blade.php ENDPATH**/ ?>