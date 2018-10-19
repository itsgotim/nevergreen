<?php
/*
Template Name: Full-Width
*/
get_header(); ?>
		
			<h1 id="pageTitle" class="mb-5"><?php echo single_post_title(); ?></h1>
				<main id="main">
					<?php
					while ( have_posts() ) :

						the_post();

						the_content();

						// If comments are open or we have at least one comment, load up the comment template.
						/*if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;*/

					endwhile; // End of the loop.
					?>
				</main>
		
<?php get_footer();