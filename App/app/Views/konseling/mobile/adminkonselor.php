<section id="adminkonselor">

  <!-- MAIN ADMIN KONSELOR MENU -->
  <transition name="state">
    <div v-if="current_submenu == 'menuKonselor'" class="content">
      <template>

        <div v-on:click="checkThread()" class="admin-tools-menu kelola-blogs shadow-sm border text-ce">
          <div class="text">Chat Konseli</div>
        </div>

        <div v-on:click="getOpenThread();" class="admin-tools-menu kelola-events shadow-sm border">
          <div class="text">Pantau Sesi Konseling</div>

        </div>

        <div v-on:click="getOpenRequest();" class="admin-tools-menu laporan shadow-sm border">
          <div class="text">Permintaan Konseling</div>
 
        </div>
       
      </template>
    </div>
  </transition>

  <!-- LIST OF ALL ACTIVE COUNSLING SESSIONS -->
  <transition name="state">
    <div v-if="current_submenu == 'pantauKonseling'" class="content">
      <template>
        <div v-if="threads.length == 0" class="admin-tools-menu kelola-blogs shadow">
          <div class="text w-100 text-center"><small> Tidak ada sesi konseling berlangsung</small></div>
        </div>
      </template> 
      <template v-for="thread in threads" :key="thread.ThreadID">

        <div class="admin-tools-menu kelola-blogs shadow">
          <div v-on:click="openSpecificThread(thread.ThreadKey)" class="text"><small>{{ thread.MahasiswaNama }}</small></div>
 
        </div>
       
      </template>
    </div>
  </transition>
  
  <!-- LIST OF OPEN COUNSELING REQUESTS -->
  <transition name="state">
    <div v-if="current_submenu == 'requestKonseling'" class="content">
      <template>
        <div v-if="requests.length == 0" class="admin-tools-menu kelola-blogs shadow">
          <div class="text w-100 text-center"><small> Tidak ada permintaan konseling</small></div>
        </div>
      </template> 
      <template v-for="req in requests" :key="req.RequestID">

        <div v-on:click="openDetail(req.MahasiswaNama, req.MahasiswaNIM, req.RequestDetail, req.RequestID)" class="admin-tools-menu kelola-blogs request shadow-sm border">
          <div class="text text-left" style="line-height: 3;">{{ req.MahasiswaNama }}</div>
          <div class="btn-hksv">
            Buka
          </div>
        </div>

        <transition name="state">
          <div v-if="current_window == 'requestdetail'" class="window position-fixed">
            <div class="bg-full">
              <div class="topnav forms">
                <div v-on:click="changeWindow('requestdetail')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
                <div class="text">
                  <div class="title" style="width: 110%; margin-left: -10%;">Permintaan Konseling</div>
                  <div class="subtitle" ></div>
                </div>
              </div>

              <div class="content">

                <div class="requestform">
                  <div class="title">
                    <span class="font-weight-bold">{{ requestdetail.nama }}</span> <br />
                    <small><small> {{ requestdetail.nim }} </small></small>
                  </div>

                  <div id="requestmessage" class="px-4 py-2" style="height: 50vh; overflow-y: scroll; white-space: pre-line;">{{ requestdetail.message }}</div>
                  <div  v-on:click="changeWindow('pilihkonselor'); store.commit('changeSubtitle', 'Cari dan pilih minimum 1 konselor')" class="requestform btn-hksv" style="line-height: 2;">NEXT</div>
                </div>

              </div>
            </div>
          </div>
        </transition>

        <transition name="state">
          <div v-if="current_window == 'pilihkonselor'" class="window">
            <div class="bg-full">
              <div class="topnav forms">
                <div v-on:click="changeWindow('requestdetail')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
                <div class="text">
                  <input type="text" v-model="dosenquery" v-on:input="findKonselor()" class="searchbar"></input>
                  <div class="subtitle mt-1" style="width: 110%; position: absolute;">{{ current_subtitle }}</div>
                </div>
              </div>

              <div class="content findkonselor">
              
                <template v-for="konselor in dosensearch" :key="konselor.NIP">
                  <div v-on:click="selectKonselor(konselor.NIP, konselor.Nama)" style="min-height: 75px; max-height: 25%;" class="admin-tools-menu kelola-blogs shadow">
                    <div class="text w-75 text-left" style="margin: 0; line-height: 3; word-wrap: break-word; "><small>{{ konselor.Nama }}</small></div>
                    <input type="checkbox" class="d-none" :id="konselor.NIP" :checked="selectedKonselor(konselor.NIP)" autocomplete="off" />
                    <label v-on:click="selectKonselor(konselor.NIP, konselor.Nama)" :for="konselor.NIP" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
                  </div>
                </template>

                <transition name="slidedown">
                  <template>
                    <div v-if="enableconfirm" class="dialog-confirm">
                      <div v-on:click="changeWindow('confirmdialog')" class="btn-hksv">Konfirmasi</div>
                    </div>
                  </template>
                </transition>

              </div>

            </div>
          </div>
        </transition>

        <transition name="state">
          <div v-if="current_window == 'confirmdialog'" class="window position-fixed">
            <div class="bg-full">
              <div class="topnav forms">
                <div v-on:click="changeWindow('pilihkonselor')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
                <div class="text">
                  <div class="title">Konfirmasi Sesi</div>
                  <div class="subtitle mt-1" style="width: 80vw; margin-left: -25%; ">Harap periksa kembali seluruh informasi.</div>
                </div>
              </div>
              <div class="content" style="height: 75%; top: 0;">

                <div class="requestform" style="height: 80%;">
                  <div class="title">
                    <span class="font-weight-bold">{{ requestdetail.nama }}</span> <br />
                    <small><small> {{ requestdetail.nim }} </small></small>
                  </div>

                  <div class="px-4 py-2" style="height: 55%; overflow-y: scroll; white-space: pre-line; word-wrap: break-word;">
                    List Konselor :
                    <div v-for="(nama, index) in konselornamechecked">
                    {{ index+1 }}. {{ nama }}
                    </div>
                  </div>
                  <div  v-on:click="confirmSession(requestdetail.nama, requestdetail.nim, requestdetail.reqid);getOpenRequest();" class="requestform btn-hksv mt-5" style="line-height: 2;">NEXT</div>
                </div>

              </div>

            </div>
          </div>
        </transition>
       
      </template>
    </div>
  </transition>

  <!-- INDIVIDUAL ALERT FOR ADMINKONSELOR -->
  <transition name="fade">
    <template v-if="error.alert">
      <div class="fixed-bottom m-0 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ error.strong }}</strong>&ensp;<small>{{ error.message }}</small>
      </div>
    </template>
  </transition>


  <transition name="state">
    <template>
      
    </template>
  </transition>

</section>

<script src="<?= base_url('assets/js/mobile/adminkonselor.js') ?>" ></script>