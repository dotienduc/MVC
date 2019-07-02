 <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr >
 	<td><?php echo e($question['name']); ?></td>
 	<td><?php echo e($question['email']); ?></td>
 	<td><?php echo e($question['subject']); ?></td>
 	<td><?php echo e($question['message']); ?></td>
 	<?php if( $question['status'] == 0 ): ?>
 	<td >Chưa trả lời</td>
 	<?php endif; ?>
 	<td>
 		<a href="../QuestionController/formQuestion/<?php echo e($question['id']); ?>">
 			<button type="button" class="btn btn-info btn-xs edit" id="<?php echo e($question['id']); ?>"><i class="fa fa-pencil"></i>
 			</button>
 		</a>
 		<button type="button" class="btn btn-danger btn-xs delete" id="<?php echo e($question['id']); ?>"><i class="fa fa-trash-o"></i>
 		</button>
 	</td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/tablequestion.blade.php ENDPATH**/ ?>