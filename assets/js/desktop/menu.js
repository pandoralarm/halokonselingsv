var menu = new Vue({
  el: '#menu',
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
    bukaPengajuan (logged){
      if(logged){
        this.changeSubmenu('pengajuan');
      }else{
        $('.menu-toggle').click(); 
      }
    },
    bukaSaya (logged, nim){
      if(logged){
        this.changeSubmenu('saya');
        saya.getPengajuanAll(nim);
      }else{
        $('.menu-toggle').click(); 
      }
    },
  },
});