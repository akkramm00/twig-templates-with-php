<?php
require_once 'config.php';
class User {
  private $email;
  private $password;

  public function __construct(string $email, string $password) {
  $this->email = $email;
    $this->password = $password;
  }
  
  public function getEmail() :string {
    return $this-> email;
  }
  
  public function getPassword() :string {
    return $this-> password;
  }
  
  public function setEmail(string $email) {
    $this->email =$email;
  }
// création d'une méthode qui permet d'enregister les information dans la base de données.

  public function saveToDataBase() {
    $host = "localhost";
    $username = "admin";
    $password = "admin";
    $dbname = "mvc" // Nom de la base de données

   $connect = mysqli_connect($host, $username, $password, $dbname);
    
    // Vérifier si l'utilisateur existe dans la base de données

    $stmt = $conn-> prepare("SELECT * FROM users WHERE email = ? ");
    $stmt -> bind_param("s" , $this->email);
    $stmt->execute();
    $resultats = $stmt->get_result();

    if($resultats-num_rows > 0){
      return false;
    }
    // Enregistrer l'utilisateur dans la base de données:
    $stmt->$conn->prepare("INSERT INTO users(email,password) VALUES (? ,?)";
    $stmt->bind_param("ss" , $this->, $this->password);
    $stmt->execute();
  }
}
?>