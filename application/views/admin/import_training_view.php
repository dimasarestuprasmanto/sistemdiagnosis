<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Uji Coba Data Training</h4>

                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <i class="mdi mdi-check"></i>
                            <strong>
                                <?php echo $this->session->flashdata('success');
                                unset($_SESSION['success']);
                                ?>
                            </strong>
                        </div>
                    <?php } ?>

                    <form action="<?= base_url('/admin/importtraining/excel') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-lg-7">
                            <label for="jumlah">Jumlah data yang akan di import</label>
                            <input class="form-control" placeholder="0" type="number" name="jumlah" required>
                        </div>
                        <div class="form-group col-lg-9">
                            <label for="fileExcel">Silahkan pilih file</label>
                            <input class="form-control" type="file" name="fileURL" required>
                            <small class="text-muted" style="font-size: x-small;"><i>hanya support file dengan ekstensi .xlsx dan .csv</i></small>
                        </div>
                        <div class="form-group col-lg-9">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <a class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#importModal">Submit Data Training</a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Import Data Training</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group col-lg-12">
                                            <div class="alert alert-warning">
                                                Mengimpor data akan menghapus semua DATA TRAINING dan DATA RULE yang ada saat ini.
                                                Klik tombol Submit jika ingin melanjutkan.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal-->

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->