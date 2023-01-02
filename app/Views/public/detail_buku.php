<?= $this->extend('templates\home_template') ?>

<?= $this->section('content') ?>
<!-- CONTENT -->
<main>
  <article>

    <!-- 
        - #DETAIL BUKU
5     -->

    <section class="movie-detail">
      <div class="container">

        <figure class="movie-detail-banner">
          <img src="/img/sampul/<?= $buku['img_sampul']; ?>" alt="detail buku">
        </figure>

        <div class="movie-detail-content">

          <p class="detail-subtitle"><?= $buku['penulis']; ?></p>

          <h1 class="h1 detail-title">
            <?= $buku['judul']; ?>
          </h1>

          <div class="meta-wrapper">

            <div class="badge-wrapper">
              <div class="badge badge-fill"><?= $buku['count'] > 0 ? "Tersedia" : "Tidak Tersedia"; ?></div>

              <div class="badge badge-outline"></div>
            </div>
          </div>
          <!-- <div class="storyline">
            <span class="label">Judul Seri:</span> <span class="value">19191919</span>
            <span class="label">Penerbit:</span> <span class="value">Gramedia</span>
            <span class="label">Kota Terbit:</span> <span class="value">Karawang</span>
            <span class="label">Tahun Terbit:</span> <span class="value">2022</span>
            <span class="label">Bahasa:</span> <span class="value">Indonesia</span>
            <span class="label">ISBN/ISSN:</span> <span class="value">91919191919</span>
            <span class="label">Edisi:</span> <span class="value">Satu</span>
            <span class="label">Subyek:</span> <span class="value">Farmasi</span>
          </div> -->

          <div class="storyline">
            <div class="row">
              <div class="label col-2">Penerbit</div>
              <div class="label col-6">: <?= $buku['penerbit'] ?: '-'; ?></div>
            </div>
            <div class="row">
              <div class="label col-2">Kota Terbit</div>
              <div class="label col-6">: <?= $buku['kota_terbit'] ?: '-'; ?></div>
            </div>
            <div class="row">
              <div class="label col-2">Bahasa</div>
              <div class="label col-6">: <?= $buku['bahasa'] ?: '-'; ?></div>
            </div>
            <div class="row">
              <div class="label col-2">ISBN/ISSN</div>
              <div class="label col-6">: <?= $buku['ISBN_ISSN'] ?: '-'; ?></div>
            </div>
            <div class="row">
              <div class="label col-2">Edisi</div>
              <div class="label col-6">: <?= $buku['edisi'] ?: '-'; ?></div>
            </div>
            <div class="row">
              <div class="label col-2">Subyek</div>
              <div class="label col-6">: <?= $buku['subyek'] ?: '-'; ?></div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </article>
</main>
<?= $this->endSection() ?>