<?php

session_start();
//error_reporting(0);
include('config.php');
include('checklogin.php');
check_login();

?>

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

        <title>Doctors List</title>
    </head>


<body>
    <div class="container mt-3">

        <?php





// Get a connection for the database
require_once('./mysqli_connect.php');
// require_once('./admin_login.php ');

// Create a query for the database
$query = "SELECT id , specilization, doctorName, address, docFees, contactno, docEmail  FROM doctors";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed





if($response){


echo ' <div style="margin:auto"> 
<h1> Doctors Information </h1>

<table  style="border: 2px solid black;text-align:centre" align="left"
cellspacing="5" cellpadding="8">

<tr><td align="left"><b>Doctor ID</b></td>
<td align="left"><b>Doctor Specialization</b></td>
<td align="left"><b>Doctor Name</b></td>
<td align="left"><b>Doctor Address</b></td>
<td align="left"><b>Doctor Fees</b></td>
<td align="left"><b>Doctor Contact no</b></td>
<td align="left"><b>Doctor Email</b></td>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
htmlspecialchars($row['id']) . '</td><td align="left">' . 
htmlspecialchars($row['specilization']) . '</td><td align="left">' .
htmlspecialchars($row['doctorName']) . '</td><td align="left">' . 
htmlspecialchars($row['address']) . '</td><td align="left">' .
htmlspecialchars($row['docFees']) . '</td><td align="left">' . 
htmlspecialchars($row['contactno']) . '</td><td align="left">' .
htmlspecialchars($row['docEmail']) . '</td><td align="left">' ; 


echo '</tr>';
}

echo '</table></div>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);




?>
        <div class="row">
            <form action="/isaa/doctoradd.php">

                <button class="btn btn-primary mx-2  mt-5">Add Doctor</button>
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