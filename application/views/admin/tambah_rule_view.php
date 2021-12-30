<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Penyakit Tanaman Bawang Merah</h4>
                    <form class="forms-sample" action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputName1">ID Rule</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="id" readonly value="<?= $id ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Gejala</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="gejala">
                                <option value="0">---Pilih Gejala---</option>
                                <?php foreach ($datagejala as $g) : ?>
                                    <option value="<?= $g->id ?>"><?= $g->name ?> (<?= $g->code ?>)</option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Penyakit</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="penyakit">
                                <option>---Pilih Penyakit---</option>
                                <?php foreach ($dataproblems as $p) : ?>
                                    <option value="<?= $p->id ?>"><?= $p->name ?> (<?= $p->code ?>)</option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail3">Belief</label>
                            <input type="text" class="form-control" name="belief" placeholder="Keyakinan">
                            <?= form_error('belief', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>