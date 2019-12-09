<?php include 'app.php'; ?>

<div class="container">
	<h3>Edit task #<?php echo $id ?></h3>
	
	<form class="my-2" action=<?php echo 'update/' . $id ?> method="POST">
		<div class="form-group">
		    <label for="Textarea">Task</label>
		    <textarea class="form-control" id="Textarea" name="task" rows="3" required="required"><?php echo $task['task'] ?></textarea>
		</div>
		<div class="form-check">
	      	<input class="form-check-input" type="checkbox" id="Check" name="bar" value="true" <?php if ($task['completed']) echo 'checked'?>>
	      	<label class="form-check-label" for="Check">
	        	Task completed
	      	</label>
    	</div>
	  	<button type="submit" class="btn btn-dark mx-sm-3 my-2">Update</button>
	  	<a class="btn btn-dark mx-sm-3 my-2" href="/task">Back</a>
	</form>
</div>