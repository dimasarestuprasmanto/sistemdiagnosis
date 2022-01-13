<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                        <div>
                            <h4 class="card-title">Daftar Penyakit</h4>
                        </div>
                    </div>
                    <p class="card-description mb-2">
                        Silahkan klik pada gambar untuk melihat lebih detail.
                    </p>
                    <div class="row">
                    <?php foreach ($datapenyakit as $p) : ?>
                        <a href="info/detail/<?= encrypt_url($p->id) ?>">
                        <div class="col-md-3 grid-margin stretch-card">
                            <div class="card">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img class="card-img-top embed-responsive-item" src="<?= base_url('assets/images/penyakit/' . $p->image) ?>" />
                            </div>
                            <div class="card-block mb-3 mt-3 text-center">
                                <h5 class="mb-0 card-title"><?= $p->name ?></h5>
                            </div>
                            </div>
                        </div>
                        </a>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>

    </div>