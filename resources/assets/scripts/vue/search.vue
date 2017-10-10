<template>
  <section>
    <input class="js-search-field" placeholder="You are looking for.." v-model="question" v-on:keyup.esc="cancel">
    <div class="o-search__status" v-if="status" v-html="status"></div>

    <div class="o-search__results fadeInUp" v-if="result">
      <div class="o-search__results__answer" v-if="answer">
        <span v-html="answer"></span>
        <span class="o-search__reset" v-on:click="cancel">reset (esc)</span>
      </div>
      <a class="fadeIn" v-for="(results, index) in result" v-bind:href="results.link">
        <div v-html='results.title.rendered'></div>
        <!-- <div v-html='results.excerpt.rendered'></div> -->
      </a>
    </div>
  </section>
</template>

<script>
import _ from 'lodash'
import axios from 'axios'

export default {
  name: 'search',
  data() {
    return {
      question: '',
      answer: '',
      status: '',
      result: '',
      url: '/wp-json/wp/v2/posts/',
    };
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
}
</script>