<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['elpastas']) && isset($_POST['vardas']) && isset($_POST['zinute'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['vardas']);

	$email = validate($_POST['elpastas']);
	$content = validate($_POST['zinute']);

	$user_data = 'vardas='. $name. '&elpastas='. $email. '&zinute='. $content;


	if (empty($name)) {
		header("Location: help.php?error=Vardas yra privalomas&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: help.php?error=El. paštas yra privalomas&$user_data");
	    exit();
	}

	else if(empty($content)){
        header("Location: help.php?error=Žinutė yra privaloma&$user_data");
	    exit();
	}


	else{


	    $sql = "SELECT * FROM pagalba WHERE vardas='$name' ";
		$result = mysqli_query($conn, $sql);

       
           $sql2 = "INSERT INTO pagalba(vardas,elpastas, zinute) VALUES('$name','$email','$content')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: help.php?success=Jūsų žinutė išsiųsta");
	         exit();
           }else {
	           	header("Location: help.php?error=unknown error occurred&$user_data");
		        exit();
           }
		
	}
	
}else{
	header("Location: help.php");
	exit();
}