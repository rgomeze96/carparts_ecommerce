

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col m-2">
        <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card border-secondary m-2">
            <div class="card-header text-center">
                <?php if(count($data["products"]) > 0) : ?>
                <h1><?php echo e(__('product.showCart.yourCart')); ?> <?php echo e(count($data["products"])); ?>

                    <?php echo e(__('product.showCart.product')); ?>(s)
                </h1>
                <?php else: ?>
                <h3><?php echo e(__('product.showCart.emptyCart')); ?><a style="color: #800000" href="<?php echo e(route('product.list')); ?>">
                        <?php echo e(__('product.showCart.here')); ?></a></h3>
                <?php endif; ?>
                <h5><?php echo e(__('product.showCart.balance')); ?> $<?php echo e(number_format($data["user"]->getBalance(), 2, '.', ',')); ?></h5>
            </div>
            <div class="card-body">
                <div class="container text-center">
                    <?php $__currentLoopData = $data["products"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row mx-auto">
                        <a class="mx-auto" href="<?php echo e(route('product.show', $product->getId())); ?>">
                            <img style="max-height: 250px; max-width: 250px" class="rounded rounded-circle"
                                src="<?php echo e(asset($product->getImagePath())); ?>" alt="<?php echo e($product->getId()); ?>">
                        </a>
                    </div>
                    <h5><?php echo e($product->getName()); ?></h5>
                    <h5>$<?php echo e(number_format($product->getSalePrice(), 2, '.', ',')); ?></h5>
                    <a href="<?php echo e(route('product.deleteFromCart', $product->getId())); ?>"><button
                            class="btn btn-outline-secondary"><?php echo e(__('product.showCart.deleteFromCart')); ?></button></a>
                    <hr class="border-secondary">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($data["products"]) > 0) : ?>
                    <h3 class="text-primary"><?php echo e(__('product.showCart.total')); ?>

                        $<?php echo e(number_format($data["products"]->sum('sale_price'), 2, '.', ',')); ?></h3>
                    <p><a href="<?php echo e(route('product.buy')); ?>"><button
                                class="btn btn-success"><?php echo e(__('product.showCart.buy')); ?></button></a></p>
                    <p><a href="<?php echo e(route('product.deleteAllCart')); ?>"><button
                                class="btn btn-danger"><?php echo e(__('product.showCart.deleteAllCart')); ?></button></a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**
                                                                                                                                      * 
                                                                                                                                      * PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/product/showCart.blade.php ENDPATH
                                                                                                                                      **/ ?>
