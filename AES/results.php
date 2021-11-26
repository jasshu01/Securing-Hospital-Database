<?php
   require 'aes.class.php';     // AES PHP implementation
   require 'aesctr.class.php';  // AES Counter Mode implementation

    // get encrypted form data
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // decrypt encrypted data
    
    // display result before decrypting
    echo 'encrypted name : <strong>' . $name . '</strong><br><br>';
    echo 'encrypted email : <strong>' . $email . '</strong><br><br>';
    echo 'encrypted password : <strong>' . $password . '</strong><br><br><br>';
    $nameDecrypted = AesCtr::decrypt($name, 'L0ck it up saf3', 256);
    $emailDecrypted = AesCtr::decrypt($email, 'L0ck it up saf3', 256);
    $passwordDecrypted= AesCtr::decrypt($password, 'L0ck it up saf3', 256);

    // display result after decrypting
    echo 'decrypted name : <strong>' . $nameDecrypted . '</strong><br><br>';
    echo 'decrypted email : <strong>' . $emailDecrypted . '</strong><br><br>';
    echo 'decrypted password : <strong>' . $passwordDecrypted . '</strong><br><br>';
?>