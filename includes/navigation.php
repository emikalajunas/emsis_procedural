<style>

.show_logged_user{
font-family: 'Quicksand', sans-serif;
font-size: 11px;
color: blue;
text-align: right;
margin-right: 5%;
}
</style>


<?php
if(isset($_SESSION['username'])){
//check user status (authorities) USER
$username_from_session = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username_from_session' AND user_role = 'admin'";
$users_list_in_db = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_role = $row['user_role'];
}
if(isset($user_role) && $user_role === 'admin') {?>

<!-- START Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <a class="navbar-brand" href="main.php"><img src="images/logo.png" width="3%"></a>
            </div>

<!--meniu with SLIDE START           -->
        <div id="dock-container">
         <div id="dock">
           <ul>
              <li>
                <span>Naujas gaminys</span>
                <a href="main.php?action=add_record"><img src="images/add_record.png" width="50px"></a>
              </li>
              <li>
                <span>Į sandėlį</span>
                <a href="main.php?action=add_material"><img src="images/storage.png" width="50px"></a>
              </li>
              <li>
                <span>Administratoriui</span>
                <a href="main.php?action=dashboard"><img src="images/dashboard.png" width="50px"></a>
              </li>
              <li>
                 <span>Sąskaitos</span>
                 <a href="#"><img src="images/invoice.png" width="37px"></a>
              </li>
              <li>
                <span>Gamybos archyvas</span>
                <a href="main.php?action=archive"><img src="images/archive.png" width="41px"></a>
              </li>
              <li>
                 <span>Atsijungti</span>
                 <a href="includes/logout.php"><img src="images/logout.png" width="50px"></a>
              </li>
           </ul>
         </div>
        </div>
<!--meniu with SLIDE END -->


<!--show user name text in right corner START-->
            <div class="show_logged_user"><p>PRISIJUNGĘS: <?php echo $username_from_session ?></p>
            </div>
<!--show user name text in right corner END-->

        </div>
<!-- /.container -->
    </nav>
<!-- END Top Navigation --> <?php } ?>





<?php

//check user status (authorities) USER
$username_from_session = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username_from_session' AND user_role = 'user'";
$users_list_in_db = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_role = $row['user_role'];
}
if($user_role === 'user') {?>

<!-- START Top Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <a class="navbar-brand" href="main.php"><img src="images/logo.png" width="3%"></a>
            </div>

<!--meniu with SLIDE START           -->
        <div id="dock-container">
         <div id="dock">
           <ul>
              <li>
                <span>Naujas gaminys</span>
                <a href="main.php?action=add_record"><img src="images/add_record.png" width="50px"></a>
              </li>
              <li>
                 <span>Atsijungti</span>
                 <a href="includes/logout.php"><img src="images/logout.png" width="50px"></a>
              </li>
           </ul>
         </div>
        </div>
<!--meniu with SLIDE END -->


<!--show user name text in right corner START-->
            <div class="show_logged_user"><p>PRISIJUNGĘS: <?php echo $username_from_session ?></p>
            </div>
<!--show user name text in right corner END-->

        </div>
<!-- /.container -->
    </nav>
<!-- END Top Navigation --> <?php }} else {header ('Location: ../index.php');} ?>





