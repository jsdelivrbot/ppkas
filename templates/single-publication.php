<?php
/**
 * @package UKMTheme
 * @subpackage UKM Twenty Fifteen
 * @version 1.0
 * @author Jamaludin Rajalu
 */
get_header(); ?>
<div class="wrap column">
  <article class="article col-12-12">
    <h2><?php the_title(); ?></h2>
      <?php while ( have_posts() ) : the_post(); ?>
        <div class="column">
          <div class="col-3-12 pad-right">
            <?php
              $pub_cover = get_post_meta($post->ID,'ut_publication_cover',true);
              if ( $pub_cover ) { ?>
              <img src="<?php echo $pub_cover; ?>" alt="">
              <?php }

              else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/placeholder_publication.svg">
              <?php }
            ?>
          </div>
          <div class="col-9-12 pad-left">
            <h4><?php _e('Detail','ukmtheme') ?></h4>
            <table>
              <tr><td><?php _e('Author','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_author', true); ?></td></tr>
              <tr><td><?php _e('Publisher','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_publisher', true); ?></td></tr>
              <tr><td><?php _e('Year','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_year', true); ?></td></tr>
              <tr><td><?php _e('Number of Pages','ukmtheme'); ?></td><td>:&nbsp;<?php echo get_post_meta($post->ID, 'ut_publication_pages', true); ?></td></tr>
              <tr><td><?php _e('Reference/Download','ukmtheme'); ?></td><td>:&nbsp;<a href="<?php echo get_post_meta($post->ID, 'ut_publication_reference', true); ?>"><?php _e('Click here','ukmtheme') ?></a></td></tr>
            </table>
            <h4><?php _e( 'Summary', 'ukmtheme' ); ?></h4>
            <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
      <p><?php get_template_part( 'templates/content', 'paginate' ); ?></p>
  </article>
</div>
<?php get_footer(); ?>