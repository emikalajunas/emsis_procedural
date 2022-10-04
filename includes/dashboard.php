<!--Search input form				-->
				<div class="well">
                    <h4>Paieška sistemoje</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

<!-- Dashboard of USERS -->
                <h2>
                    Vartotojai
                </h2>
			<div class="well">
				<table class="table table-sm table-bordered table-hover">
                    <thead>
                       <tr>
<!--START Now logged in users-->
                            <td><h4>Dabar prisijungę sistemos vartotojai:</h4>
<?php
//STARTS FUNCTION for tracking logged in users to system through SESSION end echoes result
echo howManyUsersLoggedIn();
?>
<!--END Now logged in users-->
							</td>
					   </tr>
						<tr>
                            <td><h4>Naujo vartotojo registracija</h4>
<!--STARTS registration page-->
<?php
//includes registration form page
include('registration.php');?>

<!--END registration page-->
                            </td>
					   </tr>
						<tr>
                            <td><h4>Vartotojo teisių administravimas</h4>
<!--STARTS user_status page-->
<?php

//includes user_status page
include('user_status.php'); ?>
<!--END user status page-->
                            </td>
					   </tr>
						<tr>
                            <td><h4>Vartotojo blokavimas</h4>
<!--STARTS banlist page-->
<?php
//includes registration form page
include('banlist.php'); ?>
<!--END banlist page-->
                            </td>
					   </tr>
                           <tr>
                            <td><h4>Ištrinti vartotoją</h4>
<!--STARTS banlist page-->
<?php
//includes registration form page
include('user_delete.php'); ?>
<!--END banlist page-->
                            </td>
					   </tr>
                        <tr>
                            <td><h4>Duombazės atsarginė kopija</h4>
<!--STARTS backup page-->
<?php
//includes backup form page and starts backup function (NEEDS REFACTORING)
include('backup.php'); ?>

<!--END banlist page-->
                            </td>
					   </tr>
	                </thead>
                </table>
			</div>

<!-- Dashboard of JOBS -->
                <h2>
                    Gamyba
                </h2>
                <hr>
<div class="well">
				<table class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
                          <th>
                           <form action="" method="post">
                                          <label for="birthday">Filtruoti gamybos rezultatus nuo:</label>
                                          <input type="date" id="birthday" name="records_filter_from_form">
                                           <label for="birthday">iki</label>
                                           <input type="date" id="birthday" name="records_filter_to_form">
                                          <input type="submit" value="Filtruoti" name="records_filter_submit">
                           </form>

<?php
// FUNCTION: makes query from DB what materials are allready archived

//getting variables from form filter results
if(isset($_POST['records_filter_submit'])){
$records_filter_from_form = $_POST['records_filter_from_form'];
$records_filter_to_form = $_POST['records_filter_to_form'];

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas blizgus
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas blizgus' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_1 = $row['record_area_sum'];
}

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas matinis
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas matinis' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_2 = $row['record_area_sum'];
}

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas skaidrus
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas skaidrus' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_3 = $row['record_area_sum'];
}

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Popierius 200 gsm
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Popierius 200 gsm' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_4 = $row['record_area_sum'];

}

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Tentas
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Tentas' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_5 = $row['record_area_sum'];
}

//makes query to get record_area result FROM to TO AND checks record status that equals 4 (archive) AND record_material Rollup tentas
$filter_query =  "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Rollup Tentas' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_area_query_6 = $row['record_area_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas blizgus
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas blizgus' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_1 = $row['record_estimate_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas matinis
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas matinis' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_2 = $row['record_estimate_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Lipdukas skaidrus
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Lipdukas skaidrus' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_3 = $row['record_estimate_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Popierius 200 gsm
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Popierius 200 gsm' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_4 = $row['record_estimate_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Tentas
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Tentas' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_5 = $row['record_estimate_sum'];
}

//makes query to get record_estimate result FROM to TO AND checks record status that equals 4 (archive) AND record_material Rollup tentas
$filter_query =  "SELECT SUM(record_estimate) AS record_estimate_sum FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4 AND record_material = 'Rollup tentas' ";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$record_estimate_query_6 = $row['record_estimate_sum'];
}

//calculates result of production
$result_production = $record_area_query_1 +$record_area_query_2 + $record_area_query_3 + $record_area_query_4 + $record_area_query_5 + $record_area_query_6;


