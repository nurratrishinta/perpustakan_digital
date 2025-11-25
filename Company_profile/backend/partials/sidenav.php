<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$currentURI = $_SERVER['REQUEST_URI'];
?>

<!-- CSS tambahan -->


<style>
    aside.sidenav .nav-link {
        color: white !important;
    }

    aside.sidenav .nav-link.active {
        background: rgba(192, 33, 139, 0.3);
        border-radius: 0.375rem;
    }

    aside.sidenav .material-icons {
        vertical-align: middle;
    }

    /* Header sidebar */
    .sidebar-header {
        text-align: center;
        padding: 1rem;
    }

    /* Logo segi lima */
    .sidebar-header img {
        width: 90px;
        height: 90px;
        object-fit: cover;
        border: 2px solid white;
        clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        /* bentuk segi lima */
    }

    .sidebar-header h5 {
        color: white;
        margin-top: 0.5rem;
        font-weight: bold;
    }
</style>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    style="background: linear-gradient(180deg, rgba(192,33,139,1) 0%, rgb(85, 28, 141) 100%);"
    id="sidenav-main">

    <!-- Header Foto + Tulisan -->
    <div class="sidebar-header">
        <img src="../../templates-admin/material-dashboard-2/assets/img/lgsmk.jpeg" alt="Logo" style="width:80px; height:80px; border-radius:50%;">
        <h5>SMKN 1 SANDEN</h5>
    </div>


    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse h-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/dashboard/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../dashboard/index.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/about/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../about/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">domain</i>
                    </div>
                    <span class="nav-link-text ms-1">About</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/blog/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../blog/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">info</i>
                    </div>
                    <span class="nav-link-text ms-1">Blog</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/major/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../major/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Jurusan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/galleries/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../galleries/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">photo_library</i>
                    </div>
                    <span class="nav-link-text ms-1">Galeri</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/achievements/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../achievements/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">list</i>
                    </div>
                    <span class="nav-link-text ms-1">Pencapaian</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/message/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../message/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">message</i>
                    </div>
                    <span class="nav-link-text ms-1">Pesan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/teacher/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../teacher/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Guru</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/testimonials/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../testimonials/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">rate_review</i>
                    </div>
                    <span class="nav-link-text ms-1">Testimoni</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/announcement/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../announcement/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">campaign</i>
                    </div>
                    <span class="nav-link-text ms-1">Pengumuman</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/headmaster/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../headmaster/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Kepala sekolah</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/contact/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../contact/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">contact_mail</i>
                    </div>
                    <span class="nav-link-text ms-1">Contact</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/social_media/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../social_media/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">share</i>
                    </div>
                    <span class="nav-link-text ms-1">Sosial media</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/visi_mission/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../visi_mission/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">flag</i>
                    </div>
                    <span class="nav-link-text ms-1">Visi Misi</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, 'cooperations/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../cooperations/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">group_work</i>
                    </div>
                    <span class="nav-link-text ms-1">Kerja sama</span>
                </a>
            </li>



            <li class="nav-item">
                <a class="nav-link text-white <?= (strpos($currentURI, '/user/') !== false) ? 'active bg-gradient-primary' : '' ?>" href="../user/index.php">
                    <div class="text-white me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>



        </ul>
    </div>
</aside>