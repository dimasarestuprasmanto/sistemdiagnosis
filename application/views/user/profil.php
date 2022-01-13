<div class="main-panel">
    <div class="content-wrapper">

        <div class="row gx-4 gx-lg-12 row-cols-12 row-cols-md-11 row-cols-xl-12">
            <div class="col-xl-6 p-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile Saya</h4>
                        <div class="form-group">
                            <label for="exampleInputnama1">Nama</label>
                            <input type="text" value="<?php echo $dataprofil['nama']; ?>" class="form-control" id="exampleInputnama1" placeholder="Nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputno_telp1">No. Telp</label>
                            <input type="text" value="<?php echo $dataprofil['no_telp']; ?>" class="form-control" id="exampleInputno_telp1" placeholder="No. Telp" readonly>
                        </div>
                        <div class="form-group">
                            <label for="examplealamat1">Alamat</label>
                            <textarea name="textarea" value="" readonly style="background-color: #eae9f5;"><?php echo $dataprofil['alamat']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-12 row-cols-12 row-cols-md-11 row-cols-xl-12">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <a href="profil/edit/<?=$this->session->userdata('id_user');?>" class="btn btn-lg btn-block btn-success" style="display: block;"><b>Ubah Password</b></a>
                    </div>
                </div>
            </div>
        </div>
        

    </div>