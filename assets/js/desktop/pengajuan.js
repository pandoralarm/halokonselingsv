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

function validasiFormPengajuan() {

  var namaBeasiswa = document.getElementById('beasiswa').value;
  var deadlineBeasiswa = document.getElementById('deadline').value;
  var cvBeasiswa = document.getElementById('cv').value;
  var pernyataanBeasiswa = document.getElementById('pernyataan').checked;

  var validasiNamaBeasiswa = document.getElementById('validasiNamaBeasiswa');
  var validasiDeadlineBeasiswa = document.getElementById('validasiDeadlineBeasiswa');
  var validasiCvBeasiswa = document.getElementById('validasiCvBeasiswa');
  var validasiPernyataanBeasiswa = document.getElementById('validasiPernyataanBeasiswa');

  var jumlahError = 0;

  if (namaBeasiswa == "") {
    validasiNamaBeasiswa.innerHTML = "Harap isi bidang ini!";
    jumlahError++;
  } else {
    validasiNamaBeasiswa.innerHTML = "";
    jumlahError - 1;
  }
  if (deadlineBeasiswa == "") {
    validasiDeadlineBeasiswa.innerHTML = "Harap isi bidang ini!";
    jumlahError++;
  } else {
    validasiDeadlineBeasiswa.innerHTML = "";
    jumlahError - 1;
  }
  if (cvBeasiswa == "") {
    validasiCvBeasiswa.innerHTML = "Harap isi bidang ini!";
    jumlahError++;
  } else {
    validasiCvBeasiswa.innerHTML = "";
    jumlahError - 1;
  }
  if (pernyataanBeasiswa == false) {
    validasiPernyataanBeasiswa.innerHTML = "Harap isi bidang ini!";
    jumlahError++;
  } else {
    validasiPernyataanBeasiswa.innerHTML = "";
    jumlahError - 1;
  }

  if (jumlahError == 0) {
    $('#exampleModal').modal('show');
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