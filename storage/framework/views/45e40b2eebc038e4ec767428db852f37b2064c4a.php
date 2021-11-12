

<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <h1><?php echo e($data["title"]); ?></h1>
    <hr class="border-secondary">
    <div class="row">
        <div class="col-md-2 mt-2">
            <h5><?php echo e(__('product.list.filters')); ?>: </h5>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="<?php echo e(route('product.list', ['nameFilter' => request()->nameFilter, 'brandFilter' => request()->brandFilter, 'catgoryFilter' => request()->categoryFilter])); ?>">
                <?php echo e(csrf_field()); ?>

                <label hidden for="nameFilter"></label>
                <input onchange="this.form.submit()" type="text" id="nameFilter" name="nameFilter"
                    class="form-control text-center mx-auto" placeholder="<?php echo e(__('product.list.filterByName')); ?>"
                    value="<?php echo e(request()->input('nameFilter')); ?>">
            </form>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="<?php echo e(route('product.list', ['nameFilter' => request()->nameFilter, 'brandFilter' => request()->brandFilter, 'catgoryFilter' => request()->categoryFilter])); ?>">
                <?php echo e(csrf_field()); ?>

                <select onchange="this.form.submit()" class="form-control" id="brandFilter" name="brandFilter">
                    <option selected><?php echo e(__('product.list.filterByBrand')); ?></option>
                    <?php $__currentLoopData = $data["brands"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($brand->getBrand()); ?>"><?php echo e($brand->getBrand()); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
        </div>
        <div class="col mx-auto">
            <form novalidate method="GET" style="text-align: center"
                action="<?php echo e(route('product.list', ['nameFilter' => request()->nameFilter, 'brandFilter' => request()->brandFilter, 'catgoryFilter' => request()->categoryFilter])); ?>">
                <?php echo e(csrf_field()); ?>

                <select onchange="this.form.submit()" class="form-control" id="cateogryFilter" name="categoryFilter">
                    <option selected><?php echo e(__('product.list.filterByCategory')); ?></option>
                    <?php $__currentLoopData = $data["categories"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->getCategory()); ?>"><?php echo e($category->getCategory()); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>
        </div>
        <div class="col">
        <a href="<?php echo e(route('product.list')); ?>"><button
                            class="btn btn-secondary"><?php echo e(__('product.list.getRidOfFilters')); ?></button></a>
        </div>
    </div>
    <hr class="border-secondary">
    <div class="row m-2">
        <div class="container">
            <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row shadow-lg rounded rounded-pill">
                <div class="col-md-6 mt-2 mb-2">
                    <a href="<?php echo e(route('product.show', $product->getId())); ?>"><img class="rounded rounded-pill shadow-lg"
                            style="height: 185px; max-width: 200px" src="<?php echo e(asset($product->getImagePath())); ?>"
                            alt="<?php echo e($product->getId()); ?>" /></a>
                </div>
                <div class="col-md-6 mt-2 mb-2">
                    <h4><a class="text-secondary"
                            href="<?php echo e(route('product.show', $product->getId())); ?>"><?php echo e($product->getName()); ?></a></h4>

                    <h5><?php echo e(__('product.list.price')); ?>: $<?php echo e(number_format($product->getSalePrice(),2, '.', ',')); ?></h5>
                    <h5><?php echo e(__('product.list.brand')); ?>: <?php echo e($product->getBrand()); ?></h5><br>
                    <a href="<?php echo e(route('product.addToCart', $product->getId())); ?>"><button
                            class="btn btn-primary"><?php echo e(__('product.list.addToCart')); ?></button></a>
                </div>
            </div>
            <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/product/list.blade.php ENDPATH**/ ?>