<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['v_vardas']) && isset($_POST['slaptazodis'])) {

	function validate($data){
      $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$v_vardas = validate($_POST['v_vardas']);
	$slaptazodis = validate($_POST['slaptazodis']);

	if (empty($v_vardas)) {
		header("Location: ./login.php?error=Prašome įvesti administratoriaus vardą");
	    exit();
	}else if(empty($slaptazodis)){
        header("Location: ./login.php?error=Prašome įvesti slaptažodį");
	    exit();
	}else{
		
       

        
		$sql = "SELECT * FROM admin WHERE v_vardas='$v_vardas' AND slaptazodis='$slaptazodis'";
	
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['v_vardas'] === $v_vardas && $row['slaptazodis'] === $slaptazodis) {
                $_SESSION['v_vardas'] = $row['v_vardas'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ./categories.php");
		        exit();
            }else{
				header("Location: ./login.php?error=Neteisingas varotojo vardas arba slaptažodis");
		        exit();
			}
		}else{
			header("Location: ./login.php?error=Neteisingas varotojo vardas arba slaptažodis");
	        exit();
		}
	}
	
}else{
	header("Location: ./login.php");
	exit();
}