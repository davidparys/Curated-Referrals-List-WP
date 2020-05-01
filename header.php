<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="">
        <!-- Bootstrap core CSS -->
        <!-- Custom styles for this template -->
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body class="<?php echo implode(' ', get_body_class()); ?>">
        <?php if( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
        <header class="c-bg py-2">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light"> 
                    <a class="navbar-brand" href="/"><img height="70px" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/logo.svg"></a> 
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler48" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span> 
                    </button>                     
                    <div class="collapse navbar-collapse" id="navbarToggler48"> 
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <?php
                                PG_Smart_Walker_Nav_Menu::$options['template'] = '<li class="nav-item {CLASSES}" id="{ID}"> 
                                                                <a class="nav-link" {ATTRS}>{TITLE}<span class="sr-only">(current)</span></a> 
                                                            </li>';
                                PG_Smart_Walker_Nav_Menu::$options['current_class'] = 'active';
                                wp_nav_menu( array(
                                    'container' => '',
                                    'theme_location' => 'primary',
                                    'items_wrap' => '<ul class="%2$s mr-auto mt-2 mt-lg-0 navbar-nav" id="%1$s">%3$s</ul>',
                                    'walker' => new PG_Smart_Walker_Nav_Menu()
                            ) ); ?>
                        <?php endif; ?>                          
                    </div>                     
                </nav>
            </div>
        </header>
        <main>