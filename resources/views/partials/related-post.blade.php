<?php
  global $post;
  $orig_post = $post;
  $categories = get_the_category($post->ID);
  $taxnames = wp_get_post_terms( $post->ID, 'portfolio_category', $args );
?>
@if($categories)
  @foreach ($categories as $category)
    <?php $args = array(
      'post_type' =>              get_post_type(),
      'category__in' =>           $category->term_id,
      'orderby' =>                'rand',
      'post__not_in' =>           array($post->ID),
      'posts_per_page'=>          4, // Number of related posts that will be shown.
      'ignore_sticky_posts'=>     false
    ); ?>
  @endforeach
@elseif($taxnames)
  @foreach ($taxnames as $taxname)
    <?php $args = array(
      'post_type' =>              get_post_type(),
      'orderby' =>                'rand',
      'post__not_in' =>           array($post->ID),
      'posts_per_page'=>          4, // Number of related posts that will be shown.
      'ignore_sticky_posts'=>     false,
      'tax_query' => array(
        array(
          'taxonomy' => 'portfolio_category',
          'field' => 'term_id',
          'terms' => $taxname->term_id
        )
      )
    ); ?>
  @endforeach
@endif
  @php($query = new wp_query( $args ))
  <h5 class="">Related content:</h5>

  @if($categories)
    @while ($query->have_posts()) @php($query->the_post())
      <h6><a href="{{the_permalink()}}">{{the_title()}}</a></h6>
    @endwhile
  @elseif($taxnames)
    <div class="c-row">
      @while ($query->have_posts()) @php($query->the_post())
        @include('partials.content-portfolio')
      @endwhile
    </div>
  @endif
@php($post = $orig_post)
@php(wp_reset_query())


