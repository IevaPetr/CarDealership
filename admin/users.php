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
    <title>Vartotojai</title>
</head>
<body>
<header>
        <ul>
            <li><a href="users.php" class="active">Vartotojai</a></li>
            <li><a href="products.php" >Produktai</a></li>
            <li><a href="add.php" >Prideti produkta</a></li>
            <li><a href="categories.php" >Kategorijos</a></li>
        </ul>
    </header>

<section class="forma">


<?php
$sql="SELECT * FROM `vartotojai`";
error_reporting(0);
$query = mysqli_query($conn,$sql);
?>
      <div class="container">
        <div class="display-chat">
        
          <h2>Esami prisiregistravę vartotojai</h2>
          <?php
            if(mysqli_num_rows($query)>0)
            {
            while($row= mysqli_fetch_assoc($query))	
            {
          ?>

          <div class="categories">
            <p>
                
              <?php

              echo $row['id'].' ';
              echo $row['va_vardas'].' ';
              echo $row['vardas'].' ';

               ?>
            </p>
           
          </div>
            
          <?php
              }
            }
            else
            {
          ?>
          <div class="categories">
            <p>
              Nera registruotų vartotojų.
              
            </p>
          </div>

          <?php
            } 
          ?>
          <?php 

if($_POST['submit1']){
    $id = $_POST['id']; 
    

    $delete_user = "DELETE FROM vartotojai WHERE id =$id";
    $query = mysqli_query($conn,$delete_user);
	if($query)
	{
        header("Location: users.php?success=Vartotojas panaikintas");
        exit();
	}
	else
	{
		echo "Something went wrong";
	}

    
    
}

else

echo
   "
    <form  action='users.php' method='POST'>
    <h2>Vartotojo ištrynimas</h2>
    <label>Vartotojo id </label> <br>
    <input type='text' name='id'><br>
    <input type='submit' name='submit1' value='Ištrinti vartotoją'>
    </form>
    ";
}{ 
if (isset($_GET['success'])) { 
echo $_GET['success'];
 }}
?>
        </div>
      </div>



</section>
  <footer><a href="logout.php" class="signout">ATSIJUNGTI</a></footer>

    
</body>
</html>

<style>
  section {
    /* height: 100%; */
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
  }
  form {
    padding-bottom: 80px;
  }
</style>