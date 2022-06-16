<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=otel",'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));

}

catch (PDOExpception $e) {

	echo $e->getMessage();
}

 ?>