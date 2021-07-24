const store = new Vuex.Store({
  state: {
    menu : 'konseling',
    submenu : 'home',
    window : '',
    title : 'HALOKONSELINGSV',
    subtitle : 'Kamu Tidak Sendiri Disini 🤗',
    topright: 'default',
    threadKey: 'default',
    loading: false,
  },
  getters: {
    getMenu: state => {
      return state.menu;
    },
    getTopright: state => {
      return state.topright;
    },
    getSubmenu: state => {
      return state.submenu;
    },
    getWindow: state => {
      return state.window;
    },
    getTitle: state => {
      return state.title;
    },
    getSubtitle: state => {
      return state.subtitle;
    },
    getThreadKey: state => {
      return state.threadKey;
    },
    isLoading: state => {
      return state.loading;
    },
  },
  mutations: {
    changeSubmenu (state, newSubmenu) {
      searchEnabled = ['editevents', 'editblogs', 'blogs', 'events', 'kelolaBlogs', 'kelolaEvents'];
      optionsEnabled = ['blogDetail', 'editeventsfocus', 'editblogDetail'];
      helpEnabled = [ 'addKonselor', 'createLaporan', 'getLaporan', 'manageRoles', 'adminTools', 'requestForm'];
      blogs_submenu = ['blogs', 'blogDetail'];
      events_submenu = ['events'];
      beasiswa_submenu = ['beasiswa'];
      admin_submenu = ['admin'];

      state.submenu = newSubmenu;

      if (blogs_submenu.includes(newSubmenu)){
        state.title = 'Fakta dan Edukasi';
        state.subtitle = 'Informasi faktual dan edukatif terkini!';
      } else if (events_submenu.includes(newSubmenu)) {
        state.title = 'Events didekatmu!';
        state.subtitle = 'Acara rekomendasi didekatmu!';
      } else if (admin_submenu.includes(newSubmenu)) {
        state.title = 'Admin Tools';
        state.subtitle = '';
      } else {
        state.title = 'HALOKONSELINGSV';
        state.subtitle = 'Kamu tidak sendiri disini 🤗';
      }

      if (searchEnabled.includes(newSubmenu)) {
        return state.topright = 'search';
      } else if (optionsEnabled.includes(newSubmenu)) {
        return state.topright = 'options';
      } else if (helpEnabled.includes(newSubmenu)) {
        return state.topright = 'help';
      } else {
        return state.topright = 'default';
      }
    },
    changeMenu (state, newMenu) {
      state.menu = newMenu;
    },
    changeWindow (state, newWindow) {
      state.window = newWindow;
    },
    changeTitle (state, newTitle) {
      state.title = newTitle;
    },
    changeSubtitle (state, newSubtitle) {
      state.subtitle = newSubtitle;
    },
    swapKey (state, newKey) {
      state.threadKey = newKey;
    },
    setLoading (state, loadstate) {
      state.loading = loadstate;
    },
  },
  actions: {}
 });