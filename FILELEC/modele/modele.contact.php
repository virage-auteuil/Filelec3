<?php
class Modele {
    private $unPdo; // PDO for database connection

    public function __construct() {
        try {
            $serveur = "localhost";
            $bdd = "filelec";
            $user = "root";
            $mdp = "";
            // Create PDO instance
            $this->unPdo = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $user, $mdp);
        } catch (PDOException $exp) {
            echo "Erreur de connexion à la base de données.";
            echo $exp->getMessage();
        }
    }

    // Example function to insert data into DB
    public function insertContact($nom, $prenom, $email, $telephone, $adresse, $code_postal, $ville, $message) {
        $query = "INSERT INTO contacts (nom, prenom, email, telephone, adresse, code_postal, ville, message) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->unPdo->prepare($query);
        return $stmt->execute([$nom, $prenom, $email, $telephone, $adresse, $code_postal, $ville, $message]);
    }
}
?>
