<!DOCTYPE html>
<html>
        <head>
          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
          <script>tinymce.init({ selector:'textarea' });</script>
          <link href="../../controller/styleBackend.css" rel="stylesheet" /> 

        </head>
        <body> 
        <div class="col-xs-12 col-sm-12 col-lg-12">
              <?php 
                    require_once('secureForm.php');
                    $title = secureForm($post['title']); ?>
                    <?php ob_start(); ?> 
                    <img src="../../public/images/alaska.jpeg">
                    <h1>Billet simple pour l'Alaska</h1>
                    <?php $content = ob_get_clean();
                    require_once('template.php');
              ?>
              <form action="controller/update.php" method="post">
                <div class="container">
                  <input type="text" rows="2" cols="2" name="tempChapterTitle" value="<?= secureForm($post['title']) ?>"><br><br>
                        <div class="form-group">
                          <textarea class="form-control" rows="25" id="comment" name="tempChapterContent">
                            <?= nl2br(secureForm($post['content'])) ?>
                          </textarea>
                        </div>
                       <input  type="submit" value="Publier" style="display: inline-block;padding: 15px 25px;font-size: 24px;cursor: pointer;text-align: center;text-decoration: none;outline: none;color: #fff;background-color:blue;border: none;border-radius: 15px;box-shadow: 0 9px #999;" />     
                </div>
              </form>
              <?php    
                  try{
                     $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root');
                     $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }
                   catch (PDOException $e){
                                  echo 'Echec de la connexion : ' .$e->getMessage();
                    }
                    $req = $bdd->prepare('INSERT INTO temporaryStorage(tempId) VALUES(:id)');
                    $req->execute(array(
                    'id' => $_GET['id']
                    ));       
              ?>
        </body> 
      </div><br>
        <footer>
        <?php require_once("footer.php");?>
    </footer>   
</html>