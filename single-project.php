<?php
/*
Template Name: プロジェクト
Template Post Type: project
*/
?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="single-project-logo-over-main-pic">
        <div class="single-project-logo-over-main-pic__left">
            <a href="<?php echo site_url(); ?>" class="pc-logo">
                <img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo">
            </a>
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

    <!-- HAMBURGER MENU -->
    <div class="single-project-header">
        <div class="hamburger-logo">
            <a href="<?php echo site_url(); ?>" class="single-project-hamburger-logo-black"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo-black"></a>
        </div>
        <div class="single-project-hamburger-menu">
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


    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

            $attached_images = get_attached_media("image", get_the_ID());

            if (has_post_thumbnail()) {
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_url($thumbnail_id);
                $project_name = sanitize_title(get_the_title());
                $image_page_url = home_url("/projects/{$project_name}/{$thumbnail_id}/");

                echo '<div class="single-project-thumbnail">';
                echo '<a href="' . esc_url($image_page_url) . '">';
                echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '">';
                echo '</a>';

                // Fetch hotspots from custom field
                $images_hotspots = get_post_meta(get_the_ID(), 'project_images_hotspots', true);
                $images_hotspots = json_decode($images_hotspots, true);

                // Display hotspots for each image
                if (is_array($images_hotspots)) {
                    foreach ($images_hotspots as $image_hotspot) {
                        if ($image_hotspot['image'] == $thumbnail_id) {
                            foreach ($image_hotspot['hotspots'] as $hotspot) {
                                echo '<a href="' . esc_url(home_url("/projects/$project_name/$thumbnail_id")) . '">';
                                echo '<div class="hotspot-project-archive" data-image-id="' . esc_attr($thumbnail_id) . '" style="top: ' . esc_attr($hotspot['y_position']) . '%; left: ' . esc_attr($hotspot['x_position']) . '%;">';
                                echo '</div>';
                                echo '</a>';
                            }
                        }
                    }
                }
                echo '</div>';
            }

            $post_type = get_post_type(get_the_ID());
            echo '<div class="single-project-huge-container">';
            echo '<div class="single-project-title-gallery-container">';
            echo '<div class="single-project-title-box">';
            echo '<h1 class="project-page-title">' . esc_html($post_type) . '</h1>';

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
            echo '<section class="single-page-title-container">';
            echo '<h2 class="single-project-title">' . get_the_title() . '</h2>';
            echo '<div class="single-project-tags">';
            if ($tags && !is_wp_error($tags)) {
                $tag_list = [];
                foreach ($tags as $tag) {
                    $tag_list[] = '<p>' . esc_html($tag->name) . '</p>';
                }
                echo implode(' ', $tag_list);
            } else {
                echo 'No tags';
            }
            echo '</div>';
            echo '</div>';



            // Sort and display attached images
            if ($attached_images) {
                $images = [];

                foreach ($attached_images as $image) {
                    $image_id = $image->ID;
                    if ($image_id == $thumbnail_id) {
                        continue; // Skip the thumbnail image
                    }

                    $image_data = wp_get_attachment_metadata($image_id);
                    $width = $image_data['width'];
                    $height = $image_data['height'];

                    $images[] = [
                        'id' => $image_id,
                        'width' => $width,
                        'height' => $height,
                        'title' => get_the_title($image_id),
                        'aspect_ratio' => $height / $width,
                        'orientation' => ($width > $height) ? 'landscape' : 'portrait'
                    ];
                }

                // Sort images by title name (alphabetically)
                usort($images, function ($a, $b) {
                    return strcmp($a['title'], $b['title']);
                });

                $landscape_images = [];
                $portrait_buffer = [];
                $sorted_images = [];

                // Separate images into portrait and landscape while maintaining order
                foreach ($images as $image) {
                    if ($image['orientation'] === 'portrait') {
                        $portrait_buffer[] = $image;
                    } else {
                        // Flush portrait images in pairs before adding a landscape image
                        while (count($portrait_buffer) >= 2) {
                            $sorted_images[] = array_shift($portrait_buffer);
                            $sorted_images[] = array_shift($portrait_buffer);
                        }
                        // Add landscape image
                        $sorted_images[] = $image;
                    }
                }

                // Flush remaining portrait images
                while (count($portrait_buffer) > 0) {
                    $sorted_images[] = array_shift($portrait_buffer);
                }

                // Display final sorted images
                echo '<main class="project-custom-gallery">';
                foreach ($sorted_images as $image) {
                    $image_id = $image['id'];
                    $width = $image['width'];
                    $height = $image['height'];

                    // Determine layout class
                    $layout_class = ($width > $height) ? 'one-column' : 'two-column';

                    echo '<div class="project-gallery-item ' . esc_attr($layout_class) . '">';
                    echo '<a href="' . esc_url(home_url("/projects/$project_name/$image_id")) . '" class="single-project-link">';
                    echo wp_get_attachment_image($image_id, 'full');
                    echo '</a>';


                    // Define manual adjustments for specific images
                    $manual_adjustments = [
                        '1990' => [ // Assuming '1990' is the image ID
                            [
                                'x_position' => 90, // Adjusted percentage
                                'y_position' => 75, // Adjusted percentage
                            ],
                        ],
                        '1693' => [
                            [
                                'x_position' => 91, // Adjusted percentage
                                'y_position' => 82, // Adjusted percentage
                            ],
                    ],'1732' => [
                            [
                                'x_position' => 50, // Adjusted percentage
                                'y_position' => 31, // Adjusted percentage
                            ],
                    ],'1766' => [
                            [
                                'x_position' => 60, // Adjusted percentage
                                'y_position' => 78, // Adjusted percentage
                            ],
                    ],'1839' => [
                            [
                                'x_position' => 60, // Adjusted percentage
                                'y_position' => 34, // Adjusted percentage
                            ],
                    ],'1858' => [
                            [
                                'x_position' => 60, // Adjusted percentage
                                'y_position' => 46, // Adjusted percentage
                            ],
                    ],'1873' => [
                            [
                                'x_position' => 70, // Adjusted percentage
                                'y_position' => 50, // Adjusted percentage
                            ],
                    ],'1875' => [
                            [
                                'x_position' => 10, // Adjusted percentage
                                'y_position' => 93, // Adjusted percentage
                            ],
                    ],'1882' => [
                            [
                                'x_position' => 45, // Adjusted percentage
                                'y_position' => 65, // Adjusted percentage
                            ],
                    ],'1959' => [
                            [
                                'x_position' => 56, // Adjusted percentage
                                'y_position' => 13, // Adjusted percentage
                            ],
                    ],'2058' => [
                            [
                                'x_position' => 86, // Adjusted percentage
                                'y_position' => 39, // Adjusted percentage
                            ],
                    ],'2059' => [
                            [
                                'x_position' => 35, // Adjusted percentage
                                'y_position' => 37, // Adjusted percentage
                            ],
                    ],'2060' => [
                            [
                                'x_position' => 30, // Adjusted percentage
                                'y_position' => 50, // Adjusted percentage
                            ],
                    ],
                        // Add more images and their respective adjustments here...
                    ];

                    // Hotspot displaying code
                    if (is_array($images_hotspots)) {
                        foreach ($images_hotspots as $image_hotspot) {
                            if ($image_hotspot['image'] == $image_id) {
                                foreach ($image_hotspot['hotspots'] as $index => $hotspot) {
                                    // Default positions
                                    $x_position = $hotspot['x_position'];
                                    $y_position = $hotspot['y_position'];

                                    // Check for manual adjustments
                                    if (isset($manual_adjustments[$image_id][$index])) {
                                        $manual_hotspot = $manual_adjustments[$image_id][$index];
                                        // Override with manual positions if defined
                                        $x_position = $manual_hotspot['x_position'];
                                        $y_position = $manual_hotspot['y_position'];
                                    }

                                    echo '<a href="' . esc_url(home_url("/projects/$project_name/$image_id")) . '">';
                                    echo '<div class="hotspot-project-archive" data-image-id="' . esc_attr($image_id) . '" style="top: ' . esc_attr($y_position) . '%; left: ' . esc_attr($x_position) . '%;">';
                                    echo '</div>';
                                    echo '</a>';
                                }
                            }
                        }
                    }



                    echo '</div>';
                }
                echo '</main>';
            }








            echo '<section class="single-project-description-container">';
            echo '<div class="single-project-title-container">';
            echo '<h2 class="single-project-title_bottom">' . get_the_title() . '</h2>';
            echo '<div class="single-project-tags_bottom">';
            if ($tags && !is_wp_error($tags)) {
                $tag_list = [];
                foreach ($tags as $tag) {
                    $tag_list[] = '<p>' . esc_html($tag->name) . '</p>';
                }
                echo implode(' ', $tag_list);
            } else {
                echo 'No tags';
            }
            echo '</div>';
            echo '</div>';

            echo '<div class="single-project-content">';
            the_content();
            echo '</div>';
            echo '</div>';
            echo '</section>';

            echo '<a href="https://www.rect-a.com/projects/" class="single-project-back-to-list">Back to List</a>';

        endwhile;
    else :
        echo 'この投稿は見れません。';
    endif;
    ?>


</div>

<?php get_footer(); ?>