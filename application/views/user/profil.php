<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-4">
                <img src="<?= base_url('assets/images/penyakit/default.jpg') ?>" alt="" class="card">
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile User</h4>
                        <div class="form-group">
                            <label for="exampleInputnama1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputnama1" placeholder="Nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputno_telp1">No. Telp</label>
                            <input type="text" class="form-control" id="exampleInputno_telp1" placeholder="No. Telp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="examplealamat1">Alamat</label>
                            <textarea class="form-control" id="examplealamat1" rows="4" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Password</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputConfirmPassword1">Confirm new Password</label>
                            <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>