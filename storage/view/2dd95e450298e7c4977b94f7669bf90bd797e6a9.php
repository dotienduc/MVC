<?php $__currentLoopData = $schedule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
	<td><?php echo e($row['name']); ?></td>
	<?php $__currentLoopData = $specialist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($value->id == $row['id_specialist']): ?>
	<td><?php echo e($value->name_specialist); ?></td>
	<?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<td><?php echo e($row['weeksday']); ?></td>
	<td><span class="glyphicon glyphicon-time"></span><?php echo e($row['work_time']); ?></td>
	<td>
		<button class="btn btn-info btn-xs btn-edit " id="<?php echo e($row['id_timeserving']); ?>" title="<?php echo e($row['id_doctor']); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
		<button class="btn btn-danger btn-xs delete" id="<?php echo e($row['id_timeserving']); ?>" title="<?php echo e($row['id_doctor']); ?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
	</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/tableschedule.blade.php ENDPATH**/ ?>