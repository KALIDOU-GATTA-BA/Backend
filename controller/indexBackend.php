<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link href="styleBackend.css" rel="stylesheet" /> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header>
            <img src="../public/images/alaska1.png">
            <a href='principale.php?deconnexion=true'><span class="dec"><button type="button" class="btn btn-danger">Déconnexion</button></span></a><br> <br> <br>
            <a href="adChapter.php"><em><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon">&#xe127;</span> Ajouter un  chapitre</button></em></a>
        </header><br>
    
        <div class="container">
            <div class="jumbotron">GESTION DES CHAPITRES </div>
                <?php                                                     
                $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                $posts= $db->query('SELECT title, id from posts');
                while ($data = $posts->fetch())
                {
                ?>
                <div class="row">
                    <h3>
                        <table style="width:100%">
                            <tr>
                                <th><?= htmlspecialchars($data['title']) ?></th>                       
                    </h3>
                                    <p>     
                                                <th colspan="2">                   
                                                    <a href="../index.php?action=post&amp;id=<?= $data['id'] ?>"><button>Modifier</button></a>   
                                                </th> 
                                        <th colspan="2"> 
                                            <button><a href="delete.php">Supprimer</a></buttton>
                                        </th><br><br>
                                    </p>
                            </tr>  
                        </table></div>
                    <?php
                    }
                    $posts->closeCursor();
                    ?>
                    <br><br><br><br><br><br>
                    <div class="jumbotron">GESTION DES COMMENTAIRES</div>
                </div>
                <div class="container">
                    <div class="panel-group">
                        <div class="panel panel-success">
                                <div class="panel-heading">
                                    <a href="notRead.php">Commentaires non lus</a> 
                                    <a href="">
                                    <?php  
                                    try{
                                             $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root');
                                             $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                            }
                                           catch (PDOException $e){
                                                          echo 'Echec de la connexion : ' .$e->getMessage();
                                            }
                                            $requ=$bdd->query('SELECT comment from comments ');
                                            
                                            while ($com=$requ->fetch())
                                            {
                                               print_r( ( $com['comment']));
                                            }
                                            ?></a>
                                </div>
                        </div></br></br>
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <a href="signalComment.php">Commentaires signalés</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body> <br><br><br><br>
    <footer>
        <?php require_once("../view/frontend/footer.php");?>
    </footer>
</html>