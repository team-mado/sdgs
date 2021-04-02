<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="css/registration.css" />
  </head>
  <body>
    <main>
      <button class="simple_square_btn1" id="title-bt">新規登録</button>
<div class="form-box">

      <form action="registration_add.php" method="post" class="row">
        <label for="company">社名</label><br>
        <input class="form-style" id="GET-name" type="text" name="company_name"  value="test"/>
      
      <br />
      
        <label for="GET-name">E-mail</label><br>
        <input class="form-style" id="GET-name" type="text" name="email" value="" />
      
      <br />

            
        <label for="GET-name">パスワード</label><br>
        <input class="form-style" id="GET-name" type="text" name="password" value=""/>
      
      <br />

            
        <label for="GET-name">担当名</label><br>
        <input class="form-style" id="GET-name" type="text" name="staff" value="たかどなおあき"/>
      
      <br />
      
        <label for="GET-name">所在地</label><br>
        <input class="form-style" id="GET-name" type="text" name="location" value="テスト" />
      
      <br />
      
        <label for="GET-name">事業内容</label><br>
        <input class="form-style" id="GET-name" type="text" name="businesscontent" value="テスト"/>
      
      <br />
      
        <label for="GET-name">分野</label><br>
        <input class="form-style" id="GET-name" type="text" name="field" value="テスト" />
      
      <br />
      
        <label for="GET-name">資本金</label><br>
        <input class="form-style" id="GET-name" type="text" name="capital" value="テスト" />
      
      <br />
      
        <label for="GET-name">社員数</label><br>
        <input class="form-style" id="GET-name" type="text" name="number_of_employees" value="テスト" />
  </div>    
      <br>
      <div class="center">
      <button class="simple_square_btn1">
        <input type="submit" value="" /><a href="registration_add.php">送信する</a></input>
      </button>
      </div>
</input>
      </form>
    </main>
  </body>
</html>
