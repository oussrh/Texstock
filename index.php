<?php
session_start();
if (isset($_SESSION['userPrev'])) {
header('location:homepage.php');
}
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Texstock portail</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



      <link rel="stylesheet" href="src/css/login.css">


</head>

<body>

    <div id="testrect">
      <img src="src/img/logo_avec_sl.png" class="logo_index"/>
      <form name='loginForm' method="post" action="users_query/chk_login_query.php">

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="email" type="text" class="form-control" name="user" id="user" placeholder="Username">
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="email" type="password" class="form-control" name="pass" id"pass" placeholder="Password">
        </div>

          <button type="submit" class="btn btn-default loginBt">LOGIN</button>

        </form>
        <?php
        if (isset($_SESSION['error']))
          {
            echo "<p class='error_msg'>".$_SESSION['error']['false']."</p>";
          }
        ?>

    </div>

    <p class="copyright">Copyright © 2017 TexStock By Nelogy solution</p>

</body>
</html>
