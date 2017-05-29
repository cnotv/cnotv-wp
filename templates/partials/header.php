<header class="cnotv__header">
  <div class="cnotv__container">
    <?php echo get_custom_logo('asd'); ?>
    <nav class="cnotv__navbar">
      <button class="cnotv__navbar__burger js-burger" type="button"><i class="fa fa-navicon"></i></button>
      <div class="cnotv__search">
        <?php get_search_form(); ?>
        <a class="js-search__close" href="#"><i class="fa fa-times"></i></a>
      </div>
      <div class="cnotv__navbar__menu">
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
      </div>
      <div class="cnotv__navbar__togglers">
        <a class="js-search" href="#"><i class="fa fa-search"></i><span>Search</span></a>
        <a class="js-contact js-modal" href="/contact" data-toggle="modal" data-target="#cnotvModal"><i class="fa fa-pencil"></i><span>Contact</span></a>
      </div>
    </nav>
  </div>
</header>