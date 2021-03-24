<section id="saya" class="saya">
  <div v-if="current_submenu == 'saya'" class="container">
    <div class="row d-flex align-items-center" style="min-height: 85vh;">
      <div class="col-5 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title">REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menu')" class="back">Kembali</button>
        <button v-on:click="getResponse();" class="back">CONTOH</button>
        {{ dosensearch }}
      </div>
      <div class="col-7 d-flex flex-column align-items-center justify-content-center" style="max-height: 80vh; overflow-y: auto;">

        <div class="kartu saya d-flex flex-column align-items-center" style="background: none !important;">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-small blue" style="font-size: 36px;">Pengajuan Saya</h1>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_saya.svg'); ?>" alt="">
            </div>
          </div>

          <div class="row mt-4 w-100">
            <div class="col-4 d-flex flex-column align-items-center justify-content-center diproses">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiproses.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-diproses"><?= count($pengajuanDiproses); ?></div>
              </div>
              <p class="text-diproses">Rekomendasi diproses</p>
              <button v-if="current_window != 'proses'" class="tampilkan-diproses" v-on:click="changeWindow('proses')">Tampilkan</button>
            </div>
            <div class="col-4 d-flex flex-column align-items-center justify-content-center diterima">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiterima.svg'); ?>" style="max-height: 70px;" alt="">
                <div class="jumlah-diterima"><?= count($pengajuanDiterima); ?></div>
              </div>
              <p class="text-diterima">Rekomendasi diterima</p>
              <button v-if="current_window != 'terima'" class="tampilkan-diterima" v-on:click="changeWindow('terima')">Tampilkan</button>
            </div>
            <div class="col-4 d-flex flex-column align-items-center justify-content-center ditolak">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDitolak.svg'); ?>" style="max-height: 70px;" alt="">
                <div class="jumlah-ditolak"><?= count($pengajuanDitolak); ?></div>
              </div>
              <p class="text-ditolak">Rekomendasi ditolak</p>
              <button v-if="current_window != 'tolak'" class="tampilkan-ditolak" v-on:click="changeWindow('tolak')">Tampilkan</button>
            </div>
          </div>

          <div class="w-100" v-if="current_window == 'proses'">
            <?php
            foreach ($pengajuanDiproses as $row) {
            ?>
              <div class="kartu diproses d-flex flex-column align-items-center justify-content-center mt-4">
                <div class="title"><?= $row->namaBeasiswa ?></div>
                <div class="garis"></div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_pengajuan_diproses.svg'); ?>" style="max-width: 50px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_kalender_proses.svg'); ?>" style="max-width: 37px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_dosen_proses.svg'); ?>" style="max-width: 30px; margin:2em 0;" alt="">
                  </div>
                </div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-proses">Tanggal Pengajuan</p>
                    <p class="value-proses"><?= $row->tanggalPengajuan ?></p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-proses">Deadline Beasiswa</p>
                    <p class="value-proses"><?= $row->deadline ?></p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-proses">Dosen Penganggung Jawab</p>
                    <p class="value-proses">Rosyda Dianah SKM., MKM.</p>
                  </div>
                </div>
                <div class="w-100 d-flex justify-content-end">
                  <form action="<?php echo base_url('perwa/pengajuan/deletePengajuan/' . $row->idPengajuan); ?>">
                    <button class="back">Batalkan Pengajuan</button>
                  </form>
                </div>
              </div>

            <?php
            }
            ?>

          </div>

          <div class="w-100" v-if="current_window == 'terima'">
            <?php
            foreach ($pengajuanDiterima as $row) {
            ?>

              <div class="kartu diterima d-flex flex-column align-items-center justify-content-center mt-4">
                <div class="title">YAYASAN GOODWILL INTERNATIONAL</div>
                <div class="garis"></div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_pengajuan_disetujui.svg'); ?>" style="max-width: 50px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_kalender_setuju.svg'); ?>" style="max-width: 37px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_dosen_setuju.svg'); ?>" style="max-width: 30px; margin:2em 0;" alt="">
                  </div>
                </div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-terima">Tanggal Pengajuan</p>
                    <p class="value-terima">19 Februari 2021</p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-terima">Deadline Beasiswa</p>
                    <p class="value-terima">19 Juli 2021</p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-terima">Dosen Penganggung Jawab</p>
                    <p class="value-terima">Rosyda Dianah SKM., MKM.</p>
                  </div>
                </div>
                <div class="w-100 d-flex justify-content-end">
                  <button class="button-diterima">Unduh Rekomendasi</button>
                </div>
              </div>

            <?php
            }
            ?>

          </div>

          <div class="w-100" v-if="current_window == 'tolak'">
            <?php
            foreach ($pengajuanDitolak as $row) {
            ?>

              <div class="kartu ditolak d-flex flex-column align-items-center justify-content-center mt-4">
                <div class="title">YAYASAN GOODWILL INTERNATIONAL</div>
                <div class="garis "></div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_pengajuan_ditolak.svg'); ?>" style="max-width: 50px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_kalender_ditolak.svg'); ?>" style="max-width: 37px; margin:2em 0;" alt="">
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_dosen_ditolak.svg'); ?>" style="max-width: 30px; margin:2em 0;" alt="">
                  </div>
                </div>
                <div class="row w-100">
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-tolak">Tanggal Pengajuan</p>
                    <p class="value-tolak">19 Februari 2021</p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-tolak">Deadline Beasiswa</p>
                    <p class="value-tolak">19 Juli 2021</p>
                  </div>
                  <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                    <p class="label-tolak">Dosen Penganggung Jawab</p>
                    <p class="value-tolak">Rosyda Dianah SKM., MKM.</p>
                  </div>
                </div>
                <div class="w-100 d-flex justify-content-end">
                </div>
              </div>

            <?php
            }
            ?>

          </div>

        </div>

      </div>
    </div>

  </div>
</section>

<script src="<?= base_url('assets/js/desktop/saya.js') ?>"></script>