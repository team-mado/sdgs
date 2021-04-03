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
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DESIGN UP! SDGs</title>
  <!-- オリジナルcomponent.CSS -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
  <link rel="stylesheet" href="css/component.css" />
  <!-- リセットCSS -->
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <!-- モーダル用CSS -->
  <!-- <link rel="stylesheet" href="css/modal.css" /> -->
  <!-- Googleフォント -->
  <!-- Fon Awesome読込み -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />

</head>

<body>
  <main>
    <div class="gray-box">
      <br />
      <img class="top-logo" src="img/logo-.png" alt="" />
    </div>
    <br />








    <div class="button-box">

      <div>
        <br>
        <p class="error"><?= $error ?></p>
        <h2>
          SDGsの取り組みをSNSから広く告知！<br />
          プロジェクトを担当するデザイナーを<br />
          SNSで拡散募集できる<br />
          SDGｓプロジェクト広報支援サービス
        </h2><br>


        <!-- モーダルここから -->
        <section id="modalArea" class="modalArea">
          <div id="modalBg" class="modalBg"></div>
          <div class="modalWrapper">
            <div class="modalContents">
              <br>
              <h1>LOGIN</h1><br>
              <div class="form-box">
                <form action="" method="post" class="row">
                  <label for="GET-name">E-MAIL</label><br>
                  <input type="text" class="form-style" id="GET-name" name="email" value="" required>
                  <label for="GET-name">PASSWORD</label><br>
                  <input type="text" class="form-style" id="GET-name" name="password" value="" required>
                  <!-- <input class="form-style" id="GET-name" type="text" name="text" /> -->
                  <!-- <label for="GET-name">E-MAIL</label><br> -->
                  <!-- <label for="GET-name">PASSWORD</label><br> -->
                  <!-- <input class="form-style" id="GET-name" type="text" name="password" /> -->
                  <!-- <br><br> -->
                  <div class="center">
                    <button class="simple_square_btn1">送信する</button></div><br />
                </form><br>

              </div>
              <div id="closeModal" class="closeModal">
                ×
              </div>
            </div>
        </section>
        <!-- モーダルここまで -->


        <!-- idでモーダル実装 -->
        <button id="openModal" class="simple_square_btn1">ログイン</button>
        <br />
        <a href="registration.php"><button class="simple_square_btn1">新規登録</button></a><br /><br />
        <p class="pw-text">PWをお忘れの方は<a href="">こちら</a>から</p>
        <br />


      </div>
      <br />
  </main>

  <!-- ↓body閉じタグ直前でjQueryを読み込む -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- 自作js -->
  <script type="text/javascript" src="js/pop-up.js"></script>
</body>

</html>