<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="m-0 row">
        <a href="/admin/add_user?continue=%2Fadmin%2Fkelola-pustakawan" class="btn btn-primary col-sm-2 mb-3">Tambah Pustakawan</a>
        <div class="col-sm-10 mb-3">

            <form method="GET" class="input-group">
                <input type="text" class="form-control" name="s" placeholder="Cari pustakawan" aria-label="Cari pustakawan" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary " type="sumbit" id="button-addon2">Cari</button>
            </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-<?= session()->getFlashdata("type"); ?>" role="alert"><?= session()->getFlashdata("message"); ?></div>
    <?php endif; ?>
    <div class="card">
        <h5 class="card-header">Pustakawan</h5>
        <div class="table-responsive text-nowrap" style="overflow:visible;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>No Telp.</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($pustakawan as $pusta) : ?>
                        <tr>
                            <td><strong><?= $pusta['nama']; ?></strong></td>
                            <td><?= $pusta['email']; ?></td>
                            <td><?= $pusta['username']; ?></td>
                            <td>
                                <?= $pusta['no_telp']; ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/detail_user/<?= $pusta['username']; ?>"><i class="bx bx-info-circle me-1"></i> Lihat Detail</a>
                                        <a class="dropdown-item" href="/admin/edit_user?username=<?= $pusta['username']; ?>&continue=%2Fadmin%2Fkelola-pustakawan"><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <button class="dropdown-item" onclick="del_user('<?= $pusta['username']; ?>')"><i class="bx bx-trash me-1"></i> Hapus</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mx-3">
                <?= $pager->links('pustakawan', 'bootstrap'); ?> <span class="ms-2">Total <?= $pager->getTotal('pustakawan'); ?> hasil</span>
            </div>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<!-- / Content -->
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    function del_user(username) {
        if (confirm(`Apakah anda ingin menghapus user ${username}?`)) {
            window.location = `/admin/delete?username=${username}&continue=%2Fadmin%2Fkelola-pustakawan`;
        }
    }
</script>
<?= $this->endSection() ?>