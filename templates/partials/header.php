<header class="cnotv__header" role="banner">
  <div class="cnotv__container">
    <?php echo get_custom_logo('asd'); ?>
    <nav class="cnotv__navbar navbar">
      <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-navicon"></i></button>
      <div class="cnotv__search hidden-xs-up">
        <?php get_search_form(); ?>
        <a class="js-search__close nav navbar-nav pull-right" href="#"><i class="fa fa-times"></i></a>
      </div>
      <div class="cnotv__navbar__menu hidden-sm-down">
        <?php
        if (has_nav_menu('primary_navigation')) :
           wp_nav_menu([ 'menu' => 'primary',
          'theme_location' => 'primary_navigation',
          'container' => 'div',
          'container_id' => '',
          'container_class' => '',
          'menu_id' => false,
          'menu_class' => 'nav navbar-nav',
          'depth' => 2,
          'fallback_cb' => 'bs4navwalker::fallback',
          'walker' => new bs4navwalker()
          ]);
        endif;
        ?>
      </div>
      <div class="cnotv__togglers nav navbar-nav">
        <a class="js-search" href="#"><i class="fa fa-search"></i><span>Search</span></a>
        <a class="js-contact js-modal" href="/contact" data-toggle="modal" data-target="#cnotvModal"><i class="fa fa-pencil"></i><span>Contact</span></a>
      </div>
    </nav>
    <nav class="cnotv__navbarmobile navbar hidden-md-up">
      <div class="cnotv__navbar__menu collapse navbar-toggleable-sm" id="navbarResponsive">
        <?php
        if (has_nav_menu('primary_navigation')) :
           wp_nav_menu([ 'menu' => 'primary',
          'theme_location' => 'primary_navigation',
          'container' => 'div',
          'container_id' => '',
          'container_class' => '',
          'menu_id' => false,
          'menu_class' => 'nav navbar-nav',
          'depth' => 2,
          'fallback_cb' => 'bs4navwalker::fallback',
          'walker' => new bs4navwalker()
          ]);
        endif;
        ?>
      </div>
    </nav>
  </div>
</header>