<?php
   $url = route('research.detail', $post->slug);
?>
<div class="card research-item text-justify card-custom">
   <a href="<?php echo e($url); ?>" title=<?php echo e($post->name); ?>"">
      <img src="<?php echo e(asset($post->image)); ?>" alt="<?php echo e($post->name); ?>" class="card-img-top">
   </a>
   <div class="card-body">
      <a href="<?php echo e($url); ?>" title="<?php echo e($post->name); ?>">
         <h5 class="card-title text"><?php echo e($post->name); ?></h5>
      </a>
      <?php if( !empty($post->author) ): ?>
      <p class="cart-text"><b>Tác giả: </b><?php echo e($post->author); ?></p>
      <?php endif; ?>
      <a href="<?php echo e($url); ?>" class="btn btn-outline-dark btn-sm">Read more</a>
   </div>
</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/research/research-item.blade.php ENDPATH**/ ?>