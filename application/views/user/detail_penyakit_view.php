<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h2 class="">Penyakit : <?= $data['name']; ?></h2>
                    <img class="rounded mx-auto d-block" src="<?= base_url('assets/images/penyakit/' . $data['image']) ?>" alt="..." width="350" height="350" />

                    <h2 class="mt-5">Deskripsi Penyakit</h2>
                    <p><?= $data['description']; ?></p>
                    <h2>Gejala Penyakit</h2>
                    <p><?= $data['name']; ?></p>
                    <h2>Solusi Penyembuhan</h2>
                    <p><?= $data['solution']; ?></p>
                </div>
            </div>
        </div>
    </div>