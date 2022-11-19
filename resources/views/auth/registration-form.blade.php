<div class="register-form position-relative">
    <div class="list-content-loading">
        <div class="half-circle-spinner">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
        </div>
    </div>
    <form action="" id="customer-register" method="POST">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="far fa-user"></i></span>
            <input type="text" required class="form-control" name="name" placeholder="Full name">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="far fa-at"></i></span>
            <input type="text" required class="form-control" name="email" placeholder="Email">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="far fa-phone"></i></span>
            <input type="tel" class="form-control" name="phone" placeholder="Phone number">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="far fa-lock-alt"></i></span>
            <input type="password" required class="form-control" name="password" placeholder="Password">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><i class="far fa-lock-alt"></i></span>
            <input type="password" required class="form-control" name="password_confirmation" placeholder="Confirm password">
        </div>
        <div class="mb-3 col-sm-12">
            <div class="error-message"></div>
        </div>
        <button type="button" class="btn btn-primary w-100 mb-3 btn-register">{{ __('register') }}</button>
    </form>
    <div class="social-login-box text-center mt-3">
        <hr style="opacity: 0.3">
        <p class="small text-center"><em>{{ __('social-login') }}</em></p>
        <a href="#" class="btn btn-primary"><i class="fab fa-facebook-square"></i> Facebook</a>
        <a href="#" class="btn btn-secondary"><i class="fab fa-google"></i> Google</a>
    </div>
</div>