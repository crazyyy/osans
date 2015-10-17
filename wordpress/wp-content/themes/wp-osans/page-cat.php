<?php /* Template Name: Category Template */ get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <div class="block-select">
          <h3>Подбор ИБП</h3>
          <form action=""></form>
        </div><!-- /.block-select -->

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_content(); ?>
        </article>
        <div class="product-listing">
          <?php if(get_field('second-title')) { echo '<h3 class="product-listing-title">' . get_field('second-title') . '</h3>'; } ?>

          <?php
          $posts = get_field('manufacturer');
          if( $posts ): ?>
            <ul class="product-listing-container">
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                  <li class="product-item">
                    <a href="<?php the_permalink(); ?>">
                      <span>
                        <?php if ( has_post_thumbnail()) :
                          the_post_thumbnail('medium');
                        else: ?>
                          <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                        <?php endif; ?>
                      </span>
                      <h2><?php the_title(); ?></h2>
                    </a>
                  </li><!-- /.product-item -->
              <?php endforeach; ?>
              </ul><!-- /.product-listing-container -->
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>

        </div><!-- /.product-listing -->
      <?php endwhile; else: ?>
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      <?php endif; ?>

      <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>
