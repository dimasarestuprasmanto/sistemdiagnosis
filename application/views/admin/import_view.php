<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Import Data Training</h4>
                    <form action="<?=base_url('/admin/import/excel')?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group col-lg-7">
                            <label for="jumlah">Jumlah data yang akan di import</label>
                            <input class="form-control" placeholder="0" type="number" name="jumlah" required>
                        </div>
                        <div class="form-group col-lg-9">
                            <label for="fileExcel">Silahkan pilih file</label>
                            <input class="form-control" type="file" name="fileExcel" required>
                            <small class="text-muted" style="font-size: x-small;"><i>hanya support file dengan ekstensi .xlsx dan .csv</i></small>
                        </div>
                        <div class="form-group col-lg-9">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Reset</button>
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
