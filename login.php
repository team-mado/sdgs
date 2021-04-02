<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');




if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = connect_to_db();
    $sql = 'SELECT * FROM clients_table WHERE email=:email AND password=:password';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $status = $stmt->execute();

    if ($status == false) {

        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        $val = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$val) {
            $error = "入力内容が間違っています。";
        } else {
            $_SESSION = array();
            $_SESSION["session_id"] = session_id();
            $_SESSION["id"] = $val["id"];
            $_SESSION["staff"] = $val["staff"];
            $_SESSION["email"] = $val["email"];
            header('Location:project_list2.php');
        }
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css" />
    <title>ログイン画面</title>
</head>

<body>
    <h1>LOGIN</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Email:</p><input type="text" name="email" value="" required>
        <p>password:</p><input type="password" name="password" value="" required>
        <p><input type="submit" value="ログイン" id=""></p>
        <p class="error"><?= $error ?></p>
        <a href="registration.php">新規会員登録はこちら</a>
    </form>
</body>

</html>