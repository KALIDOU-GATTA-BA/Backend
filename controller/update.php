<?php
    
    require_once("../model/Manager.php");
    $dbAcess=new Manager;
    $bdd=$dbAcess->dbConnect();
    $req = $bdd->query('SELECT tempId FROM temporaryStorage order by id  desc LIMIT 1');
    $data=$req->fetch();
    $t=$data['tempId'];
     
    $req = $bdd->prepare('UPDATE posts SET content = :newContent, title = :newTitle WHERE id = :iD');
    $req->execute(array(
    'newContent' => $_POST['tempChapterContent'],
    'newTitle' => $_POST['tempChapterTitle'],
    'iD' => $t
    ));

    $req=$bdd->query("DELETE FROM temporaryStorage");
    require_once("viewUpdate.php");