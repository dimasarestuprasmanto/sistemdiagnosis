<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Penyakit Tanaman Bawang Merah</h4>
                    

                    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <a href="<?php base_url('admin/penyakit/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-check"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('success'); 
                                unset($_SESSION['success']);
                            ?>
                        </strong>
                    </div>
                     <?php } else if($this->session->flashdata('error')){  ?>
                    <div class="alert alert-danger">
                        <a href="<?php base_url('admin/penyakit/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('error'); 
                                unset($_SESSION['error']);
                            ?>
                        </strong>
                    </div>
                    <?php } else if($this->session->flashdata('warning')){  ?>
                    <div class="alert alert-warning">
                        <a href="<?php base_url('admin/penyakit/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('warning'); 
                                unset($_SESSION['warning']);
                            ?>
                        </strong>
                    </div>
                    <?php }?>

                    <a href="penyakit/tambah_penyakit"  type="button" class="btn btn-primary btn-icon-text">
                          <i class="ti-plus btn-icon-prepend"></i>
                          Tambah Data
                    </a>

                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-bordered" id="tabelpenyakit">
                            <thead>
                                <tr>
                                    <th class="col-1">
                                        ID Penyakit
                                    </th>
                                    <th class="col-2">
                                        Nama Penyakit
                                    </th>
                                    <th class="col-3">
                                        Deskripsi Penyakit
                                    </th>
                                    <th class="col-4">
                                        Solusi Penyakit
                                    </th>
                                    <th class="col-1">
                                        Gambar
                                    </th>
                                    <th class="col-1">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataproblems as $p) : ?>
                                    <tr>
                                        <td>
                                            <?= $p->code ?>
                                        </td>
                                        <td>
                                            <?= $p->name ?>
                                        </td>
                                        <td>
                                            <?= $p->description ?>
                                        </td>
                                        <td>
                                            <?= $p->solution ?>
                                        </td>
                                        <td>
                                            <center><img src=" <?= base_url('assets/images/penyakit/' . $p->image) ?>"></center>
                                        </td>
                                        <td>
                                            <a href="penyakit/edit/<?= encrypt_url($p->id) ?>" class="btn-sm btn-inverse-info btn-icon">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            &nbsp
                                            <a href="penyakit/hapus/<?= $p->id ?>" class="btn-sm btn-inverse-danger btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus');">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <script>
                        $(document).ready(function () {
                            $.noConflict();
                            $('#tabelpenyakit').DataTable({
                                language: {
                                    url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json'
                                }
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
