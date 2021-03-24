<section  id="blogs">
  <transition name="state">
    <div v-if="current_submenu == 'blogs' || current_submenu == 'blogDetail'" class="content">
    
      <template v-if="isShown('id')">

        <transition name="open">
          <div v-on:click="expand('id')" v-if="isCollapsed('id')" id="blog-123" class="blogs-base shadow">

            <div  class="blogs-thumb">
              <p class="title">Kenali Tanda-Tanda Kamu Sedang Stres TAPI DI DESKTOP</p>
              <div class="overlay-thumb">
                <img src="https://img.youtube.com/vi/h7x6oLZQRHI/0.jpg">
              </div>
            </div>

          </div>
        </transition>

        <transition name="open">
          <div v-if="isExpanded('id')" class="blogs-base shadow">
            <div class="blogs-content-header">
              <!-- <img class="content" src="https://img.youtube.com/vi/TLnUJzueBOQ/1.jpg"> -->
              <iframe class="header-content shadow" src="https://www.youtube.com/embed/h7x6oLZQRHI" frameborder="0" allow=" autoplay;" allowfullscreen></iframe>
            </div>
            <div class="blogs-content">
                <div class="title">Kenali Tanda-Tanda Kamu Sedang Stres</div>
                <div class="text">
                  The standard Lorem Ipsum passage, used since the 1500s
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                  <br/><br/>
                  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                  "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                </div>
                <div v-on:click="collapse('id')" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
            </div>
          </div>
        </transition>


      </template>

      <template v-if="isShown('id2')">

        <transition name="open">
          <div v-on:click="expand('id2')" v-if="isCollapsed('id2')" id="blog-2123" class="blogs-base shadow">

            <div  class="blogs-thumb">
              <p class="title">Twenty One Pilots - Level Of Concern [Kinetic Typography]</p>
              <div class="overlay-thumb">
                <img src="https://img.youtube.com/vi/snftmhohtYU/0.jpg">
              </div>
            </div>

          </div>
        </transition>


        <transition name="open">
          <div v-if="isExpanded('id2')" class="blogs-base shadow">
            <div class="blogs-content-header">
              <!-- <img class="content" src="https://img.youtube.com/vi/TLnUJzueBOQ/1.jpg"> -->
              <iframe class="header-content shadow" src="https://www.youtube.com/embed/snftmhohtYU?&autoplay=1" frameborder="0" allow=" autoplay;" allowfullscreen></iframe>
            </div>
            <div class="blogs-content">
                <div class="title">Twenty One Pilots - Level Of Concern [Kinetic Typography]</div>
                <div class="text">
                  The standard Lorem Ipsum passage, used since the 1500s
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                  <br/><br/>
                  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                  "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                  <br/><br/>
                  1914 translation by H. Rackham
                  "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"
              </div>
                <div v-on:click="collapse('id2')" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
            </div>
          </div>
        </transition>


      </template>

      <template v-if="isShown('id3')">

        <transition name="open">
          <div v-on:click="expand('id3')" v-if="isCollapsed('id3')" id="blog-2123" class="blogs-base shadow">

            <div  class="blogs-thumb">
              <p class="title">Studi: Aktif Zoom Sepanjang Hari Dapat Memicu Stres dan Kecemasan</p>
              <div class="overlay-thumb">
                <img src="https://cdn1-production-images-kly.akamaized.net/pS-dRLEIv9mpvIWHq_3DsWIw7ow=/640x360/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3177440/original/000685500_1594567682-group-people-working-out-business-plan-office_1303-15768.jpg">
              </div>
            </div>

          </div>
        </transition>


        <transition name="open">
          <div v-if="isExpanded('id3')" class="blogs-base shadow">
            <div class="blogs-content-header shadow">
              <img class="header-content" src="https://cdn1-production-images-kly.akamaized.net/pS-dRLEIv9mpvIWHq_3DsWIw7ow=/640x360/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3177440/original/000685500_1594567682-group-people-working-out-business-plan-office_1303-15768.jpg">
              <!-- <iframe class="header-content" src="https://www.youtube.com/embed/TLnUJzueBOQ?&autoplay=1" frameborder="0" allow=" autoplay;" allowfullscreen></iframe> -->
            </div>
            <div class="blogs-content">
                <div class="title">Studi: Aktif Zoom Sepanjang Hari Dapat Memicu Stres dan Kecemasan</div>
                <div class="text">
                  The standard Lorem Ipsum passage, used since the 1500s
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                  <br/><br/>
                  Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                  "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
                  <br/><br/>
                  1914 translation by H. Rackham
                  "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"
              </div>
                <div v-on:click="collapse('id3')" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
            </div>
          </div>
        </transition>


      </template>



    </div>
  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/blogs.js') ?>" ></script>