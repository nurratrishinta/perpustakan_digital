<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Ambil username dari session
            $username = strtolower($_SESSION['Username'] ?? '');

            // Tentukan role berdasar username
            if ($username === 'admin') {
                $role = 'admin';
            } elseif ($username === 'petugas') {
                $role = 'petugas';
            } else {
                $role = 'peminjam';
            }

            $current = $_SERVER['PHP_SELF']; // file aktif
            ?>


            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo text-center"
                    style="display: flex; flex-direction: column; align-items: center; overflow: visible; margin-bottom: 25px;">
                    <a href="index.php"
                        class="app-brand-link d-flex flex-column align-items-center text-decoration-none">
                        <span class="app-brand-logo demo mb-1">
                            <img src="../../templates-admin/assets/img/favicon/a2.png"
                                alt="Logo"
                                style="width: 80px; height: auto; transition: transform 0.3s ease;" />
                        </span>
                        <span class="app-brand-text fw-bolder mt-1"
                            style="font-size: 15px; color: #000; text-transform: uppercase;">
                            PERPUSTAKAAN DIGITAL
                        </span>
                    </a>
                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-3">
                    <!-- ✅ MENU ADMIN -->
                    <?php if ($role === 'admin') : ?>
                        <li class="menu-item <?= (strpos($current, '/dashboard/') !== false) ? 'active' : '' ?>">
                            <a href="../dashboard/index.php" class="menu-link">
                                <i class="menu-icon bx bx-home-circle"></i>
                                <div>Dashboard</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/user/') !== false) ? 'active' : '' ?>">
                            <a href="../user/index.php" class="menu-link">
                                <i class="menu-icon bx bx-user"></i>
                                <div>Data User</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/kategoribuku/') !== false) ? 'active' : '' ?>">
                            <a href="../kategoribuku/index.php" class="menu-link">
                                <i class="menu-icon bx bx-category"></i>
                                <div>Data Kategori</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/buku/') !== false) ? 'active' : '' ?>">
                            <a href="../buku/index.php" class="menu-link">
                                <i class="menu-icon bx bx-book"></i>
                                <div>Data Buku</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/ulasanbuku/') !== false) ? 'active' : '' ?>">
                            <a href="../ulasanbuku/index.php" class="menu-link">
                                <i class="menu-icon bx bx-comment-detail"></i>
                                <div>Data Ulasan</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/peminjaman/') !== false) ? 'active' : '' ?>">
                            <a href="../peminjaman/index2.php" class="menu-link">
                                <i class="menu-icon bx bx-book-content"></i>
                                <div>Data Peminjaman</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/laporan/') !== false) ? 'active' : '' ?>">
                            <a href="../laporan/index.php" class="menu-link">
                                <i class="menu-icon bx bx-file"></i>
                                <div>Data Laporan</div>
                            </a>
                        </li>

                        <!-- ✅ MENU PETUGAS -->
                    <?php elseif ($role === 'petugas') : ?>
                        <li class="menu-item <?= (strpos($current, '/buku/') !== false) ? 'active' : '' ?>">
                            <a href="../buku/index.php" class="menu-link">
                                <i class="menu-icon bx bx-book"></i>
                                <div>Data Buku</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/peminjaman/') !== false) ? 'active' : '' ?>">
                            <a href="../peminjaman/index2.php" class="menu-link">
                                <i class="menu-icon bx bx-book-content"></i>
                                <div>Data Peminjaman</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/laporan/') !== false) ? 'active' : '' ?>">
                            <a href="../laporan/index.php" class="menu-link">
                                <i class="menu-icon bx bx-file"></i>
                                <div>Data Laporan</div>
                            </a>
                        </li>

                        <!-- ✅ MENU PEMINJAM -->
                    <?php else : ?>
                        <li class="menu-item <?= (strpos($current, '/peminjaman/') !== false) ? 'active' : '' ?>">
                            <a href="../peminjaman/index.php" class="menu-link">
                                <i class="menu-icon bx bx-book-content"></i>
                                <div>Peminjaman</div>
                            </a>
                        </li>

                        <li class="menu-item <?= (strpos($current, '/ulasanbuku/') !== false) ? 'active' : '' ?>">
                            <a href="../ulasanbuku/index.php" class="menu-link">
                                <i class="menu-icon bx bx-comment-detail"></i>
                                <div>Ulasan Buku</div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <!-- 🚪 LOGOUT -->
                    <li class="menu-item">
                        <a href="../../actions/auth/logout.php" class="menu-link text-danger">
                            <i class="menu-icon bx bx-log-out"></i>
                            <div>Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>

            <style>
                /* Warna dan ukuran teks brand */
                .app-brand-text {
                    font-size: 18px;
                    color: #000 !important;
                    text-transform: uppercase;
                    text-align: center;
                }

                /* Efek hover pada logo */
                .app-brand img {
                    transition: transform 0.3s ease;
                }

                .app-brand:hover img {
                    transform: scale(1.05);
                }

                /* Pastikan tulisan tidak tertimpa dan beri jarak dengan menu */
                .app-brand.demo {
                    overflow: visible !important;
                    margin-bottom: 25px;
                }
            </style>