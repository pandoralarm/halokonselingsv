var saya = new Vue({
    el: '#saya',
    data: {
      basepath: this.$cookies.get('basepath'),
      dosensearch : [],
      pengajuanDiproses : [],
      pengajuanDisetujui : [],
      pengajuanDitolak : [],
    },
    computed: {    
      current_menu: function () {
        return store.getters.getMenu;
      },
      current_submenu: function () {
        return store.getters.getSubmenu;
      },
      current_window: function(){
        return store.getters.getWindow;
      }
    },
    methods: {
      changeMenu (target) {
        store.commit('changeMenu', target)
      },
      changeSubmenu (target) {
        store.commit('changeSubmenu', target)
      },
      changeWindow (target) {
        store.commit('changeWindow', target)
      },
      getPengajuanAll(nim){
        axios.post(this.basepath+"/perwa/pengajuan/showDiproses/"+nim)
        .then(response => 
          {
            this.pengajuanDiproses = response.data;
          })
        .finally(() => {
        });
        axios.post(this.basepath+"/perwa/pengajuan/showDisetujui/"+nim)
        .then(response => 
          {
            this.pengajuanDisetujui = response.data;
          })
        .finally(() => {
        });
        axios.post(this.basepath+"/perwa/pengajuan/showDitolak/"+nim)
        .then(response => 
          {
            this.pengajuanDitolak = response.data;
          })
        .finally(() => {
        });
      },
      deletePengajuan(idPengajuan,nim){
        axios.post(this.basepath+"/perwa/pengajuan/deletePengajuan/"+idPengajuan)
        .then(response => 
          {
            this.getPengajuan(nim)
          })
        .finally(() => {
        })
      }
    },
  });