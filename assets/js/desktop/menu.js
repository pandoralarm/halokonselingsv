var menu = new Vue({
  el: '#menu',
  data: {
    basepath: this.$cookies.get('basepath'),
    nim: this.$cookies.get('id'),
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
    changeMenu(target) {
      store.commit('changeMenu', target)
    },
    changeSubmenu(target) {
      store.commit('changeSubmenu', target)
    },
    bukaPengajuan(logged) {
      if (logged) {
        this.changeSubmenu('pengajuan');
      } else {
        $('.menu-toggle').click();
      }
    },
    bukaSaya(logged) {
      if (logged) {
        this.changeSubmenu('saya');
        saya.getPengajuanAll(menu.nim);
      } else {
        $('.menu-toggle').click();
      }
    },
    bukaBeasiswa() {
      this.changeSubmenu('dibuka');
      dibuka.getBeasiswaAll();
    },
  },
});