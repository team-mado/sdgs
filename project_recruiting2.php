<?php
// session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');

$id = $_GET["id"] ;



$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table where id =$id";

// var_dump($sql);
// exit;

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();


// データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else { 
  $posts = $stmt->fetch(PDO::FETCH_ASSOC);
  $id = $posts["id"];
  $clients_id = $posts["clietns_id"];
  $img = $posts["img"];
  $project_overview = $posts["project_overview"];
  $detail = $posts["detail"];
  $production_period = $posts["production_period"];
  $remote_availability = $posts["remote_availability"];
}





?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="twitter:card" content="summary_large_image" >
    <meta name="twitter:site" content="https://square-takachiho-6372.lolipop.io/">
    <meta name="twitter:image" content="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:<?= $image_text ?>,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" >
    <!-- <meta name="twitter:image" content="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:こんにちはこんにちは,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" > -->
    <meta name="twitter:title" content="デザイナー募集" >
    <meta name="twitter:description" content="SDGsの取り組みをSNSから広く告知！プロジェクトを担当するデザイナーをSNSで拡散募集できるSDGsプロジェクト広報支援サービス" >
    <title>DESIGN UP! SDGs</title>

    <!-- リセットCSS -->
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />

    <!-- Googleフォント -->

    <!-- Fon Awesome読込み -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />
    <!-- オリジナルcomponent.CSS -->
    <link rel="stylesheet" href="css/component.css" />
    <link rel="stylesheet" href="css/project_recruiting.css" />
  </head>
  <body>
    <header>
      <div class="header">
        <div><a href="index.html"><img class="home-logo" src="img/home-logo.png" alt="" /></a></div>
      </div>
    </header>

    <main>
      <div class="ogp-box">
        <img src="<? echo($img) ?>" alt="">
         <br>
         <div>
         <p><? echo($project_overview)?></p>
         </div>
         <div>
         <div class="tab"><p><? echo($remote_availability)?></p></div>
         </div>
      </div>

      <br>
      <br>
      <p class="mini-text">プロジェクトにご興味があるデザイナーの方は<br>
      下記フォームからご応募ください</p><br>
      <br>
       <h1>デザイナー応募フォーム</h1>

      <div class="form-box">
            <form action="project_recruiting_action.php" method="post" class="row">
              <label for="GET-name">お名前</label><br>
              <input class="form-style" id="GET-name" type="text" name="designer_name" />
              <label for="GET-name">E-mail</label><br>
              <input class="form-style" id="GET-name" type="text" name="designer_email" />
              
              <label for="GET-name">作品URL</label><br>
              <input class="form-style" id="GET-name" type="text" name="portfolio" />
              
              <label for="GET-name">
                <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート可"/>リモート可　
                <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート不可"/>不可</label><br>
                <input class="" id="" type="hidden" name="ogp_id" value="<? echo($id) ?>" />
                <br>
          <div class="center">
              <button class="simple_square_btn1">
                <a href="project_recruiting_action.php">詳しい話をきく</a>
              </button>
          </div>
              <br>
              <br>
              </input>
        </form>
        </div>

    </main>
  </body>
</html>






<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="twitter:card" content="summary_large_image" >
    <meta name="twitter:site" content="https://royal-goto-8707.lolipop.io/">
    <meta name="twitter:image" content="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:海洋ゴミを洋服に変える%0AFASHIONxSEAプロジェクト%0A%0Aデザイナー募集%0AUI | DTP | Package | Fashion%0A海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団、求ム!,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" >
    <meta name="twitter:title" content="デザイナー募集" >
    <meta name="twitter:description" content="海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団、求ム!" >
    <link rel="stylesheet" href="css/project_recruiting.css">
    <title>Document</title>
</head>
<body>
<div id="ogp_area"></div>
<div id="ogp_overview">
    <p>testtesttesttesttest</p>
    <p>testtesttesttesttest</p>
    <p>testtesttesttesttest</p>
</div>
<div>
    <p>リモートOK</p>
</div>
<div>
    <p>プロジェクトに興味のあるデザイナーの方は</p>
    <p>下記のフォームからご応募ください</p>
    <h1>デザイナー応募フォーム</h1>
    <form action="" method="post" enctype="multipart/form-data">
          <p>お名前:</p><input type="text" name="name" value="">
          <p>Email:</p><input type="text" name="email" value="">
          <p>作品URL:</p><input type="password" name="password" value="" required><div>
          <button type="submit" formaction="project_thanks.php" name="">詳しい話を聞く</button>
    </form>
</div>
</body>
</html> -->