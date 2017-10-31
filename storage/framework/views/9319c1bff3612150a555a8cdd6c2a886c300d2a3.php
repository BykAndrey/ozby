<?php $__env->startSection('tab'); ?>
    <h2>Listing my sales</h2>
    <table class="list">
        <tr>
            <td>
                Image
            </td>
            <td>
                Name
            </td>
            <td>
                Price
            </td>
            <td>
                Count
            </td>
            <td>
                Updated
            </td>
            <td>
                Shopper info
            </td>
        </tr>
        <?php foreach($goods as $good): ?>

            <tr>
                <td>
                    <img src="<?php echo e(URL::asset('static/images/goods/'.$good->getGood()->image)); ?>" width="150px" alt="">
                </td>
                <td>
                    <?php echo e($good->getGood()->name); ?>

                </td>
                <td>
                       <?php echo e($good->price); ?> bel.rub.
                </td>
                <td>
                    <?php echo e($good->count); ?>

                </td>
                <td>
                    <?php echo e($good->updated_at->format('d-M-Y')); ?>

                </td>
                <td>
                    <?php $sel=$good->getShopper();?>
                    <?php echo e($sel->email); ?><br>
                    <?php echo e($sel->phone); ?><br>
                    <?php echo e($sel->name); ?><br>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>