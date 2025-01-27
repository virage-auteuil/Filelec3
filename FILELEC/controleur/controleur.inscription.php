<?php
    require_once("vue\insert\vue_insert_inscription.php");
    
    if (isset($_POST['Valider'])) {
        // Préparation des données avant de les envoyer au contrôleur
        $tab = [
            'prenom' => htmlspecialchars($_POST['prenom']),
            'nom' => htmlspecialchars($_POST['nom']),
            'email' => htmlspecialchars($_POST['email']),
            'telephone' => htmlspecialchars($_POST['telephone']),
            'adresse' => htmlspecialchars($_POST['adresse']),
            'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT) // Hash du mot de passe pour la sécurité
        ];
    
        // Appel de la méthode insertClient du contrôleur
        $unControleur->insertClient($tab);
    
        echo "<p style='color:green;'>Insertion réussie du client.</p>";
    }
?>