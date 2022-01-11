<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-2">Berdasarkan gejala yang terdapat pada Tanaman Bawang Merah kemungkinan penyakit</h4>
                    <div class="clear-fix" style="height:2rem;"></div>
                    <blockquote class="blockquote">
                        <h5 class="mb-0">Nama Penyakit : <strong class="text-danger"><?= isset($penyakit) ? $penyakit : '' ?> </strong> </h5>
                    </blockquote>
                    <blockquote class="blockquote">
                        <h5 class="mb-0">Dengan Tingkat Kepercayaan : <strong class="text-primary"> <?= isset($belief) ? $belief . '%' : '' ?></strong></h5>
                    </blockquote>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <?php if ($this->session->flashdata('error')) {  ?>
                        <div class="alert alert-danger">
                            <i class="mdi mdi-information-outline"></i>
                            <strong>
                            <?php echo $this->session->flashdata('error');
                                unset($_SESSION['error']);
                                ?>
                            </strong>
                        </div>
                    <?php } ?>
                    <h4 class="card-title">Gejala yang Dipilih</h4>
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