@extends('layouts.base')
@section('content')
  <section class="c-section">
    <div class="c-container">
      @include('partials.page-header')
      {!! taxonomy_cloud(get_queried_object()->taxonomy, 'Categories:') !!}

      @if (!have_posts())
        {{  __('Sorry, no results were found.', 'sage') }}
        {!! get_search_form(false) !!}
      @endif

      <div class="c-row">
        @while (have_posts()) @php(the_post())
          @include('partials.content-'.get_post_type())
        @endwhile
      </div>
    </div>
  </section>
@endsection
