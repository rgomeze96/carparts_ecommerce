

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card text-center m-2 border-secondary">
            <div class="card-header border-secondary"><h5><?php echo e(__('auth.login')); ?></h5></div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('auth.email')); ?></label>
                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right"><?php echo e(__('auth.password')); ?></label>
                        <div class="col-md-4">
                            <input id="password" type="password"
                                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required
                                autocomplete="current-password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-check mx-auto">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                value="<?php echo e(old('remember') ? 'checked' : ''); ?>">
                            <label class="form-check-label" for="remember">
                                <?php echo e(__('auth.rememberMe')); ?>

                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">
                                <?php echo e(__('auth.login')); ?>

                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/auth/login.blade.php ENDPATH**/ ?>