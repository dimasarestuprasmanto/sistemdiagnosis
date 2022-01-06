<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Gejala Tanaman Bawang Merah</h4>
                    <?php if ($this->session->flashdata('flash')) : ?>
                        <div class="alert alert-primary" role="alert">
                            Data Gejala <?= $this->session->flashdata('flash'); ?>
                        </div>
                    <?php endif ?>

                    <a href="gejala/tambah_gejala" type="button" class="btn btn-primary btn-fw float-right">Tambah Gejala</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
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
                                            <a href="gejala/edit/<?= $g->id ?>" class="btn-sm btn-inverse-info btn-icon">
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