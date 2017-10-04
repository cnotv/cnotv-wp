<search>
  <input class="search-field" placeholder="You are looking for.." v-model="question" v-on:keyup.esc="cancel">
  <div class="o-search__status" v-if="status" v-html="status"></div>
  <div class="o-search__reset" v-if="question & !status" v-on:click="cancel"></div>

  <div class="o-search__results" v-if="result">
    <div class="o-search__results__answer" v-if="answer" v-html="answer"></div>
    <a  v-for="(results, index) in result" v-bind:href="results.link">
      <div v-html='results.title.rendered'></div>
      <!-- <div v-html='results.excerpt.rendered'></div> -->
    </a>
  </div>
</search>
