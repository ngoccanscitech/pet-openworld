@isset($data)
	@php extract($data) @endphp

	@if($id)
	   @php $sliders = \App\Model\Slider::where('slider_id', $id)->get(); @endphp
	   @if($sliders->count())
		   @foreach($sliders as $item)
		   <div class="mt-35 notify-sale">
	         <a href="{{ $item->link ?? 'javascript:;' }}" title="{{ $item->name }}">
	            <div class="card">
	              <img src="{{ asset($item->src) }}" alt="" class="card-img">
	            </div>
	         </a>
	      </div>
	      @endforeach
	   @endif
	@endif
@endisset