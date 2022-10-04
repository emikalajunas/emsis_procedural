<?php
// starts the session
ob_start();
session_start();

//includes connection file
include('includes/header.php');
include('includes/functions.php');


//checks if SESSION is set. If not redirects to INDEX
if(isset($_SESSION['username'])){

//includes NAVIGATION
include 'includes/navigation.php';
?>

    <div class="container">
        <div class="row">

<!-- Entries Column -->
            <div class="col-md-12">

<?php

// takes information from web line with GET what link use: records.php or add_record.php or edit_record.php
if(isset($_GET['action'])){
    $action = $_GET['action'];

	 switch ($action){
        case 'add_record':
        include 'includes/add_record.php';
        break;

        case 'add_material':
        include 'includes/add_material.php';
        break;

		case 'edit_record':
        include 'includes/edit_record.php';
        break;

        case 'dashboard':
        include 'includes/dashboard.php';
        break;

        case 'archive':
        include 'includes/archive.php';
        break;

        default:
        echo "bad link, system logged your try and IP";
        break;
    }
} else {include 'includes/records.php';}


?>

			</div>
		</div>
<!-- /.row -->

<!-- CAN add Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><?php // include'includes/login_footer.php'; ?> </p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
    </div>
<!-- /.container -->

<?php

//finishes php condition and if not SESSION autentification drops out to index.php
}
else { header("Location: index.php"); }
?>
