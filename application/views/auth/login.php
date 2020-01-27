<body class="hold-transition login-page bg-login-image">
    <div class="login-box">

        <!-- *Brand Logo -->
        <div class="login-logo">
            <img src="<?= base_url('assets/images/brand/auth-brand.png') ?>" alt="SIMAK Logo">
        </div>
        <!-- .Brand Logo -->

        <div class="card">
            <div class="card-body login-card-body">
                <!-- *Tempat Pemberitahuan -->
                <p class="login-box-msg">
                    <div class="alert alert-success alert-message">
                        <h5><i class="icon fas fa-check"></i> Berhasil! </h5>
                        Success alert preview. This alert is dismissable.
                    </div>
                </p>
                <!-- .Tempat Pemberitahuan -->

                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->