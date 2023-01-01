<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header"><?= $title; ?></h5>


                    <!-- Account -->
                    <?php if (isset($redirect)) : ?>
                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="/admin/save?continue=<?= urlencode($redirect); ?>&sender=1&action=user">
                        <?php else : ?>
                            <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="/admin/save?sender=1&action=user">

                            <?php endif; ?>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="<?= avatar($user_select); ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Unggah foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" name="avatar" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <span class="text-danger d-block"><?= $validation->getError("avatar"); ?></span>

                                        <p class="text-muted mb-0">Dizinkan JPG, GIF atau PNG. Ukuran Maksimum 800K</p>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <?php if (session()->getFlashdata('message')) : ?>
                                <div class="alert alert-<?= session()->getFlashdata("type"); ?>" role="alert"><?= session()->getFlashdata("message"); ?></div>
                            <?php endif; ?>

                            <div class="card-body">

                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $user_select['id']; ?>">
                                    <div class="mb-3 col-md-6">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input class="form-control  <?= $validation->hasError("nama") ? "is-invalid" : ""; ?>" type="text" id="nama" name="nama" value="<?= old("nama", $user_select['nama']); ?>" placeholder="John Doe" autofocus />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("nama"); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control <?= $validation->hasError("username") ? "is-invalid" : ""; ?>" type="text" name="username" id="username" value="<?= old("username", $user_select['username']); ?>" placeholder="john.doe" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("username"); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input class="form-control <?= $validation->hasError("email") ? "is-invalid" : ""; ?>" type="email" id="email" name="email" value="<?= old("email", $user_select['email']); ?>" placeholder="john.doe@example.com" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("email"); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="TTGL" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control <?= $validation->hasError("TTGL") ? "is-invalid" : ""; ?>" id="TTGL" name="TTGL" value="<?= old("TTGL", $user_select['TTGL']); ?>" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("TTGL"); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="no_telp">Nomor Telepon</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">IND (+62)</span>
                                            <input type="text" id="no_telp" name="no_telp" class="form-control" placeholder="812-1000-7000" value="<?= old("no_telp", $user_select['no_telp']); ?>" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control <?= $validation->hasError("alamat") ? "is-invalid" : ""; ?>" id="alamat" name="alamat" placeholder="Alamat" value="<?= old("alamat", $user_select['alamat']); ?>" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError("alamat"); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="uploadBtn" class="form-label">Foto KTP</label>
                                        <div class="d-flex mx-0">
                                            <label id="uploadBtn" for="uploadktp" class="btn btn-primary me-2" tabindex="0">
                                                <span class="d-none d-sm-block">Unggah KTP</span>
                                                <input type="file" id="uploadktp" name="ktp" hidden accept="image/png, image/jpeg" />
                                            </label>
                                            <input type="text" id="ktpfilename" disabled class="form-control" style="width: auto; flex-grow:1" value="Ktp.jpg">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="select2 form-select" id="status" name="status" value="Active">
                                            <option value="0">Tidak Aktif</option>
                                            <option value="1">Aktif</option>
                                            <option value="2">Banned</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                                    <?php if (isset($redirect)) : ?>
                                        <a href="<?= $redirect; ?>" class="btn btn-outline-secondary">Batal</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            </form>

                            <!-- /Account -->
                </div>

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

            const ktpInput = document.querySelector('#uploadktp');
            const ktpLabel = document.querySelector('#ktpfilename');

            ktpInput.onchange = () => {
                if (ktpInput.files[0]) {
                    ktpLabel.value = window.URL.createObjectURL(ktpInput.files[0].name);
                }
            }

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