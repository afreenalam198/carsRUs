<?php
require_once 'db_connection(epizy).php';
$conn = OpenCon();
//echo "Connected Successfully";
//CloseCon($conn);

if (isset($_POST['submit'])) {
    $email = $conn->real_escape_string($_POST['emailID']);
    $password = $conn->real_escape_string($_POST['password']);

    $query1 = $conn->query("SELECT * FROM admin WHERE email_ID = BINARY '" . $email . "' AND password= BINARY '" . $password . "'");
    if (mysqli_num_rows($query1) == 1) {
        session_start();
        $_SESSION["email"] = $email;
        header("location: ../adminPage.php");
        exit();
    }
    else {
        header("location: ../signIn_form.php?error=incorrectEmailOrPwd");
        exit();
    }
}
else {
    header("location: ../signIn_form.php");
    exit();
}




