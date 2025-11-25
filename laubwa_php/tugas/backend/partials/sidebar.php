<?php
$currentFolder = basename(dirname($_SERVER['PHP_SELF']));
?>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo my-5">
        <!-- Logo Header -->
        <div class="logo-header " data-background-color="dark">
          <a href="index.html" class="logo">
            <img
              src="../../template-admin/assets/img/ft1.jpg"
              alt="navbar brand"
              class="navbar-brand rounded-circle"
              height="100" width="100" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">

            <li class="nav-item <?= ($currentFolder == 'dashbroad') ? 'active' : '' ?>">
              <a href="../dashboard/index.php">
                <i class="fas fa-file"></i>
                <p>Dashbroad</p>
              </a>
            </li>

            <li class="nav-item <?= ($currentFolder == 'about') ? 'active' : '' ?>">
              <a href="../about/index.php">
                <i class="fas fa-file"></i>
                <p>About</p>
              </a>
            </li>


            <li class="nav-item <?= ($currentFolder == 'blog') ? 'active' : '' ?>">
              <a href="../blog/index.php">
                <i class="fas fa-file"></i>
                <p>Blog</p>
              </a>
            </li>

            <li class="nav-item <?= ($currentFolder == 'contact') ? 'active' : '' ?>">
              <a href="../contact/index.php">
                <i class="fas fa-file"></i>
                <p>Contact</p>
              </a>
            </li>

            <li class="nav-item <?= ($currentFolder == 'project') ? 'active' : '' ?>">
              <a href="../project/index.php">
                <i class="fas fa-file"></i>
                <p>Project</p>
              </a>
            </li>

            <li class="nav-item <?= ($currentFolder == 'resume') ? 'active' : '' ?>">
              <a href="../resume/index.php">
                <i class="fas fa-file"></i>
                <p>Resume</p>
              </a>
            </li>


            <li class="nav-item <?= ($currentFolder == 'skill') ? 'active' : '' ?>">
              <a href="../skill/index.php">
                <i class="fas fa-file"></i>
                <p>Skill</p>
              </a>
            </li>


            <li class="nav-item <?= ($currentFolder == 'service') ? 'active' : '' ?>">
              <a href="../service/index.php">
                <i class="fas fa-file"></i>
                <p>Service</p>
              </a>
            </li>


            <li class="nav-item <?= ($currentFolder == 'socmed') ? 'active' : '' ?>">
              <a href="../socmed/index.php">
                <i class="fas fa-file"></i>
                <p>Socmed</p>
              </a>
            </li>





          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>