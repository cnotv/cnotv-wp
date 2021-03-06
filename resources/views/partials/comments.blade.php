@php
if (post_password_required()) {
  return;
}
@endphp

@if (have_comments())
  <h6>
    {!! sprintf(_nx('One comment', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number()), number_format_i18n(get_comments_number())) !!}
  </h6>

  <ol class="comment-list">
    {!! wp_list_comments(['style' => 'ol', 'short_ping' => true]) !!}
  </ol>

  @if (get_comment_pages_count() > 1 && get_option('page_comments'))
    <nav>
      <ul class="pager">
        @if (get_previous_comments_link())
          <li class="previous">@php(previous_comments_link(__('&larr; Older comments', 'sage')))</li>
        @endif
        @if (get_next_comments_link())
          <li class="next">@php(next_comments_link(__('Newer comments &rarr;', 'sage')))</li>
        @endif
      </ul>
    </nav>
  @endif
@endif

@if (!comments_open() && get_comments_number() != '0' && post_type_supports(get_post_type(), 'comments'))
  <div class="alert alert-warning">
    {{ __('Comments are closed.', 'sage') }}
  </div>
@endif

@php(comment_form())
