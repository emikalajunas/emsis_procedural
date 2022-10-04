<!--Search input form	START-->
<h4>Fragmento paieška</h4>
        <input class=modal_search id=x>
            <div id=textModal_x>
<!--Search input form END-->

<!--Delete RECORD ALERT confirm function -->
    <script type="text/javascript">
    function confirm_delete() {
    return confirm('Ar esate įsitikinęs, kad norite ištrinti?');
    }
    </script>

<!--Edit RECORD ALERT confirm function -->
    <script>
    function confirm_edit() {
    return confirm('Ar esate įsitikinęs, kad norite redaguoti įrašą?');
    }
    </script>

<!--Archive RECORD ALERT confirm function -->
    <script>
    function confirm_archive() {
    return confirm('Ar esate įsitikinęs, kad norite archyvuoti įrašą?');
    }
    </script>


<?php

//check user status (authorities) ADMIN
$username_from_session = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username_from_session' AND user_role = 'admin'";
$users_list_in_db = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_role = $row['user_role'];
}
if(isset($user_role) && $user_role === 'admin') { ?>

<!-- Projects in queue -->
                <h2>
                    Darbai eilėje
                </h2>

                <hr>
<div class="well">
                   <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         <tr>
                            <th>Pažymėti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Plotas</th>
                            <th>Apdirbimas</th>
						 	<th>Transportavimas</th>
                            <th>Papildomi užrašai</th>
							<th>Pradėti</th>
						    <th>Redaguoti</th>
							<th>Ištrinti</th>

<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 1 ORDER BY record_last_edit DESC";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area_full = $row['record_area'];
$record_area = round($record_area_full, 2);
$record_name = $row['record_name'];
$record_name = substr($record_name, 0, 20);
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//delete record from database
if(isset($_GET['delete'])){

$delete_record = $_GET['delete'];
$delete_query_db = "DELETE FROM records WHERE record_id = $delete_record ";
mysqli_query ($conSecure, $delete_query_db);
header("Location: main.php");
}

//move record to "Projects in progress"
if(isset($_GET['record_2'])){
$move_record_2 = $_GET['record_2'];

//gets time zone ant stamps date to variable
date_default_timezone_set("Europe/Vilnius");
$record_last_edit = date("Y.m.d.h.m.s");


$move_record_in_progress = "UPDATE records SET record_status='2', record_last_edit='$record_last_edit' WHERE record_id = '$move_record_2'";
mysqli_query ($conSecure, $move_record_in_progress);
header("Location: main.php");

}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_area}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_logistics}</td>";
echo "<td>{$record_notes}</td>";
echo "<td><a href='main.php?record_2=$record_id'><img src='images/play.png'  alt='Start job button' height='20px' width='20px'></a></td>";
echo "<td><a href='main.php?action=edit_record&record_id=$record_id' onclick='return confirm_edit()'><img src='images/correction.png' alt='Start job button' height'20px' width='20px'></a></td>";

//My DELETE confirmation version
//echo "<td><a href='main.php?delete=$record_id' onclick=\"return confirm_delete()\">Ištrinti darbą</a></td>";

//Rokas DELETE confirmation help
echo '<td><a href="main.php?delete=' . $record_id . '" onclick="return confirm_delete()"><img src="images/delete.png"  alt=\'Start job button\' height"20px" width="20px"></a></td>';
echo "</tr>";
} ?>


				    </tr>
                    </thead>
				</table>
</div>

                <hr>


<!-- Projects in progress -->
                <h2>
                    Gaminami darbai
                </h2>


                <hr>
<div class="well">
				<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         <tr>
                            <th>Pažymėti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Apdirbimas</th>
							<th>Dabar atspausta</th>
                            <th>Papildomi užrašai</th>
							<th>Užbaigti</th>
							<th>Redaguoti</th>
							<th>Ištrinti</th>

