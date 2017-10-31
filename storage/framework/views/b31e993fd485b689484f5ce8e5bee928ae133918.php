<?php $__env->startSection('content'); ?>

<h2>Profile <?php echo e($user->name); ?></h2>
    <div><a href="<?php echo e(route('profile')); ?>">Info</a> | <a href="<?php echo e(route('listgoods')); ?>">Listing my goods</a> | <a href="<?php echo e(route('creategood')); ?>">Create good</a> | <a href="<?php echo e(route('listsalesprofile')); ?>">My Sales</a> | <a href="<?php echo e(route('listpurchaseprofile')); ?>">My Purchases</a></div>
    <div class="profile">
        <?php echo $__env->yieldContent('tab'); ?>
    </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>