@php
   $url = route('document.detail', $post->slug);
   $user = \App\User::find($post->user_id);
@endphp
<div class="card product-item document-item text-justify card-custom">
   <a href="{{ $url }}" title="{{ $post->name }}" class="rectangle-img">
      <div class="img">
         <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="card-img-top">
      </div>
   </a>
   <div class="card-body">
      <a href="{{ $url }}" title="{{ $post->name }}">
         <h5 class="card-title text">{{ $post->name }}</h5>
      </a>
      @if( !empty($user) )
      <p class="cart-text">{{ $user->fullname }}</p>
      @endif
      <p class="cart-info mt-1">
         <span><i class="ti-eye"></i><span>{{ number_format($post->view) }}</span></span>
         <span><i class="ti-download"></i><span>123.222</span></span>
      </p>
   </div>
</div>