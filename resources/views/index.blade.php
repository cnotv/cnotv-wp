@extends('layouts.base')

@section('content')
  <section class="c-section">
    <div class="c-container">
      @include('partials.page-header')

      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      <div class="c-row">
        @while (have_posts()) @php(the_post())
          @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
        @endwhile
      </div>

      {!! get_the_posts_navigation() !!}
    </div>
  </section>
@endsection
