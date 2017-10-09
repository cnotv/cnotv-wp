@php($columns = 'c-col-1-4 o-card')
@if (is_tax( ['tools','subfields'] ))
  @php($columns = 'c-col-1-3 o-card')
@endif

<article @php(post_class($columns))>
  <div class="o-card__wrap">
    <a href="{{the_permalink()}}">

      <img class="islazy" data-src="{{ wp_get_attachment_url( get_post_thumbnail_id() )}}" alt="{{ the_title() }}">

    </a>
  </div>
</article>

