<?php if($message = Session::get('success')) : ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>

<?php if($message = Session::get('error')) : ?>
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?><?php /**
                      * 
                      * PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/util/message.blade.php ENDPATH
                      **/ ?>
