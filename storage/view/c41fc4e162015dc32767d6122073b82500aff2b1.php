 <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr >
 <td><?php echo e($account['name']); ?></td>
 <td><?php echo e($account['email']); ?></td>
 <td><?php echo e($account['phone']); ?></td>
 <td><?php echo e($account['address']); ?></td>
 <?php if($account['role'] == 0): ?>
 <td class="<?php echo e($account['role']); ?>">Bác sĩ</td>
 <?php else: ?>
 <td class="<?php echo e($account['role']); ?>">Người quản trị</td>
 <?php endif; ?>
 <?php if($account['status'] == 0): ?>
 <td class="<?php echo e($account['status']); ?>"><span class="label-default label label-danger">Không hoạt động</span></td>
 <?php else: ?>
 <td class="<?php echo e($account['status']); ?>"><span class="label-success label label-default">Hoạt động</span></td>
 <?php endif; ?>
 <td>
 <button type="button" class="btn btn-info btn-xs edit" id="<?php echo e($account['id']); ?>"><i class="fa fa-pencil"></i>
 </button>
 <button type="button" class="btn btn-danger btn-xs delete" id="<?php echo e($account['id']); ?>"><i class="fa fa-trash-o"></i>
 </button>
 </td>
 </tr>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/tableaccount.blade.php ENDPATH**/ ?>