/*              ,i1i:        ,tLfi.       .;ii;.                                  
 *            ittttttt1.   1GGGGGGGG,   ,tttttttt:                                
 *           ;ttttttttt1  iGGGGGGGGGG. .tttttttttt,                               
 *           itttttttttt  1GGGGGGGGGG, ,tttttttttt:                               
 *            1tttttttt,   LGGGGGGGGi   ;tttttttt;                                
 *             .;1tti,      .tCGGLi       :1tt1:                                  
 *                                                                                
 *                                                                                
 *                                                                                
 * ,111111i:.     ;;              ;;                                :,            
 * ,t.      ;t,   ..              ;i                                ;,            
 * ,t.       ,t.  ;;    ;1ttt;    ;i    .it1ti.     .it1t;.1,            .:::.    
 * ,t.        1:  i;  .t,    :1   ;i   1i     ;1   ii     it,       t: ,t,   :t.  
 * ,t.        1:  i;     .,,:1t   ;i  :1       1: ,t.     .t,       t: ,ti.       
 * ,t.       ,t.  i;  ,t:.   ,t   ;i  :1       1: .t.     .t,       t:    ,:it1,  
 * ,t.      ;t,   i;  ;i     1t   ;i   1;     ;1   ;1.   .1t,       t: 1;     ;t  
 * ,11111ii:      ;;   :1t11: ;1. ;;    .it1ti,      ,;i;..t,  :t   t:  iti;;1i.  
 *                                                 ii     ;1        t:            
 *                                                  ,i1tti,       it;              
 */
//Note: The jQuery that comes with Wordpress does not make use of the convenient $ shorthand variable.
//But we can still use $ with a scriptwide anonymous function.
(function($) {
  $(document).ready(function(){
    //Top Navigation Menu
    //Populate the grey sub menu
    // This takes the dropdown menu associated with the current section and moves it to the silver menu
    var currentPageCategoryDropDownMenu = $('.menu > ul > li.current_page_item > .sub-menu');
    // "Is current page a category page with a dropdown menu containing child pages?"
    if(currentPageCategoryDropDownMenu.length !== 0)
    {
      // If we found a dropdown menu, we add a class that changes the dropdown menu's look
      //to a padded horizontal list of links, and add it to the silver bar
      //directly under the main navigation bar.
      currentPageCategoryDropDownMenu.addClass('second-menu-horizontal').appendTo('.second-menu');
    } else {
      // If we cannot find a drop down menu, our current section must not have any child pages.
      // Is the current page a child page? Look for a parent.
      var parentPageCategoryDropDownMenu = $('.menu > ul > li.current_page_parent > .sub-menu');
      if(parentPageCategoryDropDownMenu.length !== 0)
      {
        // If there is a parent, we just move that parent's list (siblings of the current page) to the
        //silver sub-navigation bar. Otherwise, we do nothing.
        parentPageCategoryDropDownMenu.addClass('second-menu-horizontal').appendTo('.second-menu');
      }
    }

    // Initialize parallax scrolling
    $.stellar({hideDistantElements: true});

    //Add colors to the top level page links based on their data-theme-color
    $('.menu > ul > li').each(function(index, value)
    {
      var thisNode = $(value);
      if(thisNode.hasClass('current_page_item') || thisNode.hasClass('current_page_parent'))
      {
        return;
      }
      var thisID = thisNode.attr('id');
      var borderStyle = 'border-left: 5px solid #'+$(value).attr('data-theme-color');
      $(value).append('<style type="text/css">#'+thisID+':hover > a { '+borderStyle+' } #'+thisID+':hover > .sub-menu { '+borderStyle+' } </style>');
    });

    //Add filter Easter Eggs.
    // 'body_class' : 'key sequence'
    //@requires 'key sequence'.length < 30
    var easter_eggs = {'sepia': 'toyourpoint',
                      'black-and-white': 'goingforward',
                      'inverted': 'reachingout',
                      'contrast': 'crushingit'};
    var key_history = "";
    var key_memory = 0;
    for(var egg_key in easter_eggs)
    {
      if(easter_eggs[egg_key].length > key_memory)
      {
        key_memory = easter_eggs[egg_key].length;
      }
    }
    $('body').bind('keypress', function(e) {
      var code = (e.keyCode ? e.keyCode : e.which);
      var letter = String.fromCharCode(code);
      key_history += letter;
      while(key_history.length > key_memory){
        key_history = key_history.substr(1);
      }
      for(var egg_key in easter_eggs)
      {
        if(key_history.indexOf(easter_eggs[egg_key]) != -1)
        {
          for(var egg_key_2 in easter_eggs)
          {
            $('body').removeClass(egg_key_2);
          }
          $('body').addClass(egg_key);
        }
      }
    });
  });
})(jQuery);