<?php

//gets data from form and converts to variables
if(isset($_POST['add_record'])){
$record_status = 1;
$record_user =  $_POST['record_user'];
$record_material =  $_POST['record_material'];
$record_quantity =  $_POST['record_quantity'];
$record_name =  $_POST['record_name'];
$record_dimension1 = $_POST['record_dimension1'];
$record_dimension2 = $_POST['record_dimension2'];
$record_estimate = $_POST['record_estimate'];
$record_area = ($record_dimension1 * $record_dimension2 * $record_quantity) ;
$record_option1 = $_POST['record_option1'];
$record_notes =  $_POST['record_notes'];
$record_logistics =  $_POST['record_logistics'];


//sets taken FORM values to DB to records table
$query = "INSERT INTO records (record_status, record_user, record_material, record_quantity, record_name, record_dimension1, record_dimension2, record_area, record_option1, record_notes, record_date, record_logistics, record_estimate) VALUES ('$record_status', '$record_user', '$record_material','$record_quantity', '$record_name','$record_dimension1', '$record_dimension2','$record_area','$record_option1','$record_notes', now(), '$record_logistics', '$record_estimate' )";
$create_record_query = mysqli_query($conSecure, $query);
if($create_record_query){
header('Location: main.php');
} else {echo 'klaida' . mysqli_error($conSecure);}
}
?>

<!--START of add record form-->

<!--left side of add form-->

   <div class="col-md-8">
	<form action ="" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label for="title">Klientas</label>
			<input type="text" class="form-control_addrecord" name="record_user">
		</div>
            <div class="form-group">
              <label for="title">Medžiaga</label><br>
               <select name="record_material" id="">
                   <option value="kita medziaga">----------------------------</option>
                   <option value="Lipdukas blizgus">Lipdukas blizgus</option>
                   <option value="Lipdukas matinis">Lipdukas matinis</option>
                   <option value="Lipdukas skaidrus">Lipdukas skaidrus</option>
                   <option value="Backlight plastikas">Backlight plastikas</option>
                   <option value="Tentas">Tentas</option>
                   <option value="Rollup Tentas">Rollup Tentas</option>
                   <option value="Popierius 200 gsm">Popierius 115 gsm</option>
                   <option value="Popierius 200 gsm">Popierius 130 gsm</option>
                   <option value="Popierius 200 gsm">Popierius 150 gsm</option>
                   <option value="Popierius 200 gsm">Popierius 170 gsm</option>
                   <option value="Popierius 200 gsm">Popierius 200 gsm</option>
                   <option value="Popierius 200 gsm">Popierius 300 gsm</option>
               </select>
            </div>
			<div class="form-group">
				<label for="title">Maketo pavadinimas</label>
				<input type="text" class="form-control_addrecord" name="record_name">
			</div>
			<div class="form-group">
               <label for="title">Rulono plotis</label><br>
               <select name="record_material_width" id="record_material_width">
                   <option value="1.37">----------------------------</option>
                   <option value="0.91">0.91 m</option>
                   <option value="1.10">1.10 m</option>
                   <option value="1.27">1.27 m</option>
                   <option value="1.37">1.37 m</option>
                   <option value="1.50">1.50 m</option>
                   <option value="1.60">1.60 m</option>
               </select>
		    </div>
			<div class="form-group">
				<label for="title">Tiražas</label>
				<input type="text" class="form-control_addrecord" id="parameter_3" name="record_quantity">
			</div>
			<div class="form-group">
				<label for="title">Kraštinė 1</label>
				<input type="text" class="form-control_addrecord" id="parameter_1" name="record_dimension1">
			</div>

			<div class="form-group">
				<label for="title">Kraštinė 2</label>
				<input type="text" class="form-control_addrecord" id="parameter_2" name="record_dimension2">
			</div>
           <div class="form-group">
				<label for="title">Kaina už kv.m</label>
				<input type="text" class="form-control_addrecord" id="parameter_4" name="record_price_of_sqm">
			</div>
            <div class="form-group">
                 <label for="title">Sąmata</label>
                <input type="text" class="form-control_addrecord" id="estimateResult" value="0" name="record_estimate">
            </div>


<!--Estimate SCARPS calculation START-->

<?php

//example task: measurements 50x80 cm, quantity 5 units.

