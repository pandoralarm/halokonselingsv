var editevents = new Vue({
  el: '#editevents',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    shownpost: ['ide1','ide2'],
    focusedpost: [],
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
    defocus(){
      eventid = this.focusedpost.pop()
      $('#'+eventid).toggleClass('editevent-item-focused');
      this.changeSubmenu('editevents')
    },
    focused(eventid) {
      if (this.focusedpost.includes(eventid)){
        this.defocus();
      } else {
        this.defocus();
        this.changeSubmenu('editeventsfocus')
        this.focusedpost.push(eventid);
        $('#'+eventid).toggleClass('editevent-item-focused');
      }
    },
    isShown(blogid) {
      return this.shownpost.includes(blogid);
    },
  }
})