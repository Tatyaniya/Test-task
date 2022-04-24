<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title() ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <div class="container header__container">
                <div class="logo header__logo" style="width:180px;height:40px;">
                    <?php the_custom_logo(); ?>
                </div>
                <?php
                    if ( has_nav_menu( 'menu-header' ) ) {
                        wp_nav_menu( [
                            'theme_location'  => 'menu-header',
                            'menu'            => '', 
                            'container'       => 'nav', 
                            'container_class' => 'menu header__menu',
                            'menu_class'      => 'menu__list',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                            'depth'           => 3,
                            'walker'          => '',
                        ] );
                    }
                ?>
            </div>
        </header>