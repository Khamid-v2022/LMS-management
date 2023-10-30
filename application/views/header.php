<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
    <head>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        />

        <title>LMS UserManagement</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
        />

        <!-- Icons. Uncomment required icon fonts -->
        <link rel="stylesheet" href="<?=base_url()?>assets/vendor/fonts/boxicons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="<?=base_url()?>assets/vendor/css/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="<?=base_url()?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

        <!-- Page CSS -->

        <!-- Helpers -->
        <script src="<?=base_url()?>assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="<?=base_url()?>assets/js/config.js"></script>

        <!-- Fontawesome -->
		<script src="https://kit.fontawesome.com/930584b15c.js" crossorigin="anonymous"></script>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="<?=base_url()?>assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?=base_url()?>assets/vendor/libs/popper/popper.js"></script>
        <script src="<?=base_url()?>assets/vendor/js/bootstrap.js"></script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script type="text/javascript">
            var SITE_URL = "<?=site_url()?>";
            var BASE_URL = "<?=base_url()?>";
        </script>
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->

                <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                    <div class="app-brand demo">
                        <a href="index.html" class="app-brand-link">
                            <span class="app-brand-text demo menu-text fw-bolder ms-2">LMS</span>
                        </a>

                        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                            <i class="bx bx-chevron-left bx-sm align-middle"></i>
                        </a>
                    </div>

                    <div class="menu-inner-shadow"></div>

                    <ul class="menu-inner py-1">
                        <!-- Dashboard -->
                        <li class="menu-item  <?=$page_name=='Dashboard' ? 'active':'' ?>">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Dashboard</div>
                            </a>
                        </li>
                        <!-- Replace Password -->
                        <li class="menu-item <?=$page_name=='Users' ? 'active':'' ?>">
                            <a href="<?=site_url()?>users" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user"></i>
                                <div data-i18n="Basic">Users</div>
                            </a>
                        </li>

                        
                        <!-- Replace Password -->
                        <li class="menu-item <?=$page_name=='Replace Password' ? 'active':'' ?>">
                            <a href="<?=site_url()?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-lock"></i>
                                <div data-i18n="Basic">Replace Password</div>
                            </a>
                        </li>

                        <!-- Create Users -->
                        <li class="menu-item <?=$page_name=='Create Users' ? 'active':'' ?>">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                                <div data-i18n="Basic">Create Users</div>
                            </a>
                      
                        </li>

                        <!-- Modify Users -->
                        <li class="menu-item <?=$page_name=='Modify Users' ? 'active':'' ?>">
                            <a href="#" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-user-check"></i>
                                <div data-i18n="Basic">Modify Users</div>
                            </a>
                        </li>
                    </ul>
                </aside>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <nav
                        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="bx bx-menu bx-sm"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <h4 class="mb-0"><?=$page_name?></h4>
                                </div>
                            </div>
                            <!-- /Search -->

                            <ul class="navbar-nav flex-row align-items-center ms-auto">
                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                        <img src="../assets/img/avatars/default.png" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="<?=site_url()?>setting">
                                                <i class="bx bx-cog me-2"></i>
                                                <span class="align-middle">Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="<?=site_url()?>auth/sign_out">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>
                    </nav>
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

           

 