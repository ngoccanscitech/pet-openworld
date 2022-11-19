<?php
   $agent = new Jenssegers\Agent\Agent;
   $limit = 3;
   if($agent->isMobile())
      $limit = 4;

   $dataSearch = [
      'sort_order'   => 'id__desc',
      'limit'   => $limit
   ];
   $posts_new = (new \App\Model\Document)->getList($dataSearch);

   $dataSearch = [
      'sort_order'   => 'view__desc',
      'limit'   => $limit
   ];
   $posts_related = (new \App\Model\Document)->getList($dataSearch);

   $data_search = [
      'limit'   => $limit,
   ];
   $best_downloads = (new \App\Model\DocumentStatistical)->getList($data_search);
?>
<div id="document" class="mb-4">
   <h4 class="content-heading">Tài liệu</h4>

   <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
      <li class="nav-item ">
         <a class="nav-link active" href="#document-hot"  data-bs-toggle="tab" role="tab">Tải nhiều nhất tháng</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#document-new"  data-bs-toggle="tab" role="tab">Tài liệu mới</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#document-related"  data-bs-toggle="tab" role="tab">Phổ biến nhất</a>
      </li>
   </ul>

   <div class="tab-content">
      <div class="tab-pane fade show active" id="document-hot" role="tabpanel">
         <div class="row mx-n2">
            <?php $__currentLoopData = $best_downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-6 px-2 mb-2">
               <?php echo $__env->make($templatePath .'.document.document-item', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
         <div id="btn-show-more" class="mt-3">
            <a href="<?php echo e(route('document', ['download' => 'desc'])); ?>" class="btn-show-more">Show more <i class="ti-arrow-right ti-show-more"></i></a>
         </div>
      </div>
      <div class="tab-pane fade" id="document-new" role="tabpanel">
         <div class="row mx-n2">
            <?php $__currentLoopData = $posts_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-6 px-2 mb-2">
               <?php echo $__env->make($templatePath .'.document.document-item', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
         <div id="btn-show-more" class="mt-3">
            <a href="<?php echo e(route('document', ['sort' => 'id__asc'])); ?>" class="btn-show-more">Show more <i class="ti-arrow-right ti-show-more"></i></a>
         </div>
      </div>
      <div class="tab-pane fade" id="document-related" role="tabpanel">
         <div class="row mx-n2">
            <?php $__currentLoopData = $posts_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-4 col-6 px-2 mb-2">
               <?php echo $__env->make($templatePath .'.document.document-item', compact('post'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </div>
         <div id="btn-show-more" class="mt-3">
            <a href="<?php echo e(route('document', ['sort' => 'view__asc'])); ?>" class="btn-show-more">Show more <i class="ti-arrow-right ti-show-more"></i></a>
         </div>
      </div>
   </div>

</div><?php /**PATH C:\wamp64\www\expro\Laravel\oppenworld\resources\views/theme/block/document.blade.php ENDPATH**/ ?>