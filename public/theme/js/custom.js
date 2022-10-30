jQuery(document).ready(function($) {
  $('.multi-select2').select2();

  $('.carousel-caret-circle-down').click(function(){
    $('html,body').animate({
        scrollTop: $("#slider-child").offset().top
    }, 'slow');
  });

  //active sidebar
  var shop_categories = $('#shop-categories');
  if(shop_categories.length)
  {
    $('.widget-list li').each(function(){
      if($(this).find('a').hasClass('active'))
      {
        $(this).closest('.accordion-item').find('.accordion-button').removeClass('collapsed')
        $(this).closest('.accordion-item').find('.accordion-collapse').addClass('show')
      }
    })
  }
  //active sidebar
  // subscription
  $('.btn-subscription').click(function(){
      var action = $(this).closest('form').attr('action'),
        email = $(this).closest('form').find('input[name="your_email"]').val();
        if(email != ''){
          axios({
              method: 'post',
              url: action,
              data: {email:email}
          }).then(res => {
            if(res.data.status == 'success'){
              $('footer').find('#notifyModal').remove();
              $('footer').append(res.data.view);
              $('#notifyModal').modal('show');
            }
           

          }).catch(e => console.log(e));
        }
        else{
          alert('Vui lòng nhập Email');
          $('input[name="your_email"]').focus();
        }
    });
  //subscription

  //fix main menu khi scoll
  $(window).scroll(function() {
      if(window.pageYOffset > 100) {
          $('#site_header').addClass('active-menu');
      }
      else{
          $('#site_header').removeClass('active-menu');
      }
  });//fix main menu khi scoll

  /*----------------------------------
    26. Quantity Plus Minus
  ------------------------------------*/
  function qnt_incre(){
    $(document).on("click", ".qtyBtn", function() {
      var qtyField = $(this).parent(".qtyField"),
       oldValue = $(qtyField).find(".qty").val(),
        newVal = 1;
  
      if ($(this).is(".plus")) {
      newVal = parseInt(oldValue) + 1;
      } else if (oldValue > 1) {
      newVal = parseInt(oldValue) - 1;
      }
      $(qtyField).find(".qty").val(newVal);
    });
  }
  qnt_incre();

	$(document).on('click', '.product-form__cart-add', function(){
    var form = document.getElementById('product_form_addCart'),
        fdnew = new FormData(form);
    axios({
      method: 'post',
      url: $('#product_form_addCart').prop("action"),
      data: fdnew
    }).then(res => {
        if(res.data.error ==0)
        {
          setTimeout(function () {
            $('#CartCount').html(res.data.count_cart);

            if(res.data.view !=''){
              $('.site-cart #header-cart').remove();
              $('.site-cart').append(res.data.view);
            }


          }, 1000);
          alertJs('success', res.data.msg);
        }else{
          alertJs('error', res.data.msg);
        }
    }).catch(e => console.log(e));
    }); 
  $(document).on('click', '.quick-buy', function(){
    $(this).text('Loading...');
    var form = document.getElementById('product_form_addCart'),
        fdnew = new FormData(form),
        href = $(this).attr('href');
    axios({
      method: 'post',
      url: 'buy-now',
      data: fdnew
    }).then(res => {
        if(res.data.error ==0)
        {
          window.location.href = href;
        }else{
          alertJs('error', res.data.msg);
        }
    }).catch(e => console.log(e));

    return false;
  }); 

  $(document).on('click', '.mini-products-list .remove', function(event) {
    event.preventDefault();
    $(this).closest('.widget-cart-item').remove();
    var rowId = $(this).attr('data');
    axios({
      method: 'post',
      url: '/cart/ajax/remove',
      data: { rowId:rowId }
    }).then(res => {
        if(res.data.error ==0)
        {
          setTimeout(function () {
            $('#CartCount').html(res.data.count_cart);
            $('#header-cart .money-total').html(res.data.total);
          }, 1000);
          alertJs('success', res.data.msg);
        }else{
          alertJs('error', res.data.msg);
        }
    }).catch(e => console.log(e));
  });

  $('.newsletter__submit').click(function(){
      var action = $(this).closest('form').attr('action'),
        email = $(this).closest('form').find('input[name="your_email"]').val();
        if(email != ''){
          axios({
              method: 'post',
              url: action,
              data: {email:email}
          }).then(res => {
            if(res.data.status == 'success'){
              $('footer').find('#notifyModal').remove();
              $('footer').append(res.data.view);
              $('#notifyModal').modal('show');
            }
           

          }).catch(e => console.log(e));
        }
        else{
          alert('Vui lòng nhập Email');
          $('input[name="your_email"]').focus();
        }
    });

  $(document).on('click', '.add-to-wishlist', function(){
    $(this).toggleClass('active');
    var id = $(this).attr('data'),
      this_ = $(this);
    axios({
        method: 'post',
        url: '/wishlist/add',
        data: {
           id:id
        }
     }).then(res => {
      // this_.find('i').removeClass('active');
      if(this_.find('.anm-heart').hasClass('active')){
        this_.find('.anm-heart-l').addClass('active');
        this_.find('.anm-heart').removeClass('active');
      }
      else {
        this_.find('.anm-heart').addClass('active');
        this_.find('.anm-heart-l').removeClass('active');
      }
        /*if(res.data.view !='' && res.data.status =='success'){
          $(this).parent().html(res.data.view);
          $('.sub_number').show().text(res.data.count_wishlist);
          POTENZA.Tooltip();
        }*/
    }).catch(e => console.log(e));
    return false;
  });
  $(document).on('click', '.quick-view', function(){
    var id = $(this).data('id');
    axios({
        method: 'post',
        url: '/quick-view',
        data: {
           id:id
        }
    }).then(res => {
      if(res.data.error == 0){
        // console.log(res.data.error);
        $('body').find('#content_quickview').remove();
        $('body').append(res.data.view);
        $('#content_quickview').modal('show');
      }
    }).catch(e => console.log(e));
    return false;
  });


  $(document).on('click', '.description-view-more', function(){
    var max_height = $(this).closest('.tab-content').find('.max-height-300'),
      title_show = $(this).data('more'),
      title_less = $(this).data('less');
    if(max_height.length > 0){
      $(this).text(title_less);
      max_height.removeClass('max-height-300');
      $(this).removeClass('description-view-more').addClass('description-view-less');
    }
  });
  $(document).on('click', '.description-view-less', function(){
    var max_height = $(this).closest('.tab-content').find('.max-height-300'),
      title_show = $(this).data('more'),
      title_less = $(this).data('less');
    if(!max_height.length){
      console.log(title_show);
      $(this).text(title_show);
      $('.product-description').addClass('max-height-300');
      $(this).removeClass('description-view-less').addClass('description-view-more');
    }
  });

  


  //contact ajax
  var contact_form = $('#contactForm');
    contact_form.validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        rules: {
            name: "required",
            subject: "required",
        },
        messages: {
            name: "Nhập họ tên của bạn",
            email: "Nhập tiêu đề",
        },
        errorElement : 'div',
        errorLabelContainer: '.errorTxt',
        invalidHandler: function(event, validator) {
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        }
    });

    $('.btn-send-contact').click(function(event) {
      if(contact_form.valid()){
          var form = document.getElementById('contactForm');
          var fdnew = new FormData(form);
          contact_form.find('.list-content-loading').show();
          axios({
              method: 'POST',
              url: '/ajax/contact',
              data: fdnew,

          }).then(res => {
             // console.log(res.data);
              contact_form.find('.error-message').hide();
              if (res.data.error == 0) {
                  contact_form.find('.modal-body').html(res.data.view);
              } 
              else{
                  contact_form.find('.list-content-loading').hide();
                  contact_form.find('.error-message').show().html(res.data.msg);
              }
          }).catch(e => console.log(e));
      }
    });
  //contact ajax

});


function alertJs(type = 'error', msg = '') {
  const Toast = Swal.mixin({
    toast: true,
    icon: type,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
    type: type,
    title: msg
  })
}

function alertMsg(type = 'error', msg = '', note = '') {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: true,
  });
  swalWithBootstrapButtons.fire(
    msg, note, type
  )
}
