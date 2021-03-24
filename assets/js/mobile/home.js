var home = new Vue({
  el: '#home',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    userrole: this.$cookies.get('role'),
    error: {
      alert: false,
      strong: '',
      message: '',
    }
    
  },
  computed: {
    current_menu: function () {
      return store.getters.getMenu;
    },
    current_submenu: function () {
      return store.getters.getSubmenu;
    },
    current_window: function () {
      return store.getters.getWindow;
    },
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },
  },
  methods: {
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
      return store.commit('changeWindow', target);
    },
    changeMenu(target) {
      if ( this.current_menu == target ){
        return store.commit('changeMenu', '');
      }
      return store.commit('changeMenu', target);
    },
    changeSubmenu(target) {
      if ( this.current_submenu == target ){
        return store.commit('changeSubmenu', '');
      }
      return store.commit('changeSubmenu', target);
    },
    changeTitle(newTitle, newSubtitle) {
      store.commit('changeTitle', newTitle);
      store.commit('changeSubtitle', newSubtitle);
      return 0;
    },
    changeTopright(target) {
      return store.commit('changeTopright', target);
    },
    goTo(url) {
      window.location.href = url;
    },
    checkThread() {
      var hasRequest = '';
      axios.get(this.basepath+"/konseling/chatroom/isRequest")
        .then(response => (hasRequest = response.data)).finally(() => (console.log(hasRequest)));
      // POST request using axios with set headers
      axios.get(this.basepath+"/konseling/chatroom/getThreadKey")
        .then(response => (store.commit('swapKey', response.data.ThreadKey)))
        .finally(() => {
          if (this.ThreadKey != 'default') {
            chatroom.checkMessages();
            this.changeWindow('chatroom');
          } else {
            if (hasRequest){
              this.alertNow('Halo!', 'Permintaan kamu sebelumnya masih dalam proses ya!');
            } else {
              if (this.userrole == 'MAHASISWA') {
                this.changeWindow('requestform')
              } else {
                this.alertNow('Wah!', 'Kamu tidak memiliki sesi konseling yang sedang aktif!');
              }
            }
          }
        });
    },
    alertNow(strongMessage, smallMessage) {
      this.error.alert = true;
      this.error.strong = strongMessage;
      this.error.message = smallMessage;
      setTimeout(() => {
        this.error.alert = false;
      }, 5000);
    },
    openChatroom(nim){
      var data = {mhsnim: nim}
      axios.post(this.basepath+"/konseling/chatroom/getThreadKey", data)
        .then(response => {
        })
        .finally(() => {
          store.commit('swapKey', response.data.key);
          this.changeWindow('chatroom');
        }); 
    }
  }
});

