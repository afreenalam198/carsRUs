<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Car Workshop Website - admin page">

    <title>CarsRUs Admin Page</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="javaScript/script4.js"></script>
</head>

<body>
    <div class="navbar">
        <a id="banner" href="adminPage.php">Welcome To CarsRUs Admin Page!</a>
        <ul class="navbar-ul">	
            <li><a class="nav-link" id="signout" href="index.php">Sign Out</a></li>    	
        </ul>
    </div>

    <div id="editAppointmentDateForm">
        <form action="" class="editAppointmentDate-form-container" method="post">
            <h1>Edit Appointment Date</h1>
            <br>
            <br>
            
            <input type="date" placeholder="Enter Appointment Date" name="appointmentDate" required>
            <br>
            <br>
            <br>
            <input type="submit" class="doneBtn" value="Done">
          
        </form>
    </div>

    <div id="denyForm">
        <form class="deny-form-container">
            <a id="closeDenyLink" href="adminPage.php">X</a>
            <h1>Sorry!</h1>
            <br>
            <p1>Dear customer, </p1>
            <br>
            <br>
            <p1>It looks like the mechanic you have chosen does not have any free slots on the chosen day.</p1>
          
        </form>
    </div>

    <div id="confirmForm">
        <form class="confirm-form-container">
            <a id="closeConfirmLink" href="adminPage.php">X</a>
            <h1>Done!</h1>
            <br>
            <p1>Dear admin, </p1>
            <br>
            <br>
            <p1>You have changed the appointment date successfully.</p1>
          
        </form>
    </div>
</body>
</html>

<?php
require_once 'includes/db_connection(epizy).php';
$conn = OpenCon();


if (isset($_POST['appointmentDate'])) {
    $appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);
    $oldAppointmentDate = $conn->real_escape_string($_GET['edit']);
    $carReg = $conn->real_escape_string($_GET['car_reg']);
    $mechName = $conn->real_escape_string($_GET['mech_name']);

    
    $query3 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $mechName . "' AND appointment_date ='" . $appointmentDate . "'");

    if (mysqli_num_rows($query3) >= 4) {
        echo '<script type="text/javascript">',
        'openDenyForm();',
        '</script>';
    }
    else {
        $query1 = $conn->query("UPDATE client SET appointment_date='" . $appointmentDate . "' WHERE mechanic_name='" . $mechName . "' AND car_registration_no='" . $carReg . "'");
        $query2 = $conn->query("UPDATE appointment SET appointment_date='" . $appointmentDate . "' WHERE mechanic_name='" . $mechName . "' AND client_car_reg_no='" . $carReg . "'");
        echo '<script type="text/javascript">',
        'openConfirmForm();',
        '</script>';
        $result = mysqli_query($conn,$query1);
        $result1 = mysqli_query($conn,$query2);
    }
}
?>