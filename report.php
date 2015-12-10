<?php
 //connect to the database
  //create an instance of mysqli
	$connectToDb = new mysqli('localhost','okoa_user','secret','okoa');
	//check if the connection is valid if not retun mysqli error report
	if(!$connectToDb) {
		die('database connection failed'. mysqli_error($connectToDb));
	}
	//input array note should be generated using the post method
	$userData  = array(
		'full_name' => $_POST['user_name'],
	    'serial_number' => md5($_POST['user_serial']),
	    'category'=>$_POST['user_category']
     );

	$table = 'search';
	function insert($userData, $table, $connectToDb) {
        //sanitize the data
        //hash the password
         $serial_number= md5($userData['user_serial']);
         echo $serial_number;
		//generate the fields
		$fields = '`'.implode('`,`', array_keys($userData)).'`';
		//the  data
		$data = '\''.implode('\',\'', $userData).'\'';
		echo $fields.'<br>'.'<br>';
		echo $data .'<br>'.'<br>';
		//prepare the query
		$query = "INSERT  INTO `$table` ($fields) VALUES ($data) ";
		echo $query .'<br>'.'<br>';
    }








?>