<div>
	<?php
	global $post;
	$orig_post = $post;
	$categories = get_the_category($post->ID);
	$taxnames = wp_get_post_terms( $post->ID, 'portfolio_category', $args );
	 
	if ($categories) :
		foreach ($categories as $category)
			$args = array(
				'post_type' => 							get_post_type(),
				'category__in' =>						$category->term_id,
				'orderby' =>								'rand',
				'post__not_in' =>						array($post->ID),
				'posts_per_page'=>					4, // Number of related posts that will be shown.
				'ignore_sticky_posts'=>			false
			);
	elseif ($taxnames) :
		foreach ($taxnames as $taxname)
			$args = array(
				'post_type' => 							get_post_type(),
				'orderby' =>								'rand',
				'post__not_in' =>						array($post->ID),
				'posts_per_page'=>					4, // Number of related posts that will be shown.
				'ignore_sticky_posts'=>			false,
        'tax_query' => array(
          array(
            'taxonomy' => 'portfolio_category',
            'field' => 'term_id',
            'terms' => $taxname->term_id
          )
        )
			);
	endif;
		$related_query = new wp_query( $args );?>
		<h5 class="">Related content:</h5>

		<div class="cnotv__flexgrid">
			
			<?php while($related_query->have_posts()): ?>
				<?php $related_query->the_post(); ?>
					<?php get_template_part('partials/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
		</div>
	<?php $post = $orig_post; ?>
	<?php wp_reset_query(); ?>
</div>

