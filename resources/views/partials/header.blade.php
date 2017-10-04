<header class="c-section">
  <div class="c-container">
    
    @if(get_custom_logo())
      {!! get_custom_logo() !!}
    @else
      <h1 class="c-logo">{{ bloginfo( 'name' ) }}</h1>
    @endif

    <nav class="o-nav-h">
      {{ cnotv_nav_menu('primary_navigation') }}

      <div class="o-search__bar">
        {!! get_search_form() !!}
      </div>

      <div class="o-nav-h__right">
        <a class="js-search o-search__toggle" href="#"><i class="fa"></i></a>
        <a class="js-contact js-modal" href="{{ home_url() }}/contact" data-toggle="modal" data-target="#cnotvModal"><i class="fa fa-pencil"></i></a>
        <a class="js-burger o-nav-h__burger" type="button"><i class="fa fa-navicon"></i></a>
      </div>

    </nav>
  </div>
</header>