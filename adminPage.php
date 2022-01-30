<?php 
session_start();
require_once 'includes/db_connection(epizy).php';
$conn = OpenCon();
$query1 = "SELECT * FROM client";
if (isset($_SESSION["email"])) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Car Workshop Website - admin page">
    
        <title>CarsRUs Admin Page</title>
        <link rel="stylesheet" href="css/adminPageSS.css">
    </head>
    
    <body>
        <div class="navbar">
            <a id="banner" href="#">Welcome To CarsRUs Admin Page!</a>
            <ul class="navbar-ul">	
                <li><a class="nav-link" id="signout" href="includes/signOut.inc.php">Sign Out</a></li>    	
            </ul>
        </div>
    
        <div class="title">
            <h1>List of Appointments</h1>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>';


    
    

    echo '<div class="table-container">
    <table> 
      <tr> 
          <th>Client Name</th> 
          <th>Phone Number</th> 
          <th>Car Registration Number</th> 
          <th>Appointment Date</th> 
          <th>Mechanic Name</th>
      </tr>';

    if ($result = $conn->query($query1)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["client_name"];
            $field2name = $row["phone_no"];
            $field3name = $row["car_registration_no"];
            $field4name = $row["appointment_date"];
            $field5name = $row["mechanic_name"]; 
    
            echo '<tr> 
                      <td>'.$field1name.'</td> 
                      <td>'.$field2name.'</td> 
                      <td>'.$field3name.'</td> 
                      <td>'.$field4name.'&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit1.php?edit='.$field4name.'&car_reg='.$field3name.'&mech_name='.$field5name.'">edit</a></td> 
                      <td>'.$field5name.'&nbsp;&nbsp;&nbsp;&nbsp;<a href="edit2.php?edit='.$field5name.'&car_reg='.$field3name.'&appoint_date='.$field4name.'">edit</a></td> 
                  </tr>';
        }
        $result->free();
    }
    echo '</table>
    </div>';
    
    echo '<br>
    <br>
</body>

<footer>

</footer>';
}
else {
    header("location: index.php");
     exit();
}



?>
    