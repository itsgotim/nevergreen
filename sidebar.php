				<div id="sidebar" class="col-lg-4">
					<?php if (is_page()):
						if ( !dynamic_sidebar( 'ng-page-sidebar' ) ): 
							echo 'No sidebar widgets active. Please use page-full-width template for no sidebar.';
						endif; 
					else:
						if ( !dynamic_sidebar( 'ng-blog-sidebar' ) ): 
							echo 'No sidebar widgets active';
						endif; 
					endif; ?>
				</div>