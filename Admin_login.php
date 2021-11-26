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
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
        //$active = $row['active'];
        $count = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row


        // if($count == 1) {

        //     echo "$username";

        //     // $_SESSION['login']=$username;
        //     $_SESSION['login']="loggedin";
            
        //     // $host=$_SERVER['HTTP_HOST'];
        //     // $uip=$_SERVER['REMOTE_ADDR'];
        //     // $status=1;
        //     // $extra="welcome.php";//
        //     // $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        //     // header("location:http://$host$uri/$extra");
        //     // exit();



        // // $_SESSION["myusername"]=$username;
        // // $_SESSION['login_user'] = $username;


        // header("location: doctoradd.php");
        // // header("location: welcome.php");



        // }else {
        // $error = "Your Login Name or Password is invalid<br><br>";
        // echo $error;
        // }
// ------------------------------------------------
if($count == 1) 
    {
    $extra="welcome.php";//

    session_start();


    $_SESSION['login']="loggedin";
    $_SESSION['id']=$row['id'];
    // print_r($_SESSION);
    // echo "Session variables are set.";
    $host=$_SERVER['HTTP_HOST'];
    $uip=$_SERVER['REMOTE_ADDR'];
    $status=1;
    $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
    }
    else
    {


        echo "Invalid username or password";
        // For stroing log if user login unsuccessfull
    // $_SESSION['login']="";

    // $uip=$_SERVER['REMOTE_ADDR'];
    // $status=0;

    // $_SESSION['errmsg']="Invalid username or password";
    // $extra="admin.html";
    // $host  = $_SERVER['HTTP_HOST'];
    // $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    // header("location:http://$host$uri/$extra");
    // exit();
    }
// ------------------------------------------------






    }


    
    
}
mysqli_close($conn);
?>
