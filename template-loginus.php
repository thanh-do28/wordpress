<?php

/*
Template Name: Login
*/
?>
<?php get_header(); ?>
<section class="page-wrap bg-dark " style="min-height: 600px;">
    <div class="container bg-light h-100 w-100 pb-5">

        <h1 class="pb-5 text-center"><?php the_title(); ?></h1>

        <div class="border border-1 rounded w-75 m-auto py-3 px-5 m-2 ">
            <div class="container_login">
                <form action="" method="">
                    <div class="d-flex flex-column">
                        <label for="uname"><b>Username</b></label>
                        <input style="outline: none;" class="p-1 mb-3" type="email" placeholder="Enter Username" name="uname" required>

                        <label for="psw"><b>Password</b></label>
                        <input style="outline: none;" class="p-1" type="password" placeholder="Enter Password" name="psw" required>

                        <button class="btn btn-primary mt-4 mb-2" type="submit">Login</button>
                        <label>
                            <input style="outline: none;" type="checkbox" checked="checked" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center my-4">
                        <div class="register">Do not have an account register here <a href="/php_todolist/view_register/register_index.php">Click Here</a></div>
                        <div class="login_admin"> Admin access <a href="/php_todolist/view_loginAdmin/login_admin.php">Click Here</a></div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button class="cancelbtn btn btn-danger" type="button">Cancel</button>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </div>
                </form>
            </div>
        </div>



    </div>
</section>

<?php get_footer(); ?>