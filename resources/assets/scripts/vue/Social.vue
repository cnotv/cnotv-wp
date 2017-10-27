<template>
  <div class="o-nav-alt o-share">
    <div
      v-for="(social, index) in socials"
      class="fa"
      :class="'fa-' + index"
      :data-social-type="index"
      :data-social-link="social"
      @click="share"
      v-cloak
    ></div>
  </div>

</template>

<script>
export default {
  name: 'social',
  props: ['socials'],
  data() {
    return {
      popup: true,
      url: false,
      status: false,
      resizable: true,
      toolbar: false,
      menubar: false,
      scrollbars: false,
      location: false,
      width: '626',
      height: '436',
      top: 0,
      left: 0,
    }
  },
  methods: {
    // pop up sharing link
    share: function (event) {

      const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : screen.left
      const dualScreenTop = window.screenTop !== undefined ? window.screenTop : screen.top

      const width = window.innerWidth ? window.innerWidth : (document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width)
      const height = window.innerHeight ? window.innerHeight : (document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height)

      this.left = ((width / 2) - (this.width / 2)) + dualScreenLeft
      this.top = ((height / 2) - (this.height / 2)) + dualScreenTop

      this.url = event.target.dataset.socialLink

      if (event.target.dataset.socialType === 'mail') {
        window.location.href = this.url
      }

      else {
        if (event.target.dataset.socialType === 'twitter') {
          let twitterUrl =  this.url.substr(this.url.indexOf("- http") - 1)
          this.url = this.url.replace(twitterUrl, twitterUrl)
        }

        window.open(
          this.url,
          'sharer',
          'status=' + (this.status ? 'yes' : 'no') +
          ',height=' + this.height + 'px' +
          ',width=' + this.width + 'px' +
          ',resizable=' + (this.resizable ? 'yes' : 'no') +
          ',left=' + this.left + 'px' +
          ',top=' + this.top + 'px' +
          ',screenX=' + this.left + 'px' +
          ',screenY=' + this.top + 'px' +
          ',toolbar=' + (this.toolbar ? 'yes' : 'no') +
          ',menubar=' + (this.menubar ? 'yes' : 'no') +
          ',scrollbars=' + (this.scrollbars ? 'yes' : 'no') +
          ',location=' + (this.location ? 'yes' : 'no')
        )
      }
    },
  },
}
</script>