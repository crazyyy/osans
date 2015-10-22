<?php if(get_field('subtitle')) { echo '<h3 class="col-md-12 subtitle">' . get_field('subtitle') . '</h3><!-- /.subtitle -->'; } ?>


<?php if(get_field('header-image')) { ?>
<style>
  header {
    background-image: url(<?php the_field('header-image'); ?>) !important;
  }
</style>
<?php } ?>
<?php if(get_field('cat-product') == "ibp") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-ibp.jpg) !important;
    }
  </style>
  <h3 class="col-md-12 subtitle">Источники бесперебойного питания</h3><!-- /.subtitle -->
<?php } else if(get_field('cat-product') == "akb") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-akb.jpg) !important;
    }
  </style>
  <h3 class="col-md-12 subtitle">Аккумуляторные батареи</h3><!-- /.subtitle -->
<?php } else if(get_field('cat-product') == "dgu") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-dgu.jpg) !important;
    }
  </style>
  <h3 class="col-md-12 subtitle">Дизель-генераторные установки</h3><!-- /.subtitle -->
<?php } else if(get_field('cat-product') == "skv ") { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-skv.jpg) !important;
    }
  </style>
  <h3 class="col-md-12 subtitle">Системы кондиционирования воздуха</h3><!-- /.subtitle -->
<?php } else { ?>
  <style>
    header {
      background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg/category-default.jpg) !important;
    }
  </style>
<?php } ?>
