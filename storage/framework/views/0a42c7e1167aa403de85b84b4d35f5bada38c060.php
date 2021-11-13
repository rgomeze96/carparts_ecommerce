

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Portfolio Section-->
<div class="container">
    <!-- Portfolio Grid Items-->
    <div class="row">

    <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col"><?php echo e(__('bitcoin.date')); ?></th>
                <th scope="col"><?php echo e(__('bitcoin.price')); ?></th>
            </thead>
            <tbody>
                <?php for($i = 0; $i < $data["numberOfResults"]; $i++): ?>
                <tr>
                    <td><?php echo e($data["dates"][$i]); ?></td>
                    <td>$<?php echo e(number_format($data["prices"][$i],2, '.', ',')); ?></td>                 
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/bitcoin/index.blade.php ENDPATH**/ ?>