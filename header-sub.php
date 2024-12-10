<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />

</head>

<body <?php body_class(); ?>>
        <header>
                <div class="header-container-sub">
                        <h1 class="logo" style="margin-left: 12rem;">
                                <a href="<?php echo site_url(); ?>"><img src="https://rect.local/wp-content/uploads/2024/05/rect.gif"></a>
                        </h1>

                        <div class="menu-group">
                                <ul class="nav-menu">
                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/about-us'); ?>"><span>ABOUT</span><span>レクトについて</span></a>
                                        </li>

                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/projects'); ?>"><span>PROJECTS</span><span>施工事例</span></a>
                                        </li>

                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/photos'); ?>"><span>PHOTOS</span><span>写真</span></a>
                                        </li>

                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/products'); ?>"><span>Items</span><span>製品</span></a>
                                        </li>

                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/flow'); ?>"><span>FLOW</span><span>設計までの流れ</span></a>
                                        </li>

                                        <li <?php if (is_page('about-us') or wp_get_post_parent_id(get_the_id(0)) == 12)
                                                        echo 'class="current-menu-item"' ?>>
                                                <a href="<?php echo site_url('/contacts'); ?>"><span>CONTACT</span><span>お問い合わせ</span></a>
                                        </li>



                                </ul>
                        </div>
                </div>
        </header>