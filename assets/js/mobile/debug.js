var debug = new Vue({
  el: '#debug',
  data: {
      info: {},
      credentials: { Username: "alan_ipb", Password: 'bucimo123'},
      basepath: this.$cookies.get('basepath'),
  },
  mounted() {
    window.setInterval(() => {
      this.mhscall()
    }, 100)
  },
  methods: {
    mhscall() {
      // POST request using axios with set headers

      axios.post(this.basepath+"/konseling/chatroom/getOpenRequest")
      .then(response => (this.info = response.data));
    }
  }
})