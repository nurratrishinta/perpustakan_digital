<header role="banner">
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <!-- Brand (tanpa query database) -->
            <a class="navbar-brand d-flex align-items-center fw-bold" href="#">

                Perpustakaan Digital
            </a>


            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="#home">BERANDA</a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#buku">BUKU</a></li>
                    <li class="nav-item"><a class="nav-link" href="#peminjaman">PEMINJAMAN</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ulasanbuku">ULASAN BUKU</a></li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- CSS -->
<style>
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

    .navbar-toggler {
        border: none;
        filter: invert(100%);
        transition: filter 0.3s ease;
    }

    .navbar.scrolled .navbar-toggler {
        filter: invert(0%);
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
        const sections = document.querySelectorAll("section[id]");
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link, .dropdown-menu .dropdown-item");

        window.addEventListener("scroll", function() {
            let current = "";
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 70;
                const sectionHeight = section.clientHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => link.classList.remove("active"));

            navLinks.forEach(link => {
                if (link.getAttribute("href") === "#" + current) {
                    link.classList.add("active");

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