<html>
<head>
	<title>To-do List Application</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>
<body>
  <div class="container">
    <section id="data_section" class="todo">
      <ul class="todo-controls">
        <li><a id="add_button" href="#"><img src="/assets/img/add.png" width="14px" /></a></li>
      </ul>
      <ul id="task_list" class="todo-list">
      	@foreach($todos as $todo)
	        	@include('ajaxData')
        @endforeach
      </ul>
    </section>
    <section id="form_section">
	
	<form id="add_task" class="todo" style="display:none">
      	<input id="task_title" type="text" name="title" placeholder="Enter a task name" value=""/>
      	<button name="submit">Add Task</button>
    </form>

	<form id="edit_task" class="todo" style="display:none">
		<input id="edit_task_id" type="hidden" value="" />
      	<input id="edit_task_title" type="text" name="title" value="" />
      	<button name="submit">Edit Task</button>
    </form>

    </section>
    
  </div>
  <script src="assets/js/jquery-2.1.0.min.js" type="text/javascript"></script>
 <script src="assets/js/todo.js" type="text/javascript"></script>
</body>
</html>