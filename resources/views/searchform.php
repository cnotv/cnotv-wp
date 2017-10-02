<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
  <search class="cnotv__search__bar">
    <input class="search-field" placeholder="YOU ARE LOOKING FOR.." v-model="question" v-on:keyup.esc="cancel">
    <span class="cnotv__search__status fadeIn" v-if="status" v-html="status"></span>

    <div class="cnotv__search__results" v-if="result">
      <div>
        <span class="cnotv__search__answer" v-if="answer" v-html="answer"></span>
        <div class="cnotv__search__reset" v-if="question" v-on:click="cancel">
          <i class="fa fa-times"></i>
        </div>
      </div>
      <a  v-for="(results, index) in result" v-bind:href="results.link">
        <div v-html='results.title.rendered'></div>
        <!-- <div v-html='results.excerpt.rendered'></div> -->
      </a>
    </div>

  </search>
</form>