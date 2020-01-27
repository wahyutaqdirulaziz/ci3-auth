<body class="hold-transition register-page bg-register-image">
    <div class="register-box">

        <!-- *Card Box -->
        <div class="card">

            <!-- *Card Header -->
            <div class="card-header">
                <!-- *Brand Logo -->
                <div class="text-center">
                    <img src="<?= base_url('assets/images/brand/auth-brand.png') ?>" alt="SIMAK Logo">
                </div>
                <!-- .Brand Logo -->
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
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Daftar</button>
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