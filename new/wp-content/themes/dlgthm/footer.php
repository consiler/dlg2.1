    <div class="footer-wrap">
      <div class="footer-inner">
        <div class="footer-menu-wrap">
          <?php
          $footer_defaults = array(
            'theme_location'  => 'footer-menu',
            'menu'            => '.footer-menu',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'footer-menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => new FooterWalker()
          );
          wp_nav_menu( $footer_defaults );
          ?>
        </div>
      </div>
    </div>
  </div><!-- body wrap end -->
<?php wp_footer(); ?>
</body>
</html>