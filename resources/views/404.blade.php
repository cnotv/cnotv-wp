@extends('layouts.base')
<?php get_template_part('partials/page-header'); ?>

@section('content')
  <div class="alert alert-warning">
    <?php _e('Sorry, but the page you were trying to view does not exist.', 'sage'); ?>
  </div>

  <?php get_search_form(); ?>
@endsection
