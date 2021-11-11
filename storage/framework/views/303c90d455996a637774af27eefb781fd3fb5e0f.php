

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php echo $__env->make('util.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-primary">

                <div class="card-image">
                    <img style="max-height: 600px;" class="card-img" src="<?php echo e(asset($data['product']->getImagePath())); ?>"
                        alt="<?php echo e($data['product']->getId()); ?>">
                </div>
                <div class="card-header text-center border-primary">
                    <h3><?php echo e($data["product"]->getName()); ?></h3>
                </div>
                <div class="card-body text-center">
                    <b><?php echo e(__('product.show.name')); ?> </b> <?php echo e($data["product"]->getName()); ?><br />
                    <b><?php echo e(__('product.show.desc')); ?> </b> <?php echo e($data["product"]->getDescription()); ?><br /><br />

                    <b><?php echo e(__('product.show.category')); ?> </b> <?php echo e($data["product"]->getCategory()); ?><br />
                    <b><?php echo e(__('product.show.brand')); ?> </b> <?php echo e($data["product"]->getBrand()); ?><br />
                    <b><?php echo e(__('product.show.warranty')); ?> </b><?php echo e($data["product"]->getWarranty()); ?><br /><br />
                    <b><?php echo e(__('product.show.salePrice')); ?></b>
                    $<?php echo e(number_format($data["product"]->getSalePrice(),2, '.', ',')); ?><br>
                    <b><?php echo e(__('product.show.quantity')); ?> </b><?php echo e($data["product"]->getQuantity()); ?><br>
                    <a href="<?php echo e(route('product.addToCart', $data['product']->getId())); ?>"><button
                            class="btn btn-primary mt-1"><?php echo e(__('product.list.addToCart')); ?></button></a>
                </div>
            </div>
            <div class="card border-secondary mt-5">
                <div class="card-header text-center border-secondary">
                    <h5><?php echo e(__('product.show.reviewTitle')); ?></h5>
                </div>
                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul id="errors">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <div class="card-body">
                    <?php $__currentLoopData = $data['product']['reviews']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row ml-2">
                        <h5><?php echo e(__('product.show.customer')); ?>: <?php echo e($review['user']->getName()); ?></h5><br>
                    </div>
                    <div class="row ml-2">
                        <b><?php echo e(__('product.show.rating')); ?>: </b>
                        <div class="ml-2">
                            <span
                                class="fa fa-star custom-star <?php if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3 || $review->getRating() == 2 || $review->getRating() == 1): ?> checked <?php endif; ?>"></span>
                            <span
                                class="fa fa-star custom-star <?php if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3 || $review->getRating() == 2): ?> checked <?php endif; ?>"></span>
                            <span
                                class="fa fa-star custom-star <?php if($review->getRating() == 5 ||$review->getRating() == 4 || $review->getRating() == 3): ?> checked <?php endif; ?>"></span>
                            <span
                                class="fa fa-star custom-star <?php if($review->getRating() == 5 ||$review->getRating() == 4): ?> checked <?php endif; ?>"></span>
                            <span class="fa fa-star custom-star <?php if($review->getRating() == 5): ?> checked <?php endif; ?>"></span>
                        </div>
                    </div>
                    <div class="row ml-2">
                        <p><b><?php echo e(__('product.show.experience')); ?>:</b> <?php echo e($review->getReviewText()); ?></p>
                    </div>
                    <hr class="border-secondary">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <button type="button" class="btn btn-secondary mx-auto" data-toggle="modal"
                            data-target="#modal-addReview-<?php echo e($data['product']->getId()); ?>">
                            <?php echo e(__('product.show.storeReviewButton')); ?>

                        </button>
                    </div>
                    <div class="modal fade" id="modal-addReview-<?php echo e($data['product']->getId()); ?>" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                       <?php if(Auth::user()): ?>
                       <form method="POST" style="text-align: center"
                            action="<?php echo e(route('product.storeReview', $data['product']->getId())); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center border border-secondary">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto">
                                            <?php echo e(__('product.show.storeReviewTitle')); ?> <?php echo e($data['product']->getName()); ?>

                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo csrf_field(); ?>
                                        <label class="lead"
                                            for="newReviewRating"><?php echo e(__('product.show.newReviewRating')); ?></label>
                                        <input class="form-control mb-2 col-md-6 mx-auto text-center" type="number"
                                            min="1" max="5" placeholder="<?php echo e(__('product.show.newReviewRatingHelp')); ?>"
                                            name="newReviewRating" />
                                        <label class="lead mt-3"
                                            for="newReviewText"><?php echo e(__('product.show.newReviewText')); ?></label>
                                        <textarea required class="form-control col-md-6 mx-auto" name="newReviewText"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit"
                                            class="btn btn-secondary"><?php echo e(__('product.show.saveReviewButton')); ?></button>
                                    </div>
                                </div>
                        </form>
                       <?php else: ?>
                       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content mx-auto text-center border border-secondary">
                                    <div class="modal-header">
                                        <h5 class="modal-title mx-auto">
                                            <?php echo e(__('product.show.storeReviewTitle')); ?> <?php echo e($data['product']->getName()); ?>

                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="h5">
                                            <?php echo e(__('product.show.loginToReview')); ?>

                                        </div>
                                        <a href="<?php echo e(route('login')); ?>">
                                        <div class="btn btn-secondary">
                                            <?php echo e(__ ('product.show.loginButton')); ?>

                                        </div>
                                        </a>
                                    </div>
                                    <div class="modal-footer mx-auto">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                       <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/product/show.blade.php ENDPATH**/ ?>