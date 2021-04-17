<!DOCTYPE html>
<html lang="en">
<table style="width=100%">
    <tr style="width:100%;">
        <td style="width:100%;"><img src="<?= base_url('assets/img/Components/Template/header.jpg')?>" style="width:595px; height:120px"></td>
    </tr>
</table>
<br>
<div class="judul">SURAT REKOMENDASI BEASISWA<br><span><?= $namaBeasiswa; ?></span></div>
<br>
<table style="width:100%; margin-top:15px;">
    <tr>
        <th colspan="2" style="width:50%; font-weight:bold;">YANG MEMBERI REKOMENDASI :</th>
        <th colspan="2" style="width:50%; font-weight:bold;">YANG DIBERI REKOMENDASI</th>
    </tr>
    <tr>
        <td style="width:10%">Nama</td>
        <td style="width:40%">: <?= $namaDosen; ?></td>
        <td style="width:14%">Nama</td>
        <td style="width:36%">: <?= $namaMahasiswa; ?></td>
    </tr>
    <tr>
        <td class="keterangan">NIP</td>
        <td>: <?= $nip; ?></td>
        <td class="keterangan">NIM</td>
        <td>: <?= $nim; ?></td>
    </tr>
    <tr>
        <td class="keterangan">Instansi</td>
        <td>: Sekolah Vokasi IPB</td>
        <td class="keterangan">Program Studi</td>
        <td>: <?= $prodi; ?></td>
    </tr>
</table>
<br><br><br>
<table border="1" class="penilaian">
    <tr>
        <th style="width:28%; font-weight:bold;"><br><br>Kriteria Penilaian</th>
        <th style="width:13%"><br><br>Kurang</th>
        <th style="width:13%"><br><br>Rata-rata</th>
        <th style="width:13%"><br><br>Baik</th>
        <th style="width:13%"><br><br>Cemerlang</th>
        <th style="width:20%">Kurang<br>&nbsp;&nbsp;Kesempatan Untuk&nbsp;&nbsp;<br>Memperhatikan</th>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kemampuan akademik</td>
        <td> 
        <?php if($kemampuanAkademik == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>
        </td>
        <td>
        <?php if($kemampuanAkademik == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>
        </td>
        <td>
        <?php if($kemampuanAkademik == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>
        </td>
        <td>
        <?php if($kemampuanAkademik == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>            
        </td>
        <td>
        <?php if($kemampuanAkademik == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kemampuan mengemukakan<br>&nbsp;&nbsp;pendapat secara lisan</td>
        <td>
        <?php if($kemampuanLisan == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>  
        </td>
        <td>
        <?php if($kemampuanLisan == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>  
        </td>
        <td>
        <?php if($kemampuanLisan == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>  
        </td>
        <td>
        <?php if($kemampuanLisan == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>  
        </td>
        <td>
        <?php if($kemampuanLisan == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>              
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kemampuan mengemukakan<br>&nbsp;&nbsp;pendapat secara tertulis</td>
        <td>
        <?php if($kemampuanTertulis == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTertulis == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTertulis == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?>             
        </td>
        <td>
        <?php if($kemampuanTertulis == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTertulis == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Motivasi</td>
        <td>
        <?php if($motivasi == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($motivasi == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($motivasi == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($motivasi == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($motivasi == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kestabilan emosi dan<br>&nbsp;&nbsp;kedewasaan</td>
        <td>
        <?php if($kestabilan == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kestabilan == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kestabilan == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kestabilan == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kestabilan == 4) : ?>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Daya cipta/ kreativitas</td>
        <td>
        <?php if($kreativitas == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kreativitas == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kreativitas == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kreativitas == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kreativitas == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kemampuan bekerja dalam<br>&nbsp;&nbsp;kelompok</td>
        <td>
        <?php if($kemampuanBerkelompok == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanBerkelompok == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanBerkelompok == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanBerkelompok == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanBerkelompok == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
    <tr>
        <td>&nbsp;&nbsp;Kemampuan menggunakan<br>&nbsp;&nbsp;peralatan teknis dibidangnya</td>
        <td>
        <?php if($kemampuanTeknis == 0) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTeknis == 1) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTeknis == 2) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTeknis == 3) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
        <td>
        <?php if($kemampuanTeknis == 4) : ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?= base_url('assets/img/Components/Template/check.svg')?>">
        <?php endif; ?> 
        </td>
    </tr>
</table>
<br><br>
<table>
    <tr>
        <td>Catatan Tambahan:</td>
    </tr>
    <tr>
        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ullam officia natus exercitationem cupiditate dicta labore repellendus fugit eligendi inventore distinctio similique dignissimos, ea recusandae doloremque quibusdam! Earum, et tenetur!</td>
    </tr>
</table>
<br><br><br><br> 
<table>
    <tr>
        <td>Alamat Pemberi Rekomendasi</td>
        <td style="text-align: right;">Tandatangan Pemberi Rekomendasi</td>
    </tr>
    <tr>
        <td>Kampus Sekolah Vokasi IPB</td>
    </tr>
    <tr>
        <td>Jl. Kumbang No. 14, Cilibende</td>
    </tr>
    <tr>
        <td>Bogor 16151</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right;">NIP. <?= $nip; ?></td>
    </tr>
</table>

</html>