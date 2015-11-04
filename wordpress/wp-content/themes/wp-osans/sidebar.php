<aside class="sidebar col-md-4" role="complementary">

  <div class="widget widget-select-equio">
    <h4><a href="/podbor-oborudovaniya.htm">Подбор оборудования</a></h4>
  </div><!-- /.widget widget-select-equio -->


  <?php if ( is_active_sidebar('widgetarea1') ) : ?>
    <?php dynamic_sidebar( 'widgetarea1' ); ?>
  <?php else : ?>

  <?php endif; ?>


  <div class="widget widget-sales-top">
    <h6>Топ-продаж</h6>
    <?
      // Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
      // This code based on wp_nav_menu's code to get Menu ID from menu slug
      $menu_name = 'sidebar-menu'; // change this if necessary

      if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {

        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $menu_list = '<ul id="' . $menu_name . '">';

          foreach ( (array) $menu_items as $key => $menu_item ) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $mid = $menu_item->object_id;

            if(has_post_thumbnail($mid)) {
              $thumbnail = get_the_post_thumbnail( $mid, 'thumb' );
            }
            $menu_list .= '<li><a href="' . $url . '"><span class="thumb">' .$thumbnail. '</span><h5>' . $title . '</h5></a></li>';
          }
          $menu_list .= '</ul>';
       } else {
          $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
       }
      // $menu_list now ready to output
       echo $menu_list;
    ?>
  </div><!-- widget widget-sales-top -->

</aside><!-- /sidebar col-md-4-->
