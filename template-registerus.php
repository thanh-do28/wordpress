<?php

/*
Template Name: Register
*/
?>
<?php get_header(); ?>
<section class="page-wrap bg-dark" style="min-height: 600px;">
    <div class="container bg-light h-100 w-100 pb-5">

        <h1 class="pb-5 text-center"><?php the_title(); ?></h1>

        <div class="border border-1 rounded w-75 m-auto py-3 px-5 m-2 ">
            <div class="container_register">
                <form action="" method="">
                    <div class="d-flex flex-column">
                        <p>Please fill in this form to create an account.</p>

                        <label for="name"><b>Name</b></label>
                        <input style="outline: none;" class=" p-1 mb-3" type="text" placeholder="Enter Name" name="name" required>

                        <label for="email"><b>Email</b></label>
                        <input style="outline: none;" class=" p-1 mb-3" type="text" placeholder="Enter Email" name="email" required>

                        <label for="psw"><b>Password</b></label>
                        <input style="outline: none;" class=" p-1 mb-3" type="password" placeholder="Enter Password" name="psw" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input style="outline: none;" class=" p-1 mb-3" type="password" placeholder="Repeat Password" name="psw-repeat" required>

                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="d-flex justify-content-between align-items-center my-4">
                            <button type="button" class="cancelbtn btn btn-danger">Cancel</button>
                            <button type="submit" class="signupbtn btn btn-primary">Sign Up</button>
                        </div>
                        <div>Already have an account to login <a href="/php_todolist/view_login/login_index.php">Click Here</a></div>
                    </div>

                </form>
            </div>
        </div>



    </div>
</section>

<?php get_footer(); ?>