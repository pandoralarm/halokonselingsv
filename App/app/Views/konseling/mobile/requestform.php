<section id="requestform">
  <transition name="state">
    <template>
      <div v-if="current_window == 'requestform'" class="window">

        <div class="bg-full">
          <div class="topnav forms">
            <div v-on:click="changeWindow('requestform')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
            <div class="text">
              <div class="title">{{ current_title }}</div>
              <div class="subtitle">{{ current_subtitle }}</div>
            </div>
          </div>

          <div class="content">

            <div class="requestform">
              <div class="title">
                <span class="font-weight-bold">Ruang Konseling</span> <br />
                <small><small> Sampaikan masalahmu </small></small>
              </div>

              <textarea id="requestmessage" class="requestform-input"></textarea>
              <div>
                </div><small class="help"><small> Privasi ceritamu dijamin aman, <a href="#">selengkapnya disini.</a> </small></small>
              </div>
              
              <div v-on:click="makeRequest" class="requestform btn-hksv" style="line-height: 1.5;">KIRIM</div>
            </div>

          </div>
        </div>
        
      </div>
    </template>
  </transition>
</section>

<script src="<?= base_url('assets/js/mobile/requestform.js') ?>" ></script>

