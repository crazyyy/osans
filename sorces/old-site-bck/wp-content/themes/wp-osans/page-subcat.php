<?php /* Template Name: Subcategory Template */ get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <div class="subcat-thumbs">
          <?php the_post_thumbnail(); // Fullsize image for the single post ?>
        </div><!-- /.subcat-thumbs -->
        <h1 class="single-title inner-title title3"><?php the_title(); ?></h1>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php the_content(); ?>
        </article>
        <div class="product-listing">
          <?php if(get_field('second-title')) { echo '<h3 class="product-listing-title">' . get_field('second-title') . '</h3>'; } ?>

          <?php
          $posts = get_field('product-select');
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

      <?php get_template_part('include-header-image'); ?>
      <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>
