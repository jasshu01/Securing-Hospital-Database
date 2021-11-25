<html>

<head>
    <title>Add Patient</title>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Doctors List</title>
    </head>


<body>
    <div class="container mt-3">
    <?php

if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['Docid'])){

        // Adds name to array
        $data_missing[] = 'Doctor ID';

    } else {

        // Trim white space from the name and store the name
        $doc_id = trim($_POST['Docid']);
        $doc_id = htmlspecialchars($doc_id);

    }

    if(empty($_POST['PatientName'])){

        // Adds name to array
        $data_missing[] = 'Patient Name';

    } else{

        // Trim white space from the name and store the name
        $patient_name = trim($_POST['PatientName']);
        $patient_name = htmlspecialchars($patient_name);
    }

    if(empty($_POST['PatientContno'])){

        // Adds name to array
        $data_missing[] = 'Patient Contact Number';

    } else {

        // Trim white space from the name and store the name
        $patient_cont_no = trim($_POST['PatientContno']);
        $patient_cont_no = htmlspecialchars($patient_cont_no);
    }

    if(empty($_POST['PatientEmail'])){

        // Adds name to array
        $data_missing[] = 'Patient Email';

    } else {

        // Trim white space from the name and store the name
        $patient_email = trim($_POST['PatientEmail']);
        $patient_email = htmlspecialchars($patient_email);
    }

    if(empty($_POST['PatientGender'])){

        // Adds name to array
        $data_missing[] = 'Patient Gender';

    } else {

        // Trim white space from the name and store the name
        $patient_gender = trim($_POST['PatientGender']);
        $patient_gender = htmlspecialchars($patient_gender);
    }

    if(empty($_POST['PatientAdd'])){

        // Adds name to array
        $data_missing[] = 'Patient Address';

    } else {

        // Trim white space from the name and store the name
        $patient_add = trim($_POST['PatientAdd']);
        $patient_add = htmlspecialchars($patient_add);
    }

    if(empty($_POST['PatientMedhis'])){

        // Adds name to array
        $data_missing[] = 'Patient Medical History';

    } else {

        // Trim white space from the name and store the name
        $patient_med_his = trim($_POST['PatientMedhis']);
        $patient_med_his = htmlspecialchars($patient_med_his);
    }

    if(empty($_POST['PatientAge'])){

        // Adds name to array
        $data_missing[] = 'Patient Age';

    } else {

        // Trim white space from the name and store the name
        $patient_age = trim($_POST['PatientAge']);
        $patient_age = htmlspecialchars($patient_age);
    }


    if(empty($data_missing)){
        
        require_once('./mysqli_connect.php');
        
        $query = "INSERT INTO tblpatient (Docid, PatientName, PatientContno,
        PatientEmail, PatientGender, PatientAdd, PatientAge, PatientMedhis) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "ssssssis", $doc_id,
                               $patient_name, $patient_cont_no, $patient_email, $patient_gender,
                               $patient_add, $patient_age, $patient_med_his);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Patient Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}

?>

    <form action="patientadded.php" method="post">

        <b>Add a New Patient</b>

        <p>Doctor ID:
            <input type="text" name="Docid" size="30" value="" />
        </p>

        <p>Patient Name:
            <input type="text" name="PatientName" size="30" value="" />
        </p>

        <p>Patient Contact Number:
            <input type="text" name="PatientContno" size="30" value="" />
        </p>

        <p>Patient Email:
            <input type="text" name="PatientEmail" size="30" value="" />
        </p>

        <p>Patient Gender:
            <input type="text" name="PatientGender" size="30" value="" />
        </p>

        <p>Patient Address:
            <input type="text" name="PatientAdd" size="30" value="" />
        </p>

        <p>Patient Medical history:
            <input type="text" name="PatientMedhis" size="30" maxlength="5" value="" />
        </p>

        <p>Patient Age:
            <input type="number" name="PatientAge" size="30" value="" />
        </p>

        <p>
            <input type="submit" class="btn btn-primary" name="submit" value="Add Patient" />
        </p>

    </form>


<div class="row">
      <form action="getpatient.php">
        <button class="btn btn-primary mx-2">See Patients List</button>
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



</html>