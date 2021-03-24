<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>SignIn - HaloKonseling</title>

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Vue JS 2.6x CDN -->
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuex"></script>
  <script src="https://unpkg.com/vue-cookies@1.7.4/vue-cookies.js"></script>
  <!-- AXIOS 0.12.x CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <!-- SASS CDN-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sass.js/0.9.2/sass.min.js" ></script>
  <!-- FONTAWESOME FREE 4.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!-- HKSV Style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/mobile/style.css') ?>" />

</head>
<body>
  <section id="signin">

    <div class="bg-full">
      
      <div class="signin-banner"><div class="text-center text-white power"><small>Poweered By:</small></div></div>
      <div class="signin-billboard">
        <div class="title">Masuk ke HaloKonselingSV</div>
      </div>

      <form class="signin-form" method="POST" action="<?= base_url('account/signin/auth') ?>">
        <div class="form-group">
          <input type="text" class="form-control" name="username" id="username" v-model="username" placeholder="Username" >
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="remember" id="remember" <?= ($rememberme) ? 'checked' : '' ?>>
            Remember username
          </label>
        </div>
        <button type="submit" class="btn btn-light w-100 mt-3">Masuk</button>
        <div class="text-right">
          <a href="https://akun.ipb.ac.id/resetpassword" class="lupa"><small>Lupa Password ?</small></a>
        </div>
    
        <?php if ($errmsg) { ?>
          <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong><small><?= $errmsg ?></small></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php } ?>
      </form>
    </div>
    
  </section>
  
<script src="<?= base_url('assets/js/mobile/signin.js') ?>" ></script>

</body>
</html>