<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- ini adalah data dashboard -->
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <div class="btn-wrapper">
                                <a href="penyakit/tambah_penyakit" class="btn btn-primary text-white me-0"><i class="icon-plus"></i> Tambah Penyakit</a>
                                <a href="gejala/tambah_gejala" class="btn btn-primary text-white me-0"><i class="icon-plus"></i> Tambah Gejala</a>
                                <a href="rule/tambah_rule" class="btn btn-primary text-white me-0"><i class="icon-plus"></i> Tambah Rule</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                        <a href="<?= base_url('admin/penyakit') ?>" class="card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Data Penyakit</h4>
                                <div class="media">
                                    <i class="mdi mdi-clipboard-outline icon-lg text-info d-flex align-self-start me-3"></i>
                                    <div class="media-body">
                                        <h4 class="card-text">Jumlah data </h4>
                                        <h2 class="text-primary"> <?php echo $totalPenyakit['count_penyakit']; ?> </h2>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                        <a href="<?= base_url('admin/gejala') ?>" class="card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Data Gejala</h4>
                                <div class="media">
                                    <i class="mdi mdi-clipboard-pulse-outline icon-lg text-info d-flex align-self-center me-3"></i>
                                    <div class="media-body">
                                        <h4 class="card-text">Jumlah data </h4>
                                        <h2 class="text-primary"> <?php echo $totalGejala['count_gejala']; ?> </h2>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                        <a href="<?= base_url('admin/user') ?>" class="card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title">Total Pengguna</h4>
                                <div class="media">
                                    <i class="mdi mdi-account-box-outline icon-lg text-info d-flex align-self-end me-3"></i>
                                    <div class="media-body">
                                        <h4 class="card-text">Jumlah data </h4>
                                        <h2 class="text-primary"> <?php echo $totalUser['count_user']; ?> </h2>
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