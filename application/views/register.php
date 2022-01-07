<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Registrasi</h4>
                            <form class="forms-sample" action="<?= base_url('register'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputName1">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="<?= set_value('name') ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">No Telp</label>
                                    <input type="text" class="form-control" placeholder="No Telp" name="no_telp" value="<?= set_value('no_telp') ?>">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" name="alamat"><?= set_value('alamat') ?></textarea>
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Username</label>
                                    <input type="text" class="form-control" placeholder="username" name="username" value="<?= set_value('username') ?>">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Password</label>
                                            <input type="password" id="Password" class="form-control" placeholder="Password" onkeyup="check();" name="password">
                                            <div class="invalid-feedback">
                                                <span id='message1'>test</span>
                                            </div>
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword4">Konfirmasi Password</label>
                                            <input type="password" id="RePassword" class="form-control" placeholder="Password" onkeyup="check();" name="repassword">
                                            <div class="invalid-feedback">
                                                <span id='message2'></span>
                                            </div>
                                            <?= form_error('repassword', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary me-2">Register</button>
                                    <button class="btn btn-light">Cancel</button>
                                </div>

                                <div class="text-center mt-4 fw-light">
                                    Sudah Punya Account? <a href="<?= base_url(); ?>" class="text-primary">Login</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->