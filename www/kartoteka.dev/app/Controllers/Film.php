<?php
namespace App\Controllers;

class Film
{
	private $pdo;
	private $DB;

	public function __construct()
	{
		$this->pdo = ( new \App\Services\Connector )->connect();
		$this->DB = new \App\Services\Shell($this->pdo); 
	}
	

	public function add()
	{
		if(isset($_POST['title'])){
			require_once 'app/Services/ImageFile.php';
			// <-- ВАЛИДАЦИЮ СЮДА -->
			$name = $_POST['title'];
			$year = $_POST['year'];
			$genre = $_POST['genre'];
			$description = $_POST['description'];
			$this->DB->newFilm($name, $year, $genre, $description, $path);
			header("Location: /list");
			
		} else {
			include "views/add.php";
		}
		
	}

	public function edit($id)
	{
		if(isset($_POST['title'])){
			require_once 'app/Services/ImageFile.php';
			$name = $_POST['title'];
			$year = $_POST['year'];
			$genre = $_POST['genre'];
			$description = $_POST['description'];
			$this->DB->editFilm($name, $year, $genre, $description, $path, $id);
			header("Location: /info?id=" . $id);
		} else {
			$row = $this->DB->getFilm($id);
			include "views/edit.php";
		}
	}

	public function info($id)
	{
		$row = $this->DB->getFilm($id);
		include "views/info.php";
	}

	public function del($id)
	{
		if(isset($id)){
			$this->DB->delFilm($id);
			header("Location: /list");
		}

	}

	public function roster()
	{
		$data = $this->DB->getList();
		include "views/list.php";
	}
}