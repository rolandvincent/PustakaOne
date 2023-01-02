<?= $this->extend('templates\home_template') ?>

<?= $this->section('content') ?>
<!-- CONTENT -->


<main>
    <article>
        <!-- 
        - #HERO
      -->

        <section class="hero">
            <div class="container">

                <div class="hero-content">

                    <p class="hero-subtitle">PustakaOne</p>

                    <h1 class="h1 hero-title">
                        Pustaka<strong>ONE</strong>, "Tempat belajar dan penelitian terlengkap, akses mudah di mana saja dengan aplikasi perpustakaan online kami"
                    </h1>

                    <div class="meta-wrapper">

                        <div class="badge-wrapper">
                            <div class="badge badge-fill"></div>

                            <div class="badge badge-outline"></div>
                        </div>
                    </div>

                    <button class="btn btn-primary">
                        <ion-icon name="book"></ion-icon>

                        <span>Baca Sekarang</span>
                    </button>

                </div>

            </div>
        </section>





        <!-- 
        - #UPCOMING
      -->

        <section class="upcoming">
            <div class="container">

                <div class="flex-wrapper">

                    <div class="title-wrapper">
                        <p class="section-subtitle">Online Book</p>

                        <h2 class="h2 section-title">Trending Book</h2>
                    </div>


                </div>

                <ul class="movies-list  has-scrollbar">
                    <?php foreach ($popular as $buku) : ?>
                        <li>
                            <div class="movie-card">
                                <a href="detail/<?= $buku['id']; ?>">
                                    <figure class="card-banner">
                                        <img src="/img/sampul/<?= $buku['img_sampul']; ?>" alt="buku 1">
                                    </figure>
                                </a>
                                <div class="title-wrapper">
                                    <a href="detail/<?= $buku['id']; ?>">
                                        <h3 class="card-title"><?= $buku['judul']; ?></h3>
                                    </a>
                                </div>
                                <div class="card-meta">
                                    <div class="badge badge-outline"><?= $buku['penulis']; ?></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>
        </section>





        <!-- 
        - #SERVICE
      -->

        <section class="service" id="about">
            <div class="container">

                <div class="service-banner">
                    <figure>
                        <img src="./assets/images/membership.png" alt="jenis membership" style="weight: 300px; height: 600px;">
                    </figure>

                    <a href="./assets/images/membership.png" download class="service-btn">
                        <span>Download</span>

                        <ion-icon name="download-outline"></ion-icon>
                    </a>
                </div>

                <div class="service-content">

                    <p class="service-subtitle">Info Perpustakaan</p>

                    <h2 class="h2 service-title">PustakaOne</h2>

                    <p class="service-text" style="text-align:justify;">
                        PustakaONE adalah organisasi yang mendukung kegiatan akademik dengan
                        menyediakan aplikasi perpustakaan online dan lokasi fisik yang terbuka
                        untuk umum. Melalui aplikasi ini, pengguna dapat mencari dan meminjam buku
                        sesuai dengan keanggotaan mereka. PustakaONE juga menyediakan fitur pencarian
                        dan informasi tentang ketersediaan buku sehingga pengguna tidak perlu datang ke
                        lokasi fisik untuk mengeceknya. Selain itu, pengguna juga dapat mendaftar sebagai
                        anggota dan meminjam buku dengan batas waktu tertentu yang ditentukan oleh keanggotaan mereka.
                    </p>

                    <ul class="service-list">

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="book"></ion-icon>
                                </div>

                                <div class="card-content">
                                    <h3 class="h3 card-title">Enjoy on Your Book.</h3>

                                    <p class="card-text" style="text-align:justify;">
                                        Jangan lewatkan kesempatan untuk menikmati layanan
                                        perpustakaan profesional di PustakaONE, mulai dari
                                        pencarian hingga peminjaman buku.
                                    </p>
                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="service-card">

                                <div class="card-icon">
                                    <ion-icon name="location"></ion-icon>
                                </div>

                                <div class="card-content">
                                    <h3 class="h3 card-title">Read Everywhere.</h3>

                                    <p class="card-text">
                                        Buku yang dapat dibaca dimana-mana, mengikuti Anda kemanapun pergi
                                    </p>
                                </div>

                            </div>
                        </li>

                    </ul>

                </div>

            </div>
        </section>


        <section class="top-rated" id="daftar">
            <div class="container">
                <h1 class="text-center"><i class="fa-solid fa-location-dot text-warning"></i></h1>

                <h2 class="h2 section-title">Lokasi Kami</h2>

                <div id="map"></div>

            </div>
        </section>


        <!-- 
        - #Daftar Buku
      -->

        <section class="top-rated" id="daftar">
            <div class="container">

                <p class="section-subtitle">Online Book</p>

                <h2 class="h2 section-title">Daftar Buku</h2>

                <?= $pager->links('daftar', 'custom'); ?>

                <ul class="movies-list">
                    <?php foreach ($daftar_buku as $buku) : ?>
                        <li>
                            <div class="movie-card">
                                <a href="/detail/<?= $buku['id']; ?>">
                                    <figure class="card-banner">
                                        <img src="/img/sampul/<?= $buku['img_sampul']; ?>" alt="buku ">
                                    </figure>
                                </a>
                                <div class="title-wrapper">
                                    <a href="/detail/<?= $buku['id']; ?>">
                                        <h3 class="card-title"><?= $buku['judul']; ?></h3>
                                    </a>
                                </div>
                                <div class="card-meta">
                                    <div class="badge badge-outline"><?= $buku['penulis']; ?></div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </section>





        <!-- 
        - #Pustakawan
      -->

        <section class="tv-series" id="pustakawan">
            <div class="container">

                <p class="section-subtitle">Pustakawan</p>

                <h2 class="h2 section-title">Profil Pustakawan</h2>

                <ul class="movies-list">

                    <li>
                        <div class="movie-card">

                            <a href="./movie-details.html">
                                <figure class="card-banner">
                                    <img src="./assets/images/faiz.jpg" alt="Nama">
                                </figure>
                            </a>

                            <div class="title-wrapper" style="text-align:center;">
                                <a href="./movie-details.html">
                                    <h3 class="card-title">Muhammad Faiz Bachrul Akbar</h3>
                                    <br>
                                    <h3 class="card-title">Pustakawan</h3>
                                    <br>
                                    <h3 class="card-title">1910631170209</h3>
                                    <br>
                                    <h3 class="card-title">1910631170209@student.unsika.ac.id</h3>
                                </a>
                            </div>

                            <div class="card-meta">
                                <div class="badge badge-outline">-------------------------------------------</div>
                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="movie-card">

                            <a href="./movie-details.html">
                                <figure class="card-banner">
                                    <img src="./assets/images/vincent.jpg" alt="Nama">
                                </figure>
                            </a>

                            <div class="title-wrapper" style="text-align:center;">
                                <a href="./movie-details.html">
                                    <h3 class="card-title">Roland Vincent Sitanggang</h3>
                                    <br>
                                    <h3 class="card-title">Pustakawan</h3>
                                    <br>
                                    <h3 class="card-title">1910631170131</h3>
                                    <br>
                                    <h3 class="card-title">1910631170131@student.unsika.ac.id</h3>
                                </a>
                            </div>

                            <div class="card-meta">
                                <div class="badge badge-outline">-------------------------------------------</div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="movie-card">

                            <a href="./movie-details.html">
                                <figure class="card-banner">
                                    <img src="./assets/images/rizky.jpg" alt="Nama">
                                </figure>
                            </a>

                            <div class="title-wrapper" style="text-align:center;">
                                <a href="./movie-details.html">
                                    <h3 class="card-title">Rizqy Arya Pratama</h3>
                                    <br>
                                    <h3 class="card-title">Pustakawan</h3>
                                    <br>
                                    <h3 class="card-title">1910631170130</h3>
                                    <br>
                                    <h3 class="card-title">1910631170130@student.unsika.ac.id</h3>
                                </a>
                            </div>

                            <div class="card-meta">
                                <div class="badge badge-outline">-------------------------------------------</div>
                            </div>

                        </div>
                    </li>
                    <li>
                        <div class="movie-card">

                            <a href="./movie-details.html">
                                <figure class="card-banner">
                                    <img src="./assets/images/riki.jpg" alt="Nama">
                                </figure>
                            </a>

                            <div class="title-wrapper" style="text-align:center;">
                                <a href="./movie-details.html">
                                    <h3 class="card-title">Riky Priatna Kurniawan</h3>
                                    <br>
                                    <h3 class="card-title">Pustakawan</h3>
                                    <br>
                                    <h3 class="card-title">1910631170039</h3>
                                    <br>
                                    <h3 class="card-title">1910631170039@student.unsika.ac.id</h3>
                                </a>
                            </div>

                            <div class="card-meta">
                                <div class="badge badge-outline">-------------------------------------------</div>
                            </div>

                        </div>
                    </li>

                </ul>

            </div>
        </section>





        <!-- 
        - #CTA
      -->

        <section class="cta">
            <div class="container">

                <div class="title-wrapper">
                    <h2 class="cta-title text-center">Join Membership Sekarang</h2>

                    <p class="cta-text text-center">
                        Hubungi kami melalui email yang tertera di profil kami
                    </p>
                </div>


            </div>
        </section>

    </article>
</main>

<script>
    function initMap() {
        // The location of Uluru
        const uluru = {
            lat: -6.3232926,
            lng: 107.3041507
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }

    window.initMap = initMap;
</script>
<?= $this->endSection() ?>