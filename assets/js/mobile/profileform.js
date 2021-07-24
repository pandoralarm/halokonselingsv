var profileform = new Vue({
  el: '#profileform',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    email: this.$cookies.get('username')+'@apps.ipb.ac.id',
    userid: this.$cookies.get('id'),
    mindate: "",
    notifystatus: "",
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


  },
  methods: {
  
    notifycheck() {
      nav.loading(true);
      console.log('getting notification status');

      axios.get(this.basepath+"/notification/profile/getNotify")
      .then(response => {
        if (response.data == '1'){
          setTimeout(() => {
            $('#emailtagb').attr('checked', true);
            console.log('email is enabled');
            nav.loading(false);
            this.notifystatus = '1'; 
          }, 50);

        } else {
          
          setTimeout(() => {
            $('#emailtagb').attr('checked', false);
            console.log('email is disabled');
            nav.loading(false);
            this.notifystatus = '0'; 
          }, 50);
        }
      });
    },
    updatenotifysettings(){
      nav.loading(true);
      if ($('#emailtagb').is(":checked")){
        userpref = '1';
      } else {
        userpref = '0';
      }
      var request = {
        notify: userpref,
      };

      console.log(request);

      // POST request using axios with set headers
      axios.post(this.basepath+"/notification/profile/setNotify", request)
        .catch(() => {
          this.alertNow('Gagal!', 'Jaringan error! ')
          nav.loading(false);
        })
        .finally(() => {
          setTimeout(() => {
            console.log('email settings berhasil diubah');
            nav.loading(false);
          }, 150);
        });
    },
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
