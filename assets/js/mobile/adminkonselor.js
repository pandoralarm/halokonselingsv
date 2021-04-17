var adminkonselor = new Vue({
  el: '#adminkonselor',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    userrole: this.$cookies.get('role'),
    ThreadID: '',
    error: {
      alert: false,
      strong: '',
      message: '',
    },
    requests: {},
    requestdetail: {},
    threads: {},
    dosensearch: {},
    dosenquery: '',
    konselorchecked: [],
    konselornamechecked: [],
  },
  mounted() {
    
  },
  computed: {
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },
    current_menu: function () {
      return store.getters.getMenu;
    },
    current_submenu: function () {
      return store.getters.getSubmenu;
    },
    current_subtitle: function () {
      return store.getters.getSubtitle;
    },
    current_window: function () {
      return store.getters.getWindow;
    },
    enableconfirm: function () {  
      if (this.konselorchecked.length != 0){
        return true;
      } else {
        return false;
      }
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
    alertNow(strongMessage, smallMessage) {
      this.error.alert = true;
      this.error.strong = strongMessage;
      this.error.message = smallMessage;
      setTimeout(() => {
        this.error.alert = false;
      }, 1500);
    },
    getOpenRequest(){
      nav.loading(true);

      axios.get(this.basepath+"/konseling/chatroom/getOpenRequest")
      
        .then(response => (this.requests = response.data))
        .catch(error => {
          if (error.response) {
            // Request made and server responded
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
          } else if (error.request) {
            // The request was made but no response was received
            console.log(error.request);
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log('Error', error.message);
          }
        })
        .finally(response => {
          this.changeSubmenu('requestKonseling');
          nav.loading(false);
        });
    },
    openDetail(nama, nim, message, reqid){
      this.requestdetail = {
        nama: nama,
        nim: nim,
        message: message,
        reqid: reqid
      };
      this.changeWindow('requestdetail');
    },
    getOpenThread(){
      
      nav.loading(true);
      axios.get(this.basepath+"/konseling/chatroom/getOpenThread")
        .then(response => (this.threads = response.data))
        .finally(response => {
          nav.loading(false);
          this.changeSubmenu('pantauKonseling');
        });
    },
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
    selectedKonselor(konselornip){
      return this.konselorchecked.includes(konselornip);
    },
    selectKonselor(konselornip, konselorname){
      if (this.selectedKonselor(konselornip) == true){
        var index = this.konselorchecked.indexOf(konselornip);
        if (index >= 0) {
          this.konselorchecked.splice( index, 1 );
        }

        var index = this.konselornamechecked.indexOf(konselorname);
        if (index >= 0) {
          this.konselornamechecked.splice( index, 1 );
        }
      } else {
        this.konselornamechecked.push(konselorname);
        return this.konselorchecked.push(konselornip);
      }
    },
    confirmSession(mhsnama, mhsnim, reqid){
      var arrayKonselor = [];
      var i;
      for (i = 0; i < this.konselorchecked.length; i++) {
        konselors = {};
        konselors['nip'] = this.konselorchecked[i];
        konselors['nama'] = this.konselornamechecked[i];
        arrayKonselor.push(konselors);
      }

      var data = {
        datarequest : reqid,
        datamahasiswa : {
          nama : mhsnama,
          nim : mhsnim,
        },
        datakonselor : {arrayKonselor},
      };

      console.log(data);
      // POST request using axios with set headers
      axios.post(this.basepath+"/konseling/chatroom/confirmSession", data)
      .then((response) => {
        console.log(response.data);
        this.alertNow(response.data.status, response.data.message);
        dosensearch = {};
        dosenquery = '';
      })
      .finally(() => {
        this.changeWindow('');
      });
    },
    checkThread() {
      this.loading(true);
      console.log(this.hasRequest);
      axios.get(this.basepath+"/konseling/chatroom/isRequest")
        .then(response => (this.hasRequest = response.data));
      // POST request using axios with set headers
      axios.get(this.basepath+"/konseling/chatroom/getThreadKey")
        .then(response => {
          store.commit('swapKey', response.data.ThreadKey);
      })
        .catch(() => (this.alertNow('Halo!', 'Koneksi kamu sedang bermasalah, coba lagi ya!')))
        .finally(() => {
          if (this.ThreadKey != 'default') {
            this.loading(false);
            store.commit('swapKey', this.ThreadKey);
            chatroom.checkMessages();
          } else {
            if (this.hasRequest){
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
    openSpecificThread(key){
      store.commit('swapKey', key);
      chatroom.checkMessages();
      this.changeWindow('chatroom');
    },
    loading(state) {
      console.log(state)
      store.commit('setLoading', state);
    },
    

  }
});