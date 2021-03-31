<?php
namespace App\Controllers;

class User
{
	private $pdo;
	private $DB;

	public function __construct()
	{
		$this->pdo = ( new \App\Services\Connector )->connect();
		$this->DB = new \App\Services\Shell($this->pdo); 
	}

	public function login()
	{
		if(isset($_POST['password']) and isset($_POST['login'])){
			$login = $_POST['login'];
			$password = $_POST['password'];
			$data = $this->DB->entryUser($login);
			if(password_verify($password, $data['password'])){
				session_start();
				$_SESSION['auth'] = true;
				$_SESSION['login'] = $data['login'];
				header("Location: /list");
			} else {
				echo "not success";
			}

		} else {
			include "views/login.php";
		}
	}

	public function registration()
	{
		if($_POST['password'] === $_POST['repeatpass'] and isset($_POST['login'])){
			$login = $_POST['login'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$this->DB->addUser($login, $password);
			echo "success";
		} else {
			include "views/reg.php";
		}
	}

	public function logout()
	{
		session_start();
		unset($_SESSION['auth']);
		header("Location: /login");
	}
}