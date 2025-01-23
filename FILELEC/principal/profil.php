<?php
	require_once("vue/vue_profil.php");
?>

<?php
require_once("vue/vue_inscription.php");

if (isset($_POST['Valider'])) {

    $tab = [
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'email' => $_POST['email'],
        'telephone' => $_POST['telephone'],
        'adresse' => $_POST['adresse'],
        'mdp' => password_hash($_POST['mdp'], PASSWORD_DEFAULT) // Hash du mot de passe pour la sécurité
    ];

   
    $unControleur->insertClient($tab);

    echo "<p style='color:green;'>Insertion réussie du client.</p>";
}
?>