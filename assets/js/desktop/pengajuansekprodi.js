function getFileName(event) {
  try {
    var namaFile = $('#selectedFile').prop('files')[0]['name'];
    $('#namaFile').text(namaFile);
  }
  catch (err) {
    $('#namaFile').text('Belum ada file dipilih');
  }
}


var pengajuansekprodi = new Vue({
  el: '#pengajuansekprodi',
  data: {
    basepath: this.$cookies.get('basepath'),
    pengajuanDiproses: [],
    pengajuanDitunda: [],
    pengajuanDiselesaikan: [],
    pengajuanMhs: [],
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
    detailPengajuanDiproses(idpengajuan) {
      this.changeWindow('detailPengajuanDiproses');
      this.getPengajuanMhs(idpengajuan);
    },
    getCV(idPengajuan) {
      path = this.basepath + "/perwa/pengajuan/getCV/" + idPengajuan;
      window.location = path;
    },
    getPengajuanAll() {
      axios.post(this.basepath + "/perwa/pengajuan/showDiprosesSekprodi")
        .then(response => {
          this.pengajuanDiproses = response.data;
        })
        .finally(() => {
        });
      axios.post(this.basepath + "/perwa/pengajuan/showDitundaSekprodi")
        .then(response => {
          this.pengajuanDitunda = response.data;
        })
        .finally(() => {
        });
      axios.post(this.basepath + "/perwa/pengajuan/showDiselesaikanSekprodi")
        .then(response => {
          this.pengajuanDiselesaikan = response.data;
        })
        .finally(() => {
        });
    },
    getPengajuanMhs(idpengajuan) {
      axios.post(this.basepath + "/perwa/pengajuan/showPengajuanMhs/" + idpengajuan)
        .then(response => {
          this.pengajuanMhs = response.data;
        })
        .finally(() => {
        });
    },
    addPenilaian() {
      var bodyFormData = new FormData();
      bodyFormData.append('idPengajuan', this.pengajuanMhs[0].idPengajuan);
      bodyFormData.append('kemampuanAkademik', $('input[name="kemampuanAkademik"]:checked').val());
      bodyFormData.append('kemampuanLisan', $('input[name="kemampuanLisan"]:checked').val());
      bodyFormData.append('kemampuanTertulis', $('input[name="kemampuanTertulis"]:checked').val());
      bodyFormData.append('motivasi', $('input[name="motivasi"]:checked').val());
      bodyFormData.append('kestabilan', $('input[name="kestabilan"]:checked').val());
      bodyFormData.append('kreativitas', $('input[name="kreativitas"]:checked').val());
      bodyFormData.append('kemampuanBerkelompok', $('input[name="kelompok"]:checked').val());
      bodyFormData.append('kemampuanTeknis', $('input[name="teknis"]:checked').val());
      axios.post(this.basepath + "/perwa/penilaian/addPenilaian",
        bodyFormData,
        { headers: { 'content-type': 'multipart/form-data' } })
        .catch(error => {
          console.log(error);
        })
        .then(response => {
          console.log(response);
        })
        .finally(() => {
          this.changeWindow('verifikasiRekomendasi')
        });
    },
    downloadRekomendasi() {
      location.href = this.basepath + "/perwa/penilaian/cetakRekomendasi/" + this.pengajuanMhs[0].idPengajuan;
    },
    addRekomendasi() {
      var formRekomendasi = new FormData();
      formRekomendasi.append('idPengajuan', this.pengajuanMhs[0].idPengajuan);
      formRekomendasi.append('rekomendasi', $('#selectedFile').prop('files')[0]);
      axios.post(this.basepath + "/perwa/penilaian/addRekomendasi",
        formRekomendasi,
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