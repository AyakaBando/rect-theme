<?php
$project_name = get_query_var('project_name');
$image_id = get_query_var('image_id');

// Only include header if $project_name and $image_id are not set
if ($project_name && $image_id) {
    add_filter('body_class', function ($classes) {
        $classes[] = 'single-project-details-page';
        $classes[] = 'hide-footer';
        return $classes;
    });
}

get_header();


// Custom query to get the project post by its slug
$args = array(
    'name' => $project_name,
    'post_type' => 'project',
    'posts_per_page' => 1
);
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()) :
    while ($custom_query->have_posts()) :
        $custom_query->the_post();
?>
        <div class="wrapper">
            <main class="single-project-details">
                <div class="wp-block-group single-project-pic project-slider">
                    <div class="tool-image-group">
                        <?php
                        $project_name = sanitize_title(get_the_title());
                        echo '<a href="' . esc_url(home_url("/projects/$project_name")) . '">';
                        ?>
                        <img src="<?php echo esc_url(home_url('/wp-content/uploads/2024/08/project-cross.png')); ?>" alt="project-hide-button" class="back-page">
                        </a>
                    </div>

                    <div class="carousel" data-initial-image-id="<?php echo esc_attr($image_id); ?>">
                        <section class="carousel-track">
                            <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5" stroke="#707070" class="w-4 h-4 carousel-prev" width="36">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                            <div class="single-carousel-image">
                                <?php
                                $images = get_attached_media('image', get_the_ID());
                                $images_hotspots = get_post_meta(get_the_ID(), 'project_images_hotspots', true);
                                $images_hotspots = json_decode($images_hotspots, true);

                                if ($images) {
                                    foreach ($images as $image) {
                                        $img_id = $image->ID; // Use a different variable to avoid conflict
                                        $caption = wp_get_attachment_caption($img_id);
                                        echo '<div class="carousel-slide" data-image-id="' . $img_id . '">';
                                        echo wp_get_attachment_image($img_id, array(960, 720));
                                        echo '<div class="slide-caption">' . esc_html($caption) . '</div>';

                                        // Add hotspot container
                                        if ($images_hotspots && is_array($images_hotspots)) {
                                            foreach ($images_hotspots as $data) {
                                                if ($data['image'] == $img_id) {
                                                    $hotspots = $data['hotspots'];
                                                    echo '<div class="image-hotspots-container" data-image-id="' . $img_id . '" data-hotspots=\'' . json_encode($hotspots) . '\'>';

                                                    // Output hotspots using plugin's hotspot interface
                                                    echo '<div id="hotspot-interface-' . $img_id . '" class="hotspot-interface">';
                                                    // You can customize how hotspots are displayed here
                                                    echo '</div>'; // Close hotspot interface div

                                                    echo '</div>'; // Close image-hotspots-container div
                                                    break;
                                                }
                                            }
                                        }

                                        echo '</div>'; // Close carousel-slide div
                                    }
                                }
                                ?>
                            </div>
                            <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=".5" stroke="#707070" class="w-4 h-4 carousel-next" width="36">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>

                        </section>

                        <section class="content">
                            <?php
                            $tags = get_the_terms(get_the_ID(), 'project-tag');
                            $tag_classes = '';
                            if ($tags && !is_wp_error($tags)) {
                                foreach ($tags as $tag) {
                                    $tag_classes .= ' ' . esc_html($tag->slug);
                                }
                            }

                            // Get the project name (slug)
                            $project_name = sanitize_title(get_the_title());

                            // Display the title and tags within a single container
                            echo '<div class="single-project-details-title-container">';
                            echo '<h1 class="single-project-details-title">' . get_the_title() . '</h1>';
                            echo '<div class="single-project-details-tags">';
                            if ($tags && !is_wp_error($tags)) {
                                $tag_list = [];
                                foreach ($tags as $tag) {
                                    $tag_list[] = '<p>' . esc_html($tag->name) . '</p>';
                                }
                                echo implode(' ', $tag_list);
                            }
                            echo '</div>';
                            echo '</div>';

                            // Get the caption for the image
                            $caption = wp_get_attachment_caption($image_id);
                            if ($caption) {
                                echo '<div class="trim_contents">' . esc_html($caption) . '</div>';
                            }
                            ?>

                            <!-- Product Information -->
                            <div class="single-project-images">
                                <?php
                                if ($images_hotspots) {
                                    foreach ($images_hotspots as $data) {
                                        $img_id = $data['image'];
                                        $hotspots = $data['hotspots'];
                                ?>
                                        <div class="product-container" data-image-id="<?php echo esc_attr($img_id); ?>">
                                            <?php foreach ($hotspots as $hotspot) {
                                                $product_id = $hotspot['product'];
                                                $category_terms = get_the_terms($product_id, 'product_category');
                                                if ($category_terms && !is_wp_error($category_terms)) {
                                                    $category_id = $category_terms[0]->term_id;
                                                } else {
                                                    $category_id = ''; // Set a default value or handle the case when there's no category
                                                }
                                                
                                                if ($product_id) { ?>
                                                <a href="" id="product-info-display" class="product-info" data-product-id="product-<?php echo $product_id; ?>" data-category-id="category-<?php echo $category_id; ?>">

                                                        <?php
                                                        // Get product information
                                                        $thumbnail_id = get_post_thumbnail_id($product_id);
                                                        $product_thumbnail = wp_get_attachment_image_src($thumbnail_id, "medium");
                                                        $thumbnail_description = get_post_field('post_content', $thumbnail_id);
                                                        ?>
                                                        
                                                        <div class="product-description">
                                                            <h2><?php echo esc_html(get_the_title($product_id)); ?></h2>
                                                            <?php if (!empty($thumbnail_description)) { ?>
                                                                <pre><?php echo esc_html(strip_tags($thumbnail_description)); ?></pre>
                                                            <?php } ?>
                                                        </div>
                                                        <!-- </div> -->
                                                    </a>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </section>
                    </div>
                </div>
            </main>

    <?php
    endwhile;
endif;

wp_reset_postdata();
    ?>

    <script>
        let archiveProductUrl = "<?php echo site_url('/products'); ?>";
    </script>

        </div>

        <?php get_footer(); ?>