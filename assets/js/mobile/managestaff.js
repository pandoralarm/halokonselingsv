var managestaff = new Vue({
  el: '#managestaff',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    dosensearch: {},
    dosenquery: '',
    konselorchecked: [],
    konselornamechecked: [],
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
    enableconfirm: function () {  
      if (this.konselorchecked.length != 0){
        return true;
      } else {
        return false;
      }
    },
  },
  mounted(){
    var today = new Date().toISOString().split('T')[0];
    console.log(today);
    $("#startdate").attr('min', today);
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
    loading(state) {
      console.log(state)
      store.commit('setLoading', state);
    },
    
    /* KONSELOR ADD RELATED METHOD */
    findKonselor(){
      var request = this.dosenquery;
      if (request == ''){
        store.commit('changeSubtitle', 'Cari dan pilih minimum 1 Konselor');
        return this.dosensearch = {};
      } else {

        axios.get(this.basepath+"/konseling/chatroom/findKonselor/"+request)
        .then(response => 
          {
            this.dosensearch = response.data;
          })
        .finally(() => {
          store.commit('changeSubtitle', '');
        });
      }

    },
  },
})
