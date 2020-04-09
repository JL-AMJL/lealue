<?php
/**
 * The front page template file. Serves as main blogpage.
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lealue
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			$args = array(
				'type'              => 'post'
			);
			$the_posts = new WP_Query ($args);

			if( $the_posts->have_posts() ):
				$i = 1;
				while ( $the_posts->have_posts() ): $the_posts->the_post();
					//alternate between landscape layout and portrait layout for mobile version
					if( $i % 2 == 0 ):
						$layout = 'portrait';
					else:
						$layout = 'landscape';
					endif;
					get_template_part( 'template-parts/content', 'front' );
					$i++;
				endwhile;
			endif;
			wp_reset_postdata();

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="footer-dots">
		<div class="footer-dot" id="item1"></div>
		<div class="footer-dot" id="item2"></div>
		<div class="footer-dot" id="item3"></div>
	</div>

<?php
get_sidebar();
get_footer();
