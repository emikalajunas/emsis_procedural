<?php
//gets post ID that must be edited from URL
if(isset($_GET['record_id'])){
$editable_post_id = $_GET['record_id'];
}

//gets all CURRENT information from DB that show in inputs
$query_read_from_db = "SELECT * FROM records WHERE record_id = $editable_post_id";
$records_select_from_db = mysqli_query ($conSecure, $query_read_from_db);
while ($row = mysqli_fetch_assoc($records_select_from_db)){
$record_id = $row['record_id'];
$record_user = $row['record_user'];
$record_material = $row['record_material'];
$record_quantity = $row['record_quantity'];
$record_dimension1 = $row['record_dimension1'];
$record_dimension2 = $row['record_dimension2'];
$record_option1 = $row['record_option1'];
$record_option2 = $row['record_option2'];
$record_notes = $row['record_notes'];
$record_area = $row['record_area'];
$record_name = $row['record_name'];
$record_logistics = $row['record_logistics'];
}

//gets data from FORM inputs and converts to variables
if(isset($_POST['edit_record'])){
$record_edit_user =  $_POST['record_user'];
$record_edit_material =  $_POST['record_material'];
$record_edit_quantity =  $_POST['record_quantity'];
$record_edit_name =  $_POST['record_name'];
$record_edit_dimension1 = $_POST['record_dimension1'];
$record_edit_dimension2 = $_POST['record_dimension2'];
$record_edit_area = ($record_dimension1 * $record_dimension2 * $record_quantity);
$record_edit_option1 = $_POST['record_option1'];
$record_edit_option2 = $_POST['record_option2'];
$record_edit_notes =  $_POST['record_notes'];
$record_logistics = $_POST['record_logistics'];

//gets time zone ant stamps date to variable
date_default_timezone_set("Europe/Vilnius");
$record_last_edit = date("Y.m.d.h.m.s");



//UPDATES values to DB to records table
$query_update = "UPDATE records SET record_user = '$record_edit_user', record_material = '$record_edit_material', record_quantity = '$record_edit_quantity', record_name ='$record_edit_name', record_dimension1 = '$record_edit_dimension1', record_dimension2 = '$record_edit_dimension2', record_area = '$record_edit_area', record_option1 = '$record_edit_option1', record_option2 = '$record_edit_option2', record_notes = '$record_edit_notes', record_logistics = '$record_logistics', record_last_edit = '$record_last_edit' WHERE record_id = $editable_post_id ";
$create_record_query = mysqli_query($conSecure, $query_update);
if($create_record_query){
echo 'Darbas sėkmingai ';
header('Location: main.php');
} else {echo 'klaida' . mysqli_error($conSecure);}

}

?>

<!--START of add user form-->
<div class="well">

	<form action ="" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="title">Klientas</label>
			<input value="<?php echo $record_user; ?>" type="text" class="form-control" name="record_user">
		</div>
		<div class="form-group">

		   <select name="record_material" id="">
			   <option value="<?php echo $record_material; ?>"><?php echo $record_material; ?></option>
			   <option value="Lipdukas blizgus">Lipdukas blizgus</option>
			   <option value="Lipdukas matinis">Lipdukas matinis</option>
			   <option value="Lipdukas skaidrus">Lipdukas skaidrus</option>
			   <option value="Popierius 200 gsm">Popierius 200 gsm</option>
			   <option value="Tentas">Tentas</option>
			   <option value="Rollup Tentas">Rollup Tentas</option>
		   </select>
			</div>

			<div class="form-group">
				<label for="title">Maketo pavadinimas</label>
				<input value="<?php echo $record_name; ?>" type="text" class="form-control" name="record_name">
			</div>

			<div class="form-group">
				<label for="title">Tiražas</label>
				<input value="<?php echo $record_quantity; ?>" type="text" class="form-control" name="record_quantity">
			</div>

			<div class="form-group">
				<label for="title">Kraštinė 1</label>
				<input value="<?php echo $record_dimension1; ?>" type="text" class="form-control" name="record_dimension1">
			</div>

			<div class="form-group">
				<label for="title">Kraštinė 2</label>
				<input value="<?php echo $record_dimension2; ?>" type="text" class="form-control" name="record_dimension2">
			</div>

			<div class="form-group">
				<label for="post_status">Apdirbimo informacija</label>
				<input value="<?php echo $record_option1; ?>" type="text" class="form-control" name="record_option1">
			</div>

			<div class="form-group">
				<label for="post_status">Šiuo metu yra atspausdinta vienetų</label>
				<input value="<?php echo $record_option2; ?>" type="text" class="form-control" name="record_option2">
			</div>

			<div class="form-group">
			   <select name="record_logistics" id="">
				   <option value="<?php echo $record_logistics; ?>"><?php echo $record_logistics; ?></option>
				   <option value="Klientas pasiima pats">Klientas pasiima pats</option>
				   <option value="Siunčiame su VENIPAK">Siunčiame su VENIPAK</option>
			   </select>
			</div>

			<div class="form-group">
				<label for="post_image">Užrašinė</label>
				<input value="<?php echo $record_notes; ?>" type="text" class="form-control-notesbox" name="record_notes">
			</div>

			<div class="form group">
				<input class="btn btn-primary" type="submit" name="edit_record" value="Redaguoti darbą">
			</div>

	</form>
</div>
<!--END of add user form-->
