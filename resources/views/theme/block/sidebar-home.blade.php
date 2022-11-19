@php
   $menu_tags = Menu::getByName('Menu-tag');

   $tintuc = \App\NewsCategory::find(1);
   $news_featured = $tintuc->news()->where('status', 1)->limit(4)->get();

   $ads_1 = \App\Model\Slider::where('slider_id', 71)->get();
   $ads_2 = \App\Model\Slider::where('slider_id', 73)->get();

   $documents = \App\Model\Document::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(4)->get();
@endphp

@if($news_featured->count())
<div id="notify">
   <div id="notify-header" class="px-3">
      <h4>Thông báo mới</h4>
   </div>
   <div id="notify-content">
      <div class="padding-custom-12">
         @foreach($news_featured as $post)
         <a href="{{ route('news.category', $post->slug) }}">
            <div class="d-flex py-2">
               <div class="img">
                  <img src="{{ asset($post->image) }}" alt="" class="w-100">
               </div>
               <div class="item-content ms-3">
                  <p class="item-introduce">{{ $post->name }}</p>
               </div>
            </div>
         </a>
         @endforeach
      </div>
   </div>
</div>
@endif

@if($ads_1->count())
@foreach($ads_1 as $item)
<div class="mt-35 notify-sale">
   <a href="{{ $item->link ?? 'javascript:;' }}">
      <div class="card">
         <img src="{{ asset($item->src) }}" alt="{{ $item->name }}" class="card-img">
      </div>
   </a>
</div>
@endforeach
@endif

@if($documents->count())
<div id="notify" class="mt-35">
   <div id="notify-header" class="px-3">
      <h4>Đọc nhiều</h4>
   </div>

   <div id="notify-content">
      <div class="padding-custom-12">
         @foreach($documents as $post)
         <a href="{{ route('document.detail', $post->slug) }}">
            <div class="d-flex py-2">
               <div class="img">
                  <img src="{{ asset($post->image) }}" alt="" class="w-100">
               </div>
               <div class="item-content ms-3">
                  <p class="book-title">{{ $post->name }}</p>
                  @if( !empty($post->author) )
                  <p class="book-author">{{ $post->author }}</p>
                  @endif
               </div>
            </div>
         </a>
         @endforeach
      </div>
   </div>
   
</div>
@endif

@if(!empty($menu_tags))
<div id="notify" class="mt-35">
   <div id="notify-header" class="px-3">
      <h4>Tag</h4>
   </div>
   <div class="btn-tag py-2">
      @foreach($menu_tags as $item)
      <a href="{{ url($item['link']) }}">{{ $item['label'] }}</a>
      @endforeach
   </div>
</div>
@endif

@if($ads_2->count())
@foreach($ads_2 as $item)
<div class="mt-35 notify-sale">
   <a href="{{ $item->link ?? 'javascript:;' }}">
      <div class="card">
         <img src="{{ asset($item->src) }}" alt="{{ $item->name }}" class="card-img">
      </div>
   </a>
</div>
@endforeach
@endif