<?php
require_once __DIR__ . '/../../config/connection.php';

// Query ambil data dari tabel abouts
$qabout = "SELECT * FROM abouts LIMIT 1";
$resultabout = mysqli_query($connect, $qabout) or die(mysqli_error($connect));

// Deteksi halaman
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header role="banner">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <?php while ($item = $resultabout->fetch_object()) : ?>
                <a class="navbar-brand d-flex align-items-center fw-bold" href="#">
                    <img src="../storages/about/<?= $item->school_logo ?>" alt="Logo"
                        style="height: 35px; margin-right: 8px;">
                    <?= $item->school_name ?? '' ?>
                </a>
            <?php endwhile; ?>

            <!-- Toggler -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="#home">BERANDA</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#major" id="dropdown04" data-bs-toggle="dropdown">TENTANG KAMI</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#about">TENTANG SEKOLAH</a>
                            <a class="dropdown-item" href="#headmaster">KEPALA SEKOLAH</a>
                            <a class="dropdown-item" href="#major">JURUSAN</a>
                            <a class="dropdown-item" href="#visimisi">VISI MISI</a>
                            <a class="dropdown-item" href="#teacher">GURU</a>
                            <a class="dropdown-item" href="#announcement">PENGUMUMAN</a>
                            <a class="dropdown-item" href="#achievements">PRESATASI</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#galleries">GALERI</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blog">BLOG</a></li>
                    <li class="nav-item"><a class="nav-link" href="#testimonials">TESTIMONI</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cooperation">DAFTAR KERJA SAMA</a></li>
                    <li class="nav-item"><a class="nav-link" href="#message">PESAN</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- CSS -->
<style>
    /* Navbar awal (transparan, teks putih) */
    .navbar {
        background: #ffffff !important;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .navbar .nav-link,
    .navbar .navbar-brand {
        color: #fff !important;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .navbar .nav-link:hover {
        color: #f8d210 !important;
    }

    .navbar .nav-link.active {
        color: #f8d210 !important;
        border-bottom: 2px solid #f8d210;
    }

    /* Saat discroll (background putih, teks hitam) */
    .navbar.scrolled {
        background: #ffffff !important;
        border-bottom: 1px solid #ddd;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar.scrolled .nav-link,
    .navbar.scrolled .navbar-brand {
        color: #000 !important;
    }

    .navbar.scrolled .nav-link.active {
        color: #6f42c1 !important;
        border-bottom: 2px solid #6f42c1;
    }

    /* Toggler icon agar kelihatan di background transparan */
    .navbar-toggler {
        border: none;
        filter: invert(100%);
        /* putih */
        transition: filter 0.3s ease;
    }

    .navbar.scrolled .navbar-toggler {
        filter: invert(0%);
        /* hitam */
    }
</style>

<!-- Script Scroll -->
<script>
    window.addEventListener("scroll", function() {
        const navbar = document.querySelector("header .navbar");
        if (window.scrollY > -10) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const sections = document.querySelectorAll("section[id]"); // Ambil semua section yg punya ID
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link, .dropdown-menu .dropdown-item");

        window.addEventListener("scroll", function() {
            let current = "";

            // Cek section yang sedang terlihat
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 70; // jarak offset dari atas
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    current = section.getAttribute("id");
                }
            });

            // Reset semua active
            navLinks.forEach(link => link.classList.remove("active"));

            // Kasih class active sesuai section yg kelihatan
            navLinks.forEach(link => {
                if (link.getAttribute("href") === "#" + current) {
                    link.classList.add("active");

                    // Kalau link berada di dalam dropdown → parent dropdown-toggle juga aktif
                    const parentDropdown = link.closest(".dropdown-menu");
                    if (parentDropdown) {
                        const toggle = parentDropdown.previousElementSibling;
                        if (toggle) toggle.classList.add("active");
                    }
                }
            });
        });
    });
</script>

<!-- CDN Bootstrap & FontAwesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>