<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['va_vardas']) && isset($_POST['v_slaptazodis'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['va_vardas']);
	$pass = validate($_POST['v_slaptazodis']);

	if(!empty($_POST["remember"])) {
		setcookie ("va_vardas",$_POST["va_vardas"],time()+ 3600);
		setcookie ("v_slaptazodis",$_POST["v_slaptazodis"],time()+ 3600);
		echo "Cookies Set Successfuly";
	} else {
		setcookie("username","");
		setcookie("password","");
		echo "Cookies Not Set";
	}

	if (empty($uname)) {
		header("Location: login1.php?error=Prašome įvesti vartotojo vardą");
	    exit();
	}else if(empty($pass)){
        header("Location: login1.php?error=Prašome įvesti slaptažodį");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM vartotojai WHERE va_vardas='$uname' AND v_slaptazodis='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['va_vardas'] === $uname && $row['v_slaptazodis'] === $pass) {
            	$_SESSION['va_vardas'] = $row['va_vardas'];
            	$_SESSION['vardas'] = $row['vardas'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: login1.php?error=Neteisingas varotojo vardas arba slaptažodis");
		        exit();
			}
		}else{
			header("Location: login1.php?error=Neteisingas varotojo vardas arba slaptažodis");
	        exit();
		}
	}
	
}else{
	header("Location: login1.php");
	exit();
}