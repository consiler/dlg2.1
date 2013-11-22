(function($) {
$(document).ready(function(){
var spyBar = $('.content-scrollspy');
var navMenuWrap = $('.header-wrap');
// Spybar container positioning set up (stick to top menu on scroll down)
var spyBarHeight = spyBar.outerHeight(),
  // pixels from top of page to bounding box excluding margin/padding
  spyBarYPosition = spyBar.offset().top,
  // state variable to track whether the spy bar is static (moves with page) or fixed (does not move with page)
  isTheSpyBarStaticRightNow = true,
// Spybar page section tracking set up
  // id of spybar link highlighted on the last frame
  lastId,
  // top fixed nav height
  topMenuHeight = navMenuWrap.outerHeight(),
  // Spy Bar list links
  menuItems = spyBar.find("a"),
  // Anchors corresponding to menu items
  scrollItems = menuItems.map(function(){
    var item = $($(this).attr("href"));
    if (item.length) { return item; }
  });

//Scroll tracking loop
$(window).scroll(function(){
// Find out how much the user has scrolled down the page
var heading = $('#page-heading-inner');
var headingOffset = heading.outerHeight();
var scrolledOffset = $(this).scrollTop() + topMenuHeight + 70;
// If the bottom of the fixed nav menu hits the top of the spy bar...
//console.log(scrolledOffset);
if(scrolledOffset > spyBarYPosition){
  if(isTheSpyBarStaticRightNow)
  {
    spyBar.addClass('stuck');
    spyBar.css({'position' : 'fixed'});
    heading.addClass('stuck');
    heading.css({'position': 'fixed'});
    $('.content-wrap').css({'margin-top' : '70px'});
    isTheSpyBarStaticRightNow = false;
  }
} else {
  // otherwise we have not scrolled the nav menu far down enough to touch the static spybar
  // check if we need to change the spybar
  if(!isTheSpyBarStaticRightNow)
  {
    spyBar.removeClass('stuck');
    spyBar.css({'position' : 'static'});
    heading.removeClass('stuck');
    heading.css({'position': 'static'});
    $('.content-wrap').css({'margin-top' : '0px'});
    isTheSpyBarStaticRightNow = true;
  }
}
// Get container scroll position
var fromTop = $(this).scrollTop()+topMenuHeight+100;

// Get id of current scroll item
var cur = scrollItems.map(function(){
  if ($(this).offset().top < fromTop)
    return this;
});

// Get the id of the current element
cur = cur[cur.length-1];
var id = cur && cur.length ? cur[0].id : "";
if (lastId !== id)
{
  lastId = id;
  // Set/remove active class
  //menuItems = spybar.find('a')
  menuItems
    .parent()//old li
    .removeClass("active") //remove old active class and old styles here
    .end().filter("[href=#"+id+"]")//
    .parent()//new li
    .addClass("active");
 }                   
});

// Bind click handler to menu items
// so we can get a fancy scroll animation to the desired section on click
menuItems.click(function(e){
  var href = $(this).attr("href");
  var offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight-85;
  $('html, body').stop().animate({ 
      scrollTop: offsetTop
  }, 300);
  e.preventDefault();
});
//end doc ready
});
})(jQuery);