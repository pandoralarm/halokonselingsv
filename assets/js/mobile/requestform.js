var requestform = new Vue({
  el: '#requestform',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
  },  
  computed: {
    current_menu: function () {
      return store.getters.getMenu;
    },
    current_topright: function () {
      return store.getters.getTopright;
    },
    current_submenu: function () {
      return store.getters.getSubmenu;
    },
    current_window: function () {
      return store.getters.getWindow;
    },
    current_title: function () {
      return store.getters.getTitle;
    },
    current_subtitle: function () {
      return store.getters.getSubtitle;
    },
  },
  methods: {
    sidenavs() {
      this.sidenav = !this.sidenav;
    },
    changeMenu(target) {
      return store.commit('changeMenu', target);
    },
    changeSubmenu(target) {
      this.sidenavs();
      return store.commit('changeSubmenu', target);
    },
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
      this.sidenavs();
      return store.commit('changeWindow', target);
    },
    changeTitle(newTitle, newSubtitle) {
      store.commit('changeTitle', newTitle);
      store.commit('changeSubtitle', newSubtitle);
      return 0;
    },
    makeRequest() {
      var request = {
        message: $('#requestmessage').val(),
      };
      // POST request using axios with set headers
      axios.post(this.basepath+"/konseling/chatroom/makeRequest", request)
        .then(response => {
          this.info = response.data;
          console.log(response.data);
        })
        .finally(() => (this.changeWindow('reqeustform')));
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