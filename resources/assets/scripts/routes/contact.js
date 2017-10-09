import Vue from 'vue'
import Contact from '../vue/contact.vue'

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    new Vue({
      el: 'contact',
      components: {
        Contact,
      },
    })
  },
}
