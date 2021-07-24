<section id="saya" class="saya">
  <div v-if="current_submenu == 'saya'" class="container">
    <div class="row d-flex align-items-center" style="min-height: 85vh;">
      <div class="col-5 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title">REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menu')" class="back">Kembali</button>
      </div>
      <div class="col-7 d-flex flex-column align-items-center justify-content-center">

        <div class="kartu saya d-flex flex-column align-items-center"  style="max-height: 80vh; overflow-y: auto; background: none !important; padding:3em 0;">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-small blue" style="font-size: 36px;">Pengajuan Saya</h1>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_saya.svg'); ?>" alt="">
            </div>
          </div>

          <div class="row mt-4 w-100">
            <div class="col-3 d-flex flex-column align-items-center justify-content-center diproses">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiproses.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-diproses">{{ pengajuanDiproses.length }}</div>
              </div>
              <p class="text-diproses">Rekomendasi diproses</p>
              <button v-if="current_window != 'proses'" class="tampilkan-diproses" v-on:click="changeWindow('proses')">Tampilkan</button>
            </div>
            <div class="col-3 d-flex flex-column align-items-center justify-content-center ditunda">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDitunda.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-ditunda">{{ pengajuanDitunda.length }}</div>
              </div>
              <p class="text-ditunda">Rekomendasi ditunda</p>
              <button v-if="current_window != 'tunda'" class="tampilkan-ditunda" v-on:click="changeWindow('tunda')">Tampilkan</button>
            </div>
            <div class="col-3 d-flex flex-column align-items-center justify-content-center diterima">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiterima.svg'); ?>" style="max-height: 70px;" alt="">
                <div class="jumlah-diterima">{{ pengajuanDisetujui.length }}</div>
              </div>
              <p class="text-diterima">Rekomendasi diterima</p>
              <button v-if="current_window != 'terima'" class="tampilkan-diterima" v-on:click="changeWindow('terima')">Tampilkan</button>
            </div>
            <div class="col-3 d-flex flex-column align-items-center justify-content-center ditolak">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDitolak.svg'); ?>" style="max-height: 40px;" alt="">
                <div class="jumlah-ditolak">{{ pengajuanDitolak.length }}</div>
              </div>
              <p class="text-ditolak">Rekomendasi ditolak</p>
              <button v-if="current_window != 'tolak'" class="tampilkan-ditolak" v-on:click="changeWindow('tolak')">Tampilkan</button>
            </div>
          </div>

          <div class="w-100" v-if="current_window == 'proses'">

            <div v-for="(row, index) in pengajuanDiproses" :key="`$index`" class="w-100 kartu diproses d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">{{ row.namaBeasiswa }}</div>
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
                  <p class="value-proses">{{ row.tanggalPengajuan }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-proses">Deadline Beasiswa</p>
                  <p class="value-proses">{{ row.deadline }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-proses">Dosen Penganggung Jawab</p>
                  <p class="value-proses">{{ row.dosenPJ}}</p>
                </div>
              </div>
              <div class="w-100 d-flex justify-content-end">
                <button style="margin-top: 1em; margin-right: 2em; width: 10em; font-size:1em; padding: 0px 15px;" class="tampilkan-diproses" v-on:click="changeWindow('detail-pengajuan-diproses');getDetailDiproses(index)">Detail</button>
              </div>
            </div>

          </div>

          <div v-if="current_window == 'detail-pengajuan-diproses'" class="w-100">
            <div class='w-100 kartu diproses d-flex flex-column align-items-center justify-content-center mt-4'>
              <div class="title">{{ detailDiproses['namaBeasiswa'] }}</div>
              <div class="garis"></div>
              <div class=""></div>
              <table style="text-align: start; width:100%; font-size:14px; font-weight:800;">
                <tr>
                  <td>Nama</td>
                  <td>{{ detailDiproses['nama'] }}</td>
                </tr>
                <tr>
                  <td>NIM</td>
                  <td>{{ detailDiproses['nim'] }}</td>
                </tr>
                <tr>
                  <td>Semester</td>
                  <td>{{ detailDiproses['semester'] }}</td>
                </tr>
                <tr>
                  <td>Program Studi</td>
                  <td>{{ detailDiproses['prodi'] }}</td>
                </tr>
                <tr>
                  <td>Tanggal Pengajuan</td>
                  <td>{{ detailDiproses['tanggalPengajuan'] }}</td>
                </tr>
                <tr>
                  <td>Status Pengajuan</td>
                  <td>{{ detailDiproses['status'] }}</td>
                </tr>
                <tr>
                  <td>Deadline</td>
                  <td>{{ detailDiproses['deadline'] }}</td>
                </tr>
                <tr>
                  <td>IP</td>
                  <td>Semester 1 : {{ detailDiproses['ip1'] }}</td>
                  <td>Semester 4 : {{ detailDiproses['ip4'] }}</td>
                </tr>
                <tr>
                  <td></td>
                  <td>Semester 2 : {{ detailDiproses['ip2'] }}</td>
                  <td>Semester 5 : {{ detailDiproses['ip5'] }}</td>
                </tr>
                <tr>
                  <td></td>
                  <td>Semester 3 : {{ detailDiproses['ip3'] }}</td>
                  <td>Semester 6 : {{ detailDiproses['ip6'] }}</td>
                </tr>
                <tr>
                  <td>IPK</td>
                  <td>{{ detailDiproses['ipk'] }}</td>
                </tr>
                <tr>
                  <td>CV</td>
                  <td><button class="button-diselesaikansekprod" v-on:click="getCV()" >Unduh</button></td>
                </table>
              </div>
              <div class="row w-100 d-flex justify-content-end">
                <button class="tampilkan-diproses" style="font-size:1em; margin-top:1em; width:13em; margin-right:0.5em" v-on:click="changeWindow('proses')">Kembali</button>
                <button class="back" style="width:13em; margin-right:2em" v-on:click="deletePengajuan()">Batalkan Pengajuan</button>
              </div>
          </div>

          <div class="w-100" v-if="current_window == 'tunda'">

            <div v-for="row in pengajuanDitunda" class="w-100 kartu ditunda d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">{{ row.namaBeasiswa }}</div>
              <div class="garis"></div>
              <div class="row w-100">
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_pengajuan_ditunda.svg'); ?>" style="max-width: 50px; margin:2em 0;" alt="">
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_kalender_ditunda.svg'); ?>" style="max-width: 37px; margin:2em 0;" alt="">
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_dosen_tunda.svg'); ?>" style="max-width: 30px; margin:2em 0;" alt="">
                </div>
              </div>
              <div class="row w-100">
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-ditunda">Tanggal Pengajuan</p>
                  <p class="value-ditunda">{{ row.tanggalPengajuan }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-ditunda">Deadline Beasiswa</p>
                  <p class="value-ditunda">{{ row.deadline }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-ditunda">Dosen Penganggung Jawab</p>
                  <p class="value-ditunda">{{ row.dosenPJ}}</p>
                </div>
              </div>
              <div class="w-100 d-flex justify-content-end">
                <button style="margin-top: 1em; margin-right: 2em; width: 10em; font-size:1em; padding: 0px 15px;" class="tampilkan-ditunda" v-on:click="changeWindow('proses')">Detail</button>
              </div>
            </div>

          </div>

          <div class="w-100" v-if="current_window == 'terima'">

            <div v-for="row in pengajuanDisetujui" class="w-100 kartu diterima d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">{{ row.namaBeasiswa }}</div>
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
                  <p class="value-terima">{{ row.tanggalPengajuan }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-terima">Deadline Beasiswa</p>
                  <p class="value-terima">{{ row.deadline }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-terima">Dosen Penganggung Jawab</p>
                  <p class="value-terima">{{ row.dosenPJ}}</p>
                </div>
              </div>
              <div class="w-100 d-flex justify-content-end">
                <button style="margin-top: 1em; margin-right: 2em; width: 10em; font-size:1em; padding: 0px 15px;" class="tampilkan-diterima" v-on:click="getRekomendasi(row.idPengajuan)">Unduh</button>
                <!-- <button v-on:click="getRekomendasi(row.idPengajuan)" class="button-diterima">Unduh Rekomendasi</button> -->
              </div>
            </div>

          </div>

          <div class="w-100" v-if="current_window == 'tolak'">

            <div v-for="row in pengajuanDitolak" class="w-100 kartu ditolak d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">{{ row.namaBeasiswa }}</div>
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
                  <p class="value-tolak">{{ row.tanggalPengajuan }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-tolak">Deadline Beasiswa</p>
                  <p class="value-tolak">{{ row.deadline }}</p>
                </div>
                <div class="col-4 d-flex flex-column align-items-center justify-content-center">
                  <p class="label-tolak">Dosen Penganggung Jawab</p>
                  <p class="value-tolak">{{ row.dosenPJ}}</p>
                </div>
              </div>
              <div class="w-100 d-flex justify-content-end">
                <button style="margin-top: 1em; margin-right: 2em; width: 10em; font-size:1em; padding: 0px 15px;" class="tampilkan-ditolak" v-on:click="changeWindow('proses')">Detail</button>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</section>

<script src="<?= base_url('assets/js/desktop/saya.js') ?>"></script>