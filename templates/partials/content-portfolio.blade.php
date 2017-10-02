@php($columns = 'c-col-1-4 fadeInUp')
@if (is_tax( ['tools','subfields'] ))
  @php($columns = 'c-col-1-3 c-card fadeInUp')
@endif

<article @php(post_class($columns))>
  <div class="c-card__wrap">
    @php($portfolio_link = esc_url(get_post_custom_values('portfolio_link')[0]))
    @if($portfolio_link)
      <a href="{{$portfolio_link}}" target="_blank"><i class="fa fa-link"></i></a>
    @endif
    <a href="{{the_permalink()}}" class="item-wrap js-modal" data-toggle="modal" data-target="#cnotvModal">
      <img src="{{wp_get_attachment_url( get_post_thumbnail_id() )}}" alt="{{the_title()}}">
    </a>
  </div>
</article>

