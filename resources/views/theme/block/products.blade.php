@php
   $data_search = [
      'sort_order'   => "id__desc"
   ];
   $products = (new \App\Product)->getList($data_search);
@endphp

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
         @foreach($products as $product)
         <div class="col-lg-4 col-md-4 col-6 px-2">
            @include($templatePath . '.product.product-item', compact('product'))
         </div>
         @endforeach
      </div>
   </div>
</div>