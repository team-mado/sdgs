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
$sql = "SELECT * FROM ogp_table2 where id = :id";
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
  $clients_id= $post["clients_id"];
  $img = $post["img"];
  $color_check = $post["color_check"];
  $project_title = $post["project_title"];
  $job_category = $post["job_category"];
  $project_overview = $post["project_overview "];
  $project_detail = $post["project_detail"];
  $production_period = $post["production_period"];
  $remote_availability = $post["remote_availability"];

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
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" href="css/component.css" />
  <link rel="stylesheet" href="css/ogp_creation.css" />
</head>

<body>
  <header>
    <div class="header">
      <div><a href="index.html"><img class="home-logo" src="img/home-logo.png" alt="" /></a></div>
    </div>
  </header>
  <main>
    <div class="gray-box">
    <img class="ogp-img" src="<? echo($img) ?>" alt="">
      <!-- <p>
        下記のフォームを全て入力いただくと<br />
        こちらの枠内に自動でバナーが生成されます
      </p> -->
    </div>
    <p>このプロジェクトに該当するSDGｓ項目を選んでください ※複数選択可</p>

    <div class="checkbox-center">
      <div>
        <form action="ogp_update_act2.php?id=<? echo($id) ?>" method="post">
          <ul>
            <li><img src="img/1.png" alt="">
              <div><input type="checkbox" name="color_check" value="1" checked="checked"> 貧困をなくそう</div>
            </li>
            <li><img src="img/2.png" alt="">
              <div><input type="checkbox" name="color_check" value="2"> 飢餓をゼロに</div>
            </li>
            <li><img src="img/3.png" alt="">
              <div><input type="checkbox" name="color_check" value="3"> 全ての人に健康と福祉を</div>
            </li>
            <li><img src="img/4.png" alt="">
              <div><input type="checkbox" name="color_check" value="4"> 質の高い教育をみんなに</div>
            </li>
            <li><img src="img/5.png" alt="">
              <div><input type="checkbox" name="color_check" value="5"> ジェンダー平等を実現しよう</div>
            </li>
            <li><img src="img/6.png" alt="">
              <div><input type="checkbox" name="color_check" value="6"> 安全な水とトイレを世界中に</div>
            </li>
            <li><img src="img/7.png" alt="">
              <div><input type="checkbox" name="color_check" value="7"> エネルギーをみんなにそしてクリーンに</div>
            </li>
            <li><img src="img/8.png" alt="">
              <div><input type="checkbox" name="color_check" value="8"> 働きがいも経済成長も</div>
            </li>
            <li><img src="img/9.png" alt="">
              <div><input type="checkbox" name="color_check" value="9"> 産業と技術革新の基盤をつくろう</div>
            </li>

            <li><img src="img/10.png" alt="">
              <div><input type="checkbox" name="color_check" value="10"> 人や国の不平等をなくそう</div>
            </li>
            <li><img src="img/11.png" alt="">
              <div><input type="checkbox" name="color_check" value="11"> 住み続けられる街づくりを</div>
            </li>
            <li><img src="img/12.png" alt="">
              <div><input type="checkbox" name="color_check" value="12"> つくる責任つかう責任</div>
            </li>
            <li><img src="img/13.png" alt="">
              <div><input type="checkbox" name="color_check" value="12"> 機構変動に具体的な対策を</div>
            </li>
            <li><img src="img/14.png" alt="">
              <div><input type="checkbox" name="color_check" value="13"> 海の豊かさを守ろう</div>
            </li>
            <li><img src="img/15.png" alt="">
              <div><input type="checkbox" name="color_check" value="14"> 陸の豊かさも守ろう</div>
            </li>
            <li><img src="img/16.png" alt="">
              <div><input type="checkbox" name="color_check" value="15"> 平和と公正を全ての人に</div>
            </li>
            <li><img src="img/17.png" alt="">
              <div><input type="checkbox" name="color_check" value="16"> パートナーシップで目標を達成しよう</div>
            </li>
            <!-- <li><img src="img/18.png" alt=""><div><input type="checkbox" name="riyu" value="1" checked="checked"> 貧困をなくそう</div></li> -->
          </ul>
        </div>
      </div>
      
      <div class="form-box">
        <form action="ogp_act_act22.php" method="post" class="row">
          <label for="GET-name">プロジェクトタイトル（最大40文字）</label><br>
          <input class="form-style" id="GET-name" type="text" maxlength="40"  name="project_title" value="海洋ゴミを洋服に変える。FASHIONxSEAプロジェクト" />
          
          <label for="GET-name">職種（最大5つ）</label><br>
          <input type="checkbox" name="job_category" value="1" checked="checked"> グラフィック  　
          <input type="checkbox" name="job_category" value="2"> WEB  　
          <input type="checkbox" name="job_category" value="3"> UI  　
          <input type="checkbox" name="job_category" value="4"> UX  　<br>
          <input type="checkbox" name="job_category" value="5"> DX  　
          <input type="checkbox" name="job_category" value="6"> DTP  　
          <input type="checkbox" name="job_category" value="7"> プロダクト  　<br>
          <input type="checkbox" name="job_category" value="8"> パッケージ  　
          <input type="checkbox" name="job_category" value="9"> ファッション  　
          <input type="checkbox" name="job_category" value="10"> 映像  　<br>  
          <br>
          <label for="GET-name">プロジェクト概要（最大50文字）</label><br>
          <input class="form-style" id="GET-name" type="text" maxlength="40" name="project_overview" value="海のゴミから布を作り、洋服へ。魔法のようなプロジェクトを創り出すデザイン集団求む" />
          
          <label for="GET-name">プロジェクト詳細（最大230文字）</label><br>
          <input class="form-syosai" id="GET-name" type="text" maxlength="230"  name="project_detail" value="海洋ゴミから布を作り、洋服へ。魔法のようなプロジェクト。アプリのUIデザイン、パンフ作成、商品用パッケージや、洋服のデザインデザインを行うデザイナーを募集しています。今、話題のSDG`sの" />
          
          <label for="GET-name">制作期間</label><br>
          <input class="form-style" id="GET-name" type="text" name="production_period" value="5月中旬まで" />
          
          <label for="GET-name">
            <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート可" checked /> リモート可　
            <input class="form" id="GET-name" type="radio" name="remote_availability" value="リモート不可" /> 不可</label><br>
            <br>
            <div class="center">
            <a href="ogp_delite2.php?id=<?= $id ?>">削除する</a>
            <button class="simple_square_btn1">
            <input type="submit" value="" />更新する</input>
            </button>
            </a>
              </div>
              <br>
              <br>
            </input>
          </form>
        </main>
      </body>
      
</html>