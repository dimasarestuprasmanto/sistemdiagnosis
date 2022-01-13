<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mt-4">
            <div class="col-xl-6 p-2">
                <div class="card">
                    <div class="card-body">
                    
                    <?php if (validation_errors() != NULL){?>
                    <div class="alert alert-danger">
                        <strong>
                            <?=validation_errors() ?>
                        </strong>
                    </div>
                   <?php } elseif($this->session->flashdata('notmatch') != NULL){  ?>
                    <div class="alert alert-danger">
                        <strong>
                            <?php echo $this->session->flashdata('notmatch'); 
                                unset($_SESSION['notmatch']);
                            ?>
                        </strong>
                    </div>
                    <?php }?>
                        <h4 class="card-title">Ubah Password</h4>
                        <form class="forms-sample" action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Lama</label>
                                <input type="text"  value="<?php echo set_value('old_password');?>" class="form-control" name="old_password" placeholder="Masukkan password lama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Baru</label>
                                <input type="text" value="<?php echo set_value('new_password');?>" class="form-control" name="new_password" placeholder="Masukkan password baru">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputConfirmPassword1">Konfirmasi Password Baru</label>
                                <input type="text" value="<?php echo set_value('re_password');?>"  class="form-control" name="re_password" placeholder="Masukkan password baru">
                            </div>
                            <input type="text" class="form-control" name="id" value="<?=$id = $this->session->userdata('id_user');?>" hidden>
                            <button type="submit" name="submit" class="btn btn-primary me-2">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>