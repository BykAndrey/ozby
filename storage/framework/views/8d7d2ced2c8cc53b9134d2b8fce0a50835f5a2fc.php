<?php $__env->startSection('content'); ?>
<h2>Home page</h2>
<h3>Listing active goods</h3>
    <div class="sorting">Sort by:

        <a href="<?php echo e(route('home',['orderby'=>'name','direct'=>'asc'])); ?>">Name ↑ </a>    |
        <a href="<?php echo e(route('home',['orderby'=>'name'])); ?>">Name ↓ </a>    |

        <a href="<?php echo e(route('home',['orderby'=>'price','direct'=>'asc'])); ?>">Price ↑</a>    |
        <a href="<?php echo e(route('home',['orderby'=>'price'])); ?>">Price ↓</a>    |

        <a href="<?php echo e(route('home',['orderby'=>'updated_at','direct'=>'asc'])); ?>">Updated ↑</a>|
        <a href="<?php echo e(route('home',['orderby'=>'updated_at'])); ?>">Updated ↓</a>

    </div>
    <div class="listingItem">
        <?php foreach($goods as $g): ?>
            <div class="item">
                <a  href="<?php echo e(route('card',['id'=>$g->id])); ?>">
                    <div class="image" style="background-image: url('/static/images/goods/<?php echo e($g->image); ?>')"></div>
                </a>
                <a href="<?php echo e(route('card',['id'=>$g->id])); ?>"><?php echo e($g->name); ?></a><br>
                <span class="price">Price: <?php echo e($g->price); ?> bel.rub.</span><br>
                <span class="price">Updated: <?php echo e($g->updated_at->format('d-M-Y')); ?></span>
            </div>
            <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>