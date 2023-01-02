<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="/favicon.svg" type="image/svg+xml">


    <!-- 
        - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae2a321f3f.js" crossorigin="anonymous"></script>

    <!-- caribuku -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- 
        - custom css link
    -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <style>
        #hasil_cari {
            padding-top: 200px;
            background: #333;
            color: white;
        }

        table img {
            width: 100px;
        }

        #map {
            height: 400px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

        #example_filter label {
            font-weight: normal;
            white-space: nowrap;
            text-align: left;
            display: inline-block;
        }

        #example_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: auto;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body id="top">

    <!-- 
    - /#HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <div class="overlay" data-overlay></div>

            <a href="/#" class="logo">
                <img src="/assets/images/logo_p.png" alt="PustakaOne logo" style="height: 80px; weight: 80px;">
            </a>

            <div class="header-actions">

                <form action="/search" method="GET" class="search-bar input-group w-auto" style="white-space: nowrap;">
                    <input class="form-control-sm d-inline-block w-auto" placeholder="Search" type="text" name="s" required>
                    <button class="search-btn d-inline-block ms-1 me-3 form-control-sm" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <div class="lang-wrapper">
                    <label for="language">
                        <ion-icon name="globe-outline"></ion-icon>
                    </label>

                    <select name="language" id="language">
                        <option value="en">EN</option>
                        <option value="au">ID</option>
                    </select>
                </div>

                <a href="/login" class="btn btn-primary">Sign in</a>

            </div>

            <button class="menu-open-btn" data-menu-open-btn>
                <ion-icon name="reorder-two"></ion-icon>
            </button>

            <nav class="navbar" data-navbar>

                <div class="navbar-top">

                    <a href="/" class="logo">
                        <img src="/assets/images/logo_p.png" alt="PustakaOne logo">
                    </a>

                    <button class="menu-close-btn" data-menu-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                </div>
                <div class="navbar-top">
                    <form action="/search" method="GET" class="search-bar input-group" style="white-space: nowrap;">
                        <input class="form-control-sm d-inline-block w-auto" placeholder="Search" type="text" name="s" required>
                        <button class="search-btn d-inline-block ms-1 me-3 form-control-sm btn-search-mobile" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <ul class="navbar-list">

                    <li>
                        <a href="/#" class="navbar-link">Beranda</a>
                    </li>

                    <li>
                        <a href="/#about" class="navbar-link">Tentang PustakaOne</a>
                    </li>

                    <li>
                        <a href="/#daftar" class="navbar-link">Daftar Buku</a>
                    </li>


                    <li>
                        <a href="/#pustakawan" class="navbar-link">Pustakawan</a>
                    </li>
                </ul>



                <ul class="navbar-social-list">

                    <li>
                        <a href="https://www.youtube.com" class="navbar-social-link">
                            <ion-icon name="logo-youtube"></ion-icon>
                        </a>
                    </li>

                    <li>
                        <a href="https://github.com/rolandvincent/PustakaOne" class="navbar-social-link">
                            <ion-icon name="logo-github"></ion-icon>
                        </a>
                    </li>

                </ul>

            </nav>

        </div>
    </header>
    <!--header section end -->

    <?= $this->renderSection('content'); ?>

    <!-- 
    - /#FOOTER
  -->

    <footer class="footer">

        <div class="footer-top">
            <div class="container">

                <div class="footer-brand-wrapper" style="justify-content: flex-start;">

                    <a href="/#" class="logo">
                        <img src="/assets/images/logo_p.png" alt="PustakaOne logo">
                    </a>
                    <div>
                        <h2 class="text-light ms-2">Pustaka<span class="text-warning d-inline fw-bold">ONE</span></h2>
                        <h6 class="text-light ms-2">&copy; 2023 PustakaONE. All Rights Reserved</h6>
                    </div>


                </div>

                <div class="divider"></div>

                <div class="quicklink-wrapper">

                    <ul class="quicklink-list">

                        <li>
                            <a href="/#" class="quicklink-link">Faq</a>
                        </li>

                        <li>
                            <a href="/#" class="quicklink-link">Help center</a>
                        </li>

                        <li>
                            <a href="/#" class="quicklink-link">Terms of use</a>
                        </li>

                        <li>
                            <a href="/#" class="quicklink-link">Privacy</a>
                        </li>

                    </ul>

                    <ul class="social-list">

                        <li>
                            <a href="https://youtube.com" class="social-link">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </li>

                        <li>
                            <a href="https://github.com/rolandvincent/PustakaOne" class="social-link">
                                <ion-icon name="logo-github"></ion-icon>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">

                <p class="copyright">
                    &copy; 2023 PustakaONE. All Rights Reserved
                </p>
            </div>
        </div>

    </footer>





    <!-- 
- /#GO TO TOP
-->

    <a href="/#top" class="go-top" data-go-top>
        <ion-icon name="chevron-up"></ion-icon>
    </a>





    <!-- 
- custom js link
-->
    <script src="/assets/js/script.js"></script>

    <!-- 
- ionicon link
-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
</body>

</html>