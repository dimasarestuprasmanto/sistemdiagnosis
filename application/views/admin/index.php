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
                                <a class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#importModal"><i class="icon-file"></i>Import Data</a>
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
        <!-- Modal -->
        <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group col-lg-7">
                    <label for="jumlah">Jumlah data yang akan di import</label>
                    <input class="form-control" placeholder="0" type="number" name="jumlah" required>
                </div>
                <div class="form-group col-lg-9">
                    <label for="fileExcel">Silahkan pilih file</label>
                    <input class="form-control" type="file" name="fileExcel" required>
                    <small class="text-muted" style="font-size: x-small;"><i>hanya support file dengan ekstensi .xlsx dan .csv</i></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
            </div>
            </form>
        </div>
        </div>
        <!-- end modal-->
    </div>
    <!-- content-wrapper ends --