  <section id="nav">
  
      <?php if ($logged) {
              $profiltarget = " changeWindow('profileform');";
              switch ($role) {
                case 'ADMIN':
                  $KonselingTarget = "home.changeSubmenu('menuKonselor'); ";
                  break;
                
                case 'MAHASISWA':
                  $KonselingTarget = "home.checkThread()";
                  break;

                case 'KONSELOR':
                  $KonselingTarget = "home.getOwnedThreads(); sidenavs();";
                  break;

                case 'SEKPRODI':
                  $KonselingTarget = "home.getOwnedThreads()";
                  break;    

                default:
                  $KonselingTarget = "home.alertNow('Error : ', 'Pastikan kamu seorang mahasiswa ya!')";
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
          <div v-if="current_topright == 'default'" v-on:click="changeWindow('notifications')" class="topicon-right"><!-- <i class="fa fa-bell fa-lg"></i> --></div>
        </transition>
        <transition name="topright">
          <div v-on:click="search();" v-if="current_topright == 'search'" class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-on:click="options();" v-if="current_topright == 'options'" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
        </transition>
      <?php } else { ?>     
        <transition name="topright">
          <a v-if="current_topright == 'default'" href="<?= base_url('account/signin') ?>" class="topicon-right"><i class="fa fa-user fa-lg"></i></a>
        </transition>   
      <transition name="topright">
          <div v-on:click="search();" v-if="current_topright == 'search'" class="topicon-right"><i class="fa fa-search fa-lg"></i></div>
        </transition>
        <transition name="topright">
          <div v-on:click="options();" v-if="current_topright == 'options'" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
        </transition>
      <?php } ?>

      <div class="text">
        <div class="title">{{ current_title }}</div>
        <div class="subtitle">{{ current_subtitle }}</div>
      </div>
    </div>


    <!-- OPTIONS BAR -->     
    <transition name="slideup">
      <div v-if="navoptions && current_topright == 'options'" class="options" v-on:click.self="options();">
        <div v-if="current_submenu == 'blogDetail' || current_submenu == 'blogDetailYt'">
          <div v-on:click="clipboard()" class="share-object">Share</div>
        </div>
        <div v-if="current_submenu == 'editblogDetail' || current_submenu == 'editblogDetailYt' " v-on:click.self="options();">
          <div v-on:click="editblogs.edititem()" class="end-session">Edit Item</div>
          <div v-on:click="deleteitem()" class="add-konselor">Delete Item</div>
        </div>
      </div>
    </transition> 

    <transition name="slideup" >
      <div v-if="navsearch && current_topright == 'search'" class="text" v-on:click.self="search();">
        <input v-if="current_submenu == 'blogs'" type="text" v-model="blogsearchquery" v-on:input="blogs.findarticles(blogsearchquery)" class="blogs searchbar"></input>
        <input v-if="current_submenu == 'editblogs'" type="text" v-model="editblogsearchquery" v-on:input="editblogs.findarticles(editblogsearchquery)" class="blogs searchbar"></input>
      </div>
    </transition> 


      
    <!-- CONFIRMATION DIALOG -->
    <transition name="fade">
      <div  v-if="confirmdeletion" class="dialog">
        <div class="confirm">

          <div v-if="current_submenu == 'editblogDetail' || current_submenu == 'editblogDetailYt'">
            <div class="text-dialog">
              Yakin ingin menghapus artikel ini?
            </div>
            <div class="prompt">
              <div v-on:click="editblogs.deleteselected();" class="btn-hksv btn-confirm">Ya</div>
              <div v-on:click="closeDialog();" class="btn-hksv btn-dismiss">Batal</div>
            </div>
          </div>

        </div>
      </div>
    </transition>

    <!-- DARK OVERLAY || FOR USAGE JUST ADD NEEDED STATE ON IF -->
    <transtition name="fade">
      <div  v-if="confirmdeletion  || navoptions">
        <div v-on:click="closeDialog(); options();" class="overlay-dark"></div>
      </div>
    </transtition>


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
              <a class="btn-hksv w-100" v-on:click="sidenavs(); changeWindow('profileform'); profileform.notifycheck();">Profil</a>
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
              <li v-on:click="changeSubmenu('home')" class="menu"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> - Home</a></li>
              <li v-on:click="<?= $KonselingTarget ?>" class="menu"><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> - Ruang Konseling</a></li>
              <li v-on:click="changeSubmenu('blogs'); blogs.collapse(); changeSubmenu('blogs'); blogs.getarticles()" class="menu"><a href="#"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> - Pojok Edukasi</a></li>
              <li v-on:click="changeSubmenu('events')" class="menu"><a href="#"><i class="fa fa-hashtag" aria-hidden="true"></i> - Papan Events</a></li>
            </ul>
          </transition>
        </div>

        <div class="public-nav">
          <div v-on:click="changeMenu('beasiswa');" class="submenu" >Beasiswa</div>
          <transition name="fade">
            <ul id="sub_dash-beasiswa" v-if="current_menu == 'beasiswa'">
              <li v-on:click="changeSubmenu('home')" class="menu"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> - Home</a></li>
              <li class=" menu"><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> - Beasiswa Dibuka</a></li>
              <li class=" menu"><a href="#"><i class="fa fa-sticky-note" aria-hidden="true"></i> - Pengajuan Saya</a></li>
            </ul>
          </transition>
        </div>

        <?php if ($role == 'ADMIN' || $role == 'KONSELOR') { ?>
        <div class="admin-nav">
          <div v-on:click="changeMenu('admin');" class="submenu">Quick Tools</div>
          <transition name="fade">
            <ul id="sub_admin" v-if="current_menu == 'admin'">
              <?php if ($role == 'ADMIN') { ?>
                <li v-on:click="sidenavs(); changeWindow('managestaff'); changeTitle('DATA KONSELOR', '')" class=" menu"><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> - Kunjungi Dasbor</a></li>
                <li v-on:click="sidenavs(); changeWindow('laporanform'); changeTitle('LAPORAN KONSELING', '')" class=" menu"><a href="#"><i class="fa fa-table" aria-hidden="true"></i> - Laporan Konseling</a></li>
              <?php } ?> 
              <li v-on:click="changeSubmenu('editblogs'); editblogs.collapse(); changeSubmenu('editblogs'); editblogs.getarticles()" class=" menu"><a href="#"><i class="fa fa-archive" aria-hidden="true"></i> - Kelola Blogs</a></li>
              <li v-on:click="changeSubmenu('editevents')" class=" menu"><a href="#"><i class="fa fa-hashtag" aria-hidden="true"></i> - Kelola Events</a></li>

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

    <!-- Edit dialog -->
    <transition name="fade">
    <div v-if="editdialog" class="dialog">
      <div class="confirm">
        <div class="prompt">
          <div v-on:click="nav.changeWindow('laporanform'); nav.changeTitle('LAPORAN KONSELING', '')" class="btn-hksv btn-dismiss">Edit</div>
          <div v-on:click="confirmDialog(false)" class="btn-hksv btn-confirm">Hapus</div>
        </div>
      </div>
    </div>
  </transition>

  </section>

  <script src="<?= base_url('assets/js/mobile/nav.js') ?>" ></script>

    