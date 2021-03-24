var pantauchat = new Vue({
  el: '#pantauchat',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    info: '',
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    hostname: this.$cookies.get('hostname'),
    userid: this.$cookies.get('id'),
    messages: [],
    dosensearch: {},
    dosenquery: '',
    konselorchecked: [],
    konselornamechecked: [],
    masalahchecked: [],
    error: {
      alert: false,
      strong: '',
      message: '',
    }
    
  },  
  mounted() {
  },
  computed: {
    current_window: function () {
      return store.getters.getWindow;
    },
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },
    enableconfirm: function () {  
      if (this.konselorchecked.length != 0){
        return true;
      } else {
        return false;
      }
    },
    buttonCheck: function () {
      return (this.masalahchecked.length == 0) ? 'disabledbutton' : '';
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
  },
  methods: {
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
      return store.commit('changeWindow', target);
    },
    openOptions() {
      this.options = !this.options;
    },
    closeOptions() {
      this.options = false;  
    },
    checkMessages() {
      // POST request using axios with set headers
      key = store.getters.getThreadKey;
      console.log(key);
      axios.get(this.basepath+"/konseling/chatroom/getMessages/"+key)
        .then(response => {
          if (this.messages.length != response.data.length){
            this.messages = response.data;
            setTimeout(() => {
              var container = this.$el.querySelector("#messagebody");
              container.scrollTop = container.scrollHeight;
              var audio = new Audio('./../assets/audio/newtext.mp3');
              audio.play();
            }, 250);
          }
        });
    },
    send() {
      var request = {
        key: store.getters.getThreadKey,
        message: $('#sendmessage').val(),
      };

      // POST request using axios with set headers
      axios.post(this.basepath+"/konseling/chatroom/sendMessage", request)
        .then(response => {
          this.info = response.data;
          console.log(response.data);
          
        })
        .finally(() => ($('#sendmessage').val('')));
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
    alertNow(strongMessage, smallMessage) {
      this.error.alert = true;
      this.error.strong = strongMessage;
      this.error.message = smallMessage;
      setTimeout(() => {
        this.error.alert = false;
      }, 5000);
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
    addToSession(){
      var arrayKonselor = [];
      var i;
      for (i = 0; i < this.konselorchecked.length; i++) {
        konselors = {};
        konselors['nip'] = this.konselorchecked[i];
        konselors['nama'] = this.konselornamechecked[i];
        arrayKonselor.push(konselors);
      }

      var data = {
        datakey : this.ThreadKey,
        datakonselor : {arrayKonselor},
      };

      console.log(data);
      // POST request using axios with set headers
      axios.post(this.basepath+"/konseling/chatroom/addToSession", data)
      .then((response) => {
        console.log(response.data);
        this.alertNow(response.data.status, response.data.message);
        dosensearch = {};
        dosenquery = '';

      })
      .finally(() => {
        this.changeWindow('chatroom');
      });
    },
    closeSession(){
      var arrayMasalah = [];
      var i;
      for (i = 0; i < this.masalahchecked.length; i++) {
        masalah = {};
        masalah['kategori'] = this.masalahchecked[i];
        arrayMasalah.push(masalah);
      }

      $('#sendmessage').val('=== SESI DITUTUP ===');
      this.send();

      setTimeout(() => {
        var data = {
          datakey : this.ThreadKey,
          datamasalah : {arrayMasalah},
        };
  
        console.log(data);
        // POST request using axios with set headers
        axios.post(this.basepath+"/konseling/chatroom/closeSession", data)
        .then((response) => {
          console.log(response.data);
          this.alertNow(response.data.status, response.data.message);
          dosensearch = {};
          dosenquery = '';
  
        })
        .finally(() => {
          this.changeWindow('');
          store.commit('swapKey', 'default');
        });
      }, 1000);
     
    },
    selectedMasalah(masalah){
      return this.masalahchecked.includes(masalah);
    },
    selectMasalah(masalah){
      if (this.selectedMasalah(masalah) == true){
        var index = this.masalahchecked.indexOf(masalah);
        if (index >= 0) {
          this.masalahchecked.splice( index, 1 );
        }
      } else {
        return this.masalahchecked.push(masalah);
      }
    },
  }
})