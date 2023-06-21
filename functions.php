<?php


// load stylesheets
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}
add_action("wp_enqueue_scripts", 'load_css');



//  load javascript
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', false, true);
    wp_enqueue_script('main');
}
add_action("wp_enqueue_scripts", 'load_js');

function wpse_script_loader_tag($tag, $handle)
{
    if ('jquery-fluidbox' !== $handle) {
        return $tag;
    }

    return str_replace(' src', ' data-cfasync="false" src', $tag);
}
add_filter('script_loader_tag', 'wpse_script_loader_tag', 10, 2);

// theme options
add_theme_support('menus');




// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
    )
);


add_action('wp_ajax_checkbox', 'updata_checkbox');
add_action('wp_ajax_nopriv_checkbox', 'updata_checkbox');

function updata_checkbox()
{

    $formdata = [];
    wp_parse_str($_POST['checkbox'], $formdata);

    $id = $formdata['id'];
    global $wpdb;
    // // this is how you get access to the database
    $result = $wpdb->get_results("SELECT checked FROM wp_todos WHERE id = $id");
    // this is required to terminate immediately and return a proper response

    $checked = $result[0]->checked;
    $aChecked = !$checked;

    $results = $wpdb->update(
        'wp_todos',
        array(
            'checked' => $aChecked,    // string
        ),
        array('id' => $id)
    );

    wp_send_json_success([$results, $aChecked]);
}


add_action('wp_ajax_presently', "inset_presently");
add_action('wp_ajax_nopriv_presently', 'inset_presently');

function inset_presently()
{

    $formdata = [];
    wp_parse_str($_POST['presently'], $formdata);

    $title = $formdata['title'];
    $id = $_COOKIE["user_login_id"];
    // wp_send_json_success(isset($id));

    if (empty($id)) {
        wp_send_json_success('erroid');
    } else {
        if (empty($title)) {
            wp_send_json_success('errotitle');
        } else {
            global $wpdb;
            $results = $wpdb->insert(
                'wp_todos',
                array(
                    'title' => $title,
                    'user_id' => $id,
                ),
            );
            wp_send_json_success($results);
        }
    }
}


add_action('wp_ajax_delete', "delete_todo");
add_action('wp_ajax_nopriv_delete', 'delete_todo');

function delete_todo()
{
    $formdata = [];
    wp_parse_str($_POST['delete'], $formdata);

    $id = $formdata['id'];
    global $wpdb;
    $results = $wpdb->delete('wp_todos', array('id' => $id));
    wp_send_json_success($results);
}





// custom post type

// function tao_custom_post_type()
// {


//     /*
//      * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
//      */
//     $label = array(
//         'name' => 'admins', //Tên post type dạng số nhiều
//         'singular_name' => 'admin' //Tên post type dạng số ít
//     );

//     $support = array(
//         'title', //
//         'editor', // biên tập viên
//         'excerpt', //đoạn trích
//         'author', //tác giả
//         'thumbnail', // ảnh đại diện
//         'comments', // bình luận
//         'trackbacks',
//         'revisions',
//         'custom-fields'
//     );

//     /*
//      * Biến $args là những tham số quan trọng trong Post Type
//      */
//     $args = array(
//         'labels' => $label, //Gọi các label trong biến $label ở trên
//         'description' => 'Post type đăng sản phẩm', //Mô tả của post type
//         'supports' =>  $support, //Các tính năng được hỗ trợ trong post type
//         'taxonomies' => array('category', 'post_tag'), //Các taxonomy được phép sử dụng để phân loại nội dung
//         // 'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
//         'public' => true, //Kích hoạt post type
//         'show_ui' => true, //Hiển thị khung quản trị như Post/Page
//         'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
//         'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
//         // 'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
//         // 'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
//         // 'menu_icon' => "dashicons-database", //Đường dẫn tới icon sẽ hiển thị
//         // 'can_export' => true, //Có thể export nội dung bằng Tools -> Export
//         // 'has_archive' => true, //Cho phép lưu trữ (month, date, year)
//         // 'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
//         // 'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
//         // 'capability_type' => 'post' //
//     );


//     register_post_type('admins', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên


// }
// /* Kích hoạt hàm tạo custom post type */
// add_action('init', 'tao_custom_post_type');


function wpdocs_kantbtrue_init()
{
    $labels = array(
        'name'                  => 'Admin', 'Post type general name', 'Admin',
        'singular_name'         => 'Admin', 'Post type singular name', 'Admin',
        'menu_name'             => 'Admin', 'Admin Menu text', 'Admin',
        'name_admin_bar'        => 'Admin', 'Add New on Toolbar', 'Admin',
        'add_new'               => 'Add New', 'Admin',
        'add_new_item'          => 'Add New Admin', 'Admin',
        'new_item'              => 'New Admin', 'Admin',
        'edit_item'             => 'Edit Admin', 'Admin',
        'view_item'             => 'View Admin', 'Admin',
        'all_items'             => 'All Admins', 'Admin',
        'search_items'          => 'Search Admins', 'Admin',
        'parent_item_colon'     => 'Parent Admins:', 'Admin',
        'not_found'             => 'No Admins found.', 'Admin',
        'not_found_in_trash'    => 'No Admins found in Trash.', 'Admin',
        'featured_image'        => 'Admin Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'Admin',
        'set_featured_image'    => 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'Admin',
        'remove_featured_image' => 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'Admin',
        'use_featured_image'    => 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'Admin',
        'archives'              => 'Admin archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'Admin',
        'insert_into_item'      => 'Insert into Admin', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'Admin',
        'uploaded_to_this_item' => 'Uploaded to this Admin', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post. Added in 4.4', 'Admin',
        'filter_items_list'     => 'Filter Admins list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'Admin',
        'items_list_navigation' => 'Admins list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'Admin',
        'items_list'            => 'Admins list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'Admin',
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'Admin custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'Admin'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'supports'           => array('title', 'editor', 'author', 'thumbnail'),
        'taxonomies'         => array('category', 'post_tag'),
        'show_in_rest'       => true
    );

    register_post_type('Admin', $args);
}
add_action('init', 'wpdocs_kantbtrue_init');

add_filter('pre_get_posts', 'lay_custom_post_type');
function lay_custom_post_type($query)
{
    if (is_home() && $query->is_main_query())
        $query->set('post_type', array('post', 'Admin'));
    return $query;
}
