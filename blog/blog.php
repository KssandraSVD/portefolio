
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style.css">

    <title>Blog</title>
</head>
<body>
    <div class="container-fluid">
        <!--navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#"><i class="bi bi-code"></i>Kssandra<i class="bi bi-code-slash"></i></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://www.cassandra-svd.fr">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#contact-form">Contact</a>
                  </li>
            </div>
          </nav>

          <!--header-->
        <header class="row mb-5 ">
            <h1 class="mb-5 text-center">Blog</h1>
            <p class="text-center">Bonjour et bienvenue sur mon blog pour les développeurs.
               <br><br>Vous y trouverez des articles complets sur différents sujet.
               <br><br>Amis de l'informatique, bonne lecture à vous &#x1F60A;</p>
        </header>

        

        <!--articles-->
              
                <?php
                require 'database.php';
                $db = Database::connect();
                $statement = $db->query('SELECT article.id, article.title, article.intro, article.img FROM article ORDER BY article.id DESC');
                while($article = $statement->fetch())
                {
                  echo '<div class="row  m-lg-5">';
                  echo '<div class="card">';
                  echo '<img class="pt-3 m-5 m-lg-auto" src="img/' . $article['img'] . '" class="card-img-top"/>';
                  echo '<div class="card-body">';
                  echo '<h5 class="card-title">' . $article['title'] . '</h5>';
                  echo '<p class="card-text">' . $article['intro'] . '</p>';
                  echo '<a class="btn btn-danger" href="article.php?id='.$article['id'].'">Lire la suite</a>';
                  echo '</div>';
                  echo '</div>';
                  echo '</div>';
                }
                Database::disconnect();
                ?>

         <!--inserer un commentaire-->
         
         <?php
            // require 'database.php';
            $name = $message = $nameError = $messageError = "";

            if(!empty($_POST)){
            $name     = checkInput($_POST['name']);
            $message  = checkInput($_POST['message']);
            $isSucces = true;


            if($isSuccess = true) {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO commentaire (name,message) values(?, ?)");
            $statement->execute(array($name,$message));
            Database::disconnect();
            // header("Location: addcom.php");
            }
            }  
            function checkInput($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }    
            ?> 

        <div class="row mb-3" id="contact-form1">
            <h2 class="mb-5 mt-5 text-center text-white">Laisser un commentaire</h2>

            <div class="col m-3  d-flex justify-content-center">
              <form method="post" action="" role="form">
              
              <div class="form-group text-center">
                <label for="nom">Nom</label>
                <input required="required" type="text" name="name" class="form-control" id="name">
              </div>

              <div class="form-group text-center">
                <label for="textarea">Message</label>
                <input  required="required" type="textarea" name="message" class="form-control" id="message">
              </div>

              <button type="submit" class="btn btn-secondary mt-3">Commenter</button>
            </form>
          </div>
        </div>   

        <!--affichage comms-->  
        
        <?php
        // require 'database.php';
        // $db = Database::connect();
        $statement = $db->query('SELECT commentaire.name, commentaire.message FROM commentaire');
        while($commentaire = $statement->fetch())
        {
            echo'<div class="commentaires m-5">';
            echo '<h5>' . $commentaire['name'] . '</h5>';
            echo '<p>' . $commentaire['message'] . '</p>';
            echo '</div>';
        }
        Database::disconnect();
    ?>

        <!-- <div class="commentaires">
          <p>commentaires</p>
        </div>
      </div> -->
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
</body>
</html>