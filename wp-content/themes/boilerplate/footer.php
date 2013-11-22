<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		</section><!-- #main -->
        
<div class="push"></div>
</div><?php //end #wrapper : makes sticky footer work ?>
    <div class="footer-wrap">
      <div class="footer-inner">
        <div class="footer-menu-wrap">
          <?php
          wp_nav_menu(array(
            'theme_location'  => 'footer',
            'menu'            => 'Dlg_Footer'
            )
          );
          ?>
        </div>
        <div class="copyright">
          <hr></hr>
          <p>Copyright &copy 2013 Dialog Group <br> All rights reserved</p>
          <!-- <a href="">Legal & Privacy</a> -->
        </div>
      </div>
    </div>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?><script>
  //GA
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-44776256-1']);
  _gaq.push(['_setDomainName', 'dialoggroup.com']);
  _gaq.push(['_setAllowLinker', true]);
  </script>
<script type="text/javascript">
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	</body>
</html>