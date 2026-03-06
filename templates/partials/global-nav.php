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

                    <nav class="navbar-menu">
                        <?php
                        wp_nav_menu(array(
                            'menu'              => 'Primary',
                            'container_class'   => '',
                            'theme_location'    => 'primary',
                            'menu_class'        => 'menu-primary',
                            'menu_id'            => 'menu-primary',
                            'walker'            => new Menu_With_Description
                        ));
                        ?>
                    </nav>

                    <button class="navbar-toggle" type="button" aria-label="Open navigation" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    
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
            <?php
                wp_nav_menu(array(
                    'menu'              => 'Primary',
                    'container_class'   => '',
                    'theme_location'    => 'primary',
                    'menu_class'        => 'menu-primary',
                    'menu_id'            => 'menu-primary',
                    'walker'            => new Menu_With_Description
                ));
            ?>
        </div>
    </div>
</header>