<section id="pengajuan" class="pengajuan">
    <div v-if="current_submenu == 'pengajuan'" class="container">
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <img style="width:200px;" src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_confirmation.svg'); ?>" alt="">
                    <p class="modal-confirmation judul">Apakah kamu yakin?</p>
                    <p class="modal-confirmation detail">Data yang telah dikirim tidak dapat dirubah</p>
                </div>
                <div class="row d-flex align-items-end">
                    <button style="width:7em;" data-bs-dismiss="modal" class="back">Kembali</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
        </div>

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
                        <form method="POST" class="pengajuan d-flex flex-column" action="#" enctype="multipart/form-data">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" value="<?= $name ?>" required disabled>
                            <label for="beasiswa">Nama Beasiswa</label>
                            <input type="text" id="beasiswa" name="beasiswa" required>
                            <small class="ms-2 text-danger" id="validasiNamaBeasiswa"></small>
                            <label for="deadline">Deadline Beasiswa</label>
                            <input type="date" id="deadline" name="deadline" required>
                            <small class="ms-2 text-danger" id="validasiDeadlineBeasiswa"></small>
                            <label for="cv">CV</label>
                            <input type="file" id="cv" name="cv" onchange="Filevalidation()" required>
                            <small class="ms-2 text-danger" id="validasiCvBeasiswa"></small>
                            <div class="mt-4 d-flex align-items-center">
                                <input type="checkbox" name="pernyataan" id="pernyataan" required> 
                                <small class="pernyataan">Dengan ini saya menyatakan bahwa data tersebut adalah benar, apabila kemudian ditemukan kecurangan maka pihak kampus berhak membatalkan beasiswa saya</small>
                            </div>
                            <small class="ms-2 text-danger" id="validasiPernyataanBeasiswa"></small>
                            <div>
                                 
                            </div>
                        </form>
                        <button onclick="validasiFormPengajuan()" class="pengajuan-submit" style="margin-left:auto; margin-right:2em ; width:7em">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script src="<?= base_url('assets/js/desktop/pengajuan.js') ?>"></script>