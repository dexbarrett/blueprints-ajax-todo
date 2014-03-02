function task_done(id){

        $.get("/done/"+id, function(data) {

            if(data=="OK"){

                $("#"+id).toggleClass("done");
            }
  
        });

}

    function delete_task(id){

        $.get("/delete/"+id, function(data) {

            if(data=="OK"){
                var target = $("#"+id);

                target.hide('fast', function(){ target.remove(); });

            }
  
    });
    }


    function show_form(form_id){
        
        $("form").hide();
        $('#task_title').val('');    
        $('#'+form_id).show("slow");

    }
    function edit_task(id,title){

        $("#edit_task_id").val(id);

        $("#edit_task_title").val(title);

        show_form('edit_task');


    }


    $('#add_task').submit(function(event) {
    
    /* stop form from submitting normally */
    event.preventDefault();
    
    var title = $('#task_title').val();
    if(title){

        //ajax post the form

        $.post("/add", {title: title}).done(function(data) {
          
          $('#add_task').hide("slow");
          $("#task_list").append(data);
          

        });

    }
    else{

        alert("Please give a title to task");
    }
    });

    $('#edit_task').submit(function(event) {
    
    /* stop form from submitting normally */
    event.preventDefault();

  
    var task_id = $('#edit_task_id').val();
    var title = $('#edit_task_title').val();

    var current_title = $("#span_"+task_id).text();

    var new_title = current_title.replace(current_title, title);

    if(title){

        //ajax post the form

        $.post("/update/"+task_id, {title: title}).done(function(data) {
          
          $('#edit_task').hide("slow");
          $("#span_"+task_id).text(new_title);
          

        });

    }
    else{

        alert("Please give a title to task");
    }
    });

    $('#task_list').on('click', '.toggle', function(e){
        e.preventDefault();
        var todoId = $(this).closest('li').attr('id');
        task_done(todoId);
    });

    $('#task_list').on('click', '.icon-edit', function(e){
        e.preventDefault();
        var todoId = $(this).closest('li').attr('id');
        var todoTitle = $(this).siblings('span').text();
        edit_task(todoId, todoTitle);
    });

    $('#task_list').on('click', '.icon-delete', function(e){
        e.preventDefault();
        var todoId = $(this).closest('li').attr('id');
        if (confirm('Are you sure you want to delete this task?')) { delete_task(todoId); }
    });

    $('#add_button').on('click', function(e){
        e.preventDefault();
        show_form('add_task');
    });
