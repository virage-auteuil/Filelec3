
<?php
    /*cette classe Modele permet l'interface avec la base de données.
    L'ensemble des rquetes sont exécutées ici.
    Le controleur demande l'exécution d'une rquete au Modele. Celui-ci lui réponden extraction des données ou injection des données dans les tables.
    */
    class Modele {
        private $unPdo ; //PDO : PHP DATA Object c'est une classe PHP librairie qui permet la connexion sécurisée à la base de données.

        public function __construct (){
            try {
                $serveur = "localhost";
                $bdd= "filelec";
                $user ="root";
                $mdp="";
                //instanciation de la classe PDO
                $this->unPdo= new PDO("mysql:host=".$serveur.";dbname=".$bdd,$user, $mdp);
            }
            catch(PDOException $exp){
                echo "Erreur de connexion à la base de données.";
                echo $exp->getMessage (); //message officiel de l'erreur

            }
        }

        public function insertClient($tab){
            $requete="insert into client values (null, :nom, :prenom, :adresse, :email, :telephone, :mdp, :date_creation) ;";
            //correspondance entre les parametres PDO (:) et les parametres PHP($)
            $donnees = array(
                ":nom" => $tab['nom'],
                ":prenom" => $tab['prenom'],
                ":adresse" => $tab['adresse'],
                ":email" => $tab['email'],
                ":telephone" => $tab['telephone'],
                ":mdp" => $tab['mdp'], // Hash du mot de passe
                ":date_creation" => date('Y-m-d') // Date du jour
            );
            //preparation de la requete avant execution
            $exec=$this->unPdo->prepare($requete); //prepare methode PDO
            //execution de la requete
            $exec->execute($donnees); //execute methode PDO : avec envoie de données.
        }


        public function verifConnexion($email,$mdp) {
            $requete ="select * from client where email_client = :email and mdp_client = :mdp;";
            $donnees= array(":email" =>$email, ":mdp" =>$mdp);
            $exec = $this->unPdo->prepare($requete);
            $exec->execute ($donnees);
            return $exec->fetch();
        }
        
    }




        // Gestion de l'inscription
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tab = [
                'prenom' =>$_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'adresse' => $_POST['adresse'],
                'mdp' => $_POST['mdp']
            ];

            $unControleur->insertClient($tab);
        }