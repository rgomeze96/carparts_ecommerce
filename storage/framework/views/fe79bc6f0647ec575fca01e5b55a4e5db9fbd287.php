
<?php $__env->startSection("title", $data["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <h3><?php echo e(__('user.manage.title')); ?></h3>
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-dark table-hover text-center">
                <thead>
                    <th scope="col"><?php echo e(__('user.manage.id')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.userName')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.email')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.address')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.age')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.city')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.country')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.telephone')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.role')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.balance')); ?></th>
                    <th scope="col"><?php echo e(__('user.manage.actions')); ?></th>
                </thead>
                <?php $__currentLoopData = $data["users"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <tr>
                        <td scope="row"><?php echo e($user->getId()); ?></th>
                        <td><?php echo e($user->getName()); ?></td>
                        <td><?php echo e($user->getEmail()); ?></td>
                        <td><?php echo e($user->getAddress()); ?></td>
                        <td><?php echo e($user->getAge()); ?></td>
                        <td><?php echo e($user->getCity()); ?></td>
                        <td><?php echo e($user->getCountry()); ?></td>
                        <td><?php echo e($user->getTelephone()); ?></td>
                        <?php if($user->getRole() == 'admin') : ?>
                        <td class="text-danger"><?php echo e($user->getRole()); ?></td>
                        <?php else: ?>
                        <td><?php echo e($user->getRole()); ?></td>
                        <?php endif; ?>
                        <td>$<?php echo e(number_format($user->getBalance(), 2, '.', ',')); ?></td>
                        <td>
                            <button type="button" class="btn btn-outline-warning" data-toggle="modal"
                                data-target="#modal-edit-<?php echo e($user->getId()); ?>">
                                <?php echo e(__('user.manage.buttonEdit')); ?>

                            </button>
                            <?php if($data["loanedTools"]->where('user_id', $user->getId())->count() == 0) : ?>
                            <button type="button" class="btn btn-outline-danger ml-1" data-toggle="modal"
                                data-target="#modal-delete-<?php echo e($user->getId()); ?>">
                                <?php echo e(__('user.manage.buttonDelete')); ?>

                            </button>
                            <?php endif; ?>
                        </td>
                        <div class="modal fade" id="modal-edit-<?php echo e($user->getId()); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" style="text-align: center"
                                action="<?php echo e(route('admin.user.update', $user->getId())); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <form class="mx-auto text-center" method="POST"
                                        action="<?php echo e(route('admin.user.update', $user->getId())); ?>">
                                        <div class="modal-content mx-auto text-center border border-warning">
                                            <div class="modal-header">
                                                <h5 class="modal-title mx-auto">
                                                    <?php echo e(__('user.manage.modifyTitle')); ?>

                                                </h5>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo csrf_field(); ?>
                                                <label for="name"><?php echo e(__('user.manage.userName')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                    placeholder="Enter user ID" name="name"
                                                    value="<?php echo e($user->getName()); ?>" />

                                                <label for="email"><?php echo e(__('user.manage.email')); ?></label>
                                                <input type="email" class="form-control col-md-8 mx-auto" name="email"
                                                    value="<?php echo e($user->getEmail()); ?>">

                                                <label for="address"><?php echo e(__('user.manage.address')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                    placeholder="<?php echo e(__('user.manage.addressPH')); ?>" name="address"
                                                    value="<?php echo e($user->getAddress()); ?>" />

                                                <label for="age"><?php echo e(__('user.manage.age')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" min="1" type="number"
                                                    placeholder="<?php echo e(__('user.manage.agePH')); ?>" name="age"
                                                    value="<?php echo e($user->getAge()); ?>" />

                                                <label for="city"><?php echo e(__('user.manage.city')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                    placeholder="<?php echo e(__('user.manage.cityPH')); ?>" name="city"
                                                    value="<?php echo e($user->getCity()); ?>" />

                                                <label for="country"><?php echo e(__('user.manage.country')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                    placeholder="<?php echo e(__('user.manage.countryPH')); ?>" name="country"
                                                    value="<?php echo e($user->getCountry()); ?>" />

                                                <label for="telephone"><?php echo e(__('user.manage.telephone')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="text"
                                                    placeholder="<?php echo e(__('user.manage.telephonePH')); ?>" name="telephone"
                                                    value="<?php echo e($user->getTelephone()); ?>" />

                                                <label for="balance"><?php echo e(__('user.manage.balance')); ?></label>
                                                <input class="form-control mb-2 col-md-8 mx-auto" type="number" min="1"
                                                    placeholder="<?php echo e(__('user.manage.balancePH')); ?>" name="balance"
                                                    value="<?php echo e($user->getBalance()); ?>" />

                                                <div><?php echo e(__('user.manage.role')); ?></div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        value="admin">
                                                    <label class="form-check-label">
                                                        <?php echo e(__('user.manage.adminRole')); ?>

                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="role"
                                                        value="client">
                                                    <label class="form-check-label">
                                                        <?php echo e(__('user.manage.clientRole')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer mx-auto">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal"><?php echo e(__('user.manage.buttonClose')); ?></button>
                                                <button type="submit"
                                                    class="btn btn-warning"><?php echo e(__('user.manage.buttonUpdate')); ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                        <div class="modal fade" id="modal-delete-<?php echo e($user->getId()); ?>" tabindex="-1" role="dialog">
                            <form novalidate method="POST" style="text-align: center"
                                action="<?php echo e(route('admin.user.destroy', $user->getId())); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div
                                        class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <div class="modal-body">
                                            <?php echo e(__('user.manage.areYouSure')); ?> <?php echo e($user->getName()); ?>

                                        </div>
                                        <div class="modal-footer mx-auto">
                                            <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal"><?php echo e(__('user.manage.buttonClose')); ?></button>
                                            <button type="submit"
                                                class="btn btn-danger"><?php echo e(__('user.manage.buttonDeleteUser')); ?></button>
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
        <div class="alert alert-danger mx-auto"><?php echo e(__('user.manage.cannotDelete')); ?></div>
    </div>
    <div class="row justify-content-center">
        <?php echo e($data["users"]->onEachSide(2)->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**
                                                                                                                                      * 
                                                                                                                                      * PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/admin/user/manage.blade.php ENDPATH
                                                                                                                                      **/ ?>
