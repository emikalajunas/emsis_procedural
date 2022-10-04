<?php

//check if session is OK, otherwise dies code
if(isset($_SESSION['username'])){

if (isset($_POST['delete_user'])){

//check checkbox status, gets value, updates record to DB
if(isset($_POST['checkBoxArray'])){
foreach($_POST['checkBoxArray'] as $user_id){
$query = "DELETE FROM users WHERE username='$user_id'";
mysqli_query($conSecure, $query);

if(!mysqli_query($conSecure, $query)){
echo(mysqli_error($conSecure));
}
}
}
}

?>
<!-- Dashboard of DELETE USERS -->
               <div class="well">
				<table class="table table-sm table-bordered table-hover">
                    <thead>
                        <form action ="" method="post" enctype="multipart/form-data">
		                  <div class="form-group">
                                       <tr>
                                           <th>Pasirinkite</th>
                                            <th>Vartotojas</th>
                                        </tr>
<?php

//echoes table of users from database
$query = "SELECT * FROM users";
$users_list_in_db = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_banned = $row['user_banned'];
            echo "<tr>";
            echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$username'></td>";
            echo "<td>$username</td>";
            echo "</tr>"; }} else {
            header("Location: ../index.php");
}

?>
                        </div>
                        <input class="btn btn-primary" type="submit" name="delete_user" value="Ištrinti">
                       </form>
                     </thead>
                </table>

              </div>














