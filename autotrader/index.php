<?php get_header(); ?>


<div id="primary" class="content-area row">
    <main id="main" class="site-main col-md-8 col-sm-12" role="main">


            <?php
            // Start the loop
            while( have_posts() ) : the_post();

				?>
				
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">


					<?php the_title( sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<div class="entry-info">
						<?php
							$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

							if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
								$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
							}

							$time_string = sprintf( $time_string,
								esc_attr( get_the_date( 'c' ) ),
								get_the_date(),
								esc_attr( get_the_modified_date( 'c' ) ),
								get_the_modified_date()
							);

							printf( '<span class="posted-on">%1$s %2$s</span>',
								esc_attr_x( 'Posted on', 'Used before publish date.', 'autotrader' ),
								$time_string
							);
							$author_id  =   get_the_author_meta( 'ID' );
							$author_url =   get_author_posts_url( $author_id );

							printf( 
								'<span class="author-info"> by <a href="%1$s">%2$s</a></span>', 
								esc_url( $author_url ), 
								esc_html( get_the_author_meta( 'display_name', $author_id ) ) 
							);

						?>
					</div>
				</header>

				
				<div class="entry-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div><!-- .post-thumbnail -->

				<div class="entry-content">
					 <div class="entry-summary">
						<?php the_excerpt(); ?>
					</div>
				</div><!-- .entry-content -->


			</article>

				<?php

            // End the loop
            endwhile;

		    if( get_next_posts_link() || get_previous_posts_link() ) :
			?>

				<div class="pagination">
					<span class="nav-next pull-left"><?php previous_posts_link( '&larr; ' . esc_attr__( 'Newer posts', 'autotrader' ) ); ?></span>
					<span class="nav-previous pull-right"><?php next_posts_link( esc_attr__( 'Older posts', 'autotrader' ) . ' &rarr;' ); ?></span>
				</div>

			<?php
			endif;
			?>

    </main><!-- .site-main -->
    <?php get_sidebar('2-col'); ?>
</div><!-- content-area -->

<?php get_footer(); ?>