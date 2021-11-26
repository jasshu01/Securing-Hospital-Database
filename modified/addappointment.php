<?php

session_start();
require 'aes.class.php';     // AES PHP implementation
require 'aesctr.class.php';  // AES Counter Mode implementation
//error_reporting(0);
include('config.php');
include('checklogin.php');
check_login();

?>

<html>

<head>
    <title>Appointment</title>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Doctor Appointment</title>
    </head>


<body>
<div class="container mt-3">
    <?php


// id , doctorSpecialization, doctorName, address, docFees, contactno, docEmail 
//id , pat_id,doctorSpecialization,doctorId,consultancyFees,appointmentDate,appointmentTime,postingDate
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'ID';

    } else {
        // Trim white space from the name and store the name
        $id = $_POST['id'];
        $id = (string) AesCtr::decrypt($id, 'L0ck it up saf3', 256);
        $id = htmlspecialchars($id);
        echo $id;
    }
    if(empty($_POST['pat_id'])){

      // Adds name to array
      $data_missing[] = 'Pat ID';

  } else {
      // Trim white space from the name and store the name
      $pat_id = $_POST['pat_id'];
      $pat_id = (string)AesCtr::decrypt($pat_id, 'L0ck it up saf3', 256);
      $pat_id = htmlspecialchars($pat_id);
  }

    if(empty($_POST['doctorSpecialization'])){

        // Adds name to array
        $data_missing[] = 'Doctor Specilization';

    } else{

        // Trim white space from the name and store the name
        $doctorSpecialization = $_POST['doctorSpecialization'];
        $doctorSpecialization = (string)AesCtr::decrypt($doctorSpecialization, 'L0ck it up saf3', 256);        
        $doctorSpecialization = htmlspecialchars($doctorSpecialization);
    }
    
    if(empty($_POST['doctorId'])){

        // Adds name to array
        $data_missing[] = 'Doctor Id';

    } else{

        // Trim white space from the name and store the name
        $doctorId = $_POST['doctorId'];
        $doctorId = (string)AesCtr::decrypt($doctorId, 'L0ck it up saf3', 256);
        $doctorId = htmlspecialchars($doctorId);
    }

   
  if(empty($_POST['consultancyFees'])){

    // Adds name to array
    $data_missing[] = 'Consultancy Fees';

} else{

    // Trim white space from the name and store the name
    $consultancyFees = $_POST['consultancyFees'];
    $consultancyFees = (string)AesCtr::decrypt($consultancyFees, 'L0ck it up saf3', 256);
    $consultancyFees = htmlspecialchars($consultancyFees);
}
if(empty($_POST['appointmentDate'])){

  // Adds name to array
  $data_missing[] = 'Appointment Date';

} else{

  // Trim white space from the name and store the name
  $appointmentDate = $_POST['appointmentDate'];
  $appointmentDate = (string)AesCtr::decrypt($appointmentDate, 'L0ck it up saf3', 256);
  $appointmentDate = htmlspecialchars($appointmentDate);
}

    if(empty($_POST['appointmentTime'])){

        // Adds name to array
        $appointmentTime[] = 'Appointment Time';

    } else {

        // Trim white space from the name and store the name
        $appointmentTime = $_POST['appointmentTime'];
        $appointmentTime = (string)AesCtr::decrypt($appointmentTime, 'L0ck it up saf3', 256);
        $appointmentTime = htmlspecialchars($appointmentTime);
    }

    if(empty($_POST['postingDate'])){

        // Adds name to array
        $data_missing[] = 'Posting Date';

    } else {

        // Trim white space from the name and store the name
        $postingDate = $_POST['postingDate'];
        $postingDate = (string)AesCtr::decrypt($postingDate, 'L0ck it up saf3', 256);
        $postingDate = htmlspecialchars($postingDate);
    }

    if(empty($data_missing)){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "hms";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password,$database);
        // Check connection

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $query = "INSERT INTO appointment VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $query)){
                echo "SQL statement failed";
            } else{
                mysqli_stmt_bind_param($stmt, "issiisss", $id, $pat_id, $doctorSpecialization, $doctorId, $consultancyFees, $appointmentDate, $appointmentTime,$postingDate);
                mysqli_stmt_execute($stmt);
            
                $affected_rows = mysqli_stmt_affected_rows($stmt);
            
                if($affected_rows == 1){
                    
                    echo 'Appointment made';
                    
                    mysqli_stmt_close($stmt);
                    
                    mysqli_close($conn);
                    
                } else {
                    
                    echo 'Error Occurred<br />';
                    echo mysqli_error($conn);
                    
                    mysqli_stmt_close($stmt);
                    
                    mysqli_close($conn);
                    
                }
            }
        }
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>


    <!-- id , doctorSpecialization, doctorName, address, docFees, contactno, docEmail -->

    
        <h1>Doctor Appointment</h1>
        <form action="/isaa/addappointment.php" method="post" id="regForm">

            <div class="form-group">
                <!-- <label for="id">Assign Doctor ID</label> -->
                ID:
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Enter ID">
            </div>
            <div class="form-group">
                <!-- <label for="id">Assign Doctor ID</label> -->
                Pat_ID:
                <input type="text" class="form-control" id="pat_id" name="pat_id" aria-describedby="pat_id" placeholder="Enter Pat_ID">
            </div>
            <div class="form-group">
                <!-- <label for="doctorName">Doctor Name</label> -->
                Doctor Specialization:
                <input type="text" class="form-control" id="doctorSpecialization" name="doctorSpecialization" aria-describedby="doctorSpecialization" placeholder="Enter Doctor Specialization">
            </div>
            <div class="form-group">
                <!-- <label for="doctorSpecialization">Doctor Specialization</label> -->
                Doctor Id:
                <input type="text" class="form-control" id="doctorId" name="doctorId" aria-describedby="doctorId"
                    placeholder="Enter Doctor ID">
            </div>
            <div class="form-group">
                <!-- <label for="address">Doctor Address</label> -->
                Consultancy Fees:
                <input type="text" class="form-control" id="consultancyFees" name="consultancyFees" aria-describedby="consultancyFees"
                    placeholder="Enter Consultancy Fee">
            </div>
            <div class="form-group">
                <!-- <label for="docFees">Doctor Fees</label> -->
                Appointment Date:
                <input type="text" class="form-control" id="appointmentDate" name="appointmentDate" aria-describedby="appointmentDate"
                    placeholder="Enter Appointment Date">
            </div>
            <div class="form-group">
                <!-- <label for="contactno">Doctor Contact No.</label> -->
                Appointment Time:
                <input type="text" class="form-control" id="appointmentTime" name="appointmentTime" aria-describedby="appointmentTime"
                    placeholder="Enter Appointment Time">
            </div>
            <div class="form-group">
                <!-- <label for="docEmail">Email address</label> -->
                Posting Date:
                <input type="text" class="form-control" id="postingDate" name="postingDate" aria-describedby="postingDate"
                    placeholder="Enter Posting Date">
            </div>

            <button name="submit" value="Send" type="submit" class="btn btn-primary">Add Appoinment</button>
        </form>

      <div class="row">
      <form action="getdoctors.php" >
        <button class="btn btn-primary mx-2">See Appointments</button>
        </form>
        <form action="welcome.php">
        <button class="btn btn-primary" >Go to home page</button>
        </form>
      </div>
    </div>


    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="module">
        import AesCtr from './aes-ctr.js'
        $(document).ready(function() {
            // Submit form
            $("#regForm").submit(function (event) {


                var id = $("id").val();
                var pat_id = $('pat_id').val();
                var doctorSpecialization = $("doctorSpecialization").val();
                var doctorId = $("doctorId").val();
                var consultancyFees = $("consultancyFees").val();
                var appointmentDate = $("appointmentDate").val();
                var appointmentTime = $("appointmentTime").val();
                var postingDate = $("postingDate").val();

                // Encrypt form data
                var idEnc = AesCtr.encrypt(id, 'L0ck it up saf3', 256);
                var pat_id_enc =  AesCtr.encrypt(pat_id, 'L0ck it up saf3', 256);
                var doctorSpecializationEnc =  AesCtr.encrypt(doctorSpecialization, 'L0ck it up saf3', 256);
                var doctorIdEnc =  AesCtr.encrypt(doctorId, 'L0ck it up saf3', 256);
                var consultancyFeesEnc =  AesCtr.encrypt(consultancyFees, 'L0ck it up saf3', 256);
                var appointmentDateEnc =  AesCtr.encrypt(appointmentDate, 'L0ck it up saf3', 256);
                var appointmentTimeEnc =  AesCtr.encrypt(appointmentTime, 'L0ck it up saf3', 256);
                var postingDateEnc =  AesCtr.encrypt(postingDate, 'L0ck it up saf3', 256);
                var form = document.getElementById("regForm");
                form.id.value = idEnc;
                form.pat_id.value = pat_id_enc;
                form.doctorSpecialization.value = doctorSpecializationEnc;
                form.doctorId.value = doctorIdEnc;
                form.consultancyFees.value = consultancyFeesEnc;
                form.appointmentDate.value = appointmentDateEnc;
                form.appointmentTime.value = appointmentTimeEnc;
                form.postingDate.value = postingDateEnc;
                console.log(form);
            });
        });
    </script>
</body>

</body>

</html>