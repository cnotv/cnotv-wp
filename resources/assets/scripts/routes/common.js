import lozad from 'lozad'

import Vue from 'vue'
import Search from '../vue/search.vue'

export default {
  init() {
    // JavaScript to be fired on all pages

    // navbar elements
    $('.js-search').on('click', () => {
      $('body').toggleClass('has-search-open').removeClass('has-menu-open')
      $('.search-field').focus().val('')
    })
    $('.js-burger').on('click', () => {
      $('body').toggleClass('has-menu-open').removeClass('has-search-open')
    })
    $('.o-nav-h ul a').on('click', () => {
      $('.js-burger').toggleClass('isLoading')
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired

    // navbar search
    new Vue({
      el: 'search',
      components: {
        Search,
      },
    })

    // lazy loads script
    const observer = lozad('.isLoading', {
        rootMargin: '10px 0px', // syntax similar to that of CSS Margin
        threshold: 0.1,
        load: function(el) {
            let image = el.getElementsByTagName('img')[0]
            el.classList.add('fadeIn')
            el.classList.remove('isLoading')
            image.src = image.dataset.src
        },
    })
    observer.observe()
  },
}
