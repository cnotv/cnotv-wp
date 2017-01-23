<div class="cnotv__meta">
	<?php 
	// load subfields
	$my_terms = array('portfolio_category');
	$terms_obj =  wp_get_object_terms($post->ID, $my_terms);
	if( !empty($terms_obj) ) {
		if( !is_wp_error( $terms_obj ) ) {
			?><h5>Category:</h5><?php
			foreach($terms_obj as $term) {
				foreach($my_terms as $my_term) {
					echo '<a href="'.get_term_link($term->slug, $my_term).'">'.$term->name.'</a> ';
				}
			}
		}
	}
	?>
	<br>
	<br>
	<?php 
	// load subfields
	$my_terms = array('subfields');
	$terms_obj =  wp_get_object_terms($post->ID, $my_terms);
	if( !empty($terms_obj) ) {
		if( !is_wp_error( $terms_obj ) ) {
			?><h5>Field:</h5><?php
			foreach($terms_obj as $term) {
				foreach($my_terms as $my_term) {
					echo '<a href="'.get_term_link($term->slug, $my_term).'">'.$term->name.'</a> ';
				}
			}
		}
	}
	?>
	<br>
	<br>
	<?php 
	// load tools
	$my_terms = array('tools');
	$terms_obj =  wp_get_object_terms($post->ID, $my_terms);
	if( !empty($terms_obj) ) {
		if( !is_wp_error( $terms_obj ) ) {
			?><h5>Tools:</h5><?php
			foreach($terms_obj as $term) {
				foreach($my_terms as $my_term) {
					echo '<a href="'.get_term_link($term->slug, $my_term).'">'.$term->name.'</a> ';
				}
			}
		}
	}
	?>
	<br>
	<br>
</div>
