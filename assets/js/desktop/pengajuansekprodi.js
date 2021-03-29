var pengajuansekprodi = new Vue({
    el: '#pengajuansekprodi',
    data: {
      basepath: this.$cookies.get('basepath'),
      pengajuanDiproses : [],
      pengajuanDiselesaikan : [],
      pengajuanMhs : [],
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
      getPengajuanAll(){
        axios.post(this.basepath+"/perwa/pengajuan/showDiprosesSekrpodi")
        .then(response => 
          {
            this.pengajuanDiproses = response.data;
          })
        .finally(() => {
        });
        axios.post(this.basepath+"/perwa/pengajuan/showDiselesaikanSekrpodi")
        .then(response => 
          {
            this.pengajuanDiselesaikan = response.data;
          })
        .finally(() => {
        });
      },
    },
});