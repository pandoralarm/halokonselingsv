var editblogs = new Vue({
  el: '#editblogs',
  data: {
    active_menu: '',
    sidenav: false,
    chatroom: false,
    username: this.$cookies.get('username'),
    articles: [],
    expanded: {
      ArticleID: "",
      Title: "",
      Header: "",
      Content: "",
      Timestamp: "",
      Author: "", 
    },
    blank: {
      ArticleID: "",
      Title: "",
      Header: "",
      Content: "",
      Timestamp: "",
      Author: "", 
    },
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
    edititem() {
      nav.changeWindow('editblogform'); nav.changeTitle('Pojok Edukasi', ''); blogform.checkheaderopt();
    },
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
          plugins: 'fullscreen paste',
          convert_urls : true, 
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


    getarticles(){
      
      nav.loading(true);
      axios.get(home.basepath+"/admin/contents/getEditArticles")
        .catch(response => {

        })
        .then(response => {
          console.log(response.data);
          this.articles = response.data;
          nav.loading(false);
        });
    },
    findarticles(query){
      var bodyFormData = new FormData();
      bodyFormData.append('query', query);

      axios.post(home.basepath+"/admin/contents/findEditArticles", 
                  bodyFormData,
                  {headers: {'content-type': 'multipart/form-data'}})
            .catch(error => {
              
            })
            .then(response => {
              console.log(response.data);
              this.articles = response.data;
            });
    },
    deleteselected(){
      nav.loading(true);
      var bodyFormData = new FormData();
      bodyFormData.append('ArticleID', this.expanded.ArticleID);

      axios.post(home.basepath+"/admin/contents/deleteArticle", 
                  bodyFormData,
                  {headers: {'content-type': 'multipart/form-data'}})
            .catch(error => {
              
            })
            .then(response => {
              console.log(response.data);
              nav.closeDialog();
              this.changeSubmenu("editblogs");
              this.getarticles();
              nav.loading(false);
            });
    },
    collapse(){
      this.expanded = this.blank;
      $('.expandedcontent').html("");
      return this.changeSubmenu('editblogs');
    },
    expand(articleid) {
      console.log(articleid);
      selected = Object.assign({}, this.articles[articleid]);
      console.log(selected);
      var src = selected.Header; 
      isYT = src.match(/youtube/g);
      if (isYT) {
        // Fill header with yt embed source
        this.expanded = selected;
        var splitURL = src.split("/");
        this.expanded.Header = "https://www.youtube.com/embed/"+splitURL[4];
        setTimeout(() => {
          $('.expandedcontent').html(selected.Content);
        }, 250);
        return this.changeSubmenu('editblogDetailYt');
      } else {
        this.expanded = selected;
        setTimeout(() => {
          $('.expandedcontent').html(selected.Content);
        }, 250);
        return this.changeSubmenu('editblogDetail');
      }
    },
  }
})