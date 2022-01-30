<?php 
    include_once 'header.php';
?>


    <div id="signInForm">
        <form action="includes/signIn_form.inc.php" class="signIn-form-container" method="post">
            <a id="closeSignInLink" href="index.php">X</a>
            <h1>Sign In</h1>
      
            <label for="emailID"><b>Email ID</b></label>
            <input type="text" placeholder="Enter Email ID" name="emailID" required>
      
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <br>
            <br>
            <button type="submit" class="nextBtn" name="submit">Next</button>
          
        </form>
    </div>
    
    <div id="denyForm">
        <form class="deny-form-container">
            <a id="closeDenyLink" href="index.php">X</a>
            <h1>Sorry!</h1>
            <br>
            <p1>Dear admin, </p1>
            <br>
            <br>
            <p1>It looks like you have entered the wrong email ID and/or password.</p1>
          
        </form>
    </div>

    <script src="javaScript/script3.js"></script>

</body>
</html>

<?php

if(isset($_GET['error'])) {
    if($_GET['error'] == 'incorrectEmailOrPwd') {
        echo '<script type="text/javascript">',
        'openDenyForm();',
        '</script>';
    }
}
?>