//calculates result of estimate value
$result_estimate = $record_area_query_1 +$record_area_query_2 + $record_area_query_3 + $record_area_query_4 + $record_area_query_5 + $record_area_query_6;


}
?>
                          </th>
                       <tr>
                        <th>Medžiaga</th>
                        <th>Kvadratiniai metrai</th>
                        <th>Sumai už</th>
                      </tr>
                      <tr>
                        <td>Lipdukas blizgus</td>
                        <td><?php if(isset($record_area_query_1)){echo $record_area_query_1;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($record_estimate_query_1)){echo $record_estimate_query_1 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                     </tr>
                        <tr>
                        <td>Lipdukas matinis</td>
                         <td><?php if(isset($record_area_query_2)){echo $record_area_query_2;} else { echo'neturima duomenų';} ?></td>
                         <td><?php if(isset($record_estimate_query_2)){echo $record_estimate_query_2 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                        <tr>
                        <td>Lipdukas skaidrus</td>
                         <td><?php if(isset($record_area_query_3)){echo $record_area_query_3;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($record_estimate_query_3)){echo $record_estimate_query_3 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                        <tr>
                        <td>Popierius 200 gsm</td>
                         <td><?php if(isset($record_area_query_4)){echo $record_area_query_4;} else { echo'neturima duomenų';} ?></td>
                         <td><?php if(isset($record_estimate_query_4)){echo $record_estimate_query_4 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                        <tr>
                        <td>Tentas</td>
                         <td><?php if(isset($record_area_query_5)){echo $record_area_query_5;} else { echo'neturima duomenų';} ?></td>
                         <td><?php if(isset($record_estimate_query_5)){echo $record_estimate_query_5 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                        <tr>
                        <td>Rollup tentas</td>
                         <td><?php if(isset($record_area_query_6)){echo $record_area_query_6;} else { echo'neturima duomenų';} ?></td>
                         <td><?php if(isset($record_estimate_query_6)){echo $record_estimate_query_6 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
<!--Result line START-->
                       <tr>
                        <td>Viso</td>
                        <td>
<?php
//shows result of production
if(isset($result_production)){
echo $result_production;
}
?>
                        </td>
                        <td>
<?php
//shows result of estimate value
if(isset($result_production)){
echo $result_production;
}
?>
                        </td>
                      </tr>
<!--Result line END-->

                    </thead>
				</table>
</div>
<!-- Dashboard of WAREHOUSE -->
                <h2>
                    Sandėlio likučiai
                </h2>
                <hr>
<div class="well">
				<table class="table table-sm table-bordered table-hover">
                    <thead>
                      <tr>
<?php

// FUNCTION: warehouse manipulations function
$material_1 = 'Lipdukas blizgus';
$material_2 = 'Lipdukas matinis';
$material_3 = 'Lipdukas skaidrus';
$material_4 = 'Popierius 200 gsm';
$material_5 = 'Tentas';
$material_6 = 'Rollup tentas';

//checks if button filter is pushed NOT FINISHED

if(isset($_POST['warehouse_filter_submit'])){
} else {

// if button FILTER warehouse is not pushed shows NOW WAREHOUSE material_area results
//calculates area
$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_1'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_1 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_1' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_1 = $row['record_area_sum'];
}
$material_area_query_1 = $material_area_1 - $record_area_query_1;


$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_2'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_2 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_2' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_2 = $row['record_area_sum'];
}
$material_area_query_2 = $material_area_2 - $record_area_query_2;


$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_3'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_3 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_3' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_3 = $row['record_area_sum'];
}
$material_area_query_3 = $material_area_3 - $record_area_query_3;



$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_4'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_4 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_4' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_4 = $row['record_area_sum'];
}
$material_area_query_4 = $material_area_4 - $record_area_query_4;



$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_5'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_5 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_5' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_5 = $row['record_area_sum'];
}
$material_area_query_5 = $material_area_5 - $record_area_query_5;


$filter_query = "SELECT SUM(material_area) AS material_area_sum FROM warehouse WHERE material_name = '$material_6'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$material_area_6 = $row['material_area_sum'];
}
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_6' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$record_area_query_6 = $row['record_area_sum'];
}
$material_area_query_6 = $material_area_6 - $record_area_query_6;

