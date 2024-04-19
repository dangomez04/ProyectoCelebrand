<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?= lang('Menu') ?></li>

                <li>
                    <a href="<?= APP_URL . $language ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span><?= lang('Dashboard') ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= APP_URL . "categories" ?>" class="waves-effect">
                        <i class='bx bxs-customize'></i>
                        <span><?= lang('Categories') ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?= APP_URL . "products" ?>" class="waves-effect">
                        <i class='bx bxs-package'></i>
                        <span><?= lang('Products') ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bx-cog'></i>
                        <span><?= lang('Configuration') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/"><?= lang('Account') ?></a></li>
                        <li><a href="/"><?= lang('Default') ?></a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->