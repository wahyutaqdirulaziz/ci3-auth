<body class="hold-transition register-page bg-register-image">
    <div class="register-box">

        <!-- *Brand Logo -->
        <div class="register-logo">
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
                <form action="#" method="POST">
                    <div class="form-group">
                        <input type="text" name="fullname" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block fonta-raleway-medium">Daftar</button>
                    </div>
                </form>
                <!-- .Form Penginputan untuk mendaftarkan akun -->
                <div class="text-center">
                    <h6>Sudah memiliki akun? <a href="<?= base_url('auth/login'); ?>">Masuk!</a></h6>
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