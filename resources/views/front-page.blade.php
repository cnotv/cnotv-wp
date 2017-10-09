@extends('layouts.base')
@section('content')
  @while(have_posts()) @php(the_post())
    <article class="c-section">
      <div class="c-container-s">
        @include('partials.content-page')

        <div class="c-row">
          <div class="c-col-2-5">
            {!! taxonomy_cloud('subfields','Projects type') !!}
          </div>
          <div class="c-col-3-5">
            {!! taxonomy_cloud('tools','My stack') !!}
          </div>
        </div>
      </div>
    </article>
  @endwhile

  @php ($categories = get_terms('portfolio_category'))
  @foreach ( $categories as $category )
    <section class="c-section">
      <div class="c-container">
        <div class="c-row">
          <?php 
          $args = array( 
            'post_type' => 'portfolio',
            'posts_per_page' => 3,
            'tax_query' => array(
              array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category->slug
              )
            )
          );
          $query = new WP_Query( $args ); ?>
          @while ($query->have_posts()) @php($query->the_post())
            @include('partials.content-portfolio')
          @endwhile

          <article class="c-col-1-4 o-card">
            <a href="{{esc_url( get_category_link( $category->term_id ))}}">
              <div class="o-card__wrap">
                <section class="o-card--center islazy">
                  <p>Latest {{$category->name}}</p>
                  <i class="fa fa-plus"></i>
                </section>
              </div>
            </a>
          </article>
        </div>
      </div>
    </section>
  @endforeach
  
  <section class="c-section">
    <div class="c-container-s">
      <?php 
      $args = array( 
        'post_type' => 'post',
        'posts_per_page' => 4
      );
      $query = new WP_Query( $args ); ?>
      @while ($query->have_posts()) @php($query->the_post())
        @include('partials.content')
      @endwhile

      <div class="c-row c-row--padding-2 c-row--center">
          <a class="" href="blog"><i class="fa fa-plus"></i></a>
      </div>
    </div>
  </section>
  
@endsection
