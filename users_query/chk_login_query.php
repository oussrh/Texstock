<?php
session_start();
$_SESSION['userPrev']=array();
$_SESSION['error']=array();

require_once('../cnx.php');

$login = $_POST['user'];
$password = $_POST['pass'];

$date = new DateTime();
$nowdate = $date->format('Y-m-d H:i:s');

$logon = $bdd->prepare('SELECT * FROM users WHERE login = :login AND pwd = :pwd');
$exe = $logon->execute(array(
'login' =>$login,
'pwd' => $password
));


if($logon->rowCount() == 1)
        {

          while ($data = $logon->fetch())
          {
            $user = $data['login'];
            $privilege = $data['privilege'];

            $req=$bdd->prepare('UPDATE users SET last_cnx = :date_cnx WHERE login = :login');
            $req->execute(array(
            'date_cnx' => $nowdate,
            'login' =>$login,
            ));

            array_push($_SESSION['userPrev'],$privilege,$user);
            unset($_SESSION['error']);
            header('location:../homepage.php');
          }

        }

else{
      $error = "login incorecte";
      unset($_SESSION['userPrev']);
      $_SESSION['error']['false'] = $error;
      header('location:../index.php');

    }

 ?>
