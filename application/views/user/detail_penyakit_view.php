<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Nama Penyakit : <strong class="text-info"><?= $data['name']; ?></strong></h3>

                    <img class="img-fluid" src="<?= base_url('assets/images/penyakit/' . $data['image']) ?>" style="width: 320px; align-items:center;" alt="image"  />

                    <h3 class="card-title mb-3 mt-5">Deskripsi Penyakit</h3>
                    <blockquote class="blockquote blockquote-info">
                        <p class="mb-0"><?= $data['description']; ?></p>
                    </blockquote>

                    <h3 class="card-title mb-3 mt-5">Gejala Penyakit</h3>
                    <blockquote class="blockquote blockquote-info">
                        <p class="mb-0"><?= $gejala['detail']; ?></p>
                    </blockquote>

                    <h3 class="card-title mb-3 mt-5">Solusi Penyembuhan</h3>
                    <blockquote class="blockquote blockquote-info">
                        <p class="mb-0"><?= $data['solution']; ?></p>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="mb-5 mt-3"">
            <button onclick="history.back()" class="btn btn-md btn-block btn-success">Kembali</button>
        </div>
    </div>