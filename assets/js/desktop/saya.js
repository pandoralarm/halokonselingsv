var saya = new Vue({
  el: '#saya',
  data: {
    basepath: this.$cookies.get('basepath'),
    dosensearch: [],
    pengajuanDiproses: [],
    pengajuanDitunda: [],
    pengajuanDisetujui: [],
    pengajuanDitolak: [],
    nim: this.$cookies.get('id'),
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
    }
  },
  methods: {
    changeMenu(target) {
      store.commit('changeMenu', target)
    },
    changeSubmenu(target) {
      store.commit('changeSubmenu', target)
    },
    changeWindow(target) {
      store.commit('changeWindow', target)
    },
    getPengajuanAll() {
      axios.post(this.basepath + "/perwa/pengajuan/showDiproses/" + saya.nim)
        .then(response => {
          this.pengajuanDiproses = response.data;
        })
        .finally(() => {
        });
      axios.post(this.basepath + "/perwa/pengajuan/showDitunda/" + saya.nim)
        .then(response => {
          this.pengajuanDitunda = response.data;
        })
        .finally(() => {
        });
      axios.post(this.basepath + "/perwa/pengajuan/showDisetujui/" + saya.nim)
        .then(response => {
          this.pengajuanDisetujui = response.data;
        })
        .finally(() => {
        });
      axios.post(this.basepath + "/perwa/pengajuan/showDitolak/" + saya.nim)
        .then(response => {
          this.pengajuanDitolak = response.data;
        })
        .finally(() => {
        });
    },
    getRekomendasi(idPengajuan) {
      path = this.basepath + "/perwa/pengajuan/getRekomendasi/" + idPengajuan;
      window.location = path;
    },
    deletePengajuan(idPengajuan) {
      axios.post(this.basepath + "/perwa/pengajuan/deletePengajuan/" + idPengajuan)
        .then(response => {
          this.getPengajuanAll(saya.nim)
        })
        .finally(() => {
        })
    }
  },
});