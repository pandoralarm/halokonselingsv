var menusekprodi = new Vue({
  el: '#menusekprodi',
  data: {
    basepath: this.$cookies.get('basepath'),
  },
  computed: {    
    current_menu: function () {
      return store.getters.getMenu;
    },
    current_submenu: function () {
      return store.getters.getSubmenu;
    },
  },
  methods: {
    changeMenu (target) {
      store.commit('changeMenu', target)
    },
    changeSubmenu (target) {
      store.commit('changeSubmenu', target)
    },
    bukaPengajuan(){
      this.changeSubmenu('pengajuansekprodi');
      pengajuansekprodi.changeWindow('prosesSekprod');
      pengajuansekprodi.getPengajuanAll();
    }
  },
});