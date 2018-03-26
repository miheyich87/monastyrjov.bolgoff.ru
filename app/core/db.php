<?php

class Db
{
	function connect()
	{
		include __DIR__.'/../config/db.php';
		
		$link = mysql_connect($db_host, $db_user, $db_password)
			or die('Не удалось соединиться: ' . mysql_error());
				
			mysql_select_db($db_name) or die('Не удалось выбрать базу данных');
			
			mysql_query("SET NAMES utf8");
		
		return $link;
	}
	
	function close($link)
	{
		mysql_close($link);
	}
	
	public static function query($query)
	{
		$conn = Db::connect();
		
		$result = mysql_query($query);
		
		if ($result === FALSE)
			$result = mysql_error();
		else
			if ((mb_strpos(mb_strtolower(trim($query)), 'insert') == 0) && 
				(mb_strpos(mb_strtolower(trim($query)), 'insert') !== FALSE)) 
					$result = mysql_insert_id();
		
		Db::close($conn);
		
		return $result;
	}
	
}

?>