<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

     <header >
          <ul>
               <li><a href="home.php">Pradžia</a></li>
               <li><a href="cars.php">Automobiliai</a></li>
               <li><a href="help.php">Pagalba</a></li>
               <li class="right"><a href="login1.php" class="active_img"><img src="acc.png" alt=""></a></li>
          </ul>
     </header>

     <section class="forma">
          <form action="signup-check.php" method="post">
               <h2>Registracija</h2>
               <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
               <?php } ?>

               <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
               <?php } ?>

               <label>Vardas</label>
               <?php if (isset($_GET['vardas'])) { ?>
                    <input type="text" 
                         name="vardas" 
                         placeholder="Vardas"
                         value="<?php echo $_GET['vardas']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="vardas" 
                         placeholder="Vardas"><br>
               <?php }?>

               <label>Pavardė</label>
               <?php if (isset($_GET['pavarde'])) { ?>
                    <input type="text" 
                         name="pavarde" 
                         placeholder="Pavardė"
                         value="<?php echo $_GET['pavarde']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="pavarde" 
                         placeholder="Pavardė"><br>
               <?php }?>

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
               <?php if (isset($_GET['va_vardas'])) { ?>
                    <input type="text" 
                         name="va_vardas" 
                         placeholder="Vartotojo vardas"
                         value="<?php echo $_GET['va_vardas']; ?>"><br>
               <?php }else{ ?>
                    <input type="text" 
                         name="va_vardas" 
                         placeholder="Vartotojo vardas"><br>
               <?php }?>


               <label>Slaptažodis</label>
               <input type="password" 
                    name="v_slaptazodis" 
                    placeholder="Slaptažodis"><br>

               <label>Pakartokite slaptažodį</label>
               <input type="password" 
                    name="re_password" 
                    placeholder="Pakartokite slaptažodį"><br>

               <button type="submit">Registruotis</button>
               <a href="login1.php" class="ca">Jau esate prisiregistravęs?</a>
          </form>
     </section>

     <footer></footer>
</body>
</html>

<style>
     form a {
		color: orange;
		font-size: 16px;
		padding: 10px;
     }
     
     section {
          height: 110vh;
     }
</style>