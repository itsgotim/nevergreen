<?php
/**
 * The home template file for displaying blog
 */

get_header(); ?>
		
		<div class="container pt-5">
			<h1 id="pageTitle" class="mb-5"><?php echo single_post_title(); ?></h1>
			<div class="row">
				<main id="main" class="col-lg-8 mb-5">
					<?php 
					while ( have_posts() ) : the_post();
			
						get_template_part( 'template-parts/content', get_post_format() );
		  
		  
					the_post_navigation( array(
						'prev_text' => '<span style="float:left;">Previous Post</span>', 
						'next_text' => '<span style="float:right;">Next Post</span>'
						
					));
					
					endwhile;
					?>
				</main>
				
				<?php get_sidebar(); ?>
			</div>
		</div>
		
<?php get_footer();