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
                                <a href="<?=base_url('admin/penyakit/tambah_penyakit');?>" class="btn btn-primary text-white me-0"><i class="icon-plus"></i> Penyakit</a>
                                <a href="<?=base_url('admin/gejala/tambah_gejala');?>" class="btn btn-primary text-white me-0"><i class="icon-plus"></i>Gejala</a>
                                <a href="<?=base_url('admin/rule/tambah_rule');?>" class="btn btn-primary text-white me-0"><i class="icon-plus"></i>Rule</a>
                                <a href="<?=base_url('admin/importtraining');?>" class="btn btn-primary text-white me-0"><i class="icon-upload"></i>Training</a>
                                <a href="<?=base_url('admin/importuji');?>" class="btn btn-primary text-white me-0"><i class="icon-upload"></i>Uji</a>
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
                                        <h1 class="text-primary"> <?php echo $totalPenyakit['count_penyakit']; ?> </h1>
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
                                        <h1 class="text-primary"> <?php echo $totalGejala['count_gejala']; ?> </h1>
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
                                        <h1 class="text-primary"> <?php echo $totalUser['count_user']; ?> </h1>
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