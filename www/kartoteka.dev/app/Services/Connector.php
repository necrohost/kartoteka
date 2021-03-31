<?php
namespace App\Services;
use PDO;

class Connector
{
	private $pdo = null;

	public function __construct()
	{

	}

	public function connect()
	{
		try{
			//decode settings from JSON file
			$settings = json_decode(file_get_contents("app/config/settings.json"), true);

			//set attributes
			$opt = [
        		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        		PDO::ATTR_EMULATE_PREPARES   => false,
    			];

    		$host = $settings['host'];
    		$dbname = $settings['dbname'];
    		$charset = $settings['charset'];
    		$user = $settings['user'];
    		$pass = $settings['pass'];

			//create connect to PDO
			$this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass, $opt);

			return $this->pdo;
		}
		catch(PDOException $e){
			file_put_contents('App/config/PDOErrors.txt', $e->getMessage(), FILE_APPEND);
            return NULL;
		}
	}


}