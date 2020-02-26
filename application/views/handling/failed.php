<body>
    <div class="container">
        <div class="card mx-auto col-md-5 col-sm-12 p-3 mt-5">
            <div class="card-header">
                <!-- load banner -->
                <div class="row">
                    <img class="w-100 mx-auto" src="<?= base_url('assets/images/banner/') . $banner ?>" alt="Banner Success Page">
                </div>
            </div>

            <!-- text information -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-wrap">
                        <?php if ($cond == "invalidEmail") : ?>
                            <h3 class="fonta-patrick-hand text-center">
                                Email
                                <strong class="text-danger"><?= $email ?></strong>
                                tidak valid atau belum terdaftar.
                            </h3>
                        <?php elseif ($cond == "invalidToken") : ?>
                            <h3 class="fonta-patrick-hand text-center">
                                <strong class="text-danger">Token</strong>
                                tidak valid atau tidak ditemukan.
                            </h3>
                        <?php elseif ($cond == "expiredToken") : ?>
                            <h3 class="fonta-patrick-hand text-center">
                                <strong class="text-danger">Token</strong>
                                telah kedaluarsa.
                                <br>
                                Silahkan <strong class="text-info"><a href="<?= base_url('registration'); ?>">daftar</a></strong> kembali akun Anda.
                            </h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="card-footer">
                <div class="row mt-3">
                    <span class="text-muted mx-auto fonta-raleway">Sudah memiliki akun aktif? <a href="<?= base_url('login'); ?>">Masuk!</a></span>
                </div>
                <div class="text-center mt-2">
                    <h6>Copyright &copy; 2020 <strong>SIMAK</strong>. All rights reserved.</h6>
                </div>
            </div>
        </div>
    </div>