<footer>
    <div id="footer" class="footer-light">
        <div class="container">
            <div class="row pt-34">
                <div id="contact" class="col-lg-4 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 logo-small">
                            <a href="#">
                                <img src="assets/images/footer-logo.png" alt="" class="w-100">
                            </a>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <h5 class="has-drop-footer1">Liên hệ</h5>
                            <div class="footer-navbar1">
                                <p class="d-flex align-items-center mb-30">
                                    <a class="contact-item" href="mailto:tuyendung@example.com">
                                        <img src="assets/images/icon-mail.svg" alt=""><span class="info-contact">tuyendung@example.com</span>
                                    </a>
                                </p>
                                <p class="d-flex align-items-center mb-30">
                                    <a class="contact-item" href="tel:+0522255555">
                                        <img src="assets/images/icon-phone.svg" alt=""><span class="info-contact">0522255555</span>
                                    </a>
                                </p>
                                <p class="d-flex align-items-center mb-30">
                                    <img src="assets/images/icon-location.svg" alt=""><span class="info-contact">Ngã tư sở, Thanh Xuân, Hà Nội</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="row">
                        <div id="about" class="col-lg-6 col-md-6 col-sm-12">
                            <h5 class="has-drop-footer2">Về công ty</h5>
                            <div class="footer-navbar2">
                                <p><a href="#" class="menu-item-footer">Giới thiệu OPPENWORLD</a></p>
                                <p><a href="#" class="menu-item-footer">Tuyển dụng</a></p>
                                <p><a href="#" class="menu-item-footer">Điều khoản</a></p>
                                <p><a href="#" class="menu-item-footer">Thanh toán</a></p>
                                <p><a href="#" class="menu-item-footer">Chính sách bảo mật</a></p>
                            </div>
                        </div>
                        <div id="support" class="col-lg-6 col-md-6 col-sm-12">
                            <h5 class="has-drop-footer3">Hỗ trợ</h5>
                            <div class="footer-navbar3">
                                <p><a href="#" class="menu-item-footer">Chính sách bảo mật</a></p>
                                <p><a href="#" class="menu-item-footer">Chính sách đổi trả</a></p>
                                <p><a href="#" class="menu-item-footer">Hướng dẫn mua hàng</a></p>
                                <p><a href="#" class="menu-item-footer">Quy định sử dụng</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="register" class="col-lg-4 col-md-6 col-sm-12">
                    <h5>Đăng ký nhận email</h5>
                    <p>Đăng ký nhận thông tin sách mới, sách bán</p>
                    <div class="form-register-email">
                        <form action="{{ route('subscription') }}" class="my-2">
                            <input type="text" name="your_email" placeholder="Nhập email của bạn">
                            <button class="my-2 btn-subscription" type="button">Gửi</button>
                        </form>
                    </div>
                    <div class="contact-social my-3">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer -->

    @include($templatePath .'.parts.notify')

</footer>