var events = new Vue({
  el: '#events',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    shownpost: ['id'],
    collapsed: ['id'],
    expanded: [],
  },  
  computed: {
    current_menu: function () {
      return store.getters.getMenu;
    },
    current_submenu: function () {
      return store.getters.getSubmenu;
    },
    current_window: function () {
      return store.getters.getWindow;
    },
  },
  methods: {
    changeWindow(target) {
      if (this.current_window == target){
        return store.commit('changeWindow', '');
      }
      return store.commit('changeWindow', target);
    },
    changeMenu(target) {
      if ( this.current_menu == target ){
        return store.commit('changeMenu', '');
      }
      return store.commit('changeMenu', target);
    },
    changeSubmenu(target) {
      if ( this.current_submenu == target ){
        return store.commit('changeSubmenu', '');
      }
      return store.commit('changeSubmenu', target);
    },
    changeTitle(newTitle, newSubtitle) {
      store.commit('changeTitle', newTitle);
      store.commit('changeSubtitle', newSubtitle);
      return 0;
    },
    collapse(blogid){
      this.expanded = this.expanded.filter(val => val !== blogid);
      this.collapsed.push(blogid);
      return this.changeSubmenu('blogs');
    },
    isCollapsed(blogid) {
      return this.collapsed.includes(blogid);
    },
    expand(blogid) {
      this.collapsed = this.collapsed.filter(val => val !== blogid);
      this.expanded.push(blogid);
      return this.changeSubmenu('blogDetail');
    },
    isExpanded(blogid) {
      return this.expanded.includes(blogid);
    },
    isShown(blogid) {
      return this.shownpost.includes(blogid);
    },
  }
})