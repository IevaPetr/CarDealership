<?php
    session_start();
    error_reporting(0);
    $conn= mysqli_connect("localhost", "root", "", "kursinis");
    if(isset($_POST["add_to_fav"]))
    {
        if($_SESSION["favorites"])
        {
            $item_array_id = array_column($_SESSION["favorites"], "item_id");
            if(!in_array($_GET["id"], $item_array_id))
            {
                $count = count($_SESSION["favorites"]);
                $item_array = array(
                    'item_id'       => $_GET["id"],
                    'item_name'     => $_POST["hidden_model"],
                    'item_price'    => $_POST["hidden_price"]
                );
                $_SESSION["favorites"][$count] = $item_array;
            }
            else
            {
                echo '<script>alert("Jau prideta")</script>';
            
            }
        }
        else
        {
            $item_array = array(
                'item_id'        => $_GET["id"],
                'item_name'      => $_POST["hidden_model"],
                'item_price'     => $_POST["hidden_price"]
            );
            $_SESSION["favorites"][0] = $item_array;
        }
    }
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["favorites"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["favorites"][$keys]);
                    echo '<script>alert("Preke panaikinta")</script>';
                    echo '<script>window.location="cars.php"</script>';
                    
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cars.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Catalogue</title>
</head>

<body>

    <header>
        <ul>
            <li><a href="home.php" >Pradžia</a></li>
            <li><a href="cars.php"class="active">Automobiliai</a></li>
            <li><a href="help.php">Pagalba</a></li>
            <li class="right"><a href="login1.php"><img src="acc.png" alt=""></a></li>
        </ul>
    </header>

    <section>
        
        <?php
            $sql = "SELECT * FROM produktai ORDER BY id ASC";
            $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0)
        {

        ?>

        <div class="container">
            <?php
            
                while ($row = $result->fetch_assoc()) { ?>
            <div class="card-container">
                <div class="card">
                    <div class="cover">
                        <img src="admin/images/<?php echo $row['foto'] ?>">
                    </div>

                    <div class="content">
                        <form method="post" class="auto" action="cars.php?action=add&id=<?php echo $row["id"];?>">
                            <h3 class="name"><?php echo $row['modelis'] ?></h3><br>

                            <label class="title">Metai</label>
                            <span class="value"><?php echo stripcslashes($row['metai']) ?></span>

                            <label class="title">Kuro tipas</label>
                            <span class="value"><?php echo stripcslashes($row['kuro_tipas']) ?></span>

                            <label class="title">Variklis</label>
                            <span class="value"><?php echo stripcslashes($row['variklis']) ?></span>

                            <label class="title">Pavarų dėžė</label>
                            <span class="value"><?php echo stripcslashes($row['pavaru_deze']) ?></span>

                            <div class="price">
                                &euro;<?php echo $row['kaina'] ?><br>
                            </div> 
                                
                            <input type="hidden" name="hidden_model" value="<?php echo $row['modelis'];?>">             
                            <input type="hidden" name="hidden_price" value="<?php echo $row['kaina'];?>">  
                            <button type="submit" name="add_to_fav" >Pridėti į krepšelį</button>
                        </form>
                    </div>

                </div> 
            </div>
            <?php 
                }
           } 
?>
        </div>
        <div style="clear:both"></div>
        <table class="table table-bordered">
                    <tr>
                    <th colspan="4"><p>Krepšelis</p></th>
                    </tr>
					<tr>
						<th width="40%">Modelis</th>
						<th width="20%"><pre>Kaina   </pre></th>
						<th width="15%">Suma</th>
						<th width="5%"><pre>Veiksmas   </pre></th>
                    </tr>
                    <?php 
                    if(!empty($_SESSION["favorites"]))
                    {
                        $total= 0;
                        foreach($_SESSION["favorites"] as $keys => $values)
                        {

                        
                    
                    ?>
                    <tr>
                        <td><?php echo $values["item_name"];?></td>
                        <td>€ <?php echo $values["item_price"];?></td>
                        <td><a href="cars.php?action=delete&id=<?php echo $values["item_id"]; ?>"> <span class="text-danger">Istrinti</span> </a></td>
                        <td><a href="buy.php?action=buy&id=<?php echo $values["item_id"]; ?>"> <span class="text-danger">Pirkti</span> </a></td>
                        

                    </tr>
                    <?php 
                    $total = $total + $values["item_price"];

                    }

                    ?>
                    <tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">€ <?php echo number_format($total, 2); ?></td>
					</tr>
					<?php
					}
					?>
        </table>
    </section>

    <footer>
        <a href="logout.php" class="signout">ATSIJUNGTI</a>
    </footer>
    
</body>
</html>

<style>
    * {
        color: white;
    }
   
    .container {
        justify-content: center;
        max-width: 1200px;
    }

    section {
        overflow: auto;
        justify-content: center;
    }

    button {
        float: right;
        padding: 7px 15px;
        margin-right: 0px;
    }

    .sort {
        height: 100%;
        width: 350px;
        background: rgba(255, 255, 255, 0.2);
        margin-right: 10px;
        margin-top: 10px;
        border-radius: 15px;
        padding: 20px;
    }

    .cover {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cover img {
       width: auto;
       height: 100%;
    }

    input {
        margin: 4px;
        height: 20px;
    }

    p {
        color: white;
    }

    table {
        background: rgba(255, 255, 255, 0.2);
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: solid 2px rgba(0, 0, 0, 0.5);
        font-size: 12px;
        padding: 5px;
    }

    th p {
        color: orange;
    }

</style>