<?php
function bootstrap_gallery( $output = '', $atts, $instance ) {

	global $post;
	
	static $instance = 0;
	$instance++;
	
	$selector = "gallery-{$instance}";
	
	$atts = shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => 'figure',
		'icontag'    => 'div',
		'captiontag' => 'figcaption',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $atts, 'gallery' );

	
	$images = explode(',', $atts['include']);
	if($atts['columns'] < 1 || $atts['columns'] > 12) {
		$atts['columns'] == 3;
	}
  
	$col_class = 'col-sm-' . 12/$atts['columns'];
  
	$output = '<div class="gallery">';
	$output .= '<div class="row">';
	foreach($images as $i => $id) {
		
		//Start new row
		if ($i % $atts['columns'] == 0 && $i > 0) {
			$output .= '</div><div class="row">';
		}

		$attachment = get_post( $id );

		$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
		$attr = array( "class" => "rounded figure-img img-thumbnail" );

		if( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
			$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
		} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
			$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
		} else {
			$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
		}

		$output .= '
			<div class="' . $col_class . '">
				<figure class="figure">
					' . $image_output . '
					<figcaption class="figure-caption">' . wptexturize($attachment->post_excerpt) . '</figcaption>
				</figure>
			</div>';
	}
	$output .= '</div></div>';
	return $output;
}
add_filter('post_gallery', 'bootstrap_gallery', 10, 3);