<?php

//check if session is OK, otherwise dies code
if(isset($_SESSION['username'])){

//cleans form inputs DATA and validates information
if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($conSecure, $_POST['username']);
$username_length = strlen($username);
$email    = mysqli_real_escape_string($conSecure, $_POST['email']);
$password = mysqli_real_escape_string($conSecure, $_POST['password']);
$password_length = strlen($password);
$user_role =  $_POST['user_role'];

//checks conditions of inputs
if(!empty($username) && !empty($email) && !empty($password) && strlen($password)>= 5 && strlen($username) >= 5){

//hashes password
$password_hashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12,]);

//makes query and registers new user
$query = "INSERT INTO users (username, user_email, user_password, user_role) VALUES ('$username', '$email', '$password_hashed', '$user_role' )";
$register_user_query = mysqli_query($conSecure, $query);
if(!$register_user_query){
die("query failed" . mysqli_error($conSecure) . '' . mysqli_errno($conSecure));
}
$message = 'Vartotojo registracija sėkminga';
} else {
$message = 'Yra paliktų tuščių laukelių arba įvėstos trumpesnės nei 5 simbolių reikšmės';
}
} else {
$message = '';
}
} else {
header("Location: ../index.php");
}
?>
<!--


<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 8px;
  width: 100%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 12px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;

}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>
</head>
<body>


<button class="accordion">+</button>
<div class="panel">
-->
<!-- Registration FORM start -->
          <div class="well">
             <div class="col-xs-6 col-xs-offset-3">
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                       <h6 class="text-center"><?php echo $message; ?></h6>
                       <div class="form-group">
                           <select name="user_role" id="">
                               <option value="user">Vartotojo teisės</option>
                               <option value="admin">Administratorius</option>
                               <option value="user">Darbuotojas</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Vartotojo vardas">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Epaštas">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Slaptažodis">
                        </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Užregistruoti vartotoją">
                    </form>
            </div>
        </div>

<!-- Registration FORM end -->
<!--
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>
-->



























