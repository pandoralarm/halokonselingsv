var blogs = new Vue({
  el: '#blogs',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    articles: [],
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
    getarticles(){
      axios.get(home.basepath+"/admin/contents/getArticles")
        .catch(response => {

        })
        .then(response => {
          console.log(response.data);
          this.articles = response.data;
        });
    },
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