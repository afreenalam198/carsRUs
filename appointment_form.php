<?php 
    include_once 'header.php';
?>
    
    <div id="appointmentForm">
        <form action="action_page.php" class="appointment-form-container" method="post">
            <a id="closeAppointmentLink" href="index.php">X</a>
            <h1>Book your Appointment</h1>
      
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
      
            <label for="phone"><b>Phone Number</b></label>
            <input type="phoneNo" placeholder="Enter Phone Number" name="phone" required>

            <label for="carReg"><b>Car Registration Number</b></label>
            <input type="regNo" placeholder="Enter Car Registration Number" name="carReg" required>

            <label for="appointmentDate"><b>Appointment Date</b></label>
            <input type="date" placeholder="Enter Appointment Date" name="appointmentDate" required>
            <br>
            <br>
            <button type="submit" class="nextBtn" name="submit">Next</button>
          
        </form>
    </div>
</body>
</html>