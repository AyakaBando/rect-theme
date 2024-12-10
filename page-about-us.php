<?php
get_header();
?>

<div class="wrapper">
    <!-- Header -->
    <div class="header-img about-header-image" style="background-image: url(<?php echo get_theme_file_uri('/images/top-image-about.jpg') ?>);">
        <div class="logo-over-main-pic">
            <a href="<?php echo site_url(); ?>" class="pc-logo"><img src="https://www.rect-a.com/wp-content/uploads/2024/08/rect-white.png" alt="rect-logo">
            </a>
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
        </div>

        <h1 class="header-title about-header-title"><?php the_title(); ?></h1>
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


    <div class="scroll-up">
        <main id="first">
            <h2 class="first-title">素を生かす。</h2>

            <div class="first-content">
                <p class="mobile-first-content">素地、素材、素のまま、「素」がつく言葉には潔い響きがある。
                光や風、人の営みや文化。場には「素」となる幾重もの層がある。
                そこに住まい手の個性や想いが「素」のひとつとなり重なる。
                この「素」のバランスを整え、そこでしか生まれない暮らしを
                届けたいと考える。</p>


                <p class="pc-first-content">素地、素材、素のまま、「素」がつく言葉には潔い響きがある。</p>
                <p class="pc-first-content">光や風、人の営みや文化。場には「素」となる幾重もの層がある。</p>
                <p class="pc-first-content">そこに住まい手の個性や想いが「素」のひとつとなり重なる。</p>
                <p class="pc-first-content">この「素」のバランスを整え、そこでしか生まれない暮らしを</p>
                <p class="pc-first-content">届けたいと考える。</p>
            </div>
        </main>
    </div>

    <!-- ABOUTUS -->
    <div class="scroll-up">
        <h2 class="title aboutus-title">About Us</h2>
        <p class="about-us_content">
            rect という言葉はcorrect、direct、erect のように別の言葉とくっつくことで新たな意味を生む言葉です。<br>
            私たちは自分たちの作家性を中心に据えるのではなく、<br>
            お施主様、施工者様など様々な人と繋がることで多様な価値を創造する建築設計事務所です。
        </p>

        <!-- <h2 class="title aboutus-title aboutus-title-about-logo">ロゴマークについて</h2>
        <p class="about-us_content">
            長方形のロゴマーク。この枠の中にあなたの名前を入れてください。<br>
            あなたとrectが一つのチームとなり、おうちづくりをスタートしていく。
            そんな意味を込めて作りました。
        </p> -->

        <seciton class="aboutus-container aboutus-page-container">
            <div class="about-us-person">
                <div class="portrait"><img src="https://www.rect-a.com/wp-content/uploads/2024/07/naito-portrait.png" alt="naito-portrait"></div>
                <div class="history">
                    <h3 class="name">内藤 正宏　一級建築士 (第 382692 号)</h3>
                    <p class="name-kana">ないとう まさひろ・1989年生まれ</p>
                    <div class="self-info">
                        <p>山梨県甲府市出身</p>
                        <p>2014年 芝浦工業大学大学院</p>
                        <p>理工学研究科建設工学専攻 修了</p>
                        <p>住宅系組織設計事務所を経て、</p>
                        <p>2021年 株式会社レクトを設立</p>
                    </div>
                </div>
            </div>
            <div class="about-us-person">
                <div class="portrait"><img src="https://www.rect-a.com/wp-content/uploads/2024/07/hiroto-portrait.png" alt="hiroto-portrait"></div>
                <div class="history">
                    <h3 class="name">廣戸 海渡　一級建築士（第 383194 号）</h3>
                    <p class="name-kana">ひろと かいと・1988年生まれ</p>
                    <div class="self-info">
                        <p>島根県出雲市出身</p>
                        <p>2013年 日本工業大学大学院</p>
                        <p>工学研究科建築学専攻 修了</p>
                        <p>設計事務所を経て、</p>
                        <p>2022年 株式会社レクト入社</p>
                    </div>
                </div>
            </div>
            </section>
    </div>

    <!-- ACCESS -->
    <div class="scroll-up">
        <h2 class="title aboutus-title" id="access">Access</h2>
        <section class="googlemaps">
            <div class="aboutus-address-container">
                <h3 class="aboutus-address-title">株式会社レクト　一級建築士事務所</h3>
                <p class="aboutus-address">&#12306;151-0073　東京都渋谷区笹塚1-52-6　チバビル3F</p>
                <p class="aboutus-address-mobile">(森田アルミ工業株式会社と共同オフィス)</p>
            </div>
            <p class="aboutus-company-tell">TEL: 03-6300-6551 (森田アルミ工業株式会社と共同番号)</p>
            <p class="aboutus-company-number">事務所登録： 一級建築士事務所　東京都知事登録　第64911号</p>

            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2647.8124690276004!2d139.6691760377795!3d35.675420861665366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f1f6515b7d5b%3A0xe19278d3959a87fb!2z5qOu55Sw44Ki44Or44Of5bel5qWt5qCq5byP5Lya56S-IOadseS6rOOCquODleOCo-OCuQ!5e0!3m2!1sja!2sjp!4v1722558625337!5m2!1sja!2sjp" width="800" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d810.2679168722937!2d139.67049536966215!3d35.67523728771416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f3c4edcdf3c5%3A0x54f4576183e4dba5!2z5qCq5byP5Lya56S-44Os44Kv44OI5LiA57Sa5bu656-J5aOr5LqL5YuZ5omA!5e0!3m2!1sja!2sjp!4v1730354454933!5m2!1sja!2sjp" width="800" height="600" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section class="googlemaps-mobile">
            <div class="aboutus-address-container">
                <h3 class="aboutus-address-title">株式会社レクト　一級建築士事務所</h3>
                <p class="aboutus-postal">&#12306;151-0073</p>
                <p class="aboutus-address">東京都渋谷区笹塚1-52-6　チバビル3F</p>
                <p class="aboutus-address-mobile">(森田アルミ工業株式会社と共同オフィス)</p>
            </div>
            <p class="aboutus-company-tell">TEL: <a href="tel:03-6300-6551">03-6300-6551</a> (森田アルミ工業株式会社と共同番号)</p>
            <p class="aboutus-company-number">事務所登録: 一級建築士事務所　東京都知事登録　第64911号</p>
            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2647.8124690276004!2d139.6691760377795!3d35.675420861665366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f1f6515b7d5b%3A0xe19278d3959a87fb!2z5qOu55Sw44Ki44Or44Of5bel5qWt5qCq5byP5Lya56S-IOadseS6rOOCquODleOCo-OCuQ!5e0!3m2!1sja!2sjp!4v1722558625337!5m2!1sja!2sjp" width="800" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d810.2679168722937!2d139.67049536966215!3d35.67523728771416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018f3c4edcdf3c5%3A0x54f4576183e4dba5!2z5qCq5byP5Lya56S-44Os44Kv44OI5LiA57Sa5bu656-J5aOr5LqL5YuZ5omA!5e0!3m2!1sja!2sjp!4v1730354454933!5m2!1sja!2sjp" width="800" height="300" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </div>

    <!-- ABOUT HOLDINGS -->
    <div class="scroll-up">
        <section class="holdings-wrapper">
            <div class="holdings-logo">
                <a href="https://moritaalumi.co.jp/" target=”_blank”><img src="https://www.rect-a.com/wp-content/uploads/2024/08/グループ-115.png" alt="morita-logo"></a>
            </div>
            <div class="holdings-right">
                <h2 class="title about-holdings-title">ホールディングカンパニーついて</h2>
                <div class="about-holdings">
                    <p>レクトは、建材メーカーの<a href="https://moritaalumi.co.jp/" class="about-holdings-link">森田アルミ工業</a>から生まれた建築設計事務所です。</p>
                    <p>森田アルミ工業は、デザインに注力することで、施主や設計者がこうしたいと思い描く家を下支えするような建材を数多く生み出してきました。</p>
                    <p>レクトでは、一件、一件こだわりのある家づくりと向き合うなかで感じた、設計者としてのフラットな視点から、建材のあり方を見つめなおし、森田アルミ工業とともに魅力的な建材づくりにも携わっています。<br></p>
                    <p>これからも空間デザインと建材開発の双方から、質の高い家づくりに
                        取り組んでまいります。</p>
                </div>
            </div>
        </section>
    </div>

    <!-- CONTACTS -->
    <div class="scroll-up">
        <section class="contacts">
            <div class="contact-title">Contact Us</div>
            <div class="contact-subtitle">お問い合わせはこちらから</div>
            <a href="https://rect.local/contacts/" class="contact-form">
                <p class="footer-contact-form-title">Contact Form</p>
                <p class="footer-contact-form-icon">></p>
            </a>
        </section>
    </div>

    <!-- Footer -->
    <?php
    get_footer();
    ?>