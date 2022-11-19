@php
$sale = 0;
if($product->promotion){
    $sale = round(100 - ($product->promotion * 100 / $product->price));
}
@endphp
<div class="card product-item text-justify card-custom">
   <div class="product__thump">
      <div class="product-image">
         <a href="{{ route('shop.detail', $product->slug) }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" onerror="if (this.src != '{{ asset('assets/images/no-image.jpg') }}') this.src = '{{ asset('assets/images/no-image.jpg') }}';" class="card-img-top">
         </a>
      </div>
      <div class="product-action">
         <a href="#" class="icon-box quick-view" data-id="{{ $product->id }}">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <title>Quick view</title>
               <rect width="32" height="32" class="background-svg" rx="5" fill="white"/>
               <path class="styled-element" d="M16 9.24927C8.5 9.24927 5.5 16 5.5 16C5.5 16 8.5 22.7493 16 22.7493C23.5 22.7493 26.5 16 26.5 16C26.5 16 23.5 9.24927 16 9.24927Z" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               <path class="styled-element" d="M16 19.7501C18.0711 19.7501 19.75 18.0711 19.75 16.0001C19.75 13.929 18.0711 12.2501 16 12.2501C13.9289 12.2501 12.25 13.929 12.25 16.0001C12.25 18.0711 13.9289 19.7501 16 19.7501Z" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </a>
         <a href="#" class="icon-box">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <title>Add cart</title>
               <rect class="background-svg" width="32" height="32" rx="5" fill="white"/>
               <path class="styled-element" d="M23.8438 11H8.1562C7.96517 11 7.78086 11.0756 7.63852 11.2124C7.49618 11.3492 7.40581 11.5375 7.38472 11.7413L6.00475 25.0746C5.99269 25.1911 6.00366 25.309 6.03693 25.4206C6.0702 25.5323 6.12503 25.6351 6.19784 25.7224C6.27065 25.8098 6.35979 25.8796 6.45946 25.9275C6.55912 25.9753 6.66706 26 6.77623 26H25.2238C25.3329 26 25.4409 25.9753 25.5405 25.9275C25.6402 25.8796 25.7294 25.8098 25.8022 25.7224C25.875 25.6351 25.9298 25.5323 25.9631 25.4206C25.9963 25.309 26.0073 25.1911 25.9953 25.0746L24.6153 11.7413C24.5942 11.5375 24.5038 11.3492 24.3615 11.2124C24.2191 11.0756 24.0348 11 23.8438 11Z" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               <path class="styled-element" d="M12 14V10.4444C12 9.2657 12.4214 8.13524 13.1716 7.30175C13.9217 6.46825 14.9391 6 16 6C17.0609 6 18.0783 6.46825 18.8284 7.30175C19.5786 8.13524 20 9.2657 20 10.4444V14" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </a>
         <a href="javascript:;" class="icon-box add-to-wishlist {{ $product->wishlist() ? 'active': '' }}" data="{{ $product->id }}">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <title>Like</title>
               <rect class="background-svg" width="32" height="32" rx="5" fill="white"/>
               <path class="styled-element" d="M16.5303 23.864L24.1271 16.2672C25.9937 14.4006 26.2691 11.3298 24.5027 9.3681C24.0602 8.87532 23.522 8.47786 22.9208 8.19996C22.3197 7.92206 21.6682 7.76956 21.0062 7.75175C20.3441 7.73395 19.6854 7.85122 19.0702 8.09641C18.455 8.3416 17.8962 8.70956 17.4279 9.17785L16 10.6057L14.7672 9.3729C12.9006 7.50629 9.82976 7.23091 7.86811 8.99734C7.37533 9.43981 6.97786 9.97803 6.69997 10.5792C6.42207 11.1803 6.26956 11.8318 6.25176 12.4938C6.23396 13.1559 6.35123 13.8146 6.59642 14.4298C6.84161 15.045 7.20957 15.6038 7.67786 16.0721L15.4697 23.864C15.6103 24.0046 15.8011 24.0836 16 24.0836C16.1989 24.0836 16.3897 24.0046 16.5303 23.864V23.864Z" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </a>
         <a href="#" class="icon-box">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <title>Share</title>
               <rect width="32" height="32" class="background-svg" rx="5" fill="white"/>
               <path class="styled-element" d="M20.5 18.25L25 13.75L20.5 9.25" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               <path class="styled-element" d="M22 24.25H7.75C7.55109 24.25 7.36032 24.171 7.21967 24.0303C7.07902 23.8897 7 23.6989 7 23.5V12.25" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               <path class="styled-element" d="M11.0337 20.5C11.5332 18.568 12.6603 16.8567 14.2381 15.635C15.8158 14.4132 17.7547 13.7502 19.7501 13.75H25.0001" stroke="#111214" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
         </a>
      </div>
   </div>
   <div class="card-body">
      <p class="cart-text">
         <small class="text-muted  good-book">Sách hay</small>
         <span class="rating-star">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
         </span>
      </p>
      <a href="{{ route('shop.detail', $product->slug) }}">
         <h5 class="card-title">{{ $product->name }}</h5>
      </a>
      <p class="cart-text"><b>MICHAEL ALICE</b></p>
      @if($product->promotion)
      <div class="product-price d-flex flex-wrap align-items-center">
          <span class="price px-2">{!! render_price($product->promotion) !!}</span>
          <del class="fs-sm text-muted px-2">{!! render_price($product->price) !!}</del>
      </div>
      @elseif($product->price>0)
      <div class="product-price d-flex align-items-center">
         <span class="price">{!! render_price($product->price) !!}</span>
         @if($product->unit != '')
         <span>/ 1 {{ $product->unit }}</span>
         @endif
      </div>
      @else
      <div class="product-price d-flex justify-content-center align-items-center">
          <span class="text-accent me-1">Liên hệ</span>
      </div>
      @endif
      
   </div>
</div>