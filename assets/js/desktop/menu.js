var menu = new Vue({
  el: '#menu',
  data: {
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
    buatPengajuan (logged){
      if(logged){
        this.changeSubmenu('pengajuan');
      }else{
        $('.menu-toggle').click(); 
      }
    }
  },
});