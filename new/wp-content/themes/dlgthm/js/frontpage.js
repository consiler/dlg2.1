(function($) {
  $(document).ready(function(){
    var spy = $('.fp-scrollspy');
    var spyHeight = spy.outerHeight();
    var isFixed = false;
    var spyPH = $('.fp-scrollspy-placeholder');
    var spy_anchor_list = $('.fp-scrollspy-anchor');
    var scrollItems = spy_anchor_list.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });
    var lastId;
    $(window).scroll(function(){
      var scrolledOffset = $(this).scrollTop();
      if(isFixed)
      {
        if(scrolledOffset < 145) {
          //switch to static position
          spy.removeClass('fp-scrollspy-fixed');
          isFixed = false;
          spyPH.hide();
        }
      } else {
        if(scrolledOffset >= 145)
        {
          //switch to fixed position
          spy.addClass('fp-scrollspy-fixed');
          isFixed = true;
          spyPH.show();
        }
      }

      // Get id of current scroll item
      var cur = scrollItems.map(function(){
        if ($(this).offset().top < scrolledOffset + 51)
        {
          return this;}
      });

      // Get the id of the current element
      cur = cur[cur.length-1];
      var id = cur && cur.length ? cur[0].id : "";
      if (lastId !== id)
      {
        lastId = id;
        // Set/remove active class
        //menuItems = spybar.find('a')
        spy_anchor_list
          .removeClass("active")
          .filter("[href=#"+id+"]")//
          .addClass("active");
       }                   
      });

    spy_anchor_list.click(function(e){
      var href = $(this).attr("href");
      if(href.length > 0)
      {
        var offsetTop = href === "#" ? 0 : $(href).offset().top-50;
        $('html, body').stop().animate({ 
            scrollTop: offsetTop
        }, 300);
      }
      e.preventDefault();
    });

  });
})(jQuery);