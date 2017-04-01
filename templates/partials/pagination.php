<nav class="cnotv__single__nav">
  <?php $portfolio_link = esc_url(get_post_custom_values('portfolio_link')[0]); ?>

  <?php if ($portfolio_link): ?>
    <a class="cnotv__single__nav__link" href="<?php echo $portfolio_link ?>" target="_blank"><i class="fa fa-link"></i></a>
  <?php endif; ?>

  <?php $prev_post = get_previous_post();
  if (!empty( $prev_post )): ?>
    <a class="cnotv__single__nav__link" href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="fa fa-arrow-left"></i></a>
  <?php endif; ?>

  <?php $next_post = get_next_post();
  if (!empty( $next_post )): ?>
    <a class="cnotv__single__nav__link" href="<?php echo get_permalink( $next_post->ID ); ?>"><i class="fa fa-arrow-right"></i></a>
  <?php endif; ?>

  <a class="cnotv__single__nav__link" href="<?php echo get_home_url(); ?>" data-dismiss="modal"><i class="fa fa-times"></i></a>
</nav>