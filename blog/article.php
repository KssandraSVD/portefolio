<?php
    
     require 'database.php';
 
     if(!empty($_GET['id'])) {
         $id = checkInput($_GET['id']);
     }
      
     $db = Database::connect();
     $statement = $db->prepare("SELECT article.id, article.title, article.img, article.paragraphe FROM article WHERE article.id = ?");
     $statement->execute(array($id));
     $article = $statement->fetch();
     Database::disconnect();
 
     function checkInput($data) {
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
     }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://www.cassandra-svd.fr"><i class="bi bi-code"></i>Kssandra<i class="bi bi-code-slash"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.cassandra-svd.fr">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact-form">Contact</a>
            </li>
        </form>
        </div>
    </nav>
    
      <!-- affichage articles blog   -->

      

        <div class="row mt-5 d-flex justify-content-center">
        <h1 class="text-center m-5 text-white"><?php echo ' '.$article['title'];?> </h1>
        <div class="text-center">
        <?php echo '<img src=img/'.$article['img'].'>';?>
        </div>
        <p class="text-center mt-5 p-5 bg-light"> <?php echo ' '.$article['paragraphe'];?></p>
        </div>
        
     
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>     
</body>
</html>