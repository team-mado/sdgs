<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);
include('functions.php');

// var_dump($_SESSION);
// exit;

$clients_id= $_SESSION["id"];
$name = $_SESSION["staff"];

// var_dump($clients_id);
// exit;

// 全件データ表示
// ---------
$pdo = connect_to_db();
$sql = "SELECT * FROM ogp_table where clients_id =$clients_id";
$sql1 = "SELECT * ,COUNT(clients_id=$clients_id) AS project_counts FROM ogp_table where clients_id =$clients_id";

// var_dump($sql);
// exit;

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$stmt1 = $pdo->prepare($sql1);
$status1 = $stmt1->execute();

// データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);  
  
  // var_dump($project_counts);
  // exit;
//   var_dump($posts);
//   exit;
}


if ($status1 == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $posts1 = $stmt1->fetch(PDO::FETCH_ASSOC);
  $project_counts = $posts1["project_counts"];
}


?>



<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="twitter:card" content="summary_large_image" >
    <meta name="twitter:site" content="https://royal-goto-8707.lolipop.io/">
    <meta name="twitter:image" content="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:こんにちはこんにちは,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" >
    <meta name="twitter:title" content="デザインアップ！エスディージーズ" >
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
    <link rel="stylesheet" href="css/project_list.css" />
  </head>
  <body>
    <header>
      <div class="header">
        <div><img class="home-logo" src="img/home-logo.png" alt="" /></div>
      </div>
    </header>
    <main>
<p><span><?= $name ?></span>  様ありがとうございます。<br>
現在進行中のプロジェクトは<span class="project-kensu"><?= $project_counts ?></span> 件です。</p>

<?php foreach ($posts as $post) : ?>


<?php
$img = $post["img"];
$id = $post["id"];
?>

<div class="ogp-ichiran-img">
<a href="ogp_update.php?id=<?= $id ?>"><img class="ogp-img" src="<?= $img ?>" alt=""></a>
</div>

<?php endforeach; ?>

<!-- <a href="ogp_creation.php">
  <div class="ogp-ichiran-img">
    <img class="ogp-img" src="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:こんにちはこんにちは,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" alt="">
  </div> -->
  <!-- <hr color="#C4C4C4" width="100%" size="1"> -->
  <!-- <br>
</a> -->

<!-- <a href="ogp_creation.php">
  <div class="ogp-ichiran-img">
    <img class="ogp-img" src="https://res.cloudinary.com/dlqadjcsc/image/upload/l_text:Sawarabi%20Gothic_30_bold:S`G,co_rgb:333,w_500,c_fit/v1616471824/UbpRDEkE_uqbs0d.png" alt="">
  </div> -->
  <!-- <hr color="#C4C4C4" width="100%" size="1"> -->
  <!-- <br>
</a> -->

  <br>
<div class="button-box">
<!-- <a href="ogp-edit.php"><img src="img/bt-hensyu.png" alt=""></a><input type="submit" value="" /><a href="ogp-edit.php"></a>
<a href="tweet.php"><img src="img/bt-tweet.png" alt=""></a><input type="submit" value="" /><a href="tweet.php"></a></input> -->

<a href="ogp_creation2.php">新規作成</a>
<a href="logout.php">ログアウト</a>
<br>

      </div>
      <br>
<br>
      </input>
        </form>
    </main>
  </body>
</html>
