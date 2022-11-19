@php
   $url = route('research.detail', $post->slug);
@endphp
<div class="card research-item text-justify card-custom">
   <a href="{{ $url }}" title={{ $post->name }}"">
      <img src="{{ asset($post->image) }}" alt="{{ $post->name }}" class="card-img-top">
   </a>
   <div class="card-body">
      <a href="{{ $url }}" title="{{ $post->name }}">
         <h5 class="card-title text">{{ $post->name }}</h5>
      </a>
      @if( !empty($post->author) )
      <p class="cart-text"><b>Tác giả: </b>{{ $post->author }}</p>
      @endif
      <a href="{{ $url }}" class="btn btn-outline-dark btn-sm">Read more</a>
   </div>
</div>