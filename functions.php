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
