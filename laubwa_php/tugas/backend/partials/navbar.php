 <!-- Navbar Header -->
 <nav
   class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
   <div class="container-fluid">


     <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
       <li
         class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
         <a
           class="nav-link dropdown-toggle"
           data-bs-toggle="dropdown"
           href="#"
           role="button"
           aria-expanded="false"
           aria-haspopup="true">
           <i class="fa fa-search"></i>
         </a>
         <ul class="dropdown-menu dropdown-search animated fadeIn">
           <form class="navbar-left navbar-form nav-search">
             <div class="input-group">
               <input
                 type="text"
                 placeholder="Search ..."
                 class="form-control" />
             </div>
           </form>
         </ul>
       </li>

       <li class="nav-item topbar-user dropdown hidden-caret">
         <a
           class="dropdown-toggle profile-pic"
           data-bs-toggle="dropdown"
           href="#"
           aria-expanded="false">
           <div class="avatar-sm">
             <img
               src="../../template-admin/assets/img/ft1.jpg"
               alt="..."
               class="avatar-img rounded-circle" />
           </div>
           <span class="profile-username">
             <!-- Wrapper Profil -->
             <div class="dropdown text-end" style="position: relative;">
               <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
               </a>

               <!-- Dropdown Menu -->
               <ul class="dropdown-menu text-small dropdown-menu-end shadow" aria-labelledby="dropdownUser">
                 <h6 class="dropdown-header"><?= $_SESSION['user_name'] ?? 'Shinta' ?><br><small><?= $_SESSION['user_email'] ?? 'nurratrishinta@gmail.com' ?></small></h6>
                 <li>
                   <a href="../../actions/auth/logout.php" class="dropdown-item text-danger">Logout</a>
                 </li>
                 <li>
                 </li>
               </ul>
             </div>
           </span>
         </a>
       </li>
     </ul>

   </div>
 </nav>
 <!-- End Navbar -->
 </div>

 <div class="container">
   <div class="page-inner">