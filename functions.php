<?php

// Enqueue styles and scripts
function rect_files()
{
    error_log('Enqueuing styles and scripts.');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');
    wp_enqueue_style('maincss', get_theme_file_uri('./build/style-index.css'));
    wp_enqueue_style('indexcss', get_theme_file_uri('./build/index.css'));
}
add_action('wp_enqueue_scripts', 'rect_files');

// Enqueue custom scripts
function enqueue_custom_scripts()
{
    error_log('Enqueuing custom scripts.');
    wp_deregister_script('index-js'); // Ensure no script with this handle is registered

    // Enqueue custom script
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/src/index.js', array('jquery'), null, true);

    // Localize script data
    $image_id = get_query_var('image_id');
    wp_localize_script('custom-script', 'carouselData', array(
        'image_id' => $image_id
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Theme support features
function rect_features()
{
    error_log('Adding theme support features.');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'rect_features');

// Adjust queries
function rect_adjust_queries($query)
{
    error_log('Adjusting queries.');
    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('projects') || is_post_type_archive('scene')) {
            $query->set('orderby', 'title');
            $query->set('order', 'ASC');
            $query->set('posts_per_page', -1);
        } elseif (is_post_type_archive('news')) {
            $query->set('orderby', 'date');
            $query->set('order', 'ASC');
        }
    }
}
add_action('pre_get_posts', 'rect_adjust_queries');

// Order taxonomy by description
function taxonomy_orderby_description($orderby, $args)
{
    if ($args['orderby'] == 'description') {
        $orderby = 'tt.description';
    }
    return $orderby;
}
add_filter('get_terms_orderby', 'taxonomy_orderby_description', 10, 2);

// Add categories for attachments
function add_categories_for_attachments()
{
    error_log('Adding categories for attachments.');
    register_taxonomy_for_object_type('category', 'attachment');
    register_taxonomy_for_object_type('post_tag', 'attachment');
}
add_action('init', 'add_categories_for_attachments');

// Disable wpautop filter for specific post types
function wpautop_filter($content)
{
    error_log('Disabling wpautop filter for specific post types.');
    if (is_singular('project')) {
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');
    }
    return $content;
}
add_filter('the_content', 'wpautop_filter', 9);
add_filter('the_excerpt', 'wpautop_filter', 9);

// Custom rewrite rules
function custom_rewrite_rules()
{
    error_log('Adding custom rewrite rules.');
    add_rewrite_rule('^projects/([^/]+)/([0-9]+)/?$', 'index.php?project_name=$matches[1]&image_id=$matches[2]', 'top');
}
add_action('init', 'custom_rewrite_rules');

// Add custom query vars
function add_custom_query_vars($vars)
{
    error_log('Adding custom query vars.');
    $vars[] = 'project_name';
    $vars[] = 'image_id';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

// Load custom template
function load_custom_template($template)
{
    error_log('Inside load_custom_template function.');
    
    if (get_query_var('project_name') && get_query_var('image_id')) {
        error_log('Request URL: ' . $_SERVER['REQUEST_URI']);
        error_log('Project Name: ' . get_query_var('project_name'));
        error_log('Image ID: ' . get_query_var('image_id'));

        $custom_template = locate_template('single-project-details.php');
        error_log('Custom template path: ' . $custom_template);

        if ($custom_template) {
            error_log('Loading custom template.');
            return $custom_template;
        } else {
            error_log('Custom template not found.');
        }
    }

    error_log('Loading default template.');
    return $template;
}
add_filter('template_include', 'load_custom_template');



// Flush rewrite rules on activation and theme switch
function custom_flush_rewrite_rules()
{
    error_log('Flushing rewrite rules.');
    custom_rewrite_rules();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'custom_flush_rewrite_rules');
add_action('after_switch_theme', 'custom_flush_rewrite_rules');

// Save project hotspots meta
function save_project_hotspots_meta($post_id)
{
    if (array_key_exists('project_images_hotspots', $_POST)) {
        update_post_meta(
            $post_id,
            'project_images_hotspots',
            sanitize_text_field($_POST['project_images_hotspots'])
        );
    }
}
add_action('save_post', 'save_project_hotspots_meta');

// Add meta box for project hotspots
function project_images_hotspots_meta_box()
{
    error_log('Adding meta box for project hotspots.');
    add_meta_box(
        'project_images_hotspots_meta_box',
        'ホットスポット(JSON)',
        'render_project_images_hotspots_meta_box',
        'project',
        'advanced',
        'high'
    );
}
add_action('add_meta_boxes', 'project_images_hotspots_meta_box');

// Render meta box content
function render_project_images_hotspots_meta_box($post)
{
    $value = get_post_meta($post->ID, 'project_images_hotspots', true);
?>
    <label for="project_images_hotspots">JSON:</label>
    <textarea id="project_images_hotspots" name="project_images_hotspots" rows="10" cols="50"><?php echo esc_textarea($value); ?></textarea>
<?php
}

// Enqueue hotspot plugin scripts and styles
function enqueue_hotspot_plugin_scripts()
{
    error_log('Enqueuing hotspot plugin scripts and styles.');

    wp_enqueue_script('jquery');
    wp_enqueue_script('hotspot-script', plugins_url('hotspot-plugin/js/hotspot-script.js'), array('jquery'), time(), true);
    wp_enqueue_style('hotspot-style', plugins_url('hotspot-plugin/css/style.css'), array(), '1.0', 'all');

    if (wp_script_is('hotspot-script', 'enqueued')) {
        error_log('hotspot-script is enqueued.');
    } else {
        error_log('hotspot-script is NOT enqueued.');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_hotspot_plugin_scripts');


// Add meta description
add_action('admin_menu', 'my_add_custom_fields');
add_action('save_post', 'my_save_custom_fields');
function my_add_custom_fields()
{
    // Add meta boxes for default posts and pages
    add_meta_box('my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'post');
    add_meta_box('my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'page');

    // Add meta boxes for custom post types
    add_meta_box('my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'project');
    add_meta_box('my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'news');
    add_meta_box('my_f02', 'メタディスクリプション(ページの説明)', 'my_description', 'product');
}

// Textbox for CustomField
function my_description()
{
    global $post;
    $f_data = get_post_meta($post->ID, 'meta_description', true);
    wp_nonce_field(wp_create_nonce(__FILE__), 'ul_nonce');
    echo '<p>全角120字以内が望ましいです。</p>';
    echo '<textarea style="width:100%" rows="4" type="text" name="meta_description">' . htmlspecialchars($f_data) . '</textarea>';
}

// Save CustomField value
function my_save_custom_fields($post_id)
{
    //nonce (For Security)
    $ul_nonce = isset($_POST['ul_nonce']) ? $_POST['ul_nonce'] : null;
    if (!wp_verify_nonce($ul_nonce, wp_create_nonce(__FILE__))) {
        return $post_id;
    }

    // Remove Exception
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    //List of CustomField
    $keys = array(
        'meta_description',
    );

    //Reload CustomField
    foreach ($keys as $key) {
        $data = isset($_POST[$key]) ? $_POST[$key] : '';
        if (get_post_meta($post_id, $key) == "") {
            add_post_meta($post_id, $key, $data, true);
        } elseif ($data != get_post_meta($post_id, $key, true)) {
            update_post_meta($post_id, $key, $data);
        } elseif ($data == "") {
            delete_post_meta($post_id, $key, get_post_meta($post_id, $key, true));
        }
    }
}

// Get Meta Description
function my_meta_description_set()
{
    //article
    if (get_post_meta(get_the_ID(), 'meta_description', true)) {
        echo htmlspecialchars(get_post_meta(get_the_ID(), 'meta_description', true));
        //others
    } else {
        echo htmlspecialchars('共通のメタディスクリプションを入力');
    }
}


// Custom Scene Tags Order
function set_custom_tag_order()
{
    $custom_order = array(
        '外観' => 1,
        '玄関' => 2,
        'LDK' => 3,
        '階段' => 4,
        '洗面室・浴室' => 5,
        'トイレ' => 6,
        '寝室' => 7,
        '書斎' => 8,
        '和室' => 9,
        'ガレージ' => 10,
        '庭・テラス' => 11,
    );

    foreach ($custom_order as $tag_name => $order) {
        $tag = get_term_by('name', $tag_name, 'post_tag');
        if ($tag) {
            update_term_meta($tag->term_id, 'custom_order', $order);
        }
    }
}
add_action('init', 'set_custom_tag_order');


// Create Preferred Project Taxonomy
function create_preferred_taxonomy()
{
    $labels = [
        'name' => 'トップページに表示する',
        'singular_name' => 'Preferred Project',
        'search_items' => 'Search Preferred Projects',
        'all_items' => 'All Preferred Projects',
        'parent_item' => 'Parent Preferred Project',
        'parent_item_colon' => 'Parent Preferred Project',
        'edit_item' => 'Edit Preferred Project',
        'update_item' => 'Update Preferred Project',
        'add_new_item' => 'Add New Preferred Project',
        'new_item_name' => 'New Preferred Project Name',
        'menu_name' => 'Preferred Projects'
    ];

    $args = [
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'preferred'],
    ];

    register_taxonomy('preferred', ['project'], $args);
}
add_action('init', 'create_preferred_taxonomy');

// Add a meta box for the custom order
function add_custom_order_meta_box()
{
    add_meta_box(
        'custom_order_meta_box',
        '表示順序の並び替え',
        'display_custom_order_meta_box',
        'project',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_order_meta_box');

// Display the metabox
function display_custom_order_meta_box($post)
{
    wp_nonce_field(basename(__FILE__), 'custom_order_nonce');
    $custom_order = get_post_meta($post->ID, 'custom_order', true);
?>
    <label for="custom_order">番号:</label>
    <input type="number" name="custom_order" id="custom_order" value="<?php echo esc_attr($custom_order); ?>" />
    <?php
}

// Save the custom order
function save_custom_order_meta($post_id)
{
    if (isset($_POST['custom_order']) && isset($_POST['custom_order_nonce']) && wp_verify_nonce($_POST['custom_order_nonce'], basename(__FILE__))) {
        update_post_meta($post_id, 'custom_order', sanitize_text_field($_POST['custom_order']));
    }
}
add_action('save_post', 'save_custom_order_meta');

// Add and reorder columns for the project post type list
function set_custom_columns($columns)
{
    // Define the columns to add and reorder
    $new_columns = array(
        'cb'               => $columns['cb'],
        'title'            => $columns['title'],
        'display_toppage'  => 'トップページに表示する',
        'display_order'    => '表示順序',
        'date'             => $columns['date'],
    );

    return $new_columns;
}
add_filter('manage_project_posts_columns', 'set_custom_columns');

// Display the custom column content
function custom_column_content($column_name, $post_id)
{
    if ($column_name === 'display_toppage') {
        // Output for Display Toppage column
        $terms = get_the_terms($post_id, 'preferred');
        echo $terms ? esc_html($terms[0]->name) : '—';
    }

    if ($column_name === 'display_order') {
        // Output for Display Order column
        $order = get_post_meta($post_id, 'custom_order', true);
        echo $order ? esc_html($order) : '—';
    }
}
add_action('manage_project_posts_custom_column', 'custom_column_content', 10, 2);

// Add custom order field to the quick edit section
function display_custom_order_quick_edit($column_name, $post_type)
{
    if ($column_name === 'display_order') {
    ?>
        <fieldset class="inline-edit-col-right">
            <div class="inline-edit-col">
                <label>
                    <span class="title">Display Order</span>
                    <span class="input-text-wrap">
                        <input type="number" name="custom_order" class="custom_order" value="">
                    </span>
                </label>
            </div>
        </fieldset>
    <?php
    }
}
add_action('quick_edit_custom_box', 'display_custom_order_quick_edit', 10, 2);

// Save the custom order value from quick edit
function save_custom_order_quick_edit($post_id)
{
    if (isset($_POST['custom_order'])) {
        update_post_meta($post_id, 'custom_order', sanitize_text_field($_POST['custom_order']));
    }
}
add_action('save_post', 'save_custom_order_quick_edit');

// Load custom order value into the quick edit form
function enqueue_inline_edit_custom_script()
{
    wp_enqueue_script('inline-edit-custom-order', get_template_directory_uri() . '/js/inline-edit-custom-order.js', ['jquery', 'inline-edit-post'], '', true);
}
add_action('admin_enqueue_scripts', 'enqueue_inline_edit_custom_script');

function add_custom_order_to_inline_edit($post)
{
    $custom_order = get_post_meta($post->ID, 'custom_order', true);
    ?>
    <script type="text/javascript">
        jQuery(function($) {
            let post_id = <?php echo $post->ID; ?>;
            let custom_order = '<?php echo esc_js($custom_order); ?>';

            inlineEditPost.revert();
            $('#edit-' + post_id).find('input[name="custom_order"]').val(custom_order);
        });
    </script>
<?php
}
add_action('admin_footer', 'add_custom_order_to_inline_edit');

// For Single-project-details.php 
function my_custom_image_sizes() {
    add_image_size('custom-size-480', 480, 360, true);  // 480x360 size
    add_image_size('custom-size-960', 960, 720, true);  // 960x720 size
}
add_action('after_setup_theme', 'my_custom_image_sizes');

// Fixed CORS Problems
function add_cors_http_header() {
    header("Access-Control-Allow-Origin: https://www.rect-a.com");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
}
add_action('init', 'add_cors_http_header');

?>