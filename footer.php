
		</div><!--container-->
		<footer id="footer">
			<div class="container pb-5">
				<div class="row">
					<?php if ( !dynamic_sidebar( 'ng-footer' ) ): 
						echo 'No footer widgets active';
					endif; ?>
				</div>
			</div>
		</footer>
		
		<?php wp_footer(); ?>
	</body>
</html>