<section  id="perwahome">
  <transition name="state">
    <div v-if="current_menu == 'beasiswa' && current_submenu == 'home'" class="content">
      <template>

      <?php if ($logged) {
              $profiltarget = " nav.changeWindow('profileform');  profileform.notifycheck();";
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

        <div v-on:click="<?= $profiltarget ?>"  class="konseling-menu events shadow-sm text-center">
            <?php if (!$logged) { ?>

              <div class="text w-100">
                <span class="title">Halo, Anonymous!</span>
                <p class="subtitle">Tap disini untuk masuk. </p>
                
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
            <span class="title">Ajukan Surat Rekomendasi</span>
            <p class="subtitle">Disini kamu dapat mengajukan surat rekomendasi
                beasiswa untuk beasiswamu!
            </p>
          </div>
          <div class="banner"></div>
          <div class="">
            <u>  <small> Klik Disini! </small>  </u>
          </div>
        </div>

        <div v-on:click="changeSubmenu('beasiswa'); changeMenu('beasiswa');" class="konseling-menu blogs shadow-sm border">
          <div class="text">
          <span class="title">Informasi Beasiswa</span>
            <p class="subtitle">Jangan terlewat informasi beasiswa terbaru 
              yang bisa kamu ikuti dari sini ya!
            </p>
          </div>
          <div class="banner"></div>
          <div class="">
            <u>  <small> Klik Disini! </small>  </u>
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


<script src="<?= base_url('assets/js/mobile/perwahome.js') ?>" ></script>

