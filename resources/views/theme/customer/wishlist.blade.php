@extends($templatePath .'.layout')
@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection

@section('content')

    <section class="space-ptb my-5 ">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <div class="section-title mb-0 mt-4">
                        <h3 class="d-inline">Wishlists</h3>
                    </div>
                </div>
            </div>
            <div class="row mx-n2">
                @isset($wishlist)
                    @foreach($wishlist as $product)
                        <div class="col-lg-3 col-md-4 col-6 px-2">
                            @include($templatePath .'.product.product-item', compact('product'))
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <img src="{{ asset('assets/images/empty-state.svg') }}" alt="">
                    </div>
                @endisset
            </div>
        </div>
    </section>

    
    @push('after-footer')
    <script src="{{ asset('theme/js/customer.js') }}"></script>
    @endpush
@endsection
