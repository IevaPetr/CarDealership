
<?php
include("db_conn.php");
error_reporting(0);
if(!empty($_POST["proceedPayment"])) {
	$firstName = $_POST ['firstName'];
	$lastName = $_POST ['lastName'];
    $address = $_POST ['address'];
    $contactNumber = $_POST ['contactNumber'];
    $emailAddress = $_POST ['emailAddress'];
    
    $conn = mysqli_connect('localhost','root','','kursinis');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
$insertOrderSQL = "INSERT INTO `uzsakymo_info`(`vartotojo_id`, `vardas`, `adresas`, `telefonas`, `elpastas`, `statusas`,
 `uzsakymo_data`, `mokejimo_budas`)
VALUES('".$member_id."', '".$firstName." ".$lastName."', '".$address."',
 '".$contactNumber."', '".$emailAddress."', 'PENDING',
 '".date("Y-m-d H:i:s")."', 'PAYPAL')";
    mysqli_query($conn, $insertOrderSQL) or die("database error:". mysqli_error($conn));	
	$order_id = mysqli_insert_id($conn);

	
}
?>

<?php
if($order_id) {	
	if(isset($_SESSION["favorites"]) && count($_SESSION["favorites"])>0) { 
		foreach($_SESSION["favorites"] as $product){	
			$insertOrderItem = "INSERT INTO `uzsakymo_preke`(`uzsakymo_id`, `produkto_id`, `kaina`)
VALUES('".$order_id."', '".$product["id"]."',  '". $product["kaina"]."')";
			mysqli_query($conn, $insertOrderItem) or die("database error:". mysqli_error($conn));	
		}
	}
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Užsakymas</title>
</head>
<body>

	<header>
        <ul>
            <li><a href="home.php" >Pradžia</a></li>
            <li><a href="cars.php">Automobiliai</a></li>
            <li><a href="help.php">Pagalba</a></li>
            <li class="right"><a href="login1.php"><img src="acc.png" alt=""></a></li>
            <li class="right"><a href=""><img src="fav.png" alt=""></a></li>
        </ul>
    </header>

	<section class="forma">
		<h2>Užsakymo informacija</h2>	
								
		<form class="form-horizontal" method="post" enctype="multipart/form-data" action="payment.php">
			<div class="form-group">
				<div class="col-sm-6"> 
					<input type="text" class="form-control" placeholder="Vardas" name="firstName" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6"> 
					<input type="text" class="form-control" placeholder="Pavarde" name="lastName" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6"> 
					<textarea class="form-control" rows="5" placeholder="Adresas" name="address" required ></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8"> 
					<input type="number" class="form-control" min="9" placeholder="Numeris" name="contactNumber" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6"> 
					<input type="email" class="form-control" placeholder="Elpastas" name="emailAddress" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-4"> 
					<input class="btn btn-primary" type="submit" name="proceedPayment" value="Sumokėti"/>
				</div>
			</div>
		</form>					
			
	</section>
	<footer></footer>	
</body>
</html>

<style>
	input[type='submit'] {
		float: right;
		background: orange;
		padding: 10px 15px;
		color: #fff;
		border-radius: 5px;
		margin-right: 10px;
		border: none;
		width: 160px;
	}
	form {
		padding-bottom: 40px;
	}
</style>