<?php
/*
* 
*               .-://:-`       `:+oso+-`       `-://:-.                
*             -+ooooooo+:`   `+hdddddddh/    `/+ooooooo+.              
*            .ooooooooooo/   oddddddddddd/   +ooooooooooo.             
*            /oooooooooooo`  ddddddddddddy  `oooooooooooo:             
*            -ooooooooooo/   sddddddddddd+   +ooooooooooo.             
*             -+ooooooo+/`   `oddddddddh+`   `/oooooooo+-              
*              `.:///:-`       ./osyso:.       `-:///:.`               
*                                                                                                                                            
*                                                                      
*                     
* `+/:::::::/-`     :/                 -+                              
* `o:       `-+:    ``                 :o                              
* `o:         .o-   -:    `-::::::.    :o     `-:::::-`     `.:::::.`:.
* `o:          ++   /+   `+/`   `-+.   :o    :+-`  ``:+.   `//.`  `-/o-
* `o:          /o   /+   `.`  ```.o-   :o   .o.       :o`  /+       -o-
* `o:          +/   /+    .::::---o-   :o   :o        .o-  o:       .o-
* `o:         :o.   /+   /+.`    `o-   :o   -o.       -o`  /+       :o-
* `o:```````-//.    /+   /+`   `.:o:`  :o    :+.`   `-+-   `//.```.:/o-
* `//:::::::-.      ::   `:/::::-`-/-  -/     .::::::-`      .-:::-..o.
*                                                         ./`      :+` 
*                                                          -/:----//.  
*                                                            `....`   
*/
$libfiles = array(
  'settings',
  'dialog-setup',
  'wrapper',
  'cpt-content-admin-menu',
  'fieldset-taxonomy',
  'template-taxonomy',
  'acf-mod',
  'cpt-renderer',
  'nav-walkers',
  'scripts-styles'
  );
$libdir = "lib/";
//Must be loaded in order.
foreach($libfiles as $file) require_once(locate_template($libdir.$file.'.php'));