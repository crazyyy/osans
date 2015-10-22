<?php /* Template Name: Contacts Template */ get_header(); ?>
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

    </div><!-- /.col-md-8 -->
    <aside class="sidebar contact-form col-md-4" role="complementary">
      <div class="widget widget-contacts">
        <h6>Обратная связь</h6>
        <?php echo do_shortcode('[contact-form-7 id="71" title="contact-form"]'); ?>
      </div>
    </aside><!-- contact-form -->
  </div><!-- /.row inner -->
  <div class="row mapser">
    <?php $location = get_field('maps');
      if( !empty($location) ):
    ?>
    <div class="acf-map">
      <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div><!-- acf-map -->
    <?php endif; ?>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/gmap.js"></script>
  </div><!-- /.row mapser -->
<?php get_footer(); ?>
