<?php

require_once ROOT . '/models/Task.php';

class TaskController
{

	public function actionIndex($page, $orderBy = 'id')
	{
		$tasksOnPage = 3; // количество тасков на странице
		$tasksList = array();

		if (isset($_POST['orderBy'])) {
			$_SESSION['orderBy'] = $_POST['orderBy'];
			if ($_SESSION['sortOrder'] == 'ASC'){
				$_SESSION['sortOrder'] = 'DESC';
			}
			else {
				$_SESSION['sortOrder'] = 'ASC';
			}
		}

		$orderBy = $_SESSION['orderBy'];
		$sortOrder = $_SESSION['sortOrder'];

		$tasksReturn = Task::getTasksList($page, $tasksOnPage, $orderBy, $sortOrder);

		$tasksList = $tasksReturn[0];
		$orderBy = $tasksReturn[1];
		
		$tasksCount = Task::getTasksCount();

		require_once ROOT . '/views/welcome.php';
	}

	public function actionNew()
	{
		require_once ROOT . '/views/new.php';
	}

	public function actionAdd()
	{
		
		//var_dump($request);
		if (isset($_POST['User'])){
			$user = htmlspecialchars($_POST['User']);
			$email = htmlspecialchars($_POST['Email']);
			$task = htmlspecialchars($_POST['Task']);

			Task::addTask($user, $email, $task, false, false); // при создании таска он не будет ни выполнен, ни отредактирован
		}
		else {
			self::actionNotFound();
		}
		require_once ROOT . '/views/add.php';
	}

	public function actionEdit($id)
	{
		if ($_SESSION['name'] == 'admin') {
			$task = Task::getTask($id);
			require_once ROOT . '/views/edit.php';
		}
		else {
			self::actionNotFound();
		}
	}

	public function actionUpdate($id)
	{
		if ($_SESSION['name'] == 'admin') {
			if (($_POST['task'] != $task = Task::getTask($id)['task']) || 
				(($completed = isset($_POST['bar'])) != Task::getTask($id)['completed'])) // дело было к вечеру, и я задолбался
			{

				Task::editTask($id, $_POST['task'], $completed);

				require_once ROOT . '/views/updated.php';

			}

			else {
				self::actionNotFound();
			}
		}

		else {
			require_once ROOT . '/views/auth/login.php';
		}		
	}

	public static function actionNotFound()
	{
		require_once ROOT . '/views/404.php';
	}
}