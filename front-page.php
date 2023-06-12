<?php get_header(); ?>


<section class="page-wrap bg-dark" style="min-height: 600px;">
    <div class="container bg-light h-100 w-100 pb-3">

        <h1 class="pb-5 text-center"><?php the_title(); ?></h1>

        <div id="root" class="w-75 m-auto">
            <div class="body1 w-100 d-flex flex-column justify-content-center align-items-center">
                <div class='container1 w-100'>
                    <?php get_template_part('includes/form', 'todolist') ?>
                </div>

                <div class="container2 w-100">
                    <h1 class="text-center mt-3">todos</h1>
                    <?php get_template_part('includes/content', 'todolist'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>