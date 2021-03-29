<section id="home">
  <div v-if="current_menu == 'beasiswa' && current_submenu == 'home'" class="content">
    <img src="<?php echo base_url('assets/img/Components/Home/Desktop/banner_beasiswa.svg'); ?>" alt="">
    <h1>REKOMENDASI BEASISWA</h1>
    <h2>SEKOLAH VOKASI</h2>
    <?php if ($role == 'KONSELOR' || $role == 'SEKPRODI') { ?>
      <button v-on:click="changeSubmenu('menusekprodi')">Mulai</button>
    <?php } else { ?>
      <button v-on:click="mulai(<?= $logged; ?>)">Mulai</button>
    <?php } ?>
  </div>
</section>

<script src="<?= base_url('assets/js/desktop/home.js') ?>"></script>