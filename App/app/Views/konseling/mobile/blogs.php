<section  id="blogs">
  <transition name="state">

    <div v-if="current_submenu == 'blogs' || current_submenu == 'blogDetail'" class="content">
    
    
    <div v-for="article in articles">
      {{article.ArticleID}}
      <template v-if="isShown('id')">

        <transition name="open">
          <div v-on:click="expand('id')" v-if="isCollapsed('id')" id="blog-123" class="blogs-base shadow">

            <div  class="blogs-thumb">
              <p class="title">Kenali Tanda-Tanda Kamu Sedang Stres</p>
              <div class="overlay-thumb">
                <img :src="article.Header">
              </div>
            </div>

          </div>
        </transition>

      </template>  
      
      
      <template v-if="isShown('id')">

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

      </div>
      
    </div>

  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/blogs.js') ?>" ></script>