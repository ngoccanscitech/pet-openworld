<?php
   //$researchs = \App\Model\Research::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(3)->get();
   $categories = \App\Model\ResearchCategory::where('status', 1)->orderBy('sort', 'asc')->limit(5)->get();
   $agent = new Jenssegers\Agent\Agent;
?>
<?php if($categories->count()): ?>
<div id="research" class="mb-4">
   <h4 class="content-heading">Nghiên cứu</h4>
   <?php if($categories->count()): ?>
   <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="nav-item">
         <a href="#<?php echo e($item->slug); ?>" class="nav-link <?php echo e($key==0?'active':''); ?>" data-bs-toggle="tab" role="tab"><?php echo e($item->name); ?></a>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </ul>
   <?php endif; ?>
   <div class="tab-content">
      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="tab-pane fade <?php echo e($key==0?'show active':''); ?>" id="<?php echo e($item->slug); ?>" role="tabpanel">
            <?php
               $limit = 3;
               if($agent->isMobile())
                  $limit = 4;
               $researchs = $item->post()->limit($limit)->get();
            ?>
            <div class="row mx-n2">
               <?php $__currentLoopData = $researchs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <div class="col-lg-4 col-md-4 col-6 px-2 mb-2">
                  <?php echo $__env->make($templatePath .'.research.research-item', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
               </div>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div id="btn-show-more" class="mt-3">
               <a href="<?php echo e(route('research.detail', $item->slug)); ?>" class="btn-show-more">Show more <i class="ti-arrow-right ti-show-more"></i></a>
            </div>
         </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
</div>
<?php endif; ?><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/research.blade.php ENDPATH**/ ?>