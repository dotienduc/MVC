<?php $__currentLoopData = $listComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Blog Comments -->
<div class="row blog-comments margin-bottom-30">
    <div class="col-sm-2">
        <img src="../../img/blog/a2.jpg" alt="">
    </div>
    <div class="col-sm-10">
        <div class="comment">
            <h5>
                <?php echo e($comment['comment_sender_name']); ?>

                <span><?php echo e($comment['date']); ?> / <a href="#" class="reply" id="<?php echo e($comment['id']); ?>">Reply</a></span>
            </h5>
            <p><?php echo e($comment['comment']); ?></p>
        </div>
    </div>
</div>
<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($value['parent_commnet_id'] == $comment['id']): ?>
<!-- Blog Comments -->
<div class="row blog-comments blog-comments-reply margin-bottom-30">
    <div class="col-sm-2">
        <img src="../../img/blog/a1.jpg" alt="">
    </div>
    <div class="col-sm-10">
        <div class="comment">
            <h5>
                <?php echo e($value['comment_sender_name']); ?>

                <span><?php echo e($value['date']); ?></span>
            </h5>
            <p><?php echo e($value['comment']); ?></p>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- End Blog Comments -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- End Blog Comments -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\home\dataAjax/loadDataComment.blade.php ENDPATH**/ ?>