var chatroom = new Vue({
  el: '#chatroom',
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
    conn : null,
    error: {
      alert: false,
      strong: '',
      message: '',
    }
  },
  created() {
    /* SCOPE CONTROLS */
    let self=this;

    /* WEBSOCKET INSTANTIATION */
    console.log("Starting connection to WebSocket Server")
    this.conn = new WebSocket("ws://"+this.hostname+":8081/");

    /* WEBSOCKET STATES */
    this.conn.onopen = function(event) {
      console.log(event)
      console.log("Successfully connected to the hksv websocket server!")
    };
    this.conn.onmessage = function(event) {
      self.checkMessages();
      console.log(event);
    };

  },  
  mounted() {

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
    buttonCheck: function () {
      return (this.masalahchecked.length == 0) ? 'disabledbutton' : '';
    },

    /* THREADKEY USED AS TOKEN SUBSCRIPTIONS */
    ThreadKey: function () {
      return store.getters.getThreadKey;
    },
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


    /* THIS PART CONTAINS CHATROOM AND WEBSOCKET SPECIFIC METHODS */
    checkMessages() {
      // POST request using axios with set headers
      key = this.ThreadKey;
      console.log(key);

      this.subscribe(key);
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

      console.log('Checking messages...');
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
    subscribe(channel) {
      this.conn.send(JSON.stringify({command: "subscribe", channel: channel}));
    },
    sendMessage(msg) {
      key = this.ThreadKey;
      this.subscribe(key);
      this.send();
      this.conn.send(JSON.stringify({command: "message", message: msg}));
      this.checkMessages();
    },
  }
})
