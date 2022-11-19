


<?php $__env->startSection('seo'); ?>
<?php echo $__env->make($templatePath .'.layouts.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--=================================
Login -->
<section class="space-ptb login py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-10">
        <div class="section-title">
          <h2 class="text-center"><?php echo app('translator')->get('Đăng nhập'); ?></h2>
        </div>
         <?php if(count($errors) >0): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="text-danger"> <?php echo e($error); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         <?php if(session('status')): ?>
            <div class="text-danger"> <?php echo e(session('status')); ?></div>
         <?php endif; ?>
         <div class="list-content-loading">
             <div class="half-circle-spinner">
                 <div class="circle circle-1"></div>
                 <div class="circle circle-2"></div>
             </div>
         </div>
         <form id="form-login-page" class="form-horizontal login row align-items-center" method="POST" action="">
            <div class="error-message"></div>
               <?php echo e(csrf_field()); ?>

               <div class="mb-3 col-sm-12">
                  <label>Email <span class="required">*</span></label>
                  <input type="text" class="form-control" name="account" value=""/>
               </div>
               <div class="mb-3 col-sm-12">
                  <label>Mật khẩu <span class="required">*</span></label>
                  <input class="form-control" type="password" name="password"/>
               </div>
               <div class="mb-3 col-sm-12">
                  <div class="form-check mb-2">
                     <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                     <label class="custom-control-label" for="remember_me"><?php echo app('translator')->get('Ghi nhớ'); ?></label>
                  </div>
               </div>
               <div class="col-sm-6 d-grid">
                  <button type="button" class="btn btn-primary btn-login-page"><?php echo app('translator')->get('Đăng nhập'); ?></button>
               </div>
               <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                     <li class="me-1">
                        <a href="<?php echo e(route('register')); ?>">
                           <b>Bạn chưa có tài khoản? Click vào đây để đăng ký</b>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col-12 mt-3">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                     <li class="me-1">
                        <a href="<?php echo e(route('forgetPassword')); ?>"><b>Quên mật khẩu?</b></a>
                     </li>
                  </ul>
               </div>
         </form>

      </div>
    </div>
  </div>
</section>
<!--=================================
Login -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('foot-script'); ?>
   <script>
      jQuery(document).ready(function($) {
         var loginModalForm = $('#form-login-page');
    $("#form-login-page").validate({
          onfocusout: false,
          onkeyup: false,
          onclick: false,
          rules: {
              email: "required",
              password: "required",
          },
          messages: {
              email: "Nhập địa chỉ E-mail",
              password : "Nhập mật khẩu",
          },
          errorElement : 'div',
          errorLabelContainer: '.errorTxt',
          invalidHandler: function(event, validator) {
              $('html, body').animate({
                  scrollTop: 0
              }, 500);
          }
   });

    $('.btn-login-page').click(function(event) {
      var this_ = $(this);
        if(loginModalForm.valid()){
            var form = document.getElementById('form-login-page');
           var fdnew = new FormData(form);
           loginModalForm.parent().find('.list-content-loading').show();
            axios({
                  method: 'POST',
                  url: '/customer/login',
              data: fdnew,

            }).then(res => {
               if (res.data.error == 0) {
                   loginModalForm.html(res.data.view);
               } else{
                     loginModalForm.parent().find('.list-content-loading').hide();
                     loginModalForm.find('.error-message').html(res.data.msg);
               }
               loginModalForm.parent().find('.list-content-loading').hide();
            }).catch(e => console.log(e));
          }
    });
      });
   </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make($templatePath .'.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/auth/login.blade.php ENDPATH**/ ?>