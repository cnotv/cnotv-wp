@extends('layouts.base')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{  __('Sorry, no results were found.', 'sage') }}
    </div>
    {{-- {!! get_search_form(false) !!} --}}
  @endif

  <section class="cnotv__hero cnotv__flexgrid">
    @while(have_posts()) @php(the_post())
      <?php if (get_post_type() === 'portfolio'): ?>
        <?php get_template_part('partials/content-portfolio', get_post_type() != 'portfolio' ? get_post_type() : get_post_format()); ?>
      <?php endif; ?>
    @endwhile
  </section>
  <section class="cnotv__hero cnotv__flexgrid">
    @while(have_posts()) @php(the_post())
      <?php if (get_post_type() === 'post'): ?>
        <?php get_template_part('partials/content', get_post_type() != 'posts' ? get_post_type() : get_post_format()); ?>
      <?php endif; ?>
    @endwhile
  </section>

  {{-- {!! get_the_posts_navigation() !!} --}}
@endsection
