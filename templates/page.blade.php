@extends('layouts.base')

@section('content')
  @while(have_posts()) @php(the_post())
    <section class="c-section">
      <div class="c-container-s">
        @include('partials.page-header')
        @include('partials.content-page')
      </div>
    </section>
  @endwhile
@endsection
