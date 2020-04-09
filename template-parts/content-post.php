<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lealue
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($class = "single post-wrapper"); ?>>
	<div class="entry-content">
		<?php
			if (has_block('gallery', $post->post_content)) :
				$post_blocks = parse_blocks($post->post_content);
				?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' );?>
					<p class="entry-subtitle"><?php echo get_field('year'); ?></p>
				</header><!-- .entry-header -->
				<div class="entry-text has-gallery">
					<?php
						foreach ($post_blocks as $post_block) :
							if (array_key_exists('className', $post_block['attrs']) && strpos($post_block['attrs']['className'], "entry-text") !== false):
								foreach($post_block['innerBlocks'] as $inner_block):
									echo $inner_block['innerHTML'];
								endforeach;
							endif;
						endforeach;
					?>
				</div><!-- entry-text -->
				<div class="carousel-controls">
					<a class="lealue-carousel-control" href="#single-carousel" role="button" data-slide="prev">
						<span class="lealue-chevron-left" aria-hidden="true">&#xe901;</span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="lealue-carousel-control" href="#single-carousel" role="button" data-slide="next">
						<span class="lealue-chevron-right" aria-hidden="true">&#xe902;</span>
						<span class="sr-only">Next</span>
					</a>
				</div><!-- carousel-controls -->
				<?php
				foreach ($post_blocks as $post_block) :
					if($post_block['blockName'] === "core/gallery") :
						$ids = $post_block['attrs']['ids'];												//Retrieve attachement ids and store in array
						foreach( $ids as $id ):
							$urls[] = wp_get_attachment_image_src( $id, 'full' ); 	//Retrieve image src and store in array
						endforeach;
						$first_url = $urls[0];																		//store first url in seperate variable
						unset($urls[0]);																					//delete first url from array
						$urls = array_values($urls); 															//remap array keays to 0,1,2...
						
						?>
						<div id="single-carousel" class="carousel slide" data-interval="false" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<img class="slider-image" src="<?php echo $first_url[0]; ?>"/>
								</div>
								<?php
									foreach ( $urls as $url ) : ?>
											<div class="item">
												<img class="slider-image" src=" <?php echo $url[0]; ?>"/> 
											</div>
									<?php
									endforeach;?>
							</div> <!-- carousel-inner -->
						</div> <!-- carousel -->
						
						<?php
					endif;
				endforeach;
			else:
				?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<p class="entry-subtitle"><?php echo get_field('year'); ?></p>
				</header><!-- .entry-header -->

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
				<?php
			endif; ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lealue_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
