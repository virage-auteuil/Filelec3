<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription à Fillelec</title>
    <link rel="stylesheet" href="assets/css/inscription.css">
</head>
<body>
    <center>
        <div class="signup-container">
            <h2>Inscription à Fillelec</h2>
            <form method="POST">
                <input type="text" name="prenom" placeholder="Prénom" required>
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="tel" name="telephone" placeholder="Numéro de téléphone" required>
                <input type="text" name="adresse" placeholder="Adresse domicile" required>
                <input type="password" name="mdp" placeholder="Mot de passe" required>
                <button type="submit" name="Valider">S'inscrire</button>
                <a href="index.php?page=5">Déjà inscrit ? Connectez-vous</a>
            </form>
        </div>
    </center>
</body>
</html>