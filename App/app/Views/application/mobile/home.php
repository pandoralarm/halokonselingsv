<section  id="home">
  <transition name="state">
    <div v-if="current_submenu == 'home'" class="content">
      <template>

      <?php if ($logged) {
              $profiltarget = "";
              if ($role == "ADMIN") {
                $KonselingTarget = "changeSubmenu('menuKonselor')";
              } elseif ($role == 'MAHASISWA' || 'KONSELOR' || 'SEKPRODI') {
                $KonselingTarget = "checkThread()";
              } else {
                $KonselingTarget = "alertNow('Error : ', 'Pastikan kamu seorang mahasiswa ya!')";
              }
            } else {
              $KonselingTarget = ("goTo('account/signin')");
              $profiltarget = "goTo('account/signin')";
            }
      ?>

        <div v-on:click="<?= $profiltarget ?>"  class="konseling-menu events shadow-sm text-center">
            <?php if (!$logged) { ?>

              <div class="text w-100">
                <span class="title">Halo, Anonymous!</span>
                <p class="subtitle">Tap disini untuk masuk.</p>
                
              </div>

            <?php } else { ?>
            
              <div class="text w-100">
                <span class="title">Halo, <?= $name ?></span>
                <p class="subtitle"> <u> Buka profil </u> </p>
                
              </div>

            <?php } ?>

        </div>

        <div v-on:click="<?= $KonselingTarget ?>" class="konseling-menu ruang-konseling shadow-sm border">
          <div class="text">
            <span class="title">Ruang Konseling</span>
            <p class="subtitle">Kamu akan dibantu oleh para 
              konselor hebat untuk mengatasi setiap masalah 
              yang kamu hadapi, rahasiamu dijamin terjaga.</p>
          </div>
          <div class="banner"></div>
          <div class="">
            <u>  <small> Klik Disini! </small>  </u>
          </div>
        </div>

        <div v-on:click="changeSubmenu('blogs')" class="konseling-menu blogs shadow-sm border">
          <div class="text">
            <span class="title">Permohonan Beasiswa</span>
            <p class="subtitle">Kamu bisa mencari informasi beasiswa
            terkini dan ajukan surat rekomendasi beasiswa!</p>
          </div>
          <div class="banner"></div>
          <div class="">
            <u>  <small> Klik Disini! </small>  </u>
          </div>
        </div>


      </template>
    </div>
  </transition>


  <transition name="state">
    <div v-if="current_submenu == 'beasiswa'" class="content">
      <template>
        <div class="konseling-menu beasiswa shadow-sm">
          <div class="info">Belum Tersedia</div>
        </div>
      </template>
    </div>
  </transition>

  <transition name="state">
    <div v-if="current_submenu == 'admin'" class="content">
      <template>

        <div class="admin-tools-menu kelola-blogs shadow-sm">
          <div class="text">Kelola Blogs</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu kelola-events shadow-sm">
          <div class="text">Kelola Events</div>
          <div  class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu laporan shadow-sm">
          <div class="text">Laporan</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu data-konselor shadow-sm">
          <div class="text">Data Konselor</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>
       
      </template>
    </div>
  </transition>

  <transition name="fade">
    <template v-if="error.alert">
      <div class="fixed-bottom m-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ error.strong }}</strong>&ensp;<small>{{ error.message }}</small>
      </div>
    </template>
  </transition>


</section>


<script src="<?= base_url('assets/js/mobile/home.js') ?>" ></script>

