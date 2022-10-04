<?php

//gets data from form and converts to variables
if(isset($_POST['add_material'])){
$material_supplier  = $_POST['material_supplier'];;
$material_name  =  $_POST['material_name'];
$material_length  =  $_POST['material_length'];
$material_width  =  $_POST['material_width'];
$material_notes  =  $_POST['material_notes'];
$material_price_sqm  =  $_POST['material_price_sqm'];
$material_price_page  =  $_POST['material_price_page'];
$material_price_total  =  $material_price_sqm * $material_width * $material_length;
$material_area = $material_width * $material_length;


//sets taken FORM values to DB to warehouse table
$query = "INSERT INTO warehouse (material_supplier, material_name, material_length, material_width, material_notes, material_price_sqm, material_price_page, material_price_total, material_area, material_add_date) VALUES ('$material_supplier', '$material_name', '$material_length', '$material_width', '$material_notes', '$material_price_sqm', '$material_price_page', '$material_price_total', '$material_area', now() )";
$create_record_query = mysqli_query($conSecure, $query);
if($create_record_query){
header('Location: main.php');
} else {echo 'klaida' . mysqli_error($conSecure);}
}
?>

<!--START of add user form-->

	<form action ="" method="post" enctype="multipart/form-data">

        <div class="form-group">
				<label for="title">Kaina už kv.m</label>
				<input type="text" class="form-control" name="material_price_sqm">
			</div>

			<div class="form-group">
				<label for="title">Kaina už lapą</label>
				<input type="text" class="form-control" name="material_price_page">
			</div>
		<div class="form-group">
			<label for="title">Tiekėjas</label>
			<input type="text" class="form-control" name="material_supplier">
		</div>
		<div class="form-group">
		   <select name="material_name" id="">
			   <option value="kita medziaga">Pasirinkti medžiagą</option>
			   <option value="Lipdukas blizgus">Lipdukas blizgus</option>
			   <option value="Lipdukas matinis">Lipdukas matinis</option>
			   <option value="Lipdukas skaidrus">Lipdukas skaidrus</option>
			   <option value="Popierius 200 gsm">Popierius 200 gsm</option>
			   <option value="Backlight plastikas">Backlight plastikas</option>
			   <option value="Tentas">Tentas</option>
			   <option value="Rollup Tentas">Rollup Tentas</option>
			   <option value="Popierius 200 gsm">Popierius 115 gsm</option>
			   <option value="Popierius 200 gsm">Popierius 130 gsm</option>
			   <option value="Popierius 200 gsm">Popierius 150 gsm</option>
			   <option value="Popierius 200 gsm">Popierius 170 gsm</option>
			   <option value="Popierius 200 gsm">Popierius 300 gsm</option>
		   </select>
		</div>
            <div class="form-group">
				<label for="title">Medžiagos plotis</label>
				<input type="text" class="form-control" name="material_width">
			</div>
			<div class="form-group">
				<label for="title">Medžiagos ilgis</label>
				<input type="text" class="form-control" name="material_length">
			</div>
            <div class="form-group">
				<label for="post_image">Užrašinė</label>
				<input type="text" class="form-control-notesbox" name="material_notes">
			</div>

			<div class="form group">
				<input class="btn btn-primary" type="submit" name="add_material" value="Įtraukti medžiagą">
			</div>

	</form>

<!--END of add material form-->
