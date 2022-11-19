@php
	$users = \App\User::where('status', 1)->where('expert', 1)->limit(10)->get();
@endphp
@if($users->count())
<div class="container pt-lg-5 py-3">
	<div class="author-hot">
		<h4 class="content-heading">Một số tác giả tiêu biểu</h4>

		<ul class="nav nav-tabs nav-tabs-custom" role="tablist">
	      <li class="nav-item ">
	         <a class="nav-link active" href="#author-hot"  data-bs-toggle="tab" role="tab">Nổi bật nhất tháng</a>
	      </li>
	      <li class="nav-item">
	         <a class="nav-link" href="#author-new"  data-bs-toggle="tab" role="tab">Tác giả mới</a>
	      </li>
	   </ul>

	   <div class="tab-content">
      	<div class="tab-pane fade show active" id="author-hot" role="tabpanel">
      		<div class="px-lg-5">
					<div class="tns-carousel tns-controls-static tns-controls-outside">
						<div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "responsive": {"0":{"items":1, "gutter": 15},"500":{"items":2, "gutter": 18},"768":{"items":4, "gutter": 20}, "1100":{"gutter": 24}}}'>
							@foreach($users as $author)
							<div>
								@include($templatePath .'.author.author-item')
							</div>
							@endforeach

						</div>
					</div>
				</div>
      	</div>
      	<div class="tab-pane fade" id="author-new" role="tabpanel">
      		<div class="px-lg-5">
					<div class="tns-carousel tns-controls-static tns-controls-outside">
						<div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "responsive": {"0":{"items":1, "gutter": 15},"500":{"items":2, "gutter": 18},"768":{"items":4, "gutter": 20}, "1100":{"gutter": 24}}}'>
							@foreach($users as $author)
							<div>
								@include($templatePath .'.author.author-item')
							</div>
							@endforeach

						</div>
					</div>
				</div>
      	</div>
      </div>

		
	</div>
</div>
@endif