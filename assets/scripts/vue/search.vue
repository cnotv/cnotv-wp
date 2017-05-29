<template class="cnotv">
  <section>
    <span class="screen-reader-text">Search for: </span>
    <input class="search-field" placeholder="YOU ARE LOOKING FOR.." v-model="question" v-on:keyup.esc="cancel">
    <!-- <input class="search-field" placeholder="YOU ARE LOOKING FOR.." value="" name="s" type="search" v-model="question" v-on:keyup.esc="cancel"> -->
    <button v-if="question" v-on:click="cancel">X</button>
    <p  v-if="answer" v-html="answer"></p>
    <div v-for="results in result">
      <img v-if="results.featured_media" :src="url+ 'media/' +results.featured_media">
      <h5>
        <a v-if="results.link" v-bind:href="results.link" target="_blank">{{ results.title.rendered }}</a>
      </h5>
      <div v-html="results.excerpt.rendered"></div>
      <div v-for="tag_id in results.tags">
        <a v-bind:href="url+'tags/'+tag_id">{{ url+'tags/'+tag_id }}</a>
      </div>
      <!-- <pre v-html="results"></pre> -->
      <hr>
    </div>
  </section>
</template>

<script>
import _ from 'lodash'
import axios from 'axios'

export default {
  data: {
    question: '',
    answer: '',
    result: '',
    // url: 'http://localhost:7000/wp-json/wp/v2/',
    url: '/wp-json/wp/v2/',
    function () {
      return {
        searchQuery: '',
        sources: [
          {
            name: 'Blog',
            on: true,
            url: '/wp-json/wp/v2/posts?per_page=3',
            posts: []
          },
          {
            name: 'Portfolio',
            on: true,
            url: '/wp-json/wp/v2/portfolio?per_page=3',
            posts: []
          }
        ]
      }
    }
  },
  watch: {
    // whenever question changes, this function will run
    question: function (newQuestion) {
      // this.result = ''
      this.answer = '<i class="fa fa-pencil"></i> Waiting...'
      this.getResult()
    }
  },
  methods: {
    getResult: _.debounce(
      function () {
        if (this.question) {
          this.answer = '<i class="fa fa-search"></i> Searching...'
          var vm = this
          // var searchUrl = vm.generateUrl()
          var searchUrl = this.url + 'posts?&search=' + this.question
          axios.get(searchUrl)
            .then(function (response) {
              vm.result = response.data
              vm.answer = 'Results for: ' + vm.question + ' (' + response.data.length + ')'
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
      500
    ),

    // Reset input field
    cancel: function () {
      this.question = ''
    }
  }
}
</script>
