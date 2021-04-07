<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Mokėjimas</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="home.php" >Pradžia</a></li>
            <li><a href="cars.php">Automobiliai</a></li>
            <li><a href="help.php">Pagalba</a></li>
            <li class="right"><a href="login1.php"><img src="acc.png" alt=""></a></li>
            <li class="right"><a href=""><img src="fav.png" alt=""></a></li>
        </ul>
    </header>
    
    <section class="forma">
        <form class="form-horizontal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
        <input type='hidden' name='business' value='Your Business Email Address'>
        <input type='hidden' name='item_name' value='<?php echo $_SESSION["favorites"]; ?>'> 
        <input type='hidden' name='item_number' value="<?php echo $order_id; ?>">
        <input type='hidden' name='amount' value='<?php echo $_SESSION["total"]; ?>'> 
        <input type='hidden' name='currency_code' value='USD'> 
        <input type='hidden' name='notify_url' value='http://yourdomain.com/shopping-cart-with-paypal-integration/notify.php'>
        <input type='hidden' name='return' value='http://yourdomain.com/shopping-cart-with-paypal-integration/success.php'>
        <input type="hidden" name="cmd" value="_xclick"> 
        <input type="hidden" name="order" value="<?php echo $_SESSION["orderNumber"]; ?>">
        <br>
        <div class="form-group">
            <div class="col-sm-2"> 
                <input type="submit" class="btn btn-lg btn-block btn-danger" name="continue_payment" value="Pay Now">				 
            </div>
        </div>
        </form>
    </section>

    <footer></footer>
</body>
</html>

<style>
    input[type='submit'] {
		background: orange;
		padding: 10px 15px;
		color: #fff;
		border-radius: 5px;
		margin-right: 10px;
		border: none;
	}
</style>