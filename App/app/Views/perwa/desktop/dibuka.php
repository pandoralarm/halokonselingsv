<section id="dibuka" class="dibuka">
  <div v-if="current_submenu == 'dibuka'" class="container">
    <div class="row d-flex align-items-center" style="min-height: 85vh;">
      <div class="col-5 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title">REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menu')" class="back">Kembali</button>
      </div>
      <div class="col-7 d-flex flex-column align-items-center justify-content-center" style="max-height: 80vh; overflow-y: auto;">

        <div class="kartu dibuka" style="background: none !important;">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-small gold" style="font-size: 36px;">Beasiswa Dibuka</h1>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_dibuka.svg'); ?>" alt="">
            </div>
          </div>

          <div class="row d-flex align-items-center justify-content-center">

            <div v-for="row in beasiswa" class="kartu beasiswa d-flex flex-column align-items-center">
              <div class="title">{{row.namaBeasiswa}}</div>
              <div class="garis beasiswa"></div>
              <div class="row w-100">
                <div class="col-7">

                  <div class="row">
                    <div class="col-5">
                      <p class="text-beasiswa">Donatur</p>
                    </div>
                    <div class="col-7">
                      <p class="text-beasiswa">: {{row.donatur}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-5">
                      <p class="text-beasiswa">Besar Beasiswa</p>
                    </div>
                    <div class="col-7">
                      <p class="text-beasiswa">: {{row.nominal}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <p class="text-beasiswa">Syarat Semester : {{row.syaratSemester}}</p>
                    </div>
                    <div class="col">
                      <p class="text-beasiswa">Syarat IPK : {{row.syaratIPK}}</p>
                    </div>
                  </div>

                </div>
                <div class="col-5">
                  <p class="text-beasiswa">Periode Pendaftaran</p>
                  <div class="row">
                    <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                      <div class="round-dibuka"></div>
                      <div class="straight"></div>
                      <div class="round-ditutup"></div>
                    </div>
                    <div class="col-9 d-flex flex-column align-items-start justify-content-between">
                      <p class="text-dibuka">Dibuka {{row.tglDibuka}}</p>
                      <p class="text-ditutup">Ditutup {{row.tglDitutup}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <button class="ajukan" style="margin-left:auto;">Ajukan</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<script src="<?= base_url('assets/js/desktop/dibuka.js') ?>"></script>