jQuery(document).ready(function($) {
   //login modal
   var login_page = $('#signin-tab');
   login_page.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
         email: "required",
         password: "required",
      },
      messages: {
         email: "Nhập địa chỉ E-mail",
         password: "Nhập mật khẩu",
      },
      errorElement: 'div',
      errorLabelContainer: '.errorTxt',
      invalidHandler: function(event, validator) {
         $('html, body').animate({
            scrollTop: 0
         }, 500);
      }
   });
   $('.btn-login').click(function(event) {
      if (login_page.valid()) {
         var form_id = $('#signin-tab');
         var form = document.getElementById('signin-tab');
         var fdnew = new FormData(form);
         login_page.find('.list-content-loading').show();
         axios({
            method: 'POST',
            url: form_id.prop("action"),
            data: fdnew,
         }).then(res => {
            // console.log(res.data);
            login_page.find('.error-message').hide();
            if (res.data.error == 0) {
               $('#signin-tab').html(res.data.view);
               $('#signin-modal').on('hidden.bs.modal', function(e) {
                  window.location.href = "/";
               })
            } else {
               login_page.find('.list-content-loading').hide();
               login_page.find('.error-message').show().html(res.data.msg);
            }
            // login_page.find('.list-content-loading').hide();
         }).catch(e => console.log(e));
      }
   });
   //login modal
   var form_sigup = $('#signup-tab');
   form_sigup.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
         'fullname': "required",
         'birthday': "required",
         'address': "required",
         'phone': "required",
         'email': "required",
         'password': "required",
         'password_confirmation': "required",
      },
      messages: {
         'fullname': "Nhập họ tên",
         'birthday': "Nhập Ngày sinh",
         'address': "Nhập địa chỉ",
         'phone': "Nhập số điện thoại",
         'email': "Nhập địa chỉ E-mail",
         'password': "Nhập mật khẩu",
         'password_confirmation': "Nhập lại mật khẩu",
      },
      errorElement: 'div',
      errorLabelContainer: '.errorTxt',
      invalidHandler: function(event, validator) {
         $('html, body').animate({
            scrollTop: 0
         }, 500);
      }
   });
   $('.btn-register').click(function(event) {
      console.log(form_sigup);
      if (form_sigup.valid()) {
         form_sigup.find('.list-content-loading').show();
         var form = document.getElementById('signup-tab');
         var fdnew = new FormData(form);
         axios({
            method: 'POST',
            url: form_sigup.prop("action"),
            data: fdnew,
         }).then(res => {
            var url_back = '';
            if (res.data.error == 0) {
               url_back = res.data.redirect_back;
               form_sigup.html(res.data.view);
               $('#register-modal').on('hidden.bs.modal', function(e) {
                  window.location.href = '/';
               })
            } else {
               form_sigup.find('.error-message').html(res.data.msg);
               form_sigup.find('.list-content-loading').hide();
            }
         }).catch(e => console.log(e));
      }
   });

   //bo sung thong tin dang ky tac gia
   var form_id = $('#signup-author');
   form_id.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
         'fullname': "required",
         'birthday': "required",
         'address': "required",
         'phone': "required",
         'email': "required",
         'password': "required",
         'password_confirmation': "required",
         'job': "required",
         'edu': "required",
         'type[]': "required",
      },
      messages: {
         'fullname': "Nhập họ tên",
         'birthday': "Nhập Ngày sinh",
         'address': "Nhập địa chỉ",
         'phone': "Nhập số điện thoại",
         'email': "Nhập địa chỉ E-mail",
         'password': "Nhập mật khẩu",
         'password_confirmation': "Nhập lại mật khẩu",
         'job': "Nhập Nghề nghiệp",
         'edu': "Nhập trình độ học vấn",
         'type[]': "Chọn Lĩnh vực viết bài",
      },
      errorElement: 'div',
      errorLabelContainer: '.errorTxt',
      invalidHandler: function(event, validator) {
         $('html, body').animate({
            scrollTop: 0
         }, 500);
      }
   });
   $('.btn-register-author').click(function(event) {
      
      if (form_id.valid()) {
         form_id.find('.list-content-loading').show();
         var form = document.getElementById('signup-author');
         var fdnew = new FormData(form);
         axios({
            method: 'POST',
            url: form_id.prop("action"),
            data: fdnew,
         }).then(res => {
            var url_back = '';
            if (!res.data.error) {
               url_back = res.data.redirect_back;
               form_id.html(res.data.view);
               setTimeout(function(){
                  window.location.href = '/';
               }, 500);
            } else {
               form_id.find('.error-message').html(res.data.msg);
               form_id.find('.list-content-loading').hide();
            }
         }).catch(e => console.log(e));
      }
   });
   //bo sung thong tin dang ky tac gia
});