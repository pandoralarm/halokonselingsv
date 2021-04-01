<section id="pengajuansekprodi" class="pengajuan">
  <div v-if="current_submenu == 'pengajuansekprodi'" class="container">
    <div class="row" style="min-height: 85vh;">
      <div class="col-4 d-flex flex-column align-items-center justify-content-center">
        <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
        <h1 class="title" style="font-size: 2em" >REKOMENDASI BEASISWA</h1>
        <h2 class="sub-title">SEKOLAH VOKASI</h2>
        <button v-on:click="changeSubmenu('menusekprodi')" class="back">Kembali</button>
      </div>
      <div class="col-8 d-flex flex-column align-items-center justify-content-center">
        <div class="kartu pengajuan d-flex flex-column align-items-center" style="max-height: 80vh; overflow-y: auto; overflow-x: hidden; background: none !important; padding:3em 0;">
          <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8 d-flex flex-column justify-content-center align-items-center">
              <h1 class="title-pengajuan">Kelola Pengajuan Rekomendasi</h1>
            </div>
            <div class="col-4 d-flex justify-content-end">
              <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_menu_pengajuan.svg'); ?>" alt="">
            </div>
          </div>
          <div class="row mt-4  w-100">
            <div class="col-4 d-flex flex-column align-items-center justify-content-center diproses">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiproses.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-diproses">{{ pengajuanDiproses.length }}</div>
              </div>
              <p class="text-diproses">Rekomendasi diproses</p>
              <button v-if="current_window != 'prosesSekprod'" class="tampilkan-diproses" v-on:click="changeWindow('prosesSekprod')" style="margin-bottom: 5px;">Tampilkan</button>
            </div>
            <div class="col-4 d-flex flex-column align-items-center justify-content-center diproses">
              <div class="d-flex align-items-center justify-content-around">
                <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_jumlahDiproses.svg'); ?>" style="max-height: 50px;" alt="">
                <div class="jumlah-diproses">{{ pengajuanDiproses.length }}</div>
              </div>
              <p class="text-diproses">Rekomendasi diproses</p>
              <button v-if="current_window != 'prosesSekprod'" class="tampilkan-diproses" v-on:click="changeWindow('prosesSekprod')" style="margin-bottom: 5px;">Tampilkan</button>
            </div>
            <div class="col-4 d-flex flex-column align-items-center justify-content-center diterima">
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
                  <td><button v-on:click="detailPengajuanDiproses(row.idPengajuan)" class="button-diprosessekprod">Detail</button></td>
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
                  <td><button v-on:click="detailPengajuanDiproses(row.idPengajuan)" class="button-diselesaikansekprod">Detail</button></td>
                </tr>
              </table>
            </div>

          </div>


          <div v-if="current_window == 'detailPengajuanDiproses' || current_window == 'detailPengajuanDiprosesDisetujui' || current_window == 'detailPengajuanDiprosesDitolak'" class="d-flex align-items-center justify-content-center" style="width: 100%;">

            <div class="kartu diproses d-flex flex-column align-items-center justify-content-center mt-4">
              <div class="title">Detail Pengajuan</div>
              <div class="garis"></div>
              <table v-for="row in pengajuanMhs" style="text-align: start; width:100%; font-size:14px; font-weight:800;">
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
                  <td>{{row.prodi}}</td>
                </tr>
                <tr>
                  <td>Nama Beasiswa</td>
                  <td>{{row.namaBeasiswa}}</td>
                </tr>
                <tr>
                  <td>Tanggal Pengajuan</td>
                  <td>{{row.tanggalPengajuan}}</td>
                </tr>
                <tr>
                  <td>Deadline</td>
                  <td>{{row.deadline}}</td>
                </tr>
                <tr>
                  <td>IP</td>
                  <td>Semester 1 : {{row.ip1}}</td>
                  <td>Semester 4 : {{row.ip4}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td>Semester 2 : {{row.ip2}}</td>
                  <td>Semester 5 : {{row.ip5}}</td>
                </tr>
                <tr>
                  <td></td>
                  <td>Semester 3 : {{row.ip3}}</td>
                  <td>Semester 6 : {{row.ip6}}</td>
                </tr>
                <tr>
                  <td>IPK</td>
                  <td>{{row.ipk}}</td>
                </tr>
                <tr>
                  <td>CV</td>
                  <td><button class="button-diselesaikansekprod" v-on:click="getCV(row.idPengajuan)" >Unduh</button></td>
                </tr>
              </table>
              <div  v-if="current_window != 'detailPengajuanDiprosesDisetujui' && current_window != 'detailPengajuanDiprosesDitolak'" class="d-flex align-items-center justify-content-end w-100 mt-4">
                <button class="back" style="margin:0 1em 0 0;" v-on:click="changeWindow('detailPengajuanDiprosesDitolak')">Tolak Permohonan</button>
                <button class="button-diselesaikansekprod" v-on:click="changeWindow('detailPengajuanDiprosesDisetujui')">Setujui Permohonan</button>
              </div>
              
              <div class="w-100" v-if="current_window == 'detailPengajuanDiprosesDisetujui'">

                <div class="title mt-2">Form Persetujuan Rekomendasi</div>
                <div class="garis"></div>
                <form class="pengajuan d-flex flex-column w-100" method="POST">
                  <label for="kemampuanAkademik" style="color:#3ca7a7;">Kemampuan Akademik</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kemampuanAkademik" name="kemampuanAkademik" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanAkademik" name="kemampuanAkademik" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kemampuanAkademik" name="kemampuanAkademik" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kemampuanAkademik" name="kemampuanAkademik" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanAkademik" name="kemampuanAkademik" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="kemampuanLisan" style="color:#3ca7a7;">Kemampuan mengemukakan pendapat secara lisan</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kemampuanLisan" name="kemampuanLisan" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanLisan" name="kemampuanLisan" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kemampuanLisan" name="kemampuanLisan" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kemampuanLisan" name="kemampuanLisan" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanLisan" name="kemampuanLisan" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="kemampuanTertulis" style="color:#3ca7a7;">Kemampuan mengemukakan pendapat secara tertulis</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kemampuanTertulis" name="kemampuanTertulis" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanTertulis" name="kemampuanTertulis" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kemampuanTertulis" name="kemampuanTertulis" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kemampuanTertulis" name="kemampuanTertulis" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kemampuanTertulis" name="kemampuanTertulis" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="motivasi" style="color:#3ca7a7;">Motivasi</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="motivasi" name="motivasi" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="motivasi" name="motivasi" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="motivasi" name="motivasi" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="motivasi" name="motivasi" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="motivasi" name="motivasi" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="kestabilan" style="color:#3ca7a7;">Kestabilan emosi dan kedewasaan</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kestabilan" name="kestabilan" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kestabilan" name="kestabilan" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kestabilan" name="kestabilan" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kestabilan" name="kestabilan" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kestabilan" name="kestabilan" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="kreativitas" style="color:#3ca7a7;">Daya cipta/ kreativitas</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kreativitas" name="kreativitas" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kreativitas" name="kreativitas" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kreativitas" name="kreativitas" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kreativitas" name="kreativitas" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kreativitas" name="kreativitas" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="kelompok" style="color:#3ca7a7;">Kemampuan bekerja dalam kelompok</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="kelompok" name="kelompok" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="kelompok" name="kelompok" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="kelompok" name="kelompok" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="kelompok" name="kelompok" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="kelompok" name="kelompok" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <label for="teknis" style="color:#3ca7a7;">Kemampuan menggunakan peralatan teknis dibidangnya</label>
                  <div class="w-100 d-flex align-items-center justify-content-between">
                    <div>
                      <input type="radio" id="teknis" name="teknis" value=0 required>
                      Kurang
                    </div>
                    <div>
                      <input type="radio" id="teknis" name="teknis" value=1 required>
                      Rata-rata
                    </div>
                    <div>
                      <input type="radio" id="teknis" name="teknis" value=2 required>
                      Baik
                    </div>
                    <div>
                      <input type="radio" id="teknis" name="teknis" value=3 required>
                      Cemerlang
                    </div>
                    <div>
                      <input type="radio" id="teknis" name="teknis" value=4 required>
                      Kurang kesempatan<br>untuk memperhatikan
                    </div>
                  </div>
                  <button class="pengajuan-submit" style="width:7em; align-self:flex-end; margin-top:2em;">Submit</button>
                </form>

              </div>

              <div class="w-100" v-if="current_window == 'detailPengajuanDiprosesDitolak'">

                <div class="title mt-2">Form Penolakan Rekomendasi</div>
                <div class="garis"></div>
                <form class="pengajuan d-flex flex-column w-100" method="POST">
                  <label for="alasan">Alasan Penolakan</label>
                  <textarea id="alasan" name="alasan" rows="4" cols="50"></textarea>
                  <button class="pengajuan-submit" style="width:7em; align-self:flex-end; margin-top:2em;">Submit</button>
                </form>

              </div>

            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<script src="<?= base_url('assets/js/desktop/pengajuansekprodi.js') ?>"></script>