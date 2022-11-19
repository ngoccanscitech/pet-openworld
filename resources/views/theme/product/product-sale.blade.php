@extends($templatePath .'.layouts.index')

@section('content')
<div class="container mt-4">
    <div class="row">
        <aside class="col-lg-3">
            @include($templatePath .'.product.sidebar')
        </aside>

        <section class="col-lg-9">
            <div class="collection-header mt-2 mb-4">
                <div class="d-flex flex-wrap justify-content-end">
                    <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4">
                        <label class="fs-sm text-nowrap me-2 d-none d-sm-block" for="sorting">SẮP XẾP THEO:</label>
                        <select class="form-select" id="sorting">
                            <option value="id__desc">Mới nhất</option>
                            <option value="id__asc">Cũ nhất</option>
                            <option value="price__asc">Giá tăng dần</option>
                            <option value="price__esc">Giá giảm dần</option>
                            <option value="name__desc">Từ A - Z</option>
                            <option value="name__asc">Từ Z - A</option>
                        </select>
                    </div>
                  </div>
            </div>
            <!--End Collection Banner-->
            <div class="row mx-n2">
                @foreach($products as $product)
                <div class="col-md-4 col-sm-6 px-2 mb-4">
                    @include($templatePath .'.product.product-item', compact('product'))
                </div>
                @endforeach
            </div>
            <!--Pagination-->
            <hr class="clear">
            <div class="mt-3">
                {!! $products->links() !!}
            </div>
        </section>
    </div>
</div>

{{--@include($templatePath . '.product.product-viewed')--}}

@endsection
