<?php
namespace App\Services;

class Shell
{
	private $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function newFilm($name, $year, $genre, $description, $poster)
	{
		$query = 'INSERT INTO `films` (`name`, `year`, `poster`, `genre`, `description`) VALUES (:name, :year, :poster, :genre, :description)';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['name' => $name,
					    'year' => $year,
					    'poster' => $poster,
					    'genre' => $genre,
					    'description' => $description,
					   ]);
	}

	public function editFilm($name, $year, $genre, $description, $poster, $id)
	{
		$query = "UPDATE `films` 
				  SET `name` = :name, 
				  	  `year` = :year, 
				  	  `poster` = :poster, 
				  	  `genre` = :genre, 
				  	  `description` = :description
				  WHERE `id` = :id";

		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['name' => $name,
					    'year' => $year,
					    'poster' => $poster,
					    'genre' => $genre,
					    'description' => $description,
					    'id' => $id,
					   ]);
	}

	public function delFilm($id)
	{
		$query = 'DELETE FROM `films` WHERE `id` = :id';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['id' => $id]);
	}

	public function getFilm($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `films` WHERE `id` = ?");
		$stmt->execute([$id]);
		$row = $stmt->fetch();
		return $row;
	}

	public function getList()
	{
		$data = $this->pdo->query("SELECT * FROM `films`")->fetchAll();
		return $data;
	}

	public function addUser($login, $pass)
	{
		$query = 'INSERT INTO `users` (`login`, `password`) VALUES (:login, :password)';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['login' => $login,
					    'password' => $pass,
					   ]);
	}

	public function entryUser($login)
	{
		$query = 'SELECT * FROM `users` WHERE `login` = :login';
		$stmt = $this->pdo->prepare($query);
		$stmt->execute(['login' => $login]);
		$row = $stmt->fetch();
		return $row;
	}
}