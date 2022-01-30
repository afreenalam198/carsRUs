<?php 
    include_once 'header.php';
?>
    
    <?php 
        require_once 'includes/db_connection(epizy).php';
        $conn = OpenCon();
        if (isset($_POST['submit'])) {
            session_start();
            $jungkook = "Jungkook";
            $jimin = "Jimin";
            $namjoon = "Namjoon";
            $yoongi = "Yoongi";
            $taehyung = "Taehyung";

            $_SESSION['name'] = $conn->real_escape_string($_POST['name']);
            $_SESSION['phone'] = $conn->real_escape_string($_POST['phone']);
            $_SESSION['regNo'] = $conn->real_escape_string($_POST['carReg']);
            $_SESSION['date'] = $conn->real_escape_string($_POST['appointmentDate']);

            $appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);
            $query2 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $jungkook . "' AND appointment_date ='" . $appointmentDate . "'");
            $query3 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $jimin . "' AND appointment_date ='" . $appointmentDate . "'");
            $query4 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $namjoon . "' AND appointment_date ='" . $appointmentDate . "'");
            $query5 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $yoongi . "' AND appointment_date ='" . $appointmentDate . "'");
            $query6 = $conn->query("SELECT * FROM appointment WHERE mechanic_name ='" . $taehyung . "' AND appointment_date ='" . $appointmentDate . "'");
            $m1 = 4 - mysqli_num_rows($query2);
            $m2 = 4 - mysqli_num_rows($query3);
            $m3 = 4 - mysqli_num_rows($query4);
            $m4 = 4 - mysqli_num_rows($query5);
            $m5 = 4 - mysqli_num_rows($query6);
        }
        else {
            header("location: appointment_form.php");
            exit();
        }
    ?>
    <div id="mechanicListForm">
        <form action="action_page1.php" class="mechanicList-form-container" method="post">
            <a id="closeMechanicListLink" href="index.php">X</a>
            <h1>Choose your Desired Mechanic</h1>
            <br>
            <input type="radio" id="1" name="mechanicName" value="Jungkook" required>
            <label for="mech1">Jungkook - (<?php echo $m1; ?> slots available)</label><br><br>
            <input type="radio" id="2" name="mechanicName" value="Jimin" required>
            <label for="mech2">Jimin - (<?php echo $m2; ?> slots available)</label><br><br>
            <input type="radio" id="3" name="mechanicName" value="Namjoon" required>
            <label for="mech3">Namjoon - (<?php echo $m3; ?> slots available)</label><br><br>
            <input type="radio" id="4" name="mechanicName" value="Yoongi" required>
            <label for="mech4">Yoongi - (<?php echo $m4; ?> slots available)</label><br><br>
            <input type="radio" id="5" name="mechanicName" value="Taehyung" required>
            <label for="mech5">Taehyung - (<?php echo $m5; ?> slots available)</label><br><br>
            <br>
            <br>
            <br>
            <button type="submit" class="confirmBtn" name="submit">Confirm</button>
          
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
            <p1>It looks like you already have an appointment set up on the chosen day.</p1>
          
        </form>
    </div>
    <script src="javaScript/script1.js"></script>
</body>
</html>

<?php

$carReg = $conn->real_escape_string($_POST['carReg']);
$appointmentDate = $conn->real_escape_string($_POST['appointmentDate']);

$query1 = $conn->query("SELECT * FROM client WHERE car_registration_no ='" . $carReg . "' AND appointment_date ='" . $appointmentDate . "'");
if (mysqli_num_rows($query1) == 1) {
    echo '<script type="text/javascript">',
     'openDenyForm();',
     '</script>';
     session_destroy();
}
else {
    echo '<script type="text/javascript">',
     'openMechanicListForm();',
     '</script>';
}

?>




