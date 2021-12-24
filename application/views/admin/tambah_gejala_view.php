<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Gejala Tanaman Bawang Merah</h4>
                    <form class="forms-sample" action="" method="POST">
                        <div class="form-group">
                            <label for="exampleInputName1">ID Gejala</label>
                            <input type="text" class="form-control" id="exampleInputName1" value="<?= $id; ?>" name="id" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Nama Gejala</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Gejala">
                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail3">Pertanyaan</label>
                            <input type="text" class="form-control" name="pertanyaan" placeholder="Pertanyaan">
                            <?= form_error('pertanyaan', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Deskripsi Gejala</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" name="deskripsi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>