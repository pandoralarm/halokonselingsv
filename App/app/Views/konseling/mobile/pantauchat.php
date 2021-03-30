<section id="pantauchat">
  <transition name="state">
    <template>
      <div v-if="current_window == 'pantauchat'" class="window">
        <div class="topnav chatroom">
          <div v-on:click="changeWindow('pantauchat')" class="topicon-left"><i class="fa fa-chevron-left fa-lg"></i></div>
          <?php if ($role != 'MAHASISWA') {?>
            <div v-on:click="openOptions" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
          <?php } ?>
          
          <div class="text">
            <div class="title">Ruang Konseling</div>
            <div class="subtitle w-100"><small>Detail Sesi</small>  </div>
          </div>
        </div>

        <transition name="slideup">
          <div v-if="options" class="options">
            <div v-on:click="changeWindow('laporan')" class="end-session">Akhiri Sesi</div>
            <div v-on:click="changeWindow('tambahkonselor')" class="add-konselor">Tambahkan Konselor Kedalam Sesi</div>
          </div>
        </transition>
               

        <div id="messagebody" v-on:scroll="closeOptions" class="messages">

          <template v-for="(message, index) in messages" :key="message.index">
            <div :id="'msg'+message.id" :class="{'sender' : (message.sender == userid), 'recipient' : (message.sender != userid)}">
              <div class="name border-bottom pb-0"><small>{{ message.name }} : </small></div>
              <p class="message" style="white-space: pre-line;">{{ message.message }}</p>
              <div class="timestamp">{{ message.timestamp }}</div>
            </div>
          </template>

        
        </div>

        <div class="input">
            
        </div>


      </div>
    </template>
  </transition>


</section>

<script src="<?= base_url('assets/js/mobile/pantauchat.js') ?>" ></script>

