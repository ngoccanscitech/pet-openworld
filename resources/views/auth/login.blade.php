
@extends($templatePath .'.layout')

@section('seo')
@include($templatePath .'.layouts.seo')
@endsection

@section('content')
<!--=================================
Login -->
<section class="space-ptb login py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-10">
        <div class="section-title">
          <h2 class="text-center">@lang('Đăng nhập')</h2>
        </div>
         @if (count($errors) >0)
            @foreach($errors->all() as $error)
              <div class="text-danger"> {{ $error }}</div>
            @endforeach
         @endif
         @if (session('status'))
            <div class="text-danger"> {{ session('status') }}</div>
         @endif
         <div class="list-content-loading">
             <div class="half-circle-spinner">
                 <div class="circle circle-1"></div>
                 <div class="circle circle-2"></div>
             </div>
         </div>
         <form id="form-login-page" class="form-horizontal login row align-items-center" method="POST" action="">
            <div class="error-message"></div>
               {{ csrf_field() }}
               <div class="mb-3 col-sm-12">
                  <label>Email <span class="required">*</span></label>
                  <input type="text" class="form-control" name="account" value=""/>
               </div>
               <div class="mb-3 col-sm-12">
                  <label>Mật khẩu <span class="required">*</span></label>
                  <input class="form-control" type="password" name="password"/>
               </div>
               <div class="mb-3 col-sm-12">
                  <div class="form-check mb-2">
                     <input type="checkbox" class="form-check-input" name="remember_me" id="remember_me">
                     <label class="custom-control-label" for="remember_me">@lang('Ghi nhớ')</label>
                  </div>
               </div>
               <div class="col-sm-6 d-grid">
                  <button type="button" class="btn btn-primary btn-login-page">@lang('Đăng nhập')</button>
               </div>
               <div class="col-sm-6">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                     <li class="me-1">
                        <a href="{{ route('register') }}">
                           <b>Bạn chưa có tài khoản? Click vào đây để đăng ký</b>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col-12 mt-3">
                  <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                     <li class="me-1">
                        <a href="{{route('forgetPassword')}}"><b>Quên mật khẩu?</b></a>
                     </li>
                  </ul>
               </div>
         </form>

      </div>
    </div>
  </div>
</section>
<!--=================================
Login -->

@endsection

@push('foot-script')
   <script>
      jQuery(document).ready(function($) {
         var loginModalForm = $('#form-login-page');
    $("#form-login-page").validate({
          onfocusout: false,
          onkeyup: false,
          onclick: false,
          rules: {
              email: "required",
              password: "required",
          },
          messages: {
              email: "Nhập địa chỉ E-mail",
              password : "Nhập mật khẩu",
          },
          errorElement : 'div',
          errorLabelContainer: '.errorTxt',
          invalidHandler: function(event, validator) {
              $('html, body').animate({
                  scrollTop: 0
              }, 500);
          }
   });

    $('.btn-login-page').click(function(event) {
      var this_ = $(this);
        if(loginModalForm.valid()){
            var form = document.getElementById('form-login-page');
           var fdnew = new FormData(form);
           loginModalForm.parent().find('.list-content-loading').show();
            axios({
                  method: 'POST',
                  url: '/customer/login',
              data: fdnew,

            }).then(res => {
               if (res.data.error == 0) {
                   loginModalForm.html(res.data.view);
               } else{
                     loginModalForm.parent().find('.list-content-loading').hide();
                     loginModalForm.find('.error-message').html(res.data.msg);
               }
               loginModalForm.parent().find('.list-content-loading').hide();
            }).catch(e => console.log(e));
          }
    });
      });
   </script>
@endpush