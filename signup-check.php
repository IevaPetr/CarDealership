<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['va_vardas']) && isset($_POST['v_slaptazodis']) && isset($_POST['elpastas']) && isset($_POST['pavarde'])
    && isset($_POST['vardas']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['va_vardas']);
	$pass = validate($_POST['v_slaptazodis']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['vardas']);

	$email = validate($_POST['elpastas']);
	$surname = validate($_POST['pavarde']);

	$user_data = 'va_vardas='. $uname. '&vardas='. $name;


	if (empty($uname)) {
		header("Location: signup.php?error=Privaloma įrašyti vartotojo vardą&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Privaloma įrašyti slaptažodį&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Privaloma įrašyti pakartotą slaptažodį&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Privaloma įrašyti vardą&$user_data");
	    exit();
	}
	
	else if(empty($email)){
        header("Location: signup.php?error=Privaloma įrašyti el. paštą&$user_data");
		exit();
	}
	
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: signup.php?error=Neteisingas el. pašto formatas&$user_data");
		exit();
	}
	
	else if(empty($surname)){
        header("Location: signup.php?error=Privaloma įrašyti pavardę&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Slaptažodžiai nesutampa&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

		$sql_uname = "SELECT * FROM vartotojai WHERE va_vardas='$uname' ";
		$result = mysqli_query($conn, $sql_uname);

		$sql_email = "SELECT * FROM vartotojai WHERE elpastas='$email' ";
		$result1 = mysqli_query($conn, $sql_email);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Vartotojo vardas yra užimtas&$user_data");
	        exit();
		}
		else if (mysqli_num_rows($result1) > 0) {
			header("Location: signup.php?error=El. paštas yra užimtas&$user_data");
	        exit();
		}else {
           $sql_insert = "INSERT INTO vartotojai(va_vardas, v_slaptazodis, vardas, pavarde, elpastas) VALUES ('$uname', '$pass', '$name', '$surname', '$email')";
           $result2 = mysqli_query($conn, $sql_insert);
           if ($result2) {
           	 header("Location: signup.php?success=Jūsų paskyra sėkmingai sukurta");
	         exit();
           }else {
	           	header("Location: signup.php?error=Kažkas nutiko&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
