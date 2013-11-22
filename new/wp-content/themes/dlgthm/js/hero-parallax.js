(function($) {
  $(document).ready(function(){
    var topMenuHeight = $('.header-wrap').outerHeight();
    var b = false;
    var banner = $('#banner');
    $(window).scroll(function(){
      var scrolledPos = $(this).scrollTop() + topMenuHeight + 70;
      //when the image has top: -height*2, then convert to parallax control on
      if(scrolledPos >= 365 && !b)
      {
        $('#banner-parallax-control').show();
        b = true;
      }
      if(scrolledPos < 365 && b)
      {
        $('#banner-parallax-control').hide();
        b = false;
      }
    });
    var bg_img = banner.attr('data-custom-background-image');
    if(bg_img)
    {
      $('#banner').before('<style type="text/css">#banner { background-image: url('+bg_img+'); }</style>')
    }
  });
})(jQuery);