<?php
/**
 * The template for displaying pages
 * 2-columns page layout
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */
get_header(); ?>

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-8 col-sm-12" role="main">



			<?php
			// Start the loop
			while( have_posts() ) : the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">','</h1>' ); ?>
					</header>

					<div class="entry-thumbnail">
						<?php the_post_thumbnail(); ?>
					</div><!-- .post-thumbnail -->

					<div class="entry-content">
						<?php

						the_content();

						wp_link_pages( array(
							'before'        =>  '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'autotrader' ) . '</span>',
							'after'         =>  '</div>',
							'link_before'   =>  '<span>',
							'link_after'    =>  '</span>',
							'pagelink'      => '<span class="screen-reader-text">' . __( 'Page', 'autotrader' ) . ' </span>%',
							'separator'     => '<span class="screen-reader-text">, </span>',
						) );

						?>
					</div><!-- .entry-content -->

					<?php
					edit_post_link(
						sprintf(
						/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"', 'autotrader' ),
						get_the_title()
						),
						'<footer class="entry-footer"><span class="edit-link">',
						'</span></footer><!-- .entry-footer -->'
					);
					?>

			</article>	
			
			<?php
				// End of the loop.
			endwhile;

			?>


		</main><!-- .site-main -->
		<?php get_sidebar('2-col'); ?>
	</div><!-- content-area -->

<?php get_footer(); ?>