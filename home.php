<?php
/**
 * The home template file for displaying blog
 */

get_header(); ?>
		<h1 id="pageTitle" class="mb-5"><?php echo single_post_title(); ?></h1>
		<div class="row">
			<main id="main" class="col-lg-8">
				<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
		
					get_template_part( 'template-parts/content', get_post_format() );
	  
				endwhile; endif; 
				?>
			</main>
		
			<?php get_sidebar(); ?>
		</div><!--row-->
		
<?php get_footer();