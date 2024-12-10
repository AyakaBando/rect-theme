<?php get_header(); ?>

<div class="wrapper">
    <!----------------------------------------------------------- Header  ------------------------------------------------------------->
    <div class="header-img project-header-img" style="background-image: url(<?php echo get_theme_file_uri('/images/top-image-projects.jpg') ?>); width: 100%;">
        <div class="logo-over-main-pic">
            <a href="<?php echo site_url(); ?>" class="pc-logo"><img src="https://www.rect-a.com/wp-content/uploads/2024/08/rect-white.png" alt="rect-logo"></a>
            <nav>
                <ul class="logo-over-main-pic__right nav-menu">
                <li>
                        <a href="<?php echo site_url('/about-us'); ?>"><span>About</span><span>レクトについて</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/projects'); ?>"><span>Projects</span><span>これまでの仕事</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/products'); ?>"><span>Items</span><span>材料</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/flow'); ?>"><span>Flow</span><span>家づくりの流れ</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/contacts'); ?>"><span>Contact</span><span>お問い合わせ</span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <h1 class="header-title"><?php post_type_archive_title(); ?></h1>
    </div>

    <!-- HAMBURGER MENU -->
    <div class="white-header header">
        <div class="hamburger-logo">
            <a href="<?php echo site_url(); ?>" class="hamburger-logo-white"><img src="https://www.rect-a.com/wp-content/uploads/2024/07/logo-mobile.png" alt="rect-logo-white"></a>
            <a href="<?php echo site_url(); ?>" class="hamburger-logo-black"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo-black"></a>
        </div>
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="mobile-menu">
            <div class="mobile-menu-container">
                <div class="mobile-menu-items">
                    <ul class="mobile-menu-items-left">
                        <li><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                        <li class="mobile-menu-projects">
                            <a href="<?php echo site_url('/projects'); ?>">Projects</a>
                            <ul class="project-category">
                                <li><a href="/projects?filter=all">ALL</a></li>
                                <li><a href="/projects?filter=house">HOUSE</a></li>
                                <li><a href="/projects?filter=others">OTHERS</a></li>
                            </ul>
                        </li>
                        <li class="mobile-menu-scene"><a href="<?php echo site_url('/photos'); ?>">Scene</a></li>
                    </ul>
                    <ul class="mobile-menu-items-right">
                        <li><a href="<?php echo site_url('/contacts'); ?>">Contact</a></li>
                        <li><a href="<?php echo site_url('/products'); ?>">Items</a></li>
                        <li><a href="<?php echo site_url('/flow'); ?>">Flow</a></li>
                    </ul>
                </div>

                <div class="mobile-menu-mobile-menu-footer-container">
                    <div class="mobile-menu-footer-container__left">
                        <p class="mobile-menu-footer-container__name"><a href="/">レクト一級建築士事務所</a></p>
                        <div class="mobile-menu-footer-container__company--mobile">〒151-0073<br> 東京都渋谷区笹塚1-52-6　チバビル3F</div>
                    </div>

                    <div class="mobile-menu-footer-container__right">
                        <div><a href="/about-us/#access">&gt;　GOOGLE MAP</a></div>
                        <!-- <div class="mobile-menu-footer-container__sns">
                            <i class="fa fa-instagram" aria-hidden="true"><a href="#"></a></i>
                            <p>instagram</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="filter-container">
        <aside class="project-filter">
            <div class="project-filter-button-container">
                <button class="project-filter-button" data-filter="all" id="ALL">ALL</button>
                <button class="project-filter-button" data-filter="house" id="HOUSE">HOUSE</button>
                <button class="project-filter-button" data-filter="renovation">RENOVATION</button>
                <button class="project-filter-button" data-filter="others" id="OTHERS">OTHERS</button>
            </div>
        </aside>

        <div class="column-change">
            <aside class="project-photo-change">
                <div class="scene-change scene-change-project-mobile" id="target-section">
                    <a href="/projects" class="scene-link projects-link">Projects</a>
                    <p>/</p>
                    <a href="/photos" class="scene-link scene-link-photos">Scene</a>
                </div>

                <div class="project-filter-mobile">
                    <div class="project-filter-button-container-mobile">
                        <button class="project-filter-mobile-button" data-filter="all">ALL</button>
                        <button class="project-filter-mobile-button" data-filter="house">HOUSE</button>
                        <button class="project-filter-mobile-button" data-filter="renovation">RENOVATION</button>
                        <button class="project-filter-mobile-button" data-filter="others">OTHERS</button>
                    </div>
                </div>

                <div class="grid-change">
                    <img src="https://www.rect-a.com/wp-content/uploads/2024/08/three-white-1.png" alt="three-column-white" id="three-column-white" class="three-column-icon">
                    <img src="https://www.rect-a.com/wp-content/uploads/2024/08/three-black-1.png" alt="three-column-black" id="three-column-black" class="three-column-icon" style="display: none;">
                    <img src="https://www.rect-a.com/wp-content/uploads/2024/08/two-white-1.png" alt="two-column-white" id="two-column-white" class="two-column-icon" style="display: none;">
                    <img src="https://www.rect-a.com/wp-content/uploads/2024/08/two-black-1.png" alt="two-column-black" id="two-column-black" class="two-column-icon">
                </div>
            </aside>

            <main class="projects-container">
                <?php
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'orderby' => 'DESC',
                );

                $my_query = new WP_Query($args);


                if ($my_query->have_posts()) :
                    while ($my_query->have_posts()) : $my_query->the_post();
                        $tags = get_the_terms(get_the_ID(), 'project-tag');
                        $tag_classes = '';
                        if ($tags && !is_wp_error($tags)) {
                            foreach ($tags as $tag) {
                                $tag_classes .= ' ' . esc_html($tag->slug);
                            }
                        }
                ?>
                        <section class="projects <?php echo $tag_classes; ?>">
                            <div class="post_thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('full'); ?>
                                    </a>
                                <?php endif; ?>
                                <h2 class="post-title">
                                    <?php the_title(); ?>
                                </h2>

                                <div class="project-tags">
                                    <?php
                                    if ($tags && !is_wp_error($tags)) :
                                        $tag_list = [];
                                        foreach ($tags as $tag) {
                                            $tag_list[] = '<p>' . esc_html($tag->name) . '</p>';
                                        }
                                        echo implode(' ', $tag_list);
                                    // else :
                                    //     echo 'No tags';
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </section>

                    <?php
                    endwhile;
                else :
                    ?>
                    <p>プロジェクトはまだありません。</p>
                <?php
                endif;

                wp_reset_postdata();
                ?>
            </main>
        </div>
    </div>

    <!-- CONTACTS -->
    <section class="contacts">
        <div class="contact-title">Contact Us</div>
        <div class="contact-subtitle">お問い合わせはこちらから</div>
        <a href="https://www.rect-a.com/contacts/" class="contact-form">
            <p class="footer-contact-form-title">Contact Form</p>
            <p class="footer-contact-form-icon">></p>
        </a>
    </section>
</div>

<?php get_footer(); ?>