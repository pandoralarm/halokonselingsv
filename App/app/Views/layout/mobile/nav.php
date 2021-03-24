  <section id="nav">


    <div class="topnav">
      <div v-on:click="sidenavs" class="topicon-left"><i class="fa fa-bars fa-lg"></i></div>
      <?php if ($logged) { ?>
        <transition name="topright">
          <div v-if="current_topright == 'default'" v-on:click="sidenavs" class="topicon-right new"><i class="fa fa-bell fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'search'" href="<?= base_url('account/signin') ?>"  class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'options'" href="<?= base_url('account/signin') ?>"  class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
        </transition>
      <?php } else { ?>     
        <transition name="topright">
          <div v-if="current_topright == 'default'" href="<?= base_url('account/signin') ?>"  class="topicon-right"><i class="fa fa-user fa-lg"></i></div>
        </transition>   
      <transition name="topright">
          <div v-if="current_topright == 'search'" href="<?= base_url('account/signin') ?>"  class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'options'" href="<?= base_url('account/signin') ?>"  class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
        </transition>
      <?php } ?>

      <div class="text">
      

        <div class="title">{{ current_title }}</div>
        <div class="subtitle">{{ current_subtitle }}</div>
      </div>
    </div>

    <div class="bg-top"></div>
    <transition name="slider">
      <nav v-if="sidenav" id="side-nav" class="side-nav"> 
        <div v-on:click.self="sidenavs" class="overlay"></div>

        <div class="header">
          <?php if ($logged) { ?>
            <div class="profile">
              <div><small>Selamat Datang,</small></div>
              <div class="name"><?= $name ?></div>
              <div><small><?= $prodi ?></small></div>
              <div class="role"><small><?= $role ?></small></div>
              <br />
              <a class="btn-hksv w-100" href="<?= base_url('account/signin') ?>">Profil</a>
            </div>
          <?php } else { ?>
            <a href="<?= base_url('account/signin') ?>" class="btn-signin d-block text-white">
              Masuk Disini
            </a>
          <?php } ?>
        </div>

        <?php if ($logged) {
              if ($role == "ADMIN") {
                $KonselingTarget = "changeSubmenu('menuKonselor')";
              } elseif ($role == 'MAHASISWA' || 'KONSELOR' || 'SEKPRODI') {
                $KonselingTarget = "checkThread()";
              } else {
                $KonselingTarget = "alertNow('Error : ', 'Pastikan kamu seorang mahasiswa ya!')";
              }
            } else {
              $KonselingTarget = ("goTo('account/signin')");
            }
      ?>
        <div class="public-nav">
          <div v-on:click="changeMenu('konseling'); changeSubmenu('home');" class="submenu" >HaloKonseling</div>
          <transition name="fade">
            <ul id="sub_dash" v-if="current_menu == 'konseling'">
              <li v-on:click="changeSubmenu('home')" class=" menu  "><a href="#">Home</a></li>
              <li v-on:click="<?= $KonselingTarget ?>" class=" menu"><a href="#">Ruang Konseling</a></li>
              <li v-on:click="changeSubmenu('blogs')" class=" menu"><a href="#">Blogs</a></li>
              <li v-on:click="changeSubmenu('events')" class=" menu"><a href="#">Events</a></li>
            </ul>
          </transition>
        </div>

        <div class="public-nav">
          <div v-on:click="changeMenu('beasiswa'); changeSubmenu('beasiswa');" class="submenu" >Beasiswa</div>
          <transition name="fade">
            <ul id="sub_dash" v-if="current_menu == 'beasiswa'">
              <li v-on:click="changeSubmenu('beasiswa')" class="menu"><a href="#">Home</a></li>
              <li class=" menu"><a href="#">Beasiswa Dibuka</a></li>
              <li class=" menu"><a href="#">Pengajuan Rekomendasi</a></li>
            </ul>
          </transition>
        </div>

        <?php if ($role == 'ADMIN') { ?>
        <div class="admin-nav">
          <div v-on:click="changeMenu('admin'); changeSubmenu('admin')" class="submenu">Admin Tools</div>
          <transition name="fade">
            <ul id="sub_admin" v-if="current_submenu == 'admin'">
              <li class=" menu"><a href="#">Kelola Blogs</a></li>
              <li class=" menu"><a href="#">Kelola Events</a></li>
              <li class=" menu"><a href="#">Laporan Konseling</a></li>
              <li class=" menu"><a href="#">Data Konselor</a></li>
            </ul>
          </transition>
        </div>
        <?php } ?>
        <div class="signout">
          <?php if ($logged) { ?>
            <a href="<?= base_url('account/signin/signout') ?>"><u>Logout</u></a>
          <?php } ?>
        </div>
      </nav>    

    </transition>
  </section>

  <script src="<?= base_url('assets/js/mobile/nav.js') ?>" ></script>

    