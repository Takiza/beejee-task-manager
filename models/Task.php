<?php

require_once ROOT."/components/TDBConnection.php";

class Task
{
	use TDBConnection;


	public static function addTask($user, $email, $task, $edited, $completed)
	{
		self::connect();

		$insert = "INSERT INTO tasks_table (user, email, task, edited, completed) 
		VALUES ('$user', '$email', '$task', '$edited', '$completed')";

        self::$conn->query($insert);
	}


	public static function editTask($id, $task, $completed)
	{
		self::connect();

		$update = "UPDATE tasks_table SET task ='$task', edited = '1', completed = '$completed' 
		WHERE id = $id";

        self::$conn->query($update);
	}


	public static function getTask($id)
	{
		self::connect();

		$select = "SELECT * FROM tasks_table WHERE id = '$id'";

		$result = self::$conn->query($select);

		$row = $result->fetch_assoc();

		return $row['task'];
	}


	public static function getTasksList($page, $tasksOnPage, $orderBy = "id", $sortOrder = "ASC")
	{

		self::connect();

		$firstTask = ($page - 1) * $tasksOnPage; // 3 tasks on page
	    $select = "SELECT * FROM tasks_table ORDER BY $orderBy $sortOrder LIMIT $firstTask, $tasksOnPage";

	    $result = self::$conn->query($select);

	    if ($result->num_rows > 0) {
	        $j = 0;
	        while ($row = $result->fetch_assoc()) {
	            $return[$j] = $row;
	            $j++;
	        }
	        return [$return, $orderBy];
	    }
	}


	public static function getTasksCount()
	{
		self::connect();

		$select = "SELECT * FROM tasks_table ORDER BY id DESC LIMIT 0, 1";

		$result = self::$conn->query($select);

		$row = $result->fetch_assoc();

		return $row['id'];
	}
}