<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');

// $clients_id = $_SESSION["id"];

// var_dump($_GET["id"]);
// exit;

// 初期画面/
if(!isset($_GET["id"])){
  $img = "https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:　,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png";
}



// OGP編集時にID取得
if(isset($_GET["id"])){
  $id = $_GET["id"];
}

// すでにOGPを作成しているときはデータが入っている状態
if(isset($_GET["id"])){

$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table where id = :id";
// var_dump($sql);
// exit;
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $post = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $post["id"];
  $img = $post["img"];
  $clients_id= $post["clients_id"];
  $project_overview = $post["project_overview"];
  $detail = $post["detail"];
  $production_period = $post["production_period"];
  $premote_availability = $post["premote_availability"];
  }
}

?>





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
      <form action="ogp_update_act.php?id=<? echo($id) ?>" method="post" class="row">
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
                  <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート可" checked="checked"/> リモート可　
                  <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート不可"/> 不可</label><br>
          <br>
          <div class="center">
            <a href="ogp_delite.php?id=<?= $id ?>">削除する</a>
      <a href="ogp_update_act.php?id=<? echo($id) ?>"><button class="simple_square_btn1">
        <input type="submit" value="" />更新する</a></input>
      </button>
      </div>
      <br>
<br>
      </input>
        </form>
    </main>
  </body>
</html>
