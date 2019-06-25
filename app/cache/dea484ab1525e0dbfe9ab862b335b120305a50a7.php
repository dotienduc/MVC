<form class="col-sm-12" id="edit-form" method="POST" enctype="multipart/form-data">
  <?php $__currentLoopData = $detailOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="form-group">
    <label>Tên khách hàng</label>
    <span id="customer_name"><?php echo e($row['fname']); ?> <?php echo e($row['lname']); ?></span>
  </div>
  <div class="form-group">
    <label>Địa chỉ</label>
    <span id="customer_name"><?php echo e($row['address']); ?></span>
  </div>
  <div class="form-group">
    <label>Số điện thoại</label>
    <span id="customer_name"><?php echo e($row['phone']); ?></span>
  </div>
  <div class="form-group">
    <label>Email</label>
    <span id="customer_name"><?php echo e($row['email']); ?></span>
  </div>
  <div class="form-group">
    <label>Ghi chú</label>
    <span id="customer_name"><?php echo e($row['note']); ?></span>
  </div>
  <?php
    break;
  ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody id="list_product">
        <?php
        $total = 0;
        ?>
        <?php $__currentLoopData = $detailOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
          <td><?php echo e($row['product_name']); ?></td>
          <td><?php echo e($row['quantity']); ?></td>
          <td><?php echo e($row['price']); ?></td>
          <td><?php echo e($row['quantity'] * $row['price']); ?></td>
          <?php
            $total = $total + ( $row['quantity'] * $row['price'] );
          ?>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>Total: </td>
        <td><?php $total; ?></td>
      </tr>
    </tbody>
  </table>
</form><?php /**PATH C:\xampp\htdocs\mvc\app\views\admin\dataAjax/DetailOrder.blade.php ENDPATH**/ ?>