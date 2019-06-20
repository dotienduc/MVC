 <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr class="doctor">
 <td><img src="../img/team/<?php echo e($doctor['image']); ?>" class="img-circle" alt="User Image" height="50" width="50"></td>
 <td class="search"><?php echo e($doctor['name']); ?></td>
 <td class="search"><?php echo e($doctor['name_specialist']); ?></td>
 <td class="search"><?php echo e($doctor['email']); ?></td>
 <td class="search"><?php echo e($doctor['phone']); ?></td>
 <td><?php echo e($doctor['address']); ?></td>
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="<?php echo e($doctor['id_doctor']); ?>"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo e($doctor['id_doctor']); ?>"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/TableDoctor.blade.php ENDPATH**/ ?>