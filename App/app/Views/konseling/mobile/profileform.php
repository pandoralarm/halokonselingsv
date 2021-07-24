

<section id="profileform">
  <transition name="state">
    <template>
      <div v-if="current_window == 'profileform'" class="window">

        <div class="bg-full">
          <div class="topnav forms">
            <div v-on:click="changeWindow('profileform');changeTitle('HALOKONSELINGSV', 'Kamu Tidak Sendiri Disini 🤗')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
            <div class="text">
              <div class="title">{{ current_title }}</div>
              <div class="subtitle">{{ current_subtitle }}</div>
            </div>
          </div>

          <transition name="state">
            <template>
              <div class="content" style="overflow-y: hidden;">

                <div class="requestform px-3">
                  <div class="title">
                    <span class="font-weight-bold"><?= $name ?></span> <br />
                    <small><small> {{ userid }} </small></small>
                  </div>

                  <label for="proditag">
                    <small class="help" style="left: 0;"><a href="#">Program Studi</a> </small>
                  </label>
                  <input disabled class="w-100 textform px-3 py-2" type="text" id="proditag" name="useridtag" value="<?= $prodi ?>">
                  
                  <label for="roletag">
                    <small class="help" style="left: 0;"><a href="#">Status Akun</a> </small>
                  </label>
                  <input disabled class="w-100 textform px-3 py-2" type="text" id="roletag" name="roletag" value="<?= $role ?>">
                  
                  <label for="emailtaga">
                    <small class="help" style="left: 0;"><a href="#">Email Notifikasi</a> </small>
                  </label>
                  <input disabled id="emailtextform" class="w-100 textform px-3 py-2" type="text" id="emailtaga" name="emailtaga" value="<?= $user ?>@apps.ipb.ac.id">
                  
                  <input id="emailtagb" type="checkbox" name="emailtagb" value="acceptnotify">
                  <label style="color: black; background-color: #fff;" class="checkbox-item " for="emailtagb">Terima notifikasi email</label>
                 
                </div>

                <div v-on:click=" updatenotifysettings(); changeWindow('profileform');changeTitle('HALOKONSELINGSV', 'Kamu Tidak Sendiri Disini 🤗')" class="requestform btn-hksv" style="line-height: 1.5; top: -12%;">Simpan</div>
                <a id="_report" href="#" style="display: none;">
              </div>
            </template>
          </transition>

        


        </div>
        
      </div>
    </template>
  </transition>
</section>

<script src="<?= base_url('assets/js/mobile/profileform.js') ?>" ></script>

