<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $__env->yieldContent('title', 'Home'); ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('/storage/tokyo_logo.png')); ?>" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo e(asset('/css/styles.css')); ?>" rel="stylesheet" />}
    <link href="<?php echo e(asset('/css/custom-styles.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <a class="navbar-brand" href="<?php echo e(route('home.index')); ?>"> <img class="rounded rounded-circle"
                    style="max-width: 125px; max-height: 70px" src="<?php echo e(asset('/storage/tokyo_logo.png')); ?>"> </a>
            <button
                class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
                type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <?php echo e(__('layout.menu')); ?>

                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto text-light">
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="<?php echo e(route('login')); ?>"><?php echo e(__('layout.login')); ?></a></li> <span class="mt-2">|</span>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="<?php echo e(route('register')); ?>"><?php echo e(__('layout.register')); ?></a></li> <span
                        class="mt-2">|</span>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="<?php echo e(route('product.list')); ?>"><?php echo e(__('layout.products')); ?></a></li> <span
                        class="mt-2">|</span>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="<?php echo e(route('bitcoin.index')); ?>"><?php echo e(__('layout.bitcoin')); ?></a></li> <span
                        class="mt-2">|</span>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link"
                            href="<?php echo e(route('flower.index')); ?>"><?php echo e(__('layout.flowerShop')); ?></a></li>
                    <?php else: ?>
                    <?php if(Auth::user()->getRole() == "admin"): ?>
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__('layout.admin')); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                            <li class="dropdown-item text-light"><a class="nav-link"
                                    href="<?php echo e(route('admin.product.manage')); ?>"><?php echo e(__('layout.managePro')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('admin.toolloan.manage')); ?>"><?php echo e(__('layout.toolManagement')); ?></a>
                            </li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('admin.user.manage')); ?>"><?php echo e(__('layout.manageUsers')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><?php echo e(__('layout.logout')); ?></a></li>
                        </div>
                    </span><span class="mt-2">|</span>
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__('layout.navigate')); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('product.list')); ?>"><?php echo e(__('layout.products')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('product.showCart')); ?>"><?php echo e(__('layout.myCart')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('user.show', Auth::id())); ?>"><?php echo e(__('layout.myAccount')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('user.orders', Auth::id())); ?>"><?php echo e(__('layout.myOrders')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('bitcoin.index')); ?>"><?php echo e(__('layout.bitcoin')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('flower.index')); ?>"><?php echo e(__('layout.flowerShop')); ?></a></li>
                        </div>
                    </span>
                    <?php else: ?>
                    <span style="position: relative">
                        <a style="text-decoration: none" id="navbarDropdown" class="nav-link dropdown-toggle text-light"
                            href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo e(__('layout.navigate')); ?>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('product.list')); ?>"><?php echo e(__('layout.products')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('product.showCart')); ?>"><?php echo e(__('layout.myCart')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('user.show', Auth::id())); ?>"><?php echo e(__('layout.myAccount')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('user.orders', Auth::id())); ?>"><?php echo e(__('layout.myOrders')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('bitcoin.index')); ?>"><?php echo e(__('layout.bitcoin')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link"
                                    href="<?php echo e(route('flower.index')); ?>"><?php echo e(__('layout.flowerShop')); ?></a></li>
                            <li class="dropdown-item"><a class="nav-link" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"><?php echo e(__('layout.logout')); ?></a></li>
                        </div>
                    </span>
                    <?php endif; ?>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
    <div id="main-content" style="padding-top: 105px;">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- Copyright -->
    <div class="container-fluid bg-secondary text-light text-center py-3">
        <div class="row">
            <div class="col">
                <div class="">© 2021 Copyright:
                    <a href="<?php echo e(route('home.index')); ?>"> CarPart.com</a>
                </div>
            </div>
            <div class="col"><a href="/language/en">English</a> | <a href="/language/es">Español</a></div>
        </div>
    </div>
    <!-- Copyright -->
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src=""></script>
    <!-- Core theme JS-->
    <script src="<?php echo e(asset('/js/scripts.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\carparts_ecommerce\resources\views/layouts/app.blade.php ENDPATH**/ ?>