 <?php $__currentLoopData = $appointents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr >
 <td><?php echo e($appointent['first_name']); ?> <?php echo e($appointent['last_name']); ?></td>
 <td><?php echo e($appointent['email']); ?></td>
 <td><?php echo e($appointent['phone']); ?></td>
 <td><?php echo e($appointent['message']); ?></td>
<td class="<?php echo e($appointent['id_doctor']); ?>"><?php echo e($appointent['name']); ?></td>
<td class="<?php echo e($appointent['id_timeserving']); ?>"><?php echo e($appointent['weeksday']); ?> <?php echo e($appointent['work_time']); ?></td>
<td class="<?php echo e($appointent['id_subject']); ?>"><?php echo e($appointent['name_specialist']); ?></td>
 <?php if($appointent['status'] == 0): ?>
 <td class="<?php echo e($appointent['status']); ?>"><span class="label-default label label-danger" id="<?php echo e($appointent['id']); ?>">Chờ</span></td>
 <?php else: ?>
 <td class="<?php echo e($appointent['status']); ?>"><span class="label-success label label-default" id="<?php echo e($appointent['id']); ?>">Duyệt</span></td>
 <?php endif; ?>
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="<?php echo e($appointent['id']); ?>"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo e($appointent['id']); ?>"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/tableappointent.blade.php ENDPATH**/ ?>