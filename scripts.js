$(function(){

  var vWidth = $(window).width();
  var responsiveWidth = 991;
  var hoverBarTimeout;

  $('.header .header__main .main-menu--wrapper').append('<span class="hover-bar"></span>');

  $(window).on('resize', function(){
    vWidth = $(window).width();
  })

  $('[data-toggle]').on('click', function(ev){
    var $btn = $(this);
    var $target = $($btn.data('target'));
    var klass = $btn.data('toggle');
    $target.toggleClass(klass);

    if($btn.closest('.header').length){
      $('body').toggleClass('body--overflow-hidden');
    }
  });

  $('.header').on('mouseenter', function(ev){
    if (vWidth <= responsiveWidth) return false;

    var $header = $(this);
    $header.addClass('hover');

  }).on('mouseleave', function(ev){
    if (vWidth <= responsiveWidth) return false;

    var $header = $(this);
    var $submenu = $header.find('.open');

    $header.removeClass('hover');
    if ($submenu.length){
      $header.removeClass('submenu-open')
      $submenu.removeClass('open');
      $submenu.find('> .sub-menu-wrapper').slideUp(300);
    }
  });

  $('.header .header__main').on('mouseleave', function(){
    if (vWidth <= responsiveWidth) return false;

    var $header = $(this).closest('.header');
    var $submenu = $header.find('.open');

    $header.removeClass('hover');
    if ($submenu.length){
      $header.removeClass('submenu-open')
      $submenu.removeClass('open');
      $submenu.find('> .sub-menu-wrapper').slideUp(300);
    }
  });

  $('.header .header__main .main-logo').on('mouseenter', function(){
    if (vWidth <= responsiveWidth) return false;

    var $header = $(this).closest('.header');
    var $submenu = $header.find('.open');

    $header.removeClass('hover');
    if ($submenu.length){
      $header.removeClass('submenu-open')
      $submenu.removeClass('open');
      $submenu.find('> .sub-menu-wrapper').slideUp(300);
    }
  });

  $('.header .header__main .main-menu > li.menu-item').on('mouseenter', function(ev){
    if (vWidth <= responsiveWidth) return false;
    var $header = $(this).closest('.header');
    var $item = $(this);
    var $bar = $header.find('.header__main .main-menu--wrapper .hover-bar');
    var data = {
      width: $item.find('> a').width(),
      top: $item.position().top + $item.outerHeight(),
      left: $item.position().left + ($item.outerWidth() / 2)
    }
    clearTimeout(hoverBarTimeout);
    $bar.css({
      "width": data.width + "px",
      "top": data.top + "px",
      "left": data.left + "px",
      "opacity": 1
    });

    var $prevsubmenu = $header.find('.open');

    if ($prevsubmenu[0] != $item[0]){
      if(!$item.hasClass('menu-item-has-children')){
        $header.removeClass('submenu-open');
        $prevsubmenu.removeClass('open');
        $prevsubmenu.find('> .sub-menu-wrapper').slideUp(300);
      }
      else {
        $prevsubmenu.removeClass('open');
        $prevsubmenu.find('> .sub-menu-wrapper').fadeOut(300).slideUp(0);

        $header.addClass('submenu-open');
        $item.addClass('open');
        $item.find('> .sub-menu-wrapper').slideDown(300);
      }
    }
  });

  $('.header .header__main .main-menu--wrapper').on('mouseleave', function(ev){
    var $menu = $(this);
    var $bar = $menu.find('.hover-bar');
    $bar.css({
      'opacity': 0
    });
    hoverBarTimeout = setTimeout(function(){
      $bar.attr('style', '');
    }, 500);
  });

  $('.header .header__offcanvas .main-menu > li.menu-item-has-children > a').on('click', function(ev){
    if (vWidth > responsiveWidth) return false;
    var $link = $(this);
    if (ev.offsetX >= ($link.outerWidth() - 30)){
      ev.preventDefault();
      $link.siblings('.sub-menu-wrapper').slideToggle(300);
    }
  });

  /* ----- ONLY FOR SPA ----- */
  $('.single-page-site .header .main-menu > li.menu-item > a, .single-page-site .header .main-logo, .single-page-site .footer .footer-logo').on('click', function(ev){
    ev.preventDefault();
    var $link = $(this);
    var url = $link.attr('href');

    if (url.indexOf('#') != -1){
      var urltype = 'spa'
      var selector = url.substring(url.indexOf('#'));
    }
    else {
      var urltype = 'normal';
      var selector = url;
    }

    var $offcanvas = $(this).closest('.header__offcanvas');
    if($offcanvas.length){
      $offcanvas.find('[data-toggle]').trigger('click');
    }

    if (urltype == 'spa'){
      if(selector != '#'){
        if ($(window).width() >= 992){
          var padding = 100;
        }
        else {
          var padding = 60;
        }

        if ($(selector).length){
          var offset = $(selector).offset().top - padding;
          $('html, body').animate({
              scrollTop: offset
          }, 500);
        }
        else {
          document.location.href = document.location.origin + '/' +  selector;
        }
      }
      else {
        if (document.location.pathname == '/'){
          var offset = 0;
          $('html, body').animate({
              scrollTop: offset
          }, 500);
        }
        else {
          document.location.href = document.location.origin;
        }
      }
    }
    else {
      if ($link.attr('target') == '_blank') {
        var win = window.open(selector, '_blank');
        win.focus();
      }
      else {
        document.location.href = selector;
      }
    }
  });
  /* ----- ONLY FOR SPA ----- */

  var prevscroll = 0;
  $(window).on('scroll', function(){
    var scroll = $(window).scrollTop();
    var $header = $('.header');

    if($('body').hasClass('header--always-sticky')){
      var $topbar = $header.find('.header__top');

      $header.css('transform', 'translateY(0px)');
      if ($topbar.is(':visible')){
        if (scroll < $topbar.outerHeight()){
          $header.css('top', '-' + scroll + 'px');
          $header.removeClass('header--solid').removeClass('header--sticky');
        }
        else {
          $header.css('top', '-' + $topbar.outerHeight() + 'px');
          $header.addClass('header--solid').addClass('header--sticky');
        }
      }
      else {
        $header.css('top', '0px');
        if (scroll <= 0){
          $header.removeClass('header--solid').removeClass('header--sticky');
        }
        else {
          $header.addClass('header--solid').addClass('header--sticky');
        }
      }
    }
    else {
      var $mainbar = $header.find('.header__main');

      if (scroll < $header.outerHeight()){
        $header.css('top', '-' + scroll + 'px');
        $header.css('transform', 'translateY(0px)');
        $header.removeClass('header--solid');
      }
      else {
        $header.css('top', '-' + $header.outerHeight() + 'px');
        $header.addClass('header--solid');

        if (scroll > prevscroll){
          $header.css('transform', 'translateY(0px)').removeClass('header--sticky');
        }
        else {
          $header.css('transform', 'translateY(' + $mainbar.outerHeight() + 'px)').addClass('header--sticky');
        }
      }
    }

    prevscroll = scroll;
  });

  $(window).trigger('scroll');
});
