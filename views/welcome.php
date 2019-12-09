<?php include 'app.php'; ?>

<form class="form-inline my-2">
  <a type="page-link" class="btn btn-dark mx-sm-3 my-2" href="new">Add Task</a>
</form>

<?php if ($_SESSION['name'] == 'admin'): ?>
	<form class="form-inline my-2" action="logout" method="POST">
  		<button type="submit" class="btn btn-dark mx-sm-3 my-2">Logout</button>
	</form>
<?php else: ?>
	<form class="form-inline my-2" action="login" method="POST">
  		<button type="submit" class="btn btn-dark mx-sm-3 my-2">Login</button>
	</form>
<?php endif; ?>


<form action=<?php echo "/task/" . $page ?> method="POST">
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name 
      	<button type="submit" class="badge badge-dark btn" name="orderBy" value="user">sort</button>
      </th>
      <th scope="col">Email 
      	<button type="submit" class="badge badge-dark btn" name="orderBy" value="email">sort</button>
      </th>
      <th scope="col">Task</th>
      <th scope="col">Email 
      	<button type="submit" class="badge badge-dark btn" name="orderBy" value="completed">sort</button>
      </th>
    </tr>
  </thead>
  <tbody>
  	<?php if (isset($tasksList)): foreach ($tasksList as $task):?>
    <tr>
      <th scope="row"><?php echo $task['id'] ?></th>
      <td><?php echo $task['user'] ?></td>
      <td><?php echo $task['email'] ?></td>

      <td>
      	<?php 
      	if ($task['edited'] == '0') echo $task['task'];
      	else echo $task['task'].' <span class="badge badge-secondary">Edited by Admin</span>';
      	if ($_SESSION['name'] == 'admin') echo '<a class="badge badge-dark btn" href="edit/' . $task['id'] . '">EDIT</a>'?>	
      </td>

      <td>
      	<input type="checkbox" <?php if($task['completed'] == '1'):?>checked<?php endif;?> disabled>
      </td>
  	  
    </tr>
	<?php endforeach; endif;?>
    
  </tbody>
</table>
</form>

<?php if ($tasksCount > $tasksOnPage): ?>
<nav aria-label="...">
  <ul class="pagination">

  	<!-- Сорян, не успел, допишу логику чуть позже
    <li class="page-item disabled">
      <a class="page-link" href="" tabindex="-1">Previous</a>
    </li>-->

    <?php for($i = 0; $i < $tasksCount; $i += $tasksOnPage) {
    	$currentPage = $i / $tasksOnPage + 1;
    	if ($currentPage == $page) {
    		echo 
    		'<li class="page-item active">
      			<a class="page-link" href="/task/'. $currentPage .'">' . $currentPage . '<span class="sr-only">(current)</span></a>
    		</li>';
    	}
    	else {
    		echo 
    		'<li class="page-item">
      			<a class="page-link" href="/task/'. $currentPage .'">' . $currentPage . '</a>
    		</li>';
    	}
    }?>

    <!-- и эту часть тоже...
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
	-->

  </ul>
</nav>
<?php endif; ?>