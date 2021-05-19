var chatroom = new Vue({
  el: '#chatroom',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    options: false,
    details: false,
    info: '',
    confirm: false,
    imgfocus: false,
    username: this.$cookies.get('username'),
    basepath: this.$cookies.get('basepath'),
    hostname: this.$cookies.get('hostname'),
    userid: this.$cookies.get('id'),
    messageinput: '',
    messages: [],
    audios: [],
    fileModel: null,
    attachment: null,
    sessiondetail: null,
    dosensearch: {},
    dosenquery: '',
    konselorchecked: [],
    konselornamechecked: [],
    masalahchecked: [],
    conn : null,
    error: {
      alert: false,
      strong: '',
      message: '',
    }
  },
  created() {
  },  
  mounted() {
    /* SCOPE CONTROLS */
    let self=this;

    /* WEBSOCKET INSTANTIATION */
    console.log("Starting connection to WebSocket Server")
    this.conn = new WebSocket("ws://"+this.hostname+":8081/");

    /* WEBSOCKET STATES */
    this.conn.onopen = function(event) {
      console.log(event);
      self.loading(false);
      console.log("Successfully connected to the hksv websocket server!")
    };
    this.conn.onmessage = function(event) {
      setTimeout(() => {
        self.checkMessages();
      }, 1000);
      console.log(event);
    };

  },
  computed: {

    /* SYSTEM STATE RELATED PROPS */
    current_window: function () {
      return store.getters.getWindow;
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

    /* BUTTON DISABLERS */
    enableconfirm: function () {  
      if (this.konselorchecked.length != 0){
        return true;
      } else {
        return false;
      }
    },
    enablerecord: function () {
      if (this.messageinput != ''){
        return true;
      } else {
        return false;
      }
    },
    buttonCheck: function () {
      return (this.masalahchecked.length == 0) ? 'disabledbutton' : '';
    },

    /* THREADKEY USED AS TOKEN SUBSCRIPTIONS */
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },

    /* ROOM TITLE */
    currentdosen: function () {
      if (this.sessiondetail != null){
        arr = this.sessiondetail.daftarkonselor[0].split(",");
        return arr[0];
      } else {
        return "Nama Dosen";
      }
      
    }

  },
  methods: {

    /* SYSTEM STATE RELATED METHOD */
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
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

    /* WINDOW STATE RELATED METHOD */
    openOptions() {
      this.options = !this.options;
    },
    closeOptions() {
      this.options = false;  
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

    /* CLOSE KONSELING SESSION RELATED METHOD */
    closeSession(){
      this.loading(true);
      var arrayMasalah = [];
      var i;
      for (i = 0; i < this.masalahchecked.length; i++) {
        masalah = {};
        masalah['kategori'] = this.masalahchecked[i];
        arrayMasalah.push(masalah);
      }
      
      $('#sendmessage').val('=== SESI DITUTUP ===');
      this.send('text');
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
        this.loading(false)
        this.changeWindow('');
        store.commit('swapKey', 'default');
      });
     
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


    /* THIS PART CONTAINS CHATROOM AND WEBSOCKET SPECIFIC METHODS */
    checkMessages() {
      // HARD ERROR CHECKING
      setTimeout(() => {
        if (this.ThreadKey == ' ' || this.ThreadKey == null){
          console.log('reloading');
          location.reload();
        } else {
          console.log('room found');
        }
      }, 5000);

      // POST request using axios with set headers
      key = this.ThreadKey;
      console.log(key);

      this.subscribe(key);
      
      axios.get(this.basepath+"/konseling/chatroom/getMessages/"+key)
        .then(response => {
          if (this.messages.length != response.data.length){
            this.messages = response.data;

            setTimeout(() => {
              var audio = new Audio('./assets/audio/newtext.mp3');
              audio.play();
            }, 250);

          }
          
          setTimeout(() => {
            var container = this.$el.querySelector("#messagebody");
            container.scrollTop = container.scrollHeight;
          }, 500);

          if (this.sessiondetail == null){
            this.openDetail();
          }
        });

      console.log('Checking messages...');
    },
    send(type) {
      var request = {
        key: this.ThreadKey,
        messagetype: type,
        message: $('#sendmessage').val(),
      };

      console.log(request);

      // POST request using axios with set headers
      axios.post(this.basepath+"/konseling/chatroom/sendMessage", request)
        .then(response => {
          this.info = response.data;
          console.log(response.data);
        })
        .catch(() => {
          this.alertNow('Gagal!', 'Jaringan error! ')
          nav.loading(false);
        })
        .finally(() => {
          $('#sendmessage').val('');
          setTimeout(() => {
            this.checkMessages();
            console.log(this.messages);
            nav.loading(false);
          }, 500);
        });
    },
    loading(state) {
      console.log(state)
      store.commit('setLoading', state);
    },
    subscribe(channel) {
      this.conn.send(JSON.stringify({command: "subscribe", channel: channel}));
    },
    sendMessage(msg) {
      if (!$.trim($("#sendmessage").val())== ""){
        nav.loading(true);
        key = this.ThreadKey;
        this.subscribe(key);
        this.send('text');
        this.conn.send(JSON.stringify({command: "message", message: msg}));
      }
    },
    sendMedia(url, type) {
      if (this.fileModel != null) {
        nav.loading(true);

        var bodyFormData = new FormData();
        if (type == 'image'){
          var mediaFile = $('#imageAttachment');
        } else if (type == 'audio'){
          var mediaFile = $('#audioAttachment');
        }

        console.log(mediaFile);
        bodyFormData.append('key', this.ThreadKey);
        bodyFormData.append('attachment', mediaFile[0].files[0]);
        axios.post(this.basepath+"/konseling/chatroom/mediaupload", 
                    bodyFormData,
                    {headers: {'content-type': 'multipart/form-data'}})
              .catch(error => {
                this.alertNow('Gagal!', error);
                console.log(error);
                this.fileModel = null;
              })
              .then(response => {
                $('#sendmessage').val(this.basepath+'/uploads/'+this.ThreadKey+'/'+response.data.attachmentpath);
                console.log('SEND THIS: '+$('#sendmessage').val());
                this.alertNow('Berhasil!', 'Media berhasil dikirim.');
                key = this.ThreadKey;
                this.subscribe(key);
                this.send(type);
                this.conn.send(JSON.stringify({command: "message", message: url}));
              })
              .finally(() => {
                this.fileModel = null;
              });

        
      }
    },
    imagefocus(url){
      this.loading(true);
      console.log(url);
      this.imgfocus = true;
      setTimeout(() => {
        $('#img-object').attr('src', url);
        this.loading(false);
      }, 150);
    },

    /* CONFIRMATION DIALOG */
    closeDialog() {
      this.confirm = false;
      this.details = false;
    },
    confirmDialog(state) {
      this.confirm = state;
    },
    openDetail() {
      axios.get(this.basepath+"/konseling/chatroom/sessionInfo/"+this.ThreadKey)
      .then(response => {
        console.log(response.data);
        this.sessiondetail = response.data;
      })
      .finally(()=> {
        this.details = true;
      });
    },
    imagePreview(input){
      var fileName = $('#imageAttachment').val();
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
      if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
        //TO DO
        if (input.files && input.files[0]) {
            console.log(input);
            this.fileModel = 'Enabled';
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewTarget').attr('src', e.target.result);
                this.attachment = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        };
      }else{
        home.alertNow('Halo!', 'Pastikan kamu hanya mengupload file gambar ya!');
      };
    },
    audioPreview(input){
      var fileName = $('#audioAttachment').val();
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
      if (extFile=="mp3" || extFile=="ogg" || extFile=="3gpp" || extFile=="wav" || extFile=="m4a"){
        //TO DO
        if (input.files && input.files[0]) {
          console.log(input);
          this.fileModel = 'EnabledAudio';
          this.sendMedia(fileName, 'audio');
        };
      }else{
        home.alertNow('Halo!', 'Pastikan kamu hanya mengupload file gambar ya!');
      };
    },
  }
})
