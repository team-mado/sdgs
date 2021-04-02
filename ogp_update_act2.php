<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("functions.php");
check_session_id();

// 送信データ受け取り
$id = $_GET["id"];
$clients_id = $_SESSION["id"];



$color_check = $_POST["color_check"];
$project_title = $_POST["project_title"];
$job_category = $_POST["job_category"];
$project_overview = $_POST["project_overview"];
$project_detail = $_POST["project_detail"];
$production_period = $_POST["production_period"];
$remote_availability = $_POST["remote_availability"];

// var_dump($_POST);
// exit;


// $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
// $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/v1616468990/sample.jpg";
$v1 = 'https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_20_bold:';
$img_in1 = $project_overview;
$img_in2 = $job_category;
$img_in3 = $project_detail;
$img_in4 = $production_detail;
$v3 = ',co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png';
$img = $v1.$img_in1."%0A%0A"."デザイナー募集"."%0A".$img_in2."%0A%0A".$img_in3."%0A".$img_in4.$v3;



// DB接続
$pdo = connect_to_db();

// UPDATE文を作成&実行
$sql = "UPDATE ogp_table2 SET clients_id=:clients_id, img=:img, color_check=:color_check, project_title=:project_title, job_category=:job_category, project_overview=:project_overview, project_detail=:project_detail ,production_period=:production_period, remote_availability=:remote_availability WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':clients_id', $clients_id, PDO::PARAM_INT);
$stmt->bindValue(':img', $img, PDO::PARAM_STR);
$stmt->bindValue(':color_check', $color_check, PDO::PARAM_INT);
$stmt->bindValue(':project_title', $project_title, PDO::PARAM_STR);
$stmt->bindValue(':job_category', $job_category, PDO::PARAM_STR);
$stmt->bindValue(':project_overview', $project_overview, PDO::PARAM_STR);
$stmt->bindValue(':project_detail', $project_detail, PDO::PARAM_INT);
$stmt->bindValue(':production_period', $production_period, PDO::PARAM_STR);
$stmt->bindValue(':remote_availability', $remote_availability, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
  // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
  header("Location:ogp_check2.php?id=$id");

}


?>









<!-- 
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DESIGN UP! SDGs</title>

    <!-- リセットCSS -->
    <link href="https://unpkg.com/ress/dist/ress.min.css" rel="stylesheet" />
    <!-- Googleフォント -->
    <!-- Fon Awesome読込み -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />
    <!-- オリジナルcomponent.CSS -->
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="css/ogp_creation.css" />
  </head>
  <body>
    <header>
      <div class="header">
        <div><a href="index.php"><img class="home-logo" src="img/home-logo.png" alt="" /></a></div>
      </div>
    </header>
    <main>
      <div class="gray-box">
      <img class="ogp-img" src="<? echo($img) ?>" alt="">
        <!-- <p>
          下記のフォームを全て入力いただくと<br />
          こちらの枠内に自動でバナーが生成されます -->
        </p>
      </div>
      <p>このプロジェクトに該当するSDGｓ項目を選んでください ※複数選択可</p>
      <div class="icon-box1">
        <img src="img/1-6.png" alt="" />
      </div>
        
      <div class="icon-box2">
        <img src="img/7-12.png" alt="" />
        </div>

        <div class="icon-box3">
        <img src="img/13-18.png" alt="" />
      </div>
      <br />

      <div class="form-box">
      <form action="ogp_check2.php" method="post" class="row">
        <!-- テスト用 -->

        <input type="hidden" name="img" value="<? echo($img) ?>">
         <!--  -->
        <label for="GET-name">プロジェクト概要</label><br>
        <input class="form-style" id="GET-name" type="text" name="project_overview" value="<? echo($project_overview) ?>" />
                <label for="GET-name">詳細</label><br>
        <input class="form-style" id="GET-name" type="text" name="detail" value="<? echo($detail) ?>"/>

                <label for="GET-name">制作期間</label><br>
        <input class="form-style" id="GET-name" type="text" name="production_period" value="<? echo($production_period) ?>" />
                <label for="GET-name">
                  <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート可"/> リモート可　
                  <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート不可"/> 不可</label><br>
          <br>
          <div class="center">
            <a href="ogp_delite2.php?id=<?= $id ?>">削除する</a>
            <button class="simple_square_btn1">
              <input type="submit" value="" />更新する</input>
            <!-- <a href="ogp_check2.php" class="simple_square_btn1"> -->
              </button>
            </a>
      </div>
      <br>
<br>
      </input>
        </form>
    </main>
  </body>
</html> -->
