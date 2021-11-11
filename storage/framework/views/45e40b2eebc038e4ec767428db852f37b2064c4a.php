

<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <h3><?php echo e($data["title"]); ?></h3>
    <hr class="border-secondary">
    <div class="row">
        <div class="col-md-2 mt-2">
            <h5><?php echo e(__('product.list.filters')); ?>: </h5>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="<?php echo e(route('product.list', ['nameFilter' => request()->nameFilter])); ?>">
                <?php echo e(csrf_field()); ?>

                <label hidden for="nameFilter"></label>
                <input onchange="this.form.submit()" type="text" id="nameFilter" name="nameFilter"
                    class="form-control text-center mx-auto" placeholder="<?php echo e(__('product.list.findOnName')); ?>"
                    value="<?php echo e(request()->input('nameFilter')); ?>">
            </form>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="<?php echo e(route('product.list', ['nameFilter' => request()->nameFilter, 'brandFilter' => request()->brandFilter])); ?>">
                <?php echo e(csrf_field()); ?>

                <select onchange="this.form.submit()" class="form-control" id="brandFilter" name="brandFilter">
                    <option selected>Filter by Brand</option>
                    <?php $__currentLoopData = $data["brands"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($brand->getBrand()); ?>"><?php echo e($brand->getBrand()); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
        </div>
    </div>

    <hr class="border-secondary">
    <div class="row m-2">
        <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-5">
            <div class="card text-secondary font-weight-bold border-secondary">
                <div class="card-header text-center bg-light">
                    <h5><a class="text-secondary"
                            href="<?php echo e(route('product.show', $product->getId())); ?>"><?php echo e($product->getName()); ?></a></h5>
                    <div><?php echo e(__('product.list.brand')); ?>: <?php echo e($product->getBrand()); ?></div>
                </div>
                <div class="card-img">
                    <a href="<?php echo e(route('product.show', $product->getId())); ?>"><img class="card-img"
                            style="height: 185px;" src="<?php echo e(asset($product->getImagePath())); ?>" alt="" /></a>
                </div>
                <div class="card-body text-center">
                    <h5><?php echo e(__('product.list.price')); ?>: $<?php echo e(number_format($product->getSalePrice(),2, '.', ',')); ?></h5><br>
                    <a href="<?php echo e(route('product.addToCart', $product->getId())); ?>"><button
                            class="btn btn-primary"><?php echo e(__('product.list.addToCart')); ?></button></a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/product/list.blade.php ENDPATH**/ ?>