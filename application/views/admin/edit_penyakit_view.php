<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Penyakit Tanaman Bawang Merah</h4>
                    <?php echo form_open_multipart(''); ?>
                    <input type="text" class="form-control" name="id" value="<?= $data['id']; ?>" hidden>
                    <div class="form-group">
                        <label for="exampleInputName1">ID Penyakit</label>
                        <input type="text" class="form-control" name="code" value="<?= $data['code']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nama Penyakit</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Penyakit" value="<?= $data['name']; ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class=" form-group">
                        <label for="exampleTextarea1">Deskripsi Penyakit</label>
                        <textarea name="deskripsi"><?= $data['description']; ?></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Solusi</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="solusi"><?= $data['solution']; ?></textarea>
                        <?= form_error('solusi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <input type="text" name="old_gambar" value="<?= $data['image']; ?>" id="" hidden>
                    <div class="form-group">
                        <img src="<?= base_url('assets/images/penyakit/') ?><?= $data['image']; ?>" class="img-preview ml-3" alt="img-thumbnail" width="200" height="200">
                        <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImg()">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>