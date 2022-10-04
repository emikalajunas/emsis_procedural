<?php

//check if session is OK, otherwise dies code
if(isset($_SESSION['username'])){

if (isset($_POST['change_status'])){

//gets user status from multipart form
$user_status = $_POST['user_status'];
} else {$user_status = NULL;}

//check checkbox status, gets value, updates record to DB
if(isset($_POST['checkBoxArray'])){
foreach($_POST['checkBoxArray'] as $user_id){
$query = "UPDATE users SET user_role='$user_status' WHERE username='$user_id'";
mysqli_query($conSecure, $query);

if(!mysqli_query($conSecure, $query)){
echo(mysqli_error($conSecure));
}
}
}

?>
    <!-- Dashboard of USERS -->
               <div class="well">
				<table class="table table-sm table-bordered table-hover">
                    <thead>
                        <form action ="" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
                            <div class="form-group">
                               <select name="user_status" id="">
                                   <option value="user">Vartotojo statusas</option>
                                   <option value="admin">Administratorius</option>
                                   <option value="user">Paprastas vartotojas</option>
                               </select>
                            </div>
                                       <tr>
                                       <th>Pasirinkite</th>
                                        <th>Vartotojas</th>
                                        <th>Statusas</th>
                                      </tr>
<?php

//echoes table of users from database
$query = "SELECT * FROM users";
$users_list_in_db = mysqli_query($conSecure, $query);

while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_role = $row['user_role'];
            echo "<tr>";
            echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$username'></td>";
            echo "<td>$username</td>";
            echo "<td>$user_role</td>";
            echo "</tr>"; }} else {
            header("Location: ../index.php");
}

?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="change_status" value="Pakeisti statusą">
                       </form>
                     </thead>
                </table>

              </div>














