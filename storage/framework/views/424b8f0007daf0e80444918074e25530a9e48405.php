<?php
   $menu_tags = Menu::getByName('Menu-tag');

   $tintuc = \App\NewsCategory::find(1);
   $news_featured = $tintuc->news()->where('status', 1)->limit(4)->get();

   $ads_1 = \App\Model\Slider::where('slider_id', 71)->get();
   $ads_2 = \App\Model\Slider::where('slider_id', 73)->get();

   $documents = \App\Model\Document::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(4)->get();
?>

<?php if($news_featured->count()): ?>
<div id="notify">
   <div id="notify-header" class="px-3">
      <h4>Thông báo mới</h4>
   </div>
   <div id="notify-content">
      <div class="padding-custom-12">
         <?php $__currentLoopData = $news_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <a href="<?php echo e(route('news.category', $post->slug)); ?>">
            <div class="d-flex py-2">
               <div class="img">
                  <img src="<?php echo e(asset($post->image)); ?>" alt="" class="w-100">
               </div>
               <div class="item-content ms-3">
                  <p class="item-introduce"><?php echo e($post->name); ?></p>
               </div>
            </div>
         </a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div>
<?php endif; ?>

<?php if($ads_1->count()): ?>
<?php $__currentLoopData = $ads_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="mt-35 notify-sale">
   <a href="<?php echo e($item->link ?? 'javascript:;'); ?>">
      <div class="card">
         <img src="<?php echo e(asset($item->src)); ?>" alt="<?php echo e($item->name); ?>" class="card-img">
      </div>
   </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($documents->count()): ?>
<div id="notify" class="mt-35">
   <div id="notify-header" class="px-3">
      <h4>Đọc nhiều</h4>
   </div>

   <div id="notify-content">
      <div class="padding-custom-12">
         <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <a href="<?php echo e(route('document.detail', $post->slug)); ?>">
            <div class="d-flex py-2">
               <div class="img">
                  <img src="<?php echo e(asset($post->image)); ?>" alt="" class="w-100">
               </div>
               <div class="item-content ms-3">
                  <p class="book-title"><?php echo e($post->name); ?></p>
                  <?php if( !empty($post->author) ): ?>
                  <p class="book-author"><?php echo e($post->author); ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
   
</div>
<?php endif; ?>

<?php if(!empty($menu_tags)): ?>
<div id="notify" class="mt-35">
   <div id="notify-header" class="px-3">
      <h4>Tag</h4>
   </div>
   <div class="btn-tag py-2">
      <?php $__currentLoopData = $menu_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(url($item['link'])); ?>"><?php echo e($item['label']); ?></a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
</div>
<?php endif; ?>

<?php if($ads_2->count()): ?>
<?php $__currentLoopData = $ads_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="mt-35 notify-sale">
   <a href="<?php echo e($item->link ?? 'javascript:;'); ?>">
      <div class="card">
         <img src="<?php echo e(asset($item->src)); ?>" alt="<?php echo e($item->name); ?>" class="card-img">
      </div>
   </a>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/sidebar-home.blade.php ENDPATH**/ ?>