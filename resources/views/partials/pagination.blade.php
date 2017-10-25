<nav class="o-nav-alt">
  @php($portfolio_link = esc_url(get_post_custom_values('portfolio_link')[0]))

  @if ($portfolio_link)
    <a class="" href="{{$portfolio_link}}" target="_blank"><i class="fa fa-link"></i></a>
  @endif

  @php($prev_post = get_previous_post())
  @if(!empty( $prev_post ))
    <a class="" href="{{get_permalink( $prev_post->ID )}}"><i class="fa fa-arrow-left"></i></a>
  @endif

  @php($next_post = get_next_post())
  @if(!empty( $next_post ))
    <a class="" href="{{get_permalink( $next_post->ID )}}"><i class="fa fa-arrow-right"></i></a>
  @endif

  <a class="" href="{{get_home_url()}}" ><i class="fa fa-times"></i></a>
</nav>