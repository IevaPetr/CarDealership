
<!DOCTYPE html>
<html>
<head>
	<title>Administratoriaus prisijungimas</title>
	<link rel="stylesheet" type="text/css" href="/PHP/style.css">
</head>
<body>
	<header>
        <ul>
            <li><a href="users.php" >Vartotojai</a></li>
            <li><a href="products.php" >Produktai</a></li>
            <li><a href="add.php">Prideti produkta</a></li>
            <li><a href="categories.php" >Kategorijos</a></li>

            <li class="right"><a href="" class="active_img"><img src="/PHP/acc.png" alt=""></a></li>
        </ul>
	</header>
	
	<section class="forma">
		<form action="login_check.php" method="post">
		<h2>Prisijungimas</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>Vartotojo vardas</label>
		<input type="text" name="v_vardas" placeholder="Vartotojo vardas"><br>

		<label>Slaptažodis</label>
		<input type="password" name="slaptazodis" placeholder="Slaptažodis"><br>

			<button type="submit">Prisijungti</button>
			<a href="/PHP/login1.php" class="ca">Vartotojo prisijungimas</a>
			
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
</style>