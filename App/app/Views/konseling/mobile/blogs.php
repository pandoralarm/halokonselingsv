<section  id="blogs">
  <transition name="state">

    <div v-if="current_submenu == 'blogs'" class="content">
    
      <div v-for="(article, index) in articles">
        <template>

          <transition name="open">
            <div v-on:click="expand(index)" :id="article.ArticleID" class="blogs-base shadow">

              <div  class="blogs-thumb">
                <p class="title">{{article.Title}}</p>
                <div class="overlay-thumb">
                  <img :src="article.Header">
                </div>
              </div>

            </div>
          </transition>

        </template>  
        
      </div>
      
    </div>

    <div v-if="current_submenu == 'blogDetail'" class="content">

      <template >

        <transition name="open">
          <div class="blogs-base shadow">
            <div class="blogs-content-header">
              <img class="header-content shadow" :src="expanded.Header">
            </div>
            <div class="blogs-content">
                <div class="title">{{ expanded.Title }}</div>
                <div class="text expandedcontent">
                  <!-- DUMP expanded.content TO innerHTML -->
                </div>
                <div class="title"><small>Sebuah artikel oleh : {{ expanded.KonselorNIP }}</small></div>
                <div class="title"><small>Dipublikasikan pada {{ expanded.Timestamp }}</small></div>
                <div v-on:click="collapse()" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
            </div>
          </div>
        </transition>


      </template>

    </div>

    <div v-if="current_submenu == 'blogDetailYt'" class="content">

      <template>

        <transition name="open">
          <div class="blogs-base shadow">
            <div class="blogs-content-header">
              <iframe class="header-content shadow"  :src="expanded.Header" frameborder="0" allow=" autoplay;" allowfullscreen></iframe>
            </div>
            <div class="blogs-content">
                <div class="title">{{ expanded.Title }}</div>
                <div class="text expandedcontent">
                  <!-- DUMP expanded.content TO innerHTML -->
                </div>
                <div class="title"><small>Sebuah artikel oleh : {{ expanded.KonselorNIP }}</small></div>
                <div class="title"><small>Dipublikasikan pada {{ expanded.Timestamp }}</small></div>
                <div v-on:click="collapse()" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
            </div>
          </div>
        </transition>


      </template>

    </div>

  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/blogs.js') ?>" ></script>