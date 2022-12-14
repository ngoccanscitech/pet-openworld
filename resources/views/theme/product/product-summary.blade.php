<div class="product-single__meta mt-lg-0 mt-3">
   <h1 class="product-single__title">{{ $product->name }}</h1>
   @if($product->sku)
      <div class="prInfoRow mb-3 d-flex flex-wrap">
         @if($product->sku)
         <div class="product-sku me-2">SKU: <span class="variant-sku">{{ $product->sku }}</span></div>
         @endif
         @if(isset($brand) && $brand != '')
         <div class="product-brand me-2">Thương Hiệu: <span class="variant-sku">{{ $brand }}</span></div>
         @endif
         @if(isset($element) && $element != '')
         <div class="product-element"><a href="{{ route('shop', ['element' => $element]) }}">Sản phẩm cùng thành phần</a></div>
         @endif
      </div>
   @endif
   <div class="product-single__price product-single__price-product-template d-flex align-items-center mb-3">
      {!! $product->showPriceDetail() !!}
   </div>
   <div class="product-single__description rte mb-3">
      {!! htmlspecialchars_decode($product->description) !!}
   </div>
   <form method="post" action="{{ route('cart.ajax.add') }}" id="product_form_addCart" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
      <input type="hidden" name="product" value="{{ $product->id }}">
      <div class="product-form product-form-product-template hidedropdown">
         {{--
         <div class="product-single-variations">
            @include($templatePath .'.product.includes.product-variations')
         </div>
         <div class="product-action clearfix">
            <div class="shopify-payment-button" data-shopify="payment-button">
               <a href="javascript:;" class="shopify-payment-button__button--unbranded" data-bs-toggle="modal" data-bs-target="#modalContact">Liên hệ tư vấn</a>
            </div>
         </div>
         --}}
         <!-- Product Action -->
         <div class="product-action clearfix">
            <div class="product-form__item--quantity mb-3">
               <div class="wrapQtyBtn d-flex align-items-center">
                  <span class="me-2">Số lượng:</span>
                  <div class="qtyField">
                     <a class="qtyBtn minus" href="javascript:void(0);">-</a>
                     <input type="text" id="Quantity" name="qty" value="1" class="product-form__input qty">
                     <a class="qtyBtn plus" href="javascript:void(0);">+</a>
                  </div>
               </div>
            </div>
            <div class="product-btn-group d-flex w-100">
               <div class="product-form__item--submit">
                  <button type="button" name="add" class="btn product-form__cart-add btn-radius btn-primary w-100">
                  <img src="{{ $templateFile . '/images/cart-white.png' }}" height="25">
                  <span>Thêm vào giỏ</span>
                  </button>
               </div>
               <div class="shopify-payment-button">
                  <a href="{{ route('shop.buyNow', $product->id) }}" class="quick-buy btn btn-radius btn-danger ms-3">
                  <img src="{{ $templateFile . '/images/flash-icon.png' }}" height="25">
                  MUA NGAY
                  </a>
               </div>
            </div>
         </div>
         <!-- End Product Action -->        
      </div>
   </form>
   <div class="display-table shareRow d-none">
      <div class="display-table-cell">
         <div class="social-sharing">
            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
            <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
            </a>
            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
            <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
            </a>
            <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share">
            <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
            </a>
            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
            <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
            </a>
            <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
            <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
            </a>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalContact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            ...
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>