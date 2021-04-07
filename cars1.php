<?php
    error_reporting(0);
    include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="cars.css">
    <title>Catalogue</title>
</head>
<body>

    <header>
        <ul>
            <li><a href="home.php" >Pradžia</a></li>
            <li><a href="cars.php"class="active">Automobiliai</a></li>
            <li><a href="help.php">Pagalba</a></li>
            <li class="right"><a href="login1.php"><img src="acc.png" alt=""></a></li>
            <li class="right"><a href=""><img src="fav.png" alt=""></a></li>
            <!-- <li class="right"><input type="submit" name="search" value="GO"></li>
            <li class="right"><input type="text" name="value" placeholder="Ieškoti"></li> -->
        </ul>
    </header>

    <section>

        <?php
            $sql = "SELECT * FROM produktai";
            $result = mysqli_query($conn, $sql);
        ?>

        <!-- <div class="sort">
            <p>Cia turetu buti kategorijos</p>
        </div> -->
        
        <div class="container">
            <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="card-container">
                <div class="card">
                    <div class="cover">
                        <img src="admin/images/<?php echo $row['foto'] ?>">
                    </div>
                    <div class="content">
                        <div class="main">
                            <h3 class="name"><?php echo $row['modelis']?></h3><br> 

                            <label class="title">Metai</label>
                            <span class="value"><?php echo $row['metai']?></span>

                            <label class="title">Kuro tipas</label>
                            <span class="value"><?php echo $row['kuro_tipas'] ?></span>

                            <label class="title">Variklis</label>
                            <span class="value"><?php echo $row['variklis']?></span>

                            <label class="title">Pavarų dėžė</label>
                            <span class="value"><?php echo $row['pavaru_deze']?></span>

                            <button>Pridėti į mėgstamus</button>
                            <button>Pirkti</button>
                        </div>
                        <div class="price">
                            &euro;<?php echo $row['kaina'] ?><br>
                        </div> 
                    </div>
                </div> 
            </div>
            <?php } ?>
        </div>

    </section>

    <footer>
    
    </footer>
    
</body>
</html>

<style>
   
    .container {
        justify-content: center;
        max-width: 1200px;
    }

    section {
        overflow: auto;
        justify-content: center;
    }

    button {
        float: left;
        padding: 7px 15px;
        margin-left: 20px;
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
</style>