<?php $__env->startSection('content'); ?>
    <h2>Log in</h2>
    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors->all() as $error): ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('login')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <table>
            <tr>
                <td>
                    <label for="">Email:</label>
                </td>
                <td>
                    <input type="email" name="email" placeholder="a@a.com" value="<?php echo e(old('email')); ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Password:</label>
                </td>
                <td>
                    <input type="password" name="password" placeholder="password" >
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="send">
                </td>
            </tr>
        </table>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>