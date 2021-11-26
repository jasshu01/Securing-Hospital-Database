<html>

<head>
    <title>Add Doctor</title>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Add a Doctor</title>
    </head>


<body>
<div class="container mt-3">
    <?php

session_start();
//error_reporting(0);
include('config.php');
include('checklogin.php');
check_login();
   
// id , specilization, doctorName, address, docFees, contactno, docEmail 

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){

        // Adds name to array
        $data_missing[] = 'Doctor ID';

    } else {
        // Trim white space from the name and store the name
        $id = trim($_POST['id']);
        $id = htmlspecialchars($id);
    }

    if(empty($_POST['specilization'])){

        // Adds name to array
        $data_missing[] = 'Specilization';

    } else{

        // Trim white space from the name and store the name
        $specilization = trim($_POST['specilization']);
        $specilization = htmlspecialchars($specilization);
    }


    
    if(empty($_POST['doctorName'])){

        // Adds name to array
        $data_missing[] = 'Doctor Name';

    } else{

        // Trim white space from the name and store the name
        $doctorName = trim($_POST['doctorName']);
        $doctorName = htmlspecialchars($doctorName);
    }


    if(empty($_POST['contactno'])){

        // Adds name to array
        $data_missing[] = 'Doctor Contact Number';

    } else {

        // Trim white space from the name and store the name
        $contactno = trim($_POST['contactno']);
        $contactno = htmlspecialchars($contactno);
    }

    if(empty($_POST['docEmail'])){

        // Adds name to array
        $data_missing[] = 'Doctor Email';

    } else {

        // Trim white space from the name and store the name
        $docEmail = trim($_POST['docEmail']);
        $docEmail = htmlspecialchars($docEmail);
    }

   if(empty($_POST['docFees'])){

        // Adds name to array
        $data_missing[] = 'Doctor Fees';

    } else {

        // Trim white space from the name and store the name
        $docFees = trim($_POST['docFees']);
        $docFees = htmlspecialchars($docFees);
    }

  

    if(empty($_POST['address'])){

        // Adds name to array
        $data_missing[] = 'Doctor Address';

    } else {

        // Trim white space from the name and store the name
        $address = trim($_POST['address']);
        $address = htmlspecialchars($address);
    }




    if(empty($data_missing)){
 
 
        require_once('./mysqli_connect.php');
        $query = "INSERT INTO doctors VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (!mysqli_stmt_prepare($stmt, $query)){
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "sssssss", $id, $specilization, $doctorName, $address, $docFees, $contactno, $docEmail);
            mysqli_stmt_execute($stmt);
            
            $affected_rows = mysqli_stmt_affected_rows($stmt);
            
            if($affected_rows == 1){
                
                echo 'Doctor Entered';
                
                mysqli_stmt_close($stmt);
                
                mysqli_close($dbc);
                
            } else {
                
                echo 'Error Occurred<br />';
                echo mysqli_error($dbc);
                
                mysqli_stmt_close($stmt);
                
                mysqli_close($dbc);
                
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
        // // $sql = "INSERT INTO 'hms'.'doctors' ('id' , 'specilization', 'doctorName', 'address', 'docFees', 'contactno', 'docEmail') VALUES ('$id', '$specilization', '$doctorName', '$address', '$docFees', '$contactno', '$docEmail')";
        // $sql = "INSERT INTO doctors VALUES ('$id', '$specilization', '$doctorName', '$address', '$docFees', '$contactno', '$docEmail')";

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


    <!-- id , specilization, doctorName, address, docFees, contactno, docEmail -->

    
        <h1>Add Doctor</h1>
        <form action="/isaa/doctoradd.php" method="post">

            <div class="form-group">
                <!-- <label for="id">Assign Doctor ID</label> -->
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Enter Doctor ID">
            </div>
            <div class="form-group">
                <!-- <label for="doctorName">Doctor Name</label> -->
                <input type="text" class="form-control" id="doctorName" name="doctorName" aria-describedby="doctorName"
                    placeholder="Enter Doctor Name">
            </div>
            <div class="form-group">
                <!-- <label for="specilization">Doctor Specialization</label> -->
                <input type="text" class="form-control" id="specilization" name="specilization" aria-describedby="specilization"
                    placeholder="Enter Doctor Specilization">
            </div>
            <div class="form-group">
                <!-- <label for="address">Doctor Address</label> -->
                <input type="text" class="form-control" id="address" name="address" aria-describedby="address"
                    placeholder="Enter Doctor Address">
            </div>
            <div class="form-group">
                <!-- <label for="docFees">Doctor Fees</label> -->
                <input type="number" class="form-control" id="docFees" name="docFees" aria-describedby="docFees"
                    placeholder="Enter Doctor Fees">
            </div>
            <div class="form-group">
                <!-- <label for="contactno">Doctor Contact No.</label> -->
                <input type="text" class="form-control" id="contactno" name="contactno" aria-describedby="contactno"
                    placeholder="Enter Doctor Contact No.">
            </div>
            <div class="form-group">
                <!-- <label for="docEmail">Email address</label> -->
                <input type="email" class="form-control" id="docEmail" name="docEmail" aria-describedby="docEmail"
                    placeholder="Enter email">
            </div>

            <button name="submit" value="Send" type="submit" class="btn btn-primary">Add Doctor</button>
        </form>

      <div class="row">
      <form action="getdoctors.php">
        <button class="btn btn-primary mx-2">See Doctors List</button>
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