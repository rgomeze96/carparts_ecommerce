

<?php $__env->startSection("title", $data["title"]); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <h2><?php echo e(__('product.edit.title')); ?></h2>
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($errors->any()): ?>
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
    <div class="modal fade" id="modal-add-product" tabindex="-1" role="dialog">
        <form class="mx-auto text-center" method="POST" action="<?php echo e(route('admin.product.save')); ?>"
            enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content mx-auto text-center bg-light border-success text-secondary">
                    <div class="modal-body">
                        <h5>
                            <?php echo e(__('product.create.title')); ?>

                        </h5>
                        <label for="productName"><?php echo e(__('product.create.productName')); ?></label>
                        <input class="form-control mb-2 col-md-6 mx-auto" type="text"
                            placeholder="<?php echo e(__('product.create.productNamePH')); ?>" name="productName"
                            value="<?php echo e(old('productName')); ?>" />

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
                    </div>
                    <div class="modal-footer mx-auto">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><?php echo e(__('product.edit.buttonClose')); ?></button>
                        <button type="submit" class="btn btn-success"><?php echo e(__('product.create.button')); ?></button>
                    </div>
                </div>
            </div>
        </form>
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
                    <td>$<?php echo e(number_format($product->getSalePrice(),2, '.', ',')); ?></td>
                    <td>$<?php echo e(number_format($product->getCost(),2, '.', ',')); ?></td>
                    <td><?php echo e($product->getCategory()); ?></td>
                    <td><?php echo e($product->getBrand()); ?></td>
                    <td><?php echo e($product->getWarranty()); ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                            data-target="#modal-edit-<?php echo e($product->getId()); ?>">
                            <?php echo e(__('product.edit.buttonEdit')); ?>

                        </button>

                        <?php if($data["loanedTools"]->where('product_id', $product->getId())->count() == 0): ?>
                        <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal"
                            data-target="#modal-delete-<?php echo e($product->getId()); ?>">
                            <?php echo e(__('product.edit.buttonDelete')); ?>

                        </button>
                        <?php endif; ?>
                        <br>
                        <?php if($product->getCategory() == "Tool"): ?>
                        <button type="button" class="btn btn-outline-light mt-1" data-toggle="modal"
                            data-target="#modal-add-toolloan">
                            <?php echo e(__('toolloan.create.createButton')); ?>

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
                    <div class="modal fade" id="modal-add-toolloan" tabindex="-1" role="dialog">
                        <form class="mx-auto text-center" method="POST" action="<?php echo e(route('admin.toolloan.save')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="productId" value="<?php echo e($product->getId()); ?>">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center bg-light border-success text-secondary">
                                    <div class="modal-body">
                                        <h5>
                                            <?php echo e(__('toolloan.create.title')); ?>

                                        </h5>
                                        <label for="userId"><?php echo e(__('toolloan.create.user')); ?></label>
                                        <select required multiple class="form-control col-md-6 mx-auto" name="userId"
                                            id="userId">
                                            <?php $__currentLoopData = $data["customers"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($customer->getId()); ?>"><?php echo e($customer->getName()); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label class="mt-2" for="description"><?php echo e(__('toolloan.create.desc')); ?></label>
                                        <textarea class="form-control col-md-6 mx-auto" name="description" rows="3"
                                            value="<?php echo e(old('description')); ?>"></textarea>
                                        <label class="mt-2"
                                            for="depositAmount"><?php echo e(__('toolloan.create.depositAmount')); ?></label><br>
                                        <small><?php echo e(__('product.edit.cost')); ?>:
                                            $<?php echo e(number_format($product->getCost(),2, '.', ',')); ?></small>
                                        <input class="form-control col-md-6 mx-auto" type="text"
                                            placeholder="<?php echo e(__('toolloan.create.depositAmount')); ?>" name="depositAmount"
                                            value="<?php echo e(old('depositAmount')); ?>" />
                                        <label class="mt-2" for="loanDate"><?php echo e(__('toolloan.create.loanDate')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="loanDate"
                                            value="<?php echo e(old('loanDate')); ?>" />
                                        <label class="mt-2"
                                            for="returnDate"><?php echo e(__('toolloan.create.returnDate')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" name="returnDate"
                                            value="<?php echo e(old('returnDate')); ?>" />
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(__('product.edit.buttonClose')); ?></button>
                                        <button type="submit"
                                            class="btn btn-success"><?php echo e(__('product.create.button')); ?></button>
                                    </div>
                                </div>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/admin/product/manage.blade.php ENDPATH**/ ?>