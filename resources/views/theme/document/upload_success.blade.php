@extends($templatePath .'.layout')
@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection


@section('content')
	<div class="container py-5 my-lg-5">
		{!! htmlspecialchars_decode($page->content) !!}
	</div>
@endsection

@push('styles')
@endpush
@push('scripts')
@endpush