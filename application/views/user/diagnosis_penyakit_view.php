<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Berdasarkan Gejala Yang Terdapat Pada Tanaman Bawang Merah Kemungkinan Penyakit</h4>
                    <h2>Nama Penyakit :</h2>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Gejala Yang Dipilih</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <?php foreach ($datagejala as $d) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" value=" <?= $d->id; ?>">
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
                    <h2>Solusi :</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->