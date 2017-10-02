<header class="c-section">
  <div class="c-container-s">
    
    {!!get_custom_logo('asd')!!}

{{--     <div class="cnotv__search">
      {{get_search_form()}}
      <a class="js-search__close" href="#"><i class="fa fa-times"></i></a>
    </div> --}}

    <nav class="o-nav-h">
      <ul class="">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu([ 
            'menu' => 'primary',
            'theme_location' => 'primary_navigation',
            'container' => '%3$s',
            'container_id' => '',
            'container_class' => '',
            'menu_id' => false,
            'menu_class' => 'cnotv__navbar__menu__bar',
            'depth' => 2,
            // 'fallback_cb' => 'bs4navwalker::fallback',
            // 'walker' => new bs4navwalker()
          ]);
        endif;
        ?>
      </ul>
      <div class="o-nav-h__right">
        <a class="js-search" href="#"><i class="fa fa-search"></i></a>
        <a class="js-contact js-modal" href="/contact" data-toggle="modal" data-target="#cnotvModal"><i class="fa fa-pencil"></i></a>
        <a class="js-burger" type="button"><i class="fa fa-navicon"></i></a>
      </div>
    </nav>
  </div>
</header>