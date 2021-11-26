<?php

session_start();
//error_reporting(0);
include('config.php');
include('checklogin.php');
check_login();

?>
<html>

<head>
    <title>Appoinment</title>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Appoinments List</title>
    </head>


<body>
    <div class="container mt-3" style="width:90%;">

    <?php
// Get a connection for the database
require_once('./mysqli_connect.php');


// Create a query for the database

$query =" SELECT id, doctorSpecialization, pat_id, doctorId,consultancyFees, appointmentDate, appointmentTime, postingDate FROM appointment";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed





if($response){


echo ' <div style="width:100%;margin:auto"> 
<h1> Appoinments Information </h1>

<table  style="border: 2px solid black;text-align:centre" align="left"
cellspacing="5" cellpadding="8">

<tr>
<td align="left"><b>doctorSpecialization</b></td>
<td align="left"><b>id</b></td>
<td align="left"><b>doctorId</b></td>
<td align="left"><b>pat_id</b></td>
<td align="left"><b>consultancyFees</b></td>
<td align="left"><b>appointmentDate</b></td>
<td align="left"><b>appointmentTime</b></td>
<td align="left"><b>postingDate</b></td>
</tr>'
;

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

    echo '<tr><td align="left">' . 
    htmlspecialchars($row['doctorSpecialization']) . '</td><td align="left">' . 
    htmlspecialchars($row['id']) . '</td><td align="left">' . 
    htmlspecialchars($row['doctorId']) . '</td><td align="left">' . 
    htmlspecialchars($row['pat_id']) . '</td><td align="left">' . 
    htmlspecialchars($row['consultancyFees']) . '</td><td align="left">' . 
    htmlspecialchars($row['appointmentDate']) . '</td><td align="left">' . 
    htmlspecialchars($row['appointmentTime']). '</td><td align="left">' . 
    htmlspecialchars($row['postingDate']) . '</td><td align="left">' ;
    echo '</tr>' ; 


echo '</tr>';
}

echo '</table></div><br>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);




?>

</div>

<br><br><br>
    <div class="row container m-auto" >
        <form action="/isaa/addappointment.php">
            <button class="btn btn-primary mx-2  mt-5">Add Appoinment</button>
        </form>
        <form action="welcome.php">
            <button class="btn btn-primary  mt-5">Go to home page</button>
        </form>
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