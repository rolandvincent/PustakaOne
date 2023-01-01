<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-<?= session()->getFlashdata("type"); ?>" role="alert"><?= session()->getFlashdata("message"); ?></div>
                <?php endif; ?>

                <div class="card mb-4">
                    <h5 class="card-header"><?= $title; ?></h5>

                    <div class="card-body">
                        <form method="POST" action="/profil/edit-password">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="current_password" class="form-label">Password Saat Ini</label>
                                    <input class="form-control  <?= $validation->hasError("current_password") ? "is-invalid" : ""; ?>" type="password" id="current_password" name="current_password" placeholder="***" autofocus />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError("current_password"); ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="new_password" class="form-label">Password Baru</label>
                                    <input class="form-control <?= $validation->hasError("new_password") ? "is-invalid" : ""; ?>" type="password" name="new_password" id="new_password" placeholder="***" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError("new_password"); ?>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="confirm_password" class="form-label">Ulangi Password Baru</label>
                                    <input class="form-control <?= $validation->hasError("confirm_password") ? "is-invalid" : ""; ?>" type="password" name="confirm_password" id="confirm_password" placeholder="***" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError("confirm_password"); ?>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>