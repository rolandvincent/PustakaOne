<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>

<?php
$selected = $user;
if (isset($user_select))
    $selected = $user_select;
?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">

            <div class="row">
                <div class="col-12 d-block">
                    <div class="profile-field">Nama</div>
                    <span>: <?= $selected['nama']; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Email</div>
                    <span>: <?= $selected['email']; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Username</div>
                    <span>: <?= $selected['username']; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Tanggal Lahir</div>
                    <span>: <?= date("d/m/Y", strtotime($selected['TTGL'])); ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Jenis Kelamin</div>
                    <span>: <?= $selected['JK'] == 'L' ? "Laki-laki" : "Perempuan"; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">No. Telp</div>
                    <span>: <?= $selected['no_telp']; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Alamat</div>
                    <span>: <?= $selected['alamat']; ?></span>
                </div>
                <div class="col-12 d-block">
                    <div class="profile-field">Hak akses</div>
                    <span>: <?= hak_akses($selected['role']); ?></span>
                </div>
                <?php if ($selected['role'] == 2) : ?>
                    <div class="col-12 d-block">
                        <div class="profile-field">Jenis Membership</div>
                        <span>: <?= Membership($membership ? $membership['jenis'] : 0); ?></span>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php if ($selected['role'] == 2 && $membership != null) : ?>

        <div class="card mb-4">
            <h5 class="card-header">Membership</h5>
            <div class="card-body">


            </div>
        </div>
    <?php endif; ?>
</div>
<!-- / Content -->
<?= $this->endSection() ?>