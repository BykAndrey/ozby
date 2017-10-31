<?php $__env->startSection('content'); ?>
    <h2><?php echo e($good->name); ?></h2>
    <p>The selling by <i><?php echo e($good->getSeller()); ?></i>. Updated at: <?php echo e($good->updated_at->format('d-M-Y')); ?></p>
    <div class="container-fluid">
        <div class="card row">
            <div class="image col-md-6">
                <img src="<?php echo e(URL::asset('static/images/goods/'.$good->image)); ?>" alt="">
            </div>

            <div class="info col-md-6">
                <div class="price">
                   Price:  <?php echo e($good->price); ?> bel.rub.
                </div>
                <div class="price">
                    Count:  <?php echo e($good->count); ?>

                </div>
                <div class="description">
                    Description: <?php echo e($good->description); ?>

                </div>

            </div>
            <?php if(isset($user)): ?>
            <?php if($user->id!=$good->id_user): ?>
                <form id="formaddtocart" class="col-lg-12" method="get" action="<?php echo e(route('addtocart')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="id" value="<?php echo e($good->id); ?>">
                    <input type="number" name="count" min="1" max="<?php echo e($good->count); ?>" value="1">
                    <input  id="addtocart" type="submit" value="BUY">
                </form>
                <div id="comment" class="col-md-12" style="color: #9e0505; text-align: right"></div>
            <?php endif; ?>
                <?php endif; ?>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>