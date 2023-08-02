<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
<h1>Optimisation de l'utilisation du modèle MVC</h1>
    <p>
      Twig est un moteur de template de vue une syntaxe simple et expressive, vous pouvez générer du code HTML , XML ou tout autre format de sortie.
      En utilisant Twig, vous pouvez créer facilement des modeles de vue réutilisables, ce qui rend votre code plus facile à aminteniret à mettre à jour.
      Twig inclut de nembreuses fonctionnalités avancées telles que l'héritagede modèle, la composition de modèle, les blocs, les filtres , les ofnctrions, les itérateurs
      , les conditions, les boucles et les expréssionsrégulières. Il vous permet également d'ajouter des extensions personnalisées pour étendre ses fonctionnalitées de base. En utilisant Twig avec le modèle de concéption MVC,vous pouvez rendre votre code plus modulaire et facile à maintenir.
       Twig est largement utilisé dans de nombreux frameworks PHP populaires , tels symfony, laravel et Yii.
    </p>

    <h2> Comment utiliser "Twig"?</h2>
    * commençons par créer une page "index.php" pour pouvoir afficher du HTML...et de pouvoir afficher des page en utilisant des drapeaux (?q=) = la méthode "GET" exemple :
    si je veux afficher la page contact, j'écris : localhost:8080/?q=contact
    si je veux afficher la page home , j'écris :  localhost:8080/?q=home
    Alors pour que tous ca fonctionne on doit ecrire le code nous permettant cet affichage.


    <?php
$page = 'home';
if(isset($_GET['p'])) {
  $page = $_GET['p'];
}

  if($page === 'home') {
    require 'home.php';// dans cette page on va pouvoir afficher un template html php... en utilisant 'twig'. pour ca il faut installer twug avec composer.
  }
?>
    Pour installer twig , deux manière s'offrent a nous :
    # installer twig manuellement et ensuite l'inclure 
    # Soit utiliser composer ' composer require "twig/twig:1.0" ' vue que maintenant est indispensable pour php.

  <h3>INSTALLER COMPOSER</h3>
     sur un terminal, on initialise composer avec la commande "composer init"
    après on néglige les dépendences interactives avec 'no' pourles laisser par defaut, 
  </body>
</html>