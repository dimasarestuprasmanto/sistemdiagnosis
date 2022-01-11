<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- ini adalah data dashboard -->
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <h4 class="card-title">Halo selamat datang,</h4>
                            <h4 class="mb-4 mt-2"><strong class="text-primary"><?php echo $this->session->userdata('nama'); ?></strong> </h4>
                        </div>
                    </div>
                    <p class="card-description mb-2">
                        Silahkan klik pada salah satu menu di bawah ini
                    </p>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <a href="diagnosis/" class="card">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Diagnosis Penyakit</h4>
                                    <div class="media">
                                        <i class="mdi mdi-shield-search icon-md text-info d-flex align-self-center me-3"></i>
                                        <div class="media-body">
                                        <p class="card-text">Halaman ini berfungsi untuk mendiagnosa penyakit yang ada pada tanaman bawang merah</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <a href="<?= base_url('user/info') ?>" class="card">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Info Penyakit</h4>
                                    <div class="media">
                                        <i class="mdi mdi-information icon-md text-info d-flex align-self-end me-3"></i>
                                        <div class="media-body">
                                        <p class="card-text">Halaman ini berfungsi untuk menampilkan informasi berupa penyakit yang terdapat pada tanaman bawah merah</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends --