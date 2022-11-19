<?php
$headerMenuTop = Menu::getByName('Header-menu-top');
$headerMenuBottom = Menu::getByName('Header-menu-bottom');
$headerMenuBottomDropdown = Menu::getByName('Header-menu-bottom-dropdown');
?>

        <!-- Start header -->
<div id="header">
    <div class="container">

        <!-- Navbar -->
        <!-- Menu mobile -->
        <div class="menu-mobile">
            <nav class="navbar navbar-dark">
                <a href="/" class="navbar-brand"><img src="<?php echo e(asset(setting_option('logo'))); ?>" alt="" width="200"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group d-lg-none my-3">
                        <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                        <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm">
                    </div>
                    <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">

                        <?php $__currentLoopData = $headerMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $class_active ='';
                            ?>
                            <?php if(empty($value['child'])): ?>
                                <li class="nav-item "><a class="nav-link <?php echo e($class_active); ?>" href="<?php echo e(url($value['link'])); ?>"><?php echo e($value['label']); ?></a></li>
                            <?php else: ?>
                                <li class="nav-item dropdown"><a class="nav-link <?php echo e($class_active); ?> dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="<?php echo e(url($value['link'])); ?>"><?php echo e($value['label']); ?></a>
                                    <ul class="dropdown-menu">
                                        <?php $__currentLoopData = $value['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $class_active_child="";
                                        ?>
                                        <?php if(empty($value_child['child'])): ?>
                                            <li class="dropdown"><a class="nav-link <?php echo e($class_active_child); ?>" href="<?php echo e(url($value_child['link'])); ?>"><?php echo e($value_child['label']); ?></a></li>
                                        <?php else: ?>
                                            <li class="chev-right <?php echo e($class_active_child); ?>"><a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="<?php echo e(url($value_child['link'])); ?>"><?php echo e($value_child['label']); ?></a></i>
                                                <ul class="dropdown-menu">
                                                    <?php $__currentLoopData = $value_child['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value_child_2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a class="dropdown-item" href="<?php echo e(url($value_child_2['link'])); ?>"><?php echo e($value_child_2['label']); ?></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Header Top -->
        <div class="row">
            <div id="header-menu-top" class="col-lg-12 col-md-12 col-sm-12">
                <ul class="nav justify-content-end">
                    <?php if(!Auth::check()): ?>
                        <li class="nav-item"><a class="nav-link" href="#register-author" data-bs-toggle="modal">Đăng ký tác giả</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal">Đăng nhập</a></li>
                    <?php elseif(auth()->user()->expert == 0): ?>
                        <li class="nav-item"><a class="nav-link" href="#register-author" data-bs-toggle="modal">Đăng ký tác giả</a></li>
                    <?php endif; ?>
                    <?php $__currentLoopData = $headerMenuTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url($menu['link'])); ?>"><?php echo e($menu['label']); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header between -->
        <div class="header-menu-between row">
            <div id="logo" class="col-lg-3 col-md-3 col-sm-12 d-flex align-self-center">
                <a href="/"><img src="<?php echo e(asset(setting_option('logo'))); ?>" alt=""></a>
            </div>
            <div id="search" class="col-lg-6 col-md-6 col-sm-12">
                <form method="get" action="<?php echo e(route('search')); ?>" class="form-inline my-2 my-lg-0 add-button">
                    <!-- Search-->
                    <div class="input-group d-none d-lg-flex flex-nowrap mx-4">
                        <select class="form-select flex-shrink-0" name="type" style="width: 8rem;">
                           <option>Tất cả</option>
                          <option value="research">Nghiên cứu</option>
                          <option value="document">Tài liệu</option>
                          <option value="product">Thư viện</option>
                        </select>
                        <i class="ci-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        <input class="form-control w-100" name="keyword" type="text" placeholder="Search for products">
                    </div>
                </form>
            </div>
            <div id="cart" class="col-lg-3 col-md-3 col-sm-12 d-flex align-items-center justify-content-end">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('wishlist')); ?>"><img src="<?php echo e(asset($templateFile .'/images/heart.svg')); ?>" alt=""></a>
                    </li>
                    <li class="nav-item dropdown site-cart">
                        <a class="nav-link" href="<?php echo e(route('cart')); ?>" ><img class="icon-header"src="<?php echo e(asset($templateFile .'/images/Handbag.svg')); ?>" alt=""></a>
                        <?php echo $__env->make($templatePath .'.cart.cart-mini', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>
                    <li class="nav-item ">
                        <?php if(Auth::check()): ?>
                            <a class="nav-link" href="<?php echo e(route('customer.profile')); ?>" ><img src="<?php echo e(asset($templateFile .'/images/user.svg')); ?>" alt=""></a>
                        <?php else: ?>
                            <a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><img src="<?php echo e(asset($templateFile .'/images/user.svg')); ?>" alt=""></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <!--End Header between -->


        <!-- Header bottom -->
        <div class="row">
            <div id="header-menu-bottom" class="col-lg-12 col-md-12 col-sm-12">
                <?php echo $__env->make($templatePath .'.layouts.menu-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <!-- End Header Bottom -->

        <!-- End Nav Bar -->
    </div>
</div>
<!-- End header -->

<?php echo $__env->make('auth.form-customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(!Auth::check()): ?>
<?php $__env->startPush('after-footer'); ?>
<script>
    
</script>
<?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/layouts/header.blade.php ENDPATH**/ ?>