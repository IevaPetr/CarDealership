<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/PHP/style.css">
    <title>Add products</title>
</head>
<body>

    <header>
        <ul>
            <li><a href="users.php" >Vartotojai</a></li>
            <li><a href="products.php" >Produktai</a></li>
            <li><a href="add.php" class="active">Prideti produkta</a></li>
            <li><a href="categories.php" >Kategorijos</a></li>
        </ul>
    </header>

    <section class="forma">
        
        <form action="" method="post" enctype="multipart/form-data">
            <label>Kategorijos ID</label>
            <input type="number" name="category_id" id="">
            <label>Modelis</label>
            <input type="text" name="model" id="">
            <label>Metai</label>
            <input type="number" name="year" id="">
            <label>Spalva</label>
            <input type="text" name="color" id="">
            <label>Kaina</label>
            <input type="number" name="price" id="">
            <label>Kuro tipas</label>
            <input type="text" name="fuel" id="">
            <label>Variklis</label>
            <input type="text" name="engine" id="">
            <label>Pavarų dėžė</label>
            <input type="text" name="gear_box" id="">
            <label>Foto</label>
            <input type="file" name="Pic" id="">

            <Button type="submit">Ivesti</button>
        </form>

        <?php

            error_reporting(0);
            $category_id = $_POST['category_id'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $fuel = $_POST['fuel'];
            $engine = $_POST['engine'];
            $gear_box = $_POST['gear_box'];
            $photo = $_FILES['Pic']['name'];

            $connect = mysqli_connect('localhost','root','','kursinis');
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            }
            // echo 'Sekmingai prisijungta prie duomenu bazes <br><br>';

            $sql = "INSERT INTO produktai (kategorijos_id,modelis,metai,spalva,kaina,kuro_tipas,variklis,pavaru_deze,foto) VALUES ('$category_id', '$model', '$year', '$color', '$price', '$fuel', '$engine', '$gear_box', '$photo');";
            if (mysqli_query($connect, $sql)) {
                // echo 'Sekmingai pridetas automobilis <br>';
            }
            else {
                echo 'Error: ' . $sql . '<br>' . mysqli_error($connect);
            }

            move_uploaded_file($_FILES['Pic']['tmp_name'],'images/'.$_FILES['Pic']['name']);

            if (mime_content_type('images/'.$_FILES['Pic']['name']) != 'image/jpeg'){
                // echo 'Netinkama nuotrauka';
                // echo '<br>';
            }
            else{
                // echo '<img src="images/'.$_FILES['Pic']['name'].'" alt="" width="200">';
                // echo '<br>';
            }
            
            mysqli_close($connect);
        ?>

    </section>

    <footer>
        <a href="logout.php" class="signout">ATSIJUNGTI</a>  
    </footer>
    
</body>
</html>

<style>
    section{
        height: 110vh;
    }
</style>