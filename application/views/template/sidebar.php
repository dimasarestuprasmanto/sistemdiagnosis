   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
       <!-- partial:partials/_settings-panel.html -->
       <div class="theme-setting-wrapper">
           <div id="settings-trigger"><i class="ti-settings"></i></div>
           <div id="theme-settings" class="settings-panel">
               <i class="settings-close ti-close"></i>
               <p class="settings-heading">SIDEBAR SKINS</p>
               <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                   <div class="img-ss rounded-circle bg-light border me-3"></div>Light
               </div>
               <div class="sidebar-bg-options" id="sidebar-dark-theme">
                   <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
               </div>
               <p class="settings-heading mt-2">HEADER SKINS</p>
               <div class="color-tiles mx-0 px-4">
                   <div class="tiles success"></div>
                   <div class="tiles warning"></div>
                   <div class="tiles danger"></div>
                   <div class="tiles info"></div>
                   <div class="tiles dark"></div>
                   <div class="tiles default"></div>
               </div>
           </div>
       </div>

       <!-- partial -->
       <!-- partial:partials/_sidebar.html -->
       <nav class="sidebar sidebar-offcanvas" id="sidebar">
           <ul class="nav">
               <?php if (isset($_SESSION['auth'])) { ?>
                   <li class="nav-item active">
                       <a class="nav-link" href="<?= base_url('user/') ?>">
                           <i class="menu-icon mdi mdi-view-dashboard"></i>
                           <span class="menu-title">Dashboard</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('user/diagnosis') ?>">
                           <i class="menu-icon mdi mdi-shield-search"></i>
                           <span class="menu-title">Diagnosis Penyakit</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('user/info') ?>">
                           <i class="menu-icon mdi mdi-information"></i>
                           <span class="menu-title">Info Penyakit</span>
                       </a>
                   </li>
               <?php } else { ?>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('admin/') ?>">
                           <i class="menu-icon mdi mdi-view-dashboard"></i>
                           <span class="menu-title">Dashboard</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('admin/penyakit') ?>">
                           <i class="menu-icon mdi mdi-clipboard-plus"></i>
                           <span class="menu-title">Data Penyakit</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('admin/gejala') ?>">
                           <i class="menu-icon mdi mdi-clipboard-pulse"></i>
                           <span class="menu-title">Data Gejala</span>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="<?= base_url('admin/rule') ?>">
                           <i class="menu-icon mdi mdi-clipboard-text"></i>
                           <span class="menu-title">Data Rule</span>
                       </a>
                   </li>
               <?php } ?>
           </ul>
       </nav>