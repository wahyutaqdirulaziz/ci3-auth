<body class="hold-transition login-page bg-login-image">
    <div id="preloader"></div>
    <!-- *Login Box -->
    <div class="login-box">

        <!-- *Brand Logo -->
        <div class="login-logo">
            <img src="<?= base_url('assets/images/brand/circle-simak.png') ?>" alt="SIMAK Logo">
        </div>
        <!-- .Brand Logo -->

        <!-- *Card Box -->
        <div class="card">
            <!-- *Card Header -->
            <div class="card-header bg-primary">
                <h4 class="fonta-merienda-bold"><em class="fas fa-sign-in-alt mx-2"></em>MASUK</h4>
            </div>
            <!-- .Card Header -->

            <!-- *Card Body -->
            <div class="card-body login-card-body">
                <!-- *Tempat Pemberitahuan -->
                <?= $this->session->flashdata('message'); ?>
                <!-- .Tempat Pemberitahuan -->

                <!-- *Form Penginputan Username/Email dan Pasword -->
                <?= form_open('login/validation'); ?>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username or Email" required>
                </div>
                <div class="form-group">
                    <small class="form-text text-muted text-right"><a href="<?= base_url('forgot_password'); ?>">Lupa Katasandi?</a></small>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block fonta-raleway-medium">Masuk</button>
                </div>
                <?= form_close(); ?>
                <!-- .Form Penginputan Username/Email dan Pasword -->
                <div class="text-center">
                    <h6>Belum memiliki akun? <a href="<?= base_url('registration'); ?>">Daftar!</a></h6>
                </div>

            </div>
            <!-- .Card Body -->

            <!-- *Card Footer -->
            <div class="card-footer">
                <div class="text-center">
                    <h6>Copyright &copy; 2020 <strong>SIMAK</strong>. All rights reserved.</h6>
                </div>
            </div>
            <!-- .Card Footer -->
        </div>
        <!-- .Card Box -->
    </div>
    <!-- .Login Box -->