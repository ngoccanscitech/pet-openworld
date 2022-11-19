@extends($templatePath .'.layout')

@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection


@section('content')

<!-- Page Title-->
<div class="py-4" style="background: #d9d9d9;">
  <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
    <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a></li>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Nghiên cứu</li>
        </ol>
      </nav>
    </div>
    <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
      <h1 class="h4 mb-0">{{ $post->name }}</h1>
    </div>
  </div>
</div>

<!--=================================
blog-detail -->
<section class="space-ptb pt-3">
  <div class="container">
    <div class="row pt-4 mt-md-2">
        <div class="col-lg-8">
          <div class="blog-detail">
            <div class="blog-post">
              <div class="blog-post-content border-0">
                {!! htmlspecialchars_decode($post->content) !!}
              </div>
              <hr>
              <div class="mt-3">
                <span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Share post:</span>
                <a class="btn-social bs-facebook me-2 mb-2" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&amp;t={{$post->title}}"><i class="ci-facebook"></i></a>
                <a class="btn-social bs-twitter me-2 mb-2" href="http://twitter.com/share?text=text goes here&url={{ url()->current() }}"><i class="ci-twitter"></i></a>
                <a class="btn-social bs-pinterest me-2 mb-2" href="tps://www.instagram.com/?url={{ url()->current() }}"><i class="ci-pinterest"></i></a>
              </div>
            </div>
          </div>

          <h6 class="text-primary mt-4">Tài liệu liên quan</h6>
          <ul class="pl-3">
            @if(count($news_featured)>0)
              @foreach($news_featured as $item)
              <li>
                <a class="text-dark" href="{{ route('document.detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
              </li>
              @endforeach
            @endif
          </ul>
        </div>
        <div class="col-lg-4">
          <!-- Sidebar-->
          <div class="offcanvas offcanvas-collapse offcanvas-end border-start ms-lg-auto" id="blog-sidebar" style="max-width: 22rem;">
            <div class="offcanvas-header align-items-center shadow-sm">
              <h2 class="h5 mb-0">Sidebar</h2>
              <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body py-grid-gutter py-lg-1 px-lg-4" data-simplebar data-simplebar-auto-hide="true">
              <div class="widget mb-grid-gutter pb-grid-gutter border-bottom mx-lg-2">
                <h3 class="widget-title">Tài liệu mới</h3>
                @if(count($news_featured)>0)
                  @foreach($news_featured as $item)
                  <div class="d-flex align-items-center mb-3">
                    <a class="flex-shrink-0" href="blog-single.html"><img class="rounded" src="{{ asset($item->image) }}" width="64" alt="{{ $item->name }}"></a>
                    <div class="ps-3">
                      <h6 class="blog-entry-title fs-sm mb-0"><a href="{{ route('news.single', ['id' => $item->id, 'slug' => $item->slug], true, $lc) }}">{{ $item->name }}</a></h6>
                    </div>
                  </div>
                  @endforeach
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!--=================================
blog-detail -->
 @push('after-footer')
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
    <script>
      jQuery(document).ready(function($) {
        $('.view-phone').click(function(event) {
          var phone = '{{ Helpers::get_option_minhnn('zalo') }}';
          $(this).find('span').text(phone);
          $(this).attr('href', 'tel:' + phone);
        });
      });

    </script>
  @endpush

@endsection