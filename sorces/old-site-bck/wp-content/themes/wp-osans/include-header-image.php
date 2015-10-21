<?php if(get_field('header-image')) { ?>
<style>
  header {
    background-image: url(<?php the_field('header-image'); ?>) !important;
  }
</style>
<?php } ?>
