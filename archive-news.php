<?php get_header() ?>

<!-- HAMBURGER MENU -->
<div class="black-header header">
    <div class="hamburger-logo">
        <a href="<?php echo site_url(); ?>" class="hamburger-logo-black"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo"></a>
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
                    <li><a href="<?php echo site_url('/photos'); ?>">Photos</a></li>
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
<!-- HAMBURGER MENU -->



<div class="wrapper">
    <h1 class="header-title news-header-title"><?php post_type_archive_title(); ?></h1>
    <h2 class="news-header-subtitle">お知らせ</h2>

    <main class="archive-page-news-container">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Query posts based on the constructed tax query
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 12,
            'paged' => $paged,
            'orderby'     => 'date',
            'order' => 'DESC',
        );

        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) :
            while ($my_query->have_posts()) : $my_query->the_post();
        ?>
                <div class="archive-page-news">
                    <div class="archive-page-news_post_thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <p class="archive-page-news_post_title">
                                <?php the_title(); ?>
                            </p>
                            <time class="archive-page-news_post_date" datetime="<?php the_time('Y-m-d'); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </a>
                    </div>
                </div>
            <?php
            endwhile;
        else :
            ?>
            <p>ニュースはまだ登録されていません。</p>
        <?php
        endif; ?>
    </main>

    <div class="pagination">
        <?php
        if ($my_query->max_num_pages > 1) {
            echo paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => 'page/%#%/',
                'current' => max(1, $paged),
                'mid_size' => 1,
                'total' => $my_query->max_num_pages,
                'prev_text' => __('<'),
                'next_text' => __('>'),
                'type'      => 'list',
            ));
        }

        wp_reset_postdata();
        ?>
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