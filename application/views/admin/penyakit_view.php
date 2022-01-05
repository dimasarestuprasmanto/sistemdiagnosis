<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Penyakit Tanaman Bawang Merah</h4>
                    <?php if ($this->session->flashdata('flash-penyakit')) : ?>
                        <div class="alert alert-success" role="alert">
                            Data Penyakit Berhasil <?= $this->session->flashdata('flash-penyakit'); ?>
                        </div>
                    <?php endif ?>
                    <a href="penyakit/tambah_penyakit" type="button" class="btn btn-primary btn-fw float-right">Tambah Penyakit</a>
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
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
                                            <a href="penyakit/edit/<?= $p->id ?>" class="btn-sm btn-inverse-info btn-icon">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->