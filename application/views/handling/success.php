<body>
    <div class="container">
        <div class="card mx-auto col-md-5 col-sm-12 p-3 mt-5">
            <div class="card-header">
                <!-- load banner -->
                <div class="row">
                    <img class="w-100" src="<?= base_url('assets/images/banner/') . 'email.png' ?>" alt="Banner Success Page">
                </div>
            </div>

            <div class="card-body">

                <!-- text information -->
                <div class="row mx-auto">
                    <div class="col-12">
                        <h3 class="fonta-patrick-hand">Silahkan cek kotak masuk pada email <strong class="text-danger"><?= $email ?></strong>
                            untuk mengaktifkan akun <strong class="text-primary">@<?= $username ?></strong>
                        </h3>
                    </div>
                    <div class="col-12">
                        <span class="fonta-sriracha"><ins class="text-danger">Catatan:</ins> Jika anda tidak menerima pesan:</span>
                    </div>
                    <div class="col-12">
                        <ul class="fonta-sriracha text-dark">
                            <li>Periksa folder spam.</li>
                            <li>Cek kembali email yang anda daftarkan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- footer -->
            <div class="card-footer">
                <div class="row">
                    <span class="text-muted mx-auto fonta-raleway">Sudah memiliki akun aktif? <a href="<?= base_url('login'); ?>">Masuk!</a></span>
                </div>
                <div class="text-center mt-2">
                    <h6>Copyright &copy; 2020 <strong>SIMAK</strong>. All rights reserved.</h6>
                </div>
            </div>
        </div>
    </div>