var laporanform = new Vue({
  el: '#laporanform',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    mindate: "",
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
    setMinDate() {
      var targetdate = $('#startdate').val();
      $('#enddate').attr('min', targetdate);
    },
    download() {
      if ($('#startdate').val() === "" || $('#enddate').val() === ""){
        home.alertNow('Halo!', 'Isi form rentang tanggal laporan ya!');
        return 0
      };
      
      var data = {startdate: $('#startdate').val(), enddate: $('#enddate').val()}
      axios.post(this.basepath+"/application/debug", data)
        .then(response => {
          console.log(response);
          const url = response.data.url;
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', response.data.filename); //or any other extension
          document.body.appendChild(link);
          link.click();
      }) 
    },
  },
})
