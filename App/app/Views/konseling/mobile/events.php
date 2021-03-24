<section  id="events">
  <transition name="state">
    <div v-if="current_submenu == 'events'" class="content">

      <template>
        <div v-if="isShown('id')" class="events-base shadow">
            <div class="events-content-header">
              <img class="header-content" src="https://jadwalevent.web.id/wp-content/uploads/2020/09/timeline_20200917_223808-768x1095.jpg">
              <div class="timestamp">
                Selasa, 12 Maret 2021
              </div>
            </div>
            <div class="events-content">
                <div class="title">[AQUAFEST 2020] Tema : Sustainable Aquaculture for Everyone” </div>
                <div class="text">
                <small>Details : </small>
                  <div class="events-detail">
                    <div class="place">
                      Zoom meeting, daring, dan live streaming
                    </div>
                    
                    <div class="datetime">
                    Sabtu, 20 FEB ‘21 | 08.00 – 15.00 WIB
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </template>
      
    </div>
  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/events.js') ?>" ></script>

