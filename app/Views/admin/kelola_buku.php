<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="m-0 row">
        <a href="/admin/add/buku" class="btn btn-primary col-sm-2 mb-3">Tambah Buku</a>
        <div class="col-sm-10 mb-3">

            <form method="GET" class="input-group">
                <input type="text" class="form-control" name="s" placeholder="Cari buku" aria-label="Cari buku" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary " type="sumbit" id="button-addon2">Cari</button>
            </form>
        </div>
    </div>
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-<?= session()->getFlashdata("type"); ?>" role="alert"><?= session()->getFlashdata("message"); ?></div>
    <?php endif; ?>
    <div class="card">
        <h5 class="card-header">Daftar Buku</h5>
        <div class="table-responsive text-nowrap" style="overflow:auto;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sampul</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($buku as $book) : ?>
                        <tr>
                            <td><img style="width: 100px;" src="/img/sampul/<?= $book['img_sampul']; ?>" /></td>
                            <td class="text-wrap"><strong><?= $book['judul']; ?></strong></td>
                            <td><?= $book['penulis']; ?></td>
                            <td><?= $book['penerbit']; ?></td>
                            <td><?= $book['tahun_terbit']; ?></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/detail/buku/<?= $book['id']; ?>"><i class="bx bx-info-circle me-1"></i> Lihat Detail</a>
                                        <a class="dropdown-item" href="/admin/edit/buku/<?= $book['id']; ?>"><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <button class="dropdown-item" onclick="del_buku(<?= $book['id']; ?>,'<?= addslashes($book['judul']); ?>')"><i class="bx bx-trash me-1"></i> Hapus</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mx-3">
            <?= $pager->links('buku', 'bootstrap'); ?> <span class="ms-2">Total <?= $pager->getTotal('buku'); ?> hasil</span>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<!-- / Content -->
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    function del_buku(id, judul) {
        if (confirm(`Apakah anda ingin menghapus buku ${judul}?`)) {
            window.location = `/admin/delete/buku/${id}`;
        }
    }
</script>
<?= $this->endSection() ?>