<?php


if (isset($_COOKIE["user_login_id"])) {
    $id = $_COOKIE["user_login_id"];
    global $wpdb;
    $result = $wpdb->get_results("SELECT * FROM wp_todos WHERE user_id = $id ORDER BY date_time DESC");


    $todolist = [];
    $datelist = [];
    foreach ($result as $todo) {
        // print_r($todo);
        // $data = json_encode((array)$todo);
        array_push($todolist, $todo);
        // echo $data;
        array_push($datelist, date("d-m-Y", strtotime($todo->date_time)));
    };

    $dates = array_unique($datelist);
}

// print_r($todolist);
// print_r($dates);
?>
<?php if (empty($result)) { ?>
    <div class="todoList text-center">
        <img class=" my-4" src="<?php echo get_template_directory_uri(); ?>../images/to-do-7214069__340.webp" alt="" />
        <h2>Add your first todo</h2>
        <p>What do you want to get done today?</p>
    </div>
    <?php } else {
    if (count($todolist) <= 0) { ?>
        <div class="todoList text-center ">
            <img class="my-4" src="<?php echo get_template_directory_uri(); ?>../images/to-do-7214069__340.webp" alt="" />
            <h2>Add your first todo</h2>
            <p>What do you want to get done today?</p>
        </div>
<?php }
} ?>
<?php if (!empty($dates)) {
    foreach ($dates as $date) {
?>
        <div class="date">
            <h6 class="pl-3 text-primary"><?php echo $date; ?></h6>
            <?php foreach ($todolist as $todos) {
                // print_r($todos);
                // echo date("d-m-Y", strtotime($todos->date_time));
                if (date("d-m-Y", strtotime($todos->date_time)) == $date) { ?>
                    <div id="todo" class="todo-item border border-1 mb-2 px-3 rounded">
                        <button class="delete d-block float-right border rounded mt-1 " id_todo="<?php echo $todos->id; ?>">x</button>
                        <?php if ($todos->checked) { ?>
                            <input type="checkbox" class="check-box" id="<?php echo $todos->id; ?>" checked />
                            <h6 class="h6 text-muted <?php echo $todos->id; ?> "><?php echo $todos->title; ?></h6>
                        <?php } else { ?>
                            <input type="checkbox" class="check-box" id="<?php echo $todos->id; ?>" />
                            <h6 class="<?php echo $todos->id; ?>"><?php echo $todos->title; ?></h6>
                        <?php } ?>
                        <small>created: <?php echo $todos->date_time; ?> </small>
                    </div>
            <?php }
            } ?>
        </div>
<?php }
} ?>
<script>
    // update checked
    jQuery(document).ready(function($) {
        // $(".check-box").each(function() {
        //     $(this).click(function() {
        //         const id = $(this).attr('id');
        //         console.log(id);
        //     });
        // })
        $(".check-box").click(function(event) {
            // alert('hi')
            const id = $(this).attr("id")
            var ids = `id=${id}`;
            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>'

            var formdata = new FormData;
            formdata.append('action', 'checkbox');
            formdata.append('checkbox', ids);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function(res) {
                    // console.log(res.data);
                    if (res.data[0]) {
                        if (res.data[1]) {
                            // console.log("bb");
                            $(`.${id}`).css("text-decoration", "line-through");
                            $(`.${id}`).addClass("text-muted");
                        } else {
                            $(`.${id}`).css("text-decoration", "none");
                            $(`.${id}`).removeClass("text-muted");

                            // console.log("aa");
                        }
                    }
                    // location.reload();
                },

                error: function(err) {

                }
            })


        })

        $(".delete").click(function(event) {
            const id = $(this).attr("id_todo")
            var ids = `id=${id}`;
            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>'

            var formdata = new FormData;
            formdata.append('action', 'delete');
            formdata.append('delete', ids);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function(res) {
                    // console.log(res.data);

                    location.reload();

                },

                error: function(err) {

                }
            })
        })
    })
</script>