@php
$headerMenuTop = Menu::getByName('Header-menu-top');
$headerMenuBottom = Menu::getByName('Header-menu-bottom');
$headerMenuBottomDropdown = Menu::getByName('Header-menu-bottom-dropdown');
@endphp

        <!-- Start header -->
<div id="header">
    <div class="container">

        <!-- Navbar -->
        <!-- Menu mobile -->
        <div class="menu-mobile">
            <nav class="navbar navbar-dark">
                <a href="/" class="navbar-brand"><img src="{{ asset(setting_option('logo')) }}" alt="" width="200"></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Search-->
                    <div class="input-group d-lg-none my-3">
                        <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                        <input class="form-control rounded-start" type="text" placeholder="Tìm kiếm">
                    </div>
                    <ul class="navbar-nav navbar-mega-nav pe-lg-2 me-lg-2">

                        @foreach($headerMenu as $value)
                            @php
                                $class_active ='';
                            @endphp
                            @if(empty($value['child']))
                                <li class="nav-item "><a class="nav-link {{$class_active}}" href="{{ url($value['link']) }}">{{$value['label']}}</a></li>
                            @else
                                <li class="nav-item dropdown"><a class="nav-link {{$class_active}} dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" href="{{ url($value['link']) }}">{{$value['label']}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($value['child'] as $value_child)
                                        @php
                                            $class_active_child="";
                                        @endphp
                                        @if(empty($value_child['child']))
                                            <li class="dropdown"><a class="nav-link {{$class_active_child}}" href="{{ url($value_child['link']) }}">{{$value_child['label']}}</a></li>
                                        @else
                                            <li class="chev-right {{$class_active_child}}"><a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" href="{{ url($value_child['link']) }}">{{$value_child['label']}}</a></i>
                                                <ul class="dropdown-menu">
                                                    @foreach($value_child['child'] as $value_child_2)
                                                        <li><a class="dropdown-item" href="{{ url($value_child_2['link']) }}">{{$value_child_2['label']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif
                                    @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>

        <!-- Header Top -->
        <div class="row">
            <div id="header-menu-top" class="col-lg-12 col-md-12 col-sm-12">
                <ul class="nav justify-content-end">
                    @if(!Auth::check())
                        <li class="nav-item"><a class="nav-link" href="#register-author" data-bs-toggle="modal">Đăng ký tác giả</a></li>
                        <li class="nav-item"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal">Đăng nhập</a></li>
                    @elseif(auth()->user()->expert == 0)
                        <li class="nav-item"><a class="nav-link" href="#register-author" data-bs-toggle="modal">Đăng ký tác giả</a></li>
                    @endif
                    @foreach($headerMenuTop as $menu)
                        <li class="nav-item"><a class="nav-link" href="{{ url($menu['link']) }}">{{ $menu['label'] }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header between -->
        <div class="header-menu-between row">
            <div id="logo" class="col-lg-3 col-md-3 col-sm-12 d-flex align-self-center">
                <a href="/"><img src="{{ asset(setting_option('logo')) }}" alt=""></a>
            </div>
            <div id="search" class="col-lg-6 col-md-6 col-sm-12">
                <form method="get" action="{{ route('search') }}" class="form-inline my-2 my-lg-0 add-button">
                    <!-- Search-->
                    <div class="input-group d-none d-lg-flex flex-nowrap mx-4">
                        <select class="form-select flex-shrink-0" name="type" style="width: 8rem;">
                           <option>Tất cả</option>
                          <option value="research">Nghiên cứu</option>
                          <option value="document">Tài liệu</option>
                          <option value="product">Thư viện</option>
                        </select>
                        <i class="ci-search position-absolute top-50 end-0 translate-middle-y me-3"></i>
                        <input class="form-control w-100" name="keyword" type="text" placeholder="Search for products">
                    </div>
                </form>
            </div>
            <div id="cart" class="col-lg-3 col-md-3 col-sm-12 d-flex align-items-center justify-content-end">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('wishlist') }}"><img src="{{ asset($templateFile .'/images/heart.svg') }}" alt=""></a>
                    </li>
                    <li class="nav-item dropdown site-cart">
                        <a class="nav-link" href="{{ route('cart') }}" ><img class="icon-header"src="{{ asset($templateFile .'/images/Handbag.svg') }}" alt=""></a>
                        @include($templatePath .'.cart.cart-mini')
                    </li>
                    <li class="nav-item ">
                        @if(Auth::check())
                            <a class="nav-link" href="{{ route('customer.profile') }}" ><img src="{{ asset($templateFile .'/images/user.svg') }}" alt=""></a>
                        @else
                            <a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><img src="{{ asset($templateFile .'/images/user.svg') }}" alt=""></a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <!--End Header between -->


        <!-- Header bottom -->
        <div class="row">
            <div id="header-menu-bottom" class="col-lg-12 col-md-12 col-sm-12">
                @include($templatePath .'.layouts.menu-main')
            </div>
        </div>
        <!-- End Header Bottom -->

        <!-- End Nav Bar -->
    </div>
</div>
<!-- End header -->

@include('auth.form-customer')

@if(!Auth::check())
@push('after-footer')
<script>
    
</script>
@endpush
@endif