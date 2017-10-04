@php($columns = 'c-col-1-4 o-card fadeInUp')
@if (is_tax( ['tools','subfields'] ))
  @php($columns = 'c-col-1-3 o-card fadeInUp')
@endif

<article @php(post_class($columns))>
  <div class="o-card__wrap">
    <a href="{{the_permalink()}}" class="js-modal" data-toggle="modal" data-target="#cnotvModal">

      <img src="{{wp_get_attachment_url( get_post_thumbnail_id() )}}" alt="{{the_title()}}">

      <footer>
        {!! portoflio_link() !!}
      </footer>
    </a>
  </div>
</article>

