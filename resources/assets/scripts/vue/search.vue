<template class="cnotv">
  <section>
    <span class="screen-reader-text">Search for: </span>
    <input class="search-field" placeholder="YOU ARE LOOKING FOR.." v-model="question" v-on:keyup.esc="cancel">
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
      <hr>
    </div>
  </section>
</template>
