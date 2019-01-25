<!doctype html>
<html <?php language_attributes(); ?>>
<head class="no-js">
	<title><?php echo bloginfo('name');?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
    <div class="site-inner">

        <header id="masthead" class="site-header" role="banner">

 

        <div class="site-header-main">
            <div class="site-branding">
                <h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
					
            </div><!-- .site-branding -->

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <div class="menu-wrapper">
                <button id="menu-toggle" class="menu-toggle toggled-on" aria-expanded="true" aria-controls="site-navigation social-navigation"><?php esc_html_e( 'Menu', 'autotrader' ) ?></button>
                <div id="site-header-menu" class="site-header-menu clearfix">

                        <nav id="site-navigation" class="main-navigation container" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'autotrader' ); ?>">
				            <?php
				            wp_nav_menu( array(
					            'theme_location' => 'primary',
					            'menu_class'     => 'primary-menu',
					            'fallback_cb'    =>  false
				            ) );
				            ?>
                        </nav><!-- .main-navigation -->
                </div><!-- .site-header-menu -->
            </div><!-- .menu-wrapper -->
            <?php endif; ?>

        </div><!-- .site-header-main -->

</header>

        <div id="content" class="site-content container">