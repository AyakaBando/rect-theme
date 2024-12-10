<?php get_header(); ?>

<div class="wrapper" style="background-color: #fff;">
    <!----------------------------------------------------------- Header  ------------------------------------------------------------->
    <div class="header-img item-header-img">
        <div class="logo-over-main-pic">
            <a href="<?php echo site_url(); ?>" class="pc-logo">
                <img src="https://www.rect-a.com/wp-content/uploads/2024/08/rect-white.png" alt="rect-logo">
            </a>
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
        <h1 class="header-title item-header-title"><?php post_type_archive_title(); ?></h1>
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
                        <li><a href="<?php echo site_url('/flow'); ?>">FLOW</a></li>
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

    <div class="products-first">
        <h2 class="archive-page-products-title"><?php post_type_archive_title(); ?></h2>
        <p class="archive-page-products-explanation">
            これまでのプロジェクトで採用した素材、建材をご紹介します。<br>
            プロジェクト毎の雰囲気やご予算に合わせて検討を重ね、ご提案しています。
        </p>
    </div>

    <main class="archive-page-products-container">
        <?php
        $categories = get_terms(array(
            'taxonomy' => 'product_category',
            'hide_empty' => true,
        ));

        foreach ($categories as $category) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 1,
                'orderby' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_category',
                        'field' => 'slug',
                        'terms' => $category->slug,
                    ),
                ),
            );


            $my_query = new WP_Query($args);

            if ($my_query->have_posts()) {
                echo '<section class="archive-page-product-info">';
                while ($my_query->have_posts()) : $my_query->the_post();
                    $product_id = get_the_ID();
                    $content = get_the_content();

                    // Ensure only the first image is selected for display
                    preg_match('/<img.*?src=["\'](.*?)["\']/', $content, $matches);
                    $image_url = isset($matches[1]) ? $matches[1] : '';
                    // Get the attachment ID and description
                    $attachment_id = get_post_thumbnail_id($product_id);
                    $attachment_post = get_post($attachment_id);
                    $attachment_description = $attachment_post->post_content;
                    $product_url = get_post_meta($product_id, 'product_url', true);


                    // Get the post thumbnail (if exists)
                    $thumbnail_url = get_the_post_thumbnail_url($product_id, 'full');


                    // Use thumbnail if available, otherwise fall back to the image extracted from content
                    $final_image_url = !empty($thumbnail_url) ? $thumbnail_url : $image_url;
        ?>

                    <div class="archive-page-products">
                        <a href="#" class="category-link" data-category-id="category-<?php echo $category->term_id; ?>" data-product-id="product-<?php echo $product_id; ?>">
                            <img src="<?php echo esc_url($final_image_url); ?>" alt="<?php echo get_the_title(); ?>" />
                        </a>
                        <p class="archive-page-product_post_title">
                            <?php echo  $category->name ?>
                        </p>
                    </div>

                    <!-- Modal Structure for the Category -->
                    <section id="category-<?php echo $category->term_id; ?>" class="modal">
                        <div class="modal-content">
                            <div class="modal-content-container">
                                <div class="close">
                                    <div class="close-btn-border-1"></div>
                                    <div class="close-btn-border-2"></div>
                                </div>
                                <div class="single-product-container">
                                    <div class="single-product-information">
                                        <div class="single-product-category-image-container">
                                            <div class="large-image-container">
                                                <img src="<?php echo esc_url($final_image_url); ?>" alt="<?php echo get_the_title(); ?>" id="large-image">
                                            </div>
                                            <div class="single-product-description">
                                                <div class="product-list">
                                                    <?php
                                                    // Fetch all products within the same category to display in the modal
                                                    $all_products_query = new WP_Query(array(
                                                        'post_type' => 'product',
                                                        'posts_per_page' => -1,
                                                        'orderby' => 'DESC',
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'product_category',
                                                                'field' => 'slug',
                                                                'terms' => $category->slug,
                                                            ),
                                                        ),
                                                    ));

                                                    $first_product_id = null; // Initialize a variable to store the first product ID

                                                    if ($all_products_query->have_posts()) {
                                                        while ($all_products_query->have_posts()) : $all_products_query->the_post();
                                                            $product_id = get_the_ID();
                                                            $content = get_the_content();
                                                            preg_match('/<img.*?src=["\'](.*?)["\']/', $content, $matches);
                                                            $image_url = isset($matches[1]) ? $matches[1] : '';

                                                            // Set the first product ID if it hasn't been set yet
                                                            if ($first_product_id === null) {
                                                                $first_product_id = $product_id;
                                                            }

                                                    ?>
                                                            <div class="product-item">
                                                                <a href="#" class="product-link" data-product-id="product-<?php echo $product_id; ?>" data-full-image="<?php echo esc_url($image_url); ?>" data-title="<?php echo esc_html(get_the_title($product_id)); ?>">
                                                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_the_title(); ?>" />
                                                                </a>
                                                            </div>
                                                    <?php
                                                        endwhile;
                                                    } else {
                                                        // Debugging statement if no posts are found
                                                        error_log("No products found in the specified category.");
                                                    }
                                                    wp_reset_postdata();

                                                    // Ensure first_product_id is set correctly
                                                    if ($first_product_id !== null) {
                                                        // Debugging statement to check the first product ID
                                                        error_log("First Product ID after loop: " . $first_product_id);
                                                    } else {
                                                        error_log("No product ID was set.");
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="single-product-modal-line">
                                        <div class="single-product-single-border"></div>

                                        <div class="product-list-item-description">
                                            <?php if ($first_product_id !== null) : ?>
                                                <h3><?php echo esc_html(get_the_title($first_product_id)); ?></h3>
                                                <p><?php if (!empty($attachment_description)) { ?></p>
                                                <p><?php echo wp_kses_post($attachment_description); ?></p>
                                            <?php } ?>
                                            <a href="<?php echo esc_url($product_url); ?>" target="_blank" class="modal-page-link">
                                                <p>Page Link</p>
                                                <svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 30 30" width="20px" height="20px">
                                                    <path d="M 25.980469 2.9902344 A 1.0001 1.0001 0 0 0 25.869141 3 L 20 3 A 1.0001 1.0001 0 1 0 20 5 L 23.585938 5 L 13.292969 15.292969 A 1.0001 1.0001 0 1 0 14.707031 16.707031 L 25 6.4140625 L 25 10 A 1.0001 1.0001 0 1 0 27 10 L 27 4.1269531 A 1.0001 1.0001 0 0 0 25.980469 2.9902344 z M 6 7 C 4.9069372 7 4 7.9069372 4 9 L 4 24 C 4 25.093063 4.9069372 26 6 26 L 21 26 C 22.093063 26 23 25.093063 23 24 L 23 14 L 23 11.421875 L 21 13.421875 L 21 16 L 21 24 L 6 24 L 6 9 L 14 9 L 16 9 L 16.578125 9 L 18.578125 7 L 16 7 L 14 7 L 6 7 z" />
                                                </svg>
                                            </a>
                                        <?php else : ?>
                                            <p>No product ID was set.</p>
                                        <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>

        <?php
                endwhile;
                wp_reset_postdata();
            }
            echo '</section>';
        }
        ?>
    </main>
</div>

<?php get_footer(); ?>