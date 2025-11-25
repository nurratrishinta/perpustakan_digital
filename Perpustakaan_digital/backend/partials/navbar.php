<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ambil username dari session
$username = strtolower($_SESSION['Username'] ?? '');

// Tentukan role berdasarkan username
if ($username === 'admin') {
    $role = 'Admin';
} elseif ($username === 'petugas') {
    $role = 'Petugas';
} else {
    $role = 'Peminjam';
}
?>
<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center custom-navbar"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Jam & Tanggal -->
            <li class="nav-item me-3 text-white fw-semibold">
                <span id="datetime"></span>
            </li>

            <!-- Role dan Avatar -->
            <li class="nav-item d-flex align-items-center text-white fw-semibold me-3">
                <?= htmlspecialchars($role) ?>
                <img src="../../templates-admin/assets/img/favicon/icon.png"
                    alt="User Icon"
                    class="rounded-circle ms-2 border border-primary"
                    style="width: 36px; height: 36px; object-fit: cover;" />
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <!-- <a class="nav-link dropdown-toggle hide-arrow text-white" href="#" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="../../templates-admin/assets/img/favicon/icon.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a> -->
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="../../templates-admin/assets/img/favicon/icon.png" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- /User -->
        </ul>
    </nav>
    <!-- /Navbar -->

    <!-- CSS -->
    <style>
        .custom-navbar {
            background: linear-gradient(90deg, #6c757d, #0d6efd);
            /* abu-abu ke biru */
            color: white !important;
        }

        #datetime {
            font-size: 14px;
        }
    </style>

    <!-- Script Jam -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            const dayName = days[now.getDay()];
            const day = String(now.getDate()).padStart(2, '0');
            const month = months[now.getMonth()];
            const year = now.getFullYear();

            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            document.getElementById("datetime").textContent =
                `${dayName}, ${day} ${month} ${year} | ${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>