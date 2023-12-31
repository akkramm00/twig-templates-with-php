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
require 'vendor/autoload.php';

// Routing
$page = 'home';
if(isset($_GET['p'])) {
  $page = $_GET['p'];
}


// Rendu du template
$loader = new Twig_loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader, [
          'cache' => __DIR__ . '/tmp' // initier un nouveaux environnemnt
]);
  if($page === 'home') {

    echo $twig->render('home.twig'); // indiquer le fichier a rendre.
    
   // require 'home.php';// dans cette page on va pouvoir afficher un template html php... en utilisant 'twig'. pour ca il faut installer twug avec composer.
  }
?>
    Pour installer twig , deux manière s'offrent a nous :
    # installer twig manuellement et ensuite l'inclure 
    # Soit utiliser composer ' composer require "twig/twig:~1.0" ' vue que maintenant est indispensable pour php.

  <h3>INSTALLER COMPOSER</h3>
     sur un terminal, on initialise composer avec la commande "composer init"
    après on néglige les dépendences interactives avec 'no' pourles laisser par defaut.
    l'etape suivante est de saisir la commande 'composer require "twig/twig:~1.0" ' dans le terminal pour télécharger les dépondances .

    Dans le projet ,on va inclure un autoloader  qui permet de charger les classe s de twig... (voirligne 23).
    en suivant la documentation , au niveau de "Basic API Usage", on nous explique comment utiliser Twig, pour le coté pratique ,on va choisir la deuxième option qui : (voir la ligne 'Twig_Loader_Filessystem'...)

    <h2>Utilisation de twig</h2>
    <p>
    Pour utiliser Twig dans notre application PHP, on doit tout d'abord installer le gestionnaire de paquet Composer. Après avoir installé Composer, on peut exécuter la commande "composer require twi/twig" dfans notre ternimal pour installer Twig dans notre projet.
    </p>
    <?php
    $loader = new Twig\FilesystemLoader('templates');
    $twig = new Twig\Environment($loader);
    ?>

    <p>
      La classe "Twig\Environment" est la classe principale de Twig. Elle est utilisdée pour créer une instance de l'environnement de Twig avec les configurations requises pour l'application.
      La classe "Twig\Loader\FilesystemLoader" est un hcargeurde modèles qui charge des fichiers de modèlesTwig à partir d'un repertoire sur le disque.
      Elle permet de spécifier le chemin d'accès aux modèles dans le système de fichiers et de charger les modèles nécéssaires.
 Lorsque nous céons un onbjet environnement Twig avec un chargeur de système de fichiers , le constructeur de la classe Twig\Environment prend en premier argument le chargeur de modèle que nous avons instancié.
    </p>

<?php
class HomeController {
  public function index() {
    $loader = new Twig\Loader\FilesystemLoader('templates');
    $twig = new Twig\Environment('$loader');
    $template = $twig->load('form.twig');
    echo $template->render([
      'base_url' => BASE_URL?
    ]);
  }
}
?>
<p>
  Ce code est un exemple d'utilisation de Twig dans un controleur de page d'accueil.
  dans la classe "HomeController", la methode  "index" est utilisée pour afficher la page d'accueil lorsque l'utilisateur y accède. Elle commence par instancier un objet"Twig\Loader\FilesystemLoader" qui charge les fichiers de modèle Twig à partir d'un dossierspécifié. Ensuite , un objet "Twig\Environment"
est créé à partir de ce chargeur de système de fichiers. Le modèle "form.twig" est chargé en utilisnat la méthode "load" de l'objet "Twig\Environment" correspondant.
Enfin la méthode "render" de cet objet est appelée pour générer le rendu final de la page au formay HTML. Les variables à passer au modèle Twig sont transmises sous forme de tableau associatif en argument de la méthode "render" 
  Dans cet exemple , la variablr "BASE_URL" est transmise au modèle Twig sous le nom "base_url".
  Enfin, le contenu est affichéà l'utilisateur en utilisant la commande "echo".
</p>

<?php
// form.twig
<form action="{{base_url}}/profile" method="post">
?>
  <p>
    L'attribut"action de la balise "form" définit l'URL à laquelle les données du formulairedoivent etre envoyées lorsque l'utilisateur soumet le formulaire. Ici , la valeur de l'attribut"action est définie comme "{{base_url}}/profile".
    Cette syntaxe est spécifique à Twig, elle permet d'insérer une variable Twig dans le code   HTML. La valeur réelle de cette variable sera remplacée lors du rendu de la page . En l'occurence , la variable "base_url" contiendra l'URl de la base de l'pplication. Ainsi , lorsque l'utilisateur soumettrz le formulaire , les données seront envoyées à l'URLcomplète "base_url/profile"
  </p>

  <!-- profile.twig --> 
<ul>
    <li>Email : {{ email}}</li>
</ul> 
<a href="{{base_url}}/logout" >Se connecter</a>
  <!-- Fin profile.twig -->  

    <p>
      Dans ce code HTML ci-dessus, on utilise la syntaxe Twig pour insérer dynamiquement la valeur de la variable "email" dans la liste non ordonnée. Les symbolers double "{{}}" sont utilisées pour indiquer une variable Twig. En outre , uin lien hypertexte est également créé en utilisant la balise "a". La valaeur de l'attribit "href" del, abalise "a" est définie comme "{{base_url/logout}}", ce qui signifie que lersque l'utilisateur cliquera sur le lien, il sera redirigé vers l'URL "base_url/logout"
.    </p>
     <!-- profileController.twig --> 

  <?php
  $template = $ twig-> load('p^rofile.twig');
echo $template->render([
                       'base_url' =>BASE_URL,
                       'email' => $user -> gegtEmail(),
                       
]);
  ?>
<p>
  Dans ce code , la variable "$template" est définie en chargeant le fichier de modèle Twig  "profile.twig" à l'aide de la méthode load() de l'objet $twig. 
  Ensuite , la métohde "render()" de l'objet $template est appelée avce un tableau azssociatif contenant les variables  à passer au modèle Twig. Dans cet exemple , la variablr "base_url" est définie avce la constante "BASE_URL" et la variable "email est définie avec la m"thode getEmail() de l'objket $user. Enfin , le contenu du rendu est affiché à l'utilisateur en utilisant la commande echo.
</p>
<h2>Essentiel</h2>
<p>
  En conclusion, le modèle MVC est une architecture très courante en développement webavec PHP. IL offre de nombreux avantages en termes d'organisation, de maintenabilité et de modularité du code . En comprenant bien les composantds principaux du modèle MVC, à savoir le Modèle, la vue et le  contrôlleur; vous pouvez créer des applications web efficaces, sécurisées et faciles à maintenir. Cependant, il est important de se rappeler que la mise en place d'un modèle MVC ne garantit pas àelle seule la qualité d'une application. Il est également important d'appliquer des bonnes pratiques  de programmation , de validation et de sécurisation des données, ainsi que de suivre les principes de conception et d'architecturelogicielle pour obtenir des résultats optimaux. 
  En pratiquant régulièrement et en vous tenant informé des nouvelles tendances et technologies en matière de développement web, vous pouvez progresser rapidement et acquérir les compétences nécessaires pour devenir un déveppeur web compétent et réussir dans ce domaine en constante évolution.
</p>
</body>
</html>