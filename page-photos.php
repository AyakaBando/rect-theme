<?php get_header(); ?>

<div class="wrapper">
    <!-- HAMBURGER MENU -->
    <div class="white-header header mobile-header-bg-image">
        <div class="hamburger-logo">
            <!--             <a href="<?php echo site_url(); ?>" class="hamburger-logo-white"><img src="https://rect-a.com/wp-content/uploads/2024/07/logo-mobile.png" alt="rect-logo-white"></a> -->
            <a href="<?php echo site_url(); ?>" class="hamburger-logo-black visible"><img src="https://www.rect-a.com/wp-content/uploads/2024/11/rect.gif" alt="rect-logo-black"></a>
        </div>
        <div class="hamburger-menu black-lines">
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

    <div class="photo-page-container">
        <?php
        // Query for projects to get their attachments
        $projects_args = array(
            'post_type'      => 'project',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',
        );
        $projects_query = new WP_Query($projects_args);

        if ($projects_query->have_posts()) :
            $project_ids = $projects_query->posts; // Array of project IDs

            // Query attachments related to these projects
            $args = array(
                'post_type'      => 'attachment',
                'post_status'    => 'inherit',
                'posts_per_page' => -1,
                'post_parent__in' => $project_ids,
                'orderby'        => 'post_parent',
                'order'          => 'DESC',
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>

                <aside class="photo-filter">
                    <div class="photo-filter-button-container">
                        <!-- <button class="photo-filter-button" data-tag="all">ALL</button> -->
                        <?php
                        // Define custom tag order
                        $custom_tag_order = array('外観', '玄関', 'LDK', '階段', '洗面室・浴室', 'トイレ', '寝室', '書斎', '和室', '収納', 'ガレージ', '庭・テラス');

                        // Get all unique tags associated with media items
                        $all_tags = array();
                        while ($query->have_posts()) {
                            $query->the_post();
                            $tags = get_the_tags(get_the_ID());
                            if ($tags && !is_wp_error($tags)) {
                                foreach ($tags as $tag) {
                                    $all_tags[$tag->term_id] = $tag->name;
                                }
                            }
                        }
                        wp_reset_postdata();

                        $filtered_tags = array_filter($all_tags, function ($tag_name) use ($custom_tag_order) {
                            return in_array($tag_name, $custom_tag_order);
                        });

                        // Sort tags based on custom order
                        usort($filtered_tags, function ($a, $b) use ($custom_tag_order) {
                            $pos_a = array_search($a, $custom_tag_order);
                            $pos_b = array_search($b, $custom_tag_order);
                            return $pos_a - $pos_b;
                        });

                        // Display tags as filter buttons
                        foreach ($filtered_tags as $tag_id => $tag_name) {
                            echo '<button class="photo-filter-button" data-tag="' . esc_attr($tag_name) . '">' . esc_html($tag_name) . '</button>';
                        }
                        ?>
                        <button class="photo-filter-button" data-tag="all">ALL</button>

                    </div>
                </aside>

                <div class="photo-container">
                    <aside class="photo-column-change">
                        <div class="project-photo-change">
                            <div class="scene-change">
                                <a href="/projects" class="scene-link projects-link">Projects</a>
                                <p>/</p>
                                <a href="/photos" class="scene-link scene-link-photos">Scene</a>
                            </div>
                            <div class="filter-buttons-mobile">
                                <!--                                 <select id="filter-dropdown">
                                </select>
                                <img src="https://rect-a.com/wp-content/uploads/2024/08/mobile-photo-arrow.png" alt="mobile-dropdown-arrow" class="mobile-photo-arrow"> -->
                                <?php
                                foreach ($custom_tag_order as $tag_name) {
                                    echo '<a href="#" class="mobile-filter-button" data-tag="' . esc_attr($tag_name) . '">' . esc_html($tag_name) . '</a>';
                                }
                                ?>
                                <a href="#" class="mobile-filter-button" data-tag="all">ALL</a>
                            </div>
                        </div>
                    </aside>


                    <!-- Display media items -->
                    <!-- loading -->
                    <div id="js-loader" class="loader-container">
                        <div class="loader"></div>
                    </div>

                    <div id="primary" class="photo-content-area">
                        <main id="main" class="site-main" role="main">
                            <?php
                            // Track the attachments already displayed
                            $displayed_attachments = array();

                            echo '<div class="entry-content">';
                            echo '<div class="custom-gallery">';

                            while ($query->have_posts()) :
                                $query->the_post();
                                $attachment_id = get_the_ID();
                                $parent_project_id = wp_get_post_parent_id($attachment_id);
                                $parent_project_url = get_permalink($parent_project_id);

                                if (!in_array($attachment_id, $displayed_attachments)) {
                                    $displayed_attachments[] = $attachment_id;

                                    // Retrieve each image size URL for the current attachment
                                    $image_url_full = wp_get_attachment_image_src($attachment_id, 'full')[0];
                                    $image_url_large = wp_get_attachment_image_src($attachment_id, 'large')[0];
                                    $image_url_medium = wp_get_attachment_image_src($attachment_id, 'medium')[0];
                                    $image_url_thumbnail = wp_get_attachment_image_src($attachment_id, 'thumbnail')[0];

                                    $image_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true);
                                    $tags = get_the_tags($attachment_id); // Get tags attached to the picture
                                    $tag_names = array();

                                    if ($tags && !is_wp_error($tags)) {
                                        $tag_names = array_map(function ($tag) {
                                            return $tag->name;
                                        }, $tags);
                                    }

                                    // Ensure `data-tags` is set even if no tags exist
                                    $tag_names_json = !empty($tag_names) ? '["' . implode('","', array_map('esc_attr', $tag_names)) . '"]' : '[]';
                                    echo '<div class="gallery-item" data-tags=\'' . $tag_names_json . '\'>';

                                    // Display image
                                    echo '<a href="' . esc_url($parent_project_url) . '">';
                                    echo '<img class="lazy" data-src="' . esc_url($image_url_full) . '" src="' . esc_url($image_url_thumbnail) . '" alt="' . esc_attr($image_alt) . '" 
                srcset="' . esc_url($image_url_thumbnail) . ' 150w, ' . esc_url($image_url_medium) . ' 300w, ' . esc_url($image_url_large) . ' 768w, ' . esc_url($image_url_full) . ' 1024w" 
                sizes="(max-width: 768px) 100vw, 768px">';
                                    echo '</a>';
                                    echo '</div>';
                                }
                            endwhile;

                            echo '</div>'; // .custom-gallery
                            echo '</div>'; // .entry-content
                            ?>
                        </main>

                    </div>
                </div>
            <?php endif; ?>
        <?php else : ?>
            <div>写真は準備中です。</div>
        <?php endif; ?>
    </div>

    <!-- CONTACTS -->
    <section class="contacts">
        <div class="contact-title">Contact Us</div>
        <div class="contact-subtitle">お問い合わせはこちらから</div>
        <a href="https://rect-a.com/contacts/" class="contact-form">
            <p class="footer-contact-form-title">Contact Form</p>
            <p class="footer-contact-form-icon">></p>
        </a>
    </section>
</div>

<?php get_footer(); ?>