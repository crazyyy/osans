<?php /* Template Name: Search Template */ get_header(); ?>
  <div class="row inner">
    <div class="col-md-8">

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <h1 class="single-title inner-title title3"><?php the_title(); ?></h1>
        <article id="post-<?php the_ID(); ?>" <?php post_class('select-equiper'); ?>>
          <div class="select-equiper-block">
            <form action="Производитель">
            <table>
              <tr>
                <td>
                  <label for="manufacturer"></label>
                  <select name="manufacturer" id="manufacturer">
                    <option>Все производители</option>
                    <option>Все производители</option>
                    <option>Все производители</option>
                  </select>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <span>Мощность ИБП (ВА):</span>
                  <label for="power-from">
                    от <input type="text" id="power-from">
                  </label>
                  <label for="power-for">
                    до <input type="text" id="power-for">
                  </label>
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <span>Расход топлива (л/час):</span>
                  <label for="fuel-from">
                    от <input type="text" id="fuel-from">
                  </label>
                  <label for="fuel-for">
                    до <input type="text" id="fuel-for">
                  </label>
                </td>
                <td>
                  <input type="range" id="fuel-range" name="fuel-range">
                </td>
              </tr>
              <tr>
                <td>
                  <span>Объем встроенного бака (литры):</span>
                  <label for="tank-from">
                    от <input type="text" id="tank-from">
                  </label>
                  <label for="tank-for">
                    до <input type="text" id="tank-for">
                  </label>
                </td>
                <td>
                  <input type="range" id="tank-range" name="tank-range">
                </td>
              </tr>
              <tr>
                <td>
                  <span class="wlh">Габариты ДхШхВ (мм):</span>
                  <span class="width">
                    <label for="width">Ширина</label>
                    <input type="text" id="width">
                  </span><!-- width -->
                  <span class="length">
                    <label for="width">Длина</label>
                    <input type="text" id="length">
                  </span><!-- length -->
                  <span class="height">
                    <label for="height">Высота</label>
                    <input type="text" id="height">
                  </span><!-- height -->
                </td>
                <td></td>
              </tr>
              <tr>
                <td>
                  <span>Вес (кг):</span>
                  <label for="weight-from">
                    от <input type="text" id="weight-from">
                  </label>
                  <label for="weight-for">
                    до <input type="text" id="weight-for">
                  </label>
                </td>
                <td>
                  <input type="range" id="weight-range" name="weight-range">
                </td>
              </tr>
            </table>
            <button type="submit" value="submit" class="btn-red">Подобрать продукцию</button>
            <button type="reset" value="reset" class="btn-gray">Очистить форму</button>
            </form>
          </div><!-- /.select-equiper block -->
          <h4 class="title3 title-gray">Результаты подбора</h4>
          <div class="product-listing">
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
          </div><!-- product-listing -->
          <?php the_content(); ?>
        </article><!-- select-equiper -->
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

