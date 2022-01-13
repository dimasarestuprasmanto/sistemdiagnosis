<div class="main-panel">
    <div class="content-wrapper">
        <section class="py-5">
        <h3 class="card-title">Daftar Penyakit</h3>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <?php foreach ($datapenyakit as $p) : ?>
                        <div class="col mb-5">
                            <div class="card">
                                <!-- Product image-->
                                <img class="card-img-top img-responsive" src="<?= base_url('assets/images/penyakit/' . $p->image) ?>" alt="..." width="170px" height="230px" />
                                <!-- Product details-->
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h6 class="fw-bolder">
                                        <p class="truncate mt-1"><?= $p->name ?></p>
                                    </h6>

                                    <div class="card-footer pt-0 border-top-0 bg-transparent">
                                        <a href="info/detail/<?= encrypt_url($p->id) ?>" class="btn btn-sm btn-success">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>

            </div>
        </section>


    </div>