<section  id="managestaff">
  <transition name="state">
      <div v-if="current_window == 'managestaff'" class="window position-fixed">
        <div class="bg-full">
          <div class="topnav forms">
            <div v-on:click="changeWindow('managestaff')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
            <div class="text">
              <input type="text" v-model="dosenquery" v-on:input="findKonselor()" class="searchbar"></input>
              <div class="title"></div>
              <div class="subtitle mt-1" style="width: 110%; ">{{ current_subtitle }}</div>
            </div>
          </div>

          <div class="content findkonselor">
          
            <template v-for="konselor in dosensearch" :key="konselor.NIP">
              <div v-on:click="selectKonselor(konselor.NIP, konselor.Nama)" class="admin-tools-menu kelola-blogs shadow">
                <div class="text w-75" style="margin: 0; text-align: center;">
                {{ konselor.Nama }}
                <br />
                <select class="w-100 small py-2" style="border-radius: 10px;" name="headeropt" id="headeropt">
                  <option selected value="konselor">Konselor</option>
                  <option value="admin">Admin</option>
                  <option value="none">None</option>
                </select>
                </div>
             </div>
            </template>

            <transition name="slidedown">
              <template>
                <div v-if="enableconfirm" class="dialog-confirm">
                  <div v-on:click="addToSession"  class="btn-hksv">Tambahkan</div>
                </div>
              </template>
            </transition>

          </div>

        </div>
      </div>
    </transition>
</section>


<script src="<?= base_url('assets/js/mobile/managestaff.js') ?>" ></script>

