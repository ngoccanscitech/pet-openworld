@php
   //$researchs = \App\Model\Research::where('status', 1)->orderBy('sort', 'asc')->orderBy('id', 'desc')->limit(3)->get();
   $categories = \App\Model\ResearchCategory::where('status', 1)->orderBy('sort', 'asc')->limit(5)->get();
   $agent = new Jenssegers\Agent\Agent;
@endphp
@if($categories->count())
<div id="research" class="mb-4">
   <h4 class="content-heading">Nghiên cứu</h4>
   @if($categories->count())
   <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
      @foreach($categories as $key => $item)
      <li class="nav-item">
         <a href="#{{ $item->slug }}" class="nav-link {{ $key==0?'active':'' }}" data-bs-toggle="tab" role="tab">{{ $item->name }}</a>
      </li>
      @endforeach
   </ul>
   @endif
   <div class="tab-content">
      @foreach($categories as $key => $item)
         <div class="tab-pane fade {{ $key==0?'show active':'' }}" id="{{ $item->slug }}" role="tabpanel">
            @php
               $limit = 3;
               if($agent->isMobile())
                  $limit = 4;
               $researchs = $item->post()->limit($limit)->get();
            @endphp
            <div class="row mx-n2">
               @foreach($researchs as $post)
               <div class="col-lg-4 col-md-4 col-6 px-2 mb-2">
                  @include($templatePath .'.research.research-item', compact('post'))
               </div>
               @endforeach
            </div>
            <div id="btn-show-more" class="mt-3">
               <a href="{{ route('research.detail', $item->slug) }}" class="btn-show-more">Show more <i class="ti-arrow-right ti-show-more"></i></a>
            </div>
         </div>
      @endforeach
   </div>
</div>
@endif