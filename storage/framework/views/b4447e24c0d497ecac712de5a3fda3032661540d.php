<?php $__env->startSection("title", $data["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <h2><?php echo e(__('flowers.title')); ?></h2>
    </div>
    <hr class="border-secondary">
    <?php if($data['validResponse'] == false): ?>
    <div class="row text-center justify-content-center">
        <h5><?php echo e(__('flowers.noResults')); ?></h5>
    </div>
    <?php else: ?>
    <?php for($i = 0; $i < $data['numberOfResults']; $i++): ?>
    <div class="row shadow-lg rounded rounded-pill m-2">
        <div class="col m-2 text-center">
            <h4><?php echo e(__('flowers.name')); ?>: <a style="color: #800000" target="_blank"
                    href="<?php echo e($data['links'][$i]); ?>"><?php echo e($data['flowerNames'][$i]); ?></a>
            </h4>
            <h5><?php echo e(__('flowers.price')); ?>: $<?php echo e(number_format($data['prices'][$i],2, '.', ',')); ?></h5>
            <h5><?php echo e(__('flowers.amountsPerFlower')); ?>: <?php echo e($data['amountsPerFlower'][$i]); ?></h5><br>
        </div>
    </div>
<?php endfor; ?>
<?php endif; ?>
<br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/flowers/index.blade.php ENDPATH**/ ?>