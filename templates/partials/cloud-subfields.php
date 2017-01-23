<div class="cnotv__meta">
	<?php 
	$terms = get_terms( 'subfields' );
	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	    foreach ( $terms as $term ) {
	        echo '<a href="' . esc_url( get_term_link( $term ) ) . ' ">' . $term->name . '</a> ';
	    }
	}
	?>
</div>