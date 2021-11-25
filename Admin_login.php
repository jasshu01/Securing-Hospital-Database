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
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $sql="SELECT id FROM admin WHERE Username = ? and Password = ?";
    
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        echo "SQL statement failed";
    }else {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        // echo "SELECT id FROM admin WHERE Username = '$username' and Password = '';Drop table users;#';";
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count == 1) {
        $_SESSION["myusername"]=$username;
        $_SESSION['login_user'] = $username;
        header("location: welcome.php");
        }else {
        $error = "Your Login Name or Password is invalid<br><br>";
        echo $error;
        }
    }

    
}
mysqli_close($conn);
?>