<?php if(!Auth::check()): ?>
<div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Đăng nhập</a></li>
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body tab-content py-4">
                <form action="<?php echo e(route('login')); ?>" class="needs-validation tab-pane fade active show" autocomplete="off" novalidate="" id="signin-tab">
                    <div class="list-content-loading">
                        <div class="half-circle-spinner">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="si-email">Email</label>
                        <input class="form-control" type="email" id="si-email" name="email" placeholder="text@example.com" required="">
                        <div class="invalid-feedback">Nhập địa chỉ Email của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="si-password">Mật khẩu</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="si-password" name="password" required="">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 d-flex flex-wrap justify-content-between">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="si-remember">
                            <label class="form-check-label" for="si-remember">Ghi nhớ đăng nhập</label>
                        </div>
                        <a class="fs-sm" href="#">Quên mật khẩu?</a>
                    </div>
                    <div class="error-message" style="display: none;"></div>
                    <button class="btn btn-primary d-block w-100 btn-login" type="button">Đăng nhập</button>
                    <div class="text-center mt-2">
                        <a href="#register-modal" data-bs-toggle="modal" data-bs-dismiss="modal"><b>Bạn chưa có tài khoản, Click vào đây để đăng ký</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="register-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link fw-medium active" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Đăng ký</a></li>
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body tab-content py-4">
                <form class="needs-validation tab-pane fade active show" action="<?php echo e(route('register')); ?>" autocomplete="off" novalidate="" id="signup-tab">
                    <div class="list-content-loading">
                        <div class="half-circle-spinner">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-name">Họ tên *</label>
                        <input class="form-control" type="text" id="su-name" name="fullname" placeholder="Họ tên" required="">
                        <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                    </div>
                    <div class="mb-3">
                        <label for="su-birthday">Ngày sinh *</label>
                        <input class="form-control" type="date" id="su-birthday" name="birthday" required="">
                        <div class="invalid-feedback">Nhập ngày sinh</div>
                    </div>

                    <div class="mb-3">
                        <label for="su-address">Địa chỉ *</label>
                        <input class="form-control" type="text" id="su-address" name="address" required="">
                        <div class="invalid-feedback">Nhập địa chỉ</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="su-phone">Điện thoại *</label>
                        <input class="form-control" type="text" id="su-phone" name="phone" required="">
                        <div class="invalid-feedback">Nhập điện thoại</div>
                    </div>

                    <div class="mb-3">
                        <label for="su-email">Email đăng nhập *</label>
                        <input class="form-control" type="email" id="su-email" name="email" required="">
                        <div class="invalid-feedback">Nhập địa chỉ Email của bạn.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-password">Mật khẩu *</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="su-password" name="password" required="">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="su-password-confirm">Xác nhận mật khẩu *</label>
                        <div class="password-toggle">
                            <input class="form-control" type="password" id="su-password-confirm" name="password_confirmation" required="">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="error-message text-center " style="color: #f00;"></div>
                    </div>
                    <button class="btn btn-primary d-block w-100 btn-register" type="button">Đăng ký</button>
                    <div class="text-center mt-2">
                        <a href="#register-author" data-bs-toggle="modal" data-bs-dismiss="modal"><b>Bạn muốn đăng ký tác giả, Click vào đây để đăng ký</b></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register-author" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link fw-medium active" href="#signup-author" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Đăng ký tác giả</a></li>
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body tab-content py-4">
                <form class="needs-validation tab-pane fade active show" action="<?php echo e(route('register_author')); ?>" autocomplete="off" novalidate="" id="signup-author">
                    <input type="hidden" name="author" value="1">
                    <div class="list-content-loading">
                        <div class="half-circle-spinner">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" for="author-name">Họ tên *</label>
                            <input class="form-control" type="text" id="author-name" name="fullname" placeholder="Họ tên" required="">
                            <div class="invalid-feedback">Vui lòng nhập họ tên.</div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" for="author-birthday">Ngày sinh *</label>
                            <input class="form-control" type="date" id="author-birthday" name="birthday" placeholder="Ngày sinh" required="">
                            <div class="invalid-feedback">Nhập ngày sinh</div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <label class="form-label" for="author-phone">Điện thoại *</label>
                            <input class="form-control" type="text" id="author-phone" name="phone" placeholder="Điện thoại" required="">
                            <div class="invalid-feedback">Nhập điện thoại</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="author-address">Địa chỉ *</label>
                        <input class="form-control" type="text" id="author-address" name="address" placeholder="Địa chỉ" required="">
                        <div class="invalid-feedback">Nhập địa chỉ</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="author-job">Nghề nghiệp *</label>
                            <input class="form-control" type="text" id="author-job" name="job" placeholder="Nghề nghiệp" required="">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="author-edu">Trình độ học vấn *</label>
                            <input class="form-control" type="text" id="author-edu" name="edu" placeholder="Trình độ học vấn" required="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" >Lĩnh vực viết bài *</label>
                        <div>
                            <select class="multi-select2" name="type[]" multiple="multiple" style="width: 100%;">
                                <option value="1">Văn học</option>
                                <option value="2">Lịch sử</option>
                                <option value="3">Thế giới</option>
                                <option value="4">Kinh tế</option>
                                <option value="5">Toán học</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="author-email">Email đăng nhập *</label>
                        <input class="form-control" type="email" id="author-email" name="email" placeholder="Email đăng nhập" required="">
                        <div class="invalid-feedback">Nhập địa chỉ Email của bạn.</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="author-password">Mật khẩu *</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="author-password" name="password" placeholder="Mật khẩu" required="">
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="author-password-confirm">Xác nhận mật khẩu *</label>
                            <div class="password-toggle">
                                <input class="form-control" type="password" id="author-password-confirm" placeholder="Xác nhận mật khẩu" name="password_confirmation" required="">
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-12">
                        <div class="error-message text-center " style="color: #f00;"></div>
                    </div>
                    <button class="btn btn-primary d-block w-100 btn-register-author" type="button">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php elseif(auth()->user()->expert == 0): ?>

