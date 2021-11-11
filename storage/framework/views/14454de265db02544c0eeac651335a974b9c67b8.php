

<?php $__env->startSection("title", $data["title"]); ?>

<?php $__env->startSection('content'); ?>
<div class="container text-center">
    <div class="justify-content-center">
        <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="card border-secondary m-2">
            <div class="card-header text-center border-secondary">
                <h5><?php echo e(__('product.create.title')); ?></h5>
            </div>
            <div class="card-body">
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul id="errors">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <form class="mx-auto text-center" method="POST" action="<?php echo e(route('admin.product.save')); ?>"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <label for="name"><?php echo e(__('product.create.productName')); ?></label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.productNamePH')); ?>" name="name" value="<?php echo e(old('name')); ?>" />

                    <label for="description"><?php echo e(__('product.create.desc')); ?></label>
                    <textarea class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.descPH')); ?>" name="description" rows="3"
                        value="<?php echo e(old('description')); ?>" /></textarea>

                    <label for="salePrice"><?php echo e(__('product.create.salePrice')); ?></label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.salePricePH')); ?>" name="salePrice"
                        value="<?php echo e(old('salePrice')); ?>" />

                    <label for="cost"><?php echo e(__('product.create.cost')); ?></label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.costPH')); ?>" name="cost" value="<?php echo e(old('cost')); ?>" />

                    <label for="category"><?php echo e(__('product.create.category')); ?></label>
                    <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.categoryPH')); ?>" name="category"
                        value="<?php echo e(old('category')); ?>" />

                    <label for="brand"><?php echo e(__('product.create.brand')); ?></label>
                    <input class="form-control col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.brandPH')); ?>" name="brand" value="<?php echo e(old('brand')); ?>">

                    <label for="warranty"><?php echo e(__('product.create.warranty')); ?></label>
                    <input class="form-control col-md-6 mx-auto" type="text"
                        placeholder="<?php echo e(__('product.create.warrantyPH')); ?>" name="warranty"
                        value="<?php echo e(old('warranty')); ?>">

                    <label for="quantity"><?php echo e(__('product.create.quantity')); ?></label>
                    <input class="form-control col-md-6 mx-auto" type="number" min="1"
                        placeholder="<?php echo e(__('product.create.quantityPH')); ?>" name="quantity"
                        value="<?php echo e(old('quantity')); ?>">

                    <label class="mt-2" for="image"><?php echo e(__('product.create.image')); ?></label><br>
                    <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image" accept="image/*"
                        value="<?php echo e(old('imagePath')); ?>"><br>
                    <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('product.create.button')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/admin/product/create.blade.php ENDPATH**/ ?>