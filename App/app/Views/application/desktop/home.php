<section id="home">
  <div v-if="current_menu == 'beasiswa' && current_submenu == 'home'" class="content">
    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
    <h1>REKOMENDASI BEASISWA</h1>
    <h2>SEKOLAH VOKASI</h2>
    <button v-on:click="changeSubmenu('menu')">Mulai</button>
  </div>
</section>

<script src="<?= base_url('assets/js/desktop/home.js') ?>"></script>