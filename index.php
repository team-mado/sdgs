
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
        <link rel="stylesheet" href="css/modal.css" />
    <!-- Googleフォント -->
    <!-- Fon Awesome読込み -->
    <link
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      rel="stylesheet"
    />

  </head>
  <body>
    <main>
      <div class="gray-box">
        <br />
        <img class="top-logo" src="img/logo-.png" alt="" />
      </div>
      <br />

<div class="button-box">
<a href="login.php"><input type="submit" value="ログイン" class="simple_square_btn1"></input></a>
        <br />
        <a href="registration.php"><button class="simple_square_btn1">新規登録</button></a
        ><br /><br />
        <p class="pw-text">PWをお忘れの方は<a href="">こちら</a>から</p>
        <br />

        <h2>
          SDGsの取り組みをSNSから広く告知！<br />
          プロジェクトを担当するデザイナーを<br />
          SNSで拡散募集できる<br />
          SDGｓプロジェクト広報支援サービス
        </h2>
      </div>
      <br />

      <img class="all-logo" src="img/sdgs-all.png" alt="" />
    </main>

<!-- <div id="ex1" class="modal">
  <p>Thanks for clicking. That felt good.</p>
  <a href="#" rel="modal:close">Close</a>
</div> -->
 

<!-- モーダルウィンドウCSSのみ -->
<section class="myModal">
  <input id="myModal_open" type="radio" name="myModal_switch" />
  <label for="myModal_open">開く</label>
  <input id="myModal_close-overlay" type="radio" name="myModal_switch" />
  <label for="myModal_close-overlay">オーバーレイで閉じる</label>
  <input id="myModal_close-button" type="radio" name="myModal_switch" />
  <label for="myModal_close-button"></label>
  <div class="myModal_popUp">
  <div class="myModal_popUp-content">
    <p>本文</p>
  </div>
 </div>
</section>
<!-- モーダルここまで -->




<!-- Link to open the modal -->
<!-- <p><a href="#ex1" rel="modal:open">Open Modal</a></p> -->


       <!-- ここから下、モーダル用のHTML -->
    <!--id 名でボタンと紐づけ -->
<!-- モーダル -->
<!-- <div id="ex1" class="modal"></div> -->
<!-- ここまで -->
    <!-- <div class="modal-wrapper">
       <a href="#!" class="modal-overlay"></a>
  <div class="modal-window">
    <div class="modal-content"> -->
      <!-- ここまでコピペ -->
      <!-- <h2>LOGIN</h2>
      <div class="form-box">

      <form action="" method="post" class="row">
        <label for="GET-name">資本金</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" />
      
      <br />
      
        <label for="GET-name">社員数</label><br>
        <input class="form-style" id="GET-name" type="text" name="name" />
  </div>    
      <br>
      <div class="center">
      <button class="simple_square_btn1">
        <input type="submit" value="" /><a href="#" rel="modal:close">送信する</a></input>
      </button>
      </div> -->
      <!-- ここからコピペ -->
          <!-- </div>
    <a href="#!" class="modal-close">×</a>
  </div> -->
  <!-- ここまで -->
<!-- </input>
      </form>
    </section>
    </div> -->

<!-- ここまでモーダル -->


<!-- JQuery用のリンク -->
<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  </body>
</html>
