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
        $id = trim($_POST['id']);
        $id = htmlspecialchars($id);

    }
    if(empty($_POST['pat_id'])){

      // Adds name to array
      $data_missing[] = 'Pat ID';

  } else {
      // Trim white space from the name and store the name
      $pat_id = trim($_POST['pat_id']);
      $pat_id = htmlspecialchars($pat_id);
  }

    if(empty($_POST['doctorSpecialization'])){

        // Adds name to array
        $data_missing[] = 'Doctor Specilization';

    } else{

        // Trim white space from the name and store the name
        $doctorSpecialization = trim($_POST['doctorSpecialization']);
        $doctorSpecialization = htmlspecialchars($doctorSpecialization);
    }
    
    if(empty($_POST['doctorId'])){

        // Adds name to array
        $data_missing[] = 'Doctor Id';

    } else{

        // Trim white space from the name and store the name
        $doctorId = trim($_POST['doctorId']);
        $doctorId = htmlspecialchars($doctorId);
    }

   
  if(empty($_POST['consultancyFees'])){

    // Adds name to array
    $data_missing[] = 'Consultancy Fees';

} else{

    // Trim white space from the name and store the name
    $consultancyFees = trim($_POST['consultancyFees']);
    $consultancyFees = htmlspecialchars($consultancyFees);
}
if(empty($_POST['appointmentDate'])){

  // Adds name to array
  $data_missing[] = 'Appointment Date';

} else{

  // Trim white space from the name and store the name
  $appointmentDate = trim($_POST['appointmentDate']);
  $appointmentDate = htmlspecialchars($appointmentDate);
}

    if(empty($_POST['appointmentTime'])){

        // Adds name to array
        $appointmentTime[] = 'Appointment Time';

    } else {

        // Trim white space from the name and store the name
        $appointmentTime = trim($_POST['appointmentTime']);
        $appointmentTime = htmlspecialchars($appointmentTime);
    }

    if(empty($_POST['postingDate'])){

        // Adds name to array
        $data_missing[] = 'Posting Date';

    } else {

        // Trim white space from the name and store the name
        $postingDate = trim($_POST['postingDate']);
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
        
        // $server = "localhost";
        // $username = "root";
        // $password = "";
    
        // // Create a database connection
        // $con = mysqli_connect($server, $username, $password,"hms");
    
        // // Check for connection success
        // if(!$con){
        //     die("connection to this database failed due to" . mysqli_connect_error());
        // }
        // // echo "Success connecting to the db";
    
        // // Collect post variables
        // // $sql = "INSERT INTO 'hms'.'doctors' ('id' , 'doctorSpecialization', 'doctorName', 'address', 'docFees', 'contactno', 'docEmail') VALUES ('$id', '$doctorSpecialization', '$doctorName', '$address', '$docFees', '$contactno', '$docEmail')";
        // $sql = "INSERT INTO appointment VALUES (?,?,?,?,?,?,?)";
        // $stmt = mysqli_stmt_init($conn);
        // if (mysqli_stmt_prepare($stmt, $con)){
        //     echo "SQL statement failed";
        // } else {
        //     mysqli_stmt_bind_param($stmt, "sssssss", $id, $pat_id, $doctorSpecialization, $doctorId, $consultancyFees, $appointmentDate, $postingDate);
        //     mysqli_stmt_execute($stmt);

        // }
        // // echo $sql;
    
        // // Execute the query
        // if($con->query($sql) == true){
        //     echo "Successfully inserted";
    
        //     // Flag for successful insertion
        //     $insert = true;
        // }
        // else{
        //     echo "ERROR: $sql <br> $con->error";
        // }
    
        // // Close the database connection
        // $con->close();


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
        <form action="/isaa/addappointment.php" method="post">

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
      <form action="getdoctors.php">
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
</body>

</body>

</html>