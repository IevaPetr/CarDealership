<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagalba</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <header >
        <ul>
            <li><a href="home.php" >Pradžia</a></li>
            <li><a href="cars.php">Automobiliai</a></li>
            <li><a href="help.php" class="active">Pagalba</a></li>
            <li class="right"><a href="login1.php"><img src="acc.png" alt=""></a></li>
        </ul>
    </header>

    <section class="forma">
        <form action="help-check.php" method="post">
            <h2>Pagalba</h2>

            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>Elektroninis paštas</label>
            <?php if (isset($_GET['elpastas'])) { ?>
                <input type="text" 
                        name="elpastas" 
                        placeholder="El. paštas"
                        value="<?php echo $_GET['elpastas']; ?>"><br>
            <?php }else{ ?>
                <input type="text" 
                        name="elpastas" 
                        placeholder="El. paštas"><br>
            <?php }?>

            <label>Vartotojo vardas</label>
            <?php if (isset($_GET['vardas'])) { ?>
                <input type="text" 
                        name="vardas" 
                        placeholder="Vardas"
                        value="<?php echo $_GET['=vardas']; ?>"><br>
            <?php }else{ ?>
                <input type="text" 
                        name="vardas" 
                        placeholder="Vardas"><br>
            <?php }?>

            <label>Jūsų žinutė</label>
            <textarea name="zinute" id="content" placeholder="Jūsų žinutės tekstas"
            class="input-field" cols="60" rows="5"></textarea>

            <button type="submit">Siųsti</button>
        </form>
    </section>
    
    <footer>
        <a href="logout.php" class="signout">ATSIJUNGTI</a>
    </footer>

</body>
</html>


