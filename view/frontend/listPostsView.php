<?php $title = 'Jean Forteroche'; 
require_once('secureForm.php');?>
<?php ob_start(); ?>
<img src="../../public/images/alaska.peg">
<h1>Jean Forteroche</h1>
<div class="title"><p>Billet simple pour l'Alaska</p></div>
<div class="container"> 
    <div class="col-md-8 col-xs-4 col-lg-12">
        <div class="row">
<?php
        while ($data = $posts->fetch())
        {

        ?>
            <div class="news">
            <h3>
            <?= secureForm($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
                        </h3>
                            <p>
                                <?= nl2br(secureForm($data['chapter'])) .' [...]'?>
                                <br />
                                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><button>Lire la suite</button></a>
                            </p>
                        </div>
<?php  
}

$posts->closeCursor();
?></div></div></div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php');
require('footer.php') ;?>
<!DOCTYPE html>
<html>
        <head>
          <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
          <script>tinymce.init({ selector:'textarea' });</script>
        </head>
    <body>
           <?php 
            require_once('secureForm.php');
            $title = secureForm($post['title']); ?>
            <?php ob_start(); ?> 
                <img src="../../public/images/alaska.jpeg">
                <h1>Billet simple pour l'Alaska</h1>
            <?php $content = ob_get_clean();
                require_once('template.php');
            ?>
        <form action="/update.php" method="post">
                <textarea cols="20"><?= secureForm($post['title']) ?></textarea>
                <textarea rows="30" cols="1200"><?= nl2br(secureForm($post['content'])) ?></textarea>
                <input type="submit" value="Publier">
                <?= $_GET['id'] ?>
        </form>
    </body>
    <footer>
    
    </footer>   
</html>