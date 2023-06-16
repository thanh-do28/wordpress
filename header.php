<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php wp_head() ?>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <div class="container">
            <div class="menu-top-bas-container">
                <ul id="menu-top-bas" class="top-bar">
                    <li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-18"><a href="http://localhost/wordpress/">Home</a></li>
                    <li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="http://localhost/wordpress/about-us/">About Us</a></li>

                    <?php
                    if (isset($_COOKIE["user_login_id"])) {
                    ?>

                        <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item menu-item-20">
                            <div class="user-img">
                                <span class="img">
                                    <img src="<?php echo get_template_directory_uri(); ?>./images/none-avatar.png" alt="#">
                                </span>
                                <span class="name"><?php echo $_COOKIE['user_login_name']; ?></span>
                            </div>
                        </li>


                    <?php } else { ?>
                        <li id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-15 current_page_item menu-item-20"><a href="http://localhost/wordpress/login/" aria-current="page">Login</a></li>
                        <li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-45"><a href="http://localhost/wordpress/register/">Register</a></li>
                    <?php } ?>



                </ul>
            </div>

            <?php
            // wp_nav_menu(
            //     array(
            //         'theme_location' => 'top-menu',
            //         'menu_class' => 'top-bar',
            //     )
            // );
            ?>
        </div>

    </header>