        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/images/logo.svg') ?>" alt="logo">
                            </div>
                            <h6 class="fw-light">Silahkan Login</h6>
                            <?php echo $this->session->flashdata('msg');?>
                            <form class="pt-3" action="<?php echo site_url('login/auth');?>" method="POST">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" spellcheck="false" aria-live="polite"  class="form-control form-control-lg" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" value="remember-me"> Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Lupa kata sandi</a>
                                </div>
                                <div class="text-center mt-4 fw-light">
                                    Pengguna baru? <a href="register" class="text-primary">Daftar disini</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->