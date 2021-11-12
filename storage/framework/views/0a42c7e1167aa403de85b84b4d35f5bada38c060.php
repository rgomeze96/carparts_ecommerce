

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Portfolio Section-->
<div class="container">
    <!-- Portfolio Grid Items-->
    <div class="row">
        <?php echo $bitcoinChart->container(); ?>

        <?php echo $bitcoinChart->script(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/bitcoin/index.blade.php ENDPATH**/ ?>