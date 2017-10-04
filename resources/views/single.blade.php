@extends('layouts.base')

@section('content')
  <section class="c-section">
    <div class="c-container">

      @while(have_posts()) @php(the_post())
        <div class="c-row">
          <section class="c-col-3-4">
            @include('partials/content-single-'.get_post_type())
          </section>
          <aside class="c-col-1-4">
            @include('partials/pagination')
            @include('partials/entry-meta')
            @php(dynamic_sidebar('sidebar-primary'))
          </aside>
        </div>
      @endwhile
        
    </div>
  </section>

  <section class="c-section">
    <div class="c-container">
      @include('partials/related-post')
    </div>
  </section>
@endsection

