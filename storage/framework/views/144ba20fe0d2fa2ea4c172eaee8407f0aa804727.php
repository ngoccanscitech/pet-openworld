<?php
    $states = \App\Model\Province::get();
?>


<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', $seo??[] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <section class="py-5 my-post bg-light  position-relative">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-3  col-12 mb-4">
                    <?php echo $__env->make($templatePath .'.customer.includes.sidebar-customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-lg-9 col-12">
                    <div class="section-title mb-3 d-flex align-items-center justify-content-center">
                      <h2>Thông tin cá nhân</h2>
                    </div>
                    <form action="<?php echo e(route('customer.updateprofile')); ?>" method="post" accept-charset="utf-8"  enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                              <label class="mb-2">Họ tên</label>
                              <input type="text" class="form-control" name="fullname" value="<?php echo e($user->fullname); ?>">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label class="mb-2">Email</label>
                              <input type="text" class="form-control" readonly value="<?php echo e($user->email); ?>">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label class="mb-2">Điện thoại</label>
                              <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                              <label class="mb-2">Ngày sinh</label>
                              <input type="date" class="form-control" name="birthday" value="<?php echo e($user->birthday); ?>">
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="section-title mb-3 d-flex align-items-center justify-content-center">
                          <h2>Địa chỉ</h2>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                              <label class="mb-2">Địa chỉ</label>
                              <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                            </div>
                            <div class="form-group col-md-6 col-lg-4 col-xl-4 required">
                                <label for="state_province">Tỉnh / Thành phố <span class="required-f">*</span></label>
                                <select name="state" id="state_province" class="form-control">
                                    <option value=""> --- Chọn tỉnh/thành phố --- </option>
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == $user->province ? 'selected' : ''); ?>><?php echo e($state->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12 mt-3 mb-5">
                              <h6>Cập nhật ảnh đại diện</h6>
                              <p>Vui lòng chọn ảnh hình vuông, kích thước khoảng 500px x 500px</p>
                              <div class="input-group file-upload">
                                <input type="file" name="avatar_upload" class="form-control" id="customFile">
                                <label class="input-group-text" for="customFile">Chọn file</label>
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

<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-footer'); ?>
<script src="<?php echo e(asset('theme/js/customer.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/customer/profile.blade.php ENDPATH**/ ?>