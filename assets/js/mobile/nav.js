var nav = new Vue({
  el: '#nav',
  data: {
    sidenav: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    userrole: this.$cookies.get('role'),
    blogsearchquery: '',
    editblogsearchquery: '',
    whitespace: false,
    editdialog: false,
    navoptions: false,
    navsearch: false,
    confirmdeletion: false,
  },
  mounted() {
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
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },
    isLoading: function () {
      return store.getters.isLoading;
    },
  },
  methods: {
    
    closeDialog() {
      this.confirmdeletion = false;
    },
    edititem(){
      switch(this.current_submenu) {
        case 'editblogDetail':
          this.changeWindow('blogform'); 
          this.changeTitle('Pojok Edukasi', ''); 
          blogform.checkheaderopt();
          break;
        case 'editeventsfocus':
          this.changeWindow('eventform'); 
          thihs.changeTitle('Papan Events', ''); 
          break;
        default:
          // code block
      };
    },
    deleteitem() {
      this.confirmdeletion = true;
    },
    options() {
      this.navoptions = !this.navoptions;
    },
    search() {
      this.navsearch = !this.navsearch;
    },
    sidenavs() {
      this.sidenav = !this.sidenav;
    }, 
    changeMenu(target) {
      if (this.current_menu == target){
        return store.commit('changeMenu', '');
      }
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
      return store.commit('changeWindow', target);
    },
    changeTitle(newTitle, newSubtitle) {
      store.commit('changeTitle', newTitle);
      store.commit('changeSubtitle', newSubtitle);
      return 0;
    },
    loading(state) {
      console.log(state)
      store.commit('setLoading', state);
    },
    checkThread() {
      this.loading(true);
      this.sidenavs();
      var hasRequest = '';
      axios.get(this.basepath+"/konseling/chatroom/isRequest")
        .then(response => (hasRequest = response.data));
      // POST request using axios with set headers
      axios.get(this.basepath+"/konseling/chatroom/getThreadKey")
        .then(response => (store.commit('swapKey', response.data.ThreadKey)))
        .finally(() => {
          if (this.ThreadKey != 'default') {
            this.loading(false);
            this.changeWindow('chatroom');
          } else {
            if (hasRequest){
              this.loading(false);
              this.alertNow('Halo!', 'Permintaan kamu sebelumnya masih dalam proses ya!');
            } else {
              if (this.userrole == 'MAHASISWA') {
                this.loading(false);
                this.changeWindow('requestform')
              } else {
                this.loading(false);
                this.alertNow('Wah!', 'Kamu tidak memiliki sesi konseling yang sedang aktif!');
              }
            }
          }
        });
    },
    clipboard() {
      this.options();
      home.alertNow('Disalin!', 'Link external telah disalin ke clipboard');
    },
  }
});