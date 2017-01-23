export default {
  init() {
    // JavaScript to be fired on all pages
    $('.js-modal').on('click', function modalLink() {
      $('#cnotvModal .modal-content').load($(this).attr('href'));
    });
    $('.js-search').on('click', () => {
      $('.cnotv__navbar__menu').addClass('hidden-xs-up');
      $('.cnotv__togglers').addClass('hidden-xs-up');
      $('.cnotv__search').removeClass('hidden-xs-up');
      $('.search-field').focus();
    });
    $('.js-search__close').on('click', () => {
      $('.cnotv__navbar__menu').removeClass('hidden-xs-up');
      $('.cnotv__togglers').removeClass('hidden-xs-up');
      $('.cnotv__search').addClass('hidden-xs-up');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
