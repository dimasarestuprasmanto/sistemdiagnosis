<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Gejala Tanaman Bawang Merah</h4>
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <a href="<?php base_url('admin/gejala/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-check"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('success'); 
                                unset($_SESSION['success']);
                            ?>
                        </strong>
                    </div>
                     <?php } else if($this->session->flashdata('error')){  ?>
                    <div class="alert alert-danger">
                        <a href="<?php base_url('admin/gejala/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('error'); 
                                unset($_SESSION['error']);
                            ?>
                        </strong>
                    </div>
                    <?php } else if($this->session->flashdata('warning')){  ?>
                    <div class="alert alert-warning">
                        <a href="<?php base_url('admin/gejala/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('warning'); 
                                unset($_SESSION['warning']);
                            ?>
                        </strong>
                    </div>
                    <?php }?>

                    <a href="gejala/tambah_gejala" type="button" class="btn btn-primary btn-fw float-right">Tambah Gejala</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-1">
                                        ID Gejala
                                    </th>
                                    <th class="col-3">
                                        Nama Gejala
                                    </th>
                                    <th class="col-7">
                                        Deskripsi Gejala
                                    </th>
                                    <th class="col-1">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datagejala as $g) : ?>
                                    <tr>
                                        <td>
                                            <?= $g->code ?>
                                        </td>
                                        <td>
                                            <?= $g->name ?>
                                        </td>
                                        <td>
                                            <?= $g->description ?>
                                        </td>

                                        <td>
                                            <a href="gejala/edit/<?= encrypt_url($g->id) ?>" class="btn-sm btn-inverse-info btn-icon">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            &nbsp
                                            <a href="gejala/hapus/<?= $g->id ?>" class="btn-sm btn-inverse-danger btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus');">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->