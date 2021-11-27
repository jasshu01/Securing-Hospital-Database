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


// id , specilization, doctorName, address, docFees, contactno, docEmail 

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['id'])){

       
        $data_missing[] = 'Doctor ID';

    } else {
        
        $id = trim($_POST['id']);

    }

    if(empty($_POST['specilization'])){

       
        $data_missing[] = 'Specilization';

    } else{

        
        $specilization = trim($_POST['specilization']);

    }


    
    if(empty($_POST['doctorName'])){

       
        $data_missing[] = 'Doctor Name';

    } else{

        
        $doctorName = trim($_POST['doctorName']);

    }


    if(empty($_POST['contactno'])){

       
        $data_missing[] = 'Doctor Contact Number';

    } else {

        
        $contactno = trim($_POST['contactno']);

    }

    if(empty($_POST['docEmail'])){

       
        $data_missing[] = 'Doctor Email';

    } else {

        
        $docEmail = trim($_POST['docEmail']);

    }

   if(empty($_POST['docFees'])){

       
        $data_missing[] = 'Doctor Fees';

    } else {

        
        $docFees = trim($_POST['docFees']);

    }

  

    if(empty($_POST['address'])){

       
        $data_missing[] = 'Doctor Address';

    } else {

        
        $address = trim($_POST['address']);

    }




    if(empty($data_missing)){
 
        $server = "localhost";
        $username = "root";
        $password = "";
    
        
        $con = mysqli_connect($server, $username, $password,"hms");
    
        
        if(!$con){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
        // echo "Success connecting to the db";
    
     
        // $sql = "INSERT INTO 'hms'.'doctors' ('id' , 'specilization', 'doctorName', 'address', 'docFees', 'contactno', 'docEmail') VALUES ('$id', '$specilization', '$doctorName', '$address', '$docFees', '$contactno', '$docEmail')";
        $sql = "INSERT INTO doctors VALUES ('$id', '$specilization', '$doctorName', '$address', '$docFees', '$contactno', '$docEmail')";

        // echo $sql;
    
        // Execute the query
        if($con->query($sql) == true){
            echo "Successfully inserted";
    
            $insert = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    
       
        $con->close();


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
                <input type="text" class="form-control" id="id" name="id" aria-describedby="id"
                    placeholder="Enter Doctor ID">
            </div>
            <div class="form-group">
                <!-- <label for="doctorName">Doctor Name</label> -->
                <input type="text" class="form-control" id="doctorName" name="doctorName" aria-describedby="doctorName"
                    placeholder="Enter Doctor Name">
            </div>
            <div class="form-group">
                <!-- <label for="specilization">Doctor Specialization</label> -->
                <input type="text" class="form-control" id="specilization" name="specilization"
                    aria-describedby="specilization" placeholder="Enter Doctor Specilization">
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
                <button class="btn btn-primary">Go to home page</button>
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