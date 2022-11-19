<?php
  $category_id = $category->id ?? 0;

  $tintuc = \App\NewsCategory::find(1);
  $news_featured = $tintuc->news()->where('status', 1)->limit(4)->get();

  $ads_1 = \App\Model\Slider::where('slider_id', 71)->get();
  $ads_2 = \App\Model\Slider::where('slider_id', 73)->get();

  $documents = \App\Model\Document::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(4)->get();
?>
<div class="offcanvas offcanvas-collapse w-100 rounded-3 py-1" id="shop-sidebar" style="max-width: 22rem;">
  <div class="offcanvas-header align-items-center shadow-sm">
    <h2 class="h5 mb-0">Filters</h2>
    <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <!-- Categories-->
    <div class="widget widget-categories mb-4 ">
      <h3 class="widget-title d-flex align-items-center">Danh mục</h3>
      <div class="accordion mt-n1" id="shop-categories">
        <?php $__currentLoopData = $categories_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="accordion-item">
          <h3 class="accordion-header">
            <?php if($category_item->children()->count()): ?>
              <a class="accordion-button collapsed <?php echo e($category_item->id == $category_id ? 'active' : ''); ?>" href="#<?php echo e($category_item->slug); ?>" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="<?php echo e($category_item->slug); ?>"><?php echo e($category_item->name); ?></a>
            <?php else: ?>
             <a class="accordion-button collapsed <?php echo e($category_item->id == $category_id ? 'active' : ''); ?>" href="<?php echo e(route('shop.detail', $category_item->slug)); ?>"><?php echo e($category_item->name); ?></a>
            <?php endif; ?>
         </h3>
         <div class="accordion-collapse collapse" id="<?php echo e($category_item->slug); ?>" data-bs-parent="#shop-categories">
           <div class="accordion-body">
             <div class="widget widget-links widget-filter">
               <ul class="widget-list widget-filter-list pt-1">
                  <li class="widget-list-item widget-filter-item">
                     <a class="widget-list-link d-flex justify-content-between align-items-center <?php echo e($category_item->id == $category_id ? 'active' : ''); ?>" href="<?php echo e(route('shop.detail', $category_item->slug)); ?>">
                        <span class="widget-filter-item-text">Xem tất cả</span>
                     </a>
                  </li>
                  <?php $__currentLoopData = $category_item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="widget-list-item widget-filter-item">
                     <a class="widget-list-link d-flex justify-content-between align-items-center <?php echo e($item->id == $category_id ? 'active' : ''); ?>" href="<?php echo e(route('shop.detail', $item->slug)); ?>">
                        <span class="widget-filter-item-text"><?php echo e($item->name); ?></span>
                     </a>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </ul>
             </div>
           </div>
         </div>
         
          
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>

    </div>
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
    <?php endif; ?>
      
      
    </div>

</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/product/sidebar.blade.php ENDPATH**/ ?>