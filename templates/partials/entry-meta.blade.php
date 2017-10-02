<time class="updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>

<div>
  <a href="{{share_button('facebook')}}"  target="_blank" class="fa fa-facebook"></a>
  <a href="{{share_button('twitter')}}" target="_blank" class="fa fa-twitter"></a>
  <a href="{{share_button('linkedin')}}" target="_blank" class="fa fa-linkedin"></a>
  <a href="{{share_button('mail')}}" class="fa fa-mail"></a>
</div>
  
<div class="">
  @if(is_singular( 'post' ))
    {!! taxonomy_cloud('post_tag','Tags:') !!}
  @endif
  @if(is_singular( 'portfolio_category' ))
    {!! taxonomy_cloud('portfolio_category', 'Categories:') !!}
  @endif
  @if(!is_singular( 'post' ))
    {!! taxonomy_cloud('subfields') !!}
    {!! taxonomy_cloud('tools', 'Stack:') !!}
  @endif
</div>
