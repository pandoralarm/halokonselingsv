<section id="notifications">
  <transition name="droptop">
    <template>
      <div v-if="current_window == 'notifications'" class="window notifications" style="overflow-y: scroll;">

        <div class="content">
        
            <div  class="konseling-menu events shadow-sm text-center">

            <div class="text w-100">
              
              <p class="subtitle">Tap disini untuk masuk.</p>
            </div>

          </div>

          <div  class="konseling-menu events shadow-sm text-center">

            <div class="text w-100">
              
              <p class="subtitle">Tap disini untuk masuk.</p>
            </div>

          </div>

          <div  class="konseling-menu events shadow-sm text-center">

            <div class="text w-100">
              
              <p class="subtitle">Tap disini untuk masuk.</p>
            </div>

          </div>

          <div  class="konseling-menu events shadow-sm text-center">

            <div class="text w-100">
              
              <p class="subtitle">Tap disini untuk masuk.</p>
            </div>

          </div>

        </div>


        <div v-on:click="changeWindow('notifications')" class="btn-collapse text-center my-2 text-white">
          <i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i>
          <p class="subtitle m-0 text-black">Tutup Notifikasi</p>
        </div>


      </div>
    </template>
  </transition>
</section>

<script src="<?= base_url('assets/js/mobile/notifications.js') ?>" ></script>

