<?
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');




$clients_id = $_SESSION["id"];


$project_overview = $_POST["project_overview"];
$detail = $_POST["detail"];
$production_period = $_POST["production_period"];
$remote_availability = $_POST["remote_availability"];
$img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
// $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/v1616468990/sample.jpg";
$v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:';
$img_in1 = $project_overview;
$img_in2 = $detail;
$img_in3 = $production_period;
$v3 = ',co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png';
$img = $v1.$img_in1."%0A%0A".$img_in2."%0A%0A".$img_in3."%0A".$v3;



// $project_overview = $_POST["project_overview"];
// // $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
// $v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:';
// $img_in = $project_overview;
// $v3 = ',co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png';
// $img = $v1.$img_in.$v3;
// $detail = $_POST["detail"];
// $production_period = $_POST["production_period"];
// $remote_availability = $_POST["remote_availability"];


// var_dump($_SESSION["id"]);
// var_dump($clients_id);
// var_dump($img);
// var_dump($project_overview);
// var_dump($detail);
// var_dump($production_period);
// var_dump($remote_availability);
// exit;



// include('functions_.php');
$pdo = connect_to_db();



$sql = 'INSERT INTO ogp_table(id, clients_id, img, project_overview, detail, production_period, remote_availability) VALUES(NULL, :clients_id, :img, :project_overview, :detail, :production_period, :remote_availability)';
// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':project_overview', $project_overview, PDO::PARAM_STR);
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);
$stmt->bindValue(':production_period', $production_period, PDO::PARAM_STR);
$stmt->bindValue(':remote_availability', $remote_availability, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // header("Location:ogp_check.php");
  // exit();
}


// 入れたばかりのデータを持ってくる
$pdo = connect_to_db();
// $sql = "SELECT * FROM ogp_table where id ";
$sql = "SELECT * FROM ogp_table WHERE id = (SELECT MAX(id) FROM ogp_table); ";
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $posts = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $posts["id"];
  $clients_id = $posts["clients_id"];
  $img = $posts["img"];
  $project_overview = $posts["project_overview"];
  $detail = $posts["detail"];
  $production_period = $posts["production_period"];
  $remote_availability = $posts["remote_availability"];
  // var_dump($id);
  // exit;

  header("Location:ogp_check.php?id=$id");
  exit();
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>