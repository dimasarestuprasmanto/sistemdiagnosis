<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Berdasarkan Gejala Yang Terdapat Pada Tanaman Bawang Merah Kemungkinan Penyakit</h4>
                    <h2>Nama Penyakit : <?= isset($penyakit) ? $penyakit : '' ?></h2>
                    <h6>Dengan Tingkat Kepercayaan : <?= isset($belief) ? $belief . '%' : '' ?></h6>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <?php if ($this->session->flashdata('error')) {  ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->flashdata('error');
                            unset($_SESSION['error']);
                            ?>
                        </div>
                    <?php } ?>
                    <h4 class="card-title">Gejala Yang Dipilih</h4>
                    <form class="forms-sample" action="" method="POST">
                        <div class="form-group">
                            <?php foreach ($datagejala as $d) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="gejala[]" value=" <?= $d->id; ?>">
                                        <?= $d->name; ?>
                                    </label>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2>Solusi : <?= isset($solusi) ? $solusi : '' ?></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->