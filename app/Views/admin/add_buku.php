<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header"><?= $title; ?></h5>

                <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="/admin/add/buku">
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert alert-<?= session()->getFlashdata("type"); ?>" role="alert"><?= session()->getFlashdata("message"); ?></div>
                    <?php endif; ?>

                    <div class="card-body">

                        <div class="row">
                            <label for="sampul" class="form-label">Sampul</label>
                            <div class="d-flex align-items-start align-items-sm-center gap-4" id="sampul">
                                <img src="/img/avatars/default.png" alt="user-avatar" class="d-block rounded" width="120" id="uploadedAvatar" />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Unggah sampul</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" name="sampul" hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <span class="text-danger d-block"><?= $validation->getError("avatar"); ?></span>

                                    <p class="text-muted mb-0">Dizinkan JPG, GIF atau PNG. Ukuran Maksimum 800K</p>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="judul" class="form-label">Judul</label>
                                <input class="form-control  <?= $validation->hasError("judul") ? "is-invalid" : ""; ?>" type="text" id="judul" name="judul" value="<?= old("judul"); ?>" placeholder="Sejarah Indonesia" autofocus />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("judul"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input class="form-control <?= $validation->hasError("penulis") ? "is-invalid" : ""; ?>" type="text" name="penulis" id="penulis" value="<?= old("penulis"); ?>" placeholder="Alexander" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("penulis"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input class="form-control <?= $validation->hasError("penerbit") ? "is-invalid" : ""; ?>" type="text" id="penerbit" name="penerbit" value="<?= old("penerbit"); ?>" placeholder="Gramedia" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("penerbit"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="kota_terbit" class="form-label">Kota Terbit</label>
                                <input type="text" class="form-control <?= $validation->hasError("kota_terbit") ? "is-invalid" : ""; ?>" id="kota_terbit" name="kota_terbit" placeholder="Jakarta" value="<?= old("kota_terbit"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("kota_terbit"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="tahun_terbit">Tahun Terbit</label>
                                <input type="number" id="tahun_terbit" name="tahun_terbit" class="form-control <?= $validation->hasError("tahun_terbit") ? "is-invalid" : ""; ?>" placeholder="2001" value="<?= old("tahun_terbit"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("tahun_terbit"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="bahasa" class="form-label">Bahasa</label>
                                <input type="text" class="form-control <?= $validation->hasError("bahasa") ? "is-invalid" : ""; ?>" id="bahasa" name="bahasa" placeholder="Indonesia" value="<?= old("bahasa"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("bahasa"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="ISBN_ISSN" class="form-label">ISBN/ISSN</label>
                                <input type="text" class="form-control <?= $validation->hasError("ISBN_ISSN") ? "is-invalid" : ""; ?>" id="ISBN_ISSN" name="ISBN_ISSN" placeholder="1773-4994" value="<?= old("ISBN_ISSN"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("ISBN_ISSN"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="edisi" class="form-label">Edisi</label>
                                <input type="text" class="form-control <?= $validation->hasError("edisi") ? "is-invalid" : ""; ?>" id="edisi" name="edisi" placeholder="" value="<?= old("edisi"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("edisi"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="subyek" class="form-label">Subyek</label>
                                <input type="text" class="form-control <?= $validation->hasError("subyek") ? "is-invalid" : ""; ?>" id="subyek" name="subyek" placeholder="" value="<?= old("subyek"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("subyek"); ?>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="count" class="form-label">Jumlah Tersedia</label>
                                <input type="number" class="form-control <?= $validation->hasError("count") ? "is-invalid" : ""; ?>" id="count" name="count" placeholder="0" value="<?= old("count"); ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError("count"); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Tambah</button>
                            <a href="/admin/kelola-buku" class="btn btn-outline-secondary">Batal</a>
                        </div>
                    </div>
                </form>

                <!-- /Account -->
            </div>

        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function(e) {
        (function() {
            // Update/reset user image of account page
            let accountUserImage = document.getElementById('uploadedAvatar');
            const fileInput = document.querySelector('.account-file-input'),
                resetFileInput = document.querySelector('.account-image-reset');

            if (accountUserImage) {
                const resetImage = accountUserImage.src;
                fileInput.onchange = () => {
                    if (fileInput.files[0]) {
                        accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                    }
                };
                resetFileInput.onclick = () => {
                    fileInput.value = '';
                    accountUserImage.src = resetImage;
                };
            }
        })();
    });
</script>
<?= $this->endSection(); ?>