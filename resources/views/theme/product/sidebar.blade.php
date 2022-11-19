@php
  $category_id = $category->id ?? 0;

  $tintuc = \App\NewsCategory::find(1);
  $news_featured = $tintuc->news()->where('status', 1)->limit(4)->get();

  $ads_1 = \App\Model\Slider::where('slider_id', 71)->get();
  $ads_2 = \App\Model\Slider::where('slider_id', 73)->get();

  $documents = \App\Model\Document::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(4)->get();
@endphp
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
        @foreach($categories_list as $category_item)
        <div class="accordion-item">
          <h3 class="accordion-header">
            @if($category_item->children()->count())
              <a class="accordion-button collapsed {{ $category_item->id == $category_id ? 'active' : '' }}" href="#{{ $category_item->slug }}" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="{{ $category_item->slug }}">{{ $category_item->name }}</a>
            @else
             <a class="accordion-button collapsed {{ $category_item->id == $category_id ? 'active' : '' }}" href="{{ route('shop.detail', $category_item->slug) }}">{{ $category_item->name }}</a>
            @endif
         </h3>
         <div class="accordion-collapse collapse" id="{{ $category_item->slug }}" data-bs-parent="#shop-categories">
           <div class="accordion-body">
             <div class="widget widget-links widget-filter">
               <ul class="widget-list widget-filter-list pt-1">
                  <li class="widget-list-item widget-filter-item">
                     <a class="widget-list-link d-flex justify-content-between align-items-center {{ $category_item->id == $category_id ? 'active' : '' }}" href="{{ route('shop.detail', $category_item->slug) }}">
                        <span class="widget-filter-item-text">Xem tất cả</span>
                     </a>
                  </li>
                  @foreach($category_item->children as $item)
                  <li class="widget-list-item widget-filter-item">
                     <a class="widget-list-link d-flex justify-content-between align-items-center {{ $item->id == $category_id ? 'active' : '' }}" href="{{ route('shop.detail', $item->slug) }}">
                        <span class="widget-filter-item-text">{{ $item->name }}</span>
                     </a>
                  </li>
                  @endforeach
               </ul>
             </div>
           </div>
         </div>
         
          
        </div>
        @endforeach
        
      </div>

    </div>
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
      
      
    </div>

</div>