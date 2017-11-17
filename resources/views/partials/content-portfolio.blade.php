@php($columns = 'c-col-1-4 o-card isLoading')
@if (!is_front_page() && !is_singular())
  @php($columns = 'c-col-1-3 o-card isLoading')
@endif

<article @php(post_class($columns))>
  <div class="o-card__wrap">
    <a href="{{the_permalink()}}">

      <img 
        data-src="{{ wp_get_attachment_url( get_post_thumbnail_id() )}}"
        src="{{ wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail')[0] }}"
        alt="{{ the_title() }}"
      >

    </a>
  </div>
</article>

