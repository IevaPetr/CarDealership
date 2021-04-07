<?php

session_start();

if(isset($_SESSION['id']) && isset($_SESSION['v_vardas']))
{
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
      <li><a href="products.php" >Produktai</a></li>
      <li><a href="add.php" >Prideti produkta</a></li>
      <li><a href="categories.php" class="active">Kategorijos</a></li>
    </ul>
  </header>

  <section class="forma">


<?php
$sql="SELECT * FROM `kategorijos`";
error_reporting(0);
$query = mysqli_query($conn,$sql);
?>
      <div class="container">
        <div class="display-chat">
        
          <h2>Esamos kategorijos</h2>
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
              echo $row['gamintojas'];


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
              Nera jokiu kategoriju.
              
            </p>
          </div>

          <?php
            } 
          ?>
          <?php 
if($_POST['submit']){
    $cat = $_POST['cat'];
    
    $sql= "SELECT * FROM kategorijos WHERE gamintojas='$cat' ";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
			header("Location: categories.php?error=Kategorija jau egzistuoja");
	        exit();
    }
    else
    {

      if(empty($cat) || $cat == " ")
        {

          header("Location: categories.php?error=Įrašykite kategoriją");
          exit();

        } 
      else
        {


          $insert_cat = "INSERT INTO `kategorijos`(`gamintojas`) VALUES ('".$cat."')";
          $query = mysqli_query($conn,$insert_cat);


      	if($query)
        	{
           header("Location: categories.php?success=Kategorija prideta");
           exit();
        	}
      	else
        	{
	        	echo "Something went wrong";
        	}

    
        }
      }
}
else if($_POST['submit1'])
{
    $id = $_POST['id']; 
    if(empty($id) || $id == " ")
      {

        header("Location: categories.php?error=Įrašykite kategorijos id");
        exit();

      }
    else
      {
        $delete_cat = "DELETE FROM kategorijos WHERE id =$id";
        $query = mysqli_query($conn,$delete_cat);
	        if($query)
	          {
              header("Location: categories.php?success=Kategorija istrinta");
              exit();
	          }
	        else
	          {
		          echo "Kažkas nutiko";
            }
      }
}

else

echo
   "
    <form  action='categories.php' method='POST'>
    <h2>Kategorijos pridėjimas</h2>
    <label>Kategorijos pavadinimas </label> <br>
    <input type='text' name='cat'><br>

    <input type='submit' name='submit' value='Pridėti kategoriją'> <br><br>

    </form>

    <br>

    <form  action='categories.php' method='POST'>
    <h2>Kategorijos ištrinimas</h2>
    <label>Kategorijos id </label> <br>
    <input type='text' name='id'><br>

    <input type='submit' name='submit1' value='Ištrinti kategoriją'> <br><br>

    </form>
    ";
}
{ 
if (isset($_GET['error'])) 
{ 
  echo $_GET['error'];
}
if (isset($_GET['success'])) 
{ 
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
    height: 100%;
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