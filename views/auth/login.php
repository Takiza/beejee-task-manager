<?php include ROOT . '/views/app.php'; ?>

<form class="form-inline my-2" action="/auth/logged" method="POST">
  <div class="form-group mx-sm-3 my-2">
    <label for="login" class="sr-only">User</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Login">
  </div>
  <div class="form-group mx-sm-3 my-2">
    <label for="password" class="sr-only">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-dark mx-sm-3 my-2">Sign In</button>
</form>

<form class="form-inline my-2" action="/task" method="POST">
  <button type="submit" class="btn btn-dark mx-sm-3 my-2">Tasks List</button>
</form>