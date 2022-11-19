<?php
   $url = route('document.detail', $post->slug);
   $user = \App\User::find($post->user_id);
?>
<div class="card product-item document-item text-justify card-custom">
   <a href="<?php echo e($url); ?>" title="<?php echo e($post->name); ?>" class="rectangle-img">
      <div class="img">
         <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->name); ?>" class="card-img-top">
      </div>
   </a>
   <div class="card-body">
      <a href="<?php echo e($url); ?>" title="<?php echo e($post->name); ?>">
         <h5 class="card-title text"><?php echo e($post->name); ?></h5>
      </a>
      <?php if( !empty($user) ): ?>
      <p class="cart-text"><?php echo e($user->fullname); ?></p>
      <?php endif; ?>
      <p class="cart-info mt-1">
         <span><i class="ti-eye"></i><span><?php echo e(number_format($post->view)); ?></span></span>
         <span><i class="ti-download"></i><span>123.222</span></span>
      </p>
   </div>
</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/document/document-item.blade.php ENDPATH**/ ?>