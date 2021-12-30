<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Rule Tanaman Bawang Merah</h4>
                    <?php if ($this->session->flashdata('flash')) : ?>
                        <div class="alert alert-primary" role="alert">
                            Data Rule Berhasil <?= $this->session->flashdata('flash'); ?>
                        </div>
                    <?php endif ?>
                    <a href="rule/tambah_rule" type="button" class="btn btn-primary btn-fw float-right">Tambah Rule</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-4">
                                        ID Rule
                                    </th>
                                    <th class="col-4">
                                        Gejala
                                    </th>
                                    <th class="col-4">
                                        Penyakit
                                    </th>
                                    <th class="col-4">
                                        Belief
                                    </th>
                                    <th class="">
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
                                            <a href="rule/edit/<?= $r->id ?>" class="btn-sm btn-inverse-info btn-icon">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->