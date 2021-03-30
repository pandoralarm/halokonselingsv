var dibuka = new Vue({
    el: '#dibuka',
    data: {
      basepath: this.$cookies.get('basepath'),
      beasiswa : [],
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
      getBeasiswaAll(){
        axios.post(this.basepath+"/perwa/beasiswa/showBeasiswa")
        .then(response => 
          {
            this.beasiswa = response.data;
          })
        .finally(() => {
        });
      }
    },
});