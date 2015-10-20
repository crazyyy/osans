<?php if(get_field('cat-product') == "ibp") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-ibp.jpg) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "akb") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-akb.jpg) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "dgu") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-dgu.jpg) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "skv ") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-skv.jpg) !important;
    }
  </style>
<?php } else { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-default.jpg) !important;
    }
  </style>
<?php } ?>
