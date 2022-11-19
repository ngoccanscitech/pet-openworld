@extends($templatePath .'.layout')

@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection


@section('content')

<section class="container pb-md-4 mt-4">
   <!-- Product-->
   <div class="bg-light shadow-lg rounded-3 px-4 py-lg-4 py-3 mb-5">
      <div class="py-lg-3 py-2 px-lg-3">
         <div class="row gy-4">
            <!-- Product image-->
            <div class="col-lg-5">
               <div class="position-relative rounded-3 overflow-hidden mb-lg-4 mb-2">
                  <img class="image-zoom" src="{{ $post->image }}" data-zoom="{{ $post->image }}" alt="{{ $post->name }}<">
                  <div class="image-zoom-pane"></div>
               </div>
            </div>
            <!-- Product details-->
            <div class="col-lg-7">
               <div class="ps-xl-5 ps-lg-3">
                  <!-- Meta-->
                  <h2 class="h4 mb-3">{{ $post->name }}</h2>
                  <div class="d-flex align-items-center flex-wrap text-nowrap mb-sm-4 mb-3 fs-sm">
                     <div class="mb-2 me-sm-3 me-2 text-muted"><i class="ci-time me-1 fs-base mt-n1 align-middle"></i> {{ date('d/m/Y', strtotime($post->created_at)) }}</div>
                     <div class="mb-2 me-sm-3 me-2 ps-sm-3 ps-2 border-start text-muted"><i class="ci-eye me-1 fs-base mt-n1 align-middle"></i>{{ $post->view }} </div>
                     <div class="mb-2 me-sm-3 me-2 ps-sm-3 ps-2 border-start text-muted"><i class="ci-download me-1 fs-base mt-n1 align-middle"></i>40 </div>
                  </div>
                  @if($user)
                  <div class="row row-cols-sm-2 row-cols-1 gy-3 gx-4 mb-4 pb-md-2">
                     <!-- Creator-->
                     <div class="col">
                        <div class="card position-relative h-100">
                           <div class="card-body p-3">
                              <h3 class="h6 mb-2 fs-sm text-muted">Tác giả</h3>
                              <div class="d-flex align-items-center">
                                 <div class="img-rounded rounded-circle" style="width: 32px; height: 32px;overflow: hidden;">
                                    <img class=" me-2" src="{{ $user->avatar??'/upload/images/general/author.png' }}" width="32" alt="Avatar" style="object-fit: cover;width: 100%; height: 100%;">
                                 </div>
                                 <a class="nav-link-style stretched-link fs-sm ms-2" href="{{ route('author.detail', $user->id) }}">{{ $user->fullname }}</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  <!-- Description-->
                  <div class="mb-4 pb-md-2 fs-sm">
                     {!! htmlspecialchars_decode( $post->description ) !!}
                  </div>
                  @if($post->priceFinal())
                  <div class="row row-cols-sm-2 row-cols-1 gy-3 mb-4 pb-md-2">
                    <div class="col">
                      <h3 class="h6 mb-2 fs-sm text-muted">Giá</h3>
                      <h2 class="h3 mb-1">{!! render_price($post->priceFinal()) !!}</h2>
                    </div>
                  </div>
                  @endif

                  @if(auth()->check())
                  <a class="btn btn-lg btn-primary d-block w-100 mb-4 btn-download" href="#confirmDownload" data-bs-toggle="modal"><i class="ci-download me-1"></i> Download</a>
                  @else
                  <a class="btn btn-lg btn-primary d-block w-100 mb-4 btn-download" href="#signin-modal" data-bs-toggle="modal"><i class="ci-download me-1"></i> Download</a>
                  @endif
                  <div class="pt-2 text-lg-start text-center">
                     <button class="btn btn-secondary rounded-pill btn-icon me-sm-3 me-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Favorites"><i class="ci-heart"></i></button>
                     <button class="btn btn-secondary rounded-pill btn-icon me-sm-3 me-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Share"><i class="ci-share-alt"></i></button>
                     <button class="btn btn-secondary rounded-pill btn-icon me-sm-3 me-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Flag"><i class="ci-flag"></i></button>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@if(auth()->check())
<div class="modal fade" id="confirmDownload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Xác nhận download</h5>
                <h5 class="modal-team mb-0" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('download.comfirm') }}" id="view-tip-match">
                    @csrf()
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-content">
                        <div class="list-content-loading">
                           <div class="half-circle-spinner">
                              <div class="circle circle-1"></div>
                              <div class="circle circle-2"></div>
                           </div>
                        </div>
                        <p>Để download tài liệu bạn sẽ bị trừ phí: <b>{!! render_price( $post->priceFinal() ) !!}</b></p>
                        <p>Bấm xác nhận để tiếp tục download</p>

                        <div class="btn-view text-center">
                           <a class="btn btn-primary btn-sm download_access">Xác nhận</a>
                        </div>
                    </div>
                 
                </form>
            </div>
            
        </div>
    </div>
</div>
@endif

@if($post_featured->count())
<section class="pb-5 mb-2 mb-xl-4">
   <div class="container">
      <h2 class="h3 pb-2 mb-grid-gutter text-center">Tài liệu liên quan</h2>
      <div class="tns-carousel tns-controls-static tns-controls-outside tns-nav-enabled">
         <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;gutter&quot;: 16, &quot;controls&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1}, &quot;480&quot;:{&quot;items&quot;:2}, &quot;720&quot;:{&quot;items&quot;:3}, &quot;991&quot;:{&quot;items&quot;:2}, &quot;1140&quot;:{&quot;items&quot;:3}, &quot;1300&quot;:{&quot;items&quot;:4}, &quot;1500&quot;:{&quot;items&quot;:5}}}">
            @foreach($post_featured as $post)
            <div>
               @include($templatePath . '.document.document-item', compact('post'))
            </div>
            @endforeach
         </div>
      </div>
   </div>
</section>

@endif
@endsection

@push('scripts')
   <script type="text/javascript">
      // download
      $(document).on('click', '.download_access', function(){
         var action = $(this).closest('form').attr('action'),
           form = document.getElementById('view-tip-match'),
           fdnew = new FormData(form);

         $(this).closest('form').find('.list-content-loading').show();
         axios({
            method: 'post',
            url: action,
            data: fdnew
         }).then(res => {
            if(!res.data.error)
            {
               /*setTimeout(function(){
                  location.reload();
               }, 1000);*/
               window.location.href = res.data.file;
            }

            $('.form-content').html(res.data.message);

            var myModalEl = document.getElementById('confirmDownload')
            myModalEl.addEventListener('hidden.bs.modal', function (event) {
              location.reload();
            })
         }).catch(e => console.log(e));
      });
     // xem tip match
   </script>
@endpush