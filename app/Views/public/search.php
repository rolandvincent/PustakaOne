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
                <tr>
                    <td class="align-middle"><img src="/img/sampul/buku 1.png" alt="buku 1"></td>
                    <td class="align-middle">Kimia Organik</td>
                    <td class="align-middle">Ralph J Fessenden</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">Indonesia</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Farmasi</td>
                </tr>
                <tr>
                    <td class="align-middle"><img src="/img/sampul/buku 2.png" alt="buku 2"></td>
                    <td class="align-middle">Kimia Organik</td>
                    <td class="align-middle">Ralph J Fessenden</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">Indonesia</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Farmasi</td>
                </tr>
                <tr>
                    <td class="align-middle"><img src="/img/sampul/buku 3.png" alt="buku 3"></td>
                    <td class="align-middle">Kimia Organik</td>
                    <td class="align-middle">Ralph J Fessenden</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">Indonesia</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Farmasi</td>
                </tr>
                <tr>
                    <td class="align-middle"><img src="/img/sampul/buku 4.png" alt="buku 4"></td>
                    <td class="align-middle">Kimia Organik</td>
                    <td class="align-middle">Ralph J Fessenden</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">Indonesia</td>
                    <td class="align-middle">null</td>
                    <td class="align-middle">1</td>
                    <td class="align-middle">Farmasi</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>