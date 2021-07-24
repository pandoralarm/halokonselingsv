<section id="chatroom">

  <!-- MAIN CHATROOM WINDOW -->
  <transition name="state">
    <template>
      <div v-if="current_window == 'chatroom'" class="window">
        <div class="topnav chatroom">
          <div v-on:click="changeWindow('chatroom')" class="topicon-left"><i class="fa fa-chevron-left fa-lg"></i></div>
          <?php if ($role != 'MAHASISWA') {?>
            <div v-on:click="openOptions" class="topicon-right"><i class="fa fa-ellipsis-v fa-lg"></i></div>
          <?php } ?>
          
          <div v-on:click="openDetail();" class="text">
            <div>
              <div class="title"><small>Ruang Konseling</small></div>
              <div class="subtitle w-100"><small>Detail Sesi</small></div>
            </div>
          </div>
        </div>

        <!-- OPTIONS BAR -->
        <transition name="slideup">
          <div v-if="options" class="options">
            <div v-on:click="confirmDialog(true)" class="end-session">Akhiri Sesi</div>
            <?php if ($role == 'ADMIN'){ ?>
              <div v-on:click="changeWindow('tambahkonselor')" class="add-konselor">Tambahkan Konselor Kedalam Sesi</div>
            <?php } else { ?>
              <div v-on:click="changeWindow('tambahkonselor')" class="add-konselor">Ajukan Penambahan Konselor/Pihak Lain</div>
            <?php } ?>
          </div>
        </transition> 
        
        <!-- MESSAGES BODY -->
        <div id="messagebody" v-on:scroll="closeOptions" class="messages">
          
          <div class="mt-4"></div>
          <div class="text-center text-white my-2"><small><small>--- Lihat detail sesi konseling pada opsi diatas ---</small></small></div>


          <template v-for="(message, index) in messages" :key="message.index">
            <div :id="'msg'+message.id" :class="{'sender' : (message.sender == userid), 'recipient' : (message.sender != userid)}">
              <div id="nametag">
                <div v-if="index == 0" class="name border-bottom pb-0 "><small>{{ message.name }} </small>: </div>
                <div v-if="index != 0 && message.name != messages[index-1].name" class="name border-bottom pb-0 mb-3"><small>{{ message.name }} </small>: </div>
              </div>

              <div v-if="message.messagetype == 'text'">
                <p class="message mt-2" style="white-space: pre-line;">{{ message.message }}</p> 
              </div>
                            
              <div v-else-if="message.messagetype == 'image'">
                <p class="message text-center" ><img  v-on:click="imagefocus(message.message)" class="image" :src="message.message" alt="" style="object-fit: cover; width: 65vw;"></p>
              </div>

              <div v-else-if="message.messagetype == 'audio'">
              <script>
                  console.log('{{message.index}}');
                  var chatroom.audios['{{message.index}}'] = new Audio(message.message);
              </script>
                <audio class="text-white" controls :src="message.message" style="width: 65vw;" controlsList="nofullscreen nodownload noremoteplayback"></audio>
              </div>

              <div class="timestamp"><small>{{ message.timestamp }}</small></div>
            </div>
          </template>


        </div>

        <!-- INPUT BAR -->
        <div class="input">
          <textarea v-model="messageinput" id="sendmessage" class="chat-text"></textarea>
          <label for=imageAttachment>
            <div class="btn-attach"><i class="fa fa-paperclip fa-lg"></i></div>
          </label>
          <input onchange="chatroom.imagePreview(this)" class="hide" id="imageAttachment" type="file" accept="image/*;"  capture="camera"/>
          <input oninput="chatroom.audioPreview(this)" id="audioAttachment" class="hide" type="file" accept="audio/*" capture>
          <transition name="flip">
            <div v-if="enablerecord" v-on:click="sendMessage('NewMessage');" class="btn-send">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </div>
          </transition>
          <transition name="flip"> 
            <label v-if="!enablerecord" for="audioAttachment" class="btn-send">
              <i class="fa fa-microphone" aria-hidden="true"></i>
            </label>
          </transition>
     </div>

        <transition name="slidedown">
          <template>
            <div v-if="fileModel == 'Enabled'" class="input imagePreview">
              <img id="previewTarget" src="#" alt="Image Upload Preview">
              <div v-on:click="sendMedia(fileModel, 'image');" class="btn-send" style=""><i class="fa fa-paper-plane fa-lg"></i></div>
              <div v-on:click="fileModel = null" class="btn-dismiss"><i class="fa fa-times fa-lg"></i></div>
            </div>
          </template>
        </transition>


      </div>
    </template>
  </transition>

  <!-- FOCUS IMAGE CONTAINER -->
  <transition name="slidedown">
    <template>
      <div v-if="imgfocus" class="img-focus">
        <div v-on:click="imgfocus = false;" class="btn-dismiss text-center">
          <i class="fa fa-times fa-lg"></i>
        </div>
        <img id="img-object" src="https://img.pngio.com/black-square-icon-free-black-shape-icons-black-and-color-png-256_256.png" />
      </div>
    </template>
  </transition>

  <!-- ADD KONSELOR WINDOW -->
  <transition name="state">
    <div v-if="current_window == 'tambahkonselor'" class="window position-fixed">
      <div class="bg-full">
        <div class="topnav forms">
          <div v-on:click="changeWindow('chatroom')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
          <div class="text">
            <input type="text" v-model="dosenquery" v-on:input="findKonselor()" class="searchbar"></input>
            <div class="title"></div>
            <div class="subtitle mt-1" style="width: 110%; ">{{ current_subtitle }}</div>
          </div>
        </div>

        <div class="content findkonselor">
        
          <template v-for="konselor in dosensearch" :key="konselor.NIP">
            <div v-on:click="selectKonselor(konselor.NIP, konselor.Nama)" class="admin-tools-menu kelola-blogs shadow">
              <div class="text w-75" style="margin: 0; text-align: left;"><small>{{ konselor.Nama }}</small></div>
              <input type="checkbox" class="d-none" :id="konselor.NIP" :checked="selectedKonselor(konselor.NIP)" autocomplete="off" />
              <label v-on:click="selectKonselor(konselor.NIP, konselor.Nama)" :for="konselor.NIP" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
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

  <!-- LAPORAN WINDOW -->
  <transition name="state">
    <div v-if="current_window == 'laporan'" class="window position-fixed">
      <div class="bg-full">
        <div class="topnav forms">
          <div v-on:click="changeWindow('chatroom')" class="topicon-right"><i class="fa fa-times fa-lg"></i></div>
          <div class="text w-100" style="left: -5%;">
            <div class="title " style="width: 110%; ">KARTU HASIL KONSELING</div>
            <div class="subtitle mt-1" style="width: 110%; ">Pilih satu/lebih kategori masalah</div>
          </div>
        </div>

        <div class="content">

          <div class="requestform">
            <div class="title">
              <span class="font-weight-bold">NAMA KONSELI</span> <br />
              <small><small> NIM KONSELI </small></small>
            </div>

            <template >

              <div v-on:click="selectMasalah('Akademik')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Akademik</div>
                <input type="checkbox" class="d-none" :id="'masalah-akademik'" :checked="selectedMasalah('Akademik')" autocomplete="off" />
                <label v-on:click="selectMasalah('Akademik')" :for="'masalah-akademik'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>

              <div v-on:click="selectMasalah('Ekonomi')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Ekonomi</div>
                <input type="checkbox" class="d-none" :id="'masalah-ekonomi'" :checked="selectedMasalah('Ekonomi')" autocomplete="off" />
                <label v-on:click="selectMasalah('Ekonomi')" :for="'masalah-ekonomi'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>

              <div v-on:click="selectMasalah('Pergaulan')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Pergaulan</div>
                <input type="checkbox" class="d-none" :id="'masalah-pergaulan'" :checked="selectedMasalah('Pergaulan')" autocomplete="off" />
                <label v-on:click="selectMasalah('Pergaulan')" :for="'masalah-pergaulan'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>
              
              <div v-on:click="selectMasalah('Keluarga')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Keluarga</div>
                <input type="checkbox" class="d-none" :id="'masalah-keluarga'" :checked="selectedMasalah('Keluarga')" autocomplete="off" />
                <label v-on:click="selectMasalah('Keluarga')" :for="'masalah-keluarga'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>
              
              <div v-on:click="selectMasalah('Kemasyarakatan')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Kemasyarakatan</div>
                <input type="checkbox" class="d-none" :id="'masalah-kemasyarakatan'" :checked="selectedMasalah('Kemasyarakatan')" autocomplete="off" />
                <label v-on:click="selectMasalah('Kemasyarakatan')" :for="'masalah-kemasyarakatan'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>

               
              <div v-on:click="selectMasalah('Lain-lain')" class="masalah shadow-sm">
                <div class="text w-75" style="margin: 0;">Lain-lain</div>
                <input type="checkbox" class="d-none" :id="'masalah-lain'" :checked="selectedMasalah('Lain-lain')" autocomplete="off" />
                <label v-on:click="selectMasalah('Lain-lain')" :for="'masalah-lain'" class="check-hksv"><i class="fa fa-check fa-lg" aria-hidden="true"></i></label>
              </div>

           
            </template>

            <div id="closebtn"  v-on:click="closeSession()" class="requestform btn-hksv mt-5 w-75" :class="buttonCheck" style="line-height: 2;">
              Selesai
            </div>
          </div>

        </div>

      </div>
    </div>
  </transition>

  <!-- DARK OVERLAY || FOR USAGE JUST ADD NEEDED STATE ON IF -->
  <transtition name="fade">
    <div  v-if="confirm || details">
      <div v-on:click="closeDialog();" class="overlay-dark"></div>
    </div>
  </transtition>

  <!-- CONFIRMATION DIALOG -->
  <transition name="fade">
    <div  v-if="confirm" class="dialog">
      <div class="confirm">
        <div class="text-dialog">
          Mengakhiri sesi akan menutup sesi untuk semua konselor dan konseli, 
          yakin akhiri sesi?
        </div>
        <div class="prompt">
          <div v-on:click="changeWindow('laporan'); confirmDialog(false)" class="btn-hksv btn-confirm">Ya</div>
          <div v-on:click="confirmDialog(false)" class="btn-hksv btn-dismiss">Batal</div>
        </div>
      </div>
    </div>
  </transition>
    
  <!-- SESSION DETAILS -->
  <transition name="fade">
    <div  v-if="details && current_window == 'chatroom'" class="dialog">
      <div class="sessiondetail">
        <div class="text-dialog">
          <div class="text-center"><b>Detail Sesi</b></div>
          <div class="text-left">
            Konseli : <br />
            {{ sessiondetail.mhsnim }} - {{ sessiondetail.mhsnama }} <br /><br />
            Cerita Konseli : <br />
            {{ sessiondetail.mhsreq }}<br /><br />
            Daftar Konselor : <br />
          </div>

          <div class="text-left" v-for="(konselor, index) in sessiondetail.daftarkonselor">
            {{index+1}}. {{konselor}} 
          </div>
        </div>
        <div class="prompt mt-3">
          <div v-on:click="closeDialog();" class="text-center"><u>Tutup</u></div>
        </div>
      </div>
    </div>
  </transition>


</section>
     
<script src="<?= base_url('assets/js/mobile/chatroom.js') ?>" ></script>
