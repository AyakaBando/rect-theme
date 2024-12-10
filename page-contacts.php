<?php get_header(); ?>

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
    <div class="single-project-header-img">
        <div class="single-project-logo-over-main-pic">
            <div class="single-project-logo-over-main-pic__left">
                <a href="<?php echo site_url(); ?>" class="pc-logo"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo"></a>
            </div>
            <nav>
                <ul class="single-project-logo-over-main-pic__right nav-menu">
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
    </div>

    <main class="contact-form-wrapper">
        <div class="contact-form-left">
            <h1 class="contact-page-title">
                <?php the_title(); ?>
            </h1>
            <h2 class="contact-form-title">お問い合わせフォーム</h2>

            <div class="contact-form-message">
                <p>メールでのお問い合わせ・ご相談は下記のフォームにご記入ください。</p>
                <p>内容を確認後、メールにてお返事させていただきます。</p>
                <p>メールの確認作業に時間を要する場合がございます。</p>
            </div>
        </div>

        <section class="contact-form-right">
            <?php the_content(); ?>
        </section>
    </main>

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

<!-- FOOTER -->
<?php get_footer();  ?>