  <section id="nav">
      <?php if ($logged) {
              $profiltarget = "";
              switch ($role) {
                case 'ADMIN':
                  $KonselingTarget = "changeSubmenu('menuKonselor')";
                  break;
                
                case 'MAHASISWA':
                  $KonselingTarget = "checkThread()";
                  break;

                case 'KONSELOR':
                  $KonselingTarget = "getOwnedThreads()";
                  break;

                case 'SEKPRODI':
                  $KonselingTarget = "getOwnedThreads()";
                  break;    

                default:
                  $KonselingTarget = "alertNow('Error : ', 'Pastikan kamu seorang mahasiswa ya!')";
                  break;
              }
            } else {
              $KonselingTarget = ("goTo('account/signin')");
              $profiltarget = "goTo('account/signin')";
            }
      ?>

    <template>
      <transtition name="fade">
        <div  v-if="isLoading">
          <div class="overlay-dark"></div>
        </div>
      </transtition>

      <transition name="droptop">
        <div class="loading-handler text-center" v-if="isLoading">
          <span class="loading-handler-text">Memuat</span><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
      </transition>
    </template>

    <div class="topnav">
      <div v-on:click="sidenavs" class="topicon-left"><i class="fa fa-bars fa-lg"></i></div>
      <?php if ($logged) { ?>
        <transition name="topright">
          <div v-if="current_topright == 'default'" v-on:click="changeWindow('notifications')" class="topicon-right new"><i class="fa fa-bell fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'search'" class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'options'" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
        </transition>
      <?php } else { ?>     
        <transition name="topright">
          <a v-if="current_topright == 'default'" href="<?= base_url('account/signin') ?>" class="topicon-right"><i class="fa fa-user fa-lg"></i></a>
        </transition>   
      <transition name="topright">
          <div v-if="current_topright == 'search'" class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-if="current_topright == 'options'" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
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

    
        <div class="public-nav">
          <div v-on:click="changeMenu('konseling');" class="submenu" >HaloKonseling</div>
          <transition name="fade">
            <ul id="sub_dash-konseling" v-if="current_menu == 'konseling'">
              <li v-on:click="changeSubmenu('home')" class=" menu  "><a href="#"><i class="fa fa-home" aria-hidden="true"></i> - Home</a></li>
              <li v-on:click="<?= $KonselingTarget ?>" class=" menu"><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> - Ruang Konseling</a></li>
              <li v-on:click="changeSubmenu('blogs')" class=" menu"><a href="#"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> - Pojok Edukasi</a></li>
              <li v-on:click="changeSubmenu('events')" class=" menu"><a href="#"><i class="fa fa-hashtag" aria-hidden="true"></i> - Papan Events</a></li>
            </ul>
          </transition>
        </div>

        <div class="public-nav">
          <div v-on:click="changeMenu('beasiswa');" class="submenu" >Beasiswa</div>
          <transition name="fade">
            <ul id="sub_dash-beasiswa" v-if="current_menu == 'beasiswa'">
              <li v-on:click="changeSubmenu('beasiswa')" class="menu"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> - Home</a></li>
              <li class=" menu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> - Beasiswa Dibuka</a></li>
              <li class=" menu"><a href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i> - Pengajuan Saya</a></li>
            </ul>
          </transition>
        </div>

        <?php if ($role == 'ADMIN') { ?>
        <div class="admin-nav">
          <div v-on:click="changeMenu('admin');" class="submenu">Admin Tools</div>
          <transition name="fade">
            <ul id="sub_admin" v-if="current_menu == 'admin'">
              <li v-on:click="changeSubmenu('editblogs');" class=" menu"><a href="#"><i class="fa fa-archive" aria-hidden="true"></i> - Kelola Blogs</a></li>
              <li v-on:click="changeSubmenu('editevents')" class=" menu"><a href="#"><i class="fa fa-hashtag" aria-hidden="true"></i> - Kelola Events</a></li>
              <li v-on:click="sidenavs(); changeWindow('laporanform'); changeTitle('LAPORAN KONSELING', '')" class=" menu"><a href="#"><i class="fa fa-table" aria-hidden="true"></i> - Laporan Konseling</a></li>
              <li v-on:click="changeSubmenu('editevents')" class=" menu"><a href="#"><i class="fa fa-tasks" aria-hidden="true"></i> - Data Konselor</a></li>
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

    