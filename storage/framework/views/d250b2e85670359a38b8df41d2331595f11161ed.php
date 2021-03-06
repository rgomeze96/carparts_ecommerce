

<?php $__env->startSection("title", $data["title"]); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <h2><?php echo e(__('product.edit.title')); ?></h2>
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()) : ?>
    <div class="alert alert-danger">
        <ul id="errors">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="row">
    <div class="ml-auto mb-2 mr-2">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-add-product">
                <?php echo e(__('product.edit.buttonAdd')); ?>

            </button>
        </div>
    </div>
    <div class="row">
        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col"><?php echo e(__('product.edit.id')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.productName')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.salePrice')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.cost')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.category')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.brand')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.warranty')); ?></th>
                <th scope="col"><?php echo e(__('product.edit.actions')); ?></th>
            </thead>
            <?php $__currentLoopData = $data["products"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td scope="row"><?php echo e($product->getId()); ?></td>
                    <td><?php echo e($product->getName()); ?></td>
                    <td>$<?php echo e(number_format($product->getSalePrice(), 2, '.', ',')); ?></td>
                    <td>$<?php echo e(number_format($product->getCost(), 2, '.', ',')); ?></td>
                    <td><?php echo e($product->getCategory()); ?></td>
                    <td><?php echo e($product->getBrand()); ?></td>
                    <td><?php echo e($product->getWarranty()); ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                            data-target="#modal-edit-<?php echo e($product->getId()); ?>">
                            <?php echo e(__('product.edit.buttonEdit')); ?>

                        </button>
                        <?php if($data["loanedTools"]->where('product_id', $product->getId())->count() == 0) : ?>
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal"
                            data-target="#modal-delete-<?php echo e($product->getId()); ?>">
                            <?php echo e(__('product.edit.buttonDelete')); ?>

                        </button>
                        <?php endif; ?>
                    </td>
                    <div class="modal fade" id="modal-edit-<?php echo e($product->getId()); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center"
                            action="<?php echo e(route('admin.product.update', $product->getId())); ?>"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <form class="mx-auto text-center" method="POST"
                                    action="<?php echo e(route('admin.product.update', $product->getId())); ?>">
                                    <div class="modal-content mx-auto text-center border border-warning">
                                        <div class="modal-header">
                                            <h5 class="modal-title mx-auto">
                                                <?php echo e(__('product.edit.modifyTitle')); ?>

                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo csrf_field(); ?>
                                            <label for="productName"><?php echo e(__('product.edit.productName')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter user ID" name="productName"
                                                value="<?php echo e($product->getName()); ?>" />
                                            <label for="description"><?php echo e(__('product.edit.desc')); ?></label>
                                            <textarea class="form-control col-md-8 mx-auto" name="description"
                                                rows="3"><?php echo e($product->getDescription()); ?></textarea>
                                            <label for="salePrice"><?php echo e(__('product.edit.salePrice')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter deposit amount required" name="salePrice"
                                                value="<?php echo e($product->getSalePrice()); ?>" />
                                            <label for="cost"><?php echo e(__('product.edit.cost')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="cost"
                                                value="<?php echo e($product->getCost()); ?>" />
                                            <label for="category"><?php echo e(__('product.edit.category')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="category"
                                                value="<?php echo e($product->getCategory()); ?>" />
                                            <label for="brand"><?php echo e(__('product.edit.brand')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="brand"
                                                value="<?php echo e($product->getBrand()); ?>" />
                                            <label for="warranty"><?php echo e(__('product.edit.warranty')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                placeholder="Enter return date for loan" name="warranty"
                                                value="<?php echo e($product->getWarranty()); ?>" />
                                            <label for="quantity"><?php echo e(__('product.edit.quantity')); ?></label>
                                            <input class="form-control mb-2 col-md-8 mx-auto" type="number" min="1"
                                                placeholder="Enter return date for loan" name="quantity"
                                                value="<?php echo e($product->getQuantity()); ?>" />
                                            <label class="mt-2" for="image"><?php echo e(__('product.create.image')); ?></label><br>
                                            <input class="col-md-6 mt-3 mx-auto text-center" type="file" name="image"
                                                accept="image/*" value="<?php echo e(old('imagePath')); ?>"><br>
                                            <img class="card-img" src="<?php echo e(asset($product->getImagePath())); ?>" alt="">
                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal"><?php echo e(__('product.edit.buttonClose')); ?></button>
                                            <button type="submit"
                                                class="btn btn-warning"><?php echo e(__('product.edit.buttonUpdate')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                    <div class="modal fade" id="modal-delete-<?php echo e($product->getId()); ?>" tabindex="-1" role="dialog">
                        <form novalidate method="POST" style="text-align: center"
                            action="<?php echo e(route('admin.product.destroy', $product->getId())); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div
                                    class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <div class="modal-body">
                                        <?php echo e(__('product.edit.areYouSure')); ?> <?php echo e($product->getName()); ?>

                                        <?php echo e(__('product.edit.withA')); ?> <?php echo e($product->getQuantity()); ?>

                                        <?php echo e(__('product.edit.inInv')); ?>

                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal"><?php echo e(__('product.edit.buttonClose')); ?></button>
                                        <button type="submit"
                                            class="btn btn-danger"><?php echo e(__('product.edit.buttonDeletePro')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**
                                                                                                                                      * 
                                                                                                                                      * PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/admin/product/list.blade.php ENDPATH
                                                                                                                                      **/ ?>
