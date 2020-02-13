<?
	
		$link = mysql_connect('localhost', 'root', 'ckldbpass'); //changet the configuration in required

			if (!$link) {
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db('ckl_itservices') or die('cant select database');
			//mysql_query("SET NAMES TIS620");
			mysql_query('SET names=utf8');  
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_connection=utf8');   
			mysql_query('SET character_set_results=utf8');   
			mysql_query('SET collation_connection=utf8_general_ci');

			
?>