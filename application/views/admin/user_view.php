<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data User</h4>

                    <a href="user/tambah_user" type="button" class="btn btn-primary btn-icon-text">
                        <i class="ti-plus btn-icon-prepend"></i>
                        Tambah Data
                    </a>

                    <div class="table-responsive pt-3">
                        <table class="table table-hover table-bordered" id="tabelpenyakit">
                            <thead>
                                <tr>
                                    <th class="col-2">
                                        Nama
                                    </th>
                                    <th class="col-2">
                                        No. Telp
                                    </th>
                                    <th class="col-7">
                                        Alamat
                                    </th>

                                    <th class="col-1">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        dummy
                                    </td>
                                    <td>
                                        dummy
                                    </td>
                                    <td>
                                        dummy
                                    </td>
                                    <td>
                                        <a href="user/edit/" class="btn-sm btn-inverse-info btn-icon">
                                            <i class="mdi mdi-lead-pencil"></i>
                                        </a>
                                        &nbsp
                                        <a href="user/hapus/ class=" btn-sm btn-inverse-danger btn-icon" onclick="return confirm('Apakah anda yakin ingin menghapus');">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
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