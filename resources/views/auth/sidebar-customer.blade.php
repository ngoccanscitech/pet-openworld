<div class="border bg-white px-2">
                        <div class="agent-contact mb-3">
                            <div class="text-center pt-3">
                                <div class="avatar">
                                  <!-- <img class="img-fluid rounded-circle avatar avatar-xl" src="images/avatar/01.jpg" alt=""> -->
                                    @if(auth()->user()->avatar)
                                        <img src="{{  auth()->user()->avatar }}" alt="">
                                    @else
                                        <i class="far fa-user-circle"></i>
                                    @endif
                                </div>
                                <div class="agent-contact-name mt-2">
                                  <h6>{{ auth()->user()->name }}</h6>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="bg-light p-3">
                            <h6>Số dư tài khoản</h6>
                            <ul class="p-0">
                                <li class="d-flex justify-content-between">
                                    <span>Tài khoản của bạn:</span>
                                    <span>{{ auth()->user()->wallet ? number_format(auth()->user()->wallet) : 0 }} xu</span>
                                </li>
                            </ul>
                            <a href="{{ route('customer.payment.point') }}" class="btn btn-primary btn-sm w-100"> Nạp xu</a>
                        </div>
                        <hr>
                        <div class="widget mb-3">
                            <div class="widget-title text-center">
                                <h6>Quản lý thông tin tài khoản</h6>
                            </div>
                            <a class="dropdown-item" href="{{ route('customer.post') }}">
                                <img src="/upload/images/general/list.svg" class="icon_menu"> Tin đăng của bạn
                            </a>
                            <a class="dropdown-item" href="{{ route('customer.profile') }}">
                                <img src="/upload/images/general/user.svg" class="icon_menu"> Thông tin của bạn
                            </a>
                            <a class="dropdown-item" href="{{ route('customer.payment.history') }}">
                                <img src="/upload/images/general/coint.png" class="icon_menu" width="16"> Quản lý xu
                            </a>
                            <a class="dropdown-item" href="{{ route('customer.changePassword') }}">
                                <img src="/upload/images/general/lock.svg" class="icon_menu"> Thay đổi mật khẩu
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('customer.logout') }}"><img src="/upload/images/general/logout.svg" class="icon_menu"> Logout</a>
                        </div>
                    </div>