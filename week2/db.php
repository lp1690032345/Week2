<?php 
/**
 * 
 */
class DB
{
	private static $pdo;
	
	private function __construct($host,$dbname,$user,$pwd)
	{
		$this->pdo = new PDO("mysql:host=$host;charset=utf8;dbname='$dbname'","$user","$pwd");
	}
	private clone()
	{

	}
	public static getinfo()
	{

	}

	public function insert()
	{
		return $this->pdo->exec();
	}
}


















 ?>