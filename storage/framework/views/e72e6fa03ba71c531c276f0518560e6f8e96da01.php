

<?php $__env->startSection("title", $data["title"]); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card text-center border-secondary m-2 mx-auto">
        <div class="card-header border-secondary">
            <h5><?php echo e(__('user.show.accountInfo')); ?></h5>
        </div>
        <div class="card-body">
            <?php if($errors->any()) : ?>
            <div class="alert alert-danger">
                <ul id="errors">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <p><b><?php echo e(__('user.show.name')); ?>:</b> <?php echo e($data["user"]->getName()); ?><br /></p>
            <p><b><?php echo e(__('user.show.email')); ?>:</b> <?php echo e($data["user"]->getEmail()); ?><br /></p>
            <p><b><?php echo e(__('user.show.address')); ?>:</b> <?php echo e($data["user"]->getAddress()); ?><br /></p>
            <p><b><?php echo e(__('user.show.age')); ?>:</b> <?php echo e($data["user"]->getAge()); ?><br /></p>
            <p><b><?php echo e(__('user.show.city')); ?>:</b> <?php echo e($data["user"]->getCity()); ?><br /></p>
            <p><b><?php echo e(__('user.show.country')); ?>:</b> <?php echo e($data["user"]->getCountry()); ?><br /></p>
            <p><b><?php echo e(__('user.show.telephone')); ?>:</b> <?php echo e($data["user"]->getTelephone()); ?><br /></p>
            <p><b><?php echo e(__('user.show.balance')); ?>:</b> $<?php echo e(number_format($data["user"]->getBalance(), 2, '.', ',')); ?><br /></p>
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                data-target="#modal-edit-<?php echo e($data['user']->getId()); ?>">
                <?php echo e(__('user.show.modifyAccountButton')); ?>

            </button>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-<?php echo e($data['user']->getId()); ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" style="text-align: center" action="<?php echo e(route('user.update', $data['user']->getId())); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <form class="mx-auto text-center" method="POST"
                    action="<?php echo e(route('user.update', $data['user']->getId())); ?>">
                    <div class="modal-content mx-auto text-center border border-warning">
                        <div class="modal-body">
                            <h5 class="modal-title mx-auto">
                                <?php echo e(__('user.show.modifyTitle')); ?>

                            </h5>
                            <?php echo csrf_field(); ?>
                            <label class="mt-1" for="name"><?php echo e(__('user.show.userName')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text" placeholder="Enter user ID"
                                name="name" value="<?php echo e($data['user']->getName()); ?>" />

                            <label for="email"><?php echo e(__('user.show.email')); ?></label>
                            <input type="email" class="form-control col-md-8 mx-auto" name="email"
                                value="<?php echo e($data['user']->getEmail()); ?>">

                            <label for="address"><?php echo e(__('user.show.address')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter deposit amount required" name="address"
                                value="<?php echo e($data['user']->getAddress()); ?>" />

                            <label for="age"><?php echo e(__('user.show.age')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" min="1" type="number"
                                placeholder="Enter return date for loan" name="age"
                                value="<?php echo e($data['user']->getAge()); ?>" />

                            <label for="city"><?php echo e(__('user.show.city')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="city"
                                value="<?php echo e($data['user']->getCity()); ?>" />

                            <label for="country"><?php echo e(__('user.show.country')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="country"
                                value="<?php echo e($data['user']->getCountry()); ?>" />

                            <label for="telephone"><?php echo e(__('user.show.telephone')); ?></label>
                            <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                placeholder="Enter return date for loan" name="telephone"
                                value="<?php echo e($data['user']->getTelephone()); ?>" />
                        </div>
                        <div class="modal-footer mx-auto">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal"><?php echo e(__('user.show.buttonClose')); ?></button>
                            <button type="submit" class="btn btn-warning"><?php echo e(__('user.show.buttonUpdate')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**
                                                                                                                                      * 
                                                                                                                                      * PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/user/show.blade.php ENDPATH
                                                                                                                                      **/ ?>
