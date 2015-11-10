<?php 
class ModelBase {
	private static $connectInfo;
	protected $db;
	protected $name;
	public function __construct(){
		$this->initDB();
	}
	 public function initDb(){
		$dsn = sprintf(
			'mysql:host=%s;dbname=%s;',
			self::$connectInfo['host'],
			self::$connectInfo['dbname']
        );
        try {
			$this->db = new PDO($dsn, self::$connectInfo['dbuser'], self::$connectInfo['password']);		
		} catch (PDOException $e) {
			exit('error' . $e->getMessage());
		}
    }
	public static function setConnectInfo($connectInfo){
		self::$connectInfo = $connectInfo;
	}
}