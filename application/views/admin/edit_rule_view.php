<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Rule</h4>
                    <form class="forms-sample" action="" method="POST">
                        <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" hidden>
                        <div class="form-group">
                            <label for="exampleInputName1">ID Rule</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="code" readonly value="<?= $data['code']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Gejala</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="gejala">
                                <?php foreach ($datagejala as $g) : ?>
                                    <?php if ($g->id == $data['penyakit_id']) : ?>
                                        <option value="<?= $g->id ?>" selected><?= $g->name ?></option>
                                    <?php else : ?>
                                        <option value="<?= $g->id ?>"><?= $g->name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Penyakit</label>
                            <select class="form-control" id="exampleFormControlSelect2" name="penyakit">
                                <?php foreach ($dataproblems as $p) : ?>
                                    <?php if ($p->id == $data['penyakit_id']) : ?>
                                        <option value="<?= $p->id ?>" selected><?= $p->name ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p->id ?>"><?= $p->name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail3">Belief</label>
                            <input type="text" class="form-control" name="belief" placeholder="Keyakinan" value="<?= $data['belief']; ?>">
                            <?= form_error('belief', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>