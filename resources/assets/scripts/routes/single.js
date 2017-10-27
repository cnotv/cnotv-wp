import Vue from 'vue'
import Social from '../vue/Social.vue'

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    new Vue({
      el: 'social',
      components: {
        Social,
      },
    })
  },
}
