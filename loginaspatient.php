<?php

require 'connected.php';
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     echo $id;

//     $sql = "select * from user where id=" . $id;
//     $op =  mysqli_query($connect, $sql);
//     //   mysqli_num_rows($op);
//     if (mysqli_num_rows($op) == 0) {
//         echo "error";
//     } else {
//         echo "eghghhgr";
//         $data = mysqli_fetch_assoc($op);
//     }
// } else {
//     echo "gffggf";
//     header("Location: showalluser.php");
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "class1.php";
    $obj = new class1;
    $p = md5(test_input($_POST['password']));
    $obj->setpassword($p);
    $nid = strip_tags(htmlspecialchars(trim($_POST['nationalid'])));
    $obj->setnationalid($nid);
    $password = $obj->getpassword();
    $nationalid = $obj->getnationalid();
    echo $password."<br>";
    if (empty($password) || empty($nationalid)) {
        echo "Please complete your details";
    } else {
        echo "Please complete your details";
        $sql  = "select * from patient where national-id='$nationalid' and password='" . md5($password) . "'";
        $op = mysqli_query($connect, $sql);
        $data = mysqli_fetch_assoc($op);
        if (mysqli_num_rows($op) == 1) {
            echo 'Logged in succefully';
            echo $data['name'];
    
            $_SESSION['id'] = $data['id'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['nationalid'] = $data['national-id'];
            $_SESSION['password'] = $data['$password'];
            echo $_SESSION['name'] . '<br>' . $_SESSION['email'];
        } else {
            echo 'Invalid email or password';
            
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <section class="container mt-3">
        <h2 class="m-3"> login for patient</h2>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">National ID</label>
                <input type="number" class="form-control" name="nationalid">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary con" name="login">login</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>