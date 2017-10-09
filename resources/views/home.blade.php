@extends('layouts.base')
@section('content')
  <section class="c-section">
    <div class="c-container">

      <div class="c-row">
        
        <section class="c-col-3-4">
          @include('partials.page-header')

          <div class="c-row">
            @if (!have_posts())
              <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
              </div>
              {!! get_search_form(false) !!}
            @endif
          
            @while (have_posts()) @php(the_post())
              @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
            @endwhile
          </div>
        </section>

        <aside class="c-col-1-4">
          @include('partials/entry-meta')
          @php(dynamic_sidebar('sidebar-primary'))
        </aside>
      </div>
    </div>
  </section>
@endsection
