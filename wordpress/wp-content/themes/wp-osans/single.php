<?php get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <h1 class="single-title inner-title title3"><?php the_title(); ?></h1>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_content(); ?>
        </article>
      <?php endwhile; else: ?>
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      <?php endif; ?>

      <?php get_template_part('include-header-image'); ?>
      <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>
