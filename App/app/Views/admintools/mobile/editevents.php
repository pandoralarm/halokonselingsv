<section  id="editevents">
  <transition name="state"> 
    <div v-if="current_submenu == 'editevents'  || current_submenu == 'editeventsfocus'" class="content">

      <template>
        <div id="ide1" v-if="isShown('ide1')" class="events-base shadow editevent-item" v-on:click="focused('ide1')">
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

      <template>
        <div id="ide2" v-if="isShown('ide2')" class="events-base shadow editevent-item" v-on:click="focused('ide2')">
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

                    </div>
                    
                    <div class="datetime">
                    Sabtu, 20 FEB ‘21 | 08.00 – 15.00 WIB
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </template>

      <div v-on:click="nav.changeWindow('eventform'); nav.changeTitle('Papan Events', ''); " class="btn-add text-center">
        <i class="fa fa-plus fa-lg" aria-hidden="true" style="position: relative; top: 30%"></i>
      </div>   
      
    </div>
  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/editevents.js') ?>" ></script>

