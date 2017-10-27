<template>
  <form class="">
    <div class="">
      <h5>Your infos:</h5>
      <p><input class="c-input__text" type="text" v-model="name" placeholder="Your name"></p>
      <p>
        <select class="c-input__select" v-model="role">
          <option>company</option>
          <option>studio</option>
          <option>developer</option>
          <option>designer</option>
          <option>recruiter</option>
        </select>
      </p>
      <p>
        <select class="c-input__select" v-model="looking">
          <option>work for me</option>
          <option>build a website</option>
          <option>start a collaboration</option>
        </select>
      </p>
      <p><input class="c-input__text" type="email" v-model="email" placeholder="your@email.com"></p>
      <p><textarea class="c-input__textarea" v-model="msg"></textarea></p>

      <p>
        <label for="newsletter">Get theme core updates?</label>
        <input class="c-checkbox" type="checkbox" id="newsletter" v-model="checked" checked> 
        <span class="h5">{{ checked ? " :) " : " :( " }}</span>
      </p>

      <p>
        <input class="c-radio" type="radio" name="picked" value="one" v-model="picked">
        <input class="c-radio" type="radio" name="picked" value="two" v-model="picked">
        {{ picked }}
      </p>

      <p>data: {{ $data }}</p>

      <a href=''><b>Send it</b></a>
    </div>

    <div class="">
      <h5>Your message:</h5>
      <div class="cnotv__contact__message">
        <p>Hello cnotv!</p>
        <p>My name is <b>{{ name }}</b> and I am a <b>{{ role }}</b> looking for someone able to <b>{{ looking }}</b>.</p>
        <p>If you are interested, feel free to contact me to  <b>{{ email }}</b>.</p>
        <div v-if="msg">
          <p>Also I would to say:</p>
          <p><b>{{ msg }}</b></p>
        </div>
        <p>Please <b>{{ checked ? " subscribe " : " do not subscribe " }}</b> me to your newsletter.</p>
        </p>
      </div>
      <a class="c-btn-cta" href=''><b>Send it</b></a>
    </div>
  </form>
</template>

<script>
export default {
  name: 'search',
  data() {
    return {
      name     : '',
      email    : '',
      msg      : '',
      checked  : true,
      picked   : '',
      role     : '',
      looking  : '',
    };
  }
}
</script>