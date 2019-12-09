<?php include ROOT . '/views/app.php'; ?>

<div class="container">
	<?php

	if ($_SESSION['name'] == 'admin') {
		echo '<h3>Administer, my lord!</h3>';
	}
	else {
		echo 
		'<h3>Get out stranger! >.<</h3>
		<form class="form-inline my-2" action="/login" method="POST">
  			<button type="submit" class="btn btn-dark mx-sm-3 my-2">Try Again</button>
		</form>';
	}
	?>

	<form class="form-inline my-2" action="/task" method="POST">
	  <button type="submit" class="btn btn-dark mx-sm-3 my-2">Tasks List</button>
	</form>
</div>