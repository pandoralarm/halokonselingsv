<section id="pengajuansekprodi" class="pengajuan">
  <div v-if="current_submenu == 'pengajuansekprodi'" class="container">
    <div class="row" style="min-height: 85vh;">
      <div class="col-5 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title">REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menusekprodi')" class="back">Kembali</button>
      </div>
      <div class="col-7 d-flex flex-column align-items-center justify-content-center">
        <div class="kartu pengajuan" style="margin-bottom: 3em;">
          <div class="row">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-pengajuan">Kelola Pengajuan Rekomendasi</h1>
            </div>
            <div class="col-4 d-flex justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_menu_pengajuan.svg'); ?>" alt="">
            </div>
          </div>
          <div class="row mt-4 d-flex align-items-center justify-content-center">
            <div class="col-5 d-flex flex-column align-items-center justify-content-center diproses">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiproses.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-diproses">{{ pengajuanDiproses.length }}</div>
              </div>
              <p class="text-diproses">Rekomendasi diproses</p>
              <button v-if="current_window != 'prosesSekprod'" class="tampilkan-diproses" v-on:click="changeWindow('prosesSekprod')" style="margin-bottom: 5px;">Tampilkan</button>
            </div>
            <div class="col-5 d-flex flex-column align-items-center justify-content-center diterima">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiterima.svg'); ?>" style="max-height: 70px;" alt="">
                <div class="jumlah-diterima">{{ pengajuanDiselesaikan.length }}</div>
              </div>
              <p class="text-diterima">Rekomendasi diselesaikan</p>
              <button v-if="current_window != 'selesaikanSekprod'" class="tampilkan-diterima" v-on:click="changeWindow('selesaikanSekprod')" style="margin-bottom: 5px;">Tampilkan</button>
            </div>
          </div>

          <div v-if="current_window == 'prosesSekprod'" class="d-flex align-items-center justify-content-center" style="width: 100%;">

            <div class="kartu diproses d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">REKOMENDASI DIPROSES</div>
              <div class="garis"></div>
              <table style="width:100%" class="diprosessekprod">
                <tr>
                  <th>Tanggal Pengajuan</th>
                  <th>Deadline Beasiswa</th>
                  <th>Nama Mahasiswa</th>
                  <th>NIM</th>
                  <th></th>
                </tr>
                <tr v-for="row in pengajuanDiproses">
                  <td>{{ row.tanggalPengajuan }}</td>
                  <td>{{ row.deadline }}</td>
                  <td>{{ row.nama }}</td>
                  <td>{{ row.nim }}</td>
                  <td v-on:click="detailPengajuanDiproses(row.idPengajuan)" class="d-flex align-items-center justify-content-center"><button class="button-diprosessekprod">Detail</button></td>
                </tr>
              </table>
            </div>

          </div>

          <div v-if="current_window == 'selesaikanSekprod'" class="d-flex align-items-center justify-content-center" style="width: 100%;">

            <div class="kartu diterima d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">REKOMENDASI DISELESAIKAN</div>
              <div class="garis"></div>
              <table style="width:100%" class="diselesaikansekprod">
                <tr>
                  <th>Tanggal Pengajuan</th>
                  <th>Deadline Beasiswa</th>
                  <th>Nama Mahasiswa</th>
                  <th>NIM</th>
                  <th></th>
                </tr>
                <tr v-for="row in pengajuanDiselesaikan">
                  <td>{{ row.tanggalPengajuan }}</td>
                  <td>{{ row.deadline }}</td>
                  <td>{{ row.nama }}</td>
                  <td>{{ row.nim }}</td>
                  <td><button class="button-diselesaikansekprod">Detail</button></td>
                </tr>
              </table>
            </div>

          </div>


          <div v-if="current_window == 'detailPengajuanDiproses'" class="d-flex align-items-center justify-content-center" style="width: 100%;">

            <div class="kartu diproses d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">DetailPengajuan</div>
              <div class="garis"></div>
              <table v-for="row in pengajuanMhs" style="text-align: start; width:100%;">
                <tr>
                  <td>Nama</td>
                  <td>{{row.nama}}</td>
                </tr>
                <tr>
                  <td>NIM</td>
                  <td>{{row.nim}}</td>
                </tr>
                <tr>
                  <td>Program Studi</td>
                  <td>{{row.jurusan}}</td>
                </tr>
                <tr>
                  <td>Nama Beasiswa</td>
                  <td>{{row.namaBeasiswa}}</td>
                </tr>
                <tr>
                  <td>Tanggal Pengajuan</td>
                  <td>sdsd</td>
                </tr>
                <tr>
                  <td>Deadline</td>
                  <td>sdsd</td>
                </tr>
                <tr>
                  <td>IPK</td>
                  <td>sdsd</td>
                </tr>
                <tr>
                  <td>CV</td>
                  <td>sdsd</td>
                </tr>
              </table>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<script src="<?= base_url('assets/js/desktop/pengajuansekprodi.js') ?>"></script>