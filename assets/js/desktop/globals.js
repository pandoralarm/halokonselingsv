const store = new Vuex.Store({
  state: {
    menu : 'beasiswa',
    submenu : 'home',
    window : 'proses',
    basepath: this.$cookies.get('basepath'),
  },
  getters: {
    getMenu: state => {
      return state.menu;
    },
    getSubmenu: state => {
      return state.submenu;
    },
    getWindow: state => {
      return state.window;
    },
    getBasepath: state => {
      return state.basepath;
    },
  },
  mutations: {
    changeMenu (state, newMenu) {
      state.menu = newMenu;
    },
    changeSubmenu (state, newSubmenu) {
      state.submenu = newSubmenu;
    },
    changeWindow (state, newWindow){
      state.window = newWindow;
    }
  },
  actions: {}
 });

 // store.getters.getUser
 // store.commit('nama_fungsi_mutation', 'variable_untuk_digunakan')
 // store.dispatch