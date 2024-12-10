<?php get_header(); ?>


<!-- HAMBURGER MENU -->
<div class="black-header header">
    <div class="hamburger-logo">
        <a href="<?php echo site_url(); ?>">
            <img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo">
        </a>
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
    <div>
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>

                <main class="single-news-container">
                    <h1 class="single-news-title"><?php the_title(); ?></h1>
                    <time class="single-news-date" datetime="<?php the_time('Y-m-d');?>"><?php the_time('Y.m.d'); ?></time>

                    <article class="single-news-content"><?php the_content(); ?>
                        <div class="single-news-picture">
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('large');
                            }
                            ?>
                        </div>
                        </article>

                    <div class="news-navigation">
                        <div class="nav-previous"><?php previous_post_link('%link', '&lt;'); ?></div>
                        <div class="back-to-list"><a href="/news">Back to List</a></div>
                        <div class="nav-next"><?php next_post_link('%link', '&gt;'); ?></div>
                    </div>

                        </main>
        <?php    }
        } ?>
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