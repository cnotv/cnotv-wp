@extends('layouts.base')
@include('partials.page-header')

@section('content')
  <div class="">
    {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
  </div>

  {{ get_search_form() }}
@endsection
