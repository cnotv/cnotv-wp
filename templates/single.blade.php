@extends('layouts.base')

@section('content')
	@while(have_posts()) @php(the_post())
		<div class="cnotv__flexgrid cnotv__flexgrid--invertwrap">
			<section class="cnotv__flexgrid__column cnotv__flexgrid__column--fill">
				@include('partials/content-single-'.get_post_type())
			</section>
			<section class="cnotv__flexgrid__column cnotv__flexgrid__column--4">
				@include('partials/pagination')
				@include('partials/entry-meta')
				@include('partials/entry-meta-portfolio')
				<?php dynamic_sidebar('sidebar-primary'); ?>
			</section>
		</div>

		<hr class="cnotv__divider clearfix">
		@include('partials/related-post')
	@endwhile
@endsection

