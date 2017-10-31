<?php $__env->startSection('tab'); ?>
    <h2>Edit good</h2>
    <?php echo $__env->make('good.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>