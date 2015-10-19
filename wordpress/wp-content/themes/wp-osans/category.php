<?php get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">
      <h1 class="title3"><?php the_category(', '); ?></h1>

      <?php get_template_part('loop'); ?>
      <?php get_template_part('pagination'); ?>

      <?php get_template_part('include-header-image'); ?>
      <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>
