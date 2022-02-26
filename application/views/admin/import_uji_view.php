<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Uji Algoritma</h4>

                    <?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success">
                            <i class="mdi mdi-check"></i>
                            <strong>
                                <?php echo $this->session->flashdata('success');
                                unset($_SESSION['success']);
                                ?>
                            </strong>
                        </div>
                    <?php } elseif ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <i class="mdi mdi-close-octagon-outline"></i>
                            <strong>
                                <?php echo $this->session->flashdata('error');
                                unset($_SESSION['error']);
                                ?>
                            </strong>
                        </div>
                    <?php } elseif ($this->session->flashdata('warning')) { ?>
                        <div class="alert alert-warning">
                            <i class="mdi mdi-close-octagon-outline"></i>
                            <strong>
                                <?php echo $this->session->flashdata('warning');
                                unset($_SESSION['warning']);
                                ?>
                            </strong>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('true')) { ?>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title text-success">Jumlah Data</h4>
                                <div class="media">
                                    <i class="mdi mdi-file-document-box icon-lg text-success d-flex align-self-start me-3"></i>
                                    <div class="media-body">
                                        <h1 class="text-success"><?php echo $this->session->flashdata('count');?></h1>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title text-success">Akurasi Algoritma</h4>
                                <div class="media">
                                    <i class="mdi mdi-chemical-weapon icon-lg text-success d-flex align-self-center me-3"></i>
                                    <div class="media-body">
                                        <h1 class="text-success"> 
                                            <?php echo $this->session->flashdata('true'); ?>
                                        </h1>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success">
                        <i class="mdi mdi-checkbox-multiple-marked-circle"></i>
                        <strong style="font-size: larger;">
                             Jadi dapat disimpulkan, akurasi algoritma dengan <mark><?php echo $this->session->flashdata('count'); ?>
                             data</mark> adalah <mark>senilai
                            <?php echo $this->session->flashdata('true');
                            unset($_SESSION['count']);
                            unset($_SESSION['true']);
                            ?></mark>
                        </strong>
                    </div>
                    <br>
                    <br>
                    <?php } ?>
                    <form action="<?= base_url('/admin/importuji/excel') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-lg-7">
                            <label for="jumlah">Jumlah data yang akan di import</label>
                            <input class="form-control" value="0" type="number" name="totalRows" required>
                            <span><small class="text-muted" style="font-size: x-small;"><i>*biarkan isian tetap <B>0</B> jika ingin mengimmpor semua baris data dari excel</i></small></span>
                        </div>
                        <div class="form-group col-lg-9">
                            <label for="fileExcel">Silahkan pilih file</label>
                            <input class="form-control" type="file" name="fileURL" required>
                            <span><small class="text-muted" style="font-size: x-small;"><i>*hanya support file dengan ekstensi .xls, .xlsx dan .csv</i></small></span>
                        </div>
                        <div class="form-group col-lg-9">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <a class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#importModal">Uji Algoritma</a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Import Data Uji</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group col-lg-12">
                                            <div class="alert alert-warning">
                                                Mengimpor data akan menghapus semua DATA UJI yang ada saat ini.
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