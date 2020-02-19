<body class="hold-transition register-page bg-register-image">
    <div id="preloader"></div>
    <div class="col-lg-4 col-md-4 col-sm-12 mt-5">

        <!-- *Brand Logo -->
        <div class="register-logo mt-5">
            <img src="<?= base_url('assets/images/brand/circle-simak.png') ?>" alt="SIMAK Logo">
        </div>
        <!-- .Brand Logo -->

        <!-- *Card Box -->
        <div class="card">

            <!-- *Card Header -->
            <div class="card-header bg-primary">
                <h4 class="fonta-merienda-bold"><em class="fas fa-user-plus mx-2"></em>DAFTAR</h4>
            </div>
            <!-- .Card Header -->

            <!-- *Card Body -->
            <div class="card-body register-card-body">
                <!-- *Notification Place -->
                <p class="login-box-msg">

                </p>
                <!-- .Notification Place -->

                <!-- *Form Penginputan untuk mendaftarkan akun -->
                <?= form_open('registration/create') ?>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>">
                    <?= form_error('username', '<small class="text-danger error_form">', '</small>') ?>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger error_form">', '</small>') ?>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger error_form">', '</small>') ?>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                            <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
                            <?= form_error('c_password', '<small class="text-danger error_form">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="alert alert-light">
                        <h5 class="fonta-sriracha text-center disable-text" style="letter-spacing: 0.2rem"><?= $captcha ?></h5>
                        <input type="hidden" name="cap_confirm" value="<?= $captcha ?>">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="cap_word" class="form-control" placeholder="Type the text" maxlength="8">
                    <?= ($cap_indi == 1) ? "" : '<small class="text-danger error_form"><i class="fas fa-exclamation-circle mx-1"></i>CAPTCHA tidak cocok</small>'; ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block fonta-raleway-medium">Daftar</button>
                </div>
                <?= form_close() ?>
                <!-- .Form Penginputan untuk mendaftarkan akun -->
                <div class="text-center">
                    <h6>Sudah memiliki akun? <a href="<?= base_url('login'); ?>">Masuk!</a></h6>
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