@if(!is_home())
  @include('partials/pagination')

  <time datetime="{{ get_post_time('c', true) }}">
    <i class="fa fa-clock-o"></i>
    {{ get_the_date() }}
  </time>

  @include('partials.social')
@endif
  
@if(is_singular( 'post' ) || is_home())
  {!! taxonomy_cloud('post_tag','Tags:') !!}
@endif
@if(is_singular( 'portfolio_category' ) && !is_home())
  {!! taxonomy_cloud('portfolio_category', 'Categories:') !!}
@endif

@if(!is_singular( 'post' ) && !is_home())
  {!! taxonomy_cloud('subfields', 'Projects type') !!}
  {!! taxonomy_cloud('tools', 'Stack:') !!}
@endif
