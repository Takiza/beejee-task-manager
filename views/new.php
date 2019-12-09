<?php include 'app.php'; ?>

<form class="form-inline my-2" action="/task/add" method="POST">
  <div class="form-group mx-sm-3 my-2">
    <label for="User" class="sr-only">User</label>
    <input type="text" class="form-control" name="User" placeholder="Name" required="required">
  </div>
  <div class="form-group mx-sm-3 my-2">
    <label for="Email" class="sr-only">Email</label>
    <input type="email" class="form-control" name="Email" placeholder="Email" required="required">
  </div>
  <div class="form-group mx-sm-3 my-2">
    <label for="Task" class="sr-only">Task</label>
    <input type="text" class="form-control" name="Task" placeholder="Task" required="required">
  </div>
  <button type="submit" class="btn btn-dark mx-sm-3 my-2">Add Task</button>
</form>

<form class="form-inline my-2" action="/task" method="POST">
  <button type="submit" class="btn btn-dark mx-sm-3 my-2">Tasks List</button>
</form>