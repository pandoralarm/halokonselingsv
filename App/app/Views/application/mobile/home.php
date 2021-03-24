<section  id="home">
  <transition name="state">
    <div v-if="current_submenu == 'home'" class="content">
      <template>

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

        <div v-on:click="<?= $KonselingTarget ?>" class="konseling-menu ruang-konseling shadow">
          <div class="text">
            <span class="title">Ruang Konseling</span>
            <p class="subtitle">Kamu akan dibantu oleh para 
              konselor hebat untuk mengatasi setiap masalah 
              yang kamu hadapi, rahasiamu dijamin terjaga.</p>
          </div>
          <div class="banner"></div>
          <div class="btn-hksv mt-4">
            Cerita Disini
          </div>
        </div>
        <div v-on:click="changeSubmenu('blogs')" class="konseling-menu blogs shadow">
          <div class="text">
            <span class="title">Konseling Blogs</span>
            <p class="subtitle">Kamu bisa baca dan bagikan 
            informasi bermanfaat yang telah disusun oleh para 
            konselor ahli.</p>
          </div>
          <div class="banner"></div>
          <div class="btn-hksv">
            Baca Disini
          </div>
        </div>
        <div v-on:click="changeSubmenu('events')"  class="konseling-menu events shadow">
          <div class="text">
            <span class="title">Konseling Events</span>
            <p class="subtitle">  </p>
            
            <div class="events-today">
              <span class="description">Events hari ini : </span>
              <span class="number">0</span>
            </div>
          </div>
          <div class="banner"></div>
          <div class="btn-hksv">
            Lihat Semua
          </div>
        </div>
      </template>
    </div>
  </transition>


  <transition name="state">
    <div v-if="current_submenu == 'beasiswa'" class="content">
      <template>
        <div class="konseling-menu beasiswa shadow">
          <div class="info">Belum Tersedia</div>
        </div>
      </template>
    </div>
  </transition>

  <transition name="state">
    <div v-if="current_submenu == 'admin'" class="content">
      <template>

        <div class="admin-tools-menu kelola-blogs shadow">
          <div class="text">Kelola Blogs</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu kelola-events shadow">
          <div class="text">Kelola Events</div>
          <div  class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu laporan shadow">
          <div class="text">Laporan</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>

        <div class="admin-tools-menu data-konselor shadow">
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
      <div class="fixed-bottom m-0 alert alert-secondary alert-dismissible fade show" role="alert">
        <strong>{{ error.strong }}</strong>&ensp;<small>{{ error.message }}</small>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </template>
  </transition>


</section>


<script src="<?= base_url('assets/js/mobile/home.js') ?>" ></script>