<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 2 ORDER BY record_last_edit DESC";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area = $row['record_area'];
$record_name = $row['record_name'];
$record_name = substr($record_name, 0, 20);
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//delete record from database
if(isset($_GET['delete'])){
$delete_record = $_GET['delete'];
$delete_query_db = "DELETE FROM records WHERE record_id = $delete_record ";
mysqli_query ($conSecure, $delete_query_db);
header("Location: main.php");
}

//move record to "Finished projects"
if(isset($_GET['record_3'])){
$move_record_3 = $_GET['record_3'];
$move_record_to_finished = "UPDATE records SET record_status='3', record_last_edit='$record_last_edit' WHERE record_id = '$move_record_3'";
mysqli_query ($conSecure, $move_record_to_finished);
header("Location: main.php");
}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_option2}</td>";
echo "<td>{$record_notes}</td>";
echo "<td><a href='main.php?record_3=$record_id '><img src='images/finish.png' alt='Finish job button' height='20px' width='20px'></a></td>";
echo "<td><a href='main.php?action=edit_record&record_id=$record_id' onclick='return confirm_edit()'><img src='images/correction.png' alt='Start job button' height'20px' width='20px'></a></td>";
echo '<td><a href="main.php?delete=' . $record_id . '" onclick="return confirm_delete()"><img src="images/delete.png" alt="Start job button" height"20px" width="20px"></a></td>';
echo "</tr>";
} ?>
                        </tr>
                    </thead>
				</table>
</div>
                <hr>

<!-- Projects that are finished -->
                <h2>
                    Pabaigti darbai
                </h2>

                <hr>
<div class="well">
				<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <tr>
                            <th>Pažymeti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Plotas</th>
                            <th>Apdirbimas</th>
							<th>Transportavimas</th>
                            <th>Papildomi užrašai</th>
							<th>Į archyvą</th>



<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 3 ORDER BY record_last_edit DESC ";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area_full = $row['record_area'];
$record_area = round($record_area_full, 2);
$record_name = $row['record_name'];
$record_name = substr($record_name, 0, 20);
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//move record to "Archived projects"
if(isset($_GET['record_4'])){
$move_record = $_GET['record_4'];
$move_record_to_archive = "UPDATE records SET record_status='4' WHERE record_id = '$move_record'";
mysqli_query ($conSecure, $move_record_to_archive);
header("Location: main.php");
}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_area}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_logistics}</td>";
echo "<td>{$record_notes}</td>";
echo "<td><a href='main.php?record_4=$record_id' onclick=\"return confirm_archive()\"><img src='images/archive.png' alt='Finish job button' height='20px' width='20px'></a></td>";
echo "</tr>";

} ?>
                        </tr>
                    </thead>
				</table>
                </div>
              <hr>

        </div>

<?php } else {

//check user status (authorities) USER
$username_from_session = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username_from_session' AND user_role = 'user'";
$users_list_in_db = mysqli_query($conSecure, $query);
while ($row = mysqli_fetch_assoc($users_list_in_db)){
$username = $row['username'];
$user_role = $row['user_role'];
}
if($user_role === 'user') { ?>

<!-- Projects in queue -->
                <h2>
                    Darbai eilėje
                </h2>

                <hr>
<div class="well">
                   <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         <tr>
                            <th>Pažymėti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Plotas</th>
                            <th>Apdirbimas</th>
						 	<th>Transportavimas</th>
                            <th>Papildomi užrašai</th>
							<th>Pradėti</th>
						    <th>Redaguoti</th>
							<th>Ištrinti</th>

<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 1 ORDER BY record_last_edit DESC";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area_full = $row['record_area'];
$record_area = round($record_area_full, 2);
$record_name = $row['record_name'];
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//delete record from database
if(isset($_GET['delete'])){

$delete_record = $_GET['delete'];
$delete_query_db = "DELETE FROM records WHERE record_id = $delete_record ";
mysqli_query ($conSecure, $delete_query_db);
header("Location: main.php");
}

//move record to "Projects in progress"
if(isset($_GET['record_2'])){
$move_record_2 = $_GET['record_2'];

//gets time zone ant stamps date to variable
date_default_timezone_set("Europe/Vilnius");
$record_last_edit = date("Y.m.d.h.m.s");


$move_record_in_progress = "UPDATE records SET record_status='2', record_last_edit='$record_last_edit' WHERE record_id = '$move_record_2'";
mysqli_query ($conSecure, $move_record_in_progress);
header("Location: main.php");

}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_area}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_logistics}</td>";
echo "<td>{$record_notes}</td>";
echo "<td><a href='main.php?record_2=$record_id'><img src='images/play.png'  alt='Start job button' height='20px' width='20px'></a></td>";
echo "<td><a href='main.php?action=edit_record&record_id=$record_id' onclick='return confirm_edit()'><img src='images/correction.png' alt='Start job button' height'20px' width='20px'></a></td>";

