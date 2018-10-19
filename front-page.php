<?php
/**
 * The main template file
 */

get_header(); ?>
				<section>
					<div id="sectionFeature" class="container mb-5">
						<h2 class="display-4 text-center mb-4">Explore</h2>
						<div class="row">
							<?php if ( !dynamic_sidebar( 'ng-front-page' ) ): 
							echo 'No featured widgets active';
							endif; ?>
						</div>
					</div>
				</section>
				
				<section>
					<div id="sectionNewsLetter" class="break-out mb-5">
						<div class="row align-items-center no-gutters">
							<div class="col">
								<h2 class="text-center">Stay informed with our newsletter!</h2>
								<form class="form-inline justify-content-center">
								  <div class="form-group mx-2 mb-2">
									<label for="inputEmail" class="sr-only">Email</label>
									<input type="email" class="form-control" id="inputEmail" placeholder="user@server.com" required>
								  </div>
								  <button type="submit" class="btn btn-secondary mb-2">Sign Up</button>
								</form>
							</div>
						</div>
					</div>
				</section>
				
				<section>
					<div id="sectionAboutUs" class="container mb-5">
						<h2 class="display-4 text-center mb-5">About Us</h2>
						<div class="row">
							<div class="col-md-4">
								<figure class="figure">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/about01.jpg" class="figure-img img-fluid rounded" alt="Hiking equipment" />
									<figcaption class="figure-caption">A caption for the above image.</figcaption>
								</figure>
							</div>
							<div class="col-md-8">
								<h3>Not who, but what we do</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								<button type="button" class="btn btn-secondary float-right">Learn More</button>
							</div>
						</div>
					</div>
				</section>
			
		
<?php get_footer();