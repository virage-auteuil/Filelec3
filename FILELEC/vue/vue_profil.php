<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Profil</title>
    <link rel="stylesheet" href="assets\css\profil.css">
</head>
<body>
    <div class="profile-container">
        <h1>Mon Profil</h1>

        <!-- Section des informations utilisateur -->
        <form action="index.php?page=8&action=updateProfil" method="POST" class="profile-form">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="tel" name="telephone" id="telephone" placeholder="Votre téléphone" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse de domicile :</label>
                <input type="text" name="adresse" id="adresse" placeholder="Votre adresse" required>
            </div>

            <div class="form-group">
                <label for="password">Email :</label>
                <input type="email" name="email" id="email" placeholder="Nouveau email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" placeholder="Nouveau mot de passe" required>
            </div>

            <button type="submit" class="save-button">Enregistrer les modifications</button>
        </form>

        <!-- Boutons de déconnexion et suppression -->
        <div class="action-buttons">
            <a href="index.php?page=6" class="logout-button">Se déconnecter</a>
            <a href="index.php?page=8&action=supProfil" class="delete-button" action="sup" onclick="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">Supprimer mon compte</a>

        </div>
    </div>
</body>
</html>
