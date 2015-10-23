<?php /* Template Name: Category Template */ get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class('category-listing'); ?>>

          <?php
          $posts = get_field('manufacturer');
          if( $posts ): ?>
            <ul class="category-listing-container">
            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>

                <li class="category-item">
                  <a class="category-item-image" href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail()) :
                      the_post_thumbnail('medium');
                    else: ?>
                      <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                    <?php endif; ?>
                  </a>
                  <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <?php if(get_field('description')) { echo '<h3 class="category-listing-title">' . get_field('description') . '</h3>'; } ?>
                  <?php if(get_field('full-descr')) { echo '<p>' . get_field('full-descr') . '</p>'; } ?>
                </li><!-- /.category-item -->

              <?php endforeach; ?>
              </ul><!-- /.category-listing-container -->
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
          <?php endif; ?>

        </div><!-- /.category-listing -->
      <?php endwhile; else: ?>
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      <?php endif; ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>


