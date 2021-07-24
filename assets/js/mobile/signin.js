var signin = new Vue({
  el: '#signin',
  data: {
    chatroom: false,
    username: this.$cookies.get('username'),
    rememberme: this.$cookies.get('rememberme'),

  },  
  mounted() {
    setTimeout(() => {
      this.loading(false);
    }, 250);
  },
  computed: {

    isLoading: function () {
      return store.getters.isLoading;
    },
  },
  methods: {

    loading(state) {
      console.log(state)
      store.commit('setLoading', state);
    },
  },
})