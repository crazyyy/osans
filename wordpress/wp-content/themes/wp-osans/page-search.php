<?php /* Template Name: Search Template */ get_header(); ?>

  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <h1 class="single-title inner-title title3"><?php the_title(); ?></h1>
        <article id="post-<?php the_ID(); ?>" <?php post_class('select-equiper'); ?>>
          <div class="select-equiper-block">

            <?php get_template_part('filter'); ?>

          </div><!-- /.select-equiper block -->
          <h4 class="title3 grayscale">Результаты подбора</h4>
          <div class="product-listing">

            <?php

              $args = array(
                  'post_type' => 'products',
                  'meta_query' => $meta_query,
                  'posts_per_page'=> -1
              );
            $query = new WP_Query;
            $posts = $query->query($args);
            ?>

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
            <?php wp_reset_query(); ?>

          </div><!-- /.product-listing -->
          <?php the_content(); ?>
        </article><!-- select-equiper -->
      <?php endwhile; else: ?>
        <article>
          <h2 class="page-title inner-title"><?php _e( 'Sorry, nothing to display.', 'wpeasy' ); ?></h2>
        </article>
      <?php endif; ?>

    </div><!-- /.col-md-8 -->
    <?php get_sidebar(); ?>
  </div><!-- /.row inner -->
<?php get_footer(); ?>

