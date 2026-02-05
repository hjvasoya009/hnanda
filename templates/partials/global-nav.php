<header class="header" class="">
    <div class="header-wrapper">
        <div class="navbar">
            <div class="navbar-outer-wrapper">
                <div class="navbar-wrapper max-width">
                    <div class=" navbar-responsive">
                        <div class="navbar-logo">
                            <a class="inner-logo" href="/">
                                <span class="logo-desktop">Hiteshri Nanda</span>
                                <span class="logo-mobile">Hiteshri N</span>
                            </a>
                        </div>
                    </div>

                    <nav class="navbar-menu" aria-label="Primary">
                        <div class="menu-primary-container">
                            <ul id="menu-primary" class="menu-primary">
                                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/') ? 'current-menu-item' : '' ?>">
                                    <a href="/">work</a>
                                </li>
                                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/about/') ? 'current-menu-item' : '' ?>">
                                    <a href="/about">visual design</a>
                                </li>
                                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/about/') ? 'current-menu-item' : '' ?>">
                                    <a href="/about">about</a>
                                </li>
                                <li class="menu-item">
                                    <a href="mailto:hiteshrinanda92@gmail.com">contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <button class="navbar-toggle" type="button" aria-label="Open navigation" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- <nav class="navbar-menu">
                        <?php
                        // wp_nav_menu(array(
                        //     'menu'              => 'Primary',
                        //     'container_class'   => '',
                        //     'theme_location'    => 'primary',
                        //     'menu_class'        => 'menu-primary',
                        //     'menu_id'            => 'menu-primary',
                        //     'walker'            => new Menu_With_Description
                        // ));
                        ?>
                    </nav> -->
                </div>
            </div>
        </div>

    </div>
    <div class="mobile-menu-overlay" aria-hidden="true">
        <div class="mobile-menu__top">
            <span class="mobile-menu__brand">Hiteshri N</span>
            <button class="mobile-menu-close" type="button" aria-label="Close navigation">
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="mobile-menu" role="menu">
            <ul id="menu-primary" class="menu-primary">
                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/') ? 'current-menu-item' : '' ?>">
                    <a href="/">work</a>
                </li>
                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/about/') ? 'current-menu-item' : '' ?>">
                    <a href="/about">visual design</a>
                </li>
                <li class="menu-item <?= ($_SERVER['REQUEST_URI'] == '/about/') ? 'current-menu-item' : '' ?>">
                    <a href="/about">about</a>
                </li>
                <li class="menu-item">
                    <a href="mailto:hiteshrinanda92@gmail.com">contact</a>
                </li>
            </ul>
        </div>
    </div>
</header>