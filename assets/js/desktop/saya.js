var menu = new Vue({
    el: '#saya',
    data: {
      dosensearch: [],
      basepath: this.$cookies.get('basepath'),
    },
    computed: {    
      current_menu: function () {
        return store.getters.getMenu;
      },
      current_submenu: function () {
        return store.getters.getSubmenu;
      },
      current_window: function(){
        return store.getters.getWindow;
      }
    },
    methods: {
      changeMenu (target) {
        store.commit('changeMenu', target)
      },
      changeSubmenu (target) {
        store.commit('changeSubmenu', target)
      },
      changeWindow (target) {
        store.commit('changeWindow', target)
      },
      getResponse(){

        axios.post(this.basepath+"/perwa/pengajuan/getResponse")
        .then(response => 
          {
            this.dosensearch = response.data;
          })
        .finally(() => {
          
        });
      }
    },
  });