@extends($templatePath .'.layouts.index')

@section('seo')
@include($templatePath .'.layouts.seo', $seo??[] )
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <aside class="col-lg-3">
            @include($templatePath .'.product.sidebar')
        </aside>

        <section class="col-lg-9">
                <form action="" method="get">
                    <div class="collection-header mt-2 mb-4">
                        <div class="d-flex flex-wrap justify-content-end">
                            <div class="d-flex align-items-center flex-nowrap me-3 me-sm-4">
                                <label class="fs-sm text-nowrap me-2 d-none d-sm-block" for="sorting">SẮP XẾP THEO:</label>
                                <select class="form-select" id="sorting" name="sort" onchange="this.form.submit()">
                                    <option value="id__desc" {{ request('sort') == 'id__desc' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="id__asc" {{ request('sort') == 'id__asc' ? 'selected' : '' }}>Cũ nhất</option>
                                    <option value="price__asc" {{ request('sort') == 'price__asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                    <option value="price__desc" {{ request('sort') == 'price__desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                    <option value="name__desc" {{ request('sort') == 'name__desc' ? 'selected' : '' }}>Từ A - Z</option>
                                    <option value="name__asc" {{ request('sort') == 'name__asc' ? 'selected' : '' }}>Từ Z - A</option>
                                </select>
                            </div>
                          </div>
                    </div>
                </form>
                <div class="row mx-n2">
                    @foreach($products as $product)
                    <div class="col-md-4 col-sm-6 px-2 mb-4">
                        @include($templatePath .'.product.product-item', compact('product'))
                    </div>
                    @endforeach
                </div>
                <!--Pagination-->
                <hr class="clear">
                {!! $products->withQueryString()->links() !!}
        </section>
    </div>
</div>

@endsection
