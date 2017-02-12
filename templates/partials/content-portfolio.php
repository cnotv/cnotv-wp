<?php if (is_tax( ['tools','subfields'] )): ?>
	<?php $columns = 'cnotv__flexgrid__column--3' ?>
<?php else: ?>
	<?php $columns = 'cnotv__flexgrid__column--4' ?>
<?php endif ?>
<article <?php post_class('cnotv__flexgrid__column '. $columns .' fadeInUp'); ?>>
	<?php $portfolio_link = esc_url(get_post_custom_values('portfolio_link')[0]); ?>
	<?php if ($portfolio_link): ?>
		<a class="cnotv__featured__link" href="<?php echo $portfolio_link ?>" target="_blank"><i class="fa fa-link"></i></a>
	<?php endif; ?>
	<a href="<?php the_permalink(); ?>" class="item-wrap cnotv__link js-modal" data-toggle="modal" data-target="#cnotvModal">
		<div class="cnotv__featured featured-image">
			<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" alt="<?php the_title(); ?>">
		</div>
	</a>
</article>

