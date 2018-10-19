						<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post mb-4'); ?>>
							<?php if ( !is_single() ) : ?>
							<h2 class="blog-post-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
							<?php endif; ?>
							<p class="blog-post-meta"><?php the_date(); ?> by <a href="#"><?php the_author(); ?></a></p>

							<?php if( has_post_thumbnail() ) nevergreen_post_thumbnail(); ?>
							<?php (is_single()) ? the_content() : the_excerpt(); ?>

						</article><!-- /.blog-post -->
