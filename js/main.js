$(document).ready(function () {

    $('#preloader').fadeOut(400);


    $('ul.catalog_tabs').on('click', 'li:not(.catalog_tab_active)', function () {
        $(this)
            .addClass('catalog_tab_active').siblings().removeClass('catalog_tab_active')
            .closest('div.catalog').find('div.catalog_container').find('div.catalog_content').removeClass('catalog_content_active').eq($(this).index()).addClass('catalog_content_active');
    });


    function toggleSlide(item) {
        $(item).each(function (i) {
            $(this).on('click', function (e) {
                e.preventDefault();
                $('.catalog_item_content').eq(i).toggleClass('catalog_item_content_active');
                $('.catalog_item_more').eq(i).toggleClass('catalog_item_more_active');
            });
        });
    }

    toggleSlide('.catalog_item_link');
    toggleSlide('.catalog_item_back');


    $('.catalog_item_link').addClass('waves-effect waves-light');
    $('.catalog_item_back').addClass('waves-effect waves-light');


    // submit form   
     $('#email-form').validate();

    
        $('form').submit(function (e) {
          e.preventDefault();
          if ($('#email').hasClass('error')) {
              return;
          }
          $.ajax({
              type: 'POST',
              url: 'mailer/smart.php',
              data: $(this).serialize(),
              beforeSend: function () {
                  // запускаем прелоадер
                  $('.submit-spinner').toggle('.submit-spinner_hide');
              },
              complete: function () {
                  // останавливаем прелоадер
                  $('.submit-spinner').toggle('.submit-spinner_hide');
                  $('.all-right').addClass('show_all-right'); 
              } 
               
          }).done(function () {
              $(this).find('input').val(''); 
              $('form').trigger('reset');
    
          });
          return false;
      });
      
});  