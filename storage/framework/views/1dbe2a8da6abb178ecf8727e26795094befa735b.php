<?php
    extract($data)
?>



<?php $__env->startSection('seo'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="py-3 my-post bg-light  position-relative">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-3  col-12">
                    <div class="border bg-white px-2">
                        <div class="agent-contact mb-3">
                            <div class="text-center pt-3">
                                <div class="avatar">
                                  <!-- <img class="img-fluid rounded-circle avatar avatar-xl" src="images/avatar/01.jpg" alt=""> -->
                                    <?php if(auth()->user()->avatar): ?>
                                        <img src="<?php echo e(auth()->user()->avatar); ?>" alt="">
                                    <?php else: ?>
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </div>
                                <div class="agent-contact-name mt-2">
                                  <h6><?php echo e(auth()->user()->firstname); ?> <?php echo e(auth()->user()->lastname); ?></h6>
                                </div>
                            </div>
                        </div>

                        <div class="widget mb-3">
                            <div class="widget-title">
                                <h6>Quản lý thông tin tài khoản</h6>
                            </div>
                            <a class="dropdown-item" href="<?php echo e(route('customer.my-orders')); ?>">
                                <img src="/upload/images/general/list.svg" class="icon_menu"> Your order
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('customer.profile')); ?>">
                                <img src="/upload/images/general/user.svg" class="icon_menu"> Your Info
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('customer.changePassword')); ?>">
                                <img src="/upload/images/general/lock.svg" class="icon_menu"> Change password
                            </a>
                            <hr>
                            <a class="dropdown-item" href="<?php echo e(route('customer.logout')); ?>"><img src="/upload/images/general/logout.svg" class="icon_menu"> Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="section-title mb-3 d-flex align-items-center">
                      <h4>Thay đổi thông tin</h4>
                    </div>
                    <form action="<?php echo e(route('customer.post.ChangePassword')); ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <?php if(count($errors) >0): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="text-danger mb-3"> <?php echo e($error); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                                 <?php if(session('status')): ?>
                                    <div class="text-danger mb-3"> <?php echo e(session('status')); ?></div>
                                 <?php endif; ?>
                                <div class="form-groupmb-3">
                                      <label class="mb-2">Mật khẩu hiện tại</label>
                                      <input type="password" class="form-control" name="current_password" >
                                </div>
                                <hr>
                                <div class="form-group mb-3">
                                  <label class="mb-2">Mật khẩu mới</label>
                                  <input type="password" class="form-control" name="new_password" value="">
                                </div>
                                <div class="form-group  mb-3">
                                  <label class="mb-2">Nhập lại mật khẩu mới</label>
                                  <input type="password" class="form-control" name="confirm_password" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-12 mb-3 text-center">
                              <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
    <?php $__env->startPush('after-footer'); ?>
    <script src="<?php echo e(asset('theme/js/customer.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($templatePath .'.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/customer/auth/change_pass.blade.php ENDPATH**/ ?>