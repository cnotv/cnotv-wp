import Vue from 'vue'

import _ from 'lodash'
import axios from 'axios'
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

new Vue({
  el: 'search',
  data: {
    question: '',
    answer: '',
    result: '',
    url: '/wp-json/wp/v2/posts/',
    function () {
      return {
        searchQuery: '',
        sources: [
          {
            name: 'Blog',
            on: true,
            url: '/wp-json/wp/v2/posts?per_page=3',
            posts: [],
          },
          {
            name: 'Portfolio',
            on: true,
            url: '/wp-json/wp/v2/portfolio?per_page=3',
            posts: [],
          },
        ],
      }
    },
  },
  watch: {
    // whenever question changes, this function will run
    question: function () {
      // this.result = ''
      this.answer = '<i class="fa fa-pencil"></i>'
      this.getResult()
    },
  },
  methods: {
    getResult: _.debounce(
      function () {
        if (this.question) {
          this.answer = '<i class="fa fa-search"></i>'
          var vm = this
          // var searchUrl = vm.generateUrl()
          var searchUrl = this.url + '?per_page=10&search=' + this.question
          axios.get(searchUrl)
            .then(function (response) {
              vm.result = response.data
              vm.answer = response.data.length + ' results found'
            })
            .catch(function (error) {
              vm.answer = error
            })
        } else {
          this.answer = ''
          this.result = ''
        }
      },
      // This is the number of milliseconds we wait for the user to stop typing.
      0
    ),

    // Reset input field
    cancel: function () {
      this.question = ''
    },
  },
})
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
