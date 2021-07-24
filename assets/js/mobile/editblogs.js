var editblogs = new Vue({
  el: '#editblogs',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    shownpost: ['id', 'id2', 'id3'],
    collapsed: ['id', 'id2', 'id3'],
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
    tinyform() {
      setTimeout(() => {
        console.log('TinyMCE Start');
        tinymce.remove();
        tinymce.init({
          selector: '#contentarea',
          branding: false,  
          plugins: 'fullscreen',
          toolbar: 'fullscreen | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ',
          setup: function(editor) {
            editor.on('focus', function() {
              $('.tinyeditor').css({
                "position" : "absolute",
                "top" : "0", "left" : "0",
                "width" : "100%", "height" : " 100%",
                "z-index" : "25000",
              });
            });
          },
        });
        
      }, 50);
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
    collapse(){
      blogid = this.expanded.pop()
      this.collapsed.push(blogid);
      return this.changeSubmenu('editblogs');
    },
    isCollapsed(blogid) {
      return this.collapsed.includes(blogid);
    },
    expand(blogid) {
      if (!this.expanded.length) {
        // if the array of expandded blog is empty
        // proceed to put the meant blogid into the expand
        // else, empty the array first
        this.collapsed = this.collapsed.filter(val => val !== blogid);
        this.expanded.push(blogid);
      } else {
        unexpand = this.expanded.pop();
        console.log(unexpand);
        this.collapse(unexpand);
        return this.expand(blogid);
      }
      return this.changeSubmenu('editblogDetail');
    },
    isExpanded(blogid) {
      return this.expanded.includes(blogid);
    },
    isShown(blogid) {
      return this.shownpost.includes(blogid);
    },
  }
})