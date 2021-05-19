<section id="laporanform">
  <transition name="state">
    <template>
      <div v-if="current_window == 'laporanform'" class="window">

        <div class="bg-full">
          <div class="topnav forms">
            <div v-on:click="changeWindow('laporanform');changeTitle('HALOKONSELINGSV', 'Kamu Tidak Sendiri Disini 🤗')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
            <div class="text">
              <div class="title">{{ current_title }}</div>
              <div class="subtitle">{{ current_subtitle }}</div>
            </div>
          </div>

          <div class="content" style="overflow-y: hidden;">

            <div class="requestform px-3">
              <div class="title">
                <span class="font-weight-bold">Ruang Konseling</span> <br />
                <small><small> Sampaikan masalahmu </small></small>
              </div>

              <label for="startdate">
                <small class="help" style="left: 0;"><a href="#">Tanggal Awal</a> </small>
              </label>
              <input class="w-100 small px-3 py-2" type="date" id="startdate" name="startdate" v-on:change="setMinDate()">
              <div class="help"><br /></div>
              <label for="enddate">
                <small class="help" style="left: 0;"><a href="#">Tanggal Akhir</a> </small>
              </label>
              <input class="w-100 small px-3 py-2" type="date" id="enddate" name="enddate">
             </div>

            <div v-on:click="download();" class="requestform btn-hksv" style="line-height: 1.5; top: -12%;">Unduh</div>
            <a id="_report" href="#" style="display: none;">
          </div>

        </div>
        
      </div>
    </template>
  </transition>
</section>

<script src="<?= base_url('assets/js/mobile/laporanform.js') ?>" ></script>

