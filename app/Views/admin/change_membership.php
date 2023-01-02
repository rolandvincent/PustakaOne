<?= $this->extend('templates/dashboard_template') ?>
<?= $this->section('content') ?>
<?= helper('converter'); ?>

<?php
$start_time = 0;
$end_time = 0;
if ($membership) {
    $start_time = strtotime($membership['date_start']);
    $end_time = $start_time + SECOND_OF_DAY * 30;
}

?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card mb-4">
        <h5 class="card-header"><?= $title; ?></h5>
        <div class="card-body">
            <p>Mengubah membership untuk user <strong><?= $user_select['username']; ?></strong></p>
            <form action="/admin/change/membership" method="POST" onsubmit="return save()">
                <input type="hidden" name="id" value="<?= $user_select['id']; ?>">
                <div class="row mb-3 align-items-center">
                    <label class="col-auto" for="basic-default-name">Jenis Membership</label>
                    <div class="col-sm-2">
                        <select name="jenis_member" id="membership_id w-auto" class="select2 form-select">
                            <option value="0" <?= $membership ? '' : 'selected'; ?>>Tidak Ada</option>
                            <option value="1" <?= $membership ? ($membership['jenis'] == 1 ? 'selected' : '') : ''; ?>>ONE</option>
                            <option value="2" <?= $membership ? ($membership['jenis'] == 2 ? 'selected' : '') : ''; ?>>ONE PLUS</option>
                            <option value="3" <?= $membership ? ($membership['jenis'] == 3 ? 'selected' : '') : ''; ?>>ONE ULTRA</option>
                        </select>
                    </div>
                </div>
                <div class="demo-inline-spacing">
                    <button type="sumbit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>
                    <a href="/admin/kelola-member" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
    <div class="card mb-4">
        <h5 class="card-header">Informasi Membership</h5>
        <div class="card-body">
            <p>Jenis membership sekarang <span class="badge <?= MembershipCSS($membership ? $membership['jenis'] : 0); ?>"><?= Membership($membership ? $membership['jenis'] : 0); ?></span> <?php if ($membership) : ?> (<?= $membership['status'] == 1 ? '<span class="text-success">Aktif</span>' : '<span class="text-danger">Tidak Aktif</span>'; ?>) <?php endif; ?></p>
            <?php if ($membership) : ?>
                <p>Periode aktif <mark><?= date("d-m-Y", $start_time); ?></mark> sampai <mark><?= date("d-m-Y", $end_time); ?></mark> (<?= time() > $end_time ? "Kadaluarsa" : "Sisa " . floor(($end_time - time()) / SECOND_OF_DAY) . " hari" ?>)</p>
                <p>Total pinjam <?= count($loan); ?> dari <?= membershipUsageLimit($membership['jenis']); ?> telah terpakai</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- / Content -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<script>
    function save() {

        if (<?= time() ?> < <?= $end_time; ?>) {
            if (confirm("Membership sebelumnya belum berakhir. Timpa membership sebelumnya?")) {
                return true
            } else {
                return false
            }
        } else {
            return true
        }
    }
</script>
<?= $this->endSection() ?>