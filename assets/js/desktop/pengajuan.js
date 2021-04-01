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
    basepath: this.$cookies.get('basepath'),
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
    addPengajuan() {
      var bodyFormData = new FormData();
      bodyFormData.append('namaBeasiswa', $('#beasiswa').val());
      bodyFormData.append('deadline', $('#deadline').val());
      bodyFormData.append('cv', $('#cv').prop('files')[0]);
      axios.post(this.basepath + "/perwa/pengajuan/commit",
        bodyFormData,
        { headers: { 'content-type': 'multipart/form-data' } })
        .catch(error => {
          console.log(error);
        })
        .then(response => {
          console.log(response);
        })
        .finally(() => {
          this.changeSubmenu('menu');
        });
    }
  },
});