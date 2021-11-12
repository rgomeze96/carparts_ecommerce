
<?php $__env->startSection("title", $data["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="container-fluid text-center">
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h3><?php echo e(__('toolloan.edit.title')); ?></h3>
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
        <table class="table table-dark table-hover bg-secondary text-light text-center">
            <thead>
                <th scope="col"><?php echo e(__('toolloan.edit.loanId')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.userName')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.toolName')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.depositAmount')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.loanStart')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.loanEnd')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.description')); ?></th>
                <th scope="col"><?php echo e(__('toolloan.edit.actions')); ?></th>
            </thead>
            <?php $__currentLoopData = $data["loanedTools"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loanedTool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tbody>
                <tr>
                    <td><?php echo e($loanedTool->getId()); ?></td>
                    <td><?php echo e($data["users"]->where('id', $loanedTool->getUserId())->first()->getName()); ?></td>
                    <td><?php echo e($data['tools']->where('id', $loanedTool->getProductId())->first()->getName()); ?></td>
                    <td>$<?php echo e(number_format($loanedTool->getDepositAmount(),2, '.', ',')); ?></td>
                    <td><?php echo e($loanedTool->getLoanDate()); ?></td>
                    <td><?php echo e($loanedTool->getReturnDate()); ?></td>
                    <td><?php echo e($loanedTool->getDescription()); ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-warning mt-1" data-toggle="modal" data-target="#modal-edit-<?php echo e($loanedTool->getId()); ?>">
                            <?php echo e(__('toolloan.edit.editButton')); ?>

                        </button>
                        <button type="button" class="btn btn-outline-danger ml-1 mt-1" data-toggle="modal" data-target="#modal-delete-<?php echo e($loanedTool->getId()); ?>">
                            <?php echo e(__('toolloan.edit.deleteButton')); ?>

                        </button>
                    </td>
                    <div class="modal fade" id="modal-edit-<?php echo e($loanedTool->getId()); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form novalidate method="POST" style="text-align: center" action="<?php echo e(route('admin.toolloan.update', $loanedTool->getId())); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center border border-warning">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto">
                                            <?php echo e(__('toolloan.edit.modifyTitle')); ?>

                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <label for="userId"><?php echo e(__('toolloan.edit.modifyUserId')); ?></label>
                                        <select multiple class="form-control col-md-6 mx-auto" name="userId" id="userId">
                                            <?php $__currentLoopData = $data["users"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->getId() == $loanedTool->getUserId()): ?>
                                            <option selected value="<?php echo e($user->getId()); ?>">
                                                <?php echo e($user->getName()); ?>

                                            </option>
                                            <?php else: ?>
                                            <option value="<?php echo e($user->getId()); ?>">
                                                <?php echo e($user->getName()); ?>

                                            </option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <small><?php echo e(__('toolloan.edit.userHelp')); ?></small><br>
                                        <label class="mt-1" for="productId"><?php echo e(__('toolloan.edit.modifyProductId')); ?></label>
                                        <select class="form-control col-md-6 mx-auto text-center" name="productId">
                                            <option><?php echo e(__('toolloan.edit.selectNew')); ?></option>
                                            <?php $__currentLoopData = $data["tools"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tool->getId()); ?>"><?php echo e($tool->getName()); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label for="depositAmount"><?php echo e(__('toolloan.edit.modifyDepositAmount')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="text" placeholder="Current Deposit Amount: " name="depositAmount" value="<?php echo e(number_format($loanedTool->getDepositAmount(),2, '.', ',')); ?>" />
                                        <label for="loanDate"><?php echo e(__('toolloan.edit.loanDate')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="loanDate" value="<?php echo e($loanedTool->getLoanDate()); ?>" />
                                        <label for="returnDate"><?php echo e(__('toolloan.edit.returnDate')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto" type="date" placeholder="Enter return date for loan" name="returnDate" value="<?php echo e($loanedTool->getReturnDate()); ?>" />
                                        <label for="description"><?php echo e(__('toolloan.edit.desc')); ?></label>
                                        <textarea class="form-control col-md-6 mx-auto" name="description" rows="3"><?php echo e($loanedTool->getDescription()); ?></textarea>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('toolloan.edit.closeButton')); ?></button>
                                        <button type="submit" class="btn btn-warning"><?php echo e(__('toolloan.edit.confirmEdit')); ?></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </tr>
                <div class="modal fade" id="modal-delete-<?php echo e($loanedTool->getId()); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <form novalidate method="POST" action="<?php echo e(route('admin.toolloan.destroy', $loanedTool->getId())); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content mx-auto text-center bg-secondary border border-danger text-light">
                                <input type="hidden" name="_method" value="DELETE">
                                <div class="modal-body">
                                    <?php echo e(__('toolloan.edit.deleteMessage')); ?> <?php echo e($loanedTool->getId()); ?>?
                                </div>
                                <div class="modal-footer mx-auto">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal"><?php echo e(__('toolloan.edit.closeButton')); ?></button>
                                    <button type="submit" class="btn btn-danger"><?php echo e(__('toolloan.edit.confirmDelete')); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </tbody>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/admin/tool/manage.blade.php ENDPATH**/ ?>