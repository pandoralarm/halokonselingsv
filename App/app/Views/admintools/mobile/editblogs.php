<section  id="editblogs">
  <transition name="state">
  <div v-if="current_submenu == 'editblogs'" class="content">
    
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

    <div v-on:click="nav.changeWindow('blogform'); nav.changeTitle('Pojok Edukasi', ''); blogform.checkheaderopt();" class="btn-add text-center">
      <i class="fa fa-plus fa-lg" aria-hidden="true" style="position: relative; top: 30%;"></i>
    </div> 
    
  </div>

  <div v-if="current_submenu == 'editblogDetail'" class="content">

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
              <div v-on:click="collapse()" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
          </div>
        </div>
      </transition>


    </template>

  </div>

  <div v-if="current_submenu == 'editblogDetailYt'" class="content">

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
              <div v-on:click="collapse()" class="btn-collapse"><i class="fa fa-chevron-up fa-lg" aria-hidden="true"></i></div>
          </div>
        </div>
      </transition>


    </template>   

  </div>
      
  </transition>

</section>




<script src="<?= base_url('assets/js/mobile/editblogs.js') ?>" ></script>
