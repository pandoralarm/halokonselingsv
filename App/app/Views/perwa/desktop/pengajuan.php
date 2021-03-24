<section id="pengajuan" class="pengajuan">
  <div v-if="current_submenu == 'pengajuan'" class="container">
    <div class="row" style="min-height: 85vh;">
      <div class="col-5 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title">REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menu')" class="back">Kembali</button>
      </div>
      <div class="col-7 d-flex flex-column align-items-center justify-content-center">
        <div class="kartu pengajuan" style="margin-bottom: 3em;">
          <div class="row">
            <div class="col-7 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-pengajuan">Pengajuan Rekomendasi</h1>
            </div>
            <div class="col-5 d-flex justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_menu_pengajuan.svg'); ?>" alt="">
            </div>
          </div>
          <div class="row">
            <form method="POST" class="pengajuan d-flex flex-column" action="<?php echo base_url('perwa/pengajuan/commit'); ?>" enctype="multipart/form-data">
              <label for="nama">Nama Lengkap</label>
              <input type="text" id="nama" name="nama" value="<?= $name ?>" required disabled>
              <label for="beasiswa">Nama Beasiswa</label>
              <input type="text" id="beasiswa" name="beasiswa" required>
              <label for="deadline">Deadline Beasiswa</label>
              <input type="date" id="deadline" name="deadline" required>
              <label for="cv">CV</label>
              <input type="file" id="cv" name="cv" required>
              <div class="mt-4 d-flex align-items-center">
                <input type="checkbox" name="pernyataan" id="pernyataan" required>
                <small class="pernyataan">Dengan ini saya menyatakan bahwa data tersebut adalah benar, apabila kemudian ditemukan kecurangan maka pihak kampus berhak membatalkan beasiswa saya</small>
              </div>
              <div>
                <button class="pengajuan-submit" style="float:right;">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="<?= base_url('assets/js/desktop/pengajuan.js') ?>"></script>