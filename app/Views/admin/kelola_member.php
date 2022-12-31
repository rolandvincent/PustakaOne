<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="m-0 row">
        <button type="button" class="btn btn-primary col-sm-2 mb-3">Tambah Member</button>
        <div class="col-sm-10 mb-3">

            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Cari member" aria-label="Cari member" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary " type="button" id="button-addon2">Cari</button>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Members</h5>
        <div class="table-responsive text-nowrap" style="overflow:visible;">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>No Telp.</th>
                        <th>Membership</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php foreach ($members as $mem) : ?>
                        <tr>
                            <td><strong><?= $mem['nama']; ?></strong></td>
                            <td><?= $mem['email']; ?></td>
                            <td><?= $mem['username']; ?></td>
                            <td>
                                <?= $mem['no_telp']; ?>
                            </td>
                            <td><span class="badge <?= MembershipCSS($mem['membership']); ?> me-1"><?= Membership($mem['membership']) ?></span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/admin/detail_user/<?= $mem['username']; ?>"><i class="bx bx-info-circle me-1"></i> Lihat Detail</a>
                                        <a class="dropdown-item" href="/admin/edit_user/<?= $mem['username']; ?>"><i class="bx bx-edit-alt me-1"></i> Ubah</a>
                                        <a class="dropdown-item" href="/admin/hapus_user/<?= $mem['username']; ?>"><i class="bx bx-trash me-1"></i> Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Layout Demo -->
</div>
<!-- / Content -->

<!-- Content wrapper -->
<?= $this->endSection() ?>