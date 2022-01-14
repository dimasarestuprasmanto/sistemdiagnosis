<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Pengguna</h4>
                    <form class="forms-sample" action="" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id_user']; ?>">
                        <div class="form-group">
                            <label for="exampleInputName1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="name" value="<?= $data['nama']; ?>">
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="username" value="<?= $data['username']; ?>">
                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">No Telp</label>
                            <input type="text" class="form-control" id="exampleInputName1" name="no_telp" value="<?= $data['no_telp']; ?>">
                            <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Alamat</label>
                            <textarea name="alamat" name="alamat"><?= $data['alamat']; ?></textarea>
                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>