//My DELETE confirmation version
//echo "<td><a href='main.php?delete=$record_id' onclick=\"return confirm_delete()\">Ištrinti darbą</a></td>";

//Rokas DELETE confirmation help
echo '<td><a href="main.php?delete=' . $record_id . '" onclick="return confirm_delete()"><img src="images/delete.png"  alt=\'Start job button\' height"20px" width="20px"></a></td>';
echo "</tr>";
} ?>


				    </tr>
                    </thead>
				</table>
</div>

                <hr>


<!-- Projects in progress -->
                <h2>
                    Gaminami darbai
                </h2>


                <hr>
<div class="well">
				<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         <tr>
                            <th>Pažymėti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Apdirbimas</th>
							<th>Dabar atspausta</th>
                            <th>Papildomi užrašai</th>
							<th>Užbaigti</th>


<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 2 ORDER BY record_last_edit DESC";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area = $row['record_area'];
$record_name = $row['record_name'];
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//move record to "Finished projects"
if(isset($_GET['record_3'])){
$move_record_3 = $_GET['record_3'];
$move_record_to_finished = "UPDATE records SET record_status='3', record_last_edit='$record_last_edit' WHERE record_id = '$move_record_3'";
mysqli_query ($conSecure, $move_record_to_finished);
header("Location: main.php");
}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_option2}</td>";
echo "<td>{$record_notes}</td>";
echo "<td><a href='main.php?record_3=$record_id '><img src='images/finish.png' alt='Finish job button' height='20px' width='20px'></a></td>";
echo "</tr>";
} ?>
                        </tr>
                    </thead>
				</table>
</div>
                <hr>



<!-- Projects that are finished -->
                <h2>
                    Pabaigti darbai
                </h2>

                <hr>
<div class="well">
				<table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <tr>
                            <th>Pažymėti</th>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Plotas</th>
                            <th>Apdirbimas</th>
							<th>Transportavimas</th>
                            <th>Papildomi užrašai</th>


<?php
//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_status = 3 ORDER BY record_last_edit DESC ";
$records_select_from_db = mysqli_query ($conSecure, $query);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_status = $row['record_status'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area_full = $row['record_area'];
$record_area = round($record_area_full, 2);
$record_name = $row['record_name'];
$record_date_full = $row['record_date'];
$record_date =  substr($record_date_full, 0, 10);
$record_logistics = $row['record_logistics'];

//move record to "Archived projects"
if(isset($_GET['record_4'])){
$move_record = $_GET['record_4'];
$move_record_to_archive = "UPDATE records SET record_status='4' WHERE record_id = '$move_record'";
mysqli_query ($conSecure, $move_record_to_archive);
header("Location: main.php");
}

echo "<tr>";
?><td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value="123"></td><?php
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_area}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_logistics}</td>";
echo "<td>{$record_notes}</td>";

} ?>
                        </tr>
                    </thead>
				</table>
                </div>
              <hr>


<?php }} ?>