//calculates the prices
//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_1'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_1_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_1' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_1_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_1'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_1_price_average = $row['material_price_average'];
}
$used_material_1_price = $used_material_1_area * $used_material_1_price_average;
$material_price_query_1 = $total_material_1_price_in_warehouse - $used_material_1_price;




//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_2'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_2_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_2' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_2_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_1'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_2_price_average = $row['material_price_average'];
}
$used_material_2_price = $used_material_2_area * $used_material_2_price_average;
$material_price_query_2 = $total_material_2_price_in_warehouse - $used_material_2_price;


//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_3'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_3_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_3' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_3_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_3'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_3_price_average = $row['material_price_average'];
}
$used_material_3_price = $used_material_3_area * $used_material_3_price_average;
$material_price_query_3 = $total_material_3_price_in_warehouse - $used_material_3_price;

//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_4'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_4_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_4' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_4_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_4'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_4_price_average = $row['material_price_average'];
}
$used_material_4_price = $used_material_4_area * $used_material_4_price_average;
$material_price_query_4 = $total_material_4_price_in_warehouse - $used_material_4_price;

//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_5'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_5_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_5' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_5_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_5'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_5_price_average = $row['material_price_average'];
}
$used_material_5_price = $used_material_5_area * $used_material_5_price_average;
$material_price_query_5 = $total_material_5_price_in_warehouse - $used_material_5_price;

//gets all data from warehouse material price
$filter_query = "SELECT SUM(material_price_total) AS material_price_total_sum FROM warehouse WHERE material_name = '$material_6'";
$filter = mysqli_query($conSecure, $filter_query);
while ($row = mysqli_fetch_array($filter)){
$total_material_6_price_in_warehouse = $row['material_price_total_sum'];
}
//gets record area size
$record_area_query = "SELECT SUM(record_area) AS record_area_sum FROM records WHERE record_material = '$material_6' AND record_status = '2' OR record_status = '3' OR record_status = '4'";
$record_area = mysqli_query($conSecure, $record_area_query);
while ($row = mysqli_fetch_array($record_area)){
$used_material_6_area = $row['record_area_sum'];
}
//gets record sqm PRICE and makes calculation to MINUS record material estimate from all WAREHOUSE
$material_sqm_price_query = "SELECT AVG(material_price_sqm) AS material_price_average FROM warehouse WHERE material_name = '$material_6'";
$warehouse_material_price_average = mysqli_query($conSecure, $material_sqm_price_query);
while ($row = mysqli_fetch_array($warehouse_material_price_average)){
$used_material_6_price_average = $row['material_price_average'];
}
$used_material_6_price = $used_material_6_area * $used_material_6_price_average;
$material_price_query_6 = $total_material_6_price_in_warehouse - $used_material_6_price;

}
?>

                       </tr>
                       <tr>
                        <th>Medžiaga</th>
                        <th>Kvadratiniai metrai</th>
                        <th>Sumai už</th>
                      </tr>
                      <tr>
                        <td>Lipdukas blizgus</td>
                        <td><?php if(isset($material_area_query_1)){echo $material_area_query_1;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_1)){echo $material_price_query_1 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                       <tr>
                        <td>Lipdukas matinis</td>
                        <td><?php if(isset($material_area_query_2)){echo $material_area_query_2;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_2)){echo $material_price_query_2 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                      </tr>
                       <tr>
                        <td>Lipdukas skaidrus</td>
                        <td><?php if(isset($material_area_query_3)){echo $material_area_query_3;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_3)){echo $material_price_query_3 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                       </tr>
                        <tr>
                        <td>Popierius 200 gsm</td>
                        <td><?php if(isset($material_area_query_4)){echo $material_area_query_4;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_4)){echo $material_price_query_4 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                       </tr>
                       <tr>
                        <td>Tentas</td>
                        <td><?php if(isset($material_area_query_5)){echo $material_area_query_5;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_5)){echo $material_price_query_5 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                       </tr>
                       <tr>
                        <td>Rollup tentas</td>
                        <td><?php if(isset($material_area_query_6)){echo $material_area_query_6;} else { echo'neturima duomenų';} ?></td>
                        <td><?php if(isset($material_price_query_6)){echo $material_price_query_6 . " " . "Eur";} else { echo'neturima duomenų';} ?></td>
                       </tr>
                        </thead>
				</table>
</div>






