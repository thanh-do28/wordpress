<?php


global $wpdb;
$result = $wpdb->get_results('SELECT * FROM wp_todos WHERE user_id = 15 ORDER BY date_time DESC');


$todolist = [];
$datelist = [];
foreach ($result as $todo) {
    $data = json_encode((array)$todo);
    array_push($todolist, $data);
    // echo $data;
    array_push($datelist, date("Y-m-d", strtotime($todo->date_time)));
};

$dates = array_unique($datelist);
// print_r($todolist);
// print_r($dates);
?>
<?php if (empty($result)) { ?>
    <div class="todoList">
        <img src="<?php echo get_template_directory_uri(); ?>../images/to-do-7214069__340.webp" alt="" />
        <h2>Add your first todo</h2>
        <p>What do you want to get done today?</p>
    </div>
    <?php } else {
    if (strlen($data) <= 0) { ?>
        <div class="todoList">
            <img src="<?php echo get_template_directory_uri(); ?>../images/to-do-7214069__340.webp" alt="" />
            <h2>Add your first todo</h2>
            <p>What do you want to get done today?</p>
        </div>
<?php }
} ?>

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