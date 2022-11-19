<?php
   $data_search = [
      'sort_order'   => "id__desc"
   ];
   $products = (new \App\Product)->getList($data_search);
?>

<div id="library">
   <h4 class="content-heading">Thư viện sách</h4>
   <ul class="main-sub-menu nav mb-4">
      <li class="nav-item first-sub-menu">
         <a class="nav-link active" href="#">Bán chạy nhất</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#">Phổ biến nhất</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="#">Sách mới</a>
      </li>
   </ul>
   <div class="card-deck products-list">
      <div class="row mx-n2">
         <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <div class="col-lg-4 col-md-4 col-6 px-2">
            <?php echo $__env->make($templatePath . '.product.product-item', compact('product'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         </div>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
   </div>
</div><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/theme/block/products.blade.php ENDPATH**/ ?>