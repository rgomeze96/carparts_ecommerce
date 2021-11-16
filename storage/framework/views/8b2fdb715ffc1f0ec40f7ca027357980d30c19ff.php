<?php $__env->startSection("title", $data["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h3><?php echo e(__('user.orders.title')); ?></h3>
    <div class="row">
        <table class="table table-bordered table-dark table-hover text-center">
            <thead>
                <th scope="col"><?php echo e(__('user.orders.dateOfPurchase')); ?></th>
                <th scope="col"><?php echo e(__('user.orders.numberItems')); ?></th>
                <th scope="col"><?php echo e(__('user.orders.purchaseTotal')); ?></th>
                <th scope="col"><?php echo e(__('user.orders.reviewPurchase')); ?></th>
            </thead>
            <?php $__currentLoopData = $data["orders"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td><?php echo e($order->getCreatedAt()); ?></td>
                    <td><?php echo e($order->getNumberItems()); ?></td>
                    <td>$<?php echo e(number_format($order->getTotal(),2, '.', ',')); ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-light ml-1 mt-1" data-toggle="modal"
                            data-target="#modal-seeItems-<?php echo e($order->getId()); ?>">
                            <?php echo e(__('user.orders.seeItemsButton')); ?>

                        </button>
                    </td>
                    <div class="modal fade" id="modal-seeItems-<?php echo e($order->getId()); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content mx-auto text-center text-light bg-dark border border-info">
                                <div class="modal-header">
                                    <h5 class="modal-title mx-auto">
                                        <?php echo e(__('user.orders.seeItemsTitle')); ?>

                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <?php $__currentLoopData = $order["items"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row shadow-lg rounded rounded-pill m-2 bg-light text-dark">
                                                <div class="col font-weight-bold">
                                                    <?php echo e(__('user.orders.itemName')); ?>: <?php echo e($item->getProductName()); ?>

                                                </div>
                                                <div class="col font-weight-bold">
                                                <?php echo e(__('user.orders.itemSubtotal')); ?>: $<?php echo e(number_format($item->getSubtotal(),2, '.', ',')); ?>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <h3 class="text-light"><?php echo e(__('user.orders.total')); ?>

                                        $<?php echo e(number_format($order->getTotal(),2, '.', ',')); ?></h3>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal"><?php echo e(__('user.orders.closeButton')); ?></button>
                                    </div>
                                </div>
                                </form>
                            </div>
                </tr>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/user/orders.blade.php ENDPATH**/ ?>