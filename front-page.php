<?php
get_header();
?>

<div class="wrapper">

    <!----------------------------------------------------------- Header  ------------------------------------------------------------->
    <div class="main-pic">
        <div class="logo-over-main-pic front-mobile">
            <div class="pc-logo-container">
                <a href="<?php echo site_url(); ?>" class="pc-logo">
                    <img src="https://www.rect-a.com/wp-content/uploads/2024/07/logo-mobile.png" alt="rect-logo" />
                </a>
                <h1 class="sub-maintitle">レクト一級建築士事務所</h1>
            </div>

            <a href="<?php echo site_url(); ?>" class="mobile-logo front-mobile-logo">
                <img src="https://www.rect-a.com/wp-content/uploads/2024/07/logo-mobile.png" alt="rect-logo" />
            </a>
        </div>
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
                            <div class="hamburger-contact"><a href="/about-us/#access">&gt;　GOOGLE MAP</a></div>
                            <!-- <div class="mobile-menu-footer-container__sns">
                                <i class="fa fa-instagram" aria-hidden="true"><a href="#"></a></i>
                                <p>instagram</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <section class="main-container header-img">
            <div class="main-pic__content">
                <video id="video" autoplay loop muted playsinline>
                    <source src="https://www.rect-a.com/wp-content/uploads/2024/08/top_movie.webm" type="video/webm">
                    <source src="https://www.rect-a.com/wp-content/uploads/2024/08/top_movie.mp4" type="video/mp4">
                </video>


                <!-- NEWS -->
                <div class="news-container" id="newsContainer">
                    <div class="news"><a href="/news">News</a></div>
                    <div class="news-title">
                        <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'news',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                            'paged' => $paged,
                        );
                        $arr_posts = new WP_Query($args);
                        ?>


                        <?php if ($arr_posts->have_posts()) :
                            while ($arr_posts->have_posts()) : $arr_posts->the_post();
                        ?>

                                <a href="<?php the_permalink(); ?>">
                                    <?php the_time('Y.m.d'); ?>

                                    <?php the_title();
                                    ?>
                                </a>
                        <?php endwhile;
                        endif;
                        ?>
                    </div>
                </div>

                <div class="scroll-bar"></div>
                <div class="scroll"><a href="#Projects">Scroll for Projects</a></div>
            </div>
        </section>




        <div class="scroll-up">
            <main id="first">
                <h2 class="first-title">素を生かす。</h2>

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
            </main>
        </div>

        <!-- Projects -->
        <div class="scroll-up">
            <section class="projects-container__first">
                <h3 class="title" id="Projects">Projects</h3>

                <div class="front-projects-container">
                    <?php
                    $args = [
                        'post_type' => 'project',
                        'posts_per_page' => 8,
                        'tax_query' => [
                            [
                                'taxonomy' => 'preferred',
                                'field' => 'slug',
                                'terms' => 'yes'
                            ],
                        ],
                        'meta_key' => 'custom_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                    ];

                    $my_query = new WP_Query($args);

                    if ($my_query->have_posts()) :
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <div class="projects">
                                <div class="post_thumbnail">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            // Get the full size image URL
                                            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                            ?>
                                            <img
                                                class="front-lazy"
                                                data-src="<?php echo esc_url($image_url); ?>"
                                                src="<?php echo esc_url($image_url); ?>"
                                                alt="<?php the_title(); ?>" />
                                        </a>


                                        <p class="post-title">
                                            <?php the_title(); ?>
                                        </p>

                                        <div class="project-tags">
                                            <?php
                                            // Use the custom taxonomy 'project-tag'
                                            $tags = get_the_terms(get_the_ID(), 'project-tag');
                                            if ($tags && !is_wp_error($tags)) :
                                                $tag_list = [];
                                                foreach ($tags as $tag) {
                                                    $tag_list[] = '<p>' . esc_html($tag->name) . '</p>';
                                                }
                                                echo implode(' ', $tag_list);
                                            else :
                                                echo 'No tags';
                                            endif;
                                            ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile;
                    else : ?>
                        <p>投稿がありません。</p>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>

                <div class="view-all">
                    <a href="./projects/">
                        View All Projects　　&gt;
                    </a>
                </div>
            </section>
        </div>



        <!-- PRODUCTS -->
        <div class="scroll-up">
    <section class="products-container__first">
        <h3 class="title product-title">Items</h3>
        <p class="front-page-item-description">
            これまでのプロジェクトで採用した素材、建材をご紹介します。<br>
            プロジェクト毎の雰囲気やご予算に合わせて検討を重ね、ご提案しています。
        </p>
        <div class="products-container front-page-products-container">
            <?php
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 4,
                'orderby' => 'DESC',
            ];
            $my_query = new WP_Query($args);

            if ($my_query->have_posts()) :
                while ($my_query->have_posts()) : $my_query->the_post();
                    $content = get_the_content();

                    // Extract the first image URL from the content
                    preg_match('/<img.*?src=["\'](.*?)["\']/', $content, $matches);
                    $image_url = isset($matches[1]) ? $matches[1] : '';

                    // Get the product categories
                    $categories = get_the_terms(get_the_ID(), 'product_category');
                    if ($categories && !is_wp_error($categories)) {
                        $category = $categories[0]; // Assuming each product has at least one category
                    }
                    ?>
                    <div class="front-products">
                        <div class="product_thumbnail">
                            <?php if ($content && $category) : ?>
                                <a href="#" class="category-link" data-category-id="category-<?php echo $category->term_id; ?>" data-product-id="product-<?php echo $product_id; ?>">
                                    <img data-src="<?php echo esc_url($image_url); ?>" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" class="front-lazy" />
                                </a>
                                <div class="product_title"><?php echo esc_html($category->name); ?></div> <!-- Display category name -->
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile;
            else : ?>
                <p>投稿がありません。</p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
        <div class="view-all-products">
            <a href="./products/">
                View All Products　　&gt;
            </a>
        </div>
    </section>
</div>


        <!-- ABOUTUS -->
        <div class="scroll-up">
            <h3 class="title front-page-about-title">About Us</h3>

            <section class="scroll-up">
                <div class="aboutus-container">
                    <div class="person">
                        <div class="portrait"><img src="https://www.rect-a.com/wp-content/uploads/2024/07/naito-portrait.png" alt="naito-portrait"></div>
                        <div class="history">
                            <p class="name">内藤 正宏　一級建築士 (第 382692 号)</p>
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
                    <div class="person">
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
                </div>
            </section>
        </div>

        <!-- CONTACTS -->
        <div class="scroll-up">
            <section class="contacts">
                <div class="contact-title">Contact Us</div>
                <div class="contact-subtitle">お問い合わせはこちらから</div>
                <a href="https://www.rect-a.com/contacts/" class="contact-form">
                    <p class="footer-contact-form-title">Contact Form</p>
                    <p class="footer-contact-form-icon">></p>
                </a>
            </section>
        </div>

    </div>
</div>

<!-- Footer -->
<?php
get_footer();
?>