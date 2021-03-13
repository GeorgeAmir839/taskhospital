<?php

require 'connected.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "class1.php";
    $obj = new class1;
    $n = strip_tags(test_input($_POST['name']));
    $obj->setname($n);
    $e = strip_tags(test_input($_POST['email']));
    $obj->setemail($e);
    $p = md5(test_input($_POST['password']));
    $obj->setpassword($p);
    $nid = strip_tags(htmlspecialchars(trim($_POST['nationalid'])));
    $obj->setnationalid($nid);
    $name = $obj->getname();
    $email = $obj->getemail();
    $password = $obj->getpassword();
    $nationalid = $obj->getnationalid();
    
    if (empty($name) || empty($email) || empty($password) || empty($nationalid)) {
        echo "Please complete your details";
    } else {
        echo "12";
        // $sql  = "insert into patient (name,email,password,national-id) values ('$name','$email','$password','$nationalid') ";
        $sql  = "INSERT INTO `patient` (`id`, `name`, `email`, `password`, `national-id`) VALUES (NULL, '$name', '$email', '$password', '$nationalid')";
        $op = mysqli_query($connect, $sql);
        if ($op) {
            echo "valied Register";
            
        }
    }

    // elseif (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
    //     $nameErr = "Only letters and white space allowed";
    //     echo $nameErr;
    // }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $emailErr = "Invalid email format";
    //     echo $emailErr;
    // }
}
?>