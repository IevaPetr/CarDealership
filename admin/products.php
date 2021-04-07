<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['v_vardas'])){
include("db_conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHP/style.css">
    <title>Kategorijos</title>
</head>
<body>
<header>
        <ul>
            <li><a href="users.php" >Vartotojai</a></li>
            <li><a href="products.php" class="active">Produktai</a></li>
            <li><a href="add.php" >Prideti produkta</a></li>
            <li><a href="categories.php" >Kategorijos</a></li>
        </ul>
    </header>

<section class="forma">


<?php
$sql="SELECT * FROM `produktai`";
error_reporting(0);
$query = mysqli_query($conn,$sql);
?>
      <div class="container">
        <div class="display-chat">
        
          <h2>Esami produktai</h2>
          <?php
        //  $sqlimage  = "SELECT foto FROM produktai where `id` = $id";;
        //  $imageresult1 = mysqli_query($conn, $sqlimage);
            if(mysqli_num_rows($query)>0)
            {
            while($row= mysqli_fetch_assoc($query))	
            {
          ?>

          <div class="products">
            <p>
                
              <?php
              echo $row['id'].' ';
              echo $row['kategorijos_id'].' ';
              echo $row['modelis'].' ';
              echo $row['metai'].' ';
              echo $row['spalva'].' ';
              echo $row['kaina'].' ';
              echo $row['kuro_tipas'].' ';
              echo $row['variklis'].' ';
              echo $row['pavaru_deze'].' ';
             
               ?>
               
            </p>
           
          </div>
            
          <?php
              }
            }
            else
            {
          ?>

          <div class="products">
            <p>
              Nera jokiu produktu.
              
            </p>
          </div>

          <?php
            } 
          ?>
          <?php 
if($_POST['submit1']){
    $id = $_POST['id']; 
    

    $delete_pro = "DELETE FROM produktai WHERE id =$id";
    $query = mysqli_query($conn,$delete_pro);
	if($query)
	{
        header("Location: products.php?success=Produktas ištrintas");
        exit();
	}
	else
	{
		header("Location: products.php?error=Prašome įvesti produkto id");
        exit();
	}

    
    
}

else

echo
   "

    <form  action='products.php' method='POST'>
    <h2>Produkto ištrynimas</h2>
    <label>Produkto id </label> <br>
    <input type='text' name='id'><br><br>

    <input type='submit' name='submit1' value='Ištrinti produktą'> <br><br>

    </form>
    ";
}
{
if (isset($_GET['error'])) 
{ 
    echo $_GET['error'];
}
if (isset($_GET['success'])) { 
    echo $_GET['success'];
 }
}
?>
        </div>
      </div>

</section>

<footer><a href="logout.php" class="signout">ATSIJUNGTI</a></footer>

    
</body>
</html>

<style>
  section {
    height: 88%;
    overflow: auto;
    display: block;
  }

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
  
  p {
    background: rgba(255, 255, 255, 0.2);
    padding: 10px;
    border-radius: 15px;
    color: white;
    width: 500px;
  }

  form {
    padding-bottom: 40px;
  }

</style>