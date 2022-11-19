@extends($templatePath .'.layouts.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 offset-lg-4 offset-md-2">
                <div class="my-3 py-3 page-register">
                    <h1 class="fs-5 text-center text-uppercase">{{ __('register') }}</h1>
                    @include($templatePath .'.auth.registration-form')
                </div>
            </div>
        </div>
    </div>
@endsection