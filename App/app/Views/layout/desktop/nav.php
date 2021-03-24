<body>
    <nav id="nav">
        <div class="container container-nav">
            <div class="logo">
                <img src="<?php echo base_url('assets/img/konseling-banner.png'); ?>" style="max-width: 200px;" alt="">
            </div>
            <ul>
                <li><a>RUANG KONSELING</a></li>
                <li v-on:click="changeMenu('beasiswa');changeSubmenu('home')"><a>BEASISWA</a></li>
                <li><a>BLOGS</a></li>
                <li><a>EVENTS</a></li>
            </ul>
            <div class="hamburger">
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <div class="container side-menu">
            <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_back.svg'); ?>" class="icon button-back" alt="">
            <?= $logged ? "<h1>Hallo!, " . strtok($name, " ") . "</h1>" : "<h1>Hallo!, Anonymous</h1>" ?>
            <img src="<?php echo base_url('assets/img/Components/Home/Desktop/icon_avatar.svg'); ?>" style="max-width: 180px;" alt="">
            <?= $logged ? "<p>$name <br> $prodi</p>" : "<p>Silahkan masuk <br> untuk menikmati lebih banyak fitur</p>" ?>
            <?php if (!$logged) { ?>
                <form method="POST" action="<?= base_url('account/signin/auth') ?>">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="remember" name="remember" id="remember">
                        <div class="cekbok">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="rememberme">Ingat Saya</label>
                        </div>
                        <button type="submit">Sign In</button>
                    </div>
                </form>
            <?php } else { ?>
                <button onclick="location.href='<?= base_url('account/signin/signout') ?>';">Logout</button>
            <?php } ?>
        </div>
    </nav>

    <?php if ($errmsg && !$logged) { ?>
        <?= "<script type='text/javascript'>
            $(window).on('load', function() {
                alert('Username atau Password Salah');  
            });
        </script>" ?>
    <?php } ?>

    <script src="<?= base_url('assets/js/desktop/nav.js') ?>"></script>