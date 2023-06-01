<?php get_header(); ?>


<section class="page-wrap bg-dark" style="min-height: 600px;">
    <div class="container bg-light h-100 w-100 pb-3">

        <h1 class="pb-5 text-center"><?php the_title(); ?></h1>

        <div id="root" class="w-75 m-auto">
            <div class="body1 w-100 d-flex flex-column justify-content-center align-items-center">
                <div class='container1 w-100'>
                    <form id="presently" class='d-flex flex-column' action="" method="" autocomplete="off">
                        <label>
                            <input class="w-100 p-1" style="outline: none;" type="text" placeholder="What do you need to do?" name="title"></input>
                        </label>
                        <button class="btn btn-primary" type="submit">Add &nbsp; <span>&#43;</span></button>
                    </form>
                </div>

                <div class="container2 w-100">
                    <h1 class="text-center mt-3">todos</h1>
                    <div class="date">
                        <h6 class="pl-3 text-primary">12/02/2023</h6>
                        <div class="todo-item border border-1 mb-2 px-3 rounded">
                            <button class="d-block float-right border rounded mt-1 ">x</button>
                            <input type="checkbox" class="check-box" checked />
                            <h5>aaaaaaaaaa</h5>
                            <small>created: </small>
                        </div>
                    </div>
                    <div class="date">
                        <h6 class="pl-3 text-primary">11/02/2023</h6>
                        <div class="todo-item border border-1 mb-1 px-3 rounded">
                            <button class="d-block float-right border rounded mt-1 ">x</button>
                            <input type="checkbox" class="check-box" />
                            <h5>bbbbbbbbbb</h5>
                            <small>created:</small>
                        </div>
                        <div class="todo-item border border-1 mb-1 px-3 rounded">
                            <button class="d-block float-right border rounded mt-1 ">x</button>
                            <input type="checkbox" class="check-box" />
                            <h5>bbbbbbbbbb</h5>
                            <small>created:</small>
                        </div>
                        <div class="todo-item border border-1 mb-1 px-3 rounded">
                            <button class="d-block float-right border rounded mt-1 ">x</button>
                            <input type="checkbox" class="check-box" />
                            <h5>bbbbbbbbbb</h5>
                            <small>created:</small>
                        </div>
                        <div class="todo-item border border-1 mb-1 px-3 rounded">
                            <button class="d-block float-right border rounded mt-1 ">x</button>
                            <input type="checkbox" class="check-box" />
                            <h5>bbbbbbbbbb</h5>
                            <small>created:</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>