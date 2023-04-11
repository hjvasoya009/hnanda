<header class="header" class="">
    <div class="header-wrapper">
        <div class="navbar">
            <div class="navbar-outer-wrapper">
                <div class="navbar-wrapper max-width">
                    <div class=" navbar-responsive">
                        <div class="navbar-logo">
                            <a class="inner-logo" href="/">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Hiteshri Nanda">
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
                </div>
            </div>
        </div>

    </div>
</header>