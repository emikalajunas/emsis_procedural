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


<!--SEARCH field highliter script code START-->
    <style>
        .highlight{
            color:blue;
            font-weight: 1000;
        }
        .modal_search{
            width: 100%;
            border-color: antiquewhite;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script>
    $(function() {
        $(".modal_search").each(function() {
            var textModal = $('#textModal_' + this.id),
                html = textModal.html();
            $(this).on("keyup", function() {
                var reg = new RegExp($(this).val() || "&fakeEntity;", 'gi');
                textModal.html(html.replace(reg, function(str, index) {
                    var t = html.slice(0, index+1),
                        lastLt = t.lastIndexOf("<"),
                        lastGt = t.lastIndexOf(">"),
                        lastAmp = t.lastIndexOf("&"),
                        lastSemi = t.lastIndexOf(";");
                    //console.log(index, t, lastLt, lastGt, lastAmp, lastSemi);
                    if(lastLt > lastGt) return str; // inside a tag
                    if(lastAmp > lastSemi) return str; // inside an entity
                    return "<span class='highlight'>" + str + "</span>";
                }));
            });
        })

    })
    </script>
<!--SEARCH field highliter script code END-->

<!--Search input form	START-->
       <h4>Fragmento paieška</h4>

        <input class=modal_search id=x>
            <div id=textModal_x>
<!--Search input form END-->

                 <h2>
                Gamybos archyvas
                </h2>
                    <hr>
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
                           </th>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                         <tr>
                            <th>Įvedimo data</th>
							<th>Klientas</th>
							<th>Medžiaga</th>
							<th>Tiražas</th>
                            <th>Maketo pavadinimas</th>
                            <th>Apdirbimas</th>
							<th>Buvo atspausta</th>
                            <th>Papildomi užrašai</th>

<?php

if(isset($_POST['records_filter_submit'])){

//getting DATA from form
$records_filter_from_form = $_POST['records_filter_from_form'];
$records_filter_to_form = $_POST['records_filter_to_form'];


//getting all the information from db about the RECORD and pushes to table
$query = "SELECT * FROM records WHERE record_date BETWEEN '$records_filter_from_form' AND '$records_filter_to_form' AND record_status = 4";
$records_select_from_db = mysqli_query ($conSecure, $query);

if ($records_select_from_db){
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

echo "<tr>";
echo "<td>{$record_date}</td>";
echo "<td>{$record_user}</td>";
echo "<td>{$record_material}</td>";
echo "<td>{$record_quantity}</td>";
echo "<td>{$record_name}</td>";
echo "<td>{$record_option1}</td>";
echo "<td>{$record_option2}</td>";
echo "<td>{$record_notes}</td>";
echo "</tr>";
}} else {echo (mysqli_error($conSecure));} ?>
                        </tr>
                    </thead>
                    </table>

               </thead>
                </table>
          </div>

<?php }} else {header ('Location: index.php');} ?>



