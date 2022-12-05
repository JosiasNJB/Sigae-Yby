<?php
	require_once '../utils/dadosconexao.php';
	
	class Database{
		private static $conn;
		
		public static function getInstance(){
			if (!isset(self::$conn)){
				try{
					self::$conn = new PDO(dsn);
					self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				}catch(PDOException $e){
					echo $e->getMessage();
				}
				
			}
			return self::$conn;
		}
		
		public static function prepare($sql){
			return self::getInstance()->prepare($sql);
		}
		
	}
?>