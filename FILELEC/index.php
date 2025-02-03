<?php
ob_start();
session_start();
require_once("controleur/controleur.class.php");
$unControleur = new Controleur();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets\css\Nav_bar_index.css">
    <title>Fillelec</title>
</head>

<body>


    <center>


        <?php
        // Gestion de la connexion
        if (isset($_POST['email']) && isset($_POST['mdp'])) {
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);

            $unUser = $unControleur->verifConnexion($email, $mdp);

            if ($unUser) {
                // Stockage des informations utilisateur dans la session
                $_SESSION['email'] = $unUser['email_client'];
                $_SESSION['nom'] = $unUser['nom_client'];
                $_SESSION['prenom'] = $unUser['prenom_client'];
                $_SESSION['id_client'] = $unUser['id_client'];

                header("Location: index.php?page=4"); // Redirige vers le tableau de bord
                exit();
            } else {
                $error = "Identifiants incorrects. Veuillez réessayer.";
            }
        }

        // Gestion de la déconnexion
        if (isset($_GET['page']) && $_GET['page'] == 6) {
            session_destroy();
            unset($_SESSION['email']);
            header("Location: index.php?page=1");
            exit();
        }
        ?>
         <nav>
        <h1>Fillelec</h1>
        
            <div class="link-container">
                <a href="index.php?page=1">Accueil</a>
            </div>

            <div class="link-container">
                <a href="index.php?page=9">Catalogue</a>
                
            </div>

            </div>
            <div class="link-container">
                <a href="index.php?page=2">À propos</a>
                
            </div>
            <div class="link-container">
                <a href="index.php?page=3">Contact</a>
                
            </div>

            <div class="right-container">
                <?php if (isset($_SESSION['email'])): ?>
                    <div class="profile-container-nav">
                        <img src="img\image_navbar\profil_logo.png" alt="Profil" class="profile-logo">
                        <div class="dropdown">
                            <a href="index.php?page=8">Profils</a>
                            <a href="index.php?page=6">Déconnexions</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="link-container">
                        <a href="index.php?page=5">Connexion</a>
                    </div>
                    <div class="link-container">
                        <a href="index.php?page=7">Inscriptions</a>
                    </div>
                <?php endif; ?>
            </div>
    </center>
    </nav>


    <?php

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    switch ($page) {
        case 1:
            require_once("principal/home.php");
            break;
        case 2:
            require_once("principal/Apropos.php");
            break;
        case 3:
            require_once("principal/contact.php");
            break;
        case 4:
            if (isset($_SESSION['email'])) {
                require_once("principal/home.php");
            } else {
                echo "<p>Veuillez vous connecter pour accéder au tableau de bord.</p>";
            }
            break;
        case 5:

            if (!isset($_SESSION['email'])) {
                if (isset($error)) {
                    echo "<p style='color:red;'>$error</p>";
                }
                require_once("vue/vue_connexion.php");
            } else {
                echo "<p>Vous êtes déjà connecté.</p>";
            }
            break;
        case 7:
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tab = [
                    'prenom' => htmlspecialchars($_POST['prenom']),
                    'nom' => htmlspecialchars($_POST['nom']),
                    'email' => htmlspecialchars($_POST['email']),
                    'telephone' => htmlspecialchars($_POST['telephone']),
                    'adresse' => htmlspecialchars($_POST['adresse']),
                    'mdp' => htmlspecialchars($_POST['mdp'])
                ];

                $unControleur->insertClient($tab);
            }
         require_once("vue/insert/vue_insert_inscription.php");
         break;
       
        case 8:
            require_once("vue/vue_profil.php");
                
            if (isset($_GET['action'])){
                $action = $_GET['action']; 
                $id_client = $_SESSION['id_client']; 
                if ($action == "supProfil"){

                    $unControleur->deleteClient($id_client); 
                    session_destroy(); unset($_SESSION['email']);
                    header("Location: index.php");
                }
            }                
            break;
        case 9:
            require_once("vue/vue_catalogue.php");
            break;

        default:
            echo "<p>Page introuvable.</p>";
    }
    ?>

</body>

</html>

<?php ob_end_flush(); ?>