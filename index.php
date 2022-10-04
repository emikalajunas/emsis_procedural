<?php
//Author Edvinas
//Date 20200226
//Function connection
//Directory root

include 'includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Spaustuvės užsakymų sistema emsis v1.3</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link href="https://fonts.googleapis.com/css?family=Hind&display=swap" rel="stylesheet">
   	<link href="css/styles.css" type="text/css" rel="stylesheet">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
	<body class="login_body">

<!-- login to system form -->
        <form action="index.php" method ="post">
		<div class="login_header">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="index-logo-image">
                    <img src="images/logo.png" width="50%">
                </div>
                <div class="input-group">
                    <input type="text" name="login_user" placeholder="Vartotojo vardas" class="form-control" />
                </div>
                <div class="input-group">
                    <input type="email" name="login_email" placeholder="Elektroninis paštas" class="form-control" />
                </div>
                <div class="input-group">
                    <input type="password" name="login_password" placeholder="Slaptažodis" class="form-control" />
                </div>
                <div class="index-login-button">
                    <button type="submit" name="login_submit" class="btn btn-primary">Prisijungti</button>

<!--calls login to System function-->
<?php
if(isset($_POST['login_submit']) && (!empty($_POST['login_user'])) && (!empty($_POST['login_password'])) && (!empty($_POST['login_email']))){
loginToSystem();
}
?>
                </div>
                <!-- /input-group -->
         </div><!-- /.col-lg-4 -->
            <div class="col-lg-4"></div>
          </div>
		</div><!-- /.row -->
        </form>
<!-- end of login to system form -->


 <div class="login_footer">
		emsis &copy; 1.4 versija<br>Pagalba: +37067389506 <a href="mailto:info@emsis.lt">paštas </a>
		<a href="https://www.facebook.com" target="_blank"><img src="images/ficon.png" width="20px"><a href="https://www.emsis.lt" target="_blank">www.emsis.lt</a><br>
<?php echo date("Y.m.d"); ?>
</div>
    </body>

</html>
