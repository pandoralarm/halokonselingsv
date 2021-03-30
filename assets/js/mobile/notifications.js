var notifications = new Vue({
  el: '#notifications',
  data: {
    notifications: [],
    basepath: this.$cookies.get('basepath'),
  },  
  computed: {
    current_window: function () {
      return store.getters.getWindow;
    },
  },
  methods: {
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
      this.sidenavs();
      return store.commit('changeWindow', target);
    },
    alertNow(strongMessage, smallMessage) {
      this.error.alert = true;
      this.error.strong = strongMessage;
      this.error.message = smallMessage;
      setTimeout(() => {
        this.error.alert = false;
      }, 5000);
    },
  },
})