@extends('layouts.base')
@section('content')
  <section class="c-section">
    <div class="c-container-s">
      @include('partials.page-header')
      <div class="c-row">
        @while (have_posts()) @php(the_post())
          @include ('partials.content-'.(get_post_type() !== 'post' ? get_post_type() : get_post_format()))
        @endwhile
      </div>
    </div>
  </section>
@endsection


