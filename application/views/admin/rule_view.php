<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Rule Tanaman Bawang Merah</h4>
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success">
                        <a href="<?php base_url('admin/rule/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-check"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('success'); 
                                unset($_SESSION['success']);
                            ?>
                        </strong>
                    </div>
                     <?php } else if($this->session->flashdata('error')){  ?>
                    <div class="alert alert-danger">
                        <a href="<?php base_url('admin/rule/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('error'); 
                                unset($_SESSION['error']);
                            ?>
                        </strong>
                    </div>
                    <?php } else if($this->session->flashdata('warning')){  ?>
                    <div class="alert alert-warning">
                        <a href="<?php base_url('admin/rule/');?>" class="close" data-dismiss="alert"><i class="mdi mdi-information-outline"></i></a>
                        <strong>
                            <?php echo $this->session->flashdata('warning'); 
                                unset($_SESSION['warning']);
                            ?>
                        </strong>
                    </div>
                    <?php }?>
                    
                    <a href="rule/tambah_rule" type="button" class="btn btn-primary btn-icon-text">
                        <i class="ti-plus btn-icon-prepend"></i>
                          Tambah Data
                    </a>

                    <a class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="icon-file"></i>
                        Import Data
                    </a>


                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-bordered" id="tabelrule">
                            <thead>
                                <tr>
                                    <th class="col-1">
                                        ID Rule
                                    </th>
                                    <th class="col-4">
                                        Gejala
                                    </th>
                                    <th class="col-4">
                                        Penyakit
                                    </th>
                                    <th class="col-1">
                                        Belief
                                    </th>
                                    <th class="col-1">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datarule as $r) : ?>
                                    <tr>
                                        <td>
                                            <?= $r->code ?>
                                        </td>
                                        <td>
                                            <?= $r->gejala ?>
                                        </td>
                                        <td>
                                            <?= $r->penyakit ?>
                                        </td>
                                        <td>
                                            <?= $r->belief ?>
                                        </td>
                                        <td>
                                            <a href="rule/edit/<?= encrypt_url($r->id) ?>" class="btn-sm btn-inverse-info btn-icon">
                                                <i class="mdi mdi-lead-pencil"></i>
                                            </a>
                                            &nbsp
                                            <a href="rule/hapus/<?= $r->id ?>" class="btn-sm btn-inverse-danger btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus');">
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
                            $('#tabelrule').DataTable({
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

        <!-- Modal -->
        <div class="modal fade" id="importModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="<?=base_url('/admin/rule/excel')?>" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Import Data Pakar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    Mengimpor data akan menghapus DATA RULE yang ada sebelumnya. 
                    Import data ini akan otomatis menggunakan data dari pakar. 
                    Klik Submit untuk melanjutkan.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
            </div>
            </div>
            </form>
        </div>
        </div>
        <!-- end modal-->

    </div>
    <!-- content-wrapper ends -->