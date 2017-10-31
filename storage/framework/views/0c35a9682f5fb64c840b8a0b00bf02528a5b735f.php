<?php $__env->startSection('content'); ?>

    <h2>Cart</h2>
    <div class="cart">
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
                   Delete
                </td>
            </tr>
            <?php foreach($goods as $good): ?>
                <tr id="good_<?php echo e($good->id_good); ?>" class="good">
                    <td>
                        <img src="<?php echo e(URL::asset('static/images/goods/'.$good->getGood()->image)); ?>" width="150px" alt="">
                    </td>
                    <td>
                       <?php echo e($good->getGood()->name); ?>

                    </td>

                    <td>
                        <?php echo e($good->getGood()->price); ?> bel.rub.
                    </td>
                    <td>
                        <a  id="cart_less"  href="#" value="<?php echo e($good->id_good); ?>" title="less"><<</a>
                        <span id="count"><?php echo e($good->count); ?></span>
                        <a id="cart_more"  href="#" value="<?php echo e($good->id_good); ?>" title="more">>></a>
                    </td>
                    <td>
                        <a href="<?php echo e(route('deletegood',['id'=>$good->id_good])); ?>">Delete</a>
                    </td>

                </tr>

            <?php endforeach; ?>
        </table>
        <h4 id="allprice"> <?php echo e($allprice); ?> bel.rub.</h4>
        <?php if($allprice>0): ?>
            <form action="<?php echo e(route('buy')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

                <input type="submit" value="Buy!">
            </form>

            <?php endif; ?>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>