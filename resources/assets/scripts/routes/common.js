import Vue from 'vue'

import _ from 'lodash'
import axios from 'axios'
import lozad from 'lozad'

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

    // navbar search
    new Vue({
      el: 'search',
      data: {
        question: '',
        answer: '',
        status: '',
        result: '',
        url: '/wp-json/wp/v2/posts/',
      },
      watch: {
        // whenever question changes, this function will run
        question: function () {
          // this.result = ''
          this.status = '<i class="o-search__status__typing"></i>'
          this.getResult()
        },
      },
      methods: {
        getResult: _.debounce(
          function () {
            if (this.question) {
              this.status = '<i class="o-search__status__search"></i>'
              var vm = this
              // var searchUrl = vm.generateUrl()
              var searchUrl = this.url + '?per_page=10&search=' + this.question
              axios.get(searchUrl)
                .then(function (response) {
                  vm.result = response.data
                  vm.answer = response.data.length + ' results found'
                  vm.status = ''
                })
                .catch(function (error) {
                  vm.answer = error
                })
            } else {
              this.status = ''
              this.answer = ''
              this.result = ''
            }
          },
          // This is the number of milliseconds we wait for the user to stop typing.
          250
        ),

        // Reset input field
        cancel: function () {
          this.question = ''
        },
      },
    })

    // Contact form
    new Vue({
    el: '#contact',
    data: {
      name     : '',
      email    : '',
      msg      : '',
      checked  : true,
      picked   : '',
      role     : '',
      looking  : '',
      },
    })

  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    // lazy loads script
    const observer = lozad('.isLoading', {
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
