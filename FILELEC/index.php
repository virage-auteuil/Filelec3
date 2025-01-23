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
    
        <h1>Bienvenue sur Fillelec</h1>
        </nav>
       
        <nav>

    <div class="link-container">
        <a href="index.php?page=1">Accueil</a>
    </div>

            </div>
            <div class="link-container">
                <a href="index.php?page=2">À propos</a>
                
            </div>
            <div class="link-container">
                <a href="index.php?page=3">Contact</a>
                
            </div>

            <?php if (isset($_SESSION['email'])): ?>
                <div class="profile-container">
                    <img src="img\profil_logo.png" alt="Profil" class="profile-logo">
                    <div class="dropdown">
                        <a href="index.php?page=8">Profil</a>
                        <a href="index.php?page=6">Déconnexion</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="link-container">
                    <a href="index.php?page=5">Connexion</a>
                    
                </div>
                <div class="link-container">
                    <a href="index.php?page=7">Inscription</a>
                    
                </div>
            <?php endif; ?>
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
            require_once("controleur/apropos.php");
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
         require_once("principal/inscription.php");
         break;
       
            case 8:
            require_once("vue/vue_profil.php");
            break;

          

        default:
            echo "<p>Page introuvable.</p>";
    }
    ?>

</body>

</html>

<?php ob_end_flush(); ?>