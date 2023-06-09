<form id="presently" class='d-flex flex-column' autocomplete="off">
    <label>
        <input class="input-todo w-100 p-1" type="text" placeholder="What do you need to do?" name="title"></input>
    </label>
    <button class="btn btn-primary" type="submit">Add &nbsp; <span>&#43;</span></button>
</form>



<script>
    (function($) {

        $("#presently").submit(function(event) {
            event.preventDefault();

            var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>'

            var form = $('#presently').serialize();

            var formdata = new FormData;
            formdata.append('action', 'presently');
            formdata.append('presently', form);

            $.ajax(endpoint, {
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function(res) {
                    // console.log(res.data);
                    if (res.data == 'errotitle') {
                        alert("todo cannot be left blank")
                    } else if (res.data == 'erroid') {
                        alert("you must login")
                    } else {
                        // console.log(res.data);
                        location.reload();
                    }



                },

                error: function(err) {

                }
            })
        })

    })(jQuery)
</script>