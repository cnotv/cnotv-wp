<article <?php post_class('cnotv__flexgrid__column cnotv__flexgrid__column--2'); ?>>
  <header>
    <h2 class="h4 entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <footer>
		<?php echo get_the_tag_list('<p>Tags: ','&nbsp','</p>'); ?>
  </footer>
</article>