<div class="modal fade" id="register-author" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link fw-medium active" href="#signup-author" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Đăng ký tác giả</a></li>
                </ul>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body tab-content py-4">
                <form class="needs-validation tab-pane fade active show" action="<?php echo e(route('register_author')); ?>" autocomplete="off" novalidate="" id="signup-author">
                    <input type="hidden" name="author" value="1">
                    <input type="hidden" name="id" value="<?php echo e(auth()->user()->id); ?>">
                    <div class="list-content-loading">
                        <div class="half-circle-spinner">
                            <div class="circle circle-1"></div>
                            <div class="circle circle-2"></div>
                        </div>
                    </div>
                    <div class="mb-3">Vui lòng bổ sung thông tin dưới đây để đăng ký tác giả</div>
                    
                    <div class="mb-3">
                        <label for="author-job">Nghề nghiệp *</label>
                        <input class="form-control" type="text" id="author-job" name="job" required="">
                    </div>
                    <div class="mb-3">
                        <label for="author-edu">Trình độ học vấn *</label>
                        <input class="form-control" type="text" id="author-edu" name="edu" required="">
                    </div>
                    <div class="mb-3">
                        <label>Lĩnh vực viết bài *</label>
                        <div>
                            <select class="multi-select2" name="type[]" multiple="multiple" style="width: 100%;">
                                <option value="1">Văn học</option>
                                <option value="2">Lịch sử</option>
                                <option value="3">Thế giới</option>
                                <option value="4">Kinh tế</option>
                                <option value="5">Toán học</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <div class="error-message text-center " style="color: #f00;"></div>
                    </div>
                    <button class="btn btn-primary d-block w-100 btn-register-author" type="button">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH /home/admin/domains/exproweb.com/public_html/thuvientonghop/resources/views/auth/form-customer.blade.php ENDPATH**/ ?>