@extends($templatePath .'.layout')

@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection

@section('content')


<section class="space-ptb">
  <div class="bg-white py-3 mb-3 ">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="{{ route('research') }}">Nghiên cứu</a>
            </li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 mb-0">Nghiên cứu</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
        @if(count($posts)>0)
            @foreach($posts as $post)
            <div class="col-lg-3 col-md-2 mb-4">
                @include($templatePath .'.research.research-item', compact('post'))
            </div>
            @endforeach
            <div class="col-12">
              {!! $posts->links() !!}
            </div>
        @endif
    </div>
  </div>
</section>

@endsection