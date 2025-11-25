<?php
include '../../partials/header.php';
include '../../partials/sidenav.php';
include '../../partials/navbar.php';
?>

<div class="container mt-4">
    <!-- Judul -->
    <div class="row">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">SELAMAT DATANG</h2>
            <p class="text-muted">DI HALAMAN DASHBOARD</p>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row g-3">
            <!-- Card Jumlah Jurusan -->
            <div class="col-md-4">
                <div class="card text-white bg-teal shadow-sm rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1">Jumlah Jurusan</h5>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="../major/" class="text-white fw-bold text-decoration-none">
                            Detail
                        </a>
                        <span class="fw-bold">7</span>
                        <a href="../major/" class="text-white ms-2">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!-- Card Jumlah Guru -->
            <div class="col-md-4">
                <div class="card text-white bg-purple shadow-sm rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1">Jumlah Guru</h5>
                        </div>
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <!-- footer sudah disamakan dengan card jurusan -->
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="../teacher/" class="text-white fw-bold text-decoration-none">
                            Detail
                        </a>
                        <span class="fw-bold">17</span>
                        <a href="../teacher/" class="text-white ms-2">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>


            <!-- Card Jumlah Pengumuman -->
            <div class="col-md-4">
                <div class="card text-white bg-danger shadow-sm rounded-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="fw-bold mb-1">Jumlah Pengumuman</h5>
                        </div>
                        <i class="fas fa-book fa-2x"></i>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="../announcement/" class="text-white fw-bold text-decoration-none">
                            Detail
                        </a>
                        <span class="fw-bold">3</span>
                        <a href="../announcement/" class="text-white ms-2">
                            <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <style>
        .bg-teal {
            background-color: #009688 !important;
        }

        .bg-purple {
            background-color: #6f42c1 !important;
        }

        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>

</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>