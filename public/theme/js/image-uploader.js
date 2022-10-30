jQuery(document).ready(function(){
   $('.upload-images').imageUploader({
      label:'Click hoặc Kéo và thả vào đây để tải lên hình ảnh tài liệu',
      imagesInputName: 'gallery',
      preloadedInputName: 'gallery_old'
   });

   var form_upload = $('#document-upload');
   form_upload.validate({
      onfocusout: false,
      onkeyup: false,
      onclick: false,
      rules: {
         'name': "required",
         'content': "required",
         'gallery[]': "required",
      },
      messages: {
         'name': "Nhập tiêu đề tài liệu",
         'content': "Nhập mô tả tài liệu",
         'gallery[]': "Vui lòng chọn ít nhất 1 file",
      },
      errorElement: 'div',
      errorLabelContainer: '.errorTxt',
      invalidHandler: function(event, validator) {
         $('html, body').animate({
            scrollTop: 0
         }, 500);
      }
   });
   $('.submit-upload').click(function(event) {
      
      if (form_upload.valid()) {
         form_upload.find('.list-content-loading').show();
         form_upload.submit();
      }
   });
});