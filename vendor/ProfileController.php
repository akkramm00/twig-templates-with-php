<?php
require_once 'vendor/user.php';

class ProfileController {
  public function index() {
    if($_SERVER['REQUEST_METHOD'] === "POST") {
      $email = $-POST['email'];
      $password = $_POST['password'];
      $user = new User($email, $password);

    // inserer le systeme de templates de twig :
      $loader = new Twig\Loader\FilesystemLoader('templates');
      $twig = new Twig\Environment($loader);

      $template = $twig->load('profile.twig') ;
      echo $template ->render([
         'base_url' => BASE_URL,
          'email' => $user->getEmail();
          'password' => $user ->getPassword()                    
      ]);
    }
  }
}
?>