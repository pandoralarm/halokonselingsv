Filevalidation = () => {
  const fi = document.getElementById('cv');
  // Check if any file is selected.
  if (fi.files.length > 0) {
    for (let i = 0; i <= fi.files.length - 1; i++) {
      const fsize = fi.files.item(i).size;
      const file = Math.round((fsize / 1024));
      // The size of the file.
      if (file >= 2048) {
        alert(
          "Ukuran File Tidak Boleh Melebihi 2MB");
        $(cv).val('');
      } else {

      }
    }
  }
};

var pengajuan = new Vue({
  el: '#pengajuan',
  data: {
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
    changeMenu(target) {
      store.commit('changeMenu', target)
    },
    changeSubmenu(target) {
      store.commit('changeSubmenu', target)
    },
  },
});