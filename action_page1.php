<?php 
    include_once 'header.php';
?>

    <div id="confirmForm">
        <form class="confirm-form-container">
            <a id="closeConfirmLink" href="index.php">X</a>
            <h1>Done!</h1>
            <br>
            <p1>Dear customer, </p1>
            <br>
            <br>
            <p1>You have booked an appointment with CarsRUs.</p1>
          
        </form>
    </div>

    <div id="denyForm">
        <form class="deny-form-container">
            <a id="closeDenyLink" href="index.php">X</a>
            <h1>Sorry!</h1>
            <br>
            <p1>Dear customer, </p1>
            <br>
            <br>
            <p1>It looks like the mechanic you have chosen does not have any free slots on the chosen day.</p1>
          
        </form>
    </div>
    <script src="javaScript/script2.js"></script>
</body>
</html>

<?php
require_once 'includes/db_connection(epizy).php';
$conn = OpenCon();
session_start();
//echo "Connected Successfully";
//CloseCon($conn);

if (isset($_POST['submit']) && isset($_SESSION['name'])) {

    $mechanicName = $conn->real_escape_string($_POST['mechanicName']);
    $query1 = $conn->query("SELECT * FROM appointment WHERE  mechanic_name='" . $mechanicName . "' AND appointment_date ='" . $_SESSION['date'] . "'");
    $query2 = "INSERT INTO client (client_name, phone_no, car_registration_no, appointment_date, mechanic_name)
        VALUES ('".$_SESSION['name']."','".$_SESSION['phone']."','".$_SESSION['regNo']."','".$_SESSION['date']."','".$mechanicName."')";
    $query3 = "INSERT INTO appointment (appointment_date, client_car_reg_no, mechanic_name)
    VALUES ('".$_SESSION['date']."','".$_SESSION['regNo']."','".$mechanicName."')";

    if (mysqli_num_rows($query1) == 4) {
        echo '<script type="text/javascript">',
        'openDenyForm();',
        '</script>';
        session_destroy();
    }
    else {
        echo '<script type="text/javascript">',
        'openConfirmForm();',
        '</script>';
        
        $result = mysqli_query($conn,$query2);
        $result1 = mysqli_query($conn,$query3);
    }
}
else {
    header("location: appointment_form.php");
    exit();
}

?>




