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
          <img src="/img/sampul/buku 5.png" alt="detail buku">
        </figure>

        <div class="movie-detail-content">

          <p class="detail-subtitle">Judul Buku</p>

          <h1 class="h1 detail-title">
            Nama <strong>Penulis</strong>
          </h1>

          <div class="meta-wrapper">

            <div class="badge-wrapper">
              <div class="badge badge-fill">Tersedia</div>

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
              <div class="label col-6">Judul Seri</div>
              <div class="label col-6">: null</div>
            </div>
            <div class="row">
              <div class="label col-6">Penerbit</div>
              <div class="label col-6">: null</div>
            </div>
            <div class="row">
              <div class="label col-6">Kota Terbit</div>
              <div class="label col-6">: null</div>
            </div>
            <div class="row">
              <div class="label col-6">Bahasa</div>
              <div class="label col-6">: null</div>
            </div>
            <div class="row">
              <div class="label col-6">ISBN/ISSN</div>
              <div class="label col-6">: null</div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </article>
</main>
<?= $this->endSection() ?>