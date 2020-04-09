<?php
/**
 * Template part for displaying posts on blogpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lealue
 */

?>

<?php global $layout; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class = 'front post-wrapper'); ?>>

  <div class="front entry-wrapper">
    <a href="<?php echo get_permalink(); ?>">
      <header class="front entry-header <?php echo $layout; ?>">
        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
      </header><!-- .entry-header -->
    </a>

    <?php  
      //get data for image tags
      if (get_field('post_thumbnail_1') !== false || get_field('post_thumbnail_2') !== false) :
      $thumb_1 = get_field('post_thumbnail_1');
      $thumb_2 = get_field('post_thumbnail_2');
    ?>  
    
    <div class="front entry-content desktop">
      <img class="featured-image featured-image-portrait" src="<?php echo $thumb_1['sizes']['large']; ?>" alt="<?php echo $thumb_1['alt']; ?>"/>
      <img class="featured-image featured-image-landscape" src="<?php echo $thumb_2['sizes']['large']; ?>" alt="<?php echo $thumb_2['alt']; ?>"/>
    </div><!-- .entry-content desktop-->

    <div class="front entry-content mobile <?php echo $layout; ?>">
      <div class="featured-mobile" style="background-image: url(<?php echo $thumb_2['sizes']['large']; ?>)"></div>
    </div><!-- .entry-content mobile-->

    <?php else :?>
      <div class="entry-content">
        <?php
        the_content( sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lealue' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ) );
    
        wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lealue' ),
          'after'  => '</div>',
        ) );
        ?>
      </div><!-- .entry-content -->
    <?php endif;?>
  </div><!-- .entry-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
