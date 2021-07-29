var blogform = new Vue({
  el: '#blogform',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    mindate: "",
    filemodel: null,
    form: 'blogtext',
    headeroption: 'upload',
    content: {
      title: '',
      attachment: '',
    },
    error: {
      alert: false,
      strong: '',
      message: '',
    },

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
  },
  methods: {
    published(){
      nav.loading(true);
      setTimeout(() => {
        this.changeWindow('blogform');
        this.changeTitle('HALOKONSELINGSV', 'Kamu Tidak Sendiri Disini 🤗');
        nav.loading(false);
        home.alertNow('Berhasil!', 'Artikel berhasil dipublikasi!');
      }, 5000);
    },
    changeheaderopt(){
      this.headeroption = $('#headeropt').val();
    },
    checkheaderopt(){
      setTimeout(() => {
        $('#headeropt').val(this.headeroption);
      }, 50);
    },
    next() {
      this.content.title = $('#contenttitle').val();

      if (this.headeroption == 'yturl'){
        if (this.validateYouTubeUrl($('#yturl').val())){
            this.content.attachment = $('#yturl');
            this.form = 'blogheader';
        } else {
          alert("URL Youtube Tidak Valid");
          $('#yturl').val("");
        }

      } else if (this.headeroption == 'upload'){
        this.content.attachment = $('#upload');
        this.form = 'blogheader';
      }
      
    },
    prev() {
      this.checkheaderopt();
      this.form = 'blogtext';
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
    validateYouTubeUrl(urlcheck)
    {
      var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
      var match = urlcheck.match(regExp);
      console.log("checking");
      if (match && match[2].length == 11) {
        
        return true;
      }
      else {
        return false;
      }
    },
    sendpublication() {
      nav.loading(true);
      var bodyFormData = new FormData();
      console.log("uploadtest");
      bodyFormData.append('title', this.content.title);

      if (this.headeroption == 'upload'){
        var mediaFile = $('#upload');
        bodyFormData.append('headertype', "upload");
        bodyFormData.append('attachment', this.content.attachment[0].files[0]);
      } else if (this.headeroption == 'yturl'){
        bodyFormData.append('headertype', "yturl");
        bodyFormData.append('attachment', this.content.attachment[0].value);
      }

      bodyFormData.append('contentarea', $('#contentarea').val());

      axios.post(this.basepath+"/admin/contents/publish", 
                  bodyFormData,
                  {headers: {'content-type': 'multipart/form-data'}})
            .catch(error => {
              if (!error.response) {
                  // network error
                  errorStatus = 'Error: Network Error';
                  
                  home.alertNow('Gagal!', errorStatus);
                  nav.loading(false);
                  console.log(errorStatus);
              } else {
                  errorStatus = error.response.data.message;
                  console.log(errorStatus);
              }
              this.fileModel = null;
            })
            .then(response => {
              console.log(response.data);
              this.published();
              this.headeroption = 'upload';
            })
            .finally(() => {  
            });
      

    },
  },
})