if (isset($_POST['add_record'])){
$record_material_roll_width = $_POST['record_material_width']; //example 1.6

$record_quanity_in_line_1 = $record_material_roll_width / $record_dimension1; //result fits 3
$record_quanity_in_line_2 = $record_material_roll_width / $record_dimension2; //result fits 2

//if($record_quanity_in_line_1 < $record_quanity_in_line_2) {
if(1 < 2) {

////checks how much records fits in one whole role string
//$check_2 = $record_dimension2 * $record_dimension2 * $record_quanity_in_line_2;
//
////first scrap
//$record_scarp_1 = $record_material_roll_width - $check_2;
//
//$record_whole_blocks_without_scarp = $record_quantity / $record_quanity_in_line_2;
//$record_whole_blocks_without_scarp = round($record_whole_blocks_without_scarp);
//
////coounts whole blocks lentgh
//$record_whole_blocks_without_scarp_length = $record_whole_blocks_without_scarp * $record_dimension2;
//
////counts last scrap
//$record_scrap_2 = $record_dimension1 * $record_dimension2 * ($record_quantity - ($record_whole_blocks_without_scarp * $record_quanity_in_line_1));
//
//$record_scrap_total = $record_scarp_1 + $record_scrap_2;
//
//}
//else {

//0.8 m

//checks how much records fits in one whole role string
$check_1 = $record_dimension1 * $record_quanity_in_line_1;

//first scrap
$record_scarp_1 = $record_material_roll_width - $check_1;

$record_whole_blocks_without_scarp = $record_quantity / $record_quanity_in_line_1;

//counts whole blocks
$record_whole_blocks_without_scarp = round($record_whole_blocks_without_scarp);

//coounts whole blocks lentgh
$record_whole_blocks_without_scarp_length = $record_whole_blocks_without_scarp * $record_dimension1;

//counts last scrap
$record_scrap_2 = $record_dimension1 * $record_dimension2 * ($record_quantity - ($record_whole_blocks_without_scarp * $record_quanity_in_line_1));

$record_scrap_total = $record_quanity_in_line_1;



//sets DATA to record_material_scrap db
$query = "UPDATE records SET record_material_scrap='$record_scrap_total'";
if (mysqli_query($conSecure, $query)) {
echo "New record created successfully";
} else {
echo "Error: " . $query . "<br>" . mysqli_error($conSecure);
}

}
}

?>
<!--Estimate SCARPS calculation END          -->


<!--Estimate PRICE calculator START-->
<!--Estimate caclualtion script START-->

<script type="text/javascript">

            function estimateCalculation() {
              var a = document.getElementById("parameter_1").value;
              var b = document.getElementById("parameter_2").value;
              var c = document.getElementById("parameter_3").value;
              var d = document.getElementById("parameter_4").value;
//              var e = document.getElementById("record_material_width").value;
              var f = document.getElementById('record_transportation').value;

//            if (typeof f === 'undefined') {
//
//            } else { f = 4;}

//              alert(a);alert(b);alert(c);alert(d);alert(f);
              var z = a * b * c * d + +f;
//              var z = z + f;
              alert("Šio gaminio kaina:" + " " + z + " " + "eur be PVM");


              document.getElementById("estimateResult").value = z;
              window.location.reload();
             }

</script>

<!--Estimate caclualtion script END-->

			<div class="form-group">
				<label for="post_status">Apdirbimo informacija </label>
				<input type="text" class="form-control_addrecord" name="record_option1">
			</div>

			<div class="form-group">
               <label for="title">Pristatymas</label><br>
			   <select name="record_logistics" id="record_transportation">
				   <option value="0">----------------------------</option>
				   <option value="0">Klientas pasiima pats</option>
				   <option value="4" id="">Siunčiame su VENIPAK</option>
				   <option value="4" id="">Siunčiame su DPD</option>
			   </select>
			</div>

			<div class="form-group">
				<label for="post_image">Užrašinė</label>
				<input type="text" class="form-control-notesbox" name="record_notes">
			</div>

			<div class="form group">
				<input class="btn btn-primary" onclick="estimateCalculation()" type="submit" name="add_record" value="Įvesti darbą">
			</div>

	</form>
	</div>



<!--right side of add form-->

        <div class="col-md-4">
            <img class="paper_size_images" src="images/A_paper_size.jpg" alt="A paper size table">
            <img class="paper_size_images" src="images/B_paper_size.jpg" alt="B paper size table">
        </div>


<!--END of add record form-->
