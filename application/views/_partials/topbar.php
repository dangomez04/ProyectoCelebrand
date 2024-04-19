<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?= APP_URL . $language ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= APP_URL ?>assets/images/favicon.ico" alt="">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= APP_URL ?>assets/images/logo-revi.svg" alt="">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php

                    switch ($language) {
                        case 'en':
                            echo '<img src="' . APP_URL . 'assets/images/flags/us.jpg" alt="Header Language" height="16">';
                            break;
                        case 'es':
                            echo '<img src="' . APP_URL . 'assets/images/flags/spain.jpg" alt="Header Language" height="16">';
                            break;
                    }
                    ?>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->

                    <a href="#" class="dropdown-item notify-item language change-lang-btn" data-lang="en">
                        <img src="<?= APP_URL ?>assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                    </a>

                    <a href="#" class="dropdown-item notify-item language change-lang-btn" data-lang="es">
                        <img src="<?= APP_URL ?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                    </a>

                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= APP_URL ?>assets/images/users/default-avatar-1.png" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">User</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <!-- <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> <span key="t-my-wallet">My Wallet</span></a>
                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i class="bx bx-wrench font-size-16 align-middle me-1"></i> <span key="t-settings">Settings</span></a>
                    <a class="dropdown-item" href="auth-lock-screen"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span key="t-lock-screen">Lock screen</span></a>
                    <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item text-danger" href="<?= APP_URL . "{$language}/dashboard/logout" ?>">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout"><?= lang('Logout') ?></span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>