@php
    $states = \App\Model\Province::get();
@endphp

@extends($templatePath .'.layout')
@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection


@section('content')

<!-- Page Title-->
<div class="page-title-overlap bg-gray pt-4" style="background: #d9d9d9;">
   <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
               <li class="breadcrumb-item"><a class="text-nowrap" href="/"><i class="ci-home"></i>Home</a></li>
               </li>
               <li class="breadcrumb-item text-nowrap active" aria-current="page">Tác giả</li>
            </ol>
         </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
         <h1 class="h3 mb-0">Tác giả</h1>
      </div>
   </div>
</div>
<!-- Page content-->
<section class="container mb-4">
   <div class="mt-lg-2">
      <div class="vendor-img">
         <img class="rounded-circle border border-3 d-lg-block d-none" src="{{ $user->avatar??'/upload/images/general/author.png' }}" width="140" alt="Avatar">
      </div>
      <div class="d-lg-none d-flex align-items-center justify-content-center">
         <img class="rounded-circle me-2" src="img/nft/vendor/avatar-sm.png" width="36" alt="Avatar">
         <h6 class="mb-0 text-light">Robert Fox</h6>
      </div>
   </div>
   <div class="row">
      <!-- Sidebar-->
      <aside class="col-lg-3 pt-lg-4">
         @include($templatePath .'.author.sidebar')
      </aside>
      <!-- Content-->
      <div class="col-lg-9 mt-lg-n5 mt-5 pt-lg-2 pt-3">
         <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-lg-4 mb-3 pb-md-1">
         <div class="tab-content">
            @if($posts->count())
            <div class="row mx-n2">
               @foreach($posts as $post)
                  <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-3">
                     @include($templatePath .'.document.document-item')
                  </div>
               @endforeach
            </div>
            <!-- Load more-->
            <button class="btn btn-outline-accent d-block w-100 mt-sm-4 mt-3"><i class="ci-reload me-2"></i>Load more</button>
            @else
               <p>Tác giả chưa có tài liệu được đăng</p>
            @endif
         </div>
      </div>
   </div>
</section>
@endsection

@push('after-footer')
<script src="{{ asset('theme/js/customer.js') }}"></script>
@endpush
