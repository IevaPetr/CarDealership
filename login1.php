<!DOCTYPE html>
<html>
<head>
	<title>Prisijungimas</title>
	<link rel="stylesheet" type="text/css" href="/PHP/style.css">
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
		<form action="login1.1.php" method="post">
			<h2>Prisijungimas</h2>

			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<label>Vartotojo vardas</label>
			<input type="text" name="va_vardas" value="<?php if(isset($_COOKIE["va_vardas"])) { echo $_COOKIE["va_vardas"]; } ?>" placeholder="Vartotojo vardas"><br>

			<label>Slaptažodis</label>
			<input type="password" name="v_slaptazodis" value="<?php if(isset($_COOKIE["v_slaptazodis"])) { echo $_COOKIE["v_slaptazodis"]; } ?>" placeholder="Slaptažodis"><br>
			
			<Label>Prisiminti mane</Label>
			<input type="checkbox" name="remember"/><br><br>

			<button type="submit">Prisijungti</button>
			<a href="signup.php" class="ca">Sukurti paskyrą</a><br>
			<a href="./admin/login.php" class="ca">Administratoriaus prisijungimas</a>
		</form>
	</section>

	<footer>

	</footer>
</body>
</html>

<style>
	
	form a {
		color: orange;
		font-size: 16px;
		padding: 10px;
	}

</style>