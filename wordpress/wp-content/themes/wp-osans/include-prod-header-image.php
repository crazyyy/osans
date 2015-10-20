<?php if(get_field('cat-product') == "ibp") { ?>
  <style>
    header {
      background-image: url(<?php the_field('cat-product'); ?>) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "akb") { ?>
  <style>
    header {
      background-image: url(<?php the_field('cat-product'); ?>) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "dgu") { ?>
  <style>
    header {
      background-image: url(<?php the_field('cat-product'); ?>) !important;
    }
  </style>
<?php } else if(get_field('cat-product') == "skv ") { ?>
  <style>
    header {
      background-image: url(<?php the_field('cat-product'); ?>) !important;
    }
  </style>
<?php } else { ?>
  <style>
    header {
      background-image: url(<?php the_field('cat-product'); ?>) !important;
    }
  </style>
<?php } ?>
