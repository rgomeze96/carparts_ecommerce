

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="text-center text-uppercase text-secondary mb-0"><?php echo e(__('home.portfolio')); ?></h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
            <!-- Portfolio Item 1-->
            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-5">
                <div class="card text-secondary font-weight-bold">
                    <div class="card-header text-center bg-light border-secondary">
                        <h5><a class="text-secondary"
                                href="<?php echo e(route('product.show', $product->getId())); ?>"><?php echo e($product->getName()); ?></a></h5>
                        <div><?php echo e(__('home.brand')); ?>: <?php echo e($product->getBrand()); ?></div>
                    </div>
                    <div class="card-img">
                        <a href="<?php echo e(route('product.show', $product->getId())); ?>"><img class="card-img"
                                style="height: 180px;" src="<?php echo e(asset($product->getImagePath())); ?>" alt="" /></a>
                    </div>
                    <div class="card-body text-center">
                        <h5><?php echo e(__('home.price')); ?>: $<?php echo e(number_format($product->getSalePrice(),2, '.', ',')); ?></h5><br>

                        <a href="<?php echo e(route('product.addToCart', $product->getId())); ?>"><button
                                class="btn btn-primary"><?php echo e(__('product.list.addToCart')); ?></button></a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- About Section-->
<section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">
        <!-- About Section Heading-->
        <h2 class="text-center text-uppercase text-white"><?php echo e(__('home.toolTitle')); ?></h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- About Section Content-->
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <p class="lead"><?php echo e(__('home.toolParagraph1')); ?></p>
            </div>
            <div class="col-lg-4 mr-auto">
                <p class="lead"><?php echo e(__('home.toolParagraph2')); ?></p>
            </div>
        </div>
        <!-- About Section Button-->
        <div class="text-center mt-4">
            <a href="<?php echo e(route('product.list', ['categoryFilter' => 'Tool'])); ?>">
                <button class="btn btn-outline-light"><?php echo e(__('home.toolButton')); ?></button>
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/home/index.blade.php ENDPATH**/ ?>