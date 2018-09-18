<?php
    session_start();
    require_once("../model/Manager.php");
    $conn = new Manager;
    $dbAcess=$conn->dbConnect();
  
        $req=$dbAcess->query('SELECT * FROM user');
        $data=$req->fetch();
        $usn=$data['username'];
        $hash=$data['password'];    
        if (password_verify($_POST['password'], $hash)&&($_POST['username'] === $usn))
                { 
                
                $_SESSION['username'] = $username;
                header('Location:indexBackend.php');
           }       
        else
            {
           echo"identifiant ou mot de passe incorrect vérifiez votre saisie!";
        }
