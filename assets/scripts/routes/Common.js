export default {
  init() {
    // JavaScript to be fired on all pages
    $('.js-modal').on('click', function modalLink() {
      // TODO search how to target main
      const modalcontent = $(this).attr('href');
      $('#cnotvModal .modal-content').empty().append('<div class="cnotv__loader"></div>');
      $('#cnotvModal .modal-content').load(modalcontent);
    });
    $('.js-search').on('click', () => {
      $('body').addClass('has-search-open').removeClass('has-menu-open');
      $('.search-field').focus();
    });
    $('.js-search__close').on('click', () => {
      $('body').removeClass('has-search-open');
    });
    $('.js-burger').on('click', () => {
      $('body').toggleClass('has-menu-open').removeClass('has-search-open');
    });
    $('.cnotv__navbar__menu a').on('click', () => {
      $('.js-burger').toggleClass('is-loading');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
