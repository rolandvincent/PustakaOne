<?= $this->extend('templates\home_template') ?>

<?= $this->section('content') ?>

<div class="" id="hasil_cari">
    <div class="container">
        <table id="example" class="table table-dark table-striped pt-3" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Kota Terbit</th>
                    <th>Bahasa</th>
                    <th>ISBN/ISSN</th>
                    <th>Edisi</th>
                    <th>Subyek</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($hasil as $h) : ?>
                    <tr>
                        <td class="align-middle"><img src="/img/sampul/<?= $h['img_sampul']; ?>" alt="buku 1"></td>
                        <td class="align-middle"><?= $h['judul']; ?></td>
                        <td class="align-middle"><?= $h['penulis']; ?></td>
                        <td class="align-middle"><?= $h['penerbit']; ?></td>
                        <td class="align-middle"><?= $h['tahun_terbit']; ?></td>
                        <td class="align-middle"><?= $h['kota_terbit']; ?></td>
                        <td class="align-middle"><?= $h['bahasa']; ?></td>
                        <td class="align-middle"><?= $h['ISBN_ISSN']; ?></td>
                        <td class="align-middle"><?= $h['edisi']; ?></td>
                        <td class="align-middle"><?= $h['subyek']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